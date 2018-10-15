<!DOCTYPE html>
<html>
<head>
    <title> Learning </title>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
    <link rel="stylesheet" href="<?=BASE_URL?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="<?=BASE_URL?>">E-Learning</a>
</nav>
<div class="container">
    <!-- Button trigger modal -->
    <input type="hidden" id="btn-modal" data-toggle="modal" data-target="#modal-login">
    <!-- Modal login -->
    <div class="modal fade"  id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5><img src="<?=BASE_URL?>assets/img/icons/graduation-cap-solid.svg"
                            width="30" height="30" alt="E-learning Cap"> E-learning</h5>
                    <div id="bloco-login">
                        <form method="POST" id="form-login" name="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                            </div>
                            <input type="submit" class="btn button-all" id="login" value="Entrar">
                        </form> <br>                        
                        <?php if (isset($feedback) && !empty($feedback)):?>                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=$feedback?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=BASE_URL?>node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?=BASE_URL?>assets/js/main.js?v4"></script>
<script> var BASE_URL = '<?=BASE_URL?>' </script>
<script src="<?=BASE_URL?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready( function(){
    $('#btn-modal').trigger('click');
    });
    $('#modal-login').modal({
        keyboard: false,
        backdrop: 'static'
    });
</script>
</body>
</html>