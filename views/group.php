<h3 class="admin-color"><i class="fas fa-users fa-fw"></i> Grupos Cadastrados</h3>
<a href="<?=BASE_URL?>group/add" class="btn button-all btn-admin btn-main" title="Cadastrar Novo Grupo"><i class="fas fa-plus fa-fw"></i> Novo Grupo </a>
<div class="table-responsive-lg">
    <table class="table table-list table-admins">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if($listGroup != null):?>
            <?php foreach($listGroup as $rs): ?>
                <tr>
                    <td class="title-table-admins"><?=$rs['title']?></td>
                    <td class="description-table-admins"><?=$rs['description']?></td>
                    <td><a href="<?=BASE_URL?>course/edit/<?=$rs['id']?>" class="btn button-all btn-admin"
                           title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                        <a href="<?=BASE_URL?>course/del/<?=$rs['id']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                           title="Inativar" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listGroup == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
