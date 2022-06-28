<?php

namespace Models;

class User extends Model
{
    protected $table = "Utilisateur";

    public function getLogin(string $email, string $mdp): array
    {
        $query = $this->pdo->prepare("SELECT email, mdp, type FROM Utilisateur WHERE email = :email");
        $query->execute(["email"=>$email]);
        $login = $query->fetchAll();

        return $login;
    }

    public function logout()
{
    session_start();
    session_unset();
    session_destroy();
}

}

