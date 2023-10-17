<?php
    $pageName = "curso-lista-espera";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
   // require_once __DIR__.DIRECTORY_SEPARATOR.'autenticacao.php';

    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionCursos.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionTabela.php';

    $curcodigo      = filter_var($parametros[2], FILTER_SANITIZE_NUMBER_INT);
    $nome_cliente   = trim($_SESSION['sSCLINOMEFANTASIA_SITE']);
    $vaga           = findVagasCursoByIdCurso($curcodigo);
?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 px-0 pb-5">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 pr-lg-5">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                <div class="center-div"><span class="roboto-bold text-black-theme text-lead-header text-uppercase">LISTA DE ESPERA PARA CURSOS</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0">
                                <span class="roboto-bold-italic text-orange-theme text-sub-title-27">
                                <?php echo $vaga['CURCURSO']; ?> - <?= $vaga['CURCURSOCOMPLEMENTO']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-3 text-line-height-22">
                                <span class="roboto-regular text-sub-title-15 text-gray-3"><span class="roboto-bold text-gray-3">Atenção:</span> Desejo me cadastrar em lista de espera para: (escolha a opção desejada abaixo).</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 mt-0">
                                <form class="inscricao-curso" id="inscricao-curso" name="inscricao-curso">
                                    <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-3" style="padding-left: 35px;">
                                        <div style="position: absolute; left: 1px; top: -9px">
                                            <label class="required" for=""></label>
                                        </div>
                                        <div class="form-group row mb-1 roboto-regular text-sub-title-15 text-gray-3">
                                            <div class="input-group mb-0">
                                                <div class="input-group-prepend">
                                                    <div class="input-lista-espera">
                                                        <label>
                                                            <input class="mr-1" type="radio" name="vSTURMALOTADA" title="" value="H">
                                                            Para esta turma que encontra-se lotada
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-lista-espera">
                                                        <label>
                                                            <input class="mr-1" type="radio" name="vSTURMALOTADA" title="" value="F">
                                                            Para turma em nova data a ser definida
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0">
                                            <label class="required" for="vSCLIRAZAOSOCIAL"></label>
                                            <input id="vSCLIRAZAOSOCIAL" name="vSCLIRAZAOSOCIAL" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Município" value="<?php echo $nome_cliente; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0">
                                            <label class="required" for="vSALUNOME"></label>
                                            <input id="vSALUNOME" name="vSALUNOME" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Nome completo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for="vSALUCARGO"></label>
                                            <input id="vSALUCARGO" name="vSALUCARGO" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Cargo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for="vSALUEMAIL"></label>
                                            <input id="vSALUEMAIL" name="vSALUEMAIL" type="email" class="form-control lg-input ml-3 mr-3" placeholder="E-mail para Contato">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-3 ml-3 text-line-height-21">
                                            <div style="position: absolute; left: 1px"><label class="required" for=""></label></div>
                                            <label class="select-required" for="vSTIPOPODER"></label>
                                            <select name="vSTIPOPODER" id="vSTIPOPODER" class="form-control" style="-webkit-border-radius:0 !important;height: 47px;font-family: 'robotoregular'; font-size: 15px; color: #4D4D4D">
                                                <option class="roboto-regular text-gray-2" value="">Poder</option>
                                                <option class="roboto-regular" value="A">Autarquias</option>
                                                <option class="roboto-regular" value="E">Executivo</option>
                                                <option class="roboto-regular" value="L">Legislativo</option>
                                                <option class="roboto-regular" value="O">Outras Empresas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for="vSALUFONE"></label>
                                            <input id="vSALUFONE" name="vSALUFONE" type="tel" class="form-control lg-input ml-3 mr-3 telefone" placeholder="Telefone para Contato">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label for="vSALUCELULAR"></label>
                                            <input id="vSALUCELULAR" name="vSALUCELULAR" type="tel" class="form-control lg-input ml-3 mr-3 telefone" placeholder="Telefone Celular">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                                            <label class="required" for="vINUMEROVAGAS"></label>
                                            <input type="number" id="vINUMEROVAGAS" name="vINUMEROVAGAS" class="form-control lg-input ml-3 mr-3" placeholder="Número de Vagas Pretendidas" min="1" max="100" maxlength="3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-0 mt-3 text-line-height-21">
                                            <span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Campos com preenchimento obrigatório</span>
                                            <input type="hidden" name="vSCURCURSO" id="vSCURCURSO" value="<?= $vaga['CURCURSOCOMPLEMENTO']; ?>">
                                            <input type="hidden" name="vSCURCURSO2" id="vSCURCURSO2" value="<?= $vaga['CURTITULOSITE']; ?>">
                                            
                                            <input type="hidden" name="vICURCODIGO" id="vICURCODIGO" value="<?php echo $curcodigo; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-2 pb-0 pr-0 text-line-height-21">
                                            <input class="link-pointer roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme" type="submit" value="Enviar">
                                            <button id="recaptcha" class="g-recaptcha" data-sitekey="6LficJcUAAAAAIVtj-9bcIHijCDrHOtS7uB65vQW" data-callback="enviarIncricao" data-badge="bottomleft" style="display: none;"></button>
                                        </div>
                                    </div>
                                </form>
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