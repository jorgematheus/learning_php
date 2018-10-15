<h3 class="content-color"><i class="fas fa-clipboard-list fa-fw"></i>Adicionar Novo Curso</h3>
<?php if(isset($img_invalid)) include "assets/includes/img_invalid.php";?>
<form id="form-course" method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="class-photo">Foto</label>
        <input type="file" class="form-control" name="course-photo">
    </div>
    <div class="form-group">
        <label for="course-title">Título</label>
        <input type="text" class="form-control" id="course-title" name="course-title"
               placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="course-description">Descrição</label>
        <input type="text" class="form-control" id="course-description" name="course-description"
               placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
    <br><br>
</form>
<?php if (isset($feedback_success)):?>
    <script> feedbackSuccess(<?php echo "'".$feedback_success."'"; ?>);</script>
<?php endif;?>
<?php if (isset($feedback_error)):?>
    <script> feedbackError(<?php echo "'".$feedback_error."'"; ?>);</script>
<?php endif;?>