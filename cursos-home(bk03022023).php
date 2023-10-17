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
            <div class="center-div"> <span class="roboto-bold text-lead-header">PRÓXIMOS CURSOS</span> </div>
            <div class="section-block-white courses-section">
              <div class="container mt-60">
                <div class="section-heading">
                  <div class="section-heading-line-left"></div>
                  <p>Confira a agenda de cursos com participação do corpo técnico da Borba, Pause &amp; Perin - Advogados.</p>
                </div>

                <div class="row mt-30">
                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">

                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>

                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Planejamento da Contratação com base na Nova Lei de Licitações, nº 14.133/2021: do pedido do objeto até a definição pela licitação ou contratação direta.</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                         <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                         <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                 <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>20</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                       <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="row border-top-button">
              <div class="mx-auto mt-3 mb-3 row-button">
                <div class="row-button"> <a class="roboto-bold btn btn-primary btn-load-more transition-color" href="/cursos" role="button">CARREGAR MAIS CURSOS</a> </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"><a href="informacoes"><img class="grow" src="imgs/como-chegar-2.png" width="100%" alt=""/></a></div>
            <div class="col-md-6"><a href="hoteis-conveniados"><img class="grow" src="imgs/hoteis-conveniados-2.png" width="100%" alt=""/></a></div>
            <div class="col-md-6"><a href="cursos-in-company"><img class="grow" src="imgs/cursos-in-company-2.png" width="100%" alt=""/></a></div>
            <div class="col-md-6"><a href="certificacao-academica"><img class="grow" src="imgs/certificacao-academica-2.png" width="100%" alt=""/></a></div>
          </div>

          <!--<div class="container my-5">
						<div class="row">
							<div class="col-12">
								<div id="content-8">
									<div class="one">
										<a href="duvidas-frequentes"><img class="img-fluid" src="./imgs/duvidas-frequentes.png" alt=""></a>
									</div>

									<div class="four">
										<div style="margin-bottom: 9px;">
											<a href="hoteis-conveniados"><img class="img-fluid" src="./imgs/hoteis-conveniados.png" alt=""></a>
										</div>
										<div>
											<a href="restaurantes-conveniados"><img class="img-fluid" src="./imgs/restaurantes-conveniados.png" alt=""></a>
										</div>
									</div>

									<div class="three">
										<a href="informacoes"><img class="img-fluid" src="./imgs/como-chegar.png" alt=""></a>
									</div>

									<div class="two">
										<a href="http://www.fema.com.br" target="_blanc"><img class="img-fluid" src="./imgs/fema.png" alt=""></a>
									</div>


									<div class="five">
										<a href="cursos-in-company"><img class="img-fluid" src="./imgs/cursos-in-company.png" alt=""></a>
									</div>
								</div>
							</div>
						</div>
					</div>-->

          <!-- NOTICIAS -->
         <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-noticias.php'; ?>
         <!-- <?//php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-imagens-sidebar.php'; ?>-->
        </div>
        <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
