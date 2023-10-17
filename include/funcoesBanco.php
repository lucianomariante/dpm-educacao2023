<?php
	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Conectar banco de dados conforme parametros
		$pBanco: caminho do banco de dados
		$pUserName: usuário do banco de dados
		$pSenha: senha do banco de dados
	***************************************************/
	function sql_conectar_banco()
	{
		$conexao = mysqli_connect(vGHostSite, vGUsername, vGPassword) or die(mysql.error());
		mysqli_set_charset($conexao, "utf8");
		return $conexao;
	}

	/*************************************************
		Data: 27/01/2011 - Pedro Godinho
		Conectar banco de dados DPM conforme parametros
		$pBanco: caminho do banco de dados
		$pUserName: usuário do banco de dados
		$pSenha: senha do banco de dados
	***************************************************/
	function sql_conectar_bancoDPM()
	{
		$conexao = mysqli_connect(vGHostSiteDPM, vGUsernameDPM, vGPasswordDPM) or die(mysql.error());
        mysqli_set_charset($conexao, "utf8");
        return $conexao;
	}
	/*************************************************
		Data: 27/01/2011 - Pedro Godinho
		Conectar banco de dados DPM conforme parametros
		$pBanco: caminho do banco de dados
		$pUserName: usuário do banco de dados
		$pSenha: senha do banco de dados
	***************************************************/
	function sql_conectar_bancoDPMNovo()
	{
		$conexao = mysql_connect(vGHostSiteDPMNovo, vGUsernameDPMNovo, vGPasswordDPMNovo) or die(mysql.error());
		return $conexao;
	}
	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Fechar conexao banco de dados conforme conexao
		$pConexao: conexao do banco de dados
	***************************************************/
	function sql_fechar_conexao_banco($pConexao)
	{
		if (empty($pConexao)) {
			return "";
		}
		mysqli_close($pConexao);
	}
	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Executar comando sql no banco conforme conexao
		$pConexao: conexao com banco de dados
		$pSql: sql a ser executado no banco
	***************************************************/
	function sql_executa($pBanco, $pConexao, $pSql)
	{
		if(empty($pConexao) or empty($pSql)) {
            return "";
		}
        mysqli_select_db($pConexao, $pBanco);
        $aux = mysqli_query($pConexao, $pSql);
        if(!$aux){
            echo "********* ERRO *********<BR>";
            echo "SQL = ".nl2br($pSql)."<BR><BR>";
            echo mysqli_error ($pConexao);
            echo "<BR>*****<BR>";
            return 0;
        }
        return $aux;
	}
	/***************************************************
		Data: 22/10/2009 - Pedro Godinho
		Verificar número de linhas retornadas se um sql
		$pSql: sql executado no banco
	 ***************************************************/
	function sql_record_count($pSql)
	{
		if (empty($pSql)) {
			return 0;
		}
		return mysqli_num_rows($pSql);
	}
	/***************************************************
		Data: 22/10/2009 - Pedro Godinho
		Retornar resultado de um sql
		$pConexao: conexao com banco de dados
		$pTipo: parâmetro da procedure
	 ***************************************************/
	function sql_retorno_lista($pSql){
  		if (empty($pSql)) {
  			return "";
  		}
        return mysqli_fetch_array($pSql, MYSQLI_ASSOC);
	}
	/***************************************************
		Data: 28/10/2009 - Marcio Juppes
		Montar string Insert campos e valores
		$pCampo: array de campos do banco de dados
		$pValor: array de valores do banco de dados
		$pTabela: tabela a ser inserida banco
	 ***************************************************/
	function montaSqlCamposInsert($pCampo,$pValor,$pTabela){
		$vSString1 = "";
		for($i = 0; $i < count($pCampo); $i++){
			if($i == (count($pCampo)-1)){
				$vSString1.= $pCampo[$i];
			}else{
				$vSString1.= $pCampo[$i].",";
			}
		}
		$vSString2 = "";
		for($i = 0; $i < count($pValor); $i++){
			if($i == (count($pValor)-1)){
				$vSString2.= $pValor[$i];
			}else{
				$vSString2.= $pValor[$i].",";
			}
		}
		$sql = "Insert into ".$pTabela." (".$vSString1.") Values (".$vSString2.")";
		return $sql;
	}
	/***************************************************
		Data: 28/10/2009 - Marcio Juppes
		Montar string Insert campos e valores
		$pCampo: array de campos do banco de dados
		$pValor: array de valores do banco de dados
		$pTabela: tabela a ser inserida banco
	 ***************************************************/
	function montaSqlCamposUpdate($pCampo,$pValor,$pTabela,$pClausula){
		$vSString1 = "";
		for($i = 0; $i < count($pCampo); $i++){
			if($i == (count($pCampo)-1)){
				$vSString1.= $pCampo[$i]." = ".$pValor[$i]."";
			}else{
				$vSString1.= $pCampo[$i]." = ".$pValor[$i].", ";
			}
		}
	  $sql = "Update  ".$pTabela." set ".$vSString1." where ".$pClausula;
	  return $sql;
	}

    function montaSqlCamposDelete($pTabela,$pClausula){
        $sql = "Delete from ".$pTabela." where ".$pClausula;
        return $sql;
    }

	/***************************************************
		Data: 17/06/2011 - Pedro Godinho
		Verificar acesso conforme tabela
		$pIUsuario: usuario logado
		$pSTabela: acesso (tabela) verificada
	 ***************************************************/
	function verificarAcesso($pIUsuario, $pSTabela){
		$sqlAcesso = "Select ACECONSULTA, ACEINCLUSAO, ACEALTERACAO, ACEEXCLUSAO
						From ACESSOS
						Where USUCODIGO = ".$pIUsuario."
						and ACETABELA = '".$pSTabela."'";
		$vConexaoT = sql_conectar_banco();
		$RS_ACESSO = sql_executa(vGBancoSite, $vConexaoT,$sqlAcesso,FALSE);
		while($reg_acesso = sql_retorno_lista($RS_ACESSO)){
			$vSConsulta = $reg_acesso['ACECONSULTA'];
			$vSInclusao = $reg_acesso['ACEINCLUSAO'];
			$vSAlteracao = $reg_acesso['ACEALTERACAO'];
			$vSExclusao = $reg_acesso['ACEEXCLUSAO'];
		}
		sql_fechar_conexao_banco($vConexaoT);
		return array($vSConsulta,$vSInclusao,$vSAlteracao,$vSExclusao);
	}

	/***************************************************
		Data: 11/01/2012 - Pedro Godinho
		Buscar Nome do Cliente
		$pIOidCliente: oid do cliente
	 ***************************************************/
	function buscarNomeCliente($pIOidCliente){
		$SqlCliente = "Select Cliente
						From Contratos
						where Codigo = ".$pIOidCliente;
		$vConexaoDPM = sql_conectar_bancoDPM();
		$RS_Cliente = sql_executa(vGBancoSiteDPM, $vConexaoDPM,$SqlCliente);
		while($reg_Cliente = sql_retorno_lista($RS_Cliente)){
			$pSRazaoSocial = $reg_Cliente['Cliente'];
			$pSRazaoSocial = str_replace('"', '\"', $pSRazaoSocial);
			$pSRazaoSocial = str_replace("'", "\'", $pSRazaoSocial);
		}

		sql_fechar_conexao_banco($vConexaoDPM);
		return $pSRazaoSocial;
	}

