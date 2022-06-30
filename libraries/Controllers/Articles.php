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
        $articles = $this->model->findAll("date DESC");

        /**
         * 3. Affichage
         */
        $pageTitle = "Accueil";
        \Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }
    public function show()
    {
        //montrer un article

        $commentModel = new \Models\Comment();
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

        $article = $this->model->find($article_id);

        /**
         * 5. On affiche 
         */
        $pageTitle = $article['titre'];

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'article_id'));
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
         * 5. suppression du fichier
         */
        if (!empty($_GET['file'])) {
           
            $file = htmlspecialchars($_GET['file']);
            unlink($file);
        }
        
        /**
         * 6. Redirection vers la page d'accueil
         */

        \Http::redirect("index.php?controller=user&task=showAdmin");
    }
    public function insert()
    {
       // function upload fichier retourne l'emplacement


       
       $upload = new FileServices;
        $file = $upload->upload();

        $articleModel = new \Models\Articles();


        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        // On commence par l'author
        $titre = null;
        if (!empty($_POST['titre'])) {
            $titre = $_POST['titre'];
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

        // 3. Insertion du commentaire
        $this->model->insert($titre, $description, $file, $idEntreprise);

        // 4. Redirection vers l'article en question :

        \Http::redirect("index.php?controller=user&task=showAdmin");
    }
}
