<?php
/***************************************************** 
	Roner Rodrigues - 07/09/2020
	Integracao Envio de Email Amazon SES 
*****************************************************/
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__. DIRECTORY_SEPARATOR .'../COMPOSER/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__. DIRECTORY_SEPARATOR .'../COMPOSER/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. DIRECTORY_SEPARATOR .'../COMPOSER/vendor/phpmailer/phpmailer/src/SMTP.php';
// Load Composer's autoloader
require_once __DIR__. DIRECTORY_SEPARATOR .'../COMPOSER/vendor/autoload.php';

require_once 'constantes.php';

// envioEmail("teste UBISTART", "teste 5", "ronerhenry@gmail.com", NIL);

function envioEmail($pSTitulo, $pSMensagem, $pSAddAddress, $anexos=null){

	try{
		$pSAddAddress = ($pSAddAddress != 'ADMIN') ? $pSAddAddress : getConfig('CFGEMAILRECEBIMENTO');
		$mail = new PHPMailer;

		$mail->CharSet = 'UTF-8';
		$mail->setLanguage('br', 'language/');
		$mail->isSMTP();		
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
		// $mail->Host = getConfig('CFGHOST');
		$mail->Host = hostSES;
		$mail->Port = portSES;
		// $mail->Username = getConfig('CFGEMAILENVIO');
		$mail->Username = usernameSmtpSES;
		// $mail->Password = getConfig('CFGSENHAEMAIL');
		$mail->Password = passwordSmtpSES;
		// $mail->From = getConfig('CFGEMAILENVIO');
		// $mail->FromName = cSNomeEmpresa;

		// $mail->setFrom(senderSES, cSNomeEmpresa);
		$mail->setFrom('sistema@dpmeducacao.com.br', cSNomeEmpresa);

		$mail->addAddress($pSAddAddress, cSNomeEmpresa);

		$mail->isHTML(true);
		$mail->Subject = $pSTitulo;
		$mail->Body = $pSMensagem;

		if(!is_null($anexos)){
			foreach($anexos as $anexo){
				$mail->AddAttachment($anexo);
			}
		}

		$enviado = $mail->send();

		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		return $enviado;
	} catch (phpmailerException $e) {
		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
		return false;
	} catch (Exception $e) {
		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
		return false;
	}
}

function emailField($dados) {
	$vSTexto = emailCabecalho($dados['titulo']);
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;" width="555" data-cms-node="8">';
	$vSTexto .= '<hr class="bot-space" style="background-color: #e5e5e5;color: #777;height: 1px;border: none;margin: 0;clear: both;font-size: 13px;margin-bottom: 20px;">';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;">';
	$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
	$vSTexto .= '<thead>';

	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;background: #eee;"><span>'.$dados['descricao'].'</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody class="order-content" style="font-size: 12px;color: #888;">';

	foreach($dados['fields'] as $chave => $valor){
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">'.$chave.':</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$valor.'</span></td>';
		$vSTexto .= '</tr>';
	}

	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;" width="555" data-cms-node="8">';
	$vSTexto .= '<hr class="bot-space" style="background-color: #e5e5e5;color: #777;height: 1px;border: none;margin: 0;clear: both;font-size: 13px;margin-bottom: 20px;">';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= emailRodape();
	foreach($dados['destinatarios'] as $destinatario){
		$retorno[] = envioEmail($dados['titulo'], $vSTexto, $destinatario);
	}

	return $retorno;
}

function emailCabecalho($pSTitulo) {
	$vSTexto = '<html style="width: 100%; margin-top: 0px !important; padding-top: 0px !important;">';
	$vSTexto .= '<head>';
	$vSTexto .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$vSTexto .= '<title>'.$pSTitulo.'</title>';
	$vSTexto .= '</head>';
	$vSTexto .= '<body style="font-family: Arial, Helvetica, sans-serif;" data-cms-node="1">';
	$vSTexto .= '<table width="600" align="center" style="padding: 5px 0;background: #FFF;border: 1px solid #e5e5e5;border-color: #e5e5e5;display: block;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th colspan="2" align="left" style="padding: 5px 20px;" data-cms-node="2">';
	$vSTexto .= '<img src="'.cSUrlSiteEmpresa.'admin/imagens/'.cSLogoMarca.'" width="145px" height="auto" alt="" style="max-width: 200px; max-height: 80px;" data-cms-node="3">';
	$vSTexto .= '</th>';
	$vSTexto .= '<th colspan="2" align="right" style="padding: 5px 20px;" data-cms-node="5"><span class="color2" style="color: #444;" data-cms-node="6"><a href="'.cSUrlSiteEmpresa.'">'.cSSiteEmpresa.'</a><br />Telefone: <strong data-cms-node="7">'.cSTelefone1.'</strong></span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody>';

	return $vSTexto;

}

function emailRodape() {
	$vSTexto = '</tbody>';
	$vSTexto .= '<tfoot class="footer">';
	$vSTexto .= '<tr style="width: 100%;"><td colspan="4" style="height: 2px;background: #e5e5e5;" data-cms-node="9"></td></tr>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="1" valign="middle" style="padding: 5px 20px;" data-cms-node="10"></td>';
	$vSTexto .= '<td colspan="3" style="padding: 5px 20px;" data-cms-node="12">';
	$vSTexto .= '    <p style="margin: 0;clear: both;font-size: 13px;color: #777;" data-cms-node="13">';
	$vSTexto .= '    '.cSSegmentoAtendimento.' <strong data-cms-node="14"></strong><br>';
	$vSTexto .= '    Telefone: <strong data-cms-node="15"> '.cSTelefone1.'</strong><br>';
	if(cSTelefone2 != '') $vSTexto .= '    <strong data-cms-node="15"> '.cSTelefone2.'</strong><br>';
	if(cSTelefone3 != '') $vSTexto .= '    <strong data-cms-node="15"> '.cSTelefone3.'</strong><br>';
	$vSTexto .= '    Email: <strong data-cms-node="18"> '.getConfig('CFGEMAILRECEBIMENTO').'</strong>';
	$vSTexto .= '    </p>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</tfoot>';
	$vSTexto .= '</table>';
	$vSTexto .= '</body>';
	$vSTexto .= '</html>';

	return $vSTexto;
}