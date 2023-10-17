<?php
ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionClientes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionEnderecos.php';

if ($_POST) {
	$response = $cliente = $endereco = array();

	$endereco['vIEMPCODIGO'] = $cliente['vIEMPCODIGO'] = 1;
	$endereco['vITABCODIGO'] = 64;
	$cliente['vICLICODIGO'] = filter_input(INPUT_POST, 'oid_cliente', FILTER_SANITIZE_NUMBER_INT);
	if ($_POST['tipo_cliente'] === "J") {
		$cliente['vSCLIRAZAOSOCIAL']  = filter_input(INPUT_POST, 'pj_nome', FILTER_SANITIZE_STRING);
		$cliente['vSCLINOMEFANTASIA'] = filter_input(INPUT_POST, 'pj_nome', FILTER_SANITIZE_STRING);
		$cliente['vSCLICNPJ']         = filter_input(INPUT_POST, 'pj_cnpj', FILTER_SANITIZE_STRING);
		$cliente['vSCLIEMAIL']        = filter_input(INPUT_POST, 'pj_email', FILTER_SANITIZE_EMAIL);
		$cliente['vSCLIFONE']         = filter_input(INPUT_POST, 'pj_telefone', FILTER_SANITIZE_STRING);
		$cliente['vSCLITIPOCLIENTE']  = filter_input(INPUT_POST, 'tipo_cliente', FILTER_SANITIZE_STRING);

		$endereco['vITLOCODIGO']     = filter_input(INPUT_POST, 'pj_tipo_logradouro', FILTER_SANITIZE_NUMBER_INT);
		$endereco['vSENDLOGRADOURO']    = filter_input(INPUT_POST, 'pj_logradouro', FILTER_SANITIZE_STRING);
		$endereco['vSENDNROLOGRADOURO'] = filter_input(INPUT_POST, 'pj_numero', FILTER_SANITIZE_STRING);
		$endereco['vSENDBAIRRO']        = filter_input(INPUT_POST, 'pj_bairro', FILTER_SANITIZE_STRING);
		$endereco['vSENDCEP']           = filter_input(INPUT_POST, 'pj_cep', FILTER_SANITIZE_STRING);
		$endereco['vIESTCODIGO']        = filter_input(INPUT_POST, 'pj_estado', FILTER_SANITIZE_NUMBER_INT);
		$endereco['vICIDCODIGO']        = filter_input(INPUT_POST, 'pj_cidade', FILTER_SANITIZE_NUMBER_INT);
		if (isset($_POST['pj_complemento'])) {
			$endereco['vSENDCOMPLEMENTO']  = filter_input(INPUT_POST, 'pj_complemento', FILTER_SANITIZE_STRING);
		}
	}

	if ($_POST['tipo_cliente'] === "F") {
		$cliente['vSCLIRAZAOSOCIAL']  = filter_input(INPUT_POST, 'pf_nome', FILTER_SANITIZE_STRING);
		$cliente['vSCLINOMEFANTASIA'] = filter_input(INPUT_POST, 'pf_nome', FILTER_SANITIZE_STRING);
		$cliente['vSCLICPF']         = filter_input(INPUT_POST, 'pf_cpf', FILTER_SANITIZE_STRING);
		$cliente['vSCLIEMAIL']        = filter_input(INPUT_POST, 'pf_email', FILTER_SANITIZE_EMAIL);
		$cliente['vSCLIFONE']         = filter_input(INPUT_POST, 'pf_telefone', FILTER_SANITIZE_STRING);
		$cliente['vSCLITIPOCLIENTE']  = filter_input(INPUT_POST, 'tipo_cliente', FILTER_SANITIZE_STRING);

		$endereco['vITLOCODIGO']     = filter_input(INPUT_POST, 'pf_tipo_logradouro', FILTER_SANITIZE_NUMBER_INT);
		$endereco['vSENDLOGRADOURO']    = filter_input(INPUT_POST, 'pf_logradouro', FILTER_SANITIZE_STRING);
		$endereco['vSENDNROLOGRADOURO'] = filter_input(INPUT_POST, 'pf_numero', FILTER_SANITIZE_STRING);
		$endereco['vSENDBAIRRO']        = filter_input(INPUT_POST, 'pf_bairro', FILTER_SANITIZE_STRING);
		$endereco['vSENDCEP']           = filter_input(INPUT_POST, 'pf_cep', FILTER_SANITIZE_STRING);
		$endereco['vIESTCODIGO']        = filter_input(INPUT_POST, 'pf_estado', FILTER_SANITIZE_NUMBER_INT);
		$endereco['vICIDCODIGO']        = filter_input(INPUT_POST, 'pf_cidade', FILTER_SANITIZE_NUMBER_INT);
		if (isset($_POST['pf_complemento'])) {
			$endereco['vSENDCOMPLEMENTO']  = filter_input(INPUT_POST, 'pf_complemento', FILTER_SANITIZE_STRING);
		}
	}

	$codcliente = insertCliente($cliente);

	if (empty($codcliente)) {
		$response['msg'] = 'Não foi possível efetuar o cadastro de Cliente, verifique os dados novamente!';
		$response['status'] = 'error';
		$response['id'] = '';

		ob_end_clean();

		echo json_encode($response);
		die;
	}

	$endereco['vICLICODIGO'] = $codcliente;
	$codendereco = insertEndereco($endereco);

	if (empty($codcliente)) {
		$response['msg'] = 'Não foi possível efetuar o cadastro de Endereço, verifique os dados novamente!';
		$response['status'] = 'error';
		$response['id'] = '';

		ob_end_clean();

		echo json_encode($response);
		die;
	}
	$response['msg'] = 'Cadastro efetuado com sucesso!';
	$response['status'] = 'success';
	$response['id'] = $codcliente;

	ob_end_clean();

	echo json_encode($response);
}