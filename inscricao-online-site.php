<?php
    $pageName = "inscricao-online-site";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'include/constantes.php';
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
                                    <span class="roboto-bold text-black-theme text-lead-header text-uppercase">AGENDA DE CURSOS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-18 pb-1 mb-2">
                                <span class="roboto-bold text-sub-title-15 text-gray-3">Inscrição Online - Área Restrita para Clientes da Assessoria</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="colxs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-18 pt-0">
                                <span class="roboto-regular text-sub-title-15 text-gray-3">Esta é uma área para acesso exclusivo de Clientes cadastrados junto a DPM Educação Ltda, por favor, faça o login preenchendo os dados abaixo.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 mt-5 pt-2">
                                <form id="" class="inscricao-online" action="" name="" action="">
                                    <div class="form-group row">
                                        <input type="text" class="form-control" id="InputLogin" placeholder="* Login">
                                    </div>
                                    <div class="form-group row">
                                        <input type="password" class="form-control margin-7" id="InputPassword" placeholder="* Password">
                                        <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $_GET['pId'];?>">
                                    </div>
                                    <div class="form-group row">
                                        <input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme text-sub-title-16 margin-7" type="submit" name="" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <span class="roboto-bold text-gray-3">Inscrição de clientes não cadastrados junto a DPM Educação Ltda, favor seguir as instruções abaixo.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <span class="roboto-bold text-gray-3 text-sub-title-14 text-uppercase">observações</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Imprima ou salve a ficha e preencha todos os dados solicitados de maneira clara.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Os nomes e sobrenomes devem ser escritos/digitados sempre por extenso.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="text-gray-3 fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14">Depois de preenchida, enviar a respectiva ficha para:</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 pb-1">
                                <i class="fas fa-caret-right"></i>
                                <span class="roboto-regular text-gray-3 text-sub-title-14"><span class="roboto-bold text-gray-2">Fax:</span> (51) 3027-3434 ou <span class="roboto-bold text-gray-3">E-mail:</span> cursos@dpmeducacao.com.br</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <button type="button" class="btn bg-orange-theme roboto-regular text-white-theme btn-lg btn-block text-sub-title-16">Download Ficha de Inscrição em formato WORD</button>
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