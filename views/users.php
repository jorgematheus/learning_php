<a href="<?=BASE_URL?>users/add" class="btn button-all"> Cadastrar Novo Usuário </a>
<h3>Usuários Cadastrados</h3>
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
            <td><a href="<?=BASE_URL?>users/edit/<?=$rs['id']?>" class="btn button-all">Editar</a>
                <a  href="<?=BASE_URL?>users/del/<?=$rs['id']?>" id="btt"
                    onclick="del(event, $(this).attr('href'), $(this).parents('tr'))"
                   class="btn-del btn button-all">Excluir
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
