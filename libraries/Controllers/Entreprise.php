<?php

namespace Controllers;

class Entreprise extends Controller
{
    protected $modelName = \Models\Entreprise::class;

public function insert() //Ajout d'une nouvelle entreprise
{
    $nom = null;
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
    }

    $this->model->insertEntreprise($nom);
    $_SESSION["message"] = "Entreprise ajouté";
    \Http::redirect("index.php?controller=user&task=showAddArticle");

    }

}