<?php
namespace Models;

class Entreprise extends Model

{
 protected $table = "Entreprise";

 public function insert(string $nom, int $idEntreprise): void
 {
     $query = $this->pdo->prepare('INSERT INTO Entreprise SET nom = :nom, id = :idEntreprise');
     $query->execute(compact('nom', 'id'));
 }

}
