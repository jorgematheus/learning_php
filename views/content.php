<h3 class="content-color"><i class="fas fa-book fa-fw"></i> Conteúdos Cadastrados</h3>
<a href="<?=BASE_URL?>content/add" class="btn button-all btn-content btn-main" title="Cadastrar Novo Conteúdo"><i class="fas fa-plus fa-fw"></i> Novo Conteúdo </a>
<div class="table-responsive-lg">
    <table class="table table-list table-contents">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if($listContent != null):?>
        <?php foreach($listContent as $rs): ?>
        <tr>
            <td class="title-table-contents"><?=$rs['title']?></td>
            <td class="description-table-contents"><?=$rs['description']?></td>
            <td><a href="<?=BASE_URL?>content/edit/<?=$rs['id']?>" class="btn button-all btn-content"
                   title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                <a href="<?=BASE_URL?>content/del/<?=$rs['id']?>" id="btt"
                   onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                   title="Inativar" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listContent == null):?>
    <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
