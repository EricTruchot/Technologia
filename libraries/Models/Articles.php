<?php
namespace Models;

class Articles extends Model

{
 protected $table = "Article";

 public function insert(string $titre, string $description, string $file): void
 {
     $query = $this->pdo->prepare('INSERT INTO Article SET titre = :titre, description = :description, contenu = :file, date = NOW(), Entreprise_id = 1');
     $query->execute(compact('titre', 'description', 'file'));
 }

}
