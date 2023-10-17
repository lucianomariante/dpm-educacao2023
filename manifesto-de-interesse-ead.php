<?php
$pageName = "fale-conosco";
require_once 'header.php';
require_once 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php';

/***************************************************** 
	Roner Rodrigues - 16/09/2020
	Integracao Envio de Email Amazon SES 
*****************************************************/
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require_once __DIR__. DIRECTORY_SEPARATOR .'COMPOSER/vendor/phpmailer/phpmailer/src/Exception.php';
// require_once __DIR__. DIRECTORY_SEPARATOR .'COMPOSER/vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require_once __DIR__. DIRECTORY_SEPARATOR .'COMPOSER/vendor/phpmailer/phpmailer/src/SMTP.php';
// Load Composer's autoloader
require_once __DIR__. DIRECTORY_SEPARATOR .'COMPOSER/vendor/autoload.php';


// enviarEmail('ronerhenry@gmail.com', 'teste', 'teste'); exit;
?>


<?php
function enviarEmail($pAEmails, $pSAssunto, $pSMensagem)
	{
        try {
			$mail = new PHPMailer();
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
			$mail->Host = hostSES;
			$mail->Port = portSES;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = usernameSmtpSES;
			$mail->Password = passwordSmtpSES;
            // $mail->setFrom(senderSES, 'Sistema EAD - Borba Pause Perin');
            $mail->setFrom('sistema@dpmeducacao.com.br', 'DPM Educação');
            
            // foreach($pAEmails as $value){
			// 	$mail->addAddress($value, '');
            // }
            $mail->addAddress($pAEmails, '');

			$mail->isHTML(true);
			$mail->Subject = $pSAssunto;
			$mail->Body = $pSMensagem;
			
			$mail->Send();
		} catch (phpmailerException $e) {
			echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
            echo "<script>alert('Falha ao enviar o E-mail!');</script>";
            return;
		} catch (Exception $e) {
            echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
			echo "<script>alert('Falha ao enviar o E-mail!');</script>";
            return;
        }
        
        echo  "<div class='container'>
            <div class='pt-5 pb-3' style='font-size:24px; font-weight:bold'> E-MAIL ENVIADO COM SUCESSO!</div>
                <p>Aguarde o contato do nosso setor de Treinamentos.</p>
                <p>Obrigado por manifestar interesse!</p>
            </div>";
	}

if (isset($_POST['BTEnvia'])) {


    // PAGINA DO POST
    $url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Lf6fxAaAAAAAK91wFnyIJs8zihsbYQQHbcY4ml3',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
		echo "<p>You are a bot! Go away!</p>";
		return 0;
    } else if ($captcha_success->success==true) 
    {
        
        
	}


  




 //Variaveis de POST, Alterar somente se necessário
 //====================================================
 $nome = $_POST['nome'];
 $municipio = $_POST['municipio'];
 $Estado = $_POST['estado'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $estado = $_POST['estado'];
 $mensagem = $_POST['mensagem'];
 //====================================================

 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //====================================================
//  $email_remetente = "ead@dpmeducacao.com.br"; // deve ser uma conta de email do seu dominio
 //====================================================

 //Configurações do email, ajustar conforme necessidade
 //====================================================
//  $email_destinatario = "ead@dpmeducacao.com.br"; // pode ser qualquer email que receberá as mensagens
//  $email_reply = "$email";
 $email_assunto = "Contato Interesse ".$_POST['tituloCurso']; // Este será o assunto da mensagem
 //====================================================

 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome = $nome \r\n";
 $email_conteudo .= "Email = $email \r\n";
 $email_conteudo .= "Município = $municipio \r\n";
 $email_conteudo .= "Estado = $estado \r\n";
 $email_conteudo .= "Telefone = $telefone \r\n";
 $email_conteudo .= "Mensagem = $mensagem \r\n";
 $email_conteudo .= "Curso = ".$_POST['tituloCurso']."\r\n"; 
 //====================================================

//  //Seta os Headers (Alterar somente caso necessario)
//  //====================================================
//  $email_headers = implode ( "\r\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================

    //Enviando o email
    // enviarEmail('ronerhenry@gmail.com', $email_assunto, $email_conteudo);
    enviarEmail('ead@dpmeducacao.com.br', $email_assunto, nl2br($email_conteudo));

 //Enviando o email
 //====================================================
//  if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
//     echo"<div class='container'>
//               <div class='pt-5 pb-3' style='font-size:24px; font-weight:bold'> E-MAIL ENVIADO COM SUCESSO!</div>
//               <p>Aguarde o contato do nosso setor de Treinamentos.</p>
//               <p>Obrigado por manifestar interesse!</p>
//             </div>";
//  }
//  else{
//     echo  "<div class='container'>
//     <div class='pt-5 pb-3' style='font-size:24px; font-weight:bold'> E-MAIL ENVIADO COM SUCESSO!</div>
//      <p>Aguarde o contato do nosso setor de Treinamentos.</p>
//      <p>Obrigado por manifestar interesse!</p>
//     </div>"; 
// }
 //====================================================
}
?>

<html>
    <head>
        <script type="text/javascript">
        
        // var onloadCallback = function() 
        //         {
        //             alert("grecaptcha is ready!");
        //         };
            
                var correctCaptcha = function(response) 
                {
		            captchaEnable=true;
                
                    $('#BTEnvia').css('display', 'block');
                    $('#avisoCAPTCHA').css('display', 'none');
                };

            $( document ).ready(function() 
            {
                
                
            });
        </script>
    </head>

<body>
<form action="<?php echo $PHP_SELF; ?>" method="POST">

<input type="hidden" name="tituloCurso" value="<?php echo $_GET['curso'] ?>">

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
                                         <br>manifestação de interesse - <?=$_GET['curso']?><br></span>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- <div class="row">
                           <div class="col-12 pb-0 mb-0">
                                <span class="roboto_condensedregular text-sub-title-21">
                                     
                                </span>
                                <span class="roboto_condensedregular text-sub-title-21">
                                Solicitamos que a(s) inscricao(oes) sejam enviadas para o e-mail cursos@dpmeducacao.com.br ou WhatsApp (51) 99191-2022 informando título do curso desejado, nome(s) completo(s) do(s) participante(s), CPF(s), cargo(s), fone com whats e e-mail para contato.<br>Registramos nossas escusas e agradecemos pela compreensão.
                                </span>
                           </div>
                       </div> -->

                        
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

                                             <!-- <div class="g-recaptcha" data-sitekey="6Lf6fxAaAAAAAO6lG47FOQMaop5QbQvxelyl6AKN"></div> -->
                                             
                                             
                                             <div class="col-12 p-0">
                                                 <div class="form-group row align-self-center">
                                                     <div class="col-xs-4 col-sm-12 col-md-11 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
                                                         
                                                        <input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme" type="submit" id="BTEnvia" name="BTEnvia" value="Enviar" style="display: none !important">

                                                        <br />
                                                        <span id="avisoCAPTCHA"> É necessário o preenchimento do reCAPTCHA </span>

                                                        <div class="g-recaptcha"  style="margin: 0 auto;display: block;width: 100%;" data-sitekey="6Lf6fxAaAAAAAO6lG47FOQMaop5QbQvxelyl6AKN" data-callback="correctCaptcha"></div>

                                                         <!-- <button id="recaptcha" class="g-recaptcha"
                                                             data-sitekey="6LficJcUAAAAAIVtj-9bcIHijCDrHOtS7uB65vQW"
                                                             data-callback="enviarContato" 
                                                             data-badge="bottomleft"
                                                             style="display: none;"></button> -->
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

</form>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>

</body>
</html>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
