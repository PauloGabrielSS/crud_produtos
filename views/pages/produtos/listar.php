<?php 
    use \Produto\ProdutoController;

    $controller = new ProdutoController(null, $database);
    $produtos = $controller->listar();
?>

<h1>Listagem de Produtos</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/produtos/cadastrar" role="button"><i class="bi bi-plus-lg"></i> Criar produto</a>
</div>

<?php
    if (isset($_SESSION['msg'])) {
        $success = $_SESSION['msg']['success'];
        $nochange = false;
        if (isset($_SESSION['msg']['nochange'])){
            $nochange = $_SESSION['msg']['nochange'];
        }
        $message = $_SESSION['msg']['msg'];

        ?>
            <div class="alert alert-<?= $success ? $nochange ? "info" : "success" : 'danger' ?> alert-dismissible fade show" role="alert">
                <h4 class="alert-heading"><?= $success ? $nochange ? '<i class="bi bi-exclamation-triangle"></i> Atenção' : '<i class="bi bi-check-lg"></i> Sucesso' : '<i class="bi bi-x-lg"></i> Erro' ?></h4>
                <hr/>
                <?= $message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

        unset($_SESSION['msg']);
    }
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Preço</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data de Cadastro</th>
      <th scope="col">Hora de Cadastro</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php 
        foreach ($produtos as $produto) {
            echo "<tr>";
            echo "<th scope='row'>{$produto->getId()}</th>";
            echo "<td style='word-wrap: break-word;min-width: 160px;max-width: 160px;'>{$produto->getNome()}</td>";
            echo "<td>{$produto->getQuantidade()}</td>";
            echo "<td>{$produto->getPreco()}</td>";
            echo "<td style='word-wrap: break-word;min-width: 160px;max-width: 160px;'>{$produto->getDescricao()}</td>";
            echo "<td>{$produto->getDataCadastro()}</td>";
            echo "<td>{$produto->getHoraCadastro()}</td>";
            echo "<td>";
            echo "<a class='btn btn-primary mx-2' href='/produtos/editar?id={$produto->getId()}' role='button'><i class='bi bi-pencil-square'></i></a>";
            echo "<a class='btn btn-danger mx-2' href='/produtos/excluir?id={$produto->getId()}' role='button'><i class='bi bi-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>