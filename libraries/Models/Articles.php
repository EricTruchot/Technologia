<?php
namespace Models;

class Articles extends Model

{
 protected $table = "Article";

 public function insert(string $titre, string $description, int $idEntreprise)
 {
     $query = $this->pdo->prepare('INSERT INTO Article SET titre = :titre, description = :description, date = NOW(), Entreprise_id = :idEntreprise');
     $query->execute(compact('titre', 'description', 'idEntreprise'));
     $id = $this->pdo->lastInsertId();

     return $id;
 }

 public function insertMedia(string $lien, int $Article_id)
 {
     $query = $this->pdo->prepare('INSERT INTO Media SET lien = :lien, Article_id = :Article_id');
     $query->execute(compact('lien', 'Article_id'));
     $id = $this->pdo->lastInsertId();

     return $id;
 }


}
