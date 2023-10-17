<?php
    $pageName = "curso-detalhe-impressao";
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
    <title>DPM - Educação</title>
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
                                <div class="info-section-data">
                                    <img width="30px" class="img-fluid" src="./icons-svg/impressao/icon-investimento.svg" alt="">
                                    <span id="investimento" class="roboto-bold-italic text-orange-theme" style="font-size:22px; color: #4D4D4D !important" >Investimento</span>
                                </div>
                                <div class="table-responsive px-5 table-responsive-sm table-responsive-md mt-1">
                                    <table class="table" style="font-size: 13px">
                                        <thead>
                                            <tr class="bg-dark text-center roboto-regular">
                                                <th class="text-white-theme roboto-regular text-sub-title-16" colspan="2" scope="col">Clientes <span class="roboto-black text-white-theme">COM</span> Contrato de Consultoria com a Borba, Pause & Perin - Advogados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
												<td colspan="1">01 a 02 participantes (pagamento na mensalidade)</td>
												<td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO1_2']); ?> cada</td>
											</tr>
											<tr>
												<td colspan="1">03 ou mais inscritos (pagamento na mensalidade com 10% de desconto)</td>
												<td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATO3']); ?> cada</td>
											</tr>
											<tr>
												<td colspan="1">Pagamento antecipado por depósito/transferência no ato da inscrição no evento (6% de desconto)<span class="roboto-bold"></span></td>
												<td><?= formatar_moeda($investimento['CXVVALORCOMCONTRATODESCONTO']); ?> cada</td>
											</tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive px-5 mt-4">
                                    <table class="table pl-5"  style="font-size: 13px">
                                        <thead>
                                            <tr class="bg-dark text-center roboto-regular">
                                                <th class="text-white-theme roboto-regular text-sub-title-16" colspan="2" scope="col">Clientes <span class="roboto-black text-white-theme">SEM</span> Contrato de Consultoria com a Borba, Pause & Perin - Advogados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
												<td colspan="1">01 a 02 participantes</td>
												<td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO1_2']); ?> cada</td>
											</tr>
											<tr>
												<td colspan="1">03 ou mais inscritos (pagamento por boleto bancário com 10% de desconto)</td>
												<td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATO3']); ?> cada</td>
											</tr>
											<tr>
												<td colspan="1">Pagamento antecipado por depósito/transferência no ato da inscrição no evento (6% de desconto)<span class="roboto-bold"></span></td>
												<td><?= formatar_moeda($investimento['CXVVALORSEMCONTRATODESCONTO']); ?> cada</td>
											</tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="large-view roboto-regular text-sub-title-21 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: DPM Educação Ltda., CNPJ 13.021.017/0001-77</a>
								<a href="#" class="mobile-view roboto-regular text-sub-title-19 btn btn-primary btn-sm btn-block rounded-0 transition-color mt-4" role="button" aria-pressed="true">Dados para empenho: </br>DPM Educação Ltda., </br>CNPJ 13.021.017/0001-77</a>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-beige-theme px-0 py-0 mt-0 text-sub-title-3">
                            <div class="section-instrucoes">
                                <div class="info-section-data">
                                    <img width="25px" class="img-fluid" src="./icons-svg/impressao/icon-instrucoes.svg" alt="">
                                    <span id="instrucoes" class="roboto-bold-italic text-orange-theme" style="font-size:22px; color: #4D4D4D !important">Instruções</span>
                                </div>
                                <span class="roboto-bold text-gray-2 text-uppercase" style="font-size: 13px">Inscrições</span>
                                <p style="font-size: 13px" class="mt-2"><span>WEB:</span> Clique no botão laranja <span>INSCREVER-SE</span>. Caso não possua login e senha de acesso ao site, encaminhar a(s) inscrição(ões) por e-mail ou fax.</p>

                                <p style="font-size: 13px;margin-top:-15px"><span>E-MAIL:</span> Encaminhar para cursos@dpmeducacao.com.br mensagem informando município, título do curso desejado, nome completo do(a) inscrito(a) sem abreviaturas, CPF, cargo, e-mail e telefones de contato (profissional e celular).</p>

                                <p style="font-size: 13px;margin-top:-15px"><span>FAX:</span> Enviar  para (51) 3027-3434 a ficha de inscrição disponível em https://borbapauseperin.adv.br/cursos-inscrever.php (clicar em Download Ficha de Inscrição em Formato Word).</p>

                                <p class="roboto-bold" style="font-size: 13px;margin-top:-15px; margin-bottom: 10px">REGISTRAMOS QUE, UMA VEZ FEITA A INSCRIÇÃO, PARA EFEITOS DE COBRANÇA, SO MENTE SERÁ CONSIDERADO O CANCELAMENTO FEITO COM ANTECEDÊNCIA MÍNIMA DE 04 (QUATRO) DIAS ÚTEIS DA DATA DO INÍCIO DO CURSO.</p><span class="roboto-bold text-gray-2 text-uppercase" style="font-size: 13px">dados bancários</span>

                                <p style="font-size: 13px;margin-bottom: 10px">Pagamentos que forem efetuados por depósito ou transferência bancária deverão ser efetuados na conta corrente nº 06.3244830-9, agência 0100, do Banco do Estado do Rio Grande do Sul - BANRISUL (041) e os respectivos comprovantes encaminhados <span>imediatamente</span> para o e-mail <span>cursos@dpmeducacao.com.br</span> ou fax (51) 3027-3434, para fins de emissão da nota fiscal eletrônica. <span>DPM EDUCAÇÃO LTDA., CNPJ 13.021.017/0001-77.</span></p>

                                <span class="roboto-bold text-gray-2 text-uppercase" style="font-size: 13px">Informações</span>

                                <p style="font-size: 13px;margin-bottom: 10px">DPM Educação, pelo telefone (51) 3027-3400, e-mail <span>cursos@dpmeducacao.com.br</span> ou chat online, de segunda a sexta-feira, no horário das 09h às 12h e das 13h30min às 17h30min.</p>

                                <span class="roboto-bold text-gray-2 text-uppercase" style="font-size: 13px">certificado de participação</span>
                                <p style="font-size: 13px">Será fornecido certificado de participação, contendo o percentual de frequência efetiva obtido pelo controle de acesso eletrônico.</p>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-beige-theme px-0 py-0 mt-0 text-sub-title-3">
                            <div class="section-instrucoes">
                                <div class="info-section-data">
                                    <img width="25px" class="img-fluid" src="./icons-svg/impressao/icon-instrucoes.svg" alt="">
                                    <span id="instrucoes" class="roboto-bold-italic text-orange-theme" style="font-size:22px; color: #4D4D4D !important">Instruções</span>
                                </div>

                                <?php $curso2 = findCursoById($codcurso); ?>
								<?= nl2br($curso2['CURINVESTIMENTOSITE']); ?>
								<div class="row">
									<div class="col-12">











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