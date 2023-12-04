<?php
namespace Config;

use \Produto\Produto;

class Database {

    // Variaveis
    private $host = 'db';
    private $dbname = 'database';
    private $user = 'user';
    private $pass = 'pass';
    private $dsn;
    private $conn;

    // Construtores
    public function __construct($host = null, $dbname = null, $user = null, $pass = null) {
        if ($host !== null)
            $this->host = $host;
        
        if ($dbname !== null) 
            $this->dbname = $dbname;
        
        if ($user !== null) 
            $this->user = $user;
        
        if ($pass !== null) 
            $this->pass = $pass;
        
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
    }

    // Getters
    public function getHost() {
        return $this->host;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getDsn() {
        return $this->dsn;
    }

    public function getConn() {
        return $this->conn;
    }

    // Setters
    public function setHost($host) {
        $this->host = $host;
    }

    public function setDbname($dbname) {
        $this->dbname = $dbname;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    public function setConn($conn) {
        $this->conn = $conn;
    }

    // Metodos
    public function connect() {
        try {
            $this->conn = new \PDO($this->dsn, $this->user, $this->pass);
            $this->createTables();
            return true;
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function createTables(){
        $produto = new Produto();

        $sql = $produto->getSQLCreate();

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}

