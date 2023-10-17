<?php

$vSTitulo ='Fale com a ';
$vSName = 'fale-conosco';
$pageName = "fale-conosco";
require_once 'header.php';
require_once 'include/constantes.php';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 p-0">
                        <div class="row justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0">
                                <div class="center-div text-line-height-30">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">fale
                                        conosco</span>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Fone
                                </span>
                                <span class="info-medias-body">DPM Educação(Cursos): (51)3094-3440</span>
                                <p><span class="info-medias-body">DPM Consultoria: (51)3027-3400</span></p>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;E-mail
                                </span>
                                <span class="info-medias-body">cursos@dpmeducacao.com.br</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img width="20" src="./icons-svg/icon-facebook.svg">&nbsp;Facebook
                                </span>
                                <span class="info-medias-body">dpmeducacao</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img width="20" src="./icons-svg/icon-instagram.svg">&nbsp;Instagram
                                </span>
                                <span class="info-medias-body">dpmeducacao</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0">
                <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Localização</span>
                                <div class="center-div text-line-height-30">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.225859629776!2d-51.20044558535282!3d-30.001670436247867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951979ed7af539c5%3A0x44f8ef6bf84556d!2zRHBtIEVkdWNhw6fDo28!5e0!3m2!1spt-BR!2sbr!4v1650993386416!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                </div>
                    <div class="row">
                        <div class="col-12 pb-0 mb-0">
                            <span class="roboto-bold text-sub-title-21">
                                Entre em contato também preenchendo o formulário:
                            </span>
                        </div>
                        <div class="col-12 roboto-regular text-sub-title-13 pt-1">
                            <i class="fas fa-exclamation-triangle" style="color: orange"></i>
                            Espaço destinado exclusivamente a dúvidas e informações acerca dos cursos realizados por esta DPM Educação.
                        </div>
                    </div>


                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 mt-0">
                                <form class="cursos-in-company" id="formContato" name="formContato">
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONNOME" name="vSCONNOME" type="text" required
                                                    class="form-control lg-input ml-3 mr-3" placeholder="Nome ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONEMAIL" name="vSCONEMAIL" type="email" required
                                                    class="form-control lg-input ml-3 mr-3" placeholder="E-mail ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONMUNICIPIO" name="vSCONMUNICIPIO" type="text" required
                                                    class="form-control lg-input ml-3 mr-3" placeholder="Município ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONTELEFONE" name="vSCONTELEFONE" type="text" required
                                                    class="form-control lg-input ml-3 mr-3 telefone"
                                                    placeholder="Telefone ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <textarea id="vSCONMENSAGEM" name="vSCONMENSAGEM" required
                                                    class="form-control pr-0 ml-3" rows="7"
                                                    placeholder="Mensagem ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <span
                                                    class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Campos
                                                    com preenchimento obrigatório</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="form-group row align-self-center">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
                                                <input
                                                    class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme"
                                                    type="submit" value="Enviar">
                                                <button id="recaptcha" class="g-recaptcha"
                                                    data-sitekey="6LficJcUAAAAAIVtj-9bcIHijCDrHOtS7uB65vQW"
                                                    data-callback="enviarContato" data-badge="bottomleft"
                                                    style="display: none;"></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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