<?php
$pageName = "fale-conosco";
require_once 'header.php';
require_once 'include/constantes.php';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>

<?php
if (isset($_POST['BTEnvia'])) {

 //Variaveis de POST, Alterar somente se necessário
 //====================================================
 $nome = $_POST['nome'];
 $municipio = $_POST['municipio'];
 $Estado = $_POST['estado'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $whatsapp = $_POST['whatsapp'];
 $estado = $_POST['estado'];
 $mensagem = $_POST['mensagem'];
 //====================================================

 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //====================================================
 $email_remetente = "ead@dpmeducacao.com.br"; // deve ser uma conta de email do seu dominio
 //====================================================

 //Configurações do email, ajustar conforme necessidade
 //====================================================
 $email_destinatario = "ead@dpmeducacao.com.br"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email";
 $email_assunto = "Contato Interesse EAD Benefícios eventuais em tempos de calamidade pública"; // Este será o assunto da mensagem
 //====================================================

 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome = $nome \n";
 $email_conteudo .= "Email = $email \n";
 $email_conteudo .= "Município = $municipio \n";
 $email_conteudo .= "Estado = $estado \n";
 $email_conteudo .= "Telefone = $telefone \n";
 $email_conteudo .= "whatsapp = $whatsapp \n";
 $email_conteudo .= "Mensagem = $mensagem \n";
 //====================================================

 //Seta os Headers (Alterar somente caso necessario)
 //====================================================
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================

 //Enviando o email
 //====================================================
 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
 echo  "<div class='container'>
              <div class='pt-5 pb-3' style='font-size:24px; font-weight:bold'> E-MAIL ENVIADO COM SUCESSO!</div>
              <p>Aguarde o contato do nosso setor de Treinamentos.</p>
              <p>Obrigado por manifestar interesse!</p>
        </div>";
 }
 else{
 echo "</b>Falha no envio do E-Mail!</b>"; }
 //====================================================
}
?>

<form action="<? $PHP_SELF; ?>" method="POST">

<div class="container">
       <div class="row justify-content-center">
           <div class="col-lg-12 px-0 pb-5">
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                       <div class="col-12 p-0">
                           <div class="row justify-content-center">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0">
                                   <div class="center-div text-line-height-30 pt-0">
                                       <span class="roboto-bold text-black-theme text-lead-header text-uppercase">
                                         <br>manifestação de interesse</span>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-12 pb-0 mb-0">
                               <span class="roboto_condensedregular text-sub-title-21">
                                   Manifeste seu interesse preenchendo o formulário abaixo:
                               </span>
                           </div>
                       </div>


                           <div class="col-12 p-0">
                               <div class="row">
                                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-0 mt-0">
                                       <div class="cursos-in-company" id="formContato" name="formContato">
                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <label class="required" for=""></label>
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="nome" class="form-control lg-input ml-3 mr-3" required  placeholder="Nome:">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="email" class="form-control lg-input ml-3 mr-3" required  placeholder="E-mail:">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="municipio" class="form-control lg-input ml-3 mr-3" required placeholder="Município:">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="estado" class="form-control lg-input ml-3 mr-3" required placeholder="Estado:">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="telefone" class="form-control lg-input ml-3 mr-3" required placeholder="Telefone com DDD:">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" name="whatsapp" class="form-control lg-input ml-3 mr-3"  placeholder="WhatsApp opcional:">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-12 pt-0 pb-3 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                       <input style="border-radius: 0; height:45px;" type="text" size="35" rows="7" name="mensagem" class="form-control lg-input ml-3 mr-3" required placeholder="Mensagem:">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 pt-0 pb-0 pl-0">
                                                 <div class="form-group row">
                                                     <div class="col-sm-12 col-md-11 col-lg-11 pt-0 pb-0">
                                                         <span
                                                             class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">Todos os campos são de preenchimento obrigatório.</span>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-12 p-0">
                                                 <div class="form-group row align-self-center">
                                                     <div
                                                         class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
                                                         <input
                                                             class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme"
                                                             type="submit" name="BTEnvia" value="Enviar">
                                                         <button id="recaptcha" class="g-recaptcha"
                                                             data-sitekey="6LficJcUAAAAAIVtj-9bcIHijCDrHOtS7uB65vQW"
                                                             data-callback="enviarContato" data-badge="bottomleft"
                                                             style="display: none;"></button>
                                                     </div>
                                                 </div>
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
