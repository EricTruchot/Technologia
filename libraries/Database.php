<?php

class Database // Connexion a la base de données
{

    public static function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=technologia;charset=utf8', 'EricT', 'ThinkPad', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}
