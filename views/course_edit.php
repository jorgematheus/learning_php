<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="content-color"><i class="fas fa-pencil-alt fa-fw"></i>Edição de Curso</h3>
<?php if(isset($img_invalid)) include "assets/includes/img_invalid.php";?>
<form id="form-course" method="POST" enctype="multipart/form-data">
    <div class="row no-gutters">  
        <div class="col-md-2 col-12">
            <?php if($courseData['image'] == 'course-default-image.jpg'):?>
                <div class="break-img-edit"></div>
            <?php endif;?>
            <?php if($courseData['image'] != 'course-default-image.jpg'):?>
                <a title="Deletar imagem" class="btn btn-del-image float-right btn-content-icon" 
                data-class="course" id="<?=$courseData['id']?>"> 
                <i class="fas fa-times-circle"></i>
                </a> 
            <?php endif;?>       
            <img src="<?=BASE_URL?>img/courses/<?=$courseData['image']?>" width="250" height="250" 
            class="img-class rounded float-left img-thumbnail img-fluid img-edit-e" alt="Imagem do Curso"
            title="<?=$courseData['image']?>"> 
        </div>
        <div class="col-md-4 col-12">     
            <input type="file" class="form-control input-file" id="class-photo" name="course-photo">
        </div>
    </div>
    <div class="form-group">
        <label for="course-title">Título</label>
        <input type="text" class="form-control" id="course-title" name="course-title"
               value="<?=$courseData['title']?>" placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="course-description">Descrição</label>
        <input type="text" class="form-control" id="course-description" name="course-description"
               value="<?=$courseData['description']?>" placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
</form>
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Selecionar Aula
</button>
<br><br>
<h3>Aulas Vinculadas</h3>
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
        <?php if($listLessonAddToCourse != null):?>
            <?php foreach($listLessonAddToCourse as $rs): ?>
                <tr>
                    <td class="title-table-contents"><?=$rs['title']?></td>
                    <td class="description-table-contents"><?=$rs['description']?></td>
                    <td>
                        <a href="<?=BASE_URL?>course/deleteLesson/<?=$rs['idCourse']?>/<?=$rs['idLesson']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'lição')"
                           title="Excluir" class="btn-del btn button-all btn-content"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listLessonAddToCourse == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
<!-- Modal -->
<form id="form-add-ajax" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Conteúdos</h5>
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
                                <?php if($listLesson != null):?>
                                    <?php foreach($listLesson as $rs): ?>
                                            <tr>
                                                <td class="title-modal"><?=$rs['title']?></td>
                                                <td class="description-modal"><?=$rs['description']?></td>
                                                <td> <input type="checkbox" class="form-control" id="course-description"
                                                        name="check-content[]" value="<?=$rs['id']?>" > </td>
                                            </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?php if($listLesson == null):?>
                            <p class="text-center">Nenhum dado encontrado.</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-content">Vincular</button>
            </div>
        </div>
    </div>
</form>
</div>
<script> $(document).ready(function(){ adapterTextTable(); }) </script>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('.table-list')});  
</script>
<?php if (isset($feedback_success)):?>
    <script> feedbackSuccess(<?php echo "'".$feedback_success."'"; ?>, 'course');</script>
<?php endif;?>
<?php if (isset($feedback_error)):?>
    <script> feedbackError(<?php echo "'".$feedback_error."'"; ?>);</script>
<?php endif;?>