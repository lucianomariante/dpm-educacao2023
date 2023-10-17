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
$cursos = comboCursosNovo(0, 100); 
$vIRand = rand(1, 3);
$vSImagem[1] = 'banner1.png';
$vSImagem[2] = 'banner2.png';
$vSImagem[3] = 'banner3.png';
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
              <span class="roboto-bold text-lead-header">PRÓXIMOS CURSOS</span>
            </div>
            <div class="central-aluno" style="position: absolute; top: 28px; right: 18px"><img src="imgs/chamada_lateral.png" style="width: 350px" alt=""/></div>
            <div class="section-block-white courses-section">
              <div class="container mt-60">
                <div class="section-heading">
                  <div class="section-heading-line-left"></div>
                  <p>Confira a agenda de cursos com participação do corpo técnico da Borba, Pause &amp; Perin - Advogados.</p>
                </div>

                <div class="row mt-30">
                  
                <?php foreach ($cursos as $item) :               
                  $curso        = $item [ 'CURCURSO' ];
                  $codCur = $item[ 'CURCODIGO' ];
                  $instrutor    = findInstrutorByIdCurso($codcurso);
                  $investimento = findValoresByIdCurso($codcurso);
                  $video        = findVideoByIdCurso($codcurso);
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
                     // echo 'xxx'.  $dataCur; 

                  ?>
                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">
                        <div class="courses-box-day-2">   
                     
                          <div style="border-top: solid 1px white">
						  <?= $viinicial;
							if ($viinicial != $vifinal)
								echo ' e '. $vifinal;
							?></div>
                          <p> <?= $mes ?></p>

                        </div>

                        <div><span class="curso-presencial" style="background-color:<?= $item['cormodalidade']; ?>;"><?= $item['modalidade']; ?></span></div>
                      </div>
                      <div class="courses-grid-content">
                      <h4 title="<?= $item['CURTITULOSITE']; ?>"> <a href="cursos/<?= $item['CURCODIGO']; ?>" target="_blank"> <?= $item['CURTITULOSITE']; ?></a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: <?= $item['CIDDESCRICAO']; ?></div>

                        <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                          <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-danger">LOTADO</button>
                          <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-info" href="cursos/lista-espera/<?= $item['CURCODIGO']; ?>" style="background-color: #6f737e !important;" role="button">Lista de espera</button>
														<?php endif; ?>
														<?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] > 0) : ?>
															<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #f59330" role="button">INSCREVA-SE</a></button>
														<?php endif; ?>
														<?php if ($item['CURNOVATURMA'] == 'S') : ?>
															<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary" href="cursos/<?= $item['CURVINCULOTREINAMENTO']; ?>" style="background-color: #5b88a5" role="button">NOVA TURMA<BR> (INSCRIÇÕES ABERTAS)</br></button>
														<?php endif; ?>
														<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray" href="cursos/<?= $item['CURCODIGO']; ?>" style="background-color: #045071" role="button">SOBRE O CURSO</a></button>
													</div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <div class="col-md-3" style="display: flex">
                    <div class="blog-grid-simple" style="margin: 0 0 0px 0; min-height: 295px; border: solid 1.5px #dedede;">
                      <div style="display: flex">

                        <div class="courses-box-day-2">

                          <div> </div>
                          <div style="border-top: solid 1px white">14</div>
                          <p>Out</p>
                        </div>
                        <div><span class="curso-ead"> CURSO EAD </span></div>
                      </div>
                      <div class="courses-grid-content">
                        <h4 title=" <?= $item['CURTITULOSITE']; ?>"></a></h4>
                        <div class="" style="font-size: 12px; padding: 5px 0;margin-top: 15px; margin-bottom: 30px; border-top: solid 1px #e6e6e6"> Local: Porto Alegre </div>
                         <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-primary">INSCREVA-SE</button>
                        <!--<button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-success">NOVA TURMA</button>-->
                        <button style="width: 100%; font-size: 12px; margin: 0 0 4px 0" class="btn btn-gray">SOBRE O CURSO</button>
                      </div>
                    </div>
                  </div>

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
            <div class="row border-top-button">
              <div class="mx-auto mt-3 mb-3 row-button">
                <div class="row-button"> <a class="roboto-bold btn btn-primary btn-load-more transition-color" href="/cursos" role="button">CARREGAR MAIS CURSOS</a> </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"><a href="informacoes"><img class="grow" src="imgs/como-chegar-2.png" width="100%" alt=""/></a></div>
            <div class="col-md-6"><a href="hoteis-conveniados"><img class="grow" src="imgs/hoteis-conveniados-2.png" width="100%" alt=""/></div>
            <div class="col-md-6"><a href="cursos-in-company"><img class="grow" src="imgs/cursos-in-company-2.png" width="100%" alt=""/></div>
            <div class="col-md-6"><a href="certificacao-academica"><img class="grow" src="imgs/certificacao-academica-2.png" width="100%" alt=""/></div>
          </div>

          <!--<div class="container my-5">
						<div class="row">
							<div class="col-12">
								<div id="content-8">
									<div class="one">
										<a href="duvidas-frequentes"><img class="img-fluid" src="./imgs/duvidas-frequentes.png" alt=""></a>
									</div>

									<div class="four">
										<div style="margin-bottom: 9px;">
											<a href="hoteis-conveniados"><img class="img-fluid" src="./imgs/hoteis-conveniados.png" alt=""></a>
										</div>
										<div>
											<a href="restaurantes-conveniados"><img class="img-fluid" src="./imgs/restaurantes-conveniados.png" alt=""></a>
										</div>
									</div>

									<div class="three">
										<a href="informacoes"><img class="img-fluid" src="./imgs/como-chegar.png" alt=""></a>
									</div>

									<div class="two">
										<a href="http://www.fema.com.br" target="_blanc"><img class="img-fluid" src="./imgs/fema.png" alt=""></a>
									</div>


									<div class="five">
										<a href="cursos-in-company"><img class="img-fluid" src="./imgs/cursos-in-company.png" alt=""></a>
									</div>
								</div>
							</div>
						</div>
					</div>-->

          <!-- NOTICIAS -->
          <?//php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-noticias.php'; ?>
          <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-imagens-sidebar.php'; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
