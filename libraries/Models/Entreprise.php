<?php
namespace Models;

class Entreprise extends Model

{
 protected $table = "Entreprise";

 public function insertEntreprise(string $nom): void
 {
     $query = $this->pdo->prepare('INSERT INTO Entreprise SET nom = :nom');
     $query->execute(compact('nom'));
 }


}
