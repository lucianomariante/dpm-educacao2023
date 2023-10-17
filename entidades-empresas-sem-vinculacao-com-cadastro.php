<?php
$pageName = "entidade-sem-vinculo-com-cadastro";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionClientes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionTabela.php';

$clicodigo = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
$curcodigo = filter_var($parametros[3], FILTER_SANITIZE_NUMBER_INT);

$vaga    = findVagasCursoByIdCurso($curcodigo);
$cliente = findClienteById($clicodigo);

$tipo_cliente = ($cliente['CLITIPOCLIENTE'] == 'J') ? 'J' : 'F';

$areas   = comboTabelas('TREINAMENTOS - INDICE POR AREA DE CONHECIMENTO');
?>
<input type="text" id="tipo_cliente" value="<?= $tipo_cliente ?>"disabled hidden>

<div class="container-fluid carousel-inner px-0">
    <img class="img-fluid banner-hide-sm" src="./imgs/banner-inscricoes-cursos-site.png" alt="">
    <div class="card-body carousel-caption text-img-top-left">
        <span class="card-title text-center roboto-medium"></span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 pr-lg-5">
                    <div class="col-10 px-0 py-0 my-3 bg-azul-padrao round-corners10">
                        <div class="roboto-bold text-white pt-2 pl-4 text-sub-title-28">PASSO 02: Formulário de
                            Inscrição</div>
                        <div class="roboto-light text-white pt-0 pb-3 pl-4">Faça seu cadastro para dar continuidade à
                            sua inscrição</div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0">
                                <span>Curso<br></span>
                                <span class="roboto-bold-italic text-orange-theme text-sub-title-27"
                                    style="line-height: 28px"><?php echo $vaga['CURCURSO']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 pt-1">
                                <span class="roboto-medium text-sub-title-14"
                                    style="line-height: 28px; border-radius: 4px; padding: 5px;">
                                    <em class="far fa-calendar-alt"></em>&nbsp;
                                    <?php echo utf8_encode(strftime('%d de %B de %Y', strtotime($vaga['CURDATAINICIO']))); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3" style="margin: 0 auto 0 0; background-color: #CED4DA; height: 1px;"></div>
                    <div class="col-12 px-3 pt-2 mt-3 ml-0"
                        style="border-radius: 10px; background-image: linear-gradient(to top left, #f8f8f8 , #f0f0f0);">
                        <div class="col-12 px-0 py-0">
							<?php if ($cliente['CLITIPOCLIENTE'] == 'J'){ ?>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 roboto-bold text-sub-title-20 text-gray-3 mt-2"
                                    style="line-height: 17px"><em class="fas fa-store-alt"></em>
                                    ENTIDADES/EMPRESAS</div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 17px"> (Executivo, Legislativo e Autarquias das esferas
                                    Municipal, Estadual e Federal e empresas privadas).</div>
                            </div>
							<?php } else { ?>
							<div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 roboto-bold text-sub-title-20 text-gray-3 mt-2"
                                    style="line-height: 17px"><em class="fas fa-store-alt"></em>
                                    PESSOA FÍSICA</div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 17px"> (Profissionais liberais/autônomos).<br/>
									*Campo para inscrição custeada com recursos próprios, ou seja, subsidiada pelo próprio aluno.
									</div>
                            </div>
							<?php }  ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                        <div class="row pl-3">
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9 pr-0">
                                                <input id="cpf_cnpj" name="cpf_cnpj" type="text"
                                                    class="form-control lg-input"
                                                    placeholder="<?php echo $cliente['CPF_CNPJ']; ?>" disabled>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
                                                <a class="roboto-bold btn" role="button"
                                                    style="background:none; border: 1px solid #10B30A; font-size: 15px; color: #10B30A">
                                                    <i class="fas fa-check" style="color:#10B30A"></i> Verificado</a>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-2 ml-3"
                                            style="border: 1.4px solid #d4d4d4; border-radius: 8px">
											<!--
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
                                                    style="color: #01548e">
                                                    <i class="fas fa-check-square" style="color: #10B30A"></i> JÁ
                                                    POSSUÍMOS O SEU CADASTRO!
                                                </div>o
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 pb-1">
														<a class="voltar-tela" href="identificacao-acesso/<?= $curcodigo;?>">Volte à tela anterior</a> e selecione a opção <span class="roboto-bold">Cliente COM Login e Senha ou Cliente SEM Login e Senha caso não tenha senha</span> para efetuar sua inscrição no curso.</div>
												</div>
                                            </div>-->
                                            <div class="row">
                                                <div
                                                    class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 pb-1">
                                                    Preencha os dados abaixo para finalizar sua inscrição no curso.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 mt-1">
                                <form class="inscricao-curso" id="inscricao-curso">
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for="vSCLIRAZAOSOCIAL"></label>
                                                <input id="vSCLIRAZAOSOCIAL" name="vSCLIRAZAOSOCIAL" type="text"
                                                    class="roboto-bold form-control lg-input ml-3 mr-3"
                                                    placeholder="Cliente"
                                                    value="<?php echo $cliente['CLINOMEFANTASIA']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUCPF"></label>
                                                <input id="vSALUCPF" name="vSALUCPF" type="text"
                                                    class="form-control lg-input ml-3 mr-3 cpf"
                                                    placeholder="CPF do Aluno">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUNOME"></label>
                                                <input id="vSALUNOME" name="vSALUNOME" type="text"
                                                    class="form-control lg-input ml-3 mr-3"
                                                    placeholder="Nome Completo do Aluno SEM Abreviaturas">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUCARGO"></label>
                                                <input id="vSALUCARGO" name="vSALUCARGO" type="text"
                                                    class="form-control lg-input ml-3 mr-3" placeholder="Cargo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALULOTACAO"></label>
                                                <input id="vSALULOTACAO" name="vSALULOTACAO" type="text"
                                                    class="form-control lg-input ml-3 mr-3"
                                                    placeholder="Secretaria/Departamento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUEMAIL"></label>
                                                <input id="vSALUEMAIL" name="vSALUEMAIL" type="email"
                                                    class="form-control lg-input ml-3 mr-3"
                                                    placeholder="E-mail de Contato">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="" for="vSALUEMAILALTERNATIVO"></label>
                                                <input id="vSALUEMAILALTERNATIVO" name="vSALUEMAILALTERNATIVO"
                                                    type="email" class="form-control lg-input ml-3 mr-3"
                                                    placeholder="E-mail Alternativo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUFONE"></label>
                                                <input id="vSALUFONE" name="vSALUFONE" type="tel"
                                                    class="form-control lg-input ml-3 mr-3 telefone"
                                                    placeholder="Telefone Fixo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label class="required" for="vSALUCELULAR"></label>
                                                <input id="vSALUCELULAR" name="vSALUCELULAR" type="text"
                                                    class="form-control lg-input ml-3 mr-3 telefone"
                                                    placeholder="Telefone Celular">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label for="vSALUPCD"></label>
                                                <input id="vSALUPCD" name="vSALUPCD" type="text"
                                                    class="form-control lg-input ml-3 mr-3"
                                                    placeholder="Se for Portador de Necessidades Especiais Informe Aqui!">
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 text-line-height-2">
                                                <label for="vSALUOBSERVACOES"></label>
                                                <textarea id="vSALUOBSERVACOES" name="vSALUOBSERVACOES"
                                                    class="form-control pr-0 ml-3" id="" rows="4"
                                                    placeholder="Observações"></textarea>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="form-group row">
                                        <div
                                            class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-0 text-line-height-2">
                                            <span
                                                class="required roboto-regular ml-1 text-blue-theme text-sub-title-14">Campos
                                                com preenchimento obrigatório</span>
                                        </div>
                                    </div>
                                    <div class="col-12 px-3 py-3 text-sub-title-14">
                                        <div class="form-group row">
                                            <div class="col-12 px-0 py-0 pl-3 pt-2">
                                                <div class="col-12 roboto-bold text-sub-title-15 mb-2 round-corners10"
                                                    style="background: #f7f7f7;">Opções de Pagamento:</div>
                                                <div class="col-12">
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input type="radio" class="custom-control-input"
                                                            id="transferencia" name="tipo_pagamento"
                                                            title="Tipo de Pagamento" value="transferencia">
                                                        <label
                                                            class="roboto-medium text-sub-title-16 custom-control-label"
                                                            for="transferencia">DEPÓSITO / TRANSFERÊNCIA BANCÁRIA
                                                        </label>
                                                        <div class="col-11 pt-2 px-0 roboto-light text-sub-title-15">
                                                            <span class="roboto-medium">Banco:</span> BANRISUL (041)<br>
                                                            <span class="roboto-medium">Agência:</span> 0100<br>
                                                            <span class="roboto-medium">Conta Corrente:</span>
                                                            06.324.483.0-9<br>
                                                            <span class="roboto-medium">Favorecido:</span> DPM EDUCAÇÃO
                                                            - CNPJ 13.021.017/0001-77<br>

                                                            <div
                                                                class="mt-3 roboto-light text-sub-title-14 text-line-height-20">
                                                                Após a efetivação, enviar comprovante para
                                                                cursos@dpmeducacao.com.br, a fim de imediata emissão da
                                                                nota fiscal.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input type="radio" class="custom-control-input" id="boleto"
                                                            name="tipo_pagamento" title="Tipo de Pagamento"
                                                            value="boleto">
                                                        <label
                                                            class="roboto-medium text-sub-title-16 custom-control-label"
                                                            for="boleto">BOLETO BANCÁRIO</label>
                                                        <div class="col-11 pt-2 px-0 roboto-light text-sub-title-14">
                                                            Aguarde as informações do seu boleto em seu(s) e-mail(s).
                                                            <div class="mt-2">Caso não receba em até 24h, verifique no
                                                                spam ou entre em contato pelo e-mail
                                                                cursos@dpmeducacao.com.br ou fone (51) 3094.3440 com a
                                                                DPM Educação.
                                                            </div>
                                                        </div>
                                                    </div>
													<?php if ($cliente['CLITIPOCLIENTE'] == 'J'){ ?>
                                                    <!--<div class="col-12 roboto-bold text-sub-title-15 mb-2 round-corners10"
                                                        style="background: #f7f7f7;">Retenção(ões)</div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-radio mb-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="ret_minima" name="retencao" title="Retenção"
                                                                value="1,5">
                                                            <label
                                                                class="roboto-medium text-sub-title-16 custom-control-label"
                                                                for="ret_minima">1,5% de IRRF (Imposto de Renda Retido na Fonte)</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-1">
                                                            <input type="radio" class="custom-control-input"
                                                                id="ret_maxima" name="retencao" title="Retenção"
                                                                value="4,8">
                                                            <label
                                                                class="roboto-medium text-sub-title-16 custom-control-label"
                                                                for="ret_maxima">4,8% de IRRF (Imposto de Renda Retido na Fonte)</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                            <input type="radio" class="custom-control-input"
                                                                id="ret_diversa" name="retencao" title="Retenção"
                                                                value="diversa">
                                                            <label
                                                                class="roboto-medium text-sub-title-16 custom-control-label"
                                                                for="ret_diversa">Outras. Indique quais e o percentual.</label>
                                                        </div>
                                                        <div class="mb-2" id="lblpercentual" hidden>Percentual (%)
                                                        </div>
                                                        <input type="text" id="ret_diversa_percentual"
                                                            name="ret_diversa_percentual" class="form-control lg-input"
                                                            disabled hidden>
                                                    </div>-->
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 px-0 py-0 pl-3 pt-2">
                                                <div class="col-12 roboto-bold text-sub-title-15 mb-2 round-corners10"
                                                    style="background: #f7f7f7;">
                                                    Indique áreas de seu interesse para recebimento de e-mails
                                                    pertinentes:
                                                </div>
                                            </div>
                                        </div>
                                        <div class="padding-left-35">
                                            <?php foreach ($areas as $key => $area) : ?>
                                            <div class="form-check">
                                                <input id="check<?= $key; ?>" name="vAAREAINTERESSE[]"
                                                    class="form-check-input" type="checkbox"
                                                    value="<?php echo $area['TABCODIGO']; ?>">
                                                <label for="check<?= $key; ?>"
                                                    class="form-check-label pl-0"><?php echo $area['TABDESCRICAO']; ?></label>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
									<?php if ($cliente['CLITIPOCLIENTE'] == 'J'){ ?>
                                    <div class="col-11 px-3 pt-2 mt-4 ml-3"
                                        style="border-radius: 10px; background-image: linear-gradient(to top left, #f8f8f8 , #f0f0f0);">
                                        <div class="form-group row">
                                            <div class="col-12 px-0 py-0 pl-3 pt-2">
                                                <span class="roboto-bold text-sub-title-15">Declaração de Autorização
                                                    Superior:</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xs-4 col-sm-7 col-md-7 col-lg-12 pt-0 pb-0 pl-0 text-sub-title-14">
                                            <div class="form-check text-uppercase">
                                                <input id="chk_ciente" name="chk_ciente" class="form-check-input"
                                                    type="checkbox" value="ciente">
                                                <label for="chk_ciente" class="form-check-label pl-0">Declaro estar
                                                    ciente de que a presente inscrição a ser efetivada se constituíra na
                                                    geração de uma despesa pública a ser adimplida, a qual deverá estar
                                                    previamente autorizada pela respectiva autoridade superior</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
									<?php } else { ?>
									<input id="chk_ciente" name="chk_ciente" class="form-check-input" checked
                                                    type="hidden" value="ciente">
									<?php }  ?>
									<?php if ($cliente['CLITIPOCLIENTE'] == 'J'){ ?>
                                    <div class="col-12 px-0 py-0">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 mt-3"
                                                style="line-height: 17px">
                                                <div
                                                    class="roboto-regular text-sub-title-14 xs-text-sub-title-13 text-gray-3">
                                                    <span class="roboto-bold text-gray-3">Atenção:</span> ao clicar em
                                                    enviar, sua inscrição será validada em nosso sistema e o respectivo
                                                    empenho deverá ter como credora a <span
                                                        class="roboto-bold text-gray-3 text-sub-title-16">DPM Educação
                                                        Ltda., CNPJ 13.021.017/0001-77.</span></div>
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>
                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 p-0 mt-2">
                                        <div class="form-group row">
                                            <input type="hidden" name="vICLICODIGO" id="vICLICODIGO"
                                                value="<?= $clicodigo; ?>">
                                            <input type="hidden" name="vIALUCODIGO" id="vIALUCODIGO" value="" />
                                            <input type="hidden" name="vDCURDATAFATURAMENTO" id="vDCURDATAFATURAMENTO"
                                                value="<?= $vaga['CURDATAFATURAMENTO']; ?>">
                                            <input type="hidden" name="vSCURCURSO" id="vSCURCURSO"
                                                value="<?= $vaga['CURCURSO']; ?>">
                                            <input type="hidden" name="vICURSEQUENCIAL" id="vICURSEQUENCIAL"
                                                value="<?= $vaga['CURSEQUENCIAL']; ?>">
                                            <input type="hidden" name="vICURCODIGO" id="vICURCODIGO"
                                                value="<?php echo $curcodigo; ?>">
                                            <div
                                                class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-2 pb-0 pr-3 text-line-height-21">
                                                <input
                                                    class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme"
                                                    type="submit" value="Enviar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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