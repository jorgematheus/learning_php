<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="content-color"><i class="fas fa-pencil-alt fa-fw"></i>Edição de Turma</h3>
<?php if(isset($img_invalid)) include "assets/includes/img_invalid.php";?>
<form id="form-class" method="POST" enctype="multipart/form-data">
    <div class="row no-gutters">  
        <div class="col-md-2 col-12">
            <?php if($classData['image'] == 'class-default-image.jpg'):?>
                <div class="break-img-edit"></div>
            <?php endif;?>
            <?php if($classData['image'] != 'class-default-image.jpg'):?>
                <a title="Deletar imagem" class="btn btn-del-image float-right btn-content-icon" 
                data-class="class" id="<?=$classData['id']?>"> 
                <i class="fas fa-times-circle"></i>
                </a> 
            <?php endif;?>       
            <img src="../../img/classes/<?=$classData['image']?>" width="250" height="250" 
            class="img-class rounded float-left img-thumbnail img-fluid img-edit-e" alt="Imagem da Turma"
            title="Imagem da Turma"> 
        </div>
        <div class="col-md-4 col-12">     
            <input type="file" class="form-control input-file" id="class-photo" name="class-photo">
        </div>
    </div>
    <div class="form-group">
        <label for="class-title">Título*</label>
        <input type="text" class="form-control" id="class-title" name="class-title"
         value="<?=$classData['title']?>" minlength="3" maxlength="100" placeholder="Informe um título com no máximo 100 caracteres.">
    </div>    
    <div class="form-group">
        <label for="class-description">Descrição*</label>
        <textarea class="form-control" id="class-description" 
        placeholder="Informe uma descrição com no máximo 255 caracteres."
        minlength="3" maxlength="255"
        name="class-description"><?=$classData['description']?></textarea>       
    </div>       
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
</form>
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCurso">
    Selecionar Curso
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGrupo">
    Selecionar Grupo
</button>

<br><br>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="true">Cursos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-group-tab" data-toggle="pill" href="#pills-group" role="tab" aria-controls="pills-group" aria-selected="false">Grupos de Usuários</a>
    </li>    
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
    <h3>Cursos Vinculados</h3>
        <div class="table-responsive-lg">
            <table class="table table-list table-contents">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listCourseAddToClass != null):?>
                    <?php foreach($listCourseAddToClass as $rs): ?>
                        <tr>
                            <td class="title-table-contents"><?=$rs['title']?></td>
                            <td class="description-table-contents"><?=$rs['description']?></td>
                            <td>
                                <a href="<?=BASE_URL?>class/deleteCourse/<?=$rs['idClass']?>/<?=$rs['idCourse']?>" id="btt"
                                onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'curso')"
                                title="Excluir" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
            <?php if($listCourseAddToClass == null):?>
                <p class="text-center">Nenhum dado encontrado.</p>
            <?php endif;?>
        </div>
    </div>
    <div class="tab-pane" id="pills-group" role="tabpanel" aria-labelledby="pills-group-tab">
    <h3>Grupos Vinculados</h3>
        <div class="table-responsive-lg">
            <table class="table table-list table-contents">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listGroupAddToClass != null):?>
                    <?php foreach($listGroupAddToClass as $rs): ?>
                        <tr>
                            <td class="title-table-contents"><?=$rs['title']?></td>
                            <td class="description-table-contents"><?=$rs['description']?></td>
                            <td>
                                <a href="<?=BASE_URL?>class/deleteGroup/<?=$rs['idClass']?>/<?=$rs['idGroup']?>" id="btt"
                                onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'curso')"
                                title="Excluir" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
            <?php if($listGroupAddToClass == null):?>
                <p class="text-center">Nenhum dado encontrado.</p>
            <?php endif;?>
        </div>
    </div>   
</div>
    <!-- Modal Cursos -->
<form id="form-add-ajax" method="POST">
    <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Cursos</h5>
                    <div class="table-responsive-lg">
                        <table class="table table-list table-modal">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>                            
                                <?php if($listCourse != null):?>
                                    <?php foreach($listCourse as $rs): ?>
                                            <tr>
                                                <td class="title-modal"><?=$rs['title']?></td>
                                                <td class="description-modal"><?=$rs['description']?></td>
                                                <td> <input type="checkbox" class="form-control" id="course-description"
                                                            name="check-course[]" value="<?=$rs['id']?>" > </td>
                                            </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?php if($listCourse == null):?>
                            <p class="text-center">Nenhum dado encontrado.</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-content">Vincular</button>
                </div>
            </div>
        </div>
    </div>  
</form> 
   <!-- Modal Grupo -->
<form id="form-add-ajax" method="POST">
    <div class="modal fade" id="modalGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Grupos</h5>
                    <div class="table-responsive-lg">
                        <table class="table table-list table-modal">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>                            
                                <?php if($listGroup != null):?>
                                    <?php foreach($listGroup as $rs): ?>
                                            <tr>
                                                <td class="title-modal"><?=$rs['title']?></td>
                                                <td class="description-modal"><?=$rs['description']?></td>
                                                <td> <input type="checkbox" class="form-control" id="course-description"
                                                            name="check-group[]" value="<?=$rs['id']?>" > </td>
                                            </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?php if($listGroup == null):?>
                            <p class="text-center">Nenhum dado encontrado.</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-content">Vincular</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script> $(document).ready(function(){ adapterTextTable(); }) </script>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('.table-list')});
</script>
<?php if (isset($feedback_success)):?>
    <script> feedbackSuccess(<?php echo "'".$feedback_success."'"; ?>, 'class');</script>
<?php endif;?>
<?php if (isset($feedback_error)):?>
    <script> feedbackError(<?php echo "'".$feedback_error."'"; ?>);</script>
<?php endif;?>
