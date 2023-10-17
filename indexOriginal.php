<?php
$pageName = "home";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';

$cursos = comboCursos(0, 6);
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0">
                        <div class="center-div">
                            <span class="roboto-bold text-lead-header">PRÓXIMOS CURSOS</span>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <?php foreach ($cursos as $item) : ?>
                                    <div class="col-xs-12 col-ms-12 col-md-4 flex-item-column">
                                        <div class="card-items bg-beige-theme space-between">
                                            <div>
												<?php if ($item["CURIMAGEM"] == '')
													$vsCaminho = 'https://borbapauseperin.adv.br/assets/img/curso1.jpg';
												else
													$vsCaminho = 'https://dpm-rs.com.br/educacao/imagensSite/'.$item["CURIMAGEM"];
												?>


                                                <img class="img-fluid mx-auto d-block"
                                                    src="<?php echo $vsCaminho; ?>">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 px-2 pb-0">
                                                    <p class="roboto-medium text-line-height-19">
                                                        <?php echo $item['CURTITULOSITE']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-12 pt-0 pb-0 pl-1">
												    <?php if ($item['CURDATAINICIO'] != $item['CURDATAFIM']) { ?>
                                                    <span class="date roboto-regular"><?php echo formatar_data($item['CURDATAINICIO']); ?></span>
													<span class="date roboto-regular"><?php echo formatar_data($item['CURDATAFIM']); ?></span>
													<?php } else { ?>
													<span class="date roboto-regular"><?php echo formatar_data($item['CURDATAINICIO']); ?></span>
													<?php }  ?>
                                                </div>
                                                <div
                                                    class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-1 pb-2 mb-2 pl-1 text-line-height-11">
                                                    <span class="city text-margin-left-8 roboto-regular">
                                                        <?php echo $item['CIDDESCRICAO']; ?>
                                                    </span>
                                                </div>
                                                <div>
                                                    <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                                                    <a class="roboto-bold btn btn-danger text-uppercase btn-sm btn-block rounded-0 transition-color mt-1"
                                                        style="color: #ffffff !important;" role="button">lotado</a>
                                                    <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0 transition-color mt-1"
                                                        href="cursos/lista-espera/<?php echo $item['CURCODIGO']; ?>"
                                                        role="button">Lista de espera</a>
                                                    <?php endif; ?>
                                                    <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] > 0) : ?>
                                                    <a class="btn button-link raleway-bold mt-1"
                                                        href="cursos-inscricao/clientes/<?php echo $item['CURCODIGO']; ?>"
                                                        style="background-color: orange" role="button">Inscreva-se</a>
                                                    <?php endif; ?>
                                                    <?php if ($item['CURNOVATURMA'] == 'S') : ?>
                                                    <a class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1"
                                                        href="cursos/<?php echo $item['CURVINCULOTREINAMENTO']; ?>"
                                                        role="button">Nova Turma </br><span>(Inscrições
                                                            abertas)</span></a>
                                                    <?php endif; ?>
                                                    <a class="btn button-link raleway-bold mt-1"
                                                        href="cursos/<?php echo $item['CURCODIGO']; ?>"
                                                        role="button">sobre o curso</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top-button">
                            <div class="mx-auto mt-3 mb-3 row-button">
                                <div class="row-button">
                                    <a class="roboto-bold btn btn-primary btn-load-more transition-color" href="/cursos"
                                        role="button">CARREGAR MAIS CURSOS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container my-5">
                        <div class="row">
                            <div class="col-12">
                                <div id="content-8">
                                    <div class="one">
                                        <a href="duvidas-frequentes"><img class="img-fluid"
                                                src="./imgs/duvidas-frequentes.png" alt=""></a>
                                    </div>

                                    <div class="four">
                                        <div style="margin-bottom: 9px;">
                                            <a href="hoteis-conveniados"><img class="img-fluid"
                                                    src="./imgs/hoteis-conveniados.png" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="restaurantes-conveniados"><img class="img-fluid"
                                                    src="./imgs/restaurantes-conveniados.png" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="three">
                                        <a href="informacoes"><img class="img-fluid" src="./imgs/como-chegar.png"
                                                alt=""></a>
                                    </div>

                                    <div class="two">
                                        <a href="http://www.fema.com.br" target="_blanc"><img class="img-fluid"
                                                src="./imgs/fema.png" alt=""></a>
                                    </div>


                                    <div class="five">
                                        <a href="cursos-in-company"><img class="img-fluid"
                                                src="./imgs/cursos-in-company.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- NOTICIAS -->
					<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-noticias.php'; ?>

                    <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-imagens-sidebar.php'; ?>
                </div>
                <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>