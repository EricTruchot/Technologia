<?php

namespace Controllers;

class User extends Controller
{
    protected $modelName = \Models\User::class;


    public function showConnexion()
    {
        $pageTitle = 'connexion';

        \Renderer::render('articles/connexion', compact('pageTitle'));
    }
    public function showAddArticle()
    {
        $pageTitle = 'Ajouter un article';
        $entreprises = new \Models\Entreprise();
        $entreprises = $entreprises->findAll();
        \Renderer::render('articles/addArticle', compact('pageTitle', 'entreprises'));
    }

    public function login()
    {
        $login = new \Models\User();


        if (
            filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)
            && htmlspecialchars(filter_input(INPUT_POST, "mdp")) // ????????
        ) {

            $email = $_POST['email'];
            $mdp = $_POST['mdp'];

            $getLog = $this->model->getlogin($email, $mdp);

            if (isset($email) && isset($mdp)) {

                $verifPwd = password_verify($mdp, $getLog[0]['mdp']);

                if ($verifPwd == true) {

                    $_SESSION['email'] = $getLog[0]['email'];
                    $_SESSION['type'] = $getLog[0]['type'];

                    //  $this->showAdmin();
                    \Http::redirect("index.php?controller=user&task=showAdmin"); // 
                } else {

                    echo json_encode('Email ou mot de passe incorrect');
                }
            }
        } else {

            echo json_encode('Entrer des identifiants valide');
        }
    }

    public function logout()
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

    // public function showUpdateArticle()
    // {
    //     $pageTitle = 'Modifier un article';

    //     \Renderer::render('articles/connexion', compact('pageTitle'));
    // }

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
         * 5. Redirection vers la page d'accueil
         */

        \Http::redirect("index.php");
    }
}
