<?php
   $pageName = "corpo-docente";
   $vSTitulo ='Corpo Docente da ';
   $vSName = 'corpodocente';
require_once('header.php');
    require_once 'transaction/transactionDocentes.php';

    $docentes = findAllDocentes();
?>

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $vSTitulo; ?> DPM Educação</title>
	<link rel="shortcut icon" type="image/x-icon" href="./favicon/educ32x32.png" type="image/x-icon">
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

	<link rel="stylesheet" href="owlcarousel/owl.carousel.css">
	<!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">-->

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-touch-icon.png">
	<!--<link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon/educ16x16.png">-->
	<link rel="icon" href="./favicon/educ32x32.png" type="image/x-icon">
	<!--<link rel="manifest" href="./favicon/site.webmanifest">-->
	<link rel="shortcut icon" href="./favicon/favicon32x32.png"/>
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">


<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-2 mb-2">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Corpo Docente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <p class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">O corpo docente da DPM Educação é formado por especialistas, mestres e doutores reconhecidos em suas áreas de atuação, comprometidos em dividir seus conhecimentos de forma prática e orientados à formação e a capacitação de gestores e servidores públicos municipais.</p>
                                <p class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">Com robusta formação acadêmica e experiência de atuação com entes públicos municipais, os membros de nosso corpo docente compartilham a excelência em ensino e em pesquisa.</p>
                                <p class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">Abaixo, segue a lista de nossos docentes em ordem alfabética.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0"><!-- begin section search -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <div class="box-search">
                                    <form id="" class="" action="" method="" target="">
                                        <i class="icon-search fa fa-search"></i>
                                        <input class="input-search" type="text" id="filter_input" placeholder="Pesquisar Docente ...">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="scrolling-bar">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                    <ul id="docentes" class="list-docents">
                                    <?php  foreach($docentes as $docente) :?>
                                        <li class="content-docents">
                                            <div class="img-docent">
                                                <img width="125" height="125" class="rounded-circle" src="../app/ImagensCorpoDocente/<?php echo $docente['CODFOTO']; ?>">
                                            </div>
                                            <div class="some-details-docent">
                                                <div class="name-docent roboto-bold text-orange-theme text-sub-title-16">
                                                    <?php echo $docente['CODNOME']; ?>
                                                </div>
                                                <p class="body-docent roboto-regular text-gray-3 text-justify margin-bottom-quem-somos text-sub-title-15">
                                                    <?php echo $docente['CODDESCRICAOSUCINTA']; ?>
                                                </p>
                                                <div class="col-12 pt-2 pb-0 px-0">
                                                    <hr class="bloco-linha width-60"><a href="./corpo-docente/<?= $docente['CODCODIGO']; ?>" class="btn-outline-orange">ver mais</a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>