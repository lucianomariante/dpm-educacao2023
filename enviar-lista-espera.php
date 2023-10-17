<?php
ob_start();

	require_once __DIR__.DIRECTORY_SEPARATOR.'include/constantes.php';
	require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionAlunos.php';

	if ($_POST) {

		$reserva = array();

		$reserva['vSRESMUNICIPIO']   = $municipio  = filter_input(INPUT_POST, 'vSCLIRAZAOSOCIAL', FILTER_SANITIZE_STRING);
		$reserva['vSRESPODER']       = $tipo_poder = filter_input(INPUT_POST, 'vSTIPOPODER', FILTER_SANITIZE_STRING);
		$reserva['vSRESNOME']        = $nome       = filter_input(INPUT_POST, 'vSALUNOME', FILTER_SANITIZE_STRING);
		$reserva['vSRESCARGO']       = $cargo      = filter_input(INPUT_POST, 'vSALUCARGO', FILTER_SANITIZE_STRING);
		$reserva['vSRESEMAIL']       = $email      = filter_input(INPUT_POST, 'vSALUEMAIL', FILTER_SANITIZE_STRING);
		$reserva['vSRESFONE']        = $telefone   = filter_input(INPUT_POST, 'vSALUFONE', FILTER_SANITIZE_STRING);
		$reserva['vSRESFONECELULAR'] = $celular    = filter_input(INPUT_POST, 'vSALUCELULAR', FILTER_SANITIZE_STRING);
		$reserva['vIRESNROVAGAS']    = $nro_vagas  = filter_input(INPUT_POST, 'vINUMEROVAGAS', FILTER_SANITIZE_NUMBER_INT);
		$reserva['vICURCODIGO']      = $codcurso   = filter_input(INPUT_POST, 'vICURCODIGO', FILTER_SANITIZE_NUMBER_INT);
		$reserva['vSRESOPCAO']       = $opcao      = filter_input(INPUT_POST, 'vSTURMALOTADA', FILTER_SANITIZE_STRING);

		$curso      = filter_input(INPUT_POST, 'vSCURCURSO2', FILTER_SANITIZE_STRING);
		$codreserva = insertUpdateReserva($reserva);
		$nome_poder = '';

		switch ($tipo_poder) {
			case 'E':
				$nome_poder = 'Executivo';
				break;
			case 'L':
				$nome_poder = 'Legislativo';
				break;
			case 'A':
				$nome_poder = 'Autarquias';
				break;
			case 'O':
			default:
				$nome_poder = 'Outras Empresas';
				break;
		}

		$hasReserva = $codreserva > 0;

		if ($hasReserva) {

			$dadosEmail = array(
		        'titulo'        => 'Solicitação de Inscrição Lista de Espera | '.cSNomeEmpresa,
		        'descricao'     => '',
		        'destinatarios' => array(
		            $email		            
		        ),
	            'nome'       => $nome,
	            'email'      => $email,
	            'municipio'  => $municipio,
	            'telefone'   => $telefone,
	            'celular'    => $celular,
	            'curso'      => $curso,
	            'cargo'      => $cargo,
	            'codcurso'   => $codcurso,
	            'nro_vagas'	 => $nro_vagas,
		    );

			require_once __DIR__.DIRECTORY_SEPARATOR.'include/enviar-email-lista-espera.php';
			$retorno = inscricaoFinalizada($dadosEmail, NULL);

			ob_end_clean();

			echo json_encode(array(true, 'Cadastro realizado em lista de espera! Aguarde nosso contato!'));
		} else {
			echo json_encode(array(false, 'Houve um erro ao enviar a inscrição!'));
		}
	} else {
		echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
	}