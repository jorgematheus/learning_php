<h3 class="content-color"><i class="fas fa-clipboard-list fa-fw"></i> Aulas Cadastradas</h3>
<a href="<?=BASE_URL?>lesson/add" class="btn button-all btn-content btn-main" title="Cadastrar Nova Aula"><i class="fas fa-plus fa-fw"></i> Nova Aula </a>
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
        <?php if($listLesson != null):?>
            <?php foreach($listLesson as $rs): ?>
                <tr>
                    <td class="title-table-contents"><?=$rs['title']?></td>
                    <td class="description-table-contents"><?=$rs['description']?></td>
                    <td><a href="<?=BASE_URL?>lesson/edit/<?=$rs['id']?>" class="btn button-all btn-content"
                           title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                        <a href="<?=BASE_URL?>lesson/del/<?=$rs['id']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                           title="Inativar" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listLesson == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
