<?php

namespace Controllers;

class Entreprise extends Controller
{
    protected $modelName = \Models\Entreprise::class;

public function insert()
{
    $nom = null;
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
    }

    $this->model->insertEntreprise($nom);

    \Http::redirect("index.php?controller=user&task=showAddArticle");

    }
    public function updateEntreprise()
    {
        
    }

}