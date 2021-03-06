<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="admin-color"><i class="fas fa-trash-alt"> </i> Lixeira</h3>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-content-tab" data-toggle="pill" href="#pills-content" role="tab" aria-controls="pills-users" aria-selected="true">Conteúdos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-lesson-tab" data-toggle="pill" href="#pills-lesson" role="tab" aria-controls="pills-content" aria-selected="false">Aulas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="false">Cursos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-class-tab" data-toggle="pill" href="#pills-class" role="tab" aria-controls="pills-class" aria-selected="false">Turmas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-group-tab" data-toggle="pill" href="#pills-group" role="tab" aria-controls="pills-group" aria-selected="false">Grupos de Usuários</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane show active" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab">
        <div class="table-responsive-lg">
            <table class="table table-list table-trash">
                <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listContent != null):?>
                    <?php foreach($listContent as $rs): ?>
                        <tr>
                            <td class="title-table-trash"><?=$rs['title']?></td>                            
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryContent/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
         </div>
    </div>
    <div class="tab-pane" id="pills-lesson" role="tabpanel" aria-labelledby="pills-lesson-tab">
        <div class="table-responsive-lg">
            <table class="table table-list table-trash">
                <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listLesson != null):?>
                    <?php foreach($listLesson as $rs): ?>
                        <tr>
                            <td class="title-table-trash"><?=$rs['title']?></td>                            
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryLesson/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'aula', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'aula')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
        <div class="table-responsive-lg">
            <table class="table table-list table-trash">
                <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listCourse != null):?>
                    <?php foreach($listCourse as $rs): ?>
                        <tr>
                            <td class="title-table-trash"><?=$rs['title']?></td>                            
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryCourse/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'curso', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'curso')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane" id="pills-class" role="tabpanel" aria-labelledby="pills-class-tab">
        <div class="table-responsive-lg">
            <table class="table table-list table-trash">
                <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listClass != null):?>
                    <?php foreach($listClass as $rs): ?>
                        <tr>
                            <td class="title-table-trash"><?=$rs['title']?></td>                            
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryClass/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'curso', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'curso')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane" id="pills-group" role="tabpanel" aria-labelledby="pills-group-tab">
        <div class="table-responsive-lg">
            <table class="table table-list table-trash">
                <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listGroup != null):?>
                    <?php foreach($listGroup as $rs): ?>
                        <tr>
                            <td class="title-table-trash"><?=$rs['title']?></td>                            
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryGroup/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'grupo', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteGroup/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'grupo')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('.table-list')});
</script>