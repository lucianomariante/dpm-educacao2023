<?php
ob_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include/constantes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionAlunos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionContratos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionCursos.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'transaction/transactionMatricula.php';

if ($_POST)
{
	$aluno = $matricula = array();

	$aluno['vSCLIRAZAOSOCIAL']  = $municipio = filter_input(INPUT_POST, 'vSCLIRAZAOSOCIAL', FILTER_SANITIZE_STRING);
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
	$nomecurso       = filter_input(INPUT_POST, 'vICURCURSOCOMPLEMENTO', FILTER_SANITIZE_STRING);
	$sequencial       = filter_input(INPUT_POST, 'vICURSEQUENCIAL', FILTER_SANITIZE_NUMBER_INT);

	$matricula['vICURCODIGO'] = $codcurso = filter_input(INPUT_POST, 'vICURCODIGO', FILTER_SANITIZE_NUMBER_INT);
	if (empty($_POST['vIALUCODIGO']))
		$aluno['vIALUCODIGO'] = '';
	else
		$aluno['vIALUCODIGO'] = $_POST['vIALUCODIGO'];
	$codAluno = insertUpdateAluno($aluno);
	//$codAluno = empty($_POST['vIALUCODIGO']) ? insertUpdateAluno($aluno) : $_POST['vIALUCODIGO'];

	//$codAluno =  insertUpdateAluno($_POST['vIALUCODIGO']);

	if (isset($_POST['vAAREAINTERESSE'])) {
		insertUpdateAlunoAreaInteresse($codAluno, $_POST['vAAREAINTERESSE']);
	}

	$matricula['vIALUCODIGO']      = $codAluno;
	$matricula['vSCXMALUNO']       = $nome;
	$matricula['vICLICODIGO']      = $codcliente;
	$matricula['vSCLIRAZAOSOCIAL'] = $municipio;
	$matricula['vSCXMSITUACAO']    = 'Pendente';

	$formaPagamento = verificarFormaPagamento2($codcliente);
	list($vAno, $vMes, $vDia) = explode("-", $_POST['vDCURDATAFATURAMENTO']);

	switch ($formaPagamento) {
		case 116:
			$matricula['vDCXMDATAVENCIMENTO'] = formatar_data(dataBoleto($vMes, $vAno, 1));
			$matricula['vSCXMFORMAPAGAMENTO'] = 'Boleto Bancário';
			break;
		case 117:
			$matricula['vDCXMDATAVENCIMENTO'] = formatar_data(date("Y-m-d"));
			$matricula['vSCXMFORMAPAGAMENTO'] = 'À Vista';
			break;
		default:
			$matricula['vDCXMDATAVENCIMENTO'] = formatar_data(primeiraTercaMes($vMes, $vAno, 1));
			$matricula['vSCXMFORMAPAGAMENTO'] = 'Crédito de ICMS';
			break;
	}

	if (verificarClienteContrato($codcliente) > 0)
		$matricula['vSCXMCONTRATO'] = 'S';
	else
		$matricula['vSCXMCONTRATO'] = 'N';

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
				'titulo'        => 'Inscrição feita pelo Site | Treinamento: '.$sequencial.' - '.$nomecurso.' - ' . $curso,
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
				'nomecurso'        => $nomecurso,
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
			$retorno = inscricaoFinalizada($dadosEmail, $matricula['vSCXMFORMAPAGAMENTO'], $matricula['vSCXMCONTRATO']);

			ob_end_clean();

			echo json_encode(array(true, 'Inscrição enviada com sucesso!', $codAluno));
		} else {
			echo json_encode(array(false, 'Houve um erro ao enviar a inscrição!'));
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
				false,
				'Duplicidade de Inscrição, já existe uma inscrição deste aluno para este Treinamento.
				Maiores informações contate o setor de treinamentos da DPM Educação!'
			)
		);
	}
} else {
	ob_end_clean();

	echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
}