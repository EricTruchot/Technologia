<?php

namespace Models;

class Articles extends Model

{
    protected $table = "Article";

    public function findAllArticleWithEntreprise()
    {
        $sql = "SELECT Article.id, titre, description, date, Entreprise.id as EntrepriseId, nom 
            FROM `Article` 
            JOIN Entreprise 
                ON Entreprise.id = Article.Entreprise_id
                ORDER BY Article.id DESC";

        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
    }
    public function findArticleWithEntreprise(int $id)
    {

        $query = $this->pdo->prepare("SELECT Article.id, titre, description, date, Entreprise.id as EntrepriseId, nom 
                                      FROM `Article` 
                                      JOIN Entreprise 
                                          ON Entreprise.id = Article.Entreprise_id
                                          WHERE Article.id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch(); //fetchAll? FETCH_ASSOC?
        return $item;
    }
    public function insert(string $titre, string $description, int $idEntreprise)
    {
        $query = $this->pdo->prepare('INSERT INTO Article SET titre = :titre, description = :description, date = NOW(), Entreprise_id = :idEntreprise');
        $query->execute(compact('titre', 'description', 'idEntreprise'));
        $id = $this->pdo->lastInsertId();

        return $id;
    }
    public function update(int $id, string $titre, string $description, int $Entreprise_id)
    {
        $query = $this->pdo->prepare('UPDATE Article SET titre = :titre, description = :description, Entreprise_id = :Entreprise_id
                                      WHERE id = :id');
        $query->execute(compact('id', 'titre', 'description', 'Entreprise_id'));
    }

    public function insertMedia(string $lien, int $Article_id)
    {
        $query = $this->pdo->prepare('INSERT INTO Media SET lien = :lien, Article_id = :Article_id');
        $query->execute(compact('lien', 'Article_id'));
        $id = $this->pdo->lastInsertId();

        return $id;
    }
    public function deleteMedia(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM Media WHERE Article_id = :id");
        $query->execute(['id' => $id]);
    }
    public function findMedia(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM Media WHERE Article_id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetchAll(); //FETCH_ASSOC?
        return $item;
    }
}
