<?php
    include_once('include/constantes.php');

    if ((verificarVazio($_POST["txtLogin"])) && (verificarVazio($_POST["txtSenha"]))) {

        $vConexao = sql_conectar_banco(vGBancoSite);

        $sql1 = "Select
					USU.*,
					EMP.EMPCODIGO,
					EMP.EMPLOGOMARCA,
					EMP.EMPNOMEFANTASIA
				From
					USUARIOS USU
				INNER JOIN
					EMPRESAUSUARIA EMP
				ON
					USU.EMPCODIGO = EMP.EMPCODIGO
				Where
					USU.USUSTATUS = 'S'
				AND
					EMP.EMPSTATUS = 'S'
				AND
					USULOGIN ='".addslashes($_POST["txtLogin"])."'";

        $resultado = sql_executa(vGBancoSite,$vConexao, $sql1);

        while($res = sql_retorno_lista($resultado)) {
            $vSSenha       = $res['USUSENHA'];
            $vSNome        = $res['USUNOME'];
            $vSEmail       = $res['USUEMAIL'];
            $vIUsuCodigo   = $res['USUCODIGO'];
			$vSNomeEmpresa              = $res['EMPNOMEFANTASIA'];
			$vSEMPLOGO     = '../imagens/empresas/'.$res['EMPCODIGO'].$res['EMPLOGOMARCA'];
			$vIOidEmpresa     = $res['EMPCODIGO'];

        }
        $vSSenha = Desencriptar($vSSenha, 'DPM');

        if ($vSSenha == addslashes($_POST["txtSenha"])){
            $_SESSION['SI_ID_USUARIO']     = $_POST["txtLogin"];
            $_SESSION['SS_NOME_USUARIO']   = $vSNome;
            $_SESSION['SS_EMAIL_USUARIO']  = $vSEmail;
            $_SESSION['SI_USUCODIGO']      = $vIUsuCodigo;
            $_SESSION['SS_USUIP']          = $_SERVER["REMOTE_ADDR"];
			$_SESSION['SI_USU_EMPRESA']    = $vIOidEmpresa;
			$_SESSION['SS_LOGO']	       = $vSEMPLOGO;
			$_SESSION['SS_USU_EMPRESA']    = $vSNomeEmpresa;
			if ($vIOidEmpresa == 1)
				$_SESSION['SI_ID_UF']          = 43;
			else if ($vIOidEmpresa == 2)
				$_SESSION['SI_ID_UF']          = 24;
			else if ($vIOidEmpresa == 3)
				$_SESSION['SI_ID_UF']          = 25;

			include('transaction/transactionLogAcesso.php');
			$dadosLA = array(
				'vSLUAIP' => $_SERVER["REMOTE_ADDR"],
				'vIEMPCODIGO'   => $_SESSION['SI_USU_EMPRESA']
			);

			insertUpdateLogAcesso($dadosLA, 'N');
			$vConexao = sql_conectar_banco(vGBancoSite);



            $sql1 = "Select
                        ACETABELA,
                        ACECONSULTA,
                        ACEINCLUSAO,
                        ACEALTERACAO,
                        ACEEXCLUSAO,
						ACEEXPORTAR
                    From
                        ACESSOS
                    Where
                        USUCODIGO = ".$vIUsuCodigo;

            $resultado = sql_executa(vGBancoSite, $vConexao, $sql1);

            for($i=0; $i<count($teste); $i++) {
                $_SESSION['array'][$i] = $teste[$i];
            }

            while($res = sql_retorno_lista($resultado)) {
                $_SESSION['SA_ACESSOS']['TABELA'][$res['ACETABELA']]['CONSULTA'] = $res['ACECONSULTA'];
                $_SESSION['SA_ACESSOS']['TABELA'][$res['ACETABELA']]['INCLUSAO'] = $res['ACEINCLUSAO'];
                $_SESSION['SA_ACESSOS']['TABELA'][$res['ACETABELA']]['ALTERACAO'] = $res['ACEALTERACAO'];
                $_SESSION['SA_ACESSOS']['TABELA'][$res['ACETABELA']]['EXCLUSAO'] = $res['ACEEXCLUSAO'];
				$_SESSION['SA_ACESSOS']['TABELA'][$res['ACETABELA']]['EXPORTAR'] = $res['ACEEXPORTAR'];
            }
			// busca as empresas que podem ser acessada
			$sql2 = "Select
                        UXEACESSO, EMPCODIGO
                    From
                        USUARIOSXEMPRESAUSUARIA
                    Where UXEACESSO = 'S'
                     and USUCODIGO = ".$vIUsuCodigo;

            $RS_MAIN2 = sql_executa(vGBancoSite, $vConexao, $sql2);
			$i = 0; $vITemp = '';
            while($reg_RS2 = sql_retorno_lista($RS_MAIN2)) {
				$i++;
				if ($i == 1)
					$vITemp .= $reg_RS2['EMPCODIGO'];
				else
					$vITemp .= ",".$reg_RS2['EMPCODIGO'];
            }
			if ($vITemp == '') {
				$_SESSION['SA_EMPRESAS'] = 1;
				$_SESSION['SI_QTDEEMPRESAS'] = 1;
			} else {
				$_SESSION['SA_EMPRESAS'] = $vITemp;
				$_SESSION['SI_QTDEEMPRESAS'] = $i;
			}

        print_r("<pre>");
          print_r($_SESSION['SA_ACESSOS']);
          print_r("</pre>");*/

            header("location: interface/main.php");
        } else {
            echo "<script> alert('Senha inv\xE1lida!'); </script>";
            echo "<script> document.location.href='login.php'; </script>";
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo vSTituloSite; ?></title>
<link href="css/style_extranet_tabela.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" >
	function validarForm(){
		if(!document.getElementById("txtLogin").value){
			alert("Login n\xe3o informado!");
			document.getElementById("txtLogin").focus();
			return false;
		}
		if(!document.getElementById("txtSenha").value){
			alert("Senha n\xe3o informada!");
			document.getElementById("txtSenha").focus();
			return false;
		}
		document.forms[0].submit();
	}
</script>
</head>

<body>
<div id="wrap">
<div id="logodpm"><img src="imagens/logo_dpm_educacao.jpg" width="1003" height="255" /></div>
<div id="subsidiarias"></div>

<div id="formulario">
	<form action="#" method="post"  name="form2">
  <table width="1004" height="171" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="45%" height="75">&nbsp;</td>
      <td width="55%">&nbsp;</td>
      </tr>
    <tr>
      <td height="25px" align="right">Usuario:</td>
      <td><div align="left">
        <input name="txtLogin" type="text" id="txtLogin" size="20" maxlength="30">
      </div></td>
      </tr>
    <tr>
      <td height="25" align="right">Senha:</td>
      <td><div align="left">
        <input name="txtSenha" id="txtSenha" type="password" size="20" maxlength="10">
      </div></td>
    </tr>
    <tr>
      <td colspan="2">               <!-- <a href="lembrete.php"><span  class="titulo">Esqueceu sua senha?</a>-->


              <div id="bt_entrar"><a href="#" onClick="validarForm()">
               <input type="image" src="imagens/bt_entrar.jpg"  border="0">
              </a></div>
 </form></td>
      </tr>
  </table>
</div>
<div id="footer"><img src="imagens/extranet.png" /></div>
</div>
</body>
</html>
