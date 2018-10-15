<script src="<?=BASE_URL?>vendor/ckeditor/ckeditor.js"></script>
<h3 class="content-color"><i class="fas fa-pen fa-fw"></i> Edição de Conteúdo</h3>
<form id="form-content" method="POST">
    <div class="form-group">
        <label for="content-title">Título</label>
        <input type="text" class="form-control" id="content-title" name="content-title"
               placeholder="Informe um título com no máximo 100 caracteres." value="<?=$contentData['title']?>">
    </div>
    <div class="form-group">
        <label for="content-description">Descrição</label>
        <input type="text" class="form-control" id="content-description" name="content-description"
               placeholder="Informe uma descrição com no máximo 255 caracteres." value="<?=$contentData['description']?>" >
    </div>
    <label for="content">Conteúdo</label>
    <textarea name="content" id="content" rows="10" cols="80"><?=$contentData['content']?></textarea>
    <script>CKEDITOR.replace( 'content');</script> <br>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>  Salvar</button>
</form>
<!-- Button trigger modal -->
<input type="hidden" id="btn-modal" data-toggle="modal" data-target="#modal-feedback">
<div class="modal fade"  id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-feedback" aria-hidden="true">
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
<?php if (isset($feedback_success)):?>
    <script> feedbackSuccess(<?php echo "'".$feedback_success."'"; ?>, 'content');</script>
<?php endif;?>
<?php if (isset($feedback_error)):?>
    <script> feedbackError(<?php echo "'".$feedback_error."'"; ?>);</script>
<?php endif;?>