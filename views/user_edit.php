<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/datepicker3.less">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">
<h3 class="users-color"><i class="fas fa-pen fa-fw"></i> Edição de Usuário </h3>
<?php if(isset($feedback_img)):?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Formato de imagem inválido!</strong> <br>
     <p>Formatos permitidos: <b>.gif | .bmp | .png | .jpg | .jpeg</b> </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif;?>
<form id="edit-user" enctype="multipart/form-data" method="POST"> 
    <div class="row no-gutters">        
        <div class="col-md-2 col-12">
            <?php if($userData['image'] == 'user-profile-default.png'):?>
                <div class="break-img-edit"></div>
            <?php endif;?>
            <?php if($userData['image'] != 'user-profile-default.png'):?>
                <a title="Deletar imagem" class="btn btn-del-image float-right btn-content-icon" 
                data-class="users" id="<?=$userData['id']?>">
                <i class="fas fa-times-circle"></i>
                </a> 
            <?php endif;?>       
            <img src="../../img/users/<?=$userData['image']?>" width="250" height="250" 
            class="img-class rounded float-left img-thumbnail img-fluid img-edit-e" alt="Imagem do Usuário"
            title="Imagem do Usuário"> 
        </div>        
        <div class="col-md-4 col-12">     
            <input type="file" class="form-control input-file" id="class-photo" name="photo">
        </div>        
    </div>      
    <div class="row">            
        <div class="form-group col-md-6">
            <label for="name">Nome*</label>
            <input autocomplete="off" type="text" class="form-control" id="name" name="name" placeholder="Nome*" value="<?=$userData['name']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email*</label>
            <input autocomplete="off" type="email" class="form-control" disabled id="email" value="<?=$userData['email']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">phone</label>
            <input autocomplete="off" type="text" name="phone" id="phone" class="form-control" value="<?=$userData['phone']?>" placeholder="Ex: (11) 91234-5678">
        </div>
        <div class="form-group col-md-6   input-date">
            <label for="birth">Data de Nascimento</label>
            <input autocomplete="off" type="text" id="birth" name="birth" class="form-control" value="<?=date('d/m/Y',strtotime($userData['birth']))?>">
        </div>
        <div class="form-group col-md-6">
            <label for="type_user">Tipo de Usuário*</label>
            <select name="type_user" id="type_user" class="form-control">
                <option value="1" <?=$userData['type_user'] == '1' ? 'selected="selected"' : ''?>>Aluno</option>
                <option value="2" <?=$userData['type_user'] == '2' ? 'selected="selected"' : ''?>>Editor</option>
                <option value="3" <?=$userData['type_user'] == '3' ? 'selected="selected"' : ''?>>Administrador</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="password">Senha*</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
    </div>
    <button type="submit" class="btn button-all btn-user"><i class="fas fa-save fa-fw"></i>  Salvar</button>
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
    <script> callModalEdit('#modal-feedback', 'users');</script>
<?php endif;?>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script>callDatePicker();</script>