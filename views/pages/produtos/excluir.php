<?php
    use \Produto\ProdutoController;

    $id = $_GET['id'];
    $controller = new ProdutoController(null, $database);
    
    $msg = $controller->excluir($id);

    $_SESSION['msg'] = $msg;
    // dump($msg);
    header("Location: /produtos");