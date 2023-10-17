<?php
ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionAlunos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionContratos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionMatricula.php';

if ($_POST) {

	$aluno = $matricula = array();

	$aluno['vSCLIRAZAOSOCIAL']  = $cliente = filter_input(INPUT_POST, 'vSCLIRAZAOSOCIAL', FILTER_SANITIZE_STRING);
	$aluno['vSALUNOME']  = $nome = filter_input(INPUT_POST, 'vSALUNOME', FILTER_SANITIZE_STRING);
	$aluno['vSALUCPF']   = $cpf = filter_input(INPUT_POST, 'vSALUCPF', FILTER_SANITIZE_STRING);
	$aluno['vSALUEMAIL'] = $email = filter_input(INPUT_POST, 'vSALUEMAIL', FILTER_SANITIZE_EMAIL);
	$aluno['vSALUFONE']   = $telefone = filter_input(INPUT_POST, 'vSALUFONE', FILTER_SANITIZE_STRING);

	if (!empty($_POST['vSALUCELULAR'])) {
		$aluno['vSALUCELULAR'] = $celular = filter_input(INPUT_POST, 'vSALUCELULAR', FILTER_SANITIZE_STRING);
	}

	if (!empty($_POST['vSALUEMAILALTERNATIVO'])) {
		$aluno['vSALUEMAILALTERNATIVO'] = $emailAlternativo = filter_input(INPUT_POST, 'vSALUEMAILALTERNATIVO', FILTER_SANITIZE_EMAIL);
	}

	$aluno['vSALUCARGO']   = $cargo = filter_input(INPUT_POST, 'vSALUCARGO', FILTER_SANITIZE_STRING);
	$aluno['vSALULOTACAO'] = $lotacao = filter_input(INPUT_POST, 'vSALULOTACAO', FILTER_SANITIZE_STRING);
	$aluno['vICLICODIGO']  = $codcliente = filter_input(INPUT_POST, 'vICLICODIGO', FILTER_SANITIZE_NUMBER_INT);

	if (!empty($_POST['vSALUPCD'])) {
		$vSALUPCD = filter_input(INPUT_POST, 'vSALUPCD', FILTER_SANITIZE_STRING);
		$aluno['vSALUPCD'] = filter_input(INPUT_POST, 'vSALUPCD', FILTER_SANITIZE_STRING);
	}else{
		$vSALUPCD = '';
	}
	if (!empty($_POST['vSALUOBSERVACOES'])) {
		$aluno['vSALUOBSERVACOES'] = filter_input(INPUT_POST, 'vSALUOBSERVACOES', FILTER_SANITIZE_STRING);
		$vSALUOBSERVACOES = filter_input(INPUT_POST, 'vSALUOBSERVACOES', FILTER_SANITIZE_STRING);
	} else $vSALUOBSERVACOES = '';

	$curso            = filter_input(INPUT_POST, 'vSCURCURSO', FILTER_SANITIZE_STRING);
	$sequencial       = filter_input(INPUT_POST, 'vICURSEQUENCIAL', FILTER_SANITIZE_NUMBER_INT);
	$matricula['vICURCODIGO'] = $codcurso = filter_input(INPUT_POST, 'vICURCODIGO', FILTER_SANITIZE_NUMBER_INT);

	$tipo_pagamento = filter_input(INPUT_POST, 'tipo_pagamento', FILTER_SANITIZE_STRING);
	$retencao = filter_input(INPUT_POST, 'retencao', FILTER_SANITIZE_STRING);
	if (empty($_POST['vIALUCODIGO']))
		$aluno['vIALUCODIGO'] = '';
	else
		$aluno['vIALUCODIGO'] = $_POST['vIALUCODIGO'];
	$codAluno = insertUpdateAluno($aluno);
	//$codAluno = empty($_POST['vIALUCODIGO']) ? insertUpdateAluno($aluno) : $_POST['vIALUCODIGO'];

	if (isset($_POST['vAAREAINTERESSE'])) {
		insertUpdateAlunoAreaInteresse($codAluno, $_POST['vAAREAINTERESSE']);
	}

	$matricula['vIALUCODIGO']      = $codAluno;
	$matricula['vSCXMALUNO']       = $nome;
	$matricula['vSCXMCONTRATO']    = 'N';
	$matricula['vICLICODIGO']      = $codcliente;
	$matricula['vSCLIRAZAOSOCIAL'] = $cliente;
	$matricula['vSCXMSITUACAO']    = 'Pendente';
	$matricula['vDCXMDATAVENCIMENTO'] = date('Y-m-d', strtotime(' + 5 days'));

	if ($tipo_pagamento === "boleto") {
		$matricula['vSCXMFORMAPAGAMENTO'] = 'Boleto Bancário';
	} else if ($tipo_pagamento === "transferencia") {
		$matricula['vSCXMFORMAPAGAMENTO'] = 'À Vista';
	} else if ($tipo_pagamento === "") {
		$matricula['vSCXMFORMAPAGAMENTO'] = 'Boleto Bancário';
	}

	if ($retencao !== "diversa") {
		$valor_retensao = $retencao;
	} else {
		$valor_retensao = filter_input(INPUT_POST, 'ret_diversa_percentual', FILTER_SANITIZE_STRING);
	}

	if ($retencao == "1,5") $matricula['vICXMRETENCAO'] = 95;
	else if ($retencao == "4,8") $matricula['vICXMRETENCAO'] = 96;
	else $matricula['vICXMRETENCAO'] = 97;

	$hasMatricula = verificarExistenciaMatricula($codcurso, $codAluno);

	if ($hasMatricula == false) {
	// if (1) {

		$id = insertUpdateMatricula($matricula);
		$cursoDesc = getCursoDesc($codcurso);

		if ($id > 0) {
			// Obtém da tabela CURSOMATRICULA
			$nroInscritos = verificarQuantidadeInscritos($codcurso);
			// Atualiza o campo CURMATRICULADOS da tabela CURSOS
			atualizarQuantidadeInscritos($codcurso, $nroInscritos);

			$dadosEmail = array(
				'titulo'        => 'Solicitação de Inscrição - Cliente sem vinculação à DPM Consultoria | ' . cSNomeEmpresa,
				'descricao'     => '',			
				'nome'             => $nome,
				'email'            => $email,
				'emailAlternativo' => $emailAlternativo,				
				'cliente'          => $cliente,
				'codcliente'       => $codcliente,
				'telefone'         => $telefone,
				'celular'          => $celular,
				'curso'            => $curso,
				'cargo'            => $cargo,
				'lotacao'          => $lotacao,
				'cpf'              => $cpf,
				'codcurso'         => $codcurso,
				'sequencial'       => $sequencial,
				'tipoPagamento'    => $tipo_pagamento,
				'retencao'         => $valor_retensao,
				'PCD'         	   => $vSALUPCD,
				'observacoes'  	   => $vSALUOBSERVACOES,
				'cursoDesc'  	   => $cursoDesc,
			);

			require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/enviar-email-confirmacao-inscricao.php';
			$retorno = inscricaoFinalizada($dadosEmail, $matricula['vSCXMFORMAPAGAMENTO'], 'N');

			ob_end_clean();

			echo json_encode(
				array("status" => true, "msg" => 'Inscrição enviada com sucesso!', "id" => $codAluno)
			);
		} else {
			echo json_encode(array("status" => false, "msg" => 'Houve um erro ao enviar a inscrição!', "id" => ''));
		}
	}
	else
	{
		ob_end_clean();

		//
		$cursoDesc = getCursoDesc($codcurso);

		$dadosEmail = array(
			'titulo'        => 'Sua inscrição já foi realizada | Treinamento: '.$sequencial.' - ' . $curso,
			'descricao'     => '',
			'destinatarios' => array(
				$email
			),
			'nome'             => $nome,
			'email'            => $email,
			'emailAlternativo' => $emailAlternativo,
			'municipio'        => $municipio,
			'codcliente'       => $codcliente,
			'telefone'         => $telefone,
			'celular'          => $celular,
			'curso'            => $curso,
			'cargo'            => $cargo,
			'lotacao'          => $lotacao,
			'cpf'              => $cpf,
			'codcurso'         => $codcurso,
			'sequencial'       => $sequencial,
			'PCD'         	   => $vSALUPCD,
			'observacoes'  	   => $vSALUOBSERVACOES,
			'cursoDesc'		   => $cursoDesc,
		);

		require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/enviar-email-confirmacao-inscricao.php';
		$retorno = inscricaoFinalizada($dadosEmail, $matricula['vSCXMFORMAPAGAMENTO']);
		//

		echo json_encode(
			array(
				"status" => false,
				"msg" => 'Duplicidade de Inscrição, já existe uma inscrição deste aluno para este Treinamento.
				Maiores informações contate o setor de treinamentos da DPM Educação!',
				"id" => ''
			)
		);
	}
} else {
	ob_end_clean();

	echo json_encode(array("status" => false, "msg" => 'Houve um erro ao realizar a validação!', "id" => ''));
}

