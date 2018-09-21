<script src="<?=BASE_URL?>vendor/ckeditor/ckeditor.js"></script>
<h3 class="content-color"><i class="fas fa-book"></i> Inserção de Conteúdo</h3>
<form id="form-content" method="POST">
    <div class="form-group">
        <label for="content-title">Título</label>
        <input type="text" class="form-control" id="content-title" name="content-title"
               placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="content-description">Descrição</label>
        <input type="text" class="form-control" id="content-description" name="content-description"
               placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <label for="content">Conteúdo</label>
    <textarea name="content" id="content" rows="10" cols="80"></textarea>
    <script>CKEDITOR.replace('content'/*, { extraPlugins: 'imageuploader'}*/);</script> <br>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>  Salvar</button>
</form>
<?php if (isset($feedback_success)):?>
    <script> feedbackSuccess(<?php echo "'".$feedback_success."'"; ?>);</script>
<?php endif;?>
<?php if (isset($feedback_error)):?>
    <script> feedbackError(<?php echo "'".$feedback_error."'"; ?>);</script>
<?php endif;?>
