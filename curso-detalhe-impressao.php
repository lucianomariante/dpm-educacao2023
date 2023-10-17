<?php
    $pageName = "Detalhes dos";
    $vSTitulo = 'Página de Impressão dos Cursos';
    ob_start();
    require_once __DIR__.DIRECTORY_SEPARATOR.'include/constantes.php';
    ob_end_clean();
    require_once 'transaction/transactionCursos.php';
    require_once 'transaction/transactionDocentes.php';

    $codcurso     = filter_var($parametros[2], FILTER_SANITIZE_NUMBER_INT);
    $curso        = findCursoById($codcurso);
    $instrutor    = findInstrutorByIdCurso($codcurso);
    $investimento = findValoresByIdCurso($codcurso);
    $video        = findVideoByIdCurso($codcurso);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <base href="<?=$_SERVER['SCRIPT_NAME']?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $vSTitulo; ?></title>
    <link rel="stylesheet" type="text/css" href="library/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="library/slick/slick-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/impressao.css">
    <link rel="stylesheet" href="css/titulo-curso.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="libs/sweetalert/dist/sweetalert.css">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Google RECAPTCHA -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
    <style>
        .scrolling-bar {
            overflow-y: scroll;
            overflow-x: hidden;
            height: 1300px;
        }
        p .body-docent {
            -webkit-hyphens: auto;
               -moz-hyphens: auto;
                -ms-hyphens: auto;
                    hyphens: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-0">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">

                    <div class="row bg-beige-theme">
                        <div class="col-xs-12 col-sm-12 col-md-6 px-0 py-0 col-lg-12">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-10 py-10">
                                <div class="roboto-medium text-uppercase text-sub-title-21 pl-5" style="color: #4D4D4D !important"><?php echo $curso['CURTITULOSITE'];?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="30px" class="img-fluid" src="./icons-svg/impressao/icon-apresentacao.svg" alt="" fill="#000000"></img>
                                    <span id="apresentacao" class="roboto-bold-italic" style="color: #4D4D4D !important">Apresentação</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo strip_tags(nl2br($curso['CURAPRESENTACAO'])) ;?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="30px" class="img-fluid" src="./icons-svg/impressao/icon-data.svg" alt="">
                                    <span id="datahora" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">Data / Horário</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo nl2br($curso['CURDATAHORARIOSITE']); ?>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="30px" class="img-fluid" src="./icons-svg/impressao/icon-programa.svg" alt="">
                                    <span id="datahora" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">CONTEÚDO PROGRAMÁTICO</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                <?php echo strip_tags(nl2br($curso['CURCONTEUDOPROGRAMATICO'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if($curso['EAD'] == 'false')
                    { ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="25px" class="img-fluid" src="./icons-svg/impressao/icon-local.svg" alt="">
                                    <span id="local" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">Local</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo strip_tags(nl2br($curso['CURLOCALSITE'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="28px" class="img-fluid" src="./icons-svg/impressao/icon-time.svg" alt="">
                                    <span id="cargahora" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">Carga horária</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo strip_tags(nl2br($curso['CURCARGAHORARIASITE'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="30px" class="img-fluid" src="./icons-svg/impressao/icon-publico-alvo.svg" alt="">
                                    <span id="publicoalvo" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">Público Alvo</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo strip_tags(nl2br($curso['CURPUBLICOALVOSITE'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
                            <div class="info-section">
                                <div class="info-section-data">
                                    <img width="24px" class="img-fluid" src="./icons-svg/impressao/icon-programa.svg" alt="">
                                    <span id="programa" class="roboto-bold-italic text-orange-theme" style="color: #4D4D4D !important">Programa</span>
                                </div>
                                <p class="roboto-regular text-gray-2 text-sub-title-13">
                                    <?php echo strip_tags(nl2br($curso['CURCONTEUDOPROGRAMATICOSITE']), '<br>'); ?>
                                </p>
                            </div>
                        </div>
                    </div>-->
                    <div class="row">
						<?php foreach ($instrutor as $item) :
							$lattes       = findLattesByNomeDocente($item['INSNOME']);
						?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1 pb-3">
                            <div class="section-biography">
                                <div class="clearfix pl-4">
                                    <span id="professor" class="text-sub-title-22 roboto-bold-italic text-orange-theme text-lead-header pl-4 pr-2 pt-4 pb-2 d-block" style="color: #4D4D4D !important"><img width="27px" class="img-fluid" src="./icons-svg/impressao/icon-professor.svg" alt=""> Professor(a)</span>
                                    <div class="col-12">
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 float-left d-block text-line-height-19 pl-4 pr-4 pb-1 pt-0">
                                            <p class="d-block roboto-regular text-gray-2 text-sub-title-13 text-justify"><span class="roboto-bold"><?php echo $item['INSNOME'];?></span> - <?php echo $item['INSCARGO'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0 py-0 bg-beige-theme mt-1">
              <div class="section-investimento">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-investimento.svg" alt=""> <span id="investimento" class="roboto-bold-italic text-orange-theme">Investimento</span> </div><br>


                  <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col"><strong style="background: #464646; color: white; border-radius: 3px; margin: 0 5px; padding: 2px;"> ENTES PÚBLICOS COM </strong> contrato de consultoria com a Borba, Pause & Perin - DPM</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">JUNTAMENTE COM A MENSALIDADE</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO1_2']); ?></span>
                          por participante </td>
                      </tr>
                      <tr class="tabelando">
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO3']); ?></span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">ANTECIPADO COM DESCONTO</span> somente por transferência/PIX (sem emissão de boleto)</td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;color: black">VALOR BRUTO PARA EMPENHO</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORCOMCONTRATODESCONTO']); ?></span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESCONTRATOCOMDESCONTO3_OU']); ?></span>
                          por participante</td>
                      </tr>
                    </tbody>
                  </table>
                </div>


               <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col"><strong style="background: #464646; color: white; border-radius: 3px; margin: 0 5px; padding: 2px;"> ENTES PÚBLICOS SEM </strong> contrato de consultoria com a Borba, Pause & Perin - DPM</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">POR BOLETO</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO1_2']); ?></span>
                          por participante </td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESSEMCONTRATO4']); ?></span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">ANTECIPADO COM DESCONTO</span> somente por transferência/PIX (sem emissão de boleto)</td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;"><span style="color: black">VALOR BRUTO PARA EMPENHO</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORSEMCONTRATODESCONTO']); ?></span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO3']); ?></span>
                          por participante</td>                      </tr>

                    </tbody>
                  </table>
                                    <div class="text-center pt-5"><img src="imgs/atencao.png" width="500px" alt=""/></div>
                                        <a href="#" class="large-view roboto-regular text-sub-title-21 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: DPM Educação Ltda., CNPJ 13.021.017/0001-77</a> <a href="#" class="mobile-view roboto-regular text-sub-title-16 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: </br>
                                        DPM Educação Ltda., </br>
                                        CNPJ 13.021.017/0001-77</a>
                </div>



                  <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col">DEMAIS INTERESSADOS</th>
                      </tr>
                    </thead>
                    <tbody style="font-size: roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td width="65%" colspan="1" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">POR TRANSFERÊNCIA OU PIX</span></td>
                        <td width="35%" style="font-size: 15px;  border-bottom: 1px solid #dee2e6"><span style="color: black">VALOR</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td width="35%"><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESDEMAISINTPIX1_2']); ?></span>
                          por participante </td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 ou mais participantes</td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESDEMAISINTBOL1_2']); ?></span>
                          por participante</td>
                      </tr>
                      <tr style="padding-top: 20px; background: #e8e8e8">
                        <td colspan="1" style="border-right: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">Valores para pagamento <span style="font-family: roboto-bold; color: black; font-family: 'robotobold';">POR BOLETO BANCÁRIO</span></td>
                        <td style="font-size: 15px; border-bottom: 1px solid #dee2e6;"><span style="color: black">VALOR</span></td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6;"><img src="imgs/participantes02.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">01 a 02 participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESDEMAISINTPIX3_OU']); ?></span>
                          por participante</td>
                      </tr>
                      <tr>
                        <td colspan="1" style="border-right: 1px solid #dee2e6"><img src="imgs/participantes03.png" width="90px" style="margin-left: 10px" alt=""/><span style="padding: 0px 10px; font-size: 16px; font-weight: 600; color: black">03 a ou mais participantes</span></td>
                        <td><span style="font-size: 16px; font-weight: 600; color: black"><?= formatar_moeda($investimento['CXVVALORESDEMAISINTBOL3_OU']); ?></span>
                          por participante</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="table-responsive table-responsive-sm table-responsive-md mt-1" style="margin-bottom: 30px">
                  <table class="table">
                    <thead>
                      <tr class="bg-orange-theme text-center">
                        <th class="text-white-theme roboto text-sub-title-18" style="border-bottom: none; border-top: none" colspan="2" scope="col">DADOS BANCÁRIOS</th>
                      </tr>
                    </thead>
                    <tbody style="font-size:18px; roboto-condensed" class="tabelas-investimento">
                      <tr style="padding-top: 20px;">
                        <td width="" colspan="0" style="border-right: 1px solid #dee2e6; border-top:none; border-bottom: 1px solid #dee2e6;">
                <div class="col-12 p-2 text-center"><img src="imgs/dados-bancarios.png" width="85%" alt=""/></div></td>
                      </tr>

                    </tbody>
                  </table>
                </div>


            </div>
          </div>

        </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-beige-theme px-0 py-0 mt-1">
              <div class="section-instrucoes">
                <div class="info-section-data"> <img class="img-fluid" src="./icons-svg/icon-instrucoes.svg" alt=""> <span id="instrucoes" class="roboto-bold-italic text-orange-theme">Instruções</span> </div>
                <br>
                <?php $curso2 = findCursoById($codcurso); ?>
                <?= nl2br($curso2['CURINVESTIMENTOSITE']); ?>
                <div class="row">

                  <!-- <div class="col-12 col-sm-1 col-lg-1 ml-auto text-center print">
										<a href="/cursos/impressao/<?= $curso['CURCODIGO'] ?>" alt=""><img class="img-fluid" src="./icons-svg/icon-print.svg" alt=""></a>
									</div> -->
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
</body>
</html>