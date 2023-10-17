<?php
$pageName = "login-cliente-cadastrado";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';


$curcodigo = filter_var($parametros[1], FILTER_SANITIZE_NUMBER_INT);
$vaga    = findVagasCursoByIdCurso($curcodigo);
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
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0">
                                <!-- <span>Curso<br></span> -->
                                <span class="roboto-bold-italic text-orange-theme text-sub-title-27"
                                    style="line-height: 28px"><?php echo $vaga['CURCURSO']; ?> - <?= $vaga['CURCURSOCOMPLEMENTO']; ?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 pt-1">
                                <!--<span class="roboto-medium text-sub-title-14"
                                    style="line-height: 28px; border-radius: 4px; padding: 5px;">
                                     <em class="far fa-calendar-alt"></em>
									<?php if ($vaga['CURDATAINICIO'] == $vaga['CURDATAFIM'])
										echo utf8_encode(strftime('%d de %B de %Y', strtotime($vaga['CURDATAINICIO'])));
									else
										echo utf8_encode(strftime('%d de %B de %Y', strtotime($vaga['CURDATAINICIO'])).' e '.strftime('%d de %B de %Y', strtotime($vaga['CURDATAFIM']))); ?>
                                </span>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-lg-5 px-0">
                        <div class="col-12 px-0 py-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                    <div class="center-div">
                                        <span
                                            class="roboto-bold text-black-theme text-lead-header text-uppercase text-sub-title-26">
                                            área restrita para clientes da assessoria
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-0">
                            <div class="row">
                                <div class="colxs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-18 pt-0">
                                    <span class="roboto-regular text-sub-title-15 text-gray-3">Esta é uma área para
                                        acesso exclusivo de
                                        clientes cadastrados junto a DPM Educação Ltda, por favor, faça o login
                                        preenchendo os dados
                                        abaixo.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-0">
                            <div class="row justify-content-center bg-beige-theme margin-0-2 round-corners10">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 mt-4 pt-2">
                                    <form id="frmlogin" class="inscricao-online" action="include/valida-login.php"
                                        method="POST">
                                        <div class="form-group row">
                                            <input type="text" class="form-control" style="border-radius: 5px"
                                                id="txtlogin" name="txtlogin" placeholder="* Usuário">
                                        </div>
                                        <div class="form-group row">
                                            <input type="password" class="form-control margin-7"
                                                style="border-radius: 5px" id="txtsenha" name="txtsenha"
                                                placeholder="* Senha">
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" id="action" name="action"
                                                value="cursos-inscricao/clientes/<?php echo $curcodigo; ?>">
                                            <input type="hidden" id="id_curso" name="id_curso"
                                                value="<?php echo $curcodigo; ?>">
                                            <input
                                                class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme text-sub-title-16 margin-7 link-pointer round-corners10"
                                                style="border-radius: 5px" type="submit" name="" value="Enviar">
                                        </div>
                                    </form>
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