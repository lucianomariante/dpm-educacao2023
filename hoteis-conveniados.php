<?php
$pageName = "hoteis-conveniados";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-2 mb-2">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">HOTÉIS
                                        CONVENIADOS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <p
                                    class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">
                                    Com vista a propiciar uma melhor estadia aos seus clientes, esta DPM Educação vem
                                    empreendendo de maneira constante contatos com a rede hoteleira da Capital,
                                    sobretudo com aqueles hotéis situados próximos a nossa sede, no sentido de garantir
                                    preços atrativos na hospedagem dos servidores públicos municipais, dos Executivos,
                                    Legislativos e Autarquias.</p>
                                <p
                                    class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">
                                    Registramos que, para a obtenção de tais descontos, será necessário mencionar no
                                    momento da reserva a relação com a DPM Educação.</p>
                                <p
                                    class="roboto-regular text-gray-3 text-sub-title-15 text-justify margin-bottom-quem-somos">
                                    OBSERVAÇÃO:<br>Os valores abaixo relacionados estão sujeitos a alteração sem prévio
                                    aviso. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <div class="input-group mb-3">
                                    <select id="hotel_localidade" name="hotel_localidade"
                                        class="custom-select input-select">
                                        <option disabled selected>Selecione uma opção ...</option>
                                        <option value="P">Hotéis Próximos à Sede da DPM Educação - Bairro Navegantes
                                        </option>
                                        <option value="C">Hotéis Localizados no Centro de Porto Alegre</option>
                                        <option value="O">Hotéis em Outras Localizações</option>
                                    </select>
                                </div>
                                <div class="detalhes-hoteis disable">
                                    <img width="30" src="./icons-svg/icon-hotel.svg">
                                    <span class="detalhes-title">Clique no nome do Hotel para ver maiores
                                        detalhes</span>
                                </div>
                                <div class="detalhes-items">
                                    <ul id="hotel" class="hotel"></ul>
                                </div>
                                <div id="hotelinformacoes" class="informacoes"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-8 wireframe -->
                <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
            </div><!-- end row wireframe -->
        </div><!-- end col-12 wireframe-->
    </div>
    <!--end row justify center wireframe -->
</div><!-- end container middle content main wireframe -->

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>