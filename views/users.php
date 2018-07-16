<a href="<?=BASE_URL?>users/add" class="btn button-all"> Cadastrar Novo Usuário </a>
<h3>Usuários Cadastrados</h3>
<?=date('d-m-Y H:i:s ');  ?>
<div class="table-responsive-lg">
    <table class="table table-light tabela-listagem">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    <?php foreach($listUsers as $rs): ?>
        <tr>
            <td><?=$rs['usuario']?></td>
            <td><?=$rs['email']?></td>
            <td><a href="<?=BASE_URL?>users/edit/<?=$rs['id']?>" class="btn button-all" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                <a  href="<?=BASE_URL?>users/del/<?=$rs['id']?>" id="btt"
                    onclick="deleteUser(event, $(this).attr('href'), $(this).parents('tr'))"
                   title="Excluir" class="btn-del btn button-all"><i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    <!-- Button trigger modal -->
    <input type="hidden" id="btn-modal" data-toggle="modal" data-target="#modal-login">
    <div class="modal fade"  id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span> <?=$feedback; ?> </span>
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
