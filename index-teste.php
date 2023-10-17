<?php
$pageName = "home";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header-teste.php';
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
													$vsCaminho = 'https://dpmeducacao.com.br/educacao/imagensSite/'.$item["CURIMAGEM"];
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
                                                        style="background-color: #4DA84D" role="button">Inscreva-se</a>
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
                
                    <!-- ABRE NOTICIAS -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 mb-0">
                        <div class="row">
                            <div class="center-div">
                              <span class="roboto-bold text-lead-header text-uppercase">notícias</span>
                            </div>
                        </div>
                        
    
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
          
                      <div class="row pt-2 mb-3" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 2rem !important;">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0"><img src="imgs/noticia-01.jpg" width="100%" alt=""/></div>
                            
                              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pt-0 text-justify">
                                  <div class="text-sub-title-20 roboto-bold text-blue-theme pb-2 xs-pt-20 xxs-pt-20"  style="line-height: 22px">DPM Educação realiza palestra aos servidores municipais de Alegrete/RS</div>

                                  <div class="text-sub-title-15 pb-3 roboto-regular" style="line-height: 18px">      
                                  Na última sexta-feira (dia 25/10/2019) o Diretor Técnico da DPM Educação, Profº. Júlio César Fucilini Pause, esteve presente no Município de Alegrete/RS proferindo palestra aos servidores municipais com o tema “A Nova Previdência Pública”.
                                  </div>

                                  <a href="noticias.php" class="btn-primary text-sub-title-13" style="margin-top: 10px; padding: 5px; border-radius: 5px; text-decoration: none">Leia a íntegra</a>      
                              </div>
            </div>
          
      </div>

      <div class="item">
                     
            <div class="row pt-2 mb-3" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 2rem !important;">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0"><img src="imgs/noticia-01.jpg" width="100%" alt=""/></div>
                            
                              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pt-0 text-justify">
                                  <div class="text-sub-title-20 roboto-bold text-blue-theme pb-2 xs-pt-20 xxs-pt-20"  style="line-height: 22px">DPM Educação realiza palestra aos servidores municipais de Alegrete/RS</div>

                                  <div class="text-sub-title-15 pb-3 roboto-regular" style="line-height: 18px">      
                                  Na última sexta-feira (dia 25/10/2019) o Diretor Técnico da DPM Educação, Profº. Júlio César Fucilini Pause, esteve presente no Município de Alegrete/RS proferindo palestra aos servidores municipais com o tema “A Nova Previdência Pública”.
                                  </div>

                                  <a href="noticias.php" class="btn-primary text-sub-title-13" style="margin-top: 10px; padding: 5px; border-radius: 5px; text-decoration: none">Leia a íntegra</a>      
                              </div>
            </div>
                      

      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


                      
                    </div>
                    <!-- FECHA NOTICIAS -->   
                
                    <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-imagens-sidebar.php'; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="content-8">
                                    <div class="one">
                                        <a href="https://www.fema.com.br" target="_blanc"><img class="img-fluid"
                                                src="./imgs/fema.png" alt=""></a>
                                    </div>
                                    <div class="two">
                                        <a href="duvidas-frequentes"><img class="img-fluid"
                                                src="./imgs/duvidas-frequentes.png" alt=""></a>
                                    </div>
                                    <div class="three">
                                        <a href="informacoes"><img class="img-fluid" src="./imgs/como-chegar.png"
                                                alt=""></a>
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
                                    <div class="five">
                                        <a href="cursos-in-company"><img class="img-fluid"
                                                src="./imgs/cursos-in-company.png" alt=""></a>
                                    </div>
                                </div>
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