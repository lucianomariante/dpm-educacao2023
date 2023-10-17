<?php
	/*************************************************
		Arquivo de funções gerais usadas pelo sistema
	***************************************************/

	function AdicionarZero($valor, $Qtde, $string = 0){

			for($i=strlen($valor); $i<$Qtde; $i++){
				$valor=$string.$valor;
			}
			return $valor;
	}


/**************  Funções relacionadas a formatar dados  ****************/

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data e hora do banco no formato brasileiro
		$pData: parâmetro data do banco
	***************************************************/
	function formatar_data_hora($pData){
		if(empty($pData) or $pData=="//") return "";
		$data = substr($pData,0,10);

		 $datatrans = explode ("-", $data);
		 return "$datatrans[2]/$datatrans[1]/$datatrans[0] ".substr($pData,10,6);
	}

	function formatar_data_banco_edicao($pData){
  	  $pData = substr($pData,0,10);
	  $datatrans = explode ("-", $pData);
	  return "$datatrans[2]/$datatrans[1]/$datatrans[0] ";//.substr($pData,10,6);
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data e hora do banco no formato brasileiro
		$pData: parâmetro data do banco
	***************************************************/
	function formatar_data($pData){
		if(empty($pData) or $pData=="//") return "";
		$data = substr($pData,0,10);

		 $datatrans = explode ("-", $data);
		 return "$datatrans[2]/$datatrans[1]/$datatrans[0] ";
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data formato brasileiro para formato do banco
		$pData: parâmetro data formato brasileiro
	***************************************************/
	function formatar_data_banco($pData){
		return date("Y-m-d",strtotime(str_replace('/', '-', $pData)));
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CNPJ
		$pCNPJ: parâmetro CNPJ
	***************************************************/
	function formatar_cnpj($pCNPJ){
		return substr($pCNPJ,0,2).".".substr($pCNPJ,2,3).".".substr($pCNPJ,5,3)."/".substr($pCNPJ,8,4)."-".substr($pCNPJ,12,2);
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CPF
		$pCPF: parâmetro CPF
	***************************************************/
	function formatar_cpf($pCPF){
		return substr($pCPF,0,3).".".substr($pCPF,3,3).".".substr($pCPF,6,3)."-".substr($pCPF,9,4);
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar Telefone
		$pFone: parâmetro telefone
	***************************************************/
	function formatar_fone($pFone){
		return substr($pFone,0,2)."-".substr($pFone,2);
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar Valor Monetário
		$pMoeda: parâmetro Moeda
		$pSimbolo: parâmetro mostrar simbolo - default Sim
	***************************************************/
	function formatar_moeda($pMoeda, $pSimbolo = True){
		if ($pSimbolo)
			return "R$ ".number_format($pMoeda,2,',','.');
		else
			return number_format($pMoeda,2,',','.');
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CEP
		$pCEP: parâmetro CEP
	***************************************************/
	function formatar_cep($pCEP){
		if(empty($pCEP))
			return NULL;
		return substr($pCEP,0,2).".".substr($pCEP,2,3)."-".substr($pCEP,5);
	}


/************************************************************************/

/**************  Funções relacionadas a arquivos  ****************/


	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Mostrar todos os arquivos de um diretorio
		$pDir: parâmetro diretorio desejado
		$pFormato: parâmetro formato do arquivo - default .php
	***************************************************/
	function listar_diretorio2($pDir, $pFormato = '.php') {
	   ls_recursive2($pDir);
	   $dir_array = ls_recursive($pDir, $pFormato);
	   return $dir_array;
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Percorrer todos arquivos de um diretorio
		$pDir: parâmetro diretorio desejado
		$pFormato: parâmetro formato do arquivo - default .php
	***************************************************/
	function ls_recursive2($pDir, $pFormato = '.php') {
	   if (is_dir($pDir))
	   {
		   $dirhandle=opendir($pDir);
		   while(($file = readdir($dirhandle)) !== false)
		   {
			   if (($file!=".")&&($file!="..")&&(strstr($file,$pFormato))) {
				   $currentfile=$file;//'$dir."/".' ia na frente pra mostrar o diretorio
				   if (!$i) $i = 0;
				   $dir_array[$i] = $currentfile;
				   $i++;
				   if(is_dir($currentfile)) {
					   ls_recursive($currentfile);
				   }
			   }
		   }
	   }
	   return $dir_array;
	}
/************************************************************************/
  function carregarArquivos($pSArquivo){
     if(move_uploaded_file($pSArquivo['tmp_name'],$pSArquivo['name'])){
       //echo "Arquivo Carregado com sucesso!";
          }else{
             echo "Falha ao carragar o arquivo";
          }
  }

/************************************************************************/
// criptografia

	function Randomizar($iv_len) {
		$iv = '';
		while ($iv_len--> 0) {
			$iv .= chr(mt_rand() & 0xff);
		}
		return $iv;
	}

	function Encriptar($texto, $senha, $iv_len = 16){
		$texto .= "\x13";
		$n = strlen($texto);
		if ($n % 16) $texto .= str_repeat("\0", 16 - ($n % 16));
		$i = 0;
		$Enc_Texto = Randomizar($iv_len);
		$iv = substr($senha ^ $Enc_Texto, 0, 512);
		while ($i < $n) {
			$Bloco = substr($texto, $i, 16) ^ pack('H*', md5($iv));
			$Enc_Texto .= $Bloco;
			$iv = substr($Bloco . $iv, 0, 512) ^ $senha;
			$i += 16;
		}
		return base64_encode($Enc_Texto);
	}

	function Desencriptar($Enc_Texto, $senha, $iv_len = 16){
		$Enc_Texto = base64_decode($Enc_Texto);
		$n = strlen($Enc_Texto);
		$i = $iv_len;
		$texto = '';
		$iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
		while ($i < $n) {
			$Bloco = substr($Enc_Texto, $i, 16);
			$texto .= $Bloco ^ pack('H*', md5($iv));
			$iv = substr($Bloco . $iv, 0, 512) ^ $senha;
			$i += 16;
		}
		return preg_replace('/\\x13\\x00*$/', '', $texto);
	}

	function randomizarAleatorio() {
		$str = 'abcdefghijlmnopqrs1234567890';
		$misturada = str_shuffle($str);

		// Isto exibirá algo como: bfdaec
		return $misturada;
	}


	/****************************************************************************
	* Verifica Perfil do usuario
	* Data: 24/09/2010
	* Raphael Henkel Bohrer
	*
	* Retorna o campo USUPERFIL ta tabela USUARIOS
	*
	* Parametros: ( USUCODIGO )
	******************************************************************************/
	function VerificaPerfil($USUCODIGO){

		$sqlAcesso = "Select USUPERFIL From USUARIOS Where USUCODIGO = $USUCODIGO";
		//echo $sqlAcesso."<BR>";
		$vConexao = sql_conectar_banco(vGBancoDisplay);
		$RS_ACESSO = sql_executa($vConexao,$sqlAcesso,FALSE);
		while($reg_ACESSO = sql_retorno_lista($RS_ACESSO)){
				$Perfil  = $reg_ACESSO->USUPERFIL;
		}
		return $Perfil;
	}

	/*************************************************
		Data: 05/10/2010 - Pedro Godinho
		Gerador de digito para chave da tabela
		$pCodigo: parâmetro código a ser incrementado
		$pFilial: parâmetro código da filial
	***************************************************/
	function setDigito($pCodigo, $pFilial){
		$vSCodigo = $pCodigo . str_pad($pFilial, 2, "0");
		$vIPeso = 2;
		$vISoma = 0;
		for ($i=strlen($vSCodigo);$i>=1;$i--) {
			$vISoma = $vISoma + ($vSCodigo[$i] * $vIPeso);
			if ($vIPeso < 9)
				$vIPeso = $vIPeso + 1;
			else
				$vIPeso = 2;
		}
		$vISoma = ($vISoma * 10);
		$vIDigito = ($vISoma % 11) % 10;
		return $vSCodigo.$vIDigito;
	}


	function verificarVazio($value) {
		if (is_array($value)) {
			if (sizeof($value) > 0)
				return true;
			else
				return false;
		} else {
			if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0))
				return true;
			else
				return false;
		}
	}


	function validar_cpf($pCPF) {

		$cpf = str_replace('.', '', $pCPF);
        $cpf = str_replace('-', '', $cpf);

		// verifica se e numerico
		if(!is_numeric($cpf)) {
			return false;
		}

		// verifica se esta usando a repeticao de um numero
		if( ($cpf == '11111111111') || ($cpf == '22222222222')
			 || ($cpf == '33333333333') || ($cpf == '44444444444')
			 || ($cpf == '55555555555') || ($cpf == '66666666666')
			 || ($cpf == '77777777777') || ($cpf == '88888888888')
			 || ($cpf == '99999999999') || ($cpf == '00000000000') ) {
			return false;
		}

		//PEGA O DIGITO VERIFICADOR
		$dv_informado = substr($cpf, 9,2);

		for($i=0; $i<=8; $i++) {
			$digito[$i] = substr($cpf, $i,1);
		}

		//CALCULA O VALOR DO 10o DIGITO DE VERIFICACAO
		$posicao = 10;
		$soma = 0;

		for($i=0; $i<=8; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}

		$digito[9] = $soma % 11;

		if($digito[9] < 2) {
			$digito[9] = 0;
		} else {
			$digito[9] = 11 - $digito[9];
		}

		//CALCULA O VALOR DO 11o DIGITO DE VERIFICACAO
		$posicao = 11;
		$soma = 0;

		for ($i=0; $i<=9; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}

		$digito[10] = $soma % 11;

		if ($digito[10] < 2) {
			$digito[10] = 0;
		}
		else {
			$digito[10] = 11 - $digito[10];
		}

		//VERIFICA SE O DV CALCULADO E IGUAL AO INFORMADO
		$dv = $digito[9] * 10 + $digito[10];
		if ($dv != $dv_informado) {
			return false;
		}

		return true;
	}

	/*************************************************
		Data: 08/05/2011 - Pedro Godinho
		Adicionar Caracter a esquerda
		$pValor: parâmetro valor a ser inserido caracteres
		$pQtde : parâmetro quantidade de caracteres a inserir
		$pString : parâmetro string padrão 0 a ser inserida
	***************************************************/
	function adicionarCaracterLeft($pValor, $pQtde, $pString = 0){
		for($i=strlen($pValor); $i<$pQtde; $i++){
			$pValor = $pString.$pValor;
		}
		return $pValor;
	}

	/*************************************************
		Data: 08/05/2011 - Pedro Godinho
		Adicionar Caracter a direita
		$pValor: parâmetro valor a ser inserido caracteres
		$pQtde : parâmetro quantidade de caracteres a inserir
		$pString : parâmetro string padrão 0 a ser inserida
	***************************************************/
	function adicionarCaracterRight($pValor, $pQtde, $pString = 0){
		for($i=strlen($pValor); $i<$pQtde; $i++){
			$pValor=$pValor.$pString;
		}
		return $pValor;
	}

	/*************************************************
		Data: 18/07/2011 - Pedro Godinho
		Calcular Impostos
		$pSTipo : parâmetro tipo do imposto
		$pValor: parâmetro valor a ser calculado
	***************************************************/
	function calcularImposto($pSTipo, $pValor){
		if ($pSTipo == 'IR')
			return number_format(($pValor * 0.048), 2, ".", "");
		else if ($pSTipo == 'INSS')
			return number_format(($pValor * 0.11), 2, ".", "");
		else if ($pSTipo == 'ISS')
			return number_format(($pValor * 0.05), 2, ".", "");
		else if ($pSTipo == 'PIS')
			return number_format(($pValor * 0.0065), 2, ".", "");
		else if ($pSTipo == 'COFINS')
			return number_format(($pValor * 0.03), 2, ".", "");
		else if ($pSTipo == 'CS')
			return number_format(($pValor * 0.01), 2, ".", "");
		else
			return 0;
	}

	/*************************************************
		Data: 22/07/2011 - Pedro Godinho
		Pegar dia da Semana atraves de uma data
		$pData : parâmetro data
	***************************************************/
    function diaSemana($pData){
		$pAno = substr("$pData", 0, 4);
		$pMes = substr("$pData", 5, -3);
		$pDia = substr("$pData", 8, 9);
		$pDiaSemana = date("w",mktime(0,0,0,$pMes,$pDia,$pAno));
		return($pDiaSemana);
	}
	/*************************************************
		Data: 22/07/2011 - Pedro Godinho
		Pegar primeira terca do mes
		$pMes : parâmetro data Mes
		$pAno : parâmetro data Ano
		$pSomar : parâmetro Somar no mes
	***************************************************/
    function primeiraTercaMes($pMes, $pAno, $pSomar){

		if ($pSomar > 0) {
			$pMes+= $pSomar;
			if($pMes > 12){
				$pMes = 1;
				$pAno += 1;
			}
		}

		for($i=1; $i<10; $i++){
			$pData = $pAno."-".$pMes."-0".$i;
			if(diaSemana($pData) == 2)
				return $pData;//dia da semana que é terça
		}
	}
	/*************************************************
		Data: 22/07/2011 - Pedro Godinho
		Pegar data boleto
		$pMes : parâmetro data Mes
		$pAno : parâmetro data Ano
		$pSomar : parâmetro Somar no mes
	***************************************************/
	function dataBoleto($pMes, $pAno, $pSomar){
		if ($pSomar > 0) {
			$pMes+= $pSomar;
			if($pMes > 12){
				$pMes = 1;
				$pAno += 1;
			}
		}
		return $pAno."-".$pMes."-10";
	 }

	/*************************************************
		Data: 26/07/2011 - Pedro Godinho
		Verificar CPF valido
		$pCPF : parâmetro CPF
	***************************************************/
	function valida_cpf($pCPF) {
		$cpf = str_replace('.', '', $pCPF);
		$cpf = str_replace('-', '', $cpf);
		// verifica se e numerico
		if(!is_numeric($cpf)) {
			return false;
		}
		// verifica se esta usando a repeticao de um numero
		if( ($cpf == '11111111111') || ($cpf == '22222222222')
			 || ($cpf == '33333333333') || ($cpf == '44444444444')
			 || ($cpf == '55555555555') || ($cpf == '66666666666')
			 || ($cpf == '77777777777') || ($cpf == '88888888888')
			 || ($cpf == '99999999999') || ($cpf == '00000000000') ) {
			return false;
		}
		//PEGA O DIGITO VERIFICADOR
		$dv_informado = substr($cpf, 9,2);
		for($i=0; $i<=8; $i++) {
			$digito[$i] = substr($cpf, $i,1);
		}
		//CALCULA O VALOR DO 10o DIGITO DE VERIFICACAO
		$posicao = 10;
		$soma = 0;
		for($i=0; $i<=8; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}
		$digito[9] = $soma % 11;
		if($digito[9] < 2) {
			$digito[9] = 0;
		} else {
			$digito[9] = 11 - $digito[9];
		}
		//CALCULA O VALOR DO 11o DIGITO DE VERIFICACAO
		$posicao = 11;
		$soma = 0;
		for ($i=0; $i<=9; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}
		$digito[10] = $soma % 11;
		if ($digito[10] < 2) {
			$digito[10] = 0;
		}
		else {
			$digito[10] = 11 - $digito[10];
		}
		//VERIFICA SE O DV CALCULADO E IGUAL AO INFORMADO
		$dv = $digito[9] * 10 + $digito[10];
		if ($dv != $dv_informado) {
			return false;
		}
		return true;
	}
	/*************************************************
		Data: 29/05/2011 - Pedro Godinho
		Upload de arquivo para diretório
		$pData: parâmetro data do banco
	***************************************************/
	function uploadArquivo($pArquivo, $pDiretorio, $pNomeArquivo){//faz Uploaded da imagem e retorna o nome dela
		if(file_exists($pArquivo))
			delete($pArquivo);
		move_uploaded_file($pArquivo['tmp_name'], $pDiretorio.'/'.$pNomeArquivo);
		chmod($pDiretorio.'/'.$pNomeArquivo,0777);
	}

	/***************************************************
		Data: 03/10/2011 - Pedro Godinho
		Verificar acesso tela cadastro
		$pSTabela: acesso (tabela) verificada
	 ***************************************************/
	function verificarAcessoCadastro($pSTabela, $pSMethod){
		if ($pSMethod =="update") {
			if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['ALTERACAO'] != "S") {
				echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
				return;
			}
		} else if ($pSMethod =="insert") {
			if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['INCLUSAO'] != "S") {
				echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
				return;
			}
		} else if ($pSMethod =="consultar") {
			if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['CONSULTA'] != "S") {
				echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
				return;
			}
		} else {
			echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
			return;
		}
	}

    function getSegundos($pSTempo) {
		list($vSHora,  $vSMinuto) = explode(":", $pSTempo);
		$vISegundos = ($vSHora * 3600) + ($vSMinuto * 60);
		return $vISegundos;
	}

	function segundosToHorasString($pISegundos) {
		$vIHoras = floor($pISegundos / 3600);
		$vIHorasSeg = ($vIHoras * 3600);
		$vIDifHoras = ($pISegundos - $vIHorasSeg);
		$vIMinutos = ($vIDifHoras / 60);
		$vIMinutosSeg = ($vIMinutos * 60);
		$vIDifMinutos = ($vIDifHoras - $vIMinutosSeg);
		if (strlen($vIMinutos) == 1)
			$vIMinutos = $vIMinutos.'0';
		return $vIHoras.':'.$vIMinutos;
	}

    /*
    *    function str_reduce (str $str, int $max_length [, str $append [, int $position [, bool $remove_extra_spaces ]]])
    *
    *    @return string
    *    Adriano Dias da Silva
    *    Reduz uma string sem cortar palavras ao meio. Pode-se reduzir a string pela
    *    extremidade direita (padrão da função), esquerda, ambas ou pelo centro. Por
    *    padrão, serão adicionados três pontos (...) à parte reduzida da string, mas
    *    pode-se configurar isto através do parâmetro $append.
    *    Mantenha os créditos da função.
    */
    define("STR_REDUCE_LEFT", 1);
    define("STR_REDUCE_RIGHT", 2);
    define("STR_REDUCE_CENTER", 4);
    function strReduce($str, $max_length, $append = NULL, $position = STR_REDUCE_RIGHT, $remove_extra_spaces = true) {
        if (!is_string($str)) {
            echo "<br /><strong>Warning</strong>: " . __FUNCTION__ . "() expects parameter 1 to be string.";
            return false;
        } else if (!is_int($max_length)) {
            echo "<br /><strong>Warning</strong>: " . __FUNCTION__ . "() expects parameter 2 to be integer.";
            return false;
        } else if (!is_string($append)  &&  $append !== NULL) {
            echo "<br /><strong>Warning</strong>: " . __FUNCTION__ . "() expects optional parameter 3 to be string.";
            return false;
        } else if (!is_int($position)) {
            echo "<br /><strong>Warning</strong>: " . __FUNCTION__ . "() expects optional parameter 4 to be integer.";
            return false;
        } else if (($position != STR_REDUCE_LEFT) && ($position != STR_REDUCE_RIGHT) && ($position != STR_REDUCE_CENTER) && ($position != (STR_REDUCE_LEFT | STR_REDUCE_RIGHT))) {
            echo "<br /><strong>Warning</strong>: " . __FUNCTION__ . "(): The specified parameter '" . $position . "' is invalid.";
            return false;
        }

        if ($append === NULL) {
            $append = "";
        }

        $str = html_entity_decode($str);

        if ((bool)$remove_extra_spaces) {
            $str = preg_replace("/\s+/s", " ", trim($str));
        }

        if (strlen($str) <= $max_length) {
            return htmlentities($str);
        }

        if ($position == STR_REDUCE_LEFT) {
            $str_reduced = preg_replace("/^.*?(\s.{0," . $max_length . "})$/s", "\\1", $str);

            while ((strlen($str_reduced) + strlen($append)) > $max_length) {
                $str_reduced = preg_replace("/^\s?[^\s]+(\s.*)$/s", "\\1", $str_reduced);
            }

            $str_reduced = $append . $str_reduced;
        } else if ($position == STR_REDUCE_RIGHT) {
            $str_reduced = preg_replace("/^(.{0," . $max_length . "}\s).*?$/s", "\\1", $str);

            while ((strlen($str_reduced) + strlen($append)) > $max_length) {
                $str_reduced = preg_replace("/^(.*?\s)[^\s]+\s?$/s", "\\1", $str_reduced);
            }

            $str_reduced .= $append;
        } else if ($position == (STR_REDUCE_LEFT | STR_REDUCE_RIGHT)) {
            $offset = ceil((strlen($str) - $max_length) / 2);

            $str_reduced = preg_replace("/^.{0," . $offset . "}|.{0," . $offset . "}$/s", "", $str);
            $str_reduced = preg_replace("/^[^\s]+|[^\s]+$/s", "", $str_reduced);

            while ((strlen($str_reduced) + (2 * strlen($append))) > $max_length) {
                $str_reduced = preg_replace("/^(.*?\s)[^\s]+\s?$/s", "\\1", $str_reduced);

                if ((strlen($str_reduced) + (2 * strlen($append))) > $max_length) {
                    $str_reduced = preg_replace("/^\s?[^\s]+(\s.*)$/s", "\\1", $str_reduced);
                }
            }

            $str_reduced = $append . $str_reduced . $append;
        } else if ($position == STR_REDUCE_CENTER) {
            $pattern = "/^(.{0," . floor($max_length / 2) . "}\s)|(\s.{0," . floor($max_length / 2) . "})$/s";

            preg_match_all($pattern, $str, $matches);

            $begin_chunk = $matches[0][0];
            $end_chunk   = $matches[0][1];

            while ((strlen($begin_chunk) + strlen($append) + strlen($end_chunk)) > $max_length) {
                $end_chunk = preg_replace("/^\s?[^\s]+(\s.*)$/s", "\\1", $end_chunk);

                if ((strlen($begin_chunk) + strlen($append) + strlen($end_chunk)) > $max_length) {
                    $begin_chunk = preg_replace("/^(.*?\s)[^\s]+\s?$/s", "\\1", $begin_chunk);
                }
            }

            $str_reduced = $begin_chunk . $append . $end_chunk;
        }
        return htmlentities($str_reduced);
    }
	/*************************************************
		Data: 28/12/2011 - Pedro Godinho
		Converter string em maiusculas ou minuscula sem perder os acentos
		$pString: parâmetro String
		$pSTipo: parâmetro Tipo MA (Maiusculas) - MI (Minusculas)
	***************************************************/
	function converterStringMinusculaMaiuscula($pString, $pSTipo) {
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		$string = utf8_decode($pString);
		$string = strtr($string, utf8_decode($a), $b); //substitui letras acentuadas por &quot;normais&quot;
		$string = str_replace('&quot; &quot;','&quot;&quot;',$string); // retira espaco
		$string = strtolower($string); // passa tudo para minusculo
		return utf8_encode($string);

	/*	if ($pSTipo == "MA")
			$palavra = strtr(strtoupper($pString),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
		elseif ($tp == "MI")
			$palavra = strtr(strtolower($pString),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
		return $palavra; */
	}

	function ucwords_improved($s, $e = array()) {
		setlocale(LC_CTYPE, 'pt_BR');
		return join(' ',
			array_map(
				create_function(
					'$s',
					'return (!in_array($s, ' . var_export($e, true) . ')) ? ucfirst($s) : $s;'
				),
				explode(
					' ',
					strtolower($s)
				)
			)
		);
	}

	function formatar_valor_monetario_banco($pCValor){
		$pCValor = str_replace('.', '', $pCValor);
		$pCValor = str_replace(',', '.', $pCValor);
		return $pCValor;
	}

	/*************************************************
		Data: 14/11/2011 - Pedro Godinho
		Diferença entre duas datas formato banco em dias
		$pData1: parâmetro Data Inicial
		$pData2: parâmetro Data Final
	***************************************************/
	function diferencaDatasDias($pData1, $pData2){
		$pData1 = explode("-", $pData1);
		$vData1 = mktime(0,0,0, $pData1[1], $pData1[2], $pData1[0]);
		$pData2 = explode("-", $pData2);
		$vData2 = mktime(0,0,0, $pData2[1], $pData2[2], $pData2[0]);
		//$data_atual = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$vIDias = (($vData1 - $vData2)/86400);
		$vIDias = floor($vIDias);
		return $vIDias;
	}

	/*************************************************
		Data: 14/11/2011 - Pedro Godinho
		Diferença entre duas datas formato banco em dias
		$pData1: parâmetro Data Inicial
		$pData2: parâmetro Data Final
	***************************************************/
	function diferencaDatasDiasHoras($pDataHora1, $pDataHora2){
		$vSTemp1 = explode(" ", $pDataHora1);
		$pData1 = explode("-", $vSTemp1[0]);
		$pHora1 = explode(":", $vSTemp1[1]);

		$vData1 = mktime($pHora1[0],$pHora1[1],$pHora1[2], $pData1[1], $pData1[2], $pData1[0]);
		$vSTemp2 = explode(" ", $pDataHora2);
		$pData2 = explode("-", $vSTemp2[0]);
		$pHora2 = explode(":", $vSTemp2[1]);
		$vData2 = mktime($pHora2[0],$pHora2[1],$pHora2[2], $pData2[1], $pData2[2], $pData2[0]);
		$vIDias = (($vData1 - $vData2)/86400);
		return ($vIDias*86400);
	}
	/*************************************************
		Data: 13/11/2012
		Pega o mês - numerico e converte para extenso - Português / Brasileiro.
		$pData : parâmetro referencia que por padrão é/recebe NULL;
	***************************************************/

	function mes_extenso($referencia = NULL){
	switch ($referencia){
	case 1: $mes = "Janeiro"; break;
	case 2: $mes = "Fevereiro"; break;
	case 3: $mes = "Março"; break;
	case 4: $mes = "Abril"; break;
	case 5: $mes = "Maio"; break;
	case 6: $mes = "Junho"; break;
	case 7: $mes = "Julho"; break;
	case 8: $mes = "Agosto"; break;
	case 9: $mes = "Setembro"; break;
	case 10: $mes = "Outubro"; break;
	case 11: $mes = "Novembro"; break;
	case 12: $mes = "Dezembro"; break;
	default: $mes = " _______________ ";
	}
	return $mes;
	}


	function desc_mes($aux){
		$meses = array(
			'01' => "Janeiro", '1' => "Janeiro",
			'02' => "Fevereiro", '2' => "Fevereiro",
			'03' => "Mar&ccedil;o", '3' => "Mar&ccedil;o",
			'04' => "Abril", '4' => "Abril",
			'05' => "Maio", '5' => "Maio",
			'06' => "Junho", '6' => "Junho",
			'07' => "Julho", '7' => "Julho",
			'08' => "Agosto", '8' => "Agosto",
			'09' => "Setembro", '9' => "Setembro",
			'10' => "Outubro", '11' => "Novembro",
			'12' => "Dezembro"
		);
		return $meses[$aux];
	}

	function Uploaded($Arquivo, $pDiretorio, $pNomeArquivo){//faz Uploaded da imagem e retorna o nome dela
     move_uploaded_file($Arquivo['tmp_name'], $pDiretorio.'/'.$pNomeArquivo);
  	 chmod($pDiretorio.'/'.$pNomeArquivo,0777);
   }
	function valida_CNPJ($cnpj){
		$cnpj = str_pad(ereg_replace('[^0-9]', '', $cnpj), 14, '0', STR_PAD_LEFT);
		if (strlen($cnpj) != 14) {
			return false;
		} else {
			for ($t = 12; $t < 14; $t++) {
				for ($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++) {
					$d += $cnpj{$c} * $p;
					$p   = ($p < 3) ? 9 : --$p;
				}

				$d = ((10 * $d) % 11) % 10;

				if ($cnpj{$c} != $d) {
					return false;
				}
			}

			return true;
		}
	}

	function removerAcentos($s){
		$vAAcentos = array('À','Á','Ã','Â','à','á','ã','â','Ê','É','Í','í','Ó','Õ','Ô','ó','õ','ô','Ú','Ü','Ç','ç','é','ê','ú','ü','çã','çõ');
		$vARemovAcentos = array('a','a','a','a','a','a','a','a','e','e','i','i','o','o','o','o','o','o','u','u','c','c','e','e','u','u','ca','co');
		return str_replace($vAAcentos, $vARemovAcentos, $s);
	}

	function replaceTextAmarelo($vSTexto, $vSTextoAmarelo, $pSFormaDados, $pILengthStringRetorno){
		$vATextoAmarelo = explode(" ", $vSTextoAmarelo);
		$vAAcentos = array('À','Á','Ã','Â','à','á','ã','â','Ê','É','Í','í','Ó','Õ','Ô','ó','õ','ô','Ú','Ü','Ç','ç','é','ê','ú','ü','çã','çõ');

		foreach($vATextoAmarelo as $key => $value){
			if(strlen($value) < 3)
				unset($vATextoAmarelo[$key]);
		}
		foreach($vATextoAmarelo as $keyOne => $value) {
			foreach($vAAcentos as $key => $value2){
				//echo substr_count($value, removerAcentos($value2)); echo ("<br />");
				if((preg_match('/'.removerAcentos($value2).'/', $value)) && (substr_count($value, removerAcentos($value2)) >= 1)){
					$letras = str_split($value);
					//var_dump($letras);
					foreach($letras as $key3 => $value3){
						if($value3 == removerAcentos($value2)){
							$valueAux = substr_replace($value, $value2, substr($value, $key3));
							$valueAux1 = strstr($value, substr($value, $key3), true);
							$valueAux3 = strstr($value, substr($value, $key3));
							$valueAux3 = substr($valueAux3, 1);
							$valueAux = $valueAux1.$valueAux.$valueAux3;
							$vSTexto = addTagTexto($valueAux, $vSTexto);
						}
					}
				}
				//todas ocorencias
				$valueAux = str_replace(removerAcentos($value2), $value2, $value);
				$vSTexto = addTagTexto($valueAux, $vSTexto);
			}
			if($keyOne == 0)
				$vSPalavra = $value;
		}

		/*substr_replace(stringAondeTrocar, novoValor, posiçãoNaString) = Substitui o texto dentro de uma parte de uma string
		strstr(stringAondeCortar, valor) = corta a string apartir do valor informado, se parase o terceiro parametro true corta para traz
		substr(stringAondePesquisar, intDoValor) = retorna a string conforme int pasado em intDoValor
		strpos(stringAondePesquisar, valorAPesquisar) = Encontra a posição da primeira ocorrência de uma string
		strrpos(stringAondePesquisar, valorAPesquisar) = Encontra a posição da ultima ocorrência de uma string*/

		if($pSFormaDados == "S"){
			if($vSPalavra == "")
				$vSTexto = cortaString($vSTexto, $pILengthStringRetorno);
			else{
				$vITamanhoTexto = strlen($vSTexto);
				$vIPosicaoPalavra = strpos($vSTexto, $vSPalavra);
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, strtolower($vSPalavra));
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, ucwords($vSPalavra));
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, mb_strtoupper($vSPalavra));
				//echo("**".$vIPosicaoPalavra."**".$vSPalavra);
				$vITamanhoPalavra = strlen($vSPalavra);

				if($vITamanhoTexto > $pILengthStringRetorno){
					if(($vIPosicaoPalavra + $vITamanhoPalavra) > $pILengthStringRetorno){
						if(($vIPosicaoPalavra + $vITamanhoPalavra + $pILengthStringRetorno) < $vITamanhoTexto){
							$vSTexto = substr($vSTexto, ($vIPosicaoPalavra - ($pILengthStringRetorno / 2)), -($vITamanhoTexto - ($vIPosicaoPalavra + intval($pILengthStringRetorno / 2))));
							$vSTexto = "...".$vSTexto."...";//... ...
						}else
							$vSTexto = "...".substr($vSTexto, -$pILengthStringRetorno);// ... |
					}else
						$vSTexto = cortaString($vSTexto, $pILengthStringRetorno);// | ...
				}// | |
			}
		}
		$vSTexto = str_replace ('<>', '<b style="background-color:#FFF68F;">', $vSTexto);
		$vSTexto = str_replace ('</>', '</b>', $vSTexto);
		//$vSTexto = "teste";
		return $vSTexto;
	}

	function addTagTexto($valor, $lugar){
		$valorAux = strtolower($valor);
		$regex2 = '/[\<\>]'.$valorAux.'[\<\/\>]/i';
		$regex1 = '/'.$valorAux.'/';
		if((preg_match($regex1, $lugar)) && (!preg_match($regex2, $lugar))){
			$lugar = str_replace($valorAux, '<>'.$valorAux.'</>', $lugar);
			//echo ("1 ");
			//echo ($valorAux."<br />");
		}
		$valorAux = ucwords($valor);
		$regex2 = '/[\<\>]'.$valorAux.'[\<\/\>]/i';
		$regex1 = '/'.$valorAux.'/';
		if((preg_match($regex1, $lugar)) && (!preg_match($regex2, $lugar))){
			$lugar = str_replace($valorAux, '<>'.$valorAux.'</>', $lugar);
			//echo ("2 ");
			//echo ($valorAux."<br />");
		}
		$valorAux = mb_strtoupper($valor);
		$regex2 = '/[\<\>]'.$valorAux.'[\<\/\>]/i';
		$regex1 = '/'.$valorAux.'/';
		if((preg_match($regex1, $lugar)) && (!preg_match($regex2, $lugar))){
			$lugar = str_replace($valorAux, '<>'.$valorAux.'</>', $lugar);
			//echo ("3 ");
			//echo ($valorAux."<br />");
		}
		return $lugar;
	}

	function addAndSqlComposto($array, $abreviacaoTabela, $arrayCamposPesquisa, $vSSelFiltro){
		$i = 1;
		$k = 1;
		$s = "";
		$vAPalavras2 = explode(" ", $array);
		$vAPalavras = array_filter($vAPalavras2);
		foreach($vAPalavras as $key => $value){
			if(strlen($value) < 3)
				unset($vAPalavras[$key]);
		}
		if($vSSelFiltro == "qualquer"){//com qualquer uma das palavras
			$i = 1;
			$s = " and ( ";
			foreach($vAPalavras as $key => $value) {
				$j = 1;
				foreach($arrayCamposPesquisa as $key => $campo){
					if(($i == count($vAPalavras)) && ($j == count($arrayCamposPesquisa)))
						$s .= ' '.$abreviacaoTabela.$campo.' like "%'.$value.'%" ) ';
					else
						$s .= ' '.$abreviacaoTabela.$campo.' like "%'.$value.'%" OR ';
					$j++;
				}
				$i++;
			}
		}
		if($vSSelFiltro == "palavras"){//com todas as palavras
			$s = " AND ( (";
			foreach($arrayCamposPesquisa as $key => $campo){
				$i = 1;
				foreach($vAPalavras as $key2 => $value) {
					if($i < count($vAPalavras))
						$s .= " ".$abreviacaoTabela.$campo." LIKE '%".$value."%' AND ";
					else{
						$s .= " ".$abreviacaoTabela.$campo." LIKE '%".$value."%'";
						if($k < count($arrayCamposPesquisa))
							$s .= " ) OR ( ";
					}
					$i++;
				}
				$k++;
			}
			$s .= " ) ) ";
		}else if($vSSelFiltro == "expressao"){//com a expressão
			$i = 1;
			$s = " AND ( ";
			foreach($arrayCamposPesquisa as $key => $campo){
				if($i < count($arrayCamposPesquisa)){
					$s .= ' '.$abreviacaoTabela.$campo.' LIKE "%'.$array.'%" OR ';
				}else{
					$s .= ' '.$abreviacaoTabela.$campo.' LIKE "%'.$array.'%" ) ';
				}
				$i++;
			}
		}
		else if($vSSelFiltro == "sem"){//sem as palavras
			$i = 1;
			$s = " and ( ";
			foreach($vAPalavras as $key => $value) {
				$j = 1;
				foreach($arrayCamposPesquisa as $key => $campo){
					if(($i == count($vAPalavras)) && ($j == count($arrayCamposPesquisa)))
						$s .= ' '.$abreviacaoTabela.$campo.' not like "%'.$value.'%" ) ';
					else
						$s .= ' '.$abreviacaoTabela.$campo.' not like "%'.$value.'%" and ';
					$j++;
				}
				$i++;
			}
		}
		return $s;
	}

	function addAndSqlComposto2($array, $abreviacaoTabela, $arrayCamposPesquisa, $vSSelFiltro){
		$i = 1;
		$k = 1;
		$s = "";
		if( strstr($array,'"') || strstr($array,"'")){
			$array = str_replace('"', '#', $array);
			$array = str_replace("'", "#", $array);
			$vAPalavras2 = explode("#", $array);
		} else
			$vAPalavras2 = explode(" ", $array);


		$vAPalavras = array_filter($vAPalavras2);
		foreach($vAPalavras as $key => $value){
			if(strlen($value) < 3)
				unset($vAPalavras[$key]);
		}
		if($vSSelFiltro == "qualquer"){//com qualquer uma das palavras
			$i = 1;
			$s = " and ( ";
			foreach($vAPalavras as $key => $value) {
				$j = 1;
				$value = str_replace('#', '', $value);
				foreach($arrayCamposPesquisa as $key => $campo){
					if(($i == count($vAPalavras)) && ($j == count($arrayCamposPesquisa)))
						$s .= ' '.$abreviacaoTabela.$campo.' like "%'.$value.'%" ) ';
					else
						$s .= ' '.$abreviacaoTabela.$campo.' like "%'.$value.'%" OR ';
					$j++;
				}
				$i++;
			}
		}
		if($vSSelFiltro == "palavras"){//com todas as palavras
			$s = " AND ( ";
			$i = 1;
			foreach($vAPalavras as $key2 => $value) {

				$k = 1;
				$value = str_replace('#', '', $value);

				foreach($arrayCamposPesquisa as $key => $campo){
					if($k < count($arrayCamposPesquisa))
						$s .= " ".$abreviacaoTabela.$campo." LIKE '%".$value."%' OR ";
					else{
						$s .= " ".$abreviacaoTabela.$campo." LIKE '%".$value."%' ";

					if($i < count($vAPalavras))
						$s .= " ) AND ( ";



					}
					$k++;
				}
				$i++;
			}
			$s .= " )  ";
		}else if($vSSelFiltro == "expressao"){//com a expressão
			$i = 1;
			$s = " AND ( ";
			foreach($arrayCamposPesquisa as $key => $campo){
				$array = str_replace('#', '', $array);
				if($i < count($arrayCamposPesquisa)){
					$s .= ' '.$abreviacaoTabela.$campo.' LIKE "%'.$array.'%" OR ';
				}else{
					$s .= ' '.$abreviacaoTabela.$campo.' LIKE "%'.$array.'%" ) ';
				}
				$i++;
			}
		}
		else if($vSSelFiltro == "sem"){//sem as palavras
			$i = 1;
			$s = " and ( ";
			foreach($vAPalavras as $key => $value) {
				$j = 1;
				foreach($arrayCamposPesquisa as $key => $campo){
					if(($i == count($vAPalavras)) && ($j == count($arrayCamposPesquisa)))
						$s .= ' '.$abreviacaoTabela.$campo.' not like "%'.$value.'%" ) ';
					else
						$s .= ' '.$abreviacaoTabela.$campo.' not like "%'.$value.'%" and ';
					$j++;
				}
				$i++;
			}
		}
		return $s;
	}

	function replaceTextAmarelo2($vSTexto, $vSTextoAmarelo, $pSFormaDados, $pILengthStringRetorno){
		$vSTextoAmarelo = str_replace('"', '#', $vSTextoAmarelo);
		$vSTextoAmarelo = str_replace("'", "#", $vSTextoAmarelo);
		$vATextoAmarelo = explode("#", $vSTextoAmarelo);
		//$vATextoAmarelo = explode(" ", $vSTextoAmarelo);
		$vAAcentos = array('À','Á','Ã','Â','à','á','ã','â','Ê','É','Í','í','Ó','Õ','Ô','ó','õ','ô','Ú','Ü','Ç','ç','é','ê','ú','ü','çã','çõ');

		foreach($vATextoAmarelo as $key => $value){
			if(strlen($value) < 3)
				unset($vATextoAmarelo[$key]);
		}
		foreach($vATextoAmarelo as $keyOne => $value) {
			$value = str_replace('#', '', $value);

			foreach($vAAcentos as $key => $value2){
				//echo substr_count($value, removerAcentos($value2)); echo ("<br />");

				if((preg_match('/'.removerAcentos($value2).'/', $value)) && (substr_count($value, removerAcentos($value2)) >= 1)){
					$letras = str_split($value);
					//var_dump($letras);
					foreach($letras as $key3 => $value3){
						if($value3 == removerAcentos($value2)){
							$valueAux = substr_replace($value, $value2, substr($value, $key3));
							$valueAux1 = strstr($value, substr($value, $key3), true);
							$valueAux3 = strstr($value, substr($value, $key3));
							$valueAux3 = substr($valueAux3, 1);
							$valueAux = $valueAux1.$valueAux.$valueAux3;
							//echo $valueAux.'<br>';
							$vSTexto = addTagTexto($valueAux, $vSTexto);
							//echo $vSTexto.'<br>';
						}
					}
				}
				//todas ocorencias
				$valueAux = str_replace(removerAcentos($value2), $value2, $value);
				echo $valueAux.'<br>';
				$vSTexto = addTagTexto($valueAux, $vSTexto);

			}
			if($keyOne == 0)
				$vSPalavra = $value;
		}

		/*substr_replace(stringAondeTrocar, novoValor, posiçãoNaString) = Substitui o texto dentro de uma parte de uma string
		strstr(stringAondeCortar, valor) = corta a string apartir do valor informado, se parase o terceiro parametro true corta para traz
		substr(stringAondePesquisar, intDoValor) = retorna a string conforme int pasado em intDoValor
		strpos(stringAondePesquisar, valorAPesquisar) = Encontra a posição da primeira ocorrência de uma string
		strrpos(stringAondePesquisar, valorAPesquisar) = Encontra a posição da ultima ocorrência de uma string*/

		if($pSFormaDados == "S"){
			if($vSPalavra == "")
				$vSTexto = cortaString($vSTexto, $pILengthStringRetorno);
			else{
				$vITamanhoTexto = strlen($vSTexto);
				$vIPosicaoPalavra = strpos($vSTexto, $vSPalavra);
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, strtolower($vSPalavra));
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, ucwords($vSPalavra));
				if($vIPosicaoPalavra == "")
					$vIPosicaoPalavra = strpos($vSTexto, mb_strtoupper($vSPalavra));
				//echo("**".$vIPosicaoPalavra."**".$vSPalavra);
				$vITamanhoPalavra = strlen($vSPalavra);

				if($vITamanhoTexto > $pILengthStringRetorno){
					if(($vIPosicaoPalavra + $vITamanhoPalavra) > $pILengthStringRetorno){
						if(($vIPosicaoPalavra + $vITamanhoPalavra + $pILengthStringRetorno) < $vITamanhoTexto){
							$vSTexto = substr($vSTexto, ($vIPosicaoPalavra - ($pILengthStringRetorno / 2)), -($vITamanhoTexto - ($vIPosicaoPalavra + intval($pILengthStringRetorno / 2))));
							$vSTexto = "...".$vSTexto."...";//... ...
						}else
							$vSTexto = "...".substr($vSTexto, -$pILengthStringRetorno);// ... |
					}else
						$vSTexto = cortaString($vSTexto, $pILengthStringRetorno);// | ...
				}// | |
			}
		}

		$vSTexto = str_replace ('<>', '<b style="background-color:#FFF68F;">', $vSTexto);
		$vSTexto = str_replace ('</>', '</b>', $vSTexto);
		//$vSTexto = "teste";
		return $vSTexto;
	}

	function replaceTextAmareloEmenta($vSTexto, $vSTextoAmarelo){
		$vSTexto = strip_tags($vSTexto);
		if( strstr($vSTextoAmarelo,'"') || strstr($vSTextoAmarelo,"'")){
			$vSTextoAmarelo = str_replace('"', '#', $vSTextoAmarelo);
			$vSTextoAmarelo = str_replace("'", "#", $vSTextoAmarelo);
			$vATextoAmarelo = explode("#", $vSTextoAmarelo);
		} else
			$vATextoAmarelo = explode(" ", $vSTextoAmarelo);

		$vAAcentos = array('À','Á','Ã','Â','à','á','ã','â','Ê','É','Í','í','Ó','Õ','Ô','ó','õ','ô','Ú','Ü','Ç','ç','é','ê','ú','ü','çã','çõ');

		foreach($vATextoAmarelo as $key => $value){
			if(strlen($value) < 3)
				unset($vATextoAmarelo[$key]);
		}
		foreach($vATextoAmarelo as $keyOne => $value) {
			$value = str_replace('#', '', $value);
			//echo '<br>'.$value.'-----<br>';
			//$vIPosicao = stristr($vSTexto, $value);
			$vIPosicao = strpos($vSTexto, $value);
			$vSTexto = str_ireplace($value, '<b style="background-color:#FFF68F;">'.$value.'</b>', $vSTexto);

		}
		echo $vSTexto;
	}

	function replaceTextAmarelo3($vSTexto, $vSTextoAmarelo, $pSFormaDados, $pILengthStringRetorno){
		$vSTexto = strip_tags($vSTexto);
		if( strstr($vSTextoAmarelo,'"') || strstr($vSTextoAmarelo,"'")){
			$vSTextoAmarelo = str_replace('"', '#', $vSTextoAmarelo);
			$vSTextoAmarelo = str_replace("'", "#", $vSTextoAmarelo);
			$vATextoAmarelo = explode("#", $vSTextoAmarelo);
		} else
			$vATextoAmarelo = explode(" ", $vSTextoAmarelo);

		$vAAcentos = array('À','Á','Ã','Â','à','á','ã','â','Ê','É','Í','í','Ó','Õ','Ô','ó','õ','ô','Ú','Ü','Ç','ç','é','ê','ú','ü','çã','çõ');

		foreach($vATextoAmarelo as $key => $value){
			if(strlen($value) < 3)
				unset($vATextoAmarelo[$key]);
		}
		foreach($vATextoAmarelo as $keyOne => $value) {
			$value = str_replace('#', '', $value);
			$vIPosicao = stripos($vSTexto, $value);
			if ($vIPosicao != '') {
				if ($pSFormaDados == 'S') {
					if ($vIPosicao <= 50)
						$vIPosicao = $vIPosicao - 10;
					else $vIPosicao = $vIPosicao - 50;
					$vSTexto2 = substr($vSTexto, $vIPosicao, $pILengthStringRetorno);
					$vSTexto3 = explode(" ", $vSTexto2);
					$w = 0; $vSTexto4 = '';
					//echo count($vSTexto3);
					foreach($vSTexto3 as $key4 => $value4){
						$w++;
						if((count($vSTexto3) > $w) && ($w>1))
							$vSTexto4 .= $vSTexto3[$key4].' ';
					}
					if (stripos($vSTexto4, $value)) {
						$vSTexto2 = str_ireplace($value, '<b style="background-color:#FFF68F;">'.$value.'</b>', $vSTexto4);
						echo '...'.$vSTexto2.'...<br>';
					}
				} else
					$vSTexto = str_ireplace($value, '<b style="background-color:#FFF68F;">'.$value.'</b>', $vSTexto);

			}

			if($keyOne == 0)
				$vSPalavra = $value;
		}
	}

	function cortaString($String, $tamanho){
		if(strlen($String) > $tamanho)
			return substr($String, 0, $tamanho)."...";
		else
			return $String;
	}


