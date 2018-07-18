<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/datepicker3.less">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?=BASE_URL?>vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">
<h3 class="text-center"> Editar Usuário </h3>
<div  class="row">
    <div class="col-12">
        <form id="edit-user" method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Nome*</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome*" value="<?=$userData['usuario']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" disabled id="email" value="<?=$userData['email']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control" value="<?=$userData['celular']?>" placeholder="Ex: (11) 91234-5678">
                </div>
                <div class="form-group col-md-6   input-date">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="text" id="nascimento" name="nascimento" class="form-control" value="<?=$userData['dt_nascimento']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo de Usuário*</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="1" <?=$userData['tipo_user'] == '1' ? 'selected="selected"' : ''?>>Aluno</option>
                        <option value="2" <?=$userData['tipo_user'] == '2' ? 'selected="selected"' : ''?>>Editor</option>
                        <option value="3" <?=$userData['tipo_user'] == '3' ? 'selected="selected"' : ''?>>Administrador</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status*</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" <?=$userData['ativo'] == '1' ? 'selected="selected"' : ''?>>Ativo</option>
                        <option value="0" <?=$userData['ativo'] == '0' ? 'selected="selected"' : ''?> >Inativo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Senha*</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                </div>
            </div>
            <button type="submit" class="btn button-all"><i class="fas fa-save"></i>  Salvar</button>
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
                        <span><i class="fas fa-check"></i> <?=$feedback; ?></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($feedback)):?>
            <script> callModal('#modal-feedback');</script>
        <?php endif;?>
    </div>
</div>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=BASE_URL?>vendor/datepicker/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script>callDatePicker();</script>