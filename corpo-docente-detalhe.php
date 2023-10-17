    <?php
    $pageName = "corpo-docente-detalhe";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionDocentes.php';

    $codcodigo = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
    $docente = findByCodigo($codcodigo);
?>

<div class="container-fluid carousel-inner px-0">
    <img class="img-fluid banner-hide-sm" src="./imgs/banner.png" alt="">
    <div class="card-body carousel-caption text-img-top-left">
      <span class="card-title text-center roboto-medium"></span>
  </div>
</div><!-- end banner -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-2 mb-2">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">Corpo Docente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-gray-3 rounded-15 mb-2">
                                    <div class="bio-details">
                                        <div class="bio-details-img">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 px-2 text-center">
                                                <img class="rounded-circle margin-right-14" src="https://educacao.dpm-rs.com.br//ImagensCorpoDocente/<?php echo $docente['CODFOTO']; ?>" alt="" width="140" height="140">
                                            </div>
                                        </div>
                                        <div class="bio-details-body">
                                            <span class="roboto-bold text-orange-theme text-lead-header"><?php echo $docente['CODNOME']; ?></span>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19">
                                                <p class="robotoregular line-height-19 text-sub-title-15 text-justify"><?php echo $docente['CODCVLATTES']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="biography">
                                        <img class="" src="./icons-svg/img-lates.svg" width="40" alt="">
                                        <a class="roboto-regular text-blue-theme text-uppercase" href="<?php echo $docente['CODLINK']; ?>" target="_blanc">Obter Currículo lattes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pr-lg-5">
                                <div class="row justify-content-end">
                                    <div class="arrow-direction">
                                        <a class="" href="corpo-docente"><i class="fa fa-arrow-left"></i> ver outros docentes</a>
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
<?php //require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>