function converterDataUsuario($pDDataNoticia) {
	$pDDataNoticia = explode ("-", $pDDataNoticia);
	// leitura das datas
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$semana = date('w');
	$hr = date(" H ");
	$vSRetorno = $pDDataNoticia[2].' de '.descricaoMes($pDDataNoticia[1]).' de '.$pDDataNoticia[0];
	return $vSRetorno;
}

function descricaoMes($pIMes){
	switch ($pIMes) {
		case 1:
			return "Janeiro";
			break;
		case 2:
			return "Fevereiro";
			break;
		case 3:
			return "Mar&ccedil;o";
			break;
		case 4:
			return "Abril";
			break;
		case 5:
			return "Maio";
			break;
		case 6:
			return "Junho";
			break;
		case 7:
			return "Julho";
			break;
		case 8:
			return "Agosto";
			break;
		case 9:
			return "Setembro";
			break;
		case 10:
			return "Outubro";
			break;
		case 11:
			return "Novembro";
			break;
		case 12:
			return "Dezembro";
			break;
	}
}

	/*************************************************
		Data: 17/10/2016 - Pedro Godinho
		Não cortar a palavra no meio
		$pSTexto: parâmetro Texto a ser cortado
		$pILimite: parâmetro Limite de corte
	***************************************************/
	function limitarTexto($pSTexto, $pILimite){
	  $contador = strlen($pSTexto);
	  if ( $contador >= $pILimite ) {
		  $pSTexto = substr($pSTexto, 0, strrpos(substr($pSTexto, 0, $pILimite), ' ')) . '...';
		  return $pSTexto;
	  }
	  else{
		return $pSTexto;
	  }
	}

