<h3 class="content-color"><i class="fas fa-clipboard-list fa-fw"></i>Adicionar Nova Aula</h3>
<form id="form-lesson" method="POST">
    <div class="form-group">
        <label for="lesson-title">Título</label>
        <input type="text" class="form-control" id="lesson-title" name="lesson-title"
               placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="lesson-description">Descrição</label>
        <input type="text" class="form-control" id="lesson-description" name="lesson-description"
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