function verificarInadimplentes($pICLICODIGO)
{
	$vITOTAL = 0;
	$Sql = "SELECT
				DATEDIFF(CURDATE( ), c.COBDATAVENCIMENTO) AS DIFERENCA
			FROM
				COBRANCA c
			WHERE
				c.COBSTATUS = 'S'
			AND
				(c.COBCANCELADA IS NULL AND COBSTATUSRECEITA <> 'Cancelada')
			AND
				c.COBDATAIMPRESSAONF IS NOT NULL
			AND
				c.COBFINALIZADA = 'Sim'
			AND
				c.COBDATAVENCIMENTO <= CURDATE()
			AND
				c.COBDDATAPAGAMENTO IS NULL
			AND
				c.COBFORMAPAGAMENTO = 'Boleto Bancário'
			AND
				c.CLICODIGO <> 311
			AND
				c.CLICODIGO = ".$pICLICODIGO;

	$vConexaoDPM = sql_conectar_banco();
	$RS_MAIN = sql_executa(vGBancoSite, $vConexaoDPM,$Sql);

	while($reg_RS = sql_retorno_lista($RS_MAIN)){
		if ($reg_RS['DIFERENCA'] > 30)
			$vITOTAL++;
	}
	return ($vITOTAL > 0) ? true : false;
}

function verificarInadimplentesNovo($pICLICODIGO)
{
	$qry_base2 = "SELECT 
			c.CLICODIGO
			FROM 
			COBRANCA c 
			WHERE c.COBSTATUS = 'S' 
			AND (c.COBCANCELADA is null and COBSTATUSRECEITA <> 'Cancelada')
			AND c.COBDATAIMPRESSAONF is not null
			AND c.COBFINALIZADA = 'Sim' 
			AND c.COBDATAVENCIMENTO <= CURDATE()
			AND c.COBDDATAPAGAMENTO is null
			AND c.COBFORMAPAGAMENTO = 'B'
			AND (c.COBSTATUSRECEITA = 'Aprovada' or c.COBSTATUSRECEITA = 'Aprovada/Substituida') 
			AND c.CLICODIGO <> 311
			AND c.CLICODIGO = ? 
			AND DATEDIFF(CURDATE(), c.COBDATAVENCIMENTO) > 30 "; 
	$query2 = array();
	$query2['query']      = $qry_base2;
	$query2['parametros'] = array();				
	$query2['parametros'] = array(
		array($pICLICODIGO, PDO::PARAM_INT),
	);
	$data2 = consultaComposta($query2);
	if ($data2['quantidadeRegistros'] > 0)
		$vSInadimplente = 'S';
	else 
		$vSInadimplente = 'N';
	return $vSInadimplente;
}		