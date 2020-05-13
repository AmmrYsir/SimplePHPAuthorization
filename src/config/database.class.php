<?php

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'carrental';
    protected $conn;

    protected function connect() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection error: '. $e->getMessage();
        }
        return $this->conn;
    }

}