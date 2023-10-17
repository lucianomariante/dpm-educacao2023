<?php
ob_start();
	require_once 'include/constantes.php';
	require_once 'transaction/transactionContatos.php';
	require_once 'libs/phpmailer/email.php';

	function verificacaoGoogleRecaptcha($captcha){
		$secret ='6LficJcUAAAAAOyKacWkNxrjWQw60rDBw4a8MPml';
		$ip = $_SERVER['REMOTE_ADDR']; //IP do cliente
		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&$remoteip=$ip"); //URL para verificação
		$arr = json_decode($rsp, true);
		if($arr['success']){
			return true;
		}
		return false;
	}

	if (verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])) {

		unset($_POST['g-recaptcha-response']);

		$id = insertUpdateContatos($_POST);

		$nome         = filter_input(INPUT_POST, 'vSCONNOME', FILTER_SANITIZE_STRING);
		$email        = filter_input(INPUT_POST, 'vSCONEMAIL', FILTER_SANITIZE_EMAIL);
		$municipio    = filter_input(INPUT_POST, 'vSCONMUNICIPIO', FILTER_SANITIZE_STRING);
		$telefone     = filter_input(INPUT_POST, 'vSCONTELEFONE', FILTER_SANITIZE_STRING);

		$dadosEmail = array(
	        'titulo'        => 'Contato via WebSite | '.cSNomeEmpresa,
	        'descricao'     => '',
	        'destinatarios' => array(
	            'ead@dpmeducacao.com.br',
		      $email,
	        ),
	        'fields' => array(
	            'Nome'                   => $nome,
	            'E-mail'                 => $email,
	            'Municipio'              => $municipio,
	            'Telefone'               => $telefone,
	            'Mensagem'               => nl2br($_POST['vSCONMENSAGEM'])
	        )
	    );

		if (!empty($telefone)) {
			$dadosEmail['fields']['Telefone'] = $telefone;
		}

		emailField($dadosEmail);

		if ($id > 0) {
			ob_end_clean();
			echo json_encode(array(true, 'Mensagem enviada com sucesso.'));
		} else {
			ob_end_clean();
			echo json_encode(array(false, 'Houve um erro ao enviar a mensagem.'));
		}
	} else {
		ob_end_clean();
		echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
	}
