<?php
    $pageName = "inscricao-curso-site";
    require_once 'header.php';
    require_once 'include/constantes.php';
?>

<div class="container-fluid carousel-inner px-0"> 
    <img class="img-fluid banner-hide-sm" src="./imgs/banner-inscricoes-cursos-site.png" alt="">
    <div class="card-body carousel-caption text-img-top-left">
      <span class="card-title text-center roboto-medium"></span>
    </div>
</div><!-- end banner -->

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
              <span class="roboto-regular text-sub-title-15 text-gray-3"><span class="roboto-bold text-gray-3">Atenção</span> Sua inscrição será validada em nosso sistema e o respectivo empenho deverá ter como empresa credora a DPM Educação Ltda, inscrita sob CNPJ 13.021.017/0001-77. O pagamento será debitado conforme a forma de pagamento escolhida.</span>
            </div>
          </div>
        </div>

        <div class="col-12 px-0 py-0">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 mt-1">

              <form class="inscricao-curso" id="" name="" action="" method="" enctype="">

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0">
                    <label class="required" for=""></label>
                    <input id="inputName" name="name" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Lajeado PM ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputCPF" name="cpf" type="text" class="form-control lg-input ml-3 mr-3" placeholder="CPF do Aluno ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputNomeCompleto" name="fullName" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Nome Completo do Aluno ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputCargo" name="cargo" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Cargo do Aluno ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputLotacao" name="lotacao" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Lotação do Aluno ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputEmail" name="email" type="email" class="form-control lg-input ml-3 mr-3" placeholder="E-mail para Contato ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="" for=""></label>
                    <input id="inputEmailAlternativo" name="email" type="email" class="form-control lg-input ml-3 mr-3" placeholder="E-mail Alternativo ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="required" for=""></label>
                    <input id="inputTel" name="tel" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Telefone para Contato ...">
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
                    <label class="" for=""></label>
                    <input id="inputCel" name="Cel" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Telefone Celular ...">
                  </div>  
                </div>
                
                <div class="form-group row">
                  <div class="col-12 px-0 py-0 pl-3 pt-2">
                    <span class="roboto-bold text-sub-title-15">Áreas de Interesse</span>                    
                  </div>                  
                </div>

                <div class="form-check padding-left-20">
                  <input id="check1" name="option[]" class="form-check-input" type="checkbox" value="value1">
                  <label for="check1" class="form-check-label pl-0">Contabilidade Pública e Orçamento Municipal</label>                  
                </div>

                <div class="form-check padding-left-20">
                  <input id="check2" name="option[]" class="form-check-input" type="checkbox" value="value2">
                  <label for="check2" class="form-check-label pl-0">Direitos Coletivos e Sociais</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check3" name="option[]" class="form-check-input" type="checkbox" value="value3">
                  <label for="check3" class="form-check-label pl-0">Gestão Administrativa e de Controle Municipal</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check4" name="option[]" class="form-check-input" type="checkbox" value="value4">
                  <label for="check4" class="form-check-label pl-0">Gestão da Educação Municipa</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check5" name="option[]" class="form-check-input" type="checkbox" value="value5">
                  <label for="check5" class="form-check-label pl-0">Gestão de Pessoas no Serviço Público Municipal</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check6" name="option[]" class="form-check-input" type="checkbox" value="value6">
                  <label for="check6" class="form-check-label pl-0">Jurídica e Contencioso Municipal</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check7" name="option[]" class="form-check-input" type="checkbox" value="value7">
                  <label for="check7" class="form-check-label pl-0">Licitações e Contratos Administrativos</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check8" name="option[]" class="form-check-input" type="checkbox" value="value8">
                  <label for="check8" class="form-check-label pl-0">Processo Legislativo Municipal</label>
                </div>

                <div class="form-check padding-left-20">
                  <input id="check9" name="option[]" class="form-check-input" type="checkbox" value="value9">
                  <label for="check9" class="form-check-label pl-0">Tributos e Arrecadação Municipal</label>
                </div>
                

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-0 mt-3 text-line-height-21">
                    <span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Campos com preenchimento obrigatório</span>
                  </div>  
                </div>

                <div class="form-group row">
                  <div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
                    <input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme" type="submit" value="Enviar"> 
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
            
                            
              
                
          
        </div><!-- end col-8 wireframe -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        
          <div class="row justify-content-center">
            <div class="col-xs-4 col-auto">             
                        <a href="#">
                            <img id="banner-chamada-1" class="img-fluid mx-auto d-block" src="./imgs/chamada_lateral.png" alt="">
                        </a><!-- end a > img chamada agenda -->
                        
                    <div class="py-2 ">
                          <a href="#">
                              <img id="banner-chamada-2" class="mx-auto d-block img-fluid" src="./imgs/agenda_sidebar.png" alt="">
                          </a>
                        </div><!-- end div img agenda -->

                        <iframe id="iframe-1" src="./iframe/iframe.html" width="340px" height="1500px" frameborder="0">
                          Seu navegador não suporta iframe.
                        </iframe>
            </div>
          </div><!-- end agenda right -->

          <div class="row justify-content-center">
            <div class="col-8 text-center">
                <a class="btn btn-close-button" href="#" role="button">Ver Mais</a>
            </div>
          </div><!-- end button load more -->

              
        </div><!-- end col-4 wireframe -->
      </div><!-- end row wireframe -->
    </div><!-- end col-12 wireframe-->            
  </div><!--end row justify center wireframe -->
