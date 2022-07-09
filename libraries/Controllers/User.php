<?php

namespace Controllers;

class User extends Controller
{
    protected $modelName = \Models\User::class;


    public function showConnexion() //Affichage de la page de connexion
    {
        $pageTitle = 'connexion';

        \Renderer::render('articles/connexion', compact('pageTitle'));
    }
    public function showAddArticle() //Page ajout d'article
    {
        if (($_SESSION['type'] == 'admin')) { //Verification du type d'utilisateur pour voir la page

            $pageTitle = 'Ajouter un article';
            $entreprises = new \Models\Entreprise();
            $entreprises = $entreprises->findAll();
            \Renderer::render('articles/addArticle', compact('pageTitle', 'entreprises'));
        } else {
            $_SESSION["message"] = "Vous devez etre administrateur pour voir cette page.";
            \Http::redirect("index.php");
        }
    }

    public function login()
    {
        $login = new \Models\User();




        $email = null;
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        }
        $mdp = null;
        if (!empty($_POST['mdp'])) {
            $mdp = htmlspecialchars($_POST['mdp']);
        }

        if (!$email || !$mdp) {
            $_SESSION["message"] = "Identifiants invalide";
            \Http::redirect("index.php?controller=user&task=showConnexion");
        }

        $getLog = $this->model->getlogin($email, $mdp); //Recupere l'utilisateur pour la verification de connexion

        $verifPwd = password_verify($mdp, $getLog[0]['mdp']); //verification de la signature du mdp

        if ($verifPwd == true) { //verification des login
            $_SESSION['email'] = $getLog[0]['email'];
            $_SESSION['type'] = $getLog[0]['type'];

            \Http::redirect("index.php?controller=user&task=showAdmin"); // 
        } else {
            $_SESSION["message"] = "Email ou mot de passe incorrect";
            \Http::redirect("index.php?controller=user&task=showConnexion");
        }
    }

    public function logout() //Deconnexion
    {
        $this->model->logout();
        \Http::redirect("index.php");
    }
    public function showAdmin()
    {
        $pageTitle = "Admin";
        $article = new \Models\Articles();
        $articles = $article->findAll();

        \Renderer::render('articles/admin', compact('pageTitle', 'articles'));
    }

    // public function delete()
    // {
    //     // supprimer un article

    //     /**
    //      * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
    //      */
    //     if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    //         die("Ho ?! Tu n'as pas précisé l'id de l'article !");
    //     }

    //     $id = $_GET['id'];


    //     /**
    //      * 3. Vérification que l'article existe bel et bien
    //      */
    //     $article = $this->model->find($id);
    //     if (!$article) {
    //         die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
    //     }

    //     /**
    //      * 4. Réelle suppression de l'article
    //      */
    //     $this->model->delete($id);

    //     /**
    //      * 5. Redirection vers la page d'accueil
    //      */

    //     \Http::redirect("index.php");
    // }
}
