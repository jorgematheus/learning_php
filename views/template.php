<!DOCTYPE html>
<html>
    <head>
        <title> Learning </title>
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
        <link rel="stylesheet" href="<?=BASE_URL?>node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
              integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
              crossorigin="anonymous">
        <script src="<?=BASE_URL?>node_modules/jquery/dist/jquery.min"></script>
        <script> var BASE_URL = '<?=BASE_URL?>' </script>
        <script src="<?=BASE_URL?>assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
        <script src="<?=BASE_URL?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="geral">
            <nav class="navbar navbar-expand-lg">
                <?php if(1 === 1): ?>
                <a class="navbar-brand" href="<?=BASE_URL?>"><i class="fas fa-graduation-cap"></i> E-Learning</a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bar-icon fas fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown menu-admin">
                            <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> Administração
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Grupos de Usuários</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </li> <!-- dropdown admin-->
                        <li class="nav-item dropdown menu-content">
                            <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-book"></i> Conteúdo
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i> Turmas</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i> Cursos</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-clipboard-list"></i> Aulas</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-pen"></i> Conteúdos</a>
                            </div>
                        </li> <!-- dropdown content-->
                        <li class="nav-item dropdown menu-users">
                            <a class="nav-link dropdown-toggle" href="<?=BASE_URL?>users">
                                <i class="fas fa-user-edit"></i> Usuários
                            </a>
                        </li> <!-- dropdown users-->
                        <li style="padding-right: 400px;" class="nav-item dropdown menu-report">
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
                        <li class="nav-item dropdown menu-user-perfil">
                            <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <?php  $user = "Jorge Matheus Nunes Da Silva"; ?>
                                <i class="fas fa-user"></i> Olá, Jorge Matheus! <?php if(isset($nomeUser)) echo $nomeUser;?>
                            </a>
                            <div class="dropdown-menu dropdown-perfil-user" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item item-perfil-user" href="#"><i class="fas fa-cog"></i> Meu Perfil</a>
                            </div>
                        </li> <!-- dropdown perfil-user-->
                        <li class="nav-item dropdown menu-report"> <a class="nav-link" href="<?php BASE_URL?>login/logout" title="Logout"><i class="fas fa-sign-out-alt"></i></a> </li>
                    </ul>
                </div>
            </nav>
        </div>
            <main id="main" class="container">
                <div id="main-content" class="col-12">
                    <?php $this->loadViewInTemplate($viewNames, $viewDatas); ?>
                </div>
            </main>
        <footer><p class="footer-copyright text-center"> <small>Todos os Direitos Reservados</small>  </p></footer>
    </body>
</html>