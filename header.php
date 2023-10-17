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
	<title><?= $vSTitulo; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="./favicon/educ.ico" type="image/x-icon">
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link rel="stylesheet" href="owlcarousel/owl.carousel.css">
	<!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">-->

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="120x120" href="./favicon/educ.ico">
	<!--<link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon/educ16x16.png">-->
	<link rel="icon" href="./favicon/educ.ico" type="image/x-icon">
	<!--<link rel="manifest" href="./favicon/site.webmanifest">-->
	<link rel="shortcut icon" href="./favicon/educ.ico"/>
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">

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
        
        
        .barra-topo {
            background-color: #174b71;
        }
        .contact-info {
            color: white;
            font-size: 15px;
            padding: 0 15px;
            text-align: center;
            display: inline-flex;
            align-items: center;
        }
        .contact-icon {
            margin-right: 10px; /* Aumentando o espaçamento entre o ícone e o texto */
            font-size: 20px;
            vertical-align: middle;
        }
        .social-icon {
             margin-right: 10px; 
            color: white;
            font-size: 20px;
            vertical-align: middle;
        }
        .social-link {
            color: white;
            padding: 0 10px;
            font-size: 15px;
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        .social-link:hover {
            color: #7ea7c7;
            text-decoration: none;
        }
        
        
	</style>


</head>

<body>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Z657KX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <div class="container-fluid barra-topo">
        <div class="">
            <div class="row">
                <div class="col-md-2 col-6 text-center">
                    <div class="contact-info">
                        <i class="fas fa-phone-alt contact-icon"></i> (51) 3027-3400
                    </div>
                </div>
                <div class="col-md-2 col-6 text-center">
                    <a class="social-link" href="https://wa.me/5551980415821" target="_blank" class="contact-info">
                        <i class="fab fa-whatsapp contact-icon"></i> (51) 98041-5821
                    </a>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <a class="social-link" href="mailto:cursos@dmpeducacao.com.br" class="contact-info">
                        <i class="fas fa-envelope contact-icon"></i> cursos@dpmeducacao.com.br
                    </a>
                </div>
            


                <div class="col-md-5 col-12 d-flex">
    
                        
                        <a class="col-md-6 col-sm-12 social-link" href="https://www.instagram.com/dpm.educacao/" target="_blank" title="link para página no instagram">
                        <i class="fab fa-instagram contact-icon"></i> Instagram: dpm.educacao
                    </a>
               
                <a class="col-md-6 col-sm-12 social-link" href="https://www.facebook.com/dpmeducacao/" target="_blank" title="link para página no facebook">
                        <i class="fab fa-facebook contact-icon"></i> Facebook: dpmeducacao
                        </a>
   
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 d-sm-flex justify-content-sm-center center-logo-brand-mobile">
			<a href="index.php">
				<img class="block-center" src="imgs/novaLogoSite.jpeg" alt="logo DPM educação" style="max-width: 100%; display: block">
			</a>
		</div> <!-- end logo main -->



		<div class="col-xs-12 col-ms-12 col-md-9 col-lg-9 px-0 d-md-flex d-lg-flex d-xl-flex align-items-end flex-nav-icon-mobile">
			<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white-theme p-0">
				<a class="navbar-brand" href="#"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="quem-somos">Quem Somos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="cursos">Cursos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="certificacao-academica">Certificação Acadêmica</a>
						</li>
						<li class="nav-item">
							<a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="corpo-docente">Corpo Docente</a>
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
						<!--<li class="nav-item">
							<a class="nav-link roboto-medium nav-menu border-right-blue text-uppercase" href="duvidas-frequentes">Dúvidas frequentes</a>
						</li>-->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle roboto-medium nav-menu text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Contato
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item roboto-regular nav-menu" href="fale-conosco">Fale
									Conosco</a>
								<a class="dropdown-item roboto-regular nav-menu" href="newsletter">Newsletter</a>

								<a class="dropdown-item roboto-regular nav-menu" href="trabalhe-conosco">Trabalhe Conosco</a>

							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!--<div class="out-rosa"><img src="imgs/dezembro-laranja.jpg" width="180" alt=""/></div>-->
		</div>
	</div>
    </div>

	</body>

</html>