<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="content-color"><i class="fas fa-chalkboard-teacher fa-fw"></i> Turmas Cadastradas</h3>
<a href="<?=BASE_URL?>class/add" class="btn button-all btn-content btn-main" title="Cadastrar Nova Turma">
<i class="fas fa-plus fa-fw"></i> Nova Turma </a>
<div class="table-responsive-lg">
    <table id="table-class" class="table table-list table-class">
        <thead>
        <tr>
            <th></th>
            <th>Turma</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if($listClass != null):?>
            <?php foreach($listClass as $rs): ?>
                <tr>
                    <td><?php if($rs['image'] != null):?><img src="<?=BASE_URL?>img/classes/<?=$rs['image']?>" 
                        width="50" height="50" alt="Imagem Curso" title="Imagem Curso"> <?php endif;?> 
                    </td>
                    <td class="title-table-contents"><?=$rs['title']?></p></td>
                    <td class="description-table-contents"><?=$rs['description']?></td>
                    <td><a href="<?=BASE_URL?>class/edit/<?=$rs['id']?>" class="btn button-all btn-content"
                           title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                        <a href="<?=BASE_URL?>class/del/<?=$rs['id']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'turma')"
                           title="Inativar" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listClass == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('#table-class')});
</script>