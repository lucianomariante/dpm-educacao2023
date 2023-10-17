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
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">informações gerais</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <img src="icons-svg/icon-fingerprint.svg" alt=""/ width="20px">&nbsp;Razão Social
                                </span>
                                <span class="info-medias-body">DPM Educação Ltda</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <img src="icons-svg/icon-map.svg" alt=""/ width="20px">&nbsp;Endereço
                                </span>
                                <span class="info-medias-body">Av. Pernambuco, 1001, Térreo - Navegantes - Porto Alegre/RS</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img src="icons-svg/icon-info.svg" alt=""/ width="20px">&nbsp;CNPJ
                                </span>
                                <span class="info-medias-body">Nº 13.021.017.0001-77</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                 Inscrição Municipal
                                </span>
                                <span class="info-medias-body">Nº 53665724</span>
                            </div>
                            <div class="info-medias"  style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                Inscrição Estadual
                                </span>
                                <span class="info-medias-body">Nº 096/3413155</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <img width="20" src="icons-svg/icon-socio.svg">&nbsp;Sócia-Administradora
                                </span>
                                <span class="info-medias-body">Dulcelena Peixoto Lenz</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Telefone
                                </span>
                                <span class="info-medias-body">(51) 3094.3440</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Endereço Eletrônico
                                </span>
                                <span class="info-medias-body">cursos@dpmeducacao.com.br</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Site
                                </span>
                                <span class="info-medias-body">www.dpmeducacao.com.br</span>
                            </div>
                            <div class="info-medias" style="border-bottom: solid 1px #dedede; padding-bottom: 20px">
                                <span class="info-medias-title">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Nossos Horários
                                </span>
                                <span class="info-medias-body">Para acesso às dependências, da 07h às 19h.<br>
Para atendimento ao público, das 08h às 17h30min.</span>
                            </div>
                            <div class="info-medias">
                                <span class="info-medias-title">
                                    <img width="20" src="icons-svg/icon-credit.svg">&nbsp;Dados Bancários
                                </span>
                                <span class="info-medias-body">Banrisul (Banco 041)<br>
Agência: 0100<br>
Conta nº 06.324483.0-9</span>
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