<?php
$use_sts = TRUE;
if (($use_sts) && isset($_SERVER['HTTPS'])) {
 //header('Strict-Transport-Security: max-age=500');
} elseif (($use_sts) && !(isset($_SERVER['HTTPS']))) {
 header('Status-Code: 301');
 header('Location: https://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']); 
}
    $pageName = "home";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionCursos.php';

    $cursos = comboCursos(0, 6);
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

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
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <?php foreach($cursos as $curso) : ?>
                                    <div class="col-xs-12 col-ms-12 col-md-4 col-md-4 d-flex">
                                        <div class="card-items bg-beige-theme space-between">
                                            <div>
                                                <img class="img-fluid mx-auto d-block" src="https://dpmeducacao.com.br/educacao/imagensSite/<?php echo $curso["CURIMAGEM"]; ?>" alt="">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 pl-4 pb-0">
                                                        <p class="roboto-medium text-line-height-19"><?php echo $curso['CURTITULOSITE']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-12 pt-0 pb-0 ">
                                                        <span class="date roboto-regular"><?php echo formatar_data($curso['CURDATAINICIO']); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-1 pb-2 mb-2 text-line-height-11">
                                                        <span class="city text-margin-left-8 roboto-regular"><?php echo $curso['CIDDESCRICAO']; ?></span>
                                                    </div>
                                                </div>
                                                <a class="btn button-link raleway-bold" href="cursos/<?php echo $curso['CURCODIGO']; ?>" role="button">sobre o curso</a>
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
                                       <a class="roboto-bold btn btn-primary btn-load-more transition-color" href="/cursos" role="button">CARREGAR MAIS CURSOS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-imagens-sidebar.php'; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="content-8">
                                    <div class="one">
                                        <a href="https://www.fema.com.br" target="_blanc"><img class="img-fluid" src="./imgs/fema.png" alt=""></a>
                                    </div>
                                    <div class="two">
                                        <a href="duvidas-frequentes"><img class="img-fluid" src="./imgs/duvidas-frequentes.png" alt=""></a>
                                    </div>
                                    <div class="three">
                                        <a href="informacoes"><img class="img-fluid" src="./imgs/como-chegar.png" alt=""></a>
                                    </div>
                                    <div class="four">
                                        <div style="margin-bottom: 9px;">
                                            <a href="hoteis-conveniados"><img class="img-fluid" src="./imgs/hoteis-conveniados.png" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="restaurantes-conveniados"><img class="img-fluid" src="./imgs/restaurantes-conveniados.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="five">
                                        <a href="cursos-in-company"><img class="img-fluid" src="./imgs/cursos-in-company.png" alt=""></a>
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
