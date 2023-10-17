<?php
$pageName = "home";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionTabela.php';
require_once( 'header.php' );
$cursos = comboCursosNovo( 0, 6 );
$vSTitulo = 'DPM - Educação Aprimorando o exercício da função pública';
$vSDescription = 'DPM - Educação Aprimorando o exercício da função pública';
$vSCanonical = 'https://dpmeducacao.com.br';
$cursos = comboCursosNovo( 0, 100 );
$vIRand = rand( 1, 3 );
$vSImagem[ 1 ] = 'banner1.png';
$vSImagem[ 2 ] = 'banner2.png';
$vSImagem[ 3 ] = 'banner3.png';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>
<base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />
<style>
.grow {
	transition: all .2s ease-in-out;
}
.grow:hover {
	transform: scale(1.1);
}
</style>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 px-0 pb-5">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="col-12 px-0">
            <div class="center-div"><br>
              <span class="roboto-bold text-lead-header">PRÓXIMOS CURSOS</span> </div>
            <div class="central-aluno" style="position: absolute; top: 28px; right: 18px"><a href="https://www.dpmeducacao.com.br/ead/login.php" target="_blank"><img src="imgs/chamada_lateral.png"  style="width: 350px" alt=""/></a></div>
            <div class="section-block-white courses-section">
              <div class="container mt-60">
                <div class="section-heading">
                  <div class="section-heading-line-left"></div>
                  <p></p>
                </div>
                <div class="row mt-30">
                  <?php
                  foreach ( $cursos as $item ):
                    $curso = $item[ 'CURCURSO' ];
                  $codCur = $item[ 'CURCODIGO' ];
                  $instrutor = findInstrutorByIdCurso( $codcurso );
                  $investimento = findValoresByIdCurso( $codcurso );
                  $video = findVideoByIdCurso( $codcurso );
                  $viinicial = $item[ 'inicial' ];
                  $vSfinal = $item[ 'CURDATAINICIO' ];
                  $tituloCur = $item[ 'CURTITULOSITE' ];
                  $cidadeCur = $item[ 'CIDDESCRICAO' ];
                  $modalidade = $item[ 'modalidade' ];
                  if ( $modalidade == 'EAD' )
                    $cidadeCur = 'Transmissão on-line ';
                  else
                    $cidadeCur = ' ' . $item[ 'CIDDESCRICAO' ];

                  $vifinal = $item[ 'final' ];
                  $dataCur = $item[ 'CURDATAINICIO' ];
                  $dataCur = strtotime( $dataCur );
                  $dia = strftime( '%d', $dataCur );
                  $mes = ucfirst( strftime( '%b', $dataCur ) );
                  $diaCompleto = ucfirst( strftime( '%d/%m/%Y', $dataCur ) );
                  // echo 'xxx'.  $dataCur;

                  ?>
                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2" style="font-size: 12px; letter-spacing: 16px;">
                          <div style="">
                            <?= $viinicial;
                            if ( $viinicial != $vifinal )
                              echo ' - ' . $vifinal;
                            ?>
                            <?= $mes ?>
                          </div>
                        </div>
                        <div><span class="curso-modalidade" style="background-color:<?= $item['cormodalidade']; ?>;">
                          <?= $item['modalidade']; ?>
                          </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="<?= $item['CURTITULOSITE']; ?>"> <a href="https:/cursos/<?= $item['CURCODIGO']; ?>" target="_blank">
                          <?= $item['CURTITULOSITE']; ?>
                          </a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"><i class="fas fa-map-marker-alt"></i><b>
                          <?=  $cidadeCur; ?>
                          </b></div>
                        <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-danger">LOTADO</button>
                        <a href="/cursos/lista-espera/<?= $item['CURCODIGO']; ?>"><button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-info"  style="background-color: #6f737e !important;" role="button">
                        LISTA DE ESPERA
                        </button></a>
                        <?php endif; ?>
                        <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] > 0) : ?>
                        <a href="/cursos/<?= $item['CURCODIGO']; ?>"><button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary"  style="background-color: #f59330" role="button">
                        INSCREVA-SE
                        </button></a>
                        <?php endif; ?>
                        <?php if ($item['CURNOVATURMA'] == 'S') : ?>
                        <a href="/cursos/<?= $item['CURVINCULOTREINAMENTO']; ?>"><button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary"  style="background-color: #5b88a5" role="button">
                        NOVA TURMA<BR>
                        (INSCRIÇÕES ABERTAS)</br>
                        </button></a>
                        <?php endif; ?>
                        <a href="/cursos/<?= $item['CURCODIGO']; ?>"><button style="width: 100%;
    font-size: 12px;
    margin: 0 0 4px 0;
    background-color: #8e8e8e;
    color: white;" class="btn btn-gray"   style="background-color: #045071" role="button">
                         SOBRE O CURSO
                        </button></a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  
                  <!--<div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                         <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                 <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>20</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-presencial"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                       <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">
                          <div>13</div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO PRESENCIAL </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title="CURSO PRESENCIAL: O Estágio Probatório dos Servidores Públicos: Teoria e Prática"> <a href="https://www.dpmeducacao.com.br/cursos/9725" target="_blank"> O Estágio Probatório dos Servidores Públicos: Teoria e Prática</a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>--> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <?//php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
<!-- BEGIN SHAREAHOLIC CODE -->
<link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
<meta name="shareaholic:site_id" content="44e45da0bc93f827980251ac68118791" />
<script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script> 
<!-- END SHAREAHOLIC CODE -->
</body></html>