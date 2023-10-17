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

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-lg-5 px-0">
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                           <div class="col-12 px-0 py-0 bg-azul-padrao round-corners10">
                            <div class="roboto-bold text-white py-3 pl-4 text-sub-title-28 text-center">NOSSOS DOCUMENTOS LEGAIS</div>
 
                        </div>
                        </div>
                    </div>
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 px-0">
                        <div class="col-12 px-0 py-0 text-center">
                            <div class="row text-center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
                                    <div class="roboto-bold text-lead-header text-uppercase text-sub-title-30" style="color: #F7931E">
                                            ACESSO RESTRITO A CLIENTES DA DPM EDUCAÇÃO
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                      <div class="col-12 px-0 py-3">
                            <div class="row">
                                <div class="colxs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-30 pt-0 text-center">
                                    <span class="roboto-regular text-gray-3" style="font-size: 30px">Favor autenticar-se com seus Dados de Acesso (Usuário e Senha), acaso não possua, solicitamos que nos contato via telefone ou email </span>
                                </div>
                            </div>
                      </div>
                        
                       <div class="col-12 px-0 pt-0 pb-4">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-26 pt-0 text-center">
                                    <span class="roboto-bold text-sub-title-26 text-gray-3" style="color: #01548E">Telefone: (51) 3027.3400<br>
                                    E-mail: cursos@dpmeducacao.com.br
                                    </span>
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
                                                value="/cursos-inscricao/clientes/<?php echo $curcodigo; ?>">
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