<?php

class Database {
    public $pdo;
    public $statement;

    function __construct($host = 'localhost', $db = 'course_calendar', $user = 'root', $pass = '4444', $charset = 'utf8mb4'){
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try{
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        }catch(PDOException $e){
            die("Database failed to connect: ". $e->getMessage());
        }
    }

    // Prepare and execute a query statement
    public function query(string $sql, array $params = []){
        $this->statement = $this->pdo->prepare($sql);
        return $this->statement->execute($params);
    }

    //Fetch all queries
    public function fetchAll(string $sql, array $params = []){
        $this->query($sql, $params);
        return $this->statement->fetchAll();
    }

    //fetch a single query
    public function fetch(string $sql, array $params = []){
        $this->query($sql, $params);
        return $this->statement->fetch();
    }

}