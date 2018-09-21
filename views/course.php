<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="content-color"><i class="fas fa-chalkboard-teacher fa-fw"></i> Cursos Cadastradas</h3>
<a href="<?=BASE_URL?>course/add" class="btn button-all btn-content btn-main" title="Cadastrar Novo Curso"><i class="fas fa-plus fa-fw"></i> Novo Curso </a>
<div class="table-responsive-lg">
    <table id="table-course" class="table table-list table-contents">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if($listCourse != null):?>
            <?php foreach($listCourse as $rs): ?>
                <tr>
                    <td class="title-table-contents"><?=$rs['title']?></td>
                    <td class="description-table-contents"><?=$rs['description']?></td>
                    <td><a href="<?=BASE_URL?>course/edit/<?=$rs['id']?>" class="btn button-all btn-content"
                           title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                        <a href="<?=BASE_URL?>course/del/<?=$rs['id']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                           title="Inativar" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listCourse == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('#table-course')});
</script>
