
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '../include/constantes.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$login  = filter_input(INPUT_POST, 'txtlogin', FILTER_SANITIZE_STRING);
$senha  = addslashes(trim($_POST['txtsenha']));
$id_curso = (isset($_POST['id_curso'])) ? filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT) : 0;

if (!empty($action) && !empty($login) && !empty($senha)) {

	$query = "SELECT
				cl.*, c.CONNOME, c.CONFONE, c.CONEMAIL, c.CONEMAIL2, c.CONCARGO, c.CONSETOR,
				c.CONRG, c.CONCODIGO, c.CONRAMAL, c.CONCELULAR, t.CLICODIGO, v.CLIRAZAOSOCIAL,
				v.CLICODIGOLEGADO, v.CLINOMEFANTASIA, v.CLIBRASAO, t.CTRINADIMPLENTES, t.PLACODIGO
			FROM
				CONTRATOSXLOGIN cl
			LEFT JOIN
				CONTATOS c
			ON
				cl.CONCODIGO = c.CONCODIGO
			LEFT JOIN
				CONTRATOS t
			ON
				t.CTRCODIGO = cl.CTRCODIGO
			LEFT JOIN
				CLIENTES v
			ON
				v.CLICODIGO = t.CLICODIGO
			WHERE
				c.CONSTATUS = 'S'
			AND
				cl.CXLSTATUS = 'S'
			AND
				t.CTRSTATUS = 'S'
			AND
				t.CTRPOSICAO IN (118, 120)
			AND
				cl.CXLLOGIN = '$login'
			AND
				cl.CXLSENHA = '$senha'";

	$query       = stripcslashes($query);
	$vConexaoDPM = sql_conectar_bancoDPM();
	$RS_Result   = sql_executa(vGBancoSiteDPM, $vConexaoDPM, $query);

	$nro_registros = sql_record_count($RS_Result);

	while ($usuario = sql_retorno_lista($RS_Result)) {
		$i++;
		$_SESSION['sICLICODIGO_SITE']		= 	$usuario['CLICODIGO'];
		$_SESSION['sICTRCODIGO_SITE']		= 	$usuario['CTRCODIGO'];
		$_SESSION['sICONCODIGO_SITE']		= 	$usuario['CONCODIGO'];
		$_SESSION['sSCLIRAZAOSOCIAL_SITE']	= 	$usuario['CLIRAZAOSOCIAL'];
		$_SESSION['sSCLINOMEFANTASIA_SITE'] = 	$usuario['CLINOMEFANTASIA'];
		$_SESSION['sSCONEMAIL_SITE']		= 	$usuario['CONEMAIL'];
		$_SESSION['sSStatus_SITE'] 			= 	$usuario['Status'];
		$_SESSION['sICXLCODIGO_SITE']   	= 	$usuario['CXLCODIGO'];
		$_SESSION['sSCONNOME_SITE']			= 	$usuario['CONNOME'];
		$_SESSION['sSCXLLOGIN_SITE']		= 	$usuario['CXLLOGIN'];
		$_SESSION['sSCXLTIPO_SITE']			=	$usuario['CXLTIPO'];
		$_SESSION['sSCONCARGO_SITE']		= 	$usuario['CONCARGO'];
		$_SESSION['sSCONSETOR_SITE']		= 	$usuario['CONSETOR'];
		$_SESSION['sSCONFONE_SITE']			=	$usuario['CONFONE'];
		$_SESSION['sSCXLOBS_SITEcxlObs'] 	= 	$usuario['cxlObs'];
		$_SESSION['session_controle']		=   'SITEDPM-2015';
		$_SESSION['sSCTRINADIMPLENTES']		=	$usuario['CTRINADIMPLENTES'];
	}
	sql_fechar_conexao_banco($vConexaoDPM);

	if ($nro_registros > 0 && $id_curso > 0) {
		header("Location:/cursos-inscricao/clientes/{$id_curso}");
		die;
	}

	header("Location:/{$action}");
	die;
} else {
	header("Location:/index");
	die;
}