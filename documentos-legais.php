<?php
    $pageName = "documentos-legais";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php';
	
	if (!isset($_SESSION['sICLICODIGO_SITE'])) {
    header("Location:/login-nossos-documentos/");
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="center-div">
                                    <span class="roboto-bold text-lead-header text-uppercase text-xs-center">
                                        Nossos documentos legais
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <p class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">Objetivando permitir acesso aos elementos necessários ao regular processo de nossa contratação, segue abaixo, os seguintes documentos:</p>
                            </div>
                        </div>
                    </div>
            		<div class="col-12 pl-3 pt-0 pb-3 box-transition" style="border-bottom: 1px solid #DEDEDE;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 pt-0 pb-0 link-simples">
                                <a href="documentos/certidoes/certidoes.pdf" target="_blank">
                                    <div class="documentos-legais d-flex">
                                        <div class="pr-2">
                                            <img src="./icons-svg/icon-documento.svg" width="25" height="25" alt="">
                                        </div>
                                        <div class="roboto-regular text-sub-title-18">Certidões Negativas de Regularidade</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            		<div class="col-12 pl-3 pt-0 pb-3 box-transition" style="border-bottom: 1px solid #DEDEDE;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 pt-0 pb-0 link-simples">
                                <a href="documentos/dossie/dossie-dpm-educacao.pdf" target="_blank">
                                    <div class="documentos-legais d-flex">
                                        <div class="pr-2">
                                            <img src="./icons-svg/icon-documento.svg" width="25" height="25" alt="">
                                        </div>
                                        <div class="roboto-regular text-sub-title-18">Dossiê-Técnico Acadêmico</div>
            				        </div>
                                </a>
                            </div>
                        </div>
                    </div>
                       <div class="col-12 pl-3 pt-0 pb-3 box-transition" style="border-bottom: 1px solid #DEDEDE;">    
                         <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 pt-0 pb-0 link-simples">
                                    <a href="documentos/ficha-cadastral/ficha-cadastral.pdf" target="_blank">
                                        <div class="documentos-legais d-flex">
                                            <div class="pr-2">
                                                <img src="./icons-svg/icon-documento.svg" width="25" height="25" alt="">
                                            </div>
                                            <div class="roboto-regular text-sub-title-18">Ficha Cadastral</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
		            <div class="col-12 pl-3 pt-0 pb-3 box-transition" style="border-bottom: 1px solid #DEDEDE;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 pt-0 pb-0 link-simples">
                                <a data-toggle="collapse" data-target="#mostra-modelos" class="" href="#">
                                    <div class="documentos-legais d-flex">
                                        <div class="pr-2">
                                            <img src="./icons-svg/icon-documento.svg" width="25" height="25" alt="">
                                        </div>
                                        <div class="roboto-regular text-sub-title-18">Modelos do Processo de Contratação</div>
				                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div id="mostra-modelos" class="collapse pl-5">
                        <div class="pb-2 link-modelos"><a class="" target="_blank" href="documentos/modelos-processo-contratacao/modelo01.pdf">Sugestão de Roteiro para Contratação de Inscrições em nossos Cursos</a></div>
                        <div class="link-modelos"><a target="_blank" href="documentos/modelos-processo-contratacao/modelo02.pdf">Sugestão de Roteiro para Contratação de nossos Cursos e Palestras <span class="font-italic" style="color: inherit">In Company</span></a></div>
                            
                        </div>
                        
                    </div>
					<div class="col-12 pl-3 pb-4 pt-0 box-transition">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 pt-0 pb-0 link-simples">
                                <a href="documentos/atestados-capacidade/atestados-capacidade.pdf" target="_blank">
                                    <div class="documentos-legais d-flex">
                                        <div class="pr-2">
                                            <img src="./icons-svg/icon-documento.svg" width="25" height="25" alt="">
                                        </div>
                                        <div class="roboto-regular text-sub-title-18">Atestados de Capacidade Técnica</div>
                				    </div>
                                </a>
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