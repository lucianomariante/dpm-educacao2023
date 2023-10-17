<?php
    $pageName = "curso-detalhe";
    require_once 'header.php';
    require_once 'transaction/transactionCursos.php';
    require_once 'transaction/transactionDocentes.php';

    $codcurso     = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
    $curso        = findCursoById($codcurso);
    $instrutor    = findInstrutorByIdCurso($codcurso);	
    $investimento = findValoresByIdCurso($codcurso);
    $video        = findVideoByIdCurso($codcurso);   

    $nro_vagas = $curso['CURVAGAS'];
    $nro_vagas_disponiveis = $nro_vagas - $curso['CURMATRICULADOS'];		
	$vIRand = rand(1,3); 
	$vSImagem[1] = 'banner1.png';
	$vSImagem[2] = 'banner2.png';
	$vSImagem[3] = 'banner3.png';
	//echo nl2br($curso['CURDATAHORARIOSITE']);
?>

<div class="container-fluid carousel-inner px-0">
    <img class="img-fluid banner-hide-sm" src="./imgs/<?=$vSImagem[$vIRand];?> " alt="" id="bannerAleatorio" name="bannerAleatorio">
    <div class="card-body carousel-caption text-img-top-center"></div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- mobile view -->
                    <div class="box-inscreva bg-blue-theme text-white-theme visibility-hidden">
                        <!-- <h3 class="roboto-bold-italic text-sub-title-24">Quando?</h3> -->
                        <p class="roboto-regular text-sub-title-17">
                            <?php echo nl2br($curso['CURDATAHORARIOSITE']);?>
                        </p>
                        <!-- <h3 class="roboto-bold-italic text-sub-title-24">Onde?</h3> -->
                        <p class="roboto-regular text-sub-title-17">
                            <?php echo strip_tags($curso['CURLOCALSITE'], '<b><strong>');?>
                        </p>
                        <h3 class="roboto-bold-italic text-sub-title-24">Para Quem?</h3>
                        <p class="roboto-regular text-sub-title-17">
                            <?php echo strip_tags($curso['CURPUBLICOALVOSITE'], '<b><strong>');?>
                        </p>                        
                        <?php if ($nro_vagas_disponiveis <= 0) {  ?>
                        <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
                        <a class="raleway-bold btn btn-blue btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?php echo $curso['CURCODIGO']; ?>" role="button">Lista de espera</a>
                        <?php } else { ?>
						<a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 transition-color mb-1" href="cursos-inscricao/clientes/<?php echo $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
						<?php } ?>
                        <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
                        <a class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="#" role="button">Nova Turma </br> <span >(Inscrições abertas)</span></a>
                        <?php endif; ?>
                    </div>
                    <!-- en mobile view -->
                    <!-- large view -->
                    <div>
                        <div class="box-float box-inscreva bg-blue-theme text-white-theme box-floating large-visible quando dont-show">
                            <!-- <h3 class="roboto-bold-italic text-sub-title-24">Quando?</h3> -->
                            <p class="roboto-regular text-sub-title-17">
                                <?php echo nl2br(strip_tags($curso['CURDATAHORARIOSITE'], '<b><strong><br><br/><br />'));?>
                            </p>
                            <!-- <h3 class="roboto-bold-italic text-sub-title-24">Onde?</h3> -->
							<p class="roboto-regular text-sub-title-17  text-justify"><?php echo nl2br(strip_tags($curso['CURLOCALSITE'], '<b><strong>'));?></p>
                            
                            <h3 class="roboto-bold-italic text-sub-title-24">Para Quem?</h3>
                            <p class="roboto-regular text-sub-title-17 text-justify">
                                <?php echo strip_tags($curso['CURPUBLICOALVOSITE'], '<b><strong>');?>
                            </p>                            
                            <?php if ($nro_vagas_disponiveis <= 0) { ?>
                            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
                            <a class="raleway-bold btn btn-blue btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16"
                            href="cursos/lista-espera/<?php echo $curso['CURCODIGO']; ?>" role="button">Lista de espera</a>
                            <?php } else { ?>
							<a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase transition-color mb-1" href="cursos-inscricao/clientes/<?php echo $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
                            <?php }
							if ($curso['CURNOVATURMA'] === 'S') : ?>
                            <a class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/<?php echo $curso['CURVINCULOTREINAMENTO']; ?>" role="button">Nova Turma </br> <p class="text-sub-title-10">(Inscrições abertas)</p></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- end large view -->

                    <div class="aside-menu">
                        <ul>
                            <li><a href="#apresentacao">Apresentação</a></li>
                            <!-- <li><a href="#datahora">Data / Horário</a></li> -->
                            <!-- <li><a href="#local">Local</a></li> -->
                            
                            <li><a href="#publicoalvo">Público-Alvo</a></li>
                            <li><a href="#cargahora">Carga Horária</a></li>
                            <li><a href="#programa">Metodologia</a></li>
                            <li><a href="#professor">Professor(a)</a></li>
                            <li><a href="#investimento">Investimento</a></li>
                            <li><a href="#instrucoes">Instruções</a></li>
                        </ul>
                    </div>
                    <div class="curso-site-banner">
                        <a href="https://dpm-rs.com.br/central_aluno/login.php">
                            <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/chamada_lateral.png" alt="">
                        </a>
                        <a href="hoteis-conveniados">
                            <img id="banner-chamada-1"  class="img-fluid mx-auto d-block" src="./imgs/hoteis-conveniados.png" style="border-top: none !important; border-bottom: none" alt="">
                        </a>
                        <a href="restaurantes-conveniados">
                          <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/restaurantes-conveniados.png"
                          style="border-top: none !important; border-bottom: none" alt="">
                        </a>
                        <div class="col-12 roboto-regular text-center text-gray-3 text-sub-title-15 pb-0" style="border:none !important">Parceira Acadêmica</div>
                        <a href="https://www.fema.com.br" target="_blanc">
                            <img style="border:none !important" id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./icons-svg/icon-logo-fema-01.svg" width="250px" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                   
                    <div class="row" style="background-color: #00548E">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-10 py-10 text-left">
                            <span class="roboto-medium text-uppercase text-sub-title-20" style="color: #FFFFFF" ><?php echo $curso['CURTITULOSITE'];?></span>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border-box-print-top px-0 pb-0">
                            <div class="col-12 col-md-5 col-lg-5 px-0 py-0 float-right">
                            <a class="raleway-bold btn btn-lg rounded-0 float-right bg-orange-theme text-white-theme btn-print-top text-uppercase" href="/cursos/impressao/<?= $curso['CURCODIGO'] ?>" role="button"><i class="fa fa-print text-white-theme text-sub-title-25 float-left" aria-hidden="true"></i> IMPRIMIR</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-apresentacao.svg" alt="">
                                    <span id="apresentacao" class="roboto-bold-italic text-orange-theme">Apresentação</span>
                                </div>
                                
                                <?php if ($video['CXVURL'] != '') : ?>
                                <div class="row px-5 pt-1">
                                      <div class="px-0 roboto-regular text-justify text-gray-2 text-sub-title-15">
                                          
                                          <div class="">
                                          <?php echo nl2br($curso['CURAPRESENTACAO']) ;?>
                                          </div>      
                                          
                                          <div class="col-12 px-2 pb-1 roboto-bold text-center" style="border-bottom: solid 1px orange"><i style="color: orange" class="fa fa-video-camera" aria-hidden="true"></i> ASSISTA A SINOPSE DO CURSO</div>

                                          <div class="section-two">
                                            
                                                <iframe src="https://player.vimeo.com/video<?php echo $video['CXVURL']; ?>" width="940" height="660" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                                <p><a href="https://vimeo.com<?php echo $video['CXVURL']; ?>"></a></p>
                                            </div>
                                           <!--<div class="px-3 clearfix">
                                                <a href="#" class="roboto-regular text-sub-title-14 btn btn-orange btn-sm btn-block rounded-0 transition-color2 mt-2" role="button" aria-pressed="true">Assista o vídeo da sinopse do curso</a>
                                           </div>-->

                                      </div>    
                        
                                 </div>
                                
                                <?php else: ?>
                        
                                        <div class="px-0 pt-1 col-12 roboto-regular text-justify text-gray-2 text-sub-title-15">
                                          <?php echo nl2br($curso['CURAPRESENTACAO']) ;?>
                                      </div>
                              
                                <?php endif; ?>
                                
      
                            </div>
                        </div>
                    </div>
                    <!--div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-data.svg" alt="">
                                    <span id="datahora" class="roboto-bold-italic text-orange-theme">Data / Horário</span>
                                </div>
                                <p class="roboto-regular text-sub-title-15">
                                    <?php echo nl2br($curso['CURDATAHORARIOSITE']) ;?>
                                </p>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-local.svg" alt="">
                                    <span id="local" class="roboto-bold-italic text-orange-theme">Local</span>
                                </div>
                                <p class="roboto-regular text-sub-title-15">
                                    <?php echo nl2br($curso['CURLOCALSITE']) ;?>
                                </p>
                            </div>
                        </div>
                    </div>-->


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-publico-alvo.svg" alt="">
                                    <span id="publicoalvo" class="roboto-bold-italic text-orange-theme">Público-Alvo</span>
                                </div>
                                <p class="roboto-regular text-sub-title-15">
                                    <?php echo nl2br($curso['CURPUBLICOALVOSITE']) ;?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-time.svg" alt="">
                                    <span id="cargahora" class="roboto-bold-italic text-orange-theme">Carga horária</span>
                                </div>
                                <p class="roboto-regular text-sub-title-15">
                                    <?php echo nl2br($curso['CURCARGAHORARIASITE']) ;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                            <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-programa.svg" alt="">
                                    <span id="programa" class="roboto-bold-italic text-orange-theme">Módulos</span>
                                    </div>
                                <p class="roboto-regular text-sub-title-15">
                                    <?php $modolos = explode("/-/", $curso['MODOLOSEAD']); 
                                    foreach($modolos as $modolo){
                                        ?><li><?=$modolo?></li><?php
                                    }
                                ?>
                                    </div> 
                                                 
                                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                            <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-programa.svg" alt="">
                                   <span id="programa" class="roboto-bold-italic text-orange-theme">Metodologia</span>
                                
                                <?php echo nl2br($curso['CURCONTEUDOPROGRAMATICOSITE']) ;?>
                                <?php echo nl2br($curso['METODOLOGIAEAD']) ;?>                            
                                </div>    
                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<?php foreach ($instrutor as $item) : 
							$lattes       = findLattesByNomeDocente($item['INSNOME']);
						?>	
	
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1 pb-3">
                            <div class="section-biography">
                                <div class="clearfix">
                                    <span id="professor" class="roboto-bold-italic float-left text-orange-theme text-lead-header pl-4 pr-2 pt-2 pb-2 d-block"><img class="img-fluid" src="./icons-svg/icon-professor.svg" alt=""> Professor(a)
                                    </span>
                                    <div class="col-12">
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 float-left d-block pl-4 pr-4 pb-1 pt-0">
                                            <p class="d-block roboto-regular text-sub-title-16 text-justify">
                                                <span class="roboto-bold"><?php echo $item['INSNOME'];?></span> - <?php echo $item['INSCARGO'];?>
                                            </p>
                                        </div>
                                        <div class="img-shadow col-xs-12 col-sm-12 col-md-12 col-lg-3 float-left text-center">
                                            <img src="https://educacao.dpm-rs.com.br//ImagensInstrutores/<?php echo $item['INSFOTO'];?>" alt="" width="140" height="140">
                                        </div>
                                    </div>
                                </div>
                                <div class="biography">
                                    <img src="./icons-svg/icon-latus.svg" width="120">
                                    <a class="roboto-regular text-orange-theme link-orange" href="<?php echo $lattes['CODLINK']; ?>" target="_blanc" style="text-decoration:none;"><?php echo $lattes['CODLINK']; ?></a>
                                </div>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="section-investimento">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-investimento.svg" alt="">
                                    <span id="investimento" class="roboto-bold-italic text-orange-theme">Investimento</span>
                                </div>
                                <div class="table-responsive table-responsive-sm table-responsive-md table-bordered mt-1 roboto-regular">
                                    <table class="table">
                                        <thead>
                                            <tr class="bg-orange-theme text-center roboto-regular">
                                                <th class="text-white-theme roboto-regular text-sub-title-19" colspan="2" scope="col">Clientes <span class="roboto-black text-white-theme">COM</span> Contrato de Consultoria com a Borba, Pause & Perin - Advogados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="1">01 a 02 participantes (pagamento na mensalidade)</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO1_2']);?> cada</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1">03 ou mais inscritos (pagamento na mensalidade)</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO3']);?> cada</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1">Pagamento antecipado por depósito ou boleto bancário. ATÉ <span class="roboto-bold"><?= formatar_data($investimento['CXVDATADESCONTO']);?></span>.</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATODESCONTO']);?> cada</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive table-bordered mt-4 roboto-regular">
                                    <table class="table">
                                        <thead>
                                            <tr class="bg-orange-theme text-center roboto-regular">
                                                <th class="text-white-theme roboto-regular text-sub-title-19" colspan="2" scope="col">Clientes <span class="roboto-black text-white-theme">SEM</span> Contrato de Consultoria com a Borba, Pause & Perin - Advogados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="1">01 a 02 participantes</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO1_2']);?> cada</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1">03 ou mais inscritos</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO3']);?> cada</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1">Pagamento antecipado por depósito ou boleto bancário. <span class="roboto-bold">ATÉ <?= formatar_data($investimento['CXVDATADESCONTO']);?></span>.</td>
                                                <td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATODESCONTO']);?> cada</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="large-view roboto-regular text-sub-title-21 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: DPM Educação Ltda., CNPJ 13.021.017/0001-77</a>
                                <a href="#" class="mobile-view roboto-regular text-sub-title-19 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: </br>DPM Educação Ltda., </br>CNPJ 13.021.017/0001-77</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-beige-theme px-0 py-0 mt-1">
                            <div class="section-instrucoes">
                                <div class="info-section-data">
                                    <img class="img-fluid" src="./icons-svg/icon-instrucoes.svg" alt="">
                                    <span id="instrucoes" class="roboto-bold-italic text-orange-theme">Instruções</span>
                                </div><br>
                                <?php echo nl2br($curso['CURINVESTIMENTOSITE']) ;?>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4 px-0 py-0 text-center btn-inscreva-se">
										<?php if ($nro_vagas_disponiveis <= 0) {  ?>
										<a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" style="color: white !important;" role="button">lotado</a>
										<a class="raleway-bold btn btn-blue btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16"
										href="cursos/lista-espera/<?php echo $curso['CURCODIGO']; ?>" role="button">Lista de espera</a>
										<?php } else { ?>
                                        <a class="raleway-bold btn btn-lg rounded-0 button-link bg-orange-theme text-white-theme  text-uppercase transition-color mb-1 text-sub-title-16" href="cursos-inscricao/clientes/<?php echo $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
										<?php }  ?>
                                    </div>
                                    <div class="col-12 col-sm-1 col-lg-1 ml-auto text-center print">
                                        <a href="/cursos/impressao/<?= $curso['CURCODIGO'] ?>" alt=""><img class="img-fluid" src="./icons-svg/icon-print.svg" alt=""></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>