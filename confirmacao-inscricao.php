<?php
    $pageName = "confirmacao-inscricao";
    require_once 'header.php';
    require_once 'include/constantes.php';
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
                        <div class="roboto-bold text-white pt-2 pl-4 text-sub-title-28">PASSO 03: Confirmação de Inscrição</div>
                        <div class="roboto-light text-white pt-0 pb-3 pl-4">Sua inscrição foi realizada com sucesso!</div>
                    </div>
                    <div class="col-12 px-0 py-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0" style="line-height: 22px">
                                <p>Prezado(a) José Carlos Henrique, sua inscrição para o curso <span class="roboto-bold">Elaboração de Lei de Diretrizes Orçamentárias - LDO para 2019</span> foi efetivada com sucesso.</p>
                                <p class="roboto-bold">REGISTRAMOS QUE, UMA VEZ FEITA A INSCRIÇÃO, PARA EFEITOS DE COBRANÇA, SOMENTE SERÁ CONSIDERADO O CANCELAMENTO FEITO COM ANTECEDÊNCIA MÍNIMA DE (04) QUATRO DIAS ÚTEIS DA DATA DO INÍCIO DO CURSO. </p>
                                <p>Desde já agradecemos pela presença e desejamos uma excelente viagem.</p>
                                <p class="mt-5">Se necessário, clique nas opções abaixo:</p>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-0 m-0">
                                    <div class="row mx-1">
                                    <a href="/hoteis-conveniados"
                                    class="col-xs-12 col-sm-12 col-md-3 col-lg-4 bg-orange-theme text-white roboto-regular bg-orange-theme text-sub-title-16 btn btn-sm btn-block transition-color m-0 px-0 py-3"
                                    role="button" aria-pressed="true" style="border: 5px solid white; border-radius: 10px;"><span class="roboto-black text-white">Hospedagem?</span><br>HOTEIS
                                    </a>

                                    <a href="/informacoes"
                                    class="col-xs-12 col-sm-12 col-md-3 col-lg-4 bg-orange-theme text-white roboto-regular bg-orange-theme text-sub-title-16 btn btn-sm btn-block transition-color m-0 px-0 py-3"
                                    role="button" aria-pressed="true" style="border: 5px solid white; border-radius: 10px;"><span class="roboto-black text-white">Como Chegar?</span><br>TRANSPORTE
                                    </a>

                                   <!-- <a href="/restaurantes-conveniados"
                                    class="col-xs-12 col-sm-12 col-md-3 col-lg-4 bg-orange-theme text-white roboto-regular bg-orange-theme text-sub-title-16 btn btn-sm btn-block transition-color m-0 px-0 py-3"
                                    role="button" aria-pressed="true" style="border: 5px solid white; border-radius: 10px;"><span class="roboto-black text-white">Onde Almoçar?</span><br>RESTAURANTES PRÓXIMOS</a>
                                    </div>-->
                                </div>
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