<h3  class="users-color"><i class="fas fa-users"></i> Usuários Cadastrados</h3>
<a href="<?=BASE_URL?>users/add" class="btn button-all btn-main btn-user" title="Cadastrar Novo Usuário"><i class="fas fa-user-plus"></i> Novo Usuário </a>
<div class="table-responsive-lg">
    <table id="tabela-usuarios" class="table tabela-listagem">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if($listUsers != null):?>
        <?php foreach($listUsers as $rs): ?>
            <tr <?php $status = $rs['ativo'] == '1' ? 'user-active' : 'user-inactive'?> class="<?=$status?>">
                <td><?=$rs['usuario']?></td>
                <td><?=$rs['email']?></td>
                <td><?=$rs['celular']?></td>
                <td><?php $status = $rs['ativo'] == '1' ? 'check' : 'ban'?> <i class="fas fa-<?=$status?>"></i> </td>
                <td><a href="<?=BASE_URL?>users/edit/<?=$rs['id']?>" class="btn button-all btn-user"
                       title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></a>
                    <a  href="<?=BASE_URL?>users/del/<?=$rs['id']?>" id="btt"
                        onclick="callDelete(event,$(this).attr('href'), $(this).parents('tr'), 'usuário')"
                       title="Excluir" class="btn-del btn button-all btn-user"><i class="fas fa-trash-alt fa-fw"></i>
                    </a>
                </td>
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
        <script>
            callModal('#modal-feedback');
        </script>
    <?php endif;?>
</div>
