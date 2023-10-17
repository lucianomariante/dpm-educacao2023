<?php
    $pageName = "contrate-nossos-cursos";
    require_once 'header.php';
    require_once 'include/constantes.php';
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row justify-content-lg-start justify-content-sm-center justify-content-xs-center justify-content-md-center">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="center-div">
                                    <span class="roboto-bold text-lead-header text-uppercase text-xs-center">
                                    Contrate nossos cursos
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end header title section -->
                    <div class="col-12 py-0 text-line-height-17 mt-2">
                        <div class="row">
                            <p class="roboto-regular">Objetivando permitir acesso aos elementos necessários ao regular processo de contratação de nossas capacitações, segue abaixo, os seguintes documentos comprobatórios: <a href="#" class="link-orange">(acesse a versão em PDF)</a> </p>
                        </div>
                    </div><!-- end paragraph -->
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 text-center text-line-height-16">
                                <i class="fas fa-folder-open icon-size-55 text-orange-theme text-center mx-auto d-block mb-2"></i>
                                <a href="#" class="link-black">
                                <span class="roboto-regular text-sub-title-13 text-black-theme">Certidões Negativas de Regularidade</span>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 text-center text-line-height-16">
                                <i class="fas fa-folder-open icon-size-55 text-orange-theme text-center mx-auto d-block mb-2"></i>
                                <a href="#" class="link-black">
                                <span class="roboto-regular text-sub-title-13 ">Dossiê Técnico-Acadêmico</span>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 text-center text-line-height-16">
                                <i class="fas fa-folder-open icon-size-55 text-orange-theme text-center mx-auto d-block mb-2"></i>
                                <a href="#" class="link-black">
                                <span class="roboto-regular text-sub-title-13 ">Ficha Cadastral</span>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 text-center text-line-height-16">
                                <i class="fas fa-folder-open icon-size-55 text-orange-theme text-center mx-auto d-block mb-2"></i>
                                <a href="#" class="link-black">
                                <span class="roboto-regular text-sub-title-13 ">Considerações sobre nossa Contratação</span>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 text-center text-line-height-16">
                                <i class="fas fa-folder-open icon-size-55 text-orange-theme text-center mx-auto d-block mb-2"></i>
                                <a href="#" class="link-black">
                                <span class="roboto-regular text-sub-title-13 ">Atestados de Capacidade Técnica</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-12 wireframe -->
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>