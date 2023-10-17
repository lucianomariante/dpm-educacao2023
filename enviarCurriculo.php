<?php
ob_start();
	require_once 'include/constantes.php';
	require_once 'transaction/transactionCurriculo.php';
	require_once 'libs/phpmailer/email.php';

	function verificacaoGoogleRecaptcha($captcha)
	{
		$secret ='6LficJcUAAAAAOyKacWkNxrjWQw60rDBw4a8MPml';
		$ip = $_SERVER['REMOTE_ADDR']; //IP do cliente
		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&$remoteip=$ip"); //URL para verificação
		$arr = json_decode($rsp, true);
		if($arr['success']){
			return true;
		}
		return false;
	}

	if(verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])){

		unset($_POST['g-recaptcha-response']);
		$tipo_vaga = '';

		$id = insertUpdateCurriculo($_POST, $_FILES);

		$nome     = filter_input(INPUT_POST, 'vSCURNOME', FILTER_SANITIZE_STRING);
		$telefone = filter_input(INPUT_POST, 'vSCURTELEFONE', FILTER_SANITIZE_STRING);
		$email    = filter_input(INPUT_POST, 'vSCUREMAIL', FILTER_SANITIZE_EMAIL);
		$vaga     = filter_input(INPUT_POST, 'vSCURVAGA', FILTER_SANITIZE_STRING);

		if ($vaga === '1') {
			$tipo_vaga = 'Estágio';
		} else {
			$tipo_vaga = 'Efetivo';
		}

		$dadosEmail = array(
	        'titulo'        => 'Envio de Currículo | '.cSNomeEmpresa,
	        'descricao'     => '',
	        'destinatarios' => array(
	            'cursos@dpmeducacao.com.br',
		      	$email,
	        ),
	        'fields' => array(
	            'Nome'     => $nome,
	            'Telefone' => $telefone,
	            'E-mail'   => $email,
	            'Vaga'     => $tipo_vaga,
	        )
	    );

		emailField($dadosEmail);

		if($id > 0) {
			ob_end_clean();
			echo json_encode(array(true, 'Currículo cadastrado com sucesso.'));
		} else {
			ob_end_clean();
			echo json_encode(array(false, 'Houve um erro ao enviar a mensagem.'));
		}

	} else {
		ob_end_clean();
		echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
	}