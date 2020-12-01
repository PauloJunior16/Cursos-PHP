<?php include __DIR__ . '/../inicio-html.php'; ?>
<hr>
    <a href="/novo-curso" class="btn bg-adicionar mb-2" title="Adicionar novo curso a lista">
        Novo curso &#10010;
    </a>

    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>             

                <span>
                    <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn bg-alterar btn-sm" title="Editar curso selecionado">
                        Editar 
                    </a>
                    <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-default btn-excluir btn-sm"
                    onclick="return confirm('Deseja excluir o curso &quot;<?= $curso->getDescricao(); ?>&quot;?')" >
                    &#10006;
                    </a>
                </span>

            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../fim-html.php';?>