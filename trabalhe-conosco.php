<?php
    $vSTitulo ='Envie seu currículo para a';
    $vSName = 'trabalhe-conosco';
    $pageName = "trabalhe-conosco";
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
                        <div class="row justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0">
                                <div class="center-div text-line-height-30">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Trabalhe conosco</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 mt-1">
                                <form id="formCurriculo" method="post" class="cursos-in-company" name="formCurriculo" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0">
                                            <label class="required" for=""></label>
                                            <input id="vSCURNOME" name="vSCURNOME" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Nome ...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for=""></label>
                                            <input id="vSCUREMAIL" name="vSCUREMAIL" type="email" class="form-control lg-input ml-3 mr-3" placeholder="E-mail ...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for=""></label>
                                            <input id="vSCURTELEFONE" name="vSCURTELEFONE" type="text" class="form-control lg-input ml-3 mr-3 telefone" placeholder="Telefone ...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0 pr-0 ml-3 text-line-height-21">
                                            <label class="select-required" for="selectAssunto"></label>
                                            <select name="vSCURVAGA" id="vSCURVAGA" class="form-control lg-input">
                                                <option value="0">Selecione a vaga desejada ...</option>
                                                <option value="1">Estágio</option>
                                                <option value="2">Efetivo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-grup row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label id="lblAnexo" class="required" for="vHCURANEXO"></label>
                                            <input type="file" id="vHCURANEXO" name="vHCURANEXO" class="form-control lg-input ml-3 mr-3" placeholder="Curriculo ..." accept=".doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pt-0 pb-0 pr-0 text-line-height-21">
                                            <span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Campos com preenchimento obrigatório</span>
                                        </div>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="form-group row align-self-center">
                                            <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
                                                <input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme"
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
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>