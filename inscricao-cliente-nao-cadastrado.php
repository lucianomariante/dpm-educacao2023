<?php
    $pageName = "inscricao-cliente-nao-cadastrado";
    require_once 'header.php';
    require_once 'include/constantes.php';
?>

<div class="container-fluid carousel-inner px-0">
    <img class="img-fluid banner-hide-sm" src="./imgs/banner-informacoes-contato.png" alt="">
    <div class="card-body carousel-caption text-img-top-left">
      <span class="card-title text-center roboto-medium"></span>
    </div>
</div><!-- end banner -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Inscrição para clientes não cadastrados</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <span class="roboto-bold text-gray-3">Inscrição de clientes não cadastrados junto a DPM Educação Ltda, favor seguir as instruções abaixo.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <span class="roboto-bold text-gray-3 text-sub-title-14 text-uppercase">observações</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Imprima ou salve a ficha e preencha todos os dados solicitados de maneira clara.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Os nomes e sobrenomes devem ser escritos/digitados sempre por extenso.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Depois de preenchida, enviar a respectiva ficha para:</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14"><span class="roboto-bold text-gray-2">Fax:</span> (51) 3094.3440 ou <span class="roboto-bold text-gray-3">E-mail:</span> cursos@dpmeducacao.com.br</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-11 col-lg-11 mt-3">
                                <a href="Ficha.doc" class="large-view link-pointer btn bg-orange-theme roboto-regular text-white-theme btn-lg btn-block text-sub-title-16">Download Ficha de Inscrição em formato WORD</a>
                                <a href="Ficha.doc" class="mobile-view link-pointer btn bg-orange-theme roboto-regular text-white-theme btn-lg btn-block text-sub-title-16">Download Ficha de Inscrição<br> em formato WORD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-0 roboto-regular">
                                Se você é cliente e possui cadastro junto a DPM Educação Ltda, <a class="text-uppercase roboto-regular link-orange" href="/login">clique aqui</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>