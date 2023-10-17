<?php
    $pageName = "inscricao-curso-para-nao-clientes";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'include/constantes.php';

    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionCursos.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionTabela.php';

    $areas = comboTabelas('TREINAMENTOS - INDICE POR AREA DE CONHECIMENTO');
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                <div class="center-div">
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">inscreva-se</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0">
                                <span class="roboto-bold-italic text-orange-theme text-sub-title-27">Elaboração de Lei de Diretrizes Orçamentárias - LDO para 2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 text-line-height-22">
                                <span class="roboto-regular text-sub-title-15 text-gray-3"><span class="roboto-bold text-sub-title-15 text-gray-3">Atenção</span>  Formulário específico somente para NÃO CLIENTES da Assessoria Borba, Pause & Perin - Advogados. Sua inscrição será validada em nosso sistema e o respectivo empenho deverá ter como empresa credora a DPM Educação Ltda, inscrita sob CNPJ 13.021.017/0001-77.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-4 pb-0">
                                <span class="roboto-bold text-gray-3 text-sub-title-18">Preencha so campos abaixo:</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-0 pt-0">
                                <form class="inscricao-curso" id="" name="" action="" method="" enctype="">
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0">
                                                <label class="required" for=""></label>
                                                <input id="municipio" name="municipio" type="text" class="form-control lg-input ml-3" placeholder="Seu Município / Autarquia ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="cpf" name="cpf" type="text" class="form-control lg-input ml-3" placeholder="CPF do Aluno ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="nome" name="nome" type="text" class="form-control lg-input ml-3" placeholder="Nome Completo do Aluno sem Abreviaturas ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="cargo" name="cargo" type="text" class="form-control lg-input ml-3" placeholder="Cargo do Aluno ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="lotacao" name="lotacao" type="text" class="form-control lg-input ml-3" placeholder="Secretaria / Departamento ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="email" name="email" type="email" class="form-control lg-input ml-3" placeholder="E-mail para Contato ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="" for=""></label>
                                                <input id="email_alternativo" name="email_alternativo" type="email" class="form-control lg-input ml-3" placeholder="E-mail Alternativo ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="required" for=""></label>
                                                <input id="telefone" name="telefone" type="tel" class="form-control lg-input ml-3" placeholder="Telefone para Contato ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pl-0">
                                        <div class="form-group row">
                                            <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                                <label class="" for=""></label>
                                                <input id="celular" name="celular" type="tel" class="form-control lg-input ml-3" placeholder="Telefone Celular ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 py-0 pl-3 pt-4">
                                        <div class="form-group row">
                                            <span class="roboto-bold text-sub-title-20">Opções de pagamento:</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-3">
                                        <div class="form-group row mb-1">
                                            <div class="input-group mb-0">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <label>
                                                            <input class="mr-1" type="radio" name="option-payment" value="1" aria-label="Checkbox for following text input">Deposito / Trasferência Bancária
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <label>
                                                            <input class="mr-1" type="radio" name="option-payment" value="2" aria-label="Checkbox for following text input">Boleto Bancário
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 pt-0 pb-0 pl-0">
                                            <div class="form-group row">
                                                <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 p-0 text-line-height-21">
                                                    <span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Após o envio deste formulário, você recebá um e-mail contendo as instruções para pagamento de acordo com as opções escolhidas.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 px-0 py-0 pl-3 pt-2">
                                            <span class="roboto-bold text-sub-title-20">Indique áreas de seu interesse para recebimento de e-mails pertinentes:</span>
                                        </div>
                                    </div>

                                    <?php foreach($areas as $key => $area) : ?>
                                    <div class="form-check padding-left-20">
                                        <input id="check<?= $key; ?>" name="area[]" class="form-check-input" type="checkbox" value="<?php echo $area['TABCODIGO']; ?>">
                                        <label for="check<?= $key; ?>" class="form-check-label pl-0"><?php echo $area['TABDESCRICAO']; ?></label>
                                    </div>
                                    <?php endforeach; ?>

                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-0 mt-3 text-line-height-21">
                                            <span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Campos com preenchimento obrigatório</span>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 p-0">
                                        <div class="form-group row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 pb-0 pr-3 text-line-height-21">
                                                <input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme" type="submit" value="Enviar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                                <img class="img-fluid" src="./imgs/banner_inscricao-cursos-site-bottom.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>