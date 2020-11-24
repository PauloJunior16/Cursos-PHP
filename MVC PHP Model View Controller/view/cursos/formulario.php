<?php include __DIR__ . '/../../view/inicio-html.php'; ?>

<form action="/salvar-curso"<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?> method="post">
    <div class="form-group">
        <label for="descricao">Descricao</label>
        <input type="text"
            id="descricao"
            name="descricao"
            class="form-control" 
            value=" <?= isset($curso) ? $curso->getDescricao() : ''; ?>">
    </div>
    <button class="btn btn-primary" onclick="gravaDados()">Salvar</button>
</form>
</div>
</body>

<script>

    function gravaDados() {
        window.alert("Dados gravados com sucesso!");
    }
</script>

</html>

<?php include __DIR__ . '/../../view/fim-html.php'; ?>