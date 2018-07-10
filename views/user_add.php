<h3> Cadastrar Novo Usuário</h3>
<div  class="row">
    <div class="col-6 offset-3">
        <form id="new-user" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nome*">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email*">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha*">
            </div>
            <input type="submit" class="btn btn-outline-primary" value="Cadastrar">
        </form>
        <?php if (isset($feedback)):?>
        <span> <?=$feedback; ?> </span>
        <?php endif;?>
    </div>
</div>