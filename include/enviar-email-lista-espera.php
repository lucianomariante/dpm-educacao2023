<?php
/***************************************************** 
	Roner Rodrigues - 03/09/2020
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

// envioEmailInscricao("TESTE UBISTART", "teste de rotina 1", "ronerhenry@gmail.com", "Roner Rodrigues"); exit;

function emailCabecalho($pSTitulo)
{
	$vSTexto = '<html style="width: 100%; margin-top: 0px !important; padding-top: 0px !important;">';
	$vSTexto .= '<head>';
	$vSTexto .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$vSTexto .= '<title>'.($pSTitulo).'</title>';
	$vSTexto .= '</head>';
	$vSTexto .= '<body style="font-family: Arial, Helvetica, sans-serif;" data-cms-node="1">';
	$vSTexto .= '<table width="600" align="left" style="padding: 5px 0;background: #FFF;border: 0px solid #e5e5e5;border-color: #e5e5e5;display: block;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th colspan="4" align="left" style="padding: 5px 20px;" data-cms-node="2">';
	$vSTexto .= '<img src="https://dpm-rs.com.br/email/assinatura-cabecalho-dpmeduca.jpg">';
	$vSTexto .= '</th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody>';

	return $vSTexto;
}

function emailRodape()
{
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="2" align="left" style="padding: 5px 20px;" data-cms-node="2">';
	$vSTexto .= '<img src="https://dpm-rs.com.br/email/dpm-educacao-rodape.jpg" >';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '</body>';
	$vSTexto .= '</html>';

	return $vSTexto;
}

function inscricaoFinalizada($dados, $pSFormaPgto)
{
	$vSTitulo = "Solicitação Lista de Espera feita pelo Site - Treinamento: ".($dados['curso']);
	$vSTexto = emailCabecalho($dados['titulo']);
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;" width="555" data-cms-node="8">';
	$vSTexto .= '<hr class="bot-space" style="background-color: #e5e5e5;color: #777;height: 1px;border: none;margin: 0;clear: both;font-size: 13px;margin-bottom: 20px;">';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;">';
	/*$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;"><span>Inscrição realizada com sucesso</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;background: #eee;"><span>Dados do cliente</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody class="order-content" style="font-size: 12px;color: #888;">';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Município/Cliente:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$_SESSION['sICLICODIGO_SITE'] ." - ". $_SESSION['sSCLIRAZAOSOCIAL_SITE'].'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">E-mail Principal:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$_SESSION['sSCONEMAIL_SITE'].'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Telefone Principal:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$_SESSION['sSCONFONE_SITE'].'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>'; */
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;">';

	$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;background: #eee;"><span>Dados da Solicitação para inclusão na Lista de Espera</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody class="order-content" style="font-size: 12px;color: #888;">';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Município/Autarquia:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.($dados["municipio"]).'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Nome Completo:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.($dados["nome"]).'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Cargo:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.($dados["cargo"]).'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">E-mail:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$dados["email"].'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Telefone:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$dados["telefone"].'</span></td>';
	$vSTexto .= '</tr>';

	if (!empty($dados["celular"])) {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">Celular:</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.$dados["celular"].'</span></td>';
		$vSTexto .= '</tr>';
	}

	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '<br>';

	$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;background: #eee;"><span>Dados do curso</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody class="order-content" style="font-size: 12px;color: #888;">';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Curso:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.($dados['curso']).'</span></td>';
	$vSTexto .= '</tr>';
	
	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Número de Vagas Pretendidas:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>'.($dados['nro_vagas']).'</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '<br>';


	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= emailRodape();

	foreach($dados['destinatarios'] as $destinatario){
		$retorno[] = envioEmailInscricao(($dados["titulo"]), ($vSTexto), $destinatario, $dados["nome"]);
	}

	return $retorno;
}

function envioEmailInscricao($pSTitulo, $pSMensagem, $pSAddAddress, $pSNomeAddAddress)
{
	try {
		$pSAddAddress = ($pSAddAddress != 'ADMIN') ? $pSAddAddress : CFGEMAILRECEBIMENTO;
		$mail = new PHPMailer;

		$mail->CharSet = 'UTF-8';
		$mail->setLanguage('br', 'language/');

		$mail->isSMTP();
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = true;
		$mail->Host = hostSES;
		$mail->Port = portSES; 
		$mail->Username = usernameSmtpSES;
		$mail->Password = passwordSmtpSES;

		// $mail->setFrom(senderSES, cSNomeEmpresa);
		$mail->setFrom('sistema@dpmeducacao.com.br', cSNomeEmpresa);

		$mail->addAddress($pSAddAddress, $pSNomeAddAddress);
		
		$mail->addCC('inscricoescursos@dpmeducacao.com.br', 'DPM Educação');
		$mail->addCC('cursos@dpmeducacao.com.br', 'DPM Educação');
		$mail->addCC('dulce@dpmeducacao.com.br', 'DPM Educação');
		$mail->addCC('inscricoeseducacao5@gmail.com', 'DPM Educação');
		// $mail->addCC('ronerhenry@gmail.com', 'DPM Educação');
		// $mail->addCC('edward.losque@ubistart.com', 'DPM Educação');

		// $mail->SMTPDebug = 3;
		// $mail->Debugoutput = 'html';
		// $mail->msgHTML($messages);

		$mail->isHTML(true);
		$mail->Subject = $pSTitulo;
		$mail->Body = $pSMensagem;

		if (!is_null($anexos)) {
			foreach ($anexos as $anexo) {
				$mail->AddAttachment($anexo);
			}
		}

		$enviado = $mail->Send();
	
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		return $enviado;
	} catch (phpmailerException $e) {
		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
		return false;
	} catch (Exception $e) {
		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
		// echo "Email not sent. {$e->getMessage()}", PHP_EOL; //Catch errors from Amazon SES.5
		return false;
	}
}