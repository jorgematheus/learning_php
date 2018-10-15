<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3  class="users-color"><i class="fas fa-users"></i> Usuários Cadastrados</h3>
<?php if($permission == '3'): ?>
<a href="<?=BASE_URL?>users/add" class="btn button-all btn-main btn-user" title="Cadastrar Novo Usuário"><i class="fas fa-user-plus"></i> Novo Usuário </a>
<?php endif; ?>
<div class="table-responsive-lg">
    <table id="table-users" class="table table-list">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Ativo</th>
                <?php if($permission == '3'): ?>
                <th>Ações</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php if($listUsers != null):?>
        <?php foreach($listUsers as $rs): ?>
            <tr <?php $status = $rs['active'] == '1' ? 'user-active' : 'user-inactive'?> class="<?=$status?>">
            <td><?php if($rs['image'] != null):?><img src="img/users/<?=$rs['image']?>" 
                        width="50" height="50" alt="img class" title="Imagem Turma"> <?php endif;?> 
                    </td>
                <td><?=$rs['name']?></td>
                <td><?=$rs['email']?></td>
                <td><?=$rs['phone']?></td>
                <td><?php $status = $rs['active'] == '1' ? 'check' : 'ban'?> <i class="status-user fas fa-<?=$status?>"></i> </td>
                <?php if($permission == '3'): ?>
                    <td><a href="<?=BASE_URL?>users/edit/<?=$rs['id']?>" class="btn button-all btn-user"
                           title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                        <?php if($rs['active'] == '1'): ?>
                            <a  href="<?=BASE_URL?>users/inactive/<?=$rs['id']?>" id="btt"
                                title="Desativar" class="btn-del btn button-all btn-user"><i class="fas fa-ban fa-fw"></i>
                            </a>
                        <?php endif;?>
                        <?php if($rs['active'] == '0'): ?>
                            <a  href="<?=BASE_URL?>users/active/<?=$rs['id']?>" id="btt"
                                title="Ativar" class="btn-del btn button-all btn-user"><i class="fas fa-thumbs-up fa-fw"></i>
                            </a>
                        <?php endif;?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listUsers == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
    <!-- Button trigger modal -->
    <input type="hidden" id="btn-modal" data-toggle="modal" data-target="#modal-login">
    <div class="modal fade"  id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span><i class="fas fa-check"></i> <?=$feedback; ?> </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($feedback)):?>
        <script>callModal('#modal-feedback');</script>
    <?php endif;?>
</div>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('#table-users')});
</script>