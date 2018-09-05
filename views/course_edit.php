<h3 class="content-color"><i class="fas fa-pencil-alt fa-fw"></i>Edição de Curso</h3>
<form id="form-content" method="POST">
    <div class="form-group">
        <label for="content-title">Título</label>
        <input type="text" class="form-control" id="course-title" name="course-title"
               value="<?=$courseData['title']?>" placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="course-description">Descrição</label>
        <input type="text" class="form-control" id="lesson-description" name="course-description"
               value="<?=$courseData['description']?>" placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
</form>
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Selecionar Aula
</button>

<br><br>
<!-- Modal -->
<form id="form-add-ajax" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Conteúdos</h5>
                    <div class="table-responsive-lg">
                        <table class="table table-list">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form method="POST">
                                <?php if($listLesson != null):?>
                                    <?php foreach($listLesson as $rs): ?>
                                            <tr>
                                                <td><?=$rs['title']?></td>
                                                <td><?=$rs['description']?></td>
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
</form>
</div>
</div>
</div>
</form>
<!-- Button trigger modal -->
<input type="hidden" id="btn-modal" data-toggle="modal" data-target="#modal-login">
<div class="modal fade"  id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span><i class="fas fa-check"></i> <?=$feedback;?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($feedback)):?>
    <script> callModalEdit('#modal-feedback', 'lesson');</script>
<?php endif;?>
<h3>Aulas Vinculadas</h3>
<div class="table-responsive-lg">
    <table class="table table-list">
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
                    <td><?=$rs['title']?></td>
                    <td><?=$rs['description']?></td>
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
