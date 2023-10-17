<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursosInCompany.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'libs/phpmailer/email.php';

function verificacaoGoogleRecaptcha($captcha)
{
	$secret = '6LficJcUAAAAAOyKacWkNxrjWQw60rDBw4a8MPml';
	//	IP do cliente
	$ip     = $_SERVER['REMOTE_ADDR'];
	//	URL para verificação
	$rsp    = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&$remoteip=$ip");
	$arr 	= json_decode($rsp, true);

	if ($arr['success']) {
		return true;
	}
	return false;
}

if (verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])) {

	unset($_POST['g-recaptcha-response']);

	//$id = insertUpdateCursosInCompany($_POST);
	$id = 1;

	$nome              = filter_input(INPUT_POST, 'vSCICNOME', FILTER_SANITIZE_STRING);
	$email             = filter_input(INPUT_POST, 'vSCICEMAIL', FILTER_SANITIZE_EMAIL);
	$municipio         = filter_input(INPUT_POST, 'vSCICMUNICIPIO', FILTER_SANITIZE_STRING);
	$telefone          = filter_input(INPUT_POST, 'vSCICTELEFONE', FILTER_SANITIZE_STRING);
	$curso             = filter_input(INPUT_POST, 'vSCICCURSODESEJADO', FILTER_SANITIZE_STRING);
	$nro_participantes = filter_input(INPUT_POST, 'vICICPARTICIPANTES', FILTER_SANITIZE_NUMBER_INT);
	$mensagem          = filter_input(INPUT_POST, 'vSCICMENSAGEM', FILTER_SANITIZE_STRING);

	$dadosEmail = array(
		'titulo'        => 'Contato via WebSite | Cursos in Company | ' . cSNomeEmpresa,
		'descricao'     => '',
		'destinatarios' => array(
			$email
		),
		'fields' => array(
			'Nome'                => $nome,
			'E-mail'              => $email,
			'Municipio'           => $municipio,
			'Telefone'            => $telefone,
			'Curso'               => $curso,
			'Nº de participantes' => $nro_participantes,
			'Mensagem'            => nl2br($mensagem)
		)
	);

	emailField($dadosEmail);

	if ($id > 0) {
		echo json_encode(array(true, 'Mensagem enviada com sucesso.'));
	} else {
		echo json_encode(array(false, 'Houve um erro ao enviar a mensagem.'));
	}
} else {
	echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
}
