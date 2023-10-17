<?php
    $pageName = "noticias";
    require_once 'header.php';
	require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php';
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

                    <?php $noticias = findNoticiaDetalhe($_GET['oid']);
						foreach ($noticias as $noticias) :
					?>
                    <div class="col-12 px-0 mb-3" style="border-bottom: 1px solid #eeeeee">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-lg-5 text-line-height-24">
                              <div class="text-sub-title-24 roboto-bold text-blue-theme text-justify pb-3"><?= $noticias['BLOTITULO']; ?></div>
                            <img src="https://dpmeducacao.com.br/app/imagensSite/fblog/<?= $noticias['BLOFOTO']; ?>" width="100%" alt="<?= $noticias['BLOTITULO']; ?>"/>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-lg-5">

                                <div class="roboto-regular text-gray-3 text-sub-title-16 text-justify margin-bottom-quem-somos"><?= $noticias['BLOTEXTO']; ?></div>
                            </div>
                        </div>
                    </div>

                        <a href="noticias.php" class="btn-primary text-sub-title-13" style="margin-top: 10px; padding: 5px; border-radius: 5px; text-decoration: none">Leia outras notícias</a>

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