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
$cursos = comboCursosNovo( 0, 12 );
$vIRand = rand( 1, 3 );
$vSImagem[ 1 ] = 'banner1.png';
$vSImagem[ 2 ] = 'banner2.png';
$vSImagem[ 3 ] = 'banner3.png';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>
<base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />
<link rel="stylesheet" href="css/custom/fixedModal.css">
<style>
.grow {
	transition: all .2s ease-in-out;
}
.grow:hover {
	transform: scale(1.1);
}
    
    body {position: relative}    
</style>

<div class="central-aluno" style="position: absolute; top: 640px; right: -4px"><a href="https://www.dpmeducacao.com.br/ead/login.php" target="_blank"><img src="imgs/chamada_lateral.png"  style="width: 350px" alt=""/></a></div>
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 px-0 pb-5" style="position: relative">

        
    <div class="center-div"><br>
            <span class="roboto-bold text-lead-header">PRÓXIMOS CURSOS</span> </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">

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
                $vifinal = $item[ 'final' ];
                $dataCur = $item[ 'CURDATAINICIO' ];
                $dataCur = strtotime( $dataCur );
                $dia = strftime( '%d', $dataCur );
                $mes = ucfirst( strftime( '%b', $dataCur ) );
                $diaCompleto = ucfirst( strftime( '%d/%m/%Y', $dataCur ) );
                $modalidade = $item[ 'modalidade' ];
                if ( $modalidade == 'EAD' )
                  $cidadeCur = 'Transmissão on-line ';
                else
                  $cidadeCur = ' ' . $item[ 'CIDDESCRICAO' ];
                // echo 'xxx'.  $dataCur;

                ?>
                <div class="col-md-4" style="display: flex">
                  <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                    <div style="display: flex">
                      <div class="courses-box-day-2" style="font-size: 12px; letter-spacing: 16px;">
                        <div style="">
                          <?= $viinicial;
                          if ( $viinicial != $vifinal )
                            echo ' e ' . $vifinal;
                          ?>
                          <?= $mes ?>
                        </div>
                      </div>
                      <div><span class="curso-presencial" style="background-color:<?= $item['cormodalidade']; ?>;">
                        <?= $item['modalidade']; ?>
                        </span></div>
                    </div>
                    <div class="courses-grid-content">
                      <h4 title="<?= $item['CURTITULOSITE']; ?>"> <a href="cursos/<?= $item['CURCODIGO']; ?>" target="_blank">
                        <?= $item['CURTITULOSITE']; ?>
                        </a></h4>
                      <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"><i class="fas fa-map-marker-alt"></i> <b>
                        <?= $cidadeCur ?>
                        </b> </div>
                      <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                      <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-danger">LOTADO</button>
                      <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-info" style="background-color: #6f737e !important;" role="button">
                      <a href="/cursos/lista-espera/<?= $item['CURCODIGO']; ?>"> LISTA DE ESPERA</a>
                      </button>
                      <?php endif; ?>
                      <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] > 0) : ?>
                      <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">
                      <a style="background-color: #f59330" role="button"> <a href="/cursos/<?= $item['CURCODIGO']; ?>">INSCREVA-SE</a>
                      </button>
                      <?php endif; ?>
                      <?php if ($item['CURNOVATURMA'] == 'S') : ?>
                      <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary"  style="background-color: #5b88a5" role="button">
                      <a href="/cursos/<?= $item['CURVINCULOTREINAMENTO']; ?>">NOVA TURMA<BR>
                      (INSCRIÇÕES ABERTAS)</br>
                      </a>
                      </button>
                      <?php endif; ?>
                      <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0; background-color: #8e8e8e; color: white;" class="btn btn-gray"   style="background-color: #045071" role="button">
                      <a href="/cursos/<?= $item['CURCODIGO']; ?>"> SOBRE O CURSO</a>
                      </button>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
                                  <div class="mx-auto mt-3 mb-3 row-button">
          <div class="row-button"> <a class="roboto-bold btn btn-primary btn-load-more transition-color" href="/cursos" role="button">CARREGAR MAIS CURSOS</a> </div>
        </div>
        </div>
        
        <div class="col-md-3" style="margin-top: 62px">
        
            <div class="cursos-lateral">
                
                <div style="overflow-y: auto; overflow-x: hidden; height: 1296px">
                
                    <?php require_once('include/modal-Cursos.php'); ?>
                            
                </div>    

            
            </div>
            
             <div class="fixed-right-modal-btn"> <a class="btn-primary" style="margin-top: 20px" href="https://www.dpmeducacao.com.br/cursos">AGENDA COMPLETA</a> </div>
        </div>
        


      </div>
      <div class="row border-top-button text-center">

      </div>
      <div class="row">
        <div class="col-md-3"><a href="informacoes"><img class="grow" src="imgs/como-chegar-2.png" width="100%" alt=""/></a></div>
        <div class="col-md-3"><a href="hoteis-conveniados"><img class="grow" src="imgs/hoteis-conveniados-2.png" width="100%" alt=""/></a></div>
        <div class="col-md-3"><a href="cursos-in-company"><img class="grow" src="imgs/cursos-in-company-2.png" width="100%" alt=""/></a></div>
        <div class="col-md-3"><a href="certificacao-academica"><img class="grow" src="imgs/certificacao-academica-2.png" width="100%" alt=""/></a></div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
