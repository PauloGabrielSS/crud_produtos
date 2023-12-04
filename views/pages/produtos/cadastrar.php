<h1>Cadastro de Produtos</h1>

<div class="my-3">
    <form method="post" action="<?php echo htmlspecialchars("#");?>">
        
        <!-- Nome -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Digite aqui..." id="nome" name="nome" required>
            <label for="nome">Nome</label>
        </div>

        <!-- Quantidade -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="Digite aqui..." id="quantidade" name="quantidade" required>
            <label for="quantidade">Quantidade</label>
        </div>

        <!-- Preço -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="Digite aqui..." id="preco" name="preco" step=".01" required>
            <label for="preco">Preço</label>
        </div>

        <!-- Descricao -->
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Digite aqui..." id="descricao" name="descricao" style="height: 100px" maxlength="255" required></textarea>
            <label for="descricao">Descrição</label>
        </div>

        <!-- DataCadastro -->
        <div class="form-floating mb-3">
            <input type="date" class="form-control" placeholder="Digite aqui..." id="dataCadastro" name="dataCadastro" required>
            <label for="dataCadastro">Data de Cadastro</label>
        </div>

        <!-- HoraCadastro -->
        <div class="form-floating mb-3">
            <input type="time" class="form-control" placeholder="Digite aqui..." id="horaCadastro" name="horaCadastro" required>
            <label for="horaCadastro">Hora de Cadastro</label>
        </div>

        <input type="hidden" name="send" value="true">

        <a href="/produtos" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Criar produto</button>
    </form>
</div>