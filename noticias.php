<?php
    $pageName = "noticias";
    require_once 'header.php';
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>
<?php
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionNoticias.php';    
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="center-div">
                                    <span class="roboto-bold text-lead-header text-uppercase text-xs-center">
                                        Notícias
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end header title section -->
                    
                    <?php $noticias = findAllNoticias(0,300);
						foreach ($noticias as $noticias) :
					?>
                    <div class="col-12 px-0 mb-1" style="border-bottom: 1px solid #eeeeee">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-lg-5 text-line-height-24">
                              <div class="link-modelos text-sub-title-22 roboto-bold text-blue-theme text-justify pb-1"><a href="noticias-detalhe.php?oid=<?= $noticias['BLOCODIGO']; ?>"><?= $noticias['BLOTITULO']; ?></a></div>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>                    
                  
                </div>
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>