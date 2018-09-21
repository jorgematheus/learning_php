<h3 class="admin-color"><i class="fas fa-users fa-fw"></i>Adicionar Novo Grupo</h3>
<form id="form-group" method="POST">    
    <div class="form-group">
        <label for="group-title">Título*</label>
        <input type="text" class="form-control" id="group-title" name="group-title"
               placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="group-description">Descrição*</label>        
        <textarea class="form-control" id="group-description" name="group-description"
               placeholder="Informe uma descrição com no máximo 255 caracteres."></textarea>
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