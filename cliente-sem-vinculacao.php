<?php
$pageName = "cliente-sem-vinculacao";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionEnderecos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionTabela.php';

$curcodigo = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
// echo $curcodigo; exit;

$vaga  = findVagasCursoByIdCurso($curcodigo);
$tipoLogradouros = comboTipoLogradouro();
$estados = getEstado();
?>
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
                        <div class="roboto-bold text-white pt-2 pl-4 text-sub-title-28">
                            PASSO 02: Formulário de Inscrição
                        </div>
                        <div class="roboto-light text-white pt-0 pb-3 pl-4">
                            Faça seu cadastro para dar continuidade à sua inscrição
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0">
                                <!--<span>Curso<br></span>-->
                                <span class="roboto-bold-italic text-orange-theme text-sub-title-27"
                                    style="line-height: 28px"><?php echo $vaga['CURCURSO']; ?> - <?= $vaga['CURCURSOCOMPLEMENTO']; ?></span>
                                <input type="hidden" id="vICURCODIGO" value="<?php echo $curcodigo; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 pt-1">
                                <span class="roboto-medium text-sub-title-14"
                                    style="line-height: 28px; border-radius: 4px; padding: 5px;">
                                    <em class="far fa-calendar-alt"></em>&nbsp;
                                   <?php if ($vaga['CURDATAINICIO'] == $vaga['CURDATAFIM'])
										echo utf8_encode(strftime('%d de %B de %Y', strtotime($vaga['CURDATAINICIO'])));
									else
										echo utf8_encode(strftime('%d de %B de %Y', strtotime($vaga['CURDATAINICIO'])).' e '.strftime('%d de %B de %Y', strtotime($vaga['CURDATAFIM']))); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3" style="margin: 0 auto 0 0; background-color: #CED4DA; height: 1px;"></div>
                    <div class="col-12 px-3 pt-2 mt-3 ml-0"
                        style="border-radius: 10px; background-image: linear-gradient(to top left, #f8f8f8 , #f0f0f0);">
                        <div class="col-12 px-0 py-0">
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 roboto-bold text-sub-title-20 text-gray-3 mt-2"
                                    style="line-height: 27px"><em class="fas fa-store-alt"></em>
                                    ENTIDADES/EMPRESAS QUE NÃO MANTÊM CONTRATO DE ASSESSORIA COM A DPM (Borba, Pause & Perin Advogados)</div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 17px"> (Executivo, Legislativo e Autarquias das esferas
                                    Municipal, Estadual e Federal e empresas privadas).</div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 17px"> Informe o CNPJ e confira se sua entidade/empresa já
                                    possui cadastro.</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                        <div class="row pl-3">
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9 pr-0">
                                                <input id="cnpj" name="cnpj" type="text"
                                                    class="form-control lg-input cnpj"
                                                    placeholder="CNPJ da Entidade / Empresa">
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
                                                <button id="btnCnpj" class="roboto-bold text-white btn" role="button"
                                                    style="background-color: #01548e; font-size: 15px;">
                                                    <em class="fas fa-check text-sub-title-14 text-white"></em>
                                                    Verificar
                                                </button>
                                            </div>
                                        </div>
										<div class="col-11 mt-2 ml-3"
											style="border: 1.4px solid #d4d4d4; border-radius: 8px" id="divAviso">
											<div class="row" id="msgSemCadastro">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
													style="color: #01548e">
													<em class="fas fa-times-circle text-orange-theme"></em> AINDA
													NÃO POSSUÍMOS O SEU CADASTRO!
												</div>
											</div>
											<div class="row" id="msgComCadastro">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
													style="color: #01548e">
													<em class="fas fa-times-circle text-orange-theme"></em> JÁ POSSUÍMOS O SEU CADASTRO!
												</div>
											</div>
											<div class="row" id="msgBloqueio">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
													style="color: #01548e">
													<i class="fas fa-check-square" style="color: #10B30A"></i> JÁ
													POSSUÍMOS O SEU CADASTRO, CNPJ COM CONTRATO ATIVO!
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 pb-1">
														<a class="voltar-tela" href="identificacao-acesso/<?= $curcodigo;?>">Volte à tela anterior</a> e selecione a opção <span class="roboto-bold">Cliente COM vinculação à DPM Consultoria</span> para efetuar sua inscrição no curso.</div>
												</div>
											</div>
											<div class="row" id="divInadimplente">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
													style="color: #01548e">
													<i class="fas fa-check-square" style="color: #10B30A"></i> <b>AVISO DE INADIMPLÊNCIA<br/><br/> Prezado(a) Cliente: <span id="lblCliente3"></span><br/><br/> Nosso sistema financeiro identificou débito(s) pendente(s) em nome deste Município junto à DPM Educação, razão pela qual não será mais possível o faturamento de novas despesas com inscrições em nossos cursos de capacitação. Solicitamos a breve regularização de tais débitos, e para tanto nos colocamos à disposição no telefone (51) 3094-3440.<br/><br/>Agradecemos pela compreensão.</b>
												</div>
											</div>
											<div class="row" id="divAvisoEspecial">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold" style="color: #01548e"><br/><br/>
													<i class="fas fa-check-square" style="color: #10B30A"></i> <b>Prezado(a) Cliente: <span id="lblCliente"></span><br/><br/>
													Atendendo a solicitação de sua municipalidade, informamos que as inscrições em cursos de servidores do <span id="lblCliente2"></span> só podem ser recebidas pelo e-mail cursos@dpmeducacao.com.br ou whats <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=5551980415821&text=Ol%C3%A1!%20Gostaria%20de%20falar%20com%20a%20DPMEDUCAÇÃO.">51 980415821</a>
													<br/><br/>Agradecemos pela compreensão.</b>
												</div>
											</div>
											<div class="row" id="msgAvulso">
												<div
													class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 pb-1">
													Realize seu cadastro informando seus dados abaixo:</div>
											</div>
										</div>
                                        <form id="pessoajuridica" class="collapse">

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_cnpj"></label>
                                                        <input id="pj_cnpj" name="pj_cnpj" type="text"
                                                            class="form-control lg-input ml-3 mr-3 cnpj"
                                                            placeholder="CNPJ" readonly>

                                                    </div>
                                                </div>
                                            </div>
											<div id="divAdicionais">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_nome"></label>
                                                        <input id="pj_nome" name="pj_nome" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Razão Social">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_tipo_logradouro"></label>
                                                        <select class="form-control lg-input ml-3 mr-3"
                                                            id="pj_tipo_logradouro" name="pj_tipo_logradouro"
                                                            title="Tipo Logradouro">
                                                            <option value="">Selecione o Tipo de Logradouro</option>
                                                            <?php foreach ($tipoLogradouros as $tpo) : ?>
                                                            <option value="<?= $tpo['TLOCODIGO']; ?>">
                                                                <?= $tpo['TLODESCRICAO']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_logradouro"></label>
                                                        <input id="pj_logradouro" name="pj_logradouro" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Logradouro">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_numero"></label>
                                                        <input id="pj_numero" name="pj_numero" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Número">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="" for="pj_complemento"></label>
                                                        <input id="pj_complemento" name="pj_complemento" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Complemento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_bairro"></label>
                                                        <input id="pj_bairro" name="pj_bairro" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Bairro">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_estado"></label>
                                                        <select class="form-control lg-input ml-3 mr-3" id="pj_estado"
                                                            name="pj_estado" title="Estado">
                                                            <option value="">Selecione o Estado</option>
                                                            <?php foreach ($estados as $estado) : ?>
                                                            <option value="<?= $estado['ESTCODIGO'] ?>">
                                                                <?= $estado['ESTSIGLA'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_cidade"></label>
                                                        <select class="form-control lg-input ml-3 mr-3" id="pj_cidade"
                                                            name="pj_cidade" title="Cidade">
                                                            <option value="">Selecione a Cidade</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_cep"></label>
                                                        <input id="pj_cep" name="pj_cep" type="text"
                                                            class="form-control lg-input ml-3 mr-3 cep"
                                                            placeholder="CEP">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_email"></label>
                                                        <input id="pj_email" name="pj_email" type="email"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="E-mail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pj_telefone"></label>
                                                        <input id="pj_telefone" name="pj_telefone" type="text"
                                                            class="form-control lg-input ml-3 mr-3 telefone"
                                                            placeholder="Telefone">
                                                    </div>
                                                </div>
                                            </div>
											</div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                                                <input type="hidden" name="metodo" value="insert">
                                                <input type="hidden" name="tipo_cliente" value="J">
												<input type="hidden" name="oid_cliente" id="oid_cliente" value="">
                                                <input type="submit" class="roboto-bold text-white btn" role="button"
                                                    style="background-color: #F7931E; font-size: 15px;"
                                                    value="INSCREVA-SE">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-3 pt-2 mt-3 ml-0"
                        style="border-radius: 10px; background-image: linear-gradient(to top left, #f8f8f8 , #f0f0f0);">
                        <div class="col-12 px-0 py-0">
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 roboto-bold text-sub-title-20 text-gray-3 mt-2"
                                    style="line-height: 17px"><em class="fas fa-user-alt"></em> PESSOA FÍSICA</div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 17px"> (Particulares, profissionais liberais, estudantes, autônomos)</div>
                            </div>
                            <div class="row pl-3 pt-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3"
                                    style="line-height: 20px"> Solicitamos que seja enviada mensagem para o e-mail <b>cursos@dpmeducacao.com.br</b> ou para o <b>WhatsApp (51) 98041-5821</b> contendo as seguintes informações:

                                    <ol class="pt-4">
                                        <li style="line-height: 24px">título e data do curso desejado</li>
                                        <li style="line-height: 24px">nome completo do(a) participante</li>
                                        <li style="line-height: 24px">CPF</li>
                                        <li style="line-height: 24px">profissão</li>
                                        <li style="line-height: 24px">e-mail</li>
                                        <li style="line-height: 24px">celular</li>
                                        <li style="line-height: 24px">endereço</li>
                                    </ol>

                                </div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 roboto-bold"
                                    style="line-height: 20px">
                                    Ao recebermos sua inscrição, confirmaremos a efetivação no mesmo dia. Não havendo retorno, favor entrar em contato pelo fone (51) 3094-3440, das 09h às 17h. Obrigada.
                                </div>
                            </div>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                         <!--<div class="row pl-3">
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9 pr-0">
                                                <input id="cpf" name="cpf" type="text" class="form-control lg-input cpf"
                                                    placeholder="CPF">
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
                                                <button id="btnCpf" class="roboto-bold text-white btn" role="button"
                                                    style="background-color: #01548e; font-size: 15px;">
                                                    <i class="fas fa-check text-sub-title-14 text-white"></i>
                                                    Verificar
                                                </button>
                                            </div>
                                        </div>-->
                                        <form id="pessoafisica" class="collapse">
                                            <div class="col-11 mt-2 ml-3"
                                                style="border: 1.4px solid #d4d4d4; border-radius: 8px">
                                                <div class="row" id="msgSemCadastro2">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
                                                        style="color: #01548e">
                                                        <em class="fas fa-times-circle text-orange-theme"></em> AINDA
                                                        NÃO POSSUÍMOS O SEU CADASTRO!
                                                    </div>
                                                </div>
												<div class="row" id="msgComCadastro2">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-16 pt-0 roboto-bold"
                                                        style="color: #01548e">
                                                        <em class="fas fa-times-circle text-orange-theme"></em> JÁ POSSUÍMOS O SEU CADASTRO!
                                                    </div>
                                                </div>
                                                <div class="row" id="msgAvulso2">
                                                    <div
                                                        class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-sub-title-14 pt-0 text-gray-3 pb-1">
                                                        Realize seu cadastro informando seus dados abaixo:</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_cpf"></label>
                                                        <input id="pf_cpf" name="pf_cpf" type="text"
                                                            class="form-control lg-input ml-3 mr-3 cpf"
                                                            placeholder="CPF(Pessoa Física)" readonly>
                                                    </div>
                                                </div>
                                            </div>
											<div id="divAdicionais2">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_nome"></label>
                                                        <input id="pf_nome" name="pf_nome" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Nome Completo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_tipo_logradouro"></label>
                                                        <select class="form-control lg-input ml-3 mr-3"
                                                            id="pf_tipo_logradouro" name="pf_tipo_logradouro"
                                                            title="Tipo Logradouro">
                                                            <option value="">Selecione o Tipo de Logradouro</option>
                                                            <?php foreach ($tipoLogradouros as $tpo) : ?>
                                                            <option value="<?= $tpo['TLOCODIGO']; ?>">
                                                                <?= $tpo['TLODESCRICAO']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_logradouro"></label>
                                                        <input id="pf_logradouro" name="pf_logradouro" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Logradouro">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_numero"></label>
                                                        <input id="pf_numero" name="pf_numero" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Número">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="" for="pf_complemento"></label>
                                                        <input id="pf_complemento" name="pf_complemento" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Complemento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_bairro"></label>
                                                        <input id="pf_bairro" name="pf_bairro" type="text"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="Bairro">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_estado"></label>
                                                        <select class="form-control lg-input ml-3 mr-3" id="pf_estado"
                                                            name="pf_estado" title="Estado">
                                                            <option value="">Selecione o Estado</option>
                                                            <?php foreach ($estados as $estado) : ?>
                                                            <option value="<?= $estado['ESTCODIGO'] ?>">
                                                                <?= $estado['ESTSIGLA'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_cidade"></label>
                                                        <select class="form-control lg-input ml-3 mr-3" id="pf_cidade"
                                                            name="pf_cidade" title="Cidade">
                                                            <option value="">Selecione a Cidade</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_cep"></label>
                                                        <input id="pf_cep" name="pf_cep" type="text"
                                                            class="form-control lg-input ml-3 mr-3 cep"
                                                            placeholder="CEP">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row my-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_email"></label>
                                                        <input id="pf_email" name="pf_email" type="email"
                                                            class="form-control lg-input ml-3 mr-3"
                                                            placeholder="E-mail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                                <div class="form-group row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0">
                                                        <label class="required" for="pf_telefone"></label>
                                                        <input id="pf_telefone" name="pf_telefone" type="text"
                                                            class="form-control lg-input ml-3 mr-3 telefone"
                                                            placeholder="Telefone">
                                                    </div>
                                                </div>
											</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
												<input type="hidden" name="metodo" value="insert">
												<input type="hidden" name="tipo_cliente" value="F">
												<input type="hidden" name="oid_cliente" id="oid_cliente" value="">
												<input type="submit" class="roboto-bold text-white btn"
													role="button"
													style="background-color: #F7931E; font-size: 15px;"
													value="INSCREVA-SE">
											</div>

                                        </form>
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