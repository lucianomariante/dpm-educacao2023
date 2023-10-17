<?php
ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . '../include/constantes.php';
ob_end_clean();
require_once __DIR__ . DIRECTORY_SEPARATOR . '../transaction/transactionClientes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../transaction/transactionCursos.php';

function emailCabecalho($pSTitulo)
{
	$vSTexto = '<html style="width: 100%; margin-top: 0px !important; padding-top: 0px !important;">';
	$vSTexto .= '<head>';
	$vSTexto .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$vSTexto .= '<title>' . $pSTitulo . '</title>';
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
	$curso = findCursoById($dados['codcurso']);
	$cliente = findClienteById($dados['codcliente']);

	$vSTitulo = "Inscrição feita pelo Site - Treinamento: " . $dados['sequencial'] . " - " . ($dados['curso']);
	$vSTexto = emailCabecalho($dados['titulo']);
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;" width="555" data-cms-node="8">';
	$vSTexto .= '<hr class="bot-space" style="background-color: #e5e5e5;color: #777;height: 1px;border: none;margin: 0;clear: both;font-size: 13px;margin-bottom: 20px;">';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;">';
	$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
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
	$vSTexto .= '  <strong  style="color: #666666;">Muncípio/Cliente:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $cliente['CLICODIGO'] . " - " . $cliente['CLIRAZAOSOCIAL'] . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">E-mail Principal:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $cliente['CLIEMAIL'] . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Telefone Principal:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $cliente['CLIFONE'] . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong class="color1" style="color: #666666;">Forma de Pagamento:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $pSFormaPgto . '</span></td>';
	$vSTexto .= '</tr>';

	if (($dados['codcurso'] == 1525) || ($dados['codcurso'] == 1272) || ($dados['codcurso'] == 1512)) {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="left" colspan="2" style="padding: 5px 20px;" ><span style="color: red;"><b>IMPORTANTE: O EMPENHO, RELATIVO AO VALOR DA INSCRIÇÃO, DEVERÁ TER COMO CREDORA, <br />
					A EMPRESA Borba, Pause & Perin - Advogados., CNPJ Nº 92.885.888/0001-05, <br />
					a qual emitirá a respectiva nota fiscal.</b></span></td>';
		$vSTexto .= '</tr>';
	} else {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="left" colspan="2" style="padding: 5px 20px;" ><span style="color: red;"><b>Aproveitamos para destacar que todos os treinamentos promovidos pela DPM deverão ser empenhados em favor <br />
					da DPM EDUCAÇÃO LTDA., inscrita no CPNJ nº 13.021.017/0001-77, a qual emitirá as respectivas notas de prestação de serviços. <br />
					Por fim, registramos que a atual forma de pagamento continuará a ser observada, apenas com a recomendação ao setor.</b></span></td>';
		$vSTexto .= '</tr>';
	}
	if (isset($dados["retencao"])) {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong class="color1" style="color: #666666;">Retenção:</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["retencao"] . '%</span></td>';
		$vSTexto .= '</tr>';
	}

	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<td colspan="4" style="padding: 5px 20px;">';

	$vSTexto .= '<table width="100%" style="background: #FFF;border-collapse: collapse;border: 1px solid #e5e5e5;border-color: #e5e5e5;">';
	$vSTexto .= '<thead>';
	$vSTexto .= '<tr style="width: 100%;">';
	$vSTexto .= '<th align="left" colspan="2" class="order-tit" style="padding: 5px;font-size: 13px;color: #555;background: #eee;"><span>Dados do aluno</span></th>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</thead>';
	$vSTexto .= '<tbody class="order-content" style="font-size: 12px;color: #888;">';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">CPF:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["cpf"] . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Nome Completo:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . ($dados["nome"]) . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Cargo:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . ($dados["cargo"]) . '</span></td>';
	$vSTexto .= '</tr>';
	if ($dados["lotacao"] != '') {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">Lotação:</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . ($dados["lotacao"]) . '</span></td>';
		$vSTexto .= '</tr>';
	}
	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">E-mail:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["email"] . '</span></td>';
	$vSTexto .= '</tr>';
	if ($dados["emailAlternativo"] != '') {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">E-mail Alternativo:</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["emailAlternativo"] . '</span></td>';
		$vSTexto .= '</tr>';
	}
	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Telefone:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["telefone"] . '</span></td>';
	$vSTexto .= '</tr>';
	if ($dados["celular"] != '') {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">Telefone Celular:</strong>';
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados["celular"] . '</span></td>';
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
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . $dados['sequencial'] . " - " . ($dados['curso']) . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Data / Horário:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . nl2br($curso['CURDATAHORARIOSITE']) . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Local:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . nl2br($curso['CURLOCALSITE']) . '</span></td>';
	$vSTexto .= '</tr>';

	$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
	$vSTexto .= '<td align="right" width="30%" >';
	$vSTexto .= '  <strong  style="color: #666666;">Carga horária:</strong>';
	$vSTexto .= '</td>';
	$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . nl2br($curso['CURCARGAHORARIASITE']) . '</span></td>';
	$vSTexto .= '</tr>';
	if ($tupla['CURINSTRUCOESEMAIL'] != '') {
		$vSTexto .= '<tr class="border-bot" style="width: 100%;border-bottom: 1px solid #e5e5e5;">';
		$vSTexto .= '<td align="right" width="30%" >';
		$vSTexto .= '  <strong  style="color: #666666;">Instruções:</strong>'; // criar campo instruções e-mail confirmação
		$vSTexto .= '</td>';
		$vSTexto .= '<td align="left" style="padding: 5px 20px;"><span>' . nl2br($curso['CURINSTRUCOESEMAIL']) . '</span></td>';
		$vSTexto .= '</tr>';
	}
	$vSTexto .= '</tbody>';
	$vSTexto .= '</table>';
	$vSTexto .= '<br>';


	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';
	$vSTexto .= '</td>';
	$vSTexto .= '</tr>';

	$vSTexto .= emailRodape();

	foreach ($dados['destinatarios'] as $destinatario) {
		$retorno[] = envioEmailInscricao(($dados["titulo"]), ($vSTexto), $destinatario, $dados["nome"]);
	}

	return $retorno;
}

function envioEmailInscricao($pSTitulo, $pSMensagem, $pSAddAddress, $pSNomeAddAddress)
{
	require_once __DIR__ . DIRECTORY_SEPARATOR . "../libs/phpmailer/PHPMailerAutoload.php";

	try {
		$pSAddAddress = ($pSAddAddress != 'ADMIN') ? $pSAddAddress : CFGEMAILRECEBIMENTO;
		$mail = new PHPMailer;

		$mail->CharSet = 'UTF-8';
		$mail->setLanguage('br', 'language/');
		//$mail->SMTPDebug = 2;
		$mail->isSMTP();
		$mail->Host = CFGHOST;
		$mail->SMTPAuth = true;
		$mail->Port     = CFGEMAILPORTA; 
		$mail->Username = CFGEMAILENVIO;
		$mail->Password = CFGSENHAEMAIL;
		$mail->SMTPSecure = "tls";
		$mail->From = CFGEMAILENVIO;
		$mail->FromName = cSNomeEmpresa;
		$mail->addAddress($pSAddAddress, $pSNomeAddAddress);
		$mail->addCC('inscricoescursos@dpmeducacao.com.br', 'DPM Educação');

		$mail->isHTML(true);
		$mail->Subject = $pSTitulo;
		$mail->Body = $pSMensagem;

		if (!is_null($anexos)) {
			foreach ($anexos as $anexo) {
				$mail->AddAttachment($anexo);
			}
		}

		$enviado = $mail->send();

		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		return $enviado;
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
		return false;
	} catch (Exception $e) {
		echo $e->getMessage();
		return false;
	}
}