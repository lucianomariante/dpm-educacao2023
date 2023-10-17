<?php include_once('include/constantes.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPM - Educação - <?= $vSTitulo;?></title>
    <link rel="stylesheet" type="text/css" href="library/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="library/slick/slick-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col">

	<div class="container-fluid border border-buttom">
  		<div class="row">
        	<div class="col-6 p-0 m-0 large-view">
	        	<div class="row">
            		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-4 offset-lg-1 p-0 social-icons clearfix">
	              		<div class="border-left-icons">
			                <a class="" href="#" alt="">
			                  <i class="fab fa-facebook-f"></i>
			                </a>
	              		</div>

		                <div class="border-left-icons">
			                <a class="" href="#" alt="">
			                  <i class="fab fa-youtube"></i>
			                </a>
		                </div>

		                <div class="border-left-icons border-right-icons">
		                   <a class="" href="#" alt="">
		                   <i class="fab fa-instagram"></i>
		                   </a>
		                </div>

            		</div> <!-- social icons -->
          		</div>
          	</div>

      		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto py-0">
	        	<div class="row justify-content-center justify-content-sm-center justify-content-md-center">
		            <div class="border-left-tel-icons phone text-gray-1 pl-3 py-1 m-0 mx-3">
		                <img src="imgs/phone-icon.png" alt="" srcset="">
		                (51)3094-3440
		            </div>
		            <div class="m-0 app-icon px-2 py-1">
		                <a href="#">
		                    <img class="bg-blue-theme" src="./imgs/app-icon-1.png" alt="">
		                    App Mobile
		                </a>
		            </div>
        		</div>
      		</div>
  		</div>
	</div>
	<div class="container-fluid mobile-view">
    	<div class="row justify-content-center">
    		<div class="col-12 mobile-view">
      			<div class="mx-auto d-block social-center-view-mobile">
        			<div class="border-left-icons">
	          			<a class="facebook" href="#" alt="">
	            			<i class="fab fa-facebook-f"></i>
	          			</a>
        			</div>

			        <div class="border-left-icons">
			          <a class="youtube" href="#" alt="">
			            <i class="fab fa-youtube"></i>
			          </a>
			        </div>

			        <div class="border-left-icons border-right-icons">
			          <a class="instagram" href="#" alt="">
			            <i class="fab fa-instagram"></i>
			          </a>
			        </div>
      			</div>
    		</div>
  		</div>
	</div>
	<div class="row">
        <div class="col-12">
            <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <a href="index.php">
                            <img class="img-fluid mx-auto d-block" src="imgs/Logo_DPM.png" alt="logo DPM educação">
                        </a>
                    </div> <!-- end logo main -->

                    <div class="col-xs-12 col-ms-12 col-md-9 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                       <div class="row justify-content-center ">

                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label class="login roboto-medium text-blue-theme text-uppercase" for="login">Login:</label>
                                                    <input type="text" name="" id="login" class="bg-light form-control" placeholder="Login ..." >
                                                </div>
                                                <div class="form-group">
                                                    <label class="pass roboto-medium text-blue-theme text-uppercase" for="senha">Senha:</label>
                                                    <input type="text" name="" id="pass" class="bg-light form-control" placeholder="Senha ..." >
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-sm-2 mt-md-0 mt-lg-0 roboto-medium ml-2 text-uppercase">Acessar</button>
                                            </form>
                                       </div>
                            </div> <!-- end form login -->

                            <div class="col-12">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white-theme">
                                    <a class="navbar-brand" href="#"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="quem-somos.php">Quem Somos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="certificacao-academica.php">Certificação Acadêmica</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="corpo-docente.php">Corpo Docente</a>
                                            </li>
                                                                                <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle roboto-medium nav-menu border-right-blue text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Localização
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item roboto-regular nav-menu" href="informacoes.php">Como Chegar</a>
                                        </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle roboto-medium nav-menu border-right-blue text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Hotéis e Restaurantes
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item roboto-regular nav-menu" href="hoteis.php">Hotéis</a>

         <a class="dropdown-item roboto-regular nav-menu" href="restaurantes.php">Restaurantes</a>
                                        </div>
                                            </li>

     <li class="nav-item">
                                                <a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="duvidas-frequentes.php">Dúvidas Frequentes</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle roboto-medium nav-menu text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Contato
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                                <a class="dropdown-item roboto-regular nav-menu" href="trabalhe-conosco.php">Trabalhe Conosco</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div> <!-- end nav menu -->
                        </div>
                    </div>
            </div>
        </div>
    </div><!-- end section header 2 Menu Top-->


		</div><!-- end col wireframe -->
	</div><!-- end row wireframe -->
</div><!-- end container top wireframe -->