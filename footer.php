<footer>

   <div class="container-fluid news-letters">
    	<div class="row justify-content-center">
    		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mt-2 pb-0 text-center">
    			<span class="roboto-bold text-title-21 text-uppercase text-white-theme">
    				news letters dpm educação
    			</span>
    		</div>
    	</div>

    	<div class="row justify-content-center">
    		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pt-0 pb-0 text-center">
    			<p class="roboto-regular text-sub-title-14 text-white-theme">Assine a nossa newsletter e receba em seu
    				e-mail a agenda atualizada de nossos cursos</p>
    		</div>
    	</div>

    	<div class="row justify-content-center">
    		<div class="col-xs-12 co-sm-12 col-md-8 col-lg-8 pt-0 pb-5">
    			<div class="text-center">
    				<a href=""><img src="/imgs/inscreva-se.png" width="500" </a>
    					<!--<form action="" class="text-center d-flex justify-content-center">
                        <input class="roboto-regular text-sub-title-14" type="text" name="vSEmail" id="vSEmail" placeholder="E-mail ">
                        <input class="roboto-bold" type="submit" name="" value="Inscrever-se">-->

    			</div>
    		</div>
    	</div>
    </div>
    <div class="container-fluid footer">
    	<div class="row">
    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    			<span class="roboto-light text-uppercase text-header text-white-theme">institucional</span>
    			<ul class="list-unstyled text-uppercase">
    				<li class="roboto-regular border-top"><a href="/quem-somos" title="quem somos">quem somos</a></li>
    				<li class="roboto-regular border-top"><a href="/corpo-docente" title="corpo docente">corpo
    						docente</a></li>
    				<!--<li class="roboto-regular border-top"><a href="/documentos-legais" title="nossos documentos legais">nossos documentos legais</a></li>-->
    				<li class="roboto-regular border-top"><a href="/nossos-numeros" title="nossos números">nossos
    						números</a></li>
    				<li class="roboto-regular border-top"><a href="/cursos-in-company" title="cursos in company">cursos
    						in company</a></li>

    				<li class="roboto-regular border-top"><a href="" title="newsletter.php">newsletter</a></li>

    				<li class="roboto-regular border-top"><a href="/duvidas-frequentes" title="dúvidas frequentes">dúvidas frequentes</a></li>
    				<li class="roboto-regular border-top"><a href="/informacoes" title="como chegar">como chegar</a>
    				</li>
    				<li class="roboto-regular border-top"><a href="/hoteis-conveniados" title="Hotéis conveniados">Hotéis conveniados</a>
    				</li>
    				<!--<li class="roboto-regular border-top"><a href="/restaurantes-conveniados" title="Restaurantes Conveniados">Restaurantes Conveniados</a>
    				</li>-->
    				<li class="roboto-regular border-top"><a href="/fale-conosco" title="fale conosco">fale conosco</a>
    				</li>

    				<li class="roboto-regular border-top"><a href="/informacoes-gerais.php" title="informações gerais">informações gerais</a>
    				</li>

    				<!--<li class="roboto-regular border-top"><a href="http://dpm-pn.com.br/hotsite_publicacoes/obras-editoriais.php" title="fale conosco">parceiro editorial</a>
    				</li>-->

    				<li class="roboto-regular border-top"><a href="/politica-privacidade" title="politica de privacidade">politica de privacidade</a>
    				</li>

    				<li class="roboto-regular border-top"><a href="/noticias" title="noticias">notícias</a>
    				</li>
    			</ul>
    		</div>
    		<?php
			require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
			require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionTabela.php';

			$areas = comboTabelas('TREINAMENTOS - INDICE POR AREA DE CONHECIMENTO');
			?>
    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    			<span class="roboto-light text-uppercase text-header text-white-theme">cursos por áreas</span>
    			<ul class="list-unstyled text-uppercase">
    				<li class="roboto-regular border-top"><a href="/cursos" title="acessar lista completa de cursos">pesquisar cursos</a></li>
    				<?php foreach ($areas as $area) : ?>
    					<li class="roboto-regular border-top">
    						<a href="./cursos/area/<?= $area['TABCODIGO']; ?>" title="<?= $area['TABDESCRICAO']; ?>"><?php echo $area['TABDESCRICAO']; ?></a>
    					</li>
    				<?php endforeach; ?>
    			</ul>
    		</div>
    		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    			<span class="roboto-light text-uppercase text-header text-white-theme">tecnologias</span>
    			<ul class="list-unstyled text-uppercase">
    				<li class="roboto-regular border-top">
    					<a href="https://www.dpmeducacao.com.br/ead/login.php" target="_blank" title="central do aluno">central do
    						aluno</a>
    				</li>
    				<li class="roboto-regular border-top">
    					<a href="http://www.dpmeducacao.com.br/mob/" title="app dpm educação">app dpm educação</a>
    				</li>
    			</ul>
    			<div class="mx-auto">
    				<img class="" src="./imgs/celulares-app.png" alt="" width="400px">
    			</div>
    		</div>
    		<div class="pt-0 col-xs-12 col-sm-12 col-md-3 col-lg-3">
    			<div class="row justify-content-center">
    				<div class="icons-footer text-center">
    					<a href="https://www.facebook.com/dpmeducacao/" target="_blank" class="link-footer"><i class="fab fa-facebook-f"></i></a>
    				</div>
    				<div class="icons-footer text-center">
    					<a href="https://www.instagram.com/dpm.educacao/" target="_blank" class="link-footer"><i class="fab fa-instagram"></i></a>
    				</div>
    			</div>
    			<ul class="list-unstyled text-uppercase">
    				<li class="border-top"><a href="#" title="" alt=""></a></li>
    				<!-- <li class="border-top"><a href="#" title="" alt="">app dpm educação</a></li> -->
    			</ul>

    			<div class="container">
    				<div class="row justify-content-center">
    					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 py-0 text-center">
    						<span class="roboto-light text-contact text-uppercase"><a href="/newsletter.php" alt="">Inscreva-se
    								Agora</a></span>
    					</div>

    					<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 py-0 text-center m-2">
                        <img src="imgs/logo-fema.svg" width="160px" alt=""/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 py-0 text-center">
                        <img src="imgs/selo-certificacao-fema.svg" width="140px" alt=""/>
                        </div>-->


    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

    <script>
    	window.addEventListener("load", function() {
    		window.cookieconsent.initialise({
    			"palette": {
    				"popup": {
    					"background": "#fcfcfc",
    					"text": "#00548E",
    					"z-index": "9999",
    				},
    				"button": {
    					"background": "#00548E"
    				}
    			},
    			"theme": "classic",
    			"position": "bottom-center",
    			"content": {
    				"message": "Usamos cookies para garantir que você obtenha a melhor experiência no nosso site.",
    				"dismiss": "Entendi!",
    				"link": "Leia mais…",
    				"href": "politica-privacidade.php"
    			}
    		})
    	});
    </script>
    <div class="container-fluid footer-address">
    	<!-- begin footer address -->
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-xs-3 col-sm-8 col-md-8 col-lg-12 col-xl-12 pr-4 pl-4 py-0 m-0 pt-2 pb-2">
    				<p class="roboto-regular text-sub-title-12 text-white-theme text-center m-0">
    					Av. Pernambuco, 1001, Térreo - Navegantes - Porto Alegre/RS - CEP 90240-004 - Fone: (51)
    					3094.3440</br>
    					&copy; <?php echo date('Y'); ?> DPM Educação Ltda</p>

    				<div style="width: 70px; margin: 7px auto 0 auto; text-align: center">
    					<a href="http://portal.teraware.com.br/"><img src="icons-svg/tw-icone.png" width="90px" alt="Teraware - ERP | E-commerce | Web Sites | Outsourcing | Projetos Especiais" title="Teraware - ERP | E-commerce | Web Sites | Outsourcing | Projetos Especiais" /></a>
    					<!--<a href="http://massacriativa.com.br"><img src="icons-svg/icon-webuilders.svg" width="25px"
                                alt="Webuilders - Agência Digital - Grupo Massa Criativa"
                                title="Webuilders - Agência Digital - Grupo Massa Criativa" /></a>>$_ENV-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div><!-- end footer-address two-->
    <div id="backTop">
    	<a href="" class="back-top"><i class="fa fa-arrow-up" aria-hidden="true"><span class="roboto-light text-white-theme"> Topo</span></i></a>
    </div>
	</footer>
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="library/slick/slick.min.js"></script>
    <!-- JS Validade -->
    <script type="text/javascript" src="libs/jquery.validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="libs/jquery.validate/jquery.validate.messages.js"></script>
    <script type="text/javascript" src="libs/jquery.validate/additional-methods.min.js"></script>

    <script type="text/javascript" src="libs/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="libs/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/mascaras.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>


    <!--    <link rel="stylesheet" href="bxslider/dist/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>-->


    <script>
    	$('.galeria-cursos').slick({
    		infinite: true,
    		slidesToShow: 3,
    		slidesToScroll: 3
    	});
    </script>

    <script>
    	$(document).ready(function() {
    		$('.slider2').bxSlider();
    	});
    </script>

    <script>
    	$(document).ready(function() {
    		$('.owl-carousel').owlCarousel({
    			loop: true,
    			margin: 50,
    			nav: true,
    			responsive: {
    				0: {
    					items: 1
    				},
    				600: {
    					items: 1
    				},
    				1000: {
    					items: 1
    				}
    			}
    		})
    	});
    </script>

    <script type="text/javascript">
    	function ancora(objID) {
    		document.getElementById(objID).focus();
    	}
    </script>


    <?php if ($pageName == 'cursos-in-company') : ?>
    	<script src="js/cursos-company.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'fale-conosco') : ?>
    	<script src="js/contato.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'restaurantes-conveniados') : ?>
    	<script src="js/restaurantes-conveniados.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'hoteis-conveniados') : ?>
    	<script src="js/hoteis-conveniados.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'curso-detalhe') : ?>
    	<script src="js/curso-detalhe.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'cursos-inscricao-clientes-logados' || $pageName == 'cliente-sem-login-e-senha') : ?>
    	<script src="js/validar-inscricao.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'trabalhe-conosco') : ?>
    	<script src="js/trabalhe-conosco.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'corpo-docente') : ?>
    	<script src="js/corpo-docente.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'curso-lista-espera') : ?>
    	<script src="js/lista-espera.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'cliente-sem-vinculacao') : ?>
    	<script src="js/cliente-sem-vinculo.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'entidade-sem-vinculo-com-cadastro') : ?>
    	<script src="js/entidade-sem-vinculo.js"></script>
    <?php endif; ?>
    <?php if ($pageName == 'cursos') : ?>
    	<script src="js/cursos.js"></script>
    <?php endif; ?>
    </body>

    </html>