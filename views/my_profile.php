<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/datepicker3.less">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">
<h3 class="users-color"><i class="fas fa-cog"></i> Meu Perfil</h3>
<form id="form-my-profile" method="POST">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Nome*</label>
            <input autocomplete="off" type="text" class="form-control" id="name" name="name" value="<?=$userData['name']?>" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email*</label>
            <input autocomplete="off" type="email"  disabled class="form-control" id="email" name="email" value="<?=$userData['email']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Celular</label>
            <input autocomplete="off" type="text" name="phone" id="phone" class="form-control"
                   value="<?=$userData['phone']?>" placeholder="Ex: (11) 91234-5678">
        </div>
        <div class="form-group col-md-6 input-date">
            <label for="birth">Data de Nascimento</label>
            <input autocomplete="off" type="text" id="birth" name="birth" class="form-control"
                   value="<?=date('d/m/Y', strtotime(str_replace('-', '/', $userData['birth'])))?>">
        </div>
        <div class="form-group col-md-6">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
    </div>
    <button type="submit" class="btn button-all btn-user" ><i class="fas fa-save fa-fw"></i> Salvar</button>
</form>
<?php if (isset($feedback)):?>
    <script>feedbackSuccess($feedback);</script>        
<?php endif;?>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script>callDatePicker();</script>