<a href="<?=BASE_URL?>users/add" class="btn button-all" title="Cadastrar Novo Usuário"><i class="fas fa-user-plus"></i> Novo Usuário </a>
<h3>Usuários Cadastrados</h3>
<div class="table-responsive-lg">
    <table class="table  tabela-listagem">
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
        <?php foreach($listUsers as $rs): ?>
            <tr>
                <td><?=$rs['usuario']?></td>
                <td><?=$rs['email']?></td>
                <td><?=$rs['celular']?></td>
                <td><?php $status = $rs['ativo'] == '1' ? 'check' : 'ban'?> <i class="fas fa-<?=$status?>"></i> </td>
                <td><a href="<?=BASE_URL?>users/edit/<?=$rs['id']?>" class="btn button-all" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                    <a  href="<?=BASE_URL?>users/del/<?=$rs['id']?>" id="btt"
                        onclick="deleteUser(event, $(this).attr('href'), $(this).parents('tr'))"
                       title="Excluir" class="btn-del btn button-all"><i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
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
