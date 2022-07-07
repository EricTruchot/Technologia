<?php
namespace Models;

class Articles extends Model

{
 protected $table = "Media";


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
