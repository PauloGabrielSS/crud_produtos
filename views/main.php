<?php 
    use Produto\Produto;
    use Produto\ProdutoController;

    $includePath = "";

    switch($uri){
        case '/':
            header("Location: /produtos");
            exit();
        case '/produtos':
            $includePath = "views/pages/produtos/listar.php";
            break;
        case '/produtos/cadastrar':
            
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send']) && $_POST['send'] === 'true'){
                $produto = new Produto();

                $nome = htmlspecialchars($_POST['nome']);
                $quantidade = htmlspecialchars($_POST['quantidade']);
                $preco = htmlspecialchars($_POST['preco']);
                $descricao = htmlspecialchars($_POST['descricao']);
                $dataCadastro = htmlspecialchars($_POST['dataCadastro']);
                $horaCadastro = htmlspecialchars($_POST['horaCadastro']);

                $produto->setNome($nome);
                $produto->setQuantidade($quantidade);
                $produto->setPreco($preco);
                $produto->setDescricao($descricao);
                $produto->setDataCadastro($dataCadastro);
                $produto->setHoraCadastro($horaCadastro);
                // exit;

                $produtoController = new ProdutoController($produto, $database);
                $msg = $produtoController->cadastrar();

                $_SESSION['msg'] = $msg;

                header("Location: /produtos");

                exit();
            }

            $includePath = "views/pages/produtos/cadastrar.php";
            break;
        case strpos($uri, '/produtos/editar') === 0:

            if (!isset($_REQUEST['id'])){
                header("Location: /produtos");
                exit();
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send']) && $_POST['send'] === 'true'){
                $produto = new Produto();

                $id = htmlspecialchars($_POST['id']);
                $nome = htmlspecialchars($_POST['nome']);
                $quantidade = htmlspecialchars($_POST['quantidade']);
                $preco = htmlspecialchars($_POST['preco']);
                $descricao = htmlspecialchars($_POST['descricao']);
                $dataCadastro = htmlspecialchars($_POST['dataCadastro']);
                $horaCadastro = htmlspecialchars($_POST['horaCadastro']);

                $produto->setId($id);
                $produto->setNome($nome);
                $produto->setQuantidade($quantidade);
                $produto->setPreco($preco);
                $produto->setDescricao($descricao);
                $produto->setDataCadastro($dataCadastro);
                $produto->setHoraCadastro($horaCadastro);

                $produtoController = new ProdutoController($produto, $database);
                $msg = $produtoController->alterar();

                $_SESSION['msg'] = $msg;

                header("Location: /produtos");

                exit();
            }

            $includePath = "views/pages/produtos/editar.php";
            break;
        case strpos($uri, '/produtos/excluir') === 0:
            
            if (!isset($_REQUEST['id'])){
                header("Location: /produtos");
                exit();
            }
            
            include("views/pages/produtos/excluir.php");
            exit();
        default:
            $includePath = "views/errors/404.php";
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- Header -->
    <?php include("views/components/header.php") ?>
    
    <!-- Página -->
    <div class="container my-3">
        <?php include($includePath) ?>    
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>