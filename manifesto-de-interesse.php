<?php
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
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">manifestação de interesse</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 pb-0 mb-0">
                            <span class="roboto-bold text-sub-title-21">
                                Manifeste seu interesse preenchendo o formulário abaixo:
                            </span>
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
                                                    class="form-control lg-input ml-3 mr-3" placeholder="Nome:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONEMAIL" name="vSCONEMAIL" type="email" required
                                                    class="form-control lg-input ml-3 mr-3" placeholder="E-mail:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONMUNICIPIO" name="vSCONMUNICIPIO" type="text" required
                                                    class="form-control lg-input ml-3 mr-3" placeholder="Município:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="vSCONTELEFONE" name="vSCONTELEFONE" type="text" required
                                                    class="form-control lg-input ml-3 mr-3 telefone"
                                                    placeholder="Telefone:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <textarea id="vSCONMENSAGEM" name="vSCONMENSAGEM" required
                                                    class="form-control pr-0 ml-3" rows="7"
                                                    placeholder="Mensagem:"></textarea>
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
                                                    data-callback="enviarInteresseEAD" data-badge="bottomleft"
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