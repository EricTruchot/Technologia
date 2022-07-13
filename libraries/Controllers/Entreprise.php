<?php

namespace Controllers;
use Services\FileServices;

class Entreprise extends Controller
{
    protected $modelName = \Models\Entreprise::class;

public function insert() //Ajout d'une nouvelle entreprise
{
    $service = new FileServices;
    $service->admin();

    $nom = null;
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars(filter_input(INPUT_POST,'nom'));
    }

    $this->model->insertEntreprise($nom);
    $_SESSION["message"] = "Entreprise ajouté";
    \Http::redirect("index.php?controller=user&task=showAddArticle");

    }

}