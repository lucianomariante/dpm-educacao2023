<?php
    $pageName = "inscricoes";
    require_once 'header.php';
    require_once 'include/constantes.php';
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 p-0 mt-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Seja Bem Vindo!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-1 mt-4">
                            <div class="box-subscribes">
                                <div class="box-subscribes-title roboto-regular p-2">
                                    Inscrições de <span class="roboto-medium text-uppercase text-white-theme">clientes</span> da Borba, Pause & Perin - Advogados
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-1">
                            <div class="box-subscribes">
                                <div class="boxes">
                                    <div class="box-orange bg-orange-theme">
                                        <img class="fa-icon-sign-up" src="./icons-svg/icon-inscricao-01.svg">
                                        <div class="box-orange-title roboto-regular">Cliente <span class="roboto-black">COM</span> login e senha</div>
                                        <a class="box-link-button text-uppercase btn d-block roboto-black" href="">Clique aqui</a>
                                    </div>
                                    <div class="box-orange bg-orange-theme">
                                        <img class="fa-icon-sign-up" src="./icons-svg/icon-inscricao-02.svg">
                                        <div class="box-orange-title roboto-regular">Cliente <span class="roboto-black">SEM</span> login e senha</div>
                                        <a class="box-link-button text-uppercase btn d-block roboto-black" href="">Clique aqui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-1">
                            <div class="box-subscribes">
                                <div class="box-subscribes-title roboto-regular p-2">
                                    Inscrições de <span class="roboto-medium text-uppercase text-white-theme">não clientes</span> da Borba, Pause & Perin - Advogados
                                </div>
                                <div class="boxes">
                                    <div class="box-transparent">
                                        <a class="box-link-button text-uppercase btn d-block roboto-black" href="">Clique aqui</a>
                                    </div>
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