<!DOCTYPE html>
<html>
    <head>
        <title> Learning </title>
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/users.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/report.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/admin.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/content.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/trash.css">
        <link rel="stylesheet" href="<?=BASE_URL?>node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
              integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
              crossorigin="anonymous">
        <script src="<?=BASE_URL?>node_modules/jquery/dist/jquery.min"></script>        
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>  
        <script src="<?=BASE_URL?>assets/js/alerts.js?v=2"></script>      
        <script> var BASE_URL = '<?=BASE_URL?>' </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
        <script src="<?=BASE_URL?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div id="geral">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?=BASE_URL?>"><i class="fas fa-graduation-cap fa-fw"></i> E-Learning</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bar-icon fas fa-bars fa-fw"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php if($viewData['permission'] == '3'): ?>
                            <li class="nav-item dropdown menu-admin">
                                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog fa-fw"></i> Administração
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?=BASE_URL?>group"><i class="fas fa-users fa-fw"></i> Grupos de Usuários</a>
                                    <a class="dropdown-item" href="<?=BASE_URL?>trash"><i class="fas fa-trash-alt fa-fw"></i> Lixeira</a>
                                </div>
                            </li> <!-- dropdown admin-->
                        <?php endif;?>
                        <?php if($viewData['permission'] == '2' || $viewData['permission'] == '3'): ?>
                            <li class="nav-item dropdown menu-content">
                                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-book fa-fw"></i> Conteúdos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?=BASE_URL?>class"><i class="fas fa-chalkboard-teacher fa-fw"></i> Turmas</a>
                                    <a class="dropdown-item" href="<?=BASE_URL?>course"><i class="fas fa-chalkboard-teacher fa-fw"></i> Cursos</a>
                                    <a class="dropdown-item" href="<?=BASE_URL?>lesson"><i class="fas fa-clipboard-list fa-fw"></i> Aulas</a>
                                    <a class="dropdown-item" href="<?=BASE_URL?>content"><i class="fas fa-pen fa-fw"></i> Conteúdos</a>
                                </div>
                            </li> <!-- dropdown content-->
                            <li class="nav-item dropdown menu-users">
                                <a class="nav-link dropdown-toggle" href="<?=BASE_URL?>users">
                                    <i class="fas fa-user-edit fa-fw"></i> Usuários
                                </a>
                            </li> <!-- dropdown users-->
                            <li style="" class="nav-item dropdown menu-report">
                                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-file-export"></i> Relatórios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Cursos Criados</a>
                                    <a class="dropdown-item" href="#">Cursos em Andamento</a>
                                    <a class="dropdown-item" href="#">Usuários</a>
                                </div>
                            </li> <!-- dropdown report-->
                        <?php endif;?>
                        <li class="nav-item dropdown menu-user-perfil" <?php if($viewData['permission'] == '1'):?>
                            style="position: relative; left: 80%;transform: translateX(-80%); margin-left:0px;" <?php endif;
                        if($viewData['permission'] == '2'):?> style="position: relative; left: 50%;transform: translateX(-50%);
                                margin-left:0px;" <?php endif;?>>
                            <a class="nav-link dropdown-toggle" href="#" id="" title="Editar Perfil" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i> Olá, <?=$viewData['nameUser']?>!
                            </a>
                            <div class="dropdown-menu dropdown-perfil-user" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item item-perfil-user" href="<?=BASE_URL?>users/myprofile">
                                    <i class="fas fa-cog fa-fw"></i> Meu Perfil</a>
                            </div>
                        </li> <!-- dropdown perfil-user-->
                        <li class="nav-item dropdown btn-logout" <?php if($viewData['permission'] == '1'):?>
                            style="position: relative; left: 71%;transform: translateX(-80%); margin-left:5%;" <?php endif;
                            if($viewData['permission'] == '2'):?>style="position: relative; left: 50%;transform: translateX(-50%);
                            margin-left:0% !important;" <?php endif;?>>
                            <button id="btn-logout" class="btn"  onclick="logout()" title="Logout" style="color:#fff">
                                <i class="fas fa-sign-out-alt fa-fw"></i> Sair
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
            <main id="main" class="container">
                <div id="main-content" class="col-12">
                    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                </div>
            </main>
        <footer><p class="footer-copyright text-center"> <small>Todos os Direitos Reservados &copy;</small>  </p></footer>
        <script src="<?=BASE_URL?>assets/js/main.js"></script>
        <script src="<?=BASE_URL?>assets/js/formValidate.js"></script>        
    </body>
</html>