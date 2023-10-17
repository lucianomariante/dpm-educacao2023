<?php
$pageName = "identificacao-acesso";
require_once 'header.php';
require_once 'include/constantes.php';
$curcodigo = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
?>
<div class="container-fluid carousel-inner px-0">
    <img class="img-fluid banner-hide-sm" src="./imgs/banner-inscricoes-cursos-site.png" alt="">
    <div class="card-body carousel-caption text-img-top-left">
        <span class="card-title text-center roboto-medium"></span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 pr-lg-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 pr-lg-5 col-lg-12">
                        <div class="col-12 px-0 py-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1 d-flex flex-row">
                                    <div class="mt-1 pr-2"><img src="imgs/formulario.png" width="40" height="50"
                                            alt="" /></div>
                                    <div class="center-div">
                                        <span class="roboto-bold text-sub-title-18 text-orange-theme display-block">SEJA
                                            BEM-VINDO</span>
                                        <span
                                            class="roboto-regular text-black-theme text-sub-title-25 text-lead-header text-uppercase">ao
                                            processamento de sua inscrição</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0 py-0 my-3 bg-azul-padrao round-corners10">
                            <div class="roboto-bold text-white pt-2 pl-4 text-sub-title-28">Site em manutenção</div>
                            <div class="roboto-light text-white pt-0 pb-3 pl-4">
                            Solicitamos que a(s) inscricao(oes) sejam enviadas para o e-mail cursos@dpmeducacao.com.br ou WhatsApp (51) 99191-2022 informando título do curso desejado, nome(s) completo(s) do(s) participante(s), CPF(s), cargo(s), fone com whats e e-mail para contato.<br>Registramos nossas escusas e agradecemos pela compreensão.
                            </div>
                        </div>

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