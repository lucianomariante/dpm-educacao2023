<?php

$pageName = "Detalhes dos";
$vSTitulo = 'Detalhes dos Cursos';
$vSName = 'cursos-detalhes';
setlocale( LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
require_once 'header.php';
require_once 'transaction/transactionCursos.php';
require_once 'transaction/transactionDocentes.php';

$codcurso = filter_var( $parametros[ 1 ], FILTER_SANITIZE_NUMBER_INT );
$curso = findCursoById( $codcurso );
$instrutor = findInstrutorByIdCurso( $codcurso );
$investimento = findValoresByIdCurso( $codcurso );
$video = findVideoByIdCurso( $codcurso );

$nro_vagas = $curso[ 'CURVAGAS' ];
$nro_vagas_disponiveis = $nro_vagas - $curso[ 'CURMATRICULADOS' ];
$vIRand = rand( 1, 3 );
$vSImagem[ 1 ] = 'banner1.png';
$vSImagem[ 2 ] = 'banner2.png';
$vSImagem[ 3 ] = 'banner3.png';
//echo nl2br($curso['CURDATAHORARIOSITE']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
<base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?= $vSTitulo; ?>
DPM Educação</title>
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

<div class="container-fluid carousel-inner px-0"> <img class="img-fluid banner-hide-sm" src="./imgs/<?= $vSImagem[$vIRand]; ?> " alt="" id="bannerAleatorio" name="bannerAleatorio">
  <div class="card-body carousel-caption text-img-top-center"></div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 px-0 pb-5">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"> 
          <!-- mobile view -->
          <div class="box-inscreva bg-blue-theme text-white-theme visibility-hidden"> 
            <!-- <h3 class="roboto-bold-italic text-sub-title-24">Quando?</h3>
						<p class="roboto-regular text-sub-title-17">
							<?= nl2br($curso['CURDATAHORARIOSITE']); ?>
						</p>
						<!-- <h3 class="roboto-bold-italic text-sub-title-24">Onde?</h3>
						<p class="roboto-regular text-sub-title-17">-->
            <?= strip_tags($curso['CURLOCALSITE'], '<b><strong>'); ?>
            </p>
            <h3 class="roboto-bold-italic text-sub-title-24">Para Quem?</h3>
            <p class="roboto-regular text-sub-title-17">
              <?= strip_tags($curso['CURPUBLICOALVOSITE'], '<b><strong>'); ?>
            </p>
            <?php if ($curso['INSCRICOESEADATIVA'] == 'false') : ?>
            <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
            <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a> <a class="raleway-bold btn btn-accept btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
            <p class="text-sub-title-10 fonteBranca">(Inscrições abertas)</p>
            <br>
            </a>
            <?php else : ?>
            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
            <?php endif; ?>
            <?php else : ?>
            <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button"> Inscreva-se</a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if ($curso['INSCRICOESEADATIVA'] == 'true') : ?>
            <?php if ($curso['CURAOVIVO'] == 'false') : ?>
            <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
            <?php endif; ?>
            <?php if ($curso['CURAOVIVO'] == 'true') : ?>
            <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
            <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a style="color: white" class="raleway-bold btn btn-accept btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
            <p class="text-sub-title-10" style="font-size: 10px; color: white">(Inscrições abertas)</p>
            </a> <a class="raleway-bold btn btn-blue btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a>
            <?php endif; ?>
            <?php else : ?>
            <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
          </div>
          <!-- en mobile view --> 
          <!-- large view -->
          <div>
            <div class="box-float box-inscreva bg-blue-theme text-white-theme box-floating large-visible quando dont-show">
              <?php if ($curso['CURCURSO'] = 'CURSO AO VIVO' || $curso['CURCURSO'] = 'CURSO PRESENCIAL') : ?>
              <h3 class="roboto-bold-italic text-sub-title-24">Quando?</h3>
              <p class="roboto-regular text-sub-title-17">
                <?= nl2br(strip_tags($curso['CURDATAHORARIOSITE'], '<b><strong><br><br/><br />')); ?>
              </p>
              <?php endif; ?>
              <!-- <h3 class="roboto-bold-italic text-sub-title-24">Onde?</h3> -->
              <p class="roboto-regular text-sub-title-17  text-justify">
                <?= nl2br(strip_tags($curso['CURLOCALSITE'], '<b><strong>')); ?>
              </p>
              <h3 class="roboto-bold-italic text-sub-title-24">Para Quem?</h3>
              <p class="roboto-regular text-sub-title-17 text-justify">
                <?= strip_tags($curso['CURPUBLICOALVOSITE'], '<b><strong>'); ?>
              </p>
              <?php if ($curso['INSCRICOESEADATIVA'] == 'false') : ?>
              <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
              <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
              <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a> <a class="raleway-bold btn btn-accept btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
              <p class="text-sub-title-10 fonteBranca">(Inscrições abertas)</p>
              <br>
              </a>
              <?php else : ?>
              <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
              <?php endif; ?>
              <?php else : ?>
              <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button"> Inscreva-se</a>
              <?php endif; ?>
              <?php endif; ?>
              <?php if ($curso['INSCRICOESEADATIVA'] == 'true') : ?>
              <?php if ($curso['CURAOVIVO'] == 'false') : ?>
              <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
              <?php endif; ?>
              <?php if ($curso['CURAOVIVO'] == 'true') : ?>
              <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
              <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
              <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a style="color: white" class="raleway-bold btn btn-accept btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
              <p class="text-sub-title-10" style="font-size: 10px; color: white">(Inscrições abertas)</p>
              </a> <a class="raleway-bold btn btn-blue btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a>
              <?php endif; ?>
              <?php else : ?>
              <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
              <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <!-- end large view -->
          
          <div class="aside-menu">
            <ul>
              <li><a href="#apresentacao">Apresentação</a></li>
              <li><a href="#datahora">Data / Horário</a></li>
              <?php if ($curso['EAD'] == 'false') { ?>
              <li><a href="#local">Local</a></li>
              <?php } ?>
              <li><a href="#cargahora">Carga Horária</a></li>
              <li><a href="#publicoalvo">Público-Alvo</a></li>
              <?php if ($curso['EAD'] == 'true') { ?>
              <li><a href="#programa">Metodologia</a></li>
              <?php } ?>
              <li><a href="#professor">Professor(a)</a></li>
              <li><a href="#investimento">Investimento</a></li>
              <li><a href="#instrucoes">Instruções</a></li>
            </ul>
          </div>
          <div class="curso-site-banner"> <a href="https://dpm-rs.com.br/central_aluno/login.php"> <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/chamada_lateral.png" alt=""> </a> <a href="hoteis-conveniados"> <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/hoteis-conveniados.png" style="border-top: none !important; border-bottom: none" alt=""> </a> <a href="restaurantes-conveniados"> <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/restaurantes-conveniados.png" style="border-top: none !important; border-bottom: none" alt=""> </a>
            <div class="col-12 roboto-regular text-center text-gray-3 text-sub-title-15 pb-0" style="border:none !important">Parceira Acadêmica</div>
            <a href="https://www.fema.com.br" target="_blanc"> <img style="border:none !important" id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./icons-svg/icon-logo-fema-01.svg" width="250px" alt=""> </a> </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="row" style="background-color: #00548E">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-10 py-10 text-left"> <span class="roboto-medium text-uppercase text-sub-title-20" style="color: #FFFFFF">
              <?= $curso['CURTITULOSITE']; ?>
              </span> </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border-box-print-top px-0 pb-0">
              <div class="col-12 col-md-5 col-lg-5 px-0 py-0 float-right"> <a class="raleway-bold btn btn-lg rounded-0 float-right bg-orange-theme text-white-theme btn-print-top text-uppercase" href="/cursos/impressao/<?= $curso['CURCODIGO'] ?>" role="button"><i class="fa fa-print text-white-theme text-sub-title-25 float-left" aria-hidden="true"></i> IMPRIMIR</a> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-apresentacao.svg" alt=""> <span id="apresentacao" class="roboto-bold-italic text-orange-theme">Apresentação</span> </div>
                <?php if ($video['CXVURL'] != '') : ?>
                <div class="row px-5 pt-1">
                  <div class="px-0 roboto-regular text-justify text-gray-2 text-sub-title-15">
                    <div class="">
                      <?= nl2br($curso['CURAPRESENTACAO']); ?>
                    </div>
                    <div class="col-12 px-2 pb-1 roboto-bold text-center" style="border-bottom: solid 1px orange"><i style="color: orange" class="fa fa-video-camera" aria-hidden="true"></i> ASSISTA A SINOPSE DO CURSO</div>
                    <div class="section-two">
                      <iframe src="https://player.vimeo.com/video<?= $video['CXVURL']; ?>" width="940" height="660" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                      <p><a href="https://vimeo.com<?= $video['CXVURL']; ?>"></a></p>
                    </div>
                    <!--<div class="px-3 clearfix">
                                                <a href="#" class="roboto-regular text-sub-title-14 btn btn-orange btn-sm btn-block rounded-0 transition-color2 mt-2" role="button" aria-pressed="true">Assista o vídeo da sinopse do curso</a>
                                           </div>--> 
                    
                  </div>
                </div>
                <?php else : ?>
                <div class="px-0 pt-1 col-12 roboto-regular text-justify text-gray-2 text-sub-title-15">
                  <?= nl2br($curso['CURAPRESENTACAO']); ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-publico-alvo.svg" alt=""> <span id="publicoalvo" class="roboto-bold-italic text-orange-theme">Público-Alvo</span> </div>
                <p class="roboto-regular text-sub-title-15">
                  <?= nl2br($curso['CURPUBLICOALVOSITE']); ?>
                </p>
              </div>
            </div>
          </div>
          <?php if ($curso['CURCURSO'] = 'CURSO AO VIVO' || $curso['CURCURSO'] = 'CURSO PRESENCIAL') : ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-data.svg" alt=""> <span id="datahora" class="roboto-bold-italic text-orange-theme">Data / Horário</span> </div>
                <p class="roboto-regular text-sub-title-15">
                  <?= nl2br($curso['CURDATAHORARIOSITE']); ?>
                </p>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($curso['EAD'] == 'false') { ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-local.svg" alt=""> <span id="local" class="roboto-bold-italic text-orange-theme">Local</span> </div>
                <p class="roboto-regular text-sub-title-15">
                  <?= nl2br($curso['CURLOCALSITE']); ?>
                </p>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-time.svg" alt=""> <span id="cargahora" class="roboto-bold-italic text-orange-theme">Carga horária</span> </div>
                <p class="roboto-regular text-sub-title-15">
                  <?= nl2br($curso['CURCARGAHORARIASITE']); ?>
                </p>
              </div>
            </div>
          </div>
          <?php if ($curso['EAD'] == 'true') { ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-programa.svg" alt=""> <span id="programa" class="roboto-bold-italic text-orange-theme">Metodologia</span> </div>
                <?= nl2br($curso['METODOLOGIAEAD']); ?>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1 pb-3">
              <div class="info-section">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-programa.svg" alt="">
                  <?php if ($curso['CURAOVIVO'] == 'false') : ?>
                  <span id="programa" class="roboto-bold-italic text-orange-theme">Módulos</span>
                  <?php else : ?>
                  <span id="programa" class="roboto-bold-italic text-orange-theme">Programação</span>
                  <?php endif; ?>
                </div>
                <p class="roboto-regular text-sub-title-15">
                  <?= str_replace("/-/", "<br>", $curso['MODOLOSEAD']); ?>
                  <?= nl2br($curso['CURCONTEUDOPROGRAMATICOSITE']); ?>
                </p>
                <?php if ($curso['INSCRICOESEADATIVA'] == 'false') : ?>
                <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
                <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
                <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a> <a class="raleway-bold btn btn-accept btn-sm rounded-0  mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
                <p class="text-sub-title-10 fonteBranca">(Inscrições abertas)</p>
                <br>
                </a>
                <?php else : ?>
                <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0  mt-1" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>"  style="background-color: #6f737e !important;">Lista de espera</a>
                <?php endif; ?>
                <?php else : ?>
                <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button"> Inscreva-se</a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($curso['INSCRICOESEADATIVA'] == 'true') : ?>
                <?php if ($curso['CURAOVIVO'] == 'false') : ?>
                <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
                <?php endif; ?>
                <?php if ($curso['CURAOVIVO'] == 'true') : ?>
                <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
                <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
                <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0  mt-1 text-sub-title-16 fonteBranca" role="button">lotado</a> <a style="color: white" class="raleway-bold btn btn-accept btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" style="height: 37px !important;" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">Nova Turma </br>
                <p class="text-sub-title-10" style="font-size: 10px; color: white">(Inscrições abertas)</p>
                </a> <a class="raleway-bold btn btn-blue btn-sm rounded-0 mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" style="background-color: #6f737e !important;">Lista de espera</a>
                <?php endif; ?>
                <?php else : ?>
                <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row" >
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1 pb-3">
              <div class="section-biography">
                <div class="clearfix"> <span id="professor" class="roboto-bold-italic float-left text-orange-theme text-lead-header pl-4 pr-2 pt-2 pb-2 d-block"><img class="img-fluid" src="./icons-svg/icon-professor.svg" alt=""> Professor(a) </span>
                  <div class="col-12">
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 float-left d-block pl-4 pr-4 pb-1 pt-0">
                      <p class="d-block roboto-regular text-sub-title-16 text-justify"> <span class="roboto-bold">
                        <?= $curso['INSNOME']; ?>
                        </span> -
                        <?= $curso['INSCARGO']; ?>
                      </p>
                    </div>
                    <div class="img-shadow col-xs-12 col-sm-12 col-md-12 col-lg-3 float-left text-center"> <img src="https://www.dpmeducacao.com.br/app/ImagensInstrutores/<?= $curso['INSFOTO']; ?>" alt="" width="140" height="140"> </div>
                  </div>
                </div>
                <div class="biography"> <img src="./icons-svg/icon-latus.svg" width="120"> <a class="roboto-regular text-orange-theme link-orange" href="<?= $lattes['CODLINK']; ?>" target="_blanc" style="text-decoration:none;">
                  <?= $lattes['CODLINK']; ?>
                  </a> </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 mt-1 bg-beige-theme roboto-regular">
              <div class="section-investimento">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-investimento.svg" alt=""> <span id="investimento" class="roboto-bold-italic text-orange-theme">Investimento</span> </div><br>
                
                  
                  <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col"><strong style="background: #464646; color: white; border-radius: 3px; margin: 0 5px; padding: 2px;"> ENTES PÚBLICOS COM </strong> contrato de consultoria com a Borba, Pause & Perin - DPM</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">JUNTAMENTE COM A MENSALIDADE</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black">R$ 452,00</span>
                          por participante </td>
                      </tr>
                      <tr class="tabelando">
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ 406,00</span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">ANTECIPADO COM DESCONTO</span> somente por transferência/PIX (sem emissão de boleto)</td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;color: black">VALOR BRUTO PARA EMPENHO</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ 406,00</span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ 406,00</span>
                          por participante</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                  
                  
               <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col"><strong style="background: #464646; color: white; border-radius: 3px; margin: 0 5px; padding: 2px;"> ENTES PÚBLICOS SEM </strong> contrato de consultoria com a Borba, Pause & Perin - DPM</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">POR BOLETO</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black">R$ 452,00</span>
                          por participante </td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ 406,00</span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">ANTECIPADO COM DESCONTO</span> somente por transferência/PIX (sem emissão de boleto)</td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante</td>
                      </tr>
                    </tbody>
                  </table>
                                    <div class="text-center pt-5"><img src="imgs/atencao.png" width="500px" alt=""/></div>
                                        <a href="#" class="large-view roboto-regular text-sub-title-21 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: DPM Educação Ltda., CNPJ 13.021.017/0001-77</a> <a href="#" class="mobile-view roboto-regular text-sub-title-16 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: </br>
                                        DPM Educação Ltda., </br>
                                        CNPJ 13.021.017/0001-77</a> 
                </div>
              
              
              
                  <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col">DEMAIS INTERESSADOS</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">POR TRANSFERÊNCIA OU PIX</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante </td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black">POR BOLETO BANCÁRIO</span></td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;"><span style="color: black">VALOR</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black">R$ XXX</span>
                          por participante</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              
              
              <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col">DADOS BANCÁRIOS</th>
                      </tr>
                    </thead>
                    <tbody style="font-size:18px; roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px;">
                        <td width="" colspan="0" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">
                <div class="col-12 p-2 text-center"><img src="imgs/dados-bancarios.png" width="85%" alt=""/></div></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                
         
            </div>
          </div>

        </div>
            
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-beige-theme px-0 py-0 mt-1">
              <div class="section-instrucoes">
                <div class="info-section-data text-center"> <img class="img-fluid" src="./icons-svg/icon-instrucoes.svg" alt=""> <span id="instrucoes" class="roboto-bold-italic text-orange-theme">Instruções</span> </div>
                <br>
                <?php $curso2 = findCursoById($codcurso); ?>
                <?= nl2br($curso2['CURINVESTIMENTOSITE']); ?>
                <div class="row"> 
                  
                  <!-- <div class="col-12 col-sm-1 col-lg-1 ml-auto text-center print">
										<a href="/cursos/impressao/<?= $curso['CURCODIGO'] ?>" alt=""><img class="img-fluid" src="./icons-svg/icon-print.svg" alt=""></a>
									</div> -->
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>

</body>
</html>