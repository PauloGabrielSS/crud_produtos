<?php
session_start();
require_once("app/config/Database.php");
require_once("app/produto/Produto.php");
require_once("app/produto/ProdutoDTO.php");
require_once("app/produto/ProdutoController.php");
require_once("app/util/dump.php");

use \Config\Database;
use \Produto\Produto;
use \Produto\ProdutoDTO;
use \Produto\ProdutoController;

$database = null;
$uri = $_SERVER['REQUEST_URI'];

try {
    $database = new Database("localhost:3306", "database", "root", "");
    
    $database->connect();
    // dump($database);
} catch (\Throwable $t) {
    dump($t);
}

include("views/main.php");