<h3 class="content-color"><i class="fas fa-pencil-alt fa-fw"></i>Edição de Turma</h3>
<form id="form-content" method="POST" enctype="multipart/form-data">
    <div class="row no-gutters">  
        <div class="col-md-2 col-12">
        <button class="btn del-image float-right btn-content-icon">
        <i class="fas fa-times-circle"></i>
        </button>
        
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
         value="<?=$classData['title']?>" placeholder="Informe um título com no máximo 100 caracteres.">
    </div>    
    <div class="form-group">
        <label for="class-description">Descrição*</label>
        <textarea class="form-control" id="class-description" 
        placeholder="Informe uma descrição com no máximo 255 caracteres."
        name="class-description"><?=$classData['description']?></textarea>       
    </div>       
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
</form>
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Selecionar Curso
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
                        <table class="table tabela-listagem">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form method="POST">
                                <?php if($listCourse != null):?>
                                    <?php foreach($listCourse as $rs): ?>
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
                        <?php if($listCourse == null):?>
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
<h3>Cursos Vinculados</h3>
<div class="table-responsive-lg">
    <table class="table tabela-listagem">
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
                    <td><?=$rs['title']?></td>
                    <td><?=$rs['description']?></td>
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
