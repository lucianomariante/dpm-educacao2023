<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
ob_end_clean();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPM - Educação</title>
    <link rel="stylesheet" type="text/css" href="library/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="library/slick/slick-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="libs/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="libs/sweetalert/dist/sweetalert.css">
    
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
   <!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">-->

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <!-- Google RECAPTCHA -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Start of  Zendesk Widget script -->
	<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=407b7160-09b5-48bf-a591-f6ffd42aead9"> </script>
	<!-- End of  Zendesk Widget script -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
    <style>
    .scrolling-bar {
        overflow-y: scroll;
        overflow-x: hidden;
        height: 1300px;
    }

    p .body-docent {
        -webkit-hyphens: auto;
        -moz-hyphens: auto;
        -ms-hyphens: auto;
        hyphens: auto;
    }
    </style>
    

</head>

<body>
    <div class="container-fluid">
        <div class="">
            <div class="row border-gray-bottom">
                <div
                    class="col-lg-2 col-md-12 col-sm-12 p-0 d-lg-flex d-md-flex align-items-stretch justify-content-lg-end justify-content-md-center">
                    <div class="icons-shared d-flex justify-content-sm-center justify-content-md-center clearfix">
                        <!-- begin social icons -->
                        <div class="border-left-icons d-flex align-items-center justify-content-center">
                            <a class="d-flex align-items-center justify-content-center"
                                href="https://www.facebook.com/dpmeducacao/" target="_blank"
                                title="link para página no facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="border-left-icons d-flex align-items-center justify-content-center">
                            <a class="d-flex align-items-center justify-content-center"
                                href="https://www.instagram.com/dpm.educacao/" target="_blank"
                                title="link para página no instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div> <!-- social icons -->
                </div>
                <div
                    class="col-lg-7 col-dm-7 col-sm-12 background-gray p-0 d-lg-flex d-sm-flex d-md-flex justify-content-lg-end justify-content-md-center justify-content-sm-center">
                    <div
                        class="d-lg-flex d-md-flex d-sm-flex align-items-md-center justify-content-lg-center justify-content-md-center justify-content-sm-center flex-center-form-mobile">
                        <?php if (empty($_SESSION['sICLICODIGO_SITE'])) : ?>
                        <form class="form-inline d-flex justify-content-sm-center align-items-center"
                            action="include/valida-login.php" method="POST">
                            <div class="form-group">
                                <label class="login roboto-medium text-blue-theme text-uppercase"
                                    for="login">Login:</label>
                                <input type="text" name="txtlogin" id="login" class="bg-light form-control"
                                    placeholder="Login ...">
                            </div>
                            <div class="form-group">
                                <label class="pass roboto-medium text-blue-theme text-uppercase"
                                    for="senha">Senha:</label>
                                <input type="password" name="txtsenha" id="senha" class="bg-light form-control"
                                    placeholder="Senha ...">
                            </div>
                            <input type="hidden" id="action" name="action" value="index">
                            <button type="submit"
                                class="btn btn-primary mt-sm-2 mt-md-0 mt-lg-0 roboto-medium ml-2 text-uppercase">Acessar</button>
                        </form>
                        <?php else : ?>
                        <div id="button-logon" class="btn-logon mr-2">
                            Você está logado como:
                            <strong><?php echo trim($_SESSION['sSCLINOMEFANTASIA_SITE']); ?></strong>
                            <a id="logoff" href="/logout" data-toggle="dica" title="Sair">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </a>
                        </div>
                        <?php endif;  ?>
                    </div>
                </div><!-- end form login -->
                <div class="col-lg-3 col-md-12 col-sm-12 p-0 d-lg-flex align-items-stretch">
                    <div class="row ml-1 d-flex justify-content-center">
                        <div class="phone d-flex align-items-center">
                            <div>
                                <img src="imgs/phone-icon.png" alt="" srcset="">
                                (51)3027-3400
                            </div>
                        </div>
                        <div class="app-icon">
                            <a href="https://www.dpmeducacao.com.br/mob/">
                                <img width="35" height="35" class="bg-blue-theme" src="./imgs/icone_mobile.svg" alt="">
                                App Mobile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 d-sm-flex justify-content-sm-center center-logo-brand-mobile">
                    <a href="/index">
                        <img class="block-center" src="imgs/Logo_DPM.png" alt="logo DPM educação" style="max-width: 90%; display: block">
                    </a>
                </div> <!-- end logo main -->
                
                
                
              <div class="col-xs-12 col-ms-12 col-md-10 col-lg-10 px-0 d-md-flex d-lg-flex d-xl-flex align-items-end flex-nav-icon-mobile">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white-theme p-0">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="quem-somos">Quem Somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="cursos">Cursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="certificacao-academica">Certificação Acadêmica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="corpo-docente">Corpo Docente</a>
                                </li>
<!--                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Hotéis e restaurantes</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item roboto-regular nav-menu"
                                            href="hoteis-conveniados">Hotéis</a>
                                        <a class="dropdown-item roboto-regular nav-menu"
                                            href="restaurantes-conveniados">Restaurantes</a>
                                    </div>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase"
                                        href="duvidas-frequentes">Dúvidas frequentes</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle roboto-medium nav-menu text-uppercase" href="#"
                                        id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Contato
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item roboto-regular nav-menu" href="fale-conosco">Fale
                                            Conosco</a>
                                        <a class="dropdown-item roboto-regular nav-menu"
                                            href="trabalhe-conosco">Trabalhe Conosco</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                  <div class="out-rosa"><img src="imgs/novembro-azul.jpg" width="160" alt=""/></div>
                </div>
            </div>
        </div>
    </div>