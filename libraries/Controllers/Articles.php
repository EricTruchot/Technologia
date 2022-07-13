<?php

namespace Controllers;

use Services\FileServices;

class Articles extends Controller
{
    protected $modelName = \Models\Articles::class;
    

    public function index() //Page d'acceuil
    {
        $articles = $this->model->findAllArticleWithEntreprise(); //Récupération des articles
        $media = $this->model->findAll('Media'); //Récupération des images

        $pageTitle = "Accueil";
        \Renderer::render('articles/index', compact('pageTitle', 'articles', 'media')); //Rendu de la page
    }

    public function show() //Affiche le detail d'un article (et de la modification d'article pour l'admin)
    {
        //Récupération des parametres et vérification de ceux-ci

        $article_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) { //verif de l'id (existe + nb entier)
            $article_id = $_GET['id'];
        }

        if (!$article_id) { // erreur s'il n'existe pas
            $_SESSION["message"] = "ID incorrect";
            \Http::redirect("index.php");
        }

        //Récuperation de l'article/entreprise, et les images qui lui sont lié
        $article = $this->model->findArticleWithEntreprise($article_id);
        $media = $this->model->findMedia($article_id);
        $entreprises = new \Models\Entreprise();
        $entreprises = $entreprises->findAll(); //(pour la modif d'article)

        $pageTitle = $article['titre'];

        //Affichage de la page avec les données récupéré
        \Renderer::render('articles/show', compact('pageTitle', 'article', 'article_id', 'media', 'entreprises'));
    }
    public function delete() //Supprimer un article
    {
        $service = new FileServices;
        $service->admin();

        //Récupération et verification de l'id
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            $_SESSION["message"] = "ID incorrect";
            \Http::redirect("index.php");
        }

        $id = $_GET['id'];

        //Recuperation de l'emplacement des fichiers de l'article
        $media = $this->model->findMedia($id);

        //Suppression des fichiers
        foreach ($media as $row) {
            unlink($row['lien']);
        }
        //Suppression des fichier de la BDD
        $this->model->deleteMedia($id);

        //Suppression de l'article
        $this->model->delete($id);

        //Redirection vers la page d'accueil

        \Http::redirect("index.php");
    }
    public function insert() //Ajout d'un article
    {
        $service = new FileServices;
        $service->admin();

        //Récuperation et verification des données du POST
        $titre = null;
        if (!empty($_POST['titre'])) {
            $titre = htmlspecialchars(filter_input(INPUT_POST,'titre'));
        }

        $description = null;
        if (!empty($_POST['description'])) {
            $description = htmlspecialchars(filter_input(INPUT_POST,'description'));
        }

        $idEntreprise = null;
        if (!empty($_POST['entreprise'])) {
            $idEntreprise = htmlspecialchars(filter_input(INPUT_POST,'entreprise'));
        }

        // Vérification finale des infos envoyées dans le formulaire
        if (!$titre || !$description || !$idEntreprise) {
            $_SESSION["message"] = "Le formulaire n'a pas été rempli correctement.";
            \Http::redirect("index.php?controller=user&task=showAddArticle");
        }

        //Insertion de l'article
        $lastId = $this->model->insert($titre, $description, $idEntreprise);

        //Upload des fichiers
        //===================

        //Récuperation des infos des fichiers sélectionés
        if (isset($_FILES['fileToUpload'])) {
            $myFile = $_FILES['fileToUpload'];
            $fileCount = count($myFile["name"]);
            $file_ary = array();
            $file_keys = array_keys($myFile);
            //Rangement des tableaux de fichier en tableau utilisable pour les fonction suivante
            for ($i = 0; $i < $fileCount; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $myFile[$key][$i];
                }
            }
            //Ajout des fichiers dans le dossier et dans la BDD
            foreach ($file_ary as $key => $value) {
                $file = $service->upload($value);
                $this->model->insertMedia($file, $lastId);
            }
        }
        //===================

        //Redirection
        \Http::redirect("index.php");
    }
    public function deleteImage()
    {
        $service = new FileServices;
        $service->admin();

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            $_SESSION["message"] = "ID incorrect";
            \Http::redirect("index.php");
        }

        $id = $_GET['id'];
        $articleId = $_GET['articleId'];
        $image = $this->model->find($id, 'Media'); //Récupertion de l'emplacement du fichier
        unlink($image['lien']); //Suppression du fichier

        //uppression dans la BDD
        $this->model->delete($id, 'Media');

        //Redirection
        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }
    public function updateArticle()
    {
        $service = new FileServices;
        $service->admin();

        $articleId = null;
        if (!empty($_POST['articleId'])) {
            $articleId = htmlspecialchars(filter_input(INPUT_POST,'articleId'));
        }
        $titre = null;
        if (!empty($_POST['modifTitre'])) {
            $titre = htmlspecialchars(filter_input(INPUT_POST,'modifTitre'));
        }

        $description = null;
        if (!empty($_POST['modifDescription'])) {
            $description = htmlspecialchars(filter_input(INPUT_POST,'modifDescription'));
        }

        $idEntreprise = null;
        if (!empty($_POST['modifEntreprise'])) {
            $idEntreprise = htmlspecialchars(filter_input(INPUT_POST,'modifEntreprise'));
        }

        if (!$articleId || !$titre || !$description || !$idEntreprise) {
            $_SESSION["message"] = "Le formulaire n'a pas été rempli correctement.";
            \Http::redirect("index.php?controller=user&task=showAddArticle");
        }

        $this->model->update($articleId, $titre, $description, $idEntreprise);

        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }

    public function addMediaToArticle() //Ajout d'une image a un article
    {
        $service = new FileServices;
        $service->admin();

        $articleId = null;
        if (!empty($_POST['articleId'])) {
            $articleId = htmlspecialchars(filter_input(INPUT_POST,'articleId'));
        }

        if (isset($_FILES['fileToUpload'])) {
            $myFile = $_FILES['fileToUpload'];
            $fileCount = count($myFile["name"]);
            $file_ary = array();
            $file_keys = array_keys($myFile);

            for ($i = 0; $i < $fileCount; $i++) {

                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $myFile[$key][$i];
                }
            }
            foreach ($file_ary as $key => $value) {

                $file = $service->upload($value);

                $this->model->insertMedia($file, $articleId);
            }
        }
        
        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }
}
