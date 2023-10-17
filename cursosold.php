<?php
require_once('header.php');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionTabela.php';

$cursos = comboCursos(0, 100);
$areas = comboTabelas('TREINAMENTOS - INDICE POR AREA DE CONHECIMENTO');
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>
<base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />


<!-- SEO META TAGS -->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= vSTituloSite; ?> Agenda de Cursos</title>
<link rel="shortcut icon" type="image/x-icon" href="./favicon/educ32x32.png" type="image/x-icon">
<meta name="description" content="DPM Educação é uma instituição de ensino com a missão de contribuir para o aprimoramento das Administrações Municipais, através da formação de servidores e demais agentes públicos nas mais diversas áreas de atuação, oferecendo conhecimento qualificado e atualizado para o exercício, com excelência, da função pública." />
<meta name="keywords" content="cursos, treinamentos" />
<meta name="author" content="Teraware Soluções em Software e Internet" />
<meta name="HandheldFriendly" content="True">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
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
<head>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5Z657KX');
	</script>
	<!-- End Google Tag Manager -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-152543784-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-152543784-1');

		gtag('config', 'AW-697241409');
	</script>

	<!-- Global site tag (gtag.js) - Google Ads: 697241409 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-697241409"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'AW-697241409');
	</script>

	<!-- Event snippet for Visitou a página conversion page -->
	<script>
		gtag('event', 'conversion', {
			'send_to': 'AW-697241409/Q0FkCIGKkbQBEMGevMwC'
		});
	</script>


	<!-- Hotjar Tracking Code for http://www.dpmeducacao.com.br/ -->
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 1572140,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>



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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0">
                       <!--<div class="center-div">
                            <span class="roboto-bold text-lead-header">PESQUISAR CURSOS</span>
                        </div>
                        <div class="col-12 roboto-regular text-gray-3 text-sub-title-15 px-0">
                            <span class="roboto-bold">ATENÇÃO:</span> A consulta deverá conter obrigatoriamente a indicação de no mínimo uma <span class="roboto-bold">palavra-chave</span> com o <span class="roboto-bold">radical</span> do nome do curso buscado. Exemplo: “Contratos”.
                        </div>

                        <div class="col-12 px-0 py-0">
                            <!-- begin section search
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pl-0">
                                    <div class="box-search">
                                        <form id="" class="" action="" method="" target="">
                                            <i class="icon-search fa fa-search"></i>
                                            <input class="input-search" type="text" id="filter_input_cursos" placeholder="Procurar Cursos">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl-0">
                            <div class="center-div">
                                <span class="roboto-bold text-lead-header">PESQUISAR CURSOS POR ÁREA DE INTERESSE</span>
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <select id="curso_area" name="curso_area" class="custom-select input-select" onchange="directArea(this.value);">
                                    <option disabled selected>Selecione cursos por área de interesse</option>
                                    <?php foreach ($areas as $area) : ?>
                                        <option value="<?= $area['TABCODIGO']; ?>"><?= $area['TABDESCRICAO']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>-->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row" id="retCursos">

                                    <?php foreach ($cursos as $item) : ?>
                                        <div class="col-xs-12 col-ms-12 col-md-4 flex-item-column">
                                            <div class="card-items bg-beige-theme space-between">
                                                <div>
                                                    <?php $imagem = (isset($item['CURTITULOSITE'])) ? $item['CURTITULOSITE'] : '' ?>
                                                    <!--<img class="img-fluid mx-auto d-block" <?php if (isset($item['CURIMAGEM'])) : ?> src="https://educacao.dpm-rs.com.br//imagensSite/<?= $item["CURIMAGEM"]; ?>" <?php else : ?> src="https://dpmeducacao.com.br/imgs/curso1.jpg" <?php endif; ?>>-->
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 px-2 pb-0">
                                                        <p class="divcursos roboto-medium text-line-height-19">
                                                            <?= $item['CURTITULOSITE']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-12 pt-0 pb-0 pl-1">
                                                        <?php if ($item['CURDATAINICIO'] != $item['CURDATAFIM']) { ?>
                                                            <span class="date roboto-regular"><?= formatar_data($item['CURDATAINICIO']); ?></span>
                                                            <span class="date roboto-regular"><?= formatar_data($item['CURDATAFIM']); ?></span>
                                                        <?php } else { ?>
                                                            <span class="date roboto-regular"><?= formatar_data($item['CURDATAINICIO']); ?></span>
                                                        <?php }  ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-1 pb-2 mb-2 pl-1 text-line-height-11">
                                                        <span class="city text-margin-left-8 roboto-regular">
                                                            <?= $item['CIDDESCRICAO']; ?>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <?php if ($item['INSCRICOESEADATIVA'] == 'false') : ?>
                                                            <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                                                                <?php if ($item['CURNOVATURMA'] === 'S') : ?>
                                                                    <a class="btn button-link raleway-bold mt-1" style="background-color: #b9030f !important;" role="button">lotado</a>
                                                                                                                                           <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $item['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
                                                                                                                                           <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
                                                                        <p class="text-sub-title-10" style="background-color: #5b88a5">(Inscrições abertas)</p>
                                                                                                                                        </a>
                                                                    <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button" role="button">sobre o curso</a>
                                                                <?php else : ?>
                                                                    <a class="btn button-link raleway-bold mt-1" style="background-color: #b9030f !important;" role="button">lotado</a>
                                                                    <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $item['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
                                                                    <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button">sobre o curso</a>
                                                                <?php endif; ?>
                                                            <?php else : ?>
                                                                <a class="btn button-link raleway-bold mt-1" href="identificacao-acesso/<?= $item['CURCODIGO']; ?>"style="background-color: #f59330" role="button">Inscreva-se Aqui</a>
                                                                <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button">sobre o curso</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if ($item['INSCRICOESEADATIVA'] == 'true') : ?>
                                                            <?php if ($item['CURAOVIVO'] == 'false') : ?>
                                                                <a class="btn button-link raleway-bold mt-1" href="identificacao-acesso/<?= $item['CURCODIGO']; ?>"style="background-color: #f59330" role="button"> Inscreva-se Aqui</a>
                                                                <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button">sobre o curso</a>
                                                            <?php endif; ?>
                                                            <?php if ($item['CURAOVIVO'] == 'true') : ?>
                                                                <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                                                                    <?php if ($item['CURNOVATURMA'] === 'S') : ?>
                                                                        <a class="btn button-link raleway-bold mt-1" style="background-color: #b9030f !important;" role="button">lotado</a>
                                                                        <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $item['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
                                                                        <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
                                                                            <p class="text-sub-title-10" style="font-size: 10px; color: white">(Inscrições abertas)</p>
                                                                        </a>
                                                                        <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>"style="background-color: #045071" role="button">sobre o curso</a>

                                                                        <!--<a class="btn button-link raleway-bold mt-1" style="background-color: #b9030f !important;" role="button">lotado</a>
                                                                       <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $item['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
                                                                        <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>"style="background-color: #045071" role="button">sobre o curso</a>-->
                                                                    <?php endif; ?>
                                                                <?php else : ?>
                                                                   <a class="btn button-link raleway-bold mt-1" href="identificacao-acesso/<?= $item['CURCODIGO']; ?>" style="background-color: #f59330" role="button">Inscreva-se Aqui</a>
                                                                    <a class="btn button-link raleway-bold mt-1" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button">sobre o curso</a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
<!-- BEGIN SHAREAHOLIC CODE -->
<link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
<meta name="shareaholic:site_id" content="44e45da0bc93f827980251ac68118791" />
<script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
<!-- END SHAREAHOLIC CODE -->
                    </div>
                </div>
                <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>


<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
</body>

</html>