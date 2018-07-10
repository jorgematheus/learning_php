<h3 class="text-center"> Editar Usuário </h3>
<div  class="row">
    <div class="col-6 offset-3">
        <form id="new-user" method="POST">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome*" value="<?=$userData['usuario']?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" disabled class="form-control" id="email"  value="<?=$userData['email']?>">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha*">
            </div>
            <input type="submit" class="btn button-all" value="Editar">
        </form>
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
</div>