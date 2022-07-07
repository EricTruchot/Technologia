<?php
namespace Models;

abstract class Model
{
    protected $pdo;
    protected $table;
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
    public function findAll(string $table = null)
    {
        if($table == null){
            $table = $this->table;
        }
        $sql = "SELECT * FROM {$table} ORDER BY id DESC";

        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
    }
    public function find(int $id, string $table = null)
    {
        if($table == null){
            $table = $this->table;
        }
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch(); //fetchAll? FETCH_ASSOC?
        return $item;
    }
    public function delete(int $id, string $table = null): void
    {
        if($table == null){
            $table = $this->table;
        }
        $query = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    
}