function sweetAlert($pSTitulo, $pSMensagem, $pSTipoMensagem, $vSURL, $pSExibirMensagem = 'S')
{
	if ($pSExibirMensagem == 'S') {
		if ($pSTipoMensagem == 'S') { // sucesso
			$vSMsg = 'Cadastro efetuado com sucesso!';
			$vSTipoMsg = "success";
		} else if ($pSTipoMensagem == 'E') { // erro
			$vSMsg = 'Erro ao executar as atualizações!';
			$vSTipoMsg = "error";
		}
		if ($pSMensagem != '') $vSMsg = $pSMensagem;
		echo "<!DOCTYPE html>
				<html>
					<head>
						<link rel=\"stylesheet\" type=\"text/css\" href=\"../../libs/sweetalert/dist/sweetalert.css\">
						<script type=\"text/javascript\" src=\"../js/jquery-latest.js\"></script>
						<script type=\"text/javascript\" src=\"../../libs/sweetalert/dist/sweetalert.min.js\"></script>
						<script>";
						if($pSExibirMensagem == 'S')
							echo "\$(document).ready(function(){ swal({title : \"{$pSTitulo}\", text : \"{$vSMsg}\", type : \"{$vSTipoMsg}\"},function(){location.href = \"{$vSURL}\"});});";
						else
							echo "location.href = \"{$vSURL}\";";

					echo "</script>
					</head>
					<body>
					</body>
					</html>";

		die();
	}
}


	function uploadArquivoUnico($namePage, $codigo, $arquivo, $extensoesPermitidas)
	{
		try{
			if($arquivo['error'] == 0){
				$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
				$extensao = strtolower($extensao);

				if(in_array($extensao, $extensoesPermitidas)){
					$nomeArquivo = $codigo.'.'.$extensao;
					$arquivoUpload = $arquivo['tmp_name'];

					$diretorio = "uploads/{$namePage}";

					if(!is_dir($diretorio)){
						mkdir($diretorio, 0755, true);

					}else{
						chmod($diretorio, 0755);
					}
				//Verifica se o diretório foi criado
					if(is_dir($diretorio)){
					//Move a imagem para o diretório definido
						if(move_uploaded_file($arquivoUpload, $diretorio.'/'.$nomeArquivo)){
						//Retorna o nome do arquivo
							return $nomeArquivo;
						}else{
							throw new Exception("Ocorreu uma falha ao realizar o upload do arquivo");
						}
					}else{
						throw new Exception("Não foi possivel encontrar o diretório");
					}
				}else{
					throw new Exception("Tipo de arquivo não permitido! ({$extensao})");
				}
			}else{
				throw new Exception("Ocorreu uma falha ao realizar o upload do arquivo");
			}

		}catch(Exception $e){
			echo 'Ocorreu um erro: '.$e->getMessage()."\n";
			return false;
		}
	}