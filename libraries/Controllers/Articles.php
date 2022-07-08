<?php

namespace Controllers;

use Services\FileServices;

class Articles extends Controller
{
    protected $modelName = \Models\Articles::class;

    public function index()
    {
        //montrer la liste

        /**
         * 2. Récupération des articles
         */
        // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $articles = $this->model->findAllArticleWithEntreprise();
        $media = $this->model->findAll('Media');
        /**
         * 3. Affichage
         */
        $pageTitle = "Accueil";
        \Renderer::render('articles/index', compact('pageTitle', 'articles', 'media'));
    }
    public function show()
    {
        //montrer un article

        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }



        /**
         * 3. Récupération de l'article en question
         * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
         * jamais confiance à ce connard d'utilisateur ! :D
         */

        $article = $this->model->findArticleWithEntreprise($article_id);
        $media = $this->model->findMedia($article_id);
        $entreprises = new \Models\Entreprise();
        $entreprises = $entreprises->findAll();

        /**
         * 5. On affiche 
         */
        $pageTitle = $article['titre'];

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'article_id', 'media', 'entreprises'));
    }
    public function delete()
    {
        // supprimer un article

        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];


        //recuperation des fichier de l'article
        $media = $this->model->findMedia($id);

        /**
         * 5. suppression du fichier
         */
        foreach ($media as $row) {
            unlink($row['lien']);
        }
        // delete des media (sql)
        $this->model->deleteMedia($id);

        /**
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);






        /**
         * 6. Redirection vers la page d'accueil
         */

        \Http::redirect("index.php?controller=user&task=showAdmin");
    }
    public function insert()
    {
        $upload = new FileServices;

        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        // On commence par l'author
        $titre = null;
        if (!empty($_POST['titre'])) {
            $titre = htmlspecialchars($_POST['titre']);
        }

        // Ensuite le contenu
        $description = null;
        if (!empty($_POST['description'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $description = htmlspecialchars($_POST['description']);
        }

        $idEntreprise = null;
        if (!empty($_POST['entreprise'])) {
            $idEntreprise = htmlspecialchars($_POST['entreprise']);
        }


        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$titre || !$description || !$idEntreprise) {
            die("Votre formulaire a été mal rempli !");
        }

        // 3. Insertion de l'article
        $lastId = $this->model->insert($titre, $description, $idEntreprise);


        // =============== upload file ============

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

                $file = $upload->upload($value);

                $this->model->insertMedia($file, $lastId);
            }
        }
        // ==========================================

        // 4. Redirection

        \Http::redirect("index.php?controller=user&task=showAdmin");
    }
    public function deleteImage()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            echo ("erreur id");
        }

        $id = $_GET['id'];
        $articleId = $_GET['articleId'];
        $image = $this->model->find($id, 'Media');
        /**
         * 5. suppression du fichier
         */

        unlink($image['lien']);




        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id, 'Media');






        /**
         * 6. Redirection vers la page d'accueil
         */

        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }
    public function updateArticle()
    {
        $articleId = null;
        if (!empty($_POST['articleId'])) {
            $articleId = htmlspecialchars($_POST['articleId']);
        }
        $titre = null;
        if (!empty($_POST['modifTitre'])) {
            $titre = htmlspecialchars($_POST['modifTitre']);
        }

        // Ensuite le contenu
        $description = null;
        if (!empty($_POST['modifDescription'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $description = htmlspecialchars($_POST['modifDescription']);
        }

        $idEntreprise = null;
        if (!empty($_POST['modifEntreprise'])) {
            $idEntreprise = htmlspecialchars($_POST['modifEntreprise']);
        }


        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$articleId || !$titre || !$description || !$idEntreprise) {
            die("Votre formulaire a été mal rempli !");
        }

        // 3. Insertion de l'article
        $this->model->update($articleId, $titre, $description, $idEntreprise);

        //redirection
        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }

    public function addMediaToArticle()
    {
        $upload = new FileServices;
        // =============== upload file ============

        $articleId = null;
        if (!empty($_POST['articleId'])) {
            $articleId = htmlspecialchars($_POST['articleId']);
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

                $file = $upload->upload($value);

                $this->model->insertMedia($file, $articleId);
            }
        }
        // ==========================================
        \Http::redirect("index.php?controller=articles&task=show&id=" . $articleId);
    }
}