</div><!-- end container middle content main wireframe -->

<div class="container-fluid bg-gray-2">
  
<div class="row justify-content-center bg-gray-2">
  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-center pb-2 mt-2">
    <span class="roboto-bold text-lead-header text-uppercase">Diferenciais em nossos cursos</span>
  </div>
</div>

<div class="container section-diferenciais bg-gray-2">
  <div class="row pl-4 pr-4 pt-5 pb-5">               

              <div class="py-0 col-lg-12">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <i class="fas fa-tablet-alt text-center"></i>
                         <span class="roboto-bold">Central do Aluno</span>
                         <p class="roboto-italic">Espaço exclusivo para alunos encontrarem suporte acadêmico e didático referente aos cursos realizados</p>
                    </div>
            
                     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                         <i class="fas fa-graduation-cap text-center"></i>
                         <span class="roboto-bold">Corpo Docente</span>
                         <p class="roboto-italic">Profissionais altamente especializados que reafirmam o compromisso com a qualidade técnica e a excelência de nossas capacitações</p>
                     </div>

                     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <i class="fas fa-industry text-center"></i>
                         <span class="roboto-bold">Estrutura Física e Tecnológica</span>
                         <p class="roboto-italic">Infraestrutura física e tecnológica pensada e projetada para atender às necessidades exclusivas de nossos alunos</p>
                     </div>

                 </div><!-- first row columns -->
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <i class="fas fa-chalkboard-teacher text-center"></i>
                      <span class="roboto-bold">Conteúdo Didático</span>
                      <p class="roboto-italic">Sempre atualizado e parametrizado frente necessidades cotidianas de nosso público-alvo às</p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <i class="far fa-calendar-alt text-center"></i>
                      <span class="roboto-bold">Eventos e Cursos</span>
                      <p class="roboto-italic">Por meio da experiência, didática e da especialização de nossos professores, buscamos disseminar o conhecimento junto aos agentes e servidores públicos municipais</p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <i class="fas fa-book-open text-center"></i>
                      <span class="roboto-bold">Certificações Acadêmicas</span>
                      <p class="roboto-italic">Cursos de capacitação e formação técnica reconhecidos pela Fundação Educacional Machado de Assis - FEMA, instituição de ensino superior autorizada e recredenciada pelo MEC</p>
                  </div>
                </div><!-- second row columns -->
              </div><!-- end col-12 section -->
            </div><!-- end row  -->
</div><!-- end section diferenciais  -->
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12 text-center bg-blue-dark-theme pt-4 pb-0">
        <span class="roboto-bold text-white-theme text-lead-header margin-15 text-uppercase">
          Assista Agora
        </span>
      </div>
    </div>
</div>

<div class="container-fluid bg-blue-dark-theme">
  <div class="row justify-content-center">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
        <video width="320" height="240" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
            <iframe  width="320" height="240" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
            <iframe  width="320" height="240" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
        <video width="320" height="240" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
            <iframe  width="320" height="240" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
            <iframe  width="320" height="240" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
</div><!-- end section videos gallery -->

<?php include("footer.php") ?>