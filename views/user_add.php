<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/datepicker3.less">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">
<h3 class="text-center"> Cadastrar Novo Usuário</h3>
<form id="new-user" method="POST">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Nome*</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email*</label>
            <input type="email"  class="form-control" id="email" name="email">
        </div>
        <div class="form-group col-md-6">
            <label for="celular">Celular</label>
            <input type="text" name="celular" id="celular" class="form-control" placeholder="Ex: (11) 91234-5678">
        </div>
        <div class="form-group col-md-6   input-date">
            <label for="data-nascimento">Data de Nascimento</label>
            <input type="text" id="data-nascimento" name="nascimento" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="tipo">Tipo de Usuário*</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="1">Aluno</option>
                <option value="2">Editor</option>
                <option value="3">Administrador</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
    </div>
    <input type="submit" class="btn button-all" value="Cadastrar">
</form>
<br>
<div class="alert alert-info">
    <small>(*)  - Campos que devem obrigatoriamente ser preenchidos!</small><br>
    <small><strong>Tipo de Usuários</strong> <br>
        Aluno - Possui acesso para realizar os cursos em que está vinculado. <br>
        Editor - Permissão para editar, publicar conteúdos e extrair relatórios. <br>
        Administrador - Acesso em todas as áreas da aplicação.
    </small>
</div>
<?php if (isset($feedback)):?>
<span> <?=$feedback; ?> </span>
<?php endif;?>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script>callDatePicker();</script>