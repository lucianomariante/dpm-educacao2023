<?php
//Função para remover os prefixos "vS" e "vI"
function removePrefix($a)
{
	return substr($a, 2);
}

//Conexão com o banco
function conectarBanco()
{
	try {
		$db = new PDO("mysql:host=" . vGHostSite . ";dbname=" . vGBancoSite . ";charset=UTF8", vGUsername, vGPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
		return $db;
	} catch (Exception $e) {
		return $e;
	}
}

function conectarBancoDPM()
{
	try {
		$db = new PDO("mysql:host=" . vGHostSiteDPM . ";dbname=" . vGBancoSiteDPM . ";charset=UTF8", vGUsernameDPM, vGPasswordDPM);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
		return $db;
	} catch (Exception $e) {
		return $e;
	}
}

//Teste de onexão com o banco
function testarConexao()
{
	try {
		$db = new PDO("mysql:host=" . vGHostSite . ";dbname=" . vGBancoSite . ";charset=UTF8", vGUsername, vGPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
		return true;
	} catch (Exception $e) {
		return false;
	}
}

//Dunção para inserir ou alterar dados
function insertUpdate($dados)
{
	try {
		//Removendo os dados do crop, se precisar
		if (isset($dados['fields']['aspectRatioCrop'])) unset($dados['fields']['aspectRatioCrop']);

		//Definindo o tipo de caractere pelo prefixo
		foreach ($dados['fields'] as $key => $value) {
			switch (substr($key, 0, 2)) {
				case 'vI':
					$tipoFiltro = PDO::PARAM_INT;
					if ($value != '')
						$value = (int) $value;
					else
						$value = null;
					break;
				case 'vS':
					$tipoFiltro = PDO::PARAM_STR;
					if ($value != '')
						$value = (string) $value;
					else
						$value = null;
					break;
				case 'vD':
					$tipoFiltro = PDO::PARAM_STR;
					if ($value != '')
						$value = (string) formatar_data_banco($value);
					else
						$value = null;
					break;
				case 'vM':
					$tipoFiltro = PDO::PARAM_STR;
					if ($value != '')
						$value = (string) formatar_valor_monetario_banco($value);
					else
						$value = null;
					break;
				default:
					unset($dados['fields'][$key]);
					$tipoFiltro = '';
			}
			if ($tipoFiltro != '')
				$dados['fields'][$key] = array(
					'valor'  => $value,
					'filtro' => $tipoFiltro,
				);
		}


		if ($dados['debug'] == 'S') echo $sql;

		//Removendo o prefixo
		$fields = array_combine(array_map('removePrefix', array_keys($dados['fields'])), $dados['fields']);
		$tipoTransaction = 'INC';


		//Definindo os parametros
		foreach ($fields as $campo => $opcoes) {
			if ($campo != $dados['prefixo'] . 'CODIGO') {
				$campos[] = $campo;
				$params[] = ':' . strtolower($campo);
			} else {
				if ($fields[$dados['prefixo'] . 'CODIGO']['valor'] != '') {
					$tipoTransaction = 'ALT';
				}
			}
		}

		//Inserindo data e usuário de inclusão/alteração
		$campos[] = $dados['prefixo'] . 'USU_' . $tipoTransaction;
		$params[] = ':' . strtolower($dados['prefixo']) . 'usu_' . strtolower($tipoTransaction);
		$fields[$dados['prefixo'] . 'USU_' . $tipoTransaction] = array(
			'valor'  => (int) $_SESSION['SI_USUCODIGO'],
			'filtro' => PDO::PARAM_INT
		);

		//Verificando se foi informado o status, caso não, será definido com 'S'
		if (!in_array($dados['prefixo'] . 'STATUS', $campos)) {
			$campos[] = $dados['prefixo'] . 'STATUS';
			$params[] = ':' . strtolower($dados['prefixo'] . 'STATUS');
			$fields[$dados['prefixo'] . 'STATUS'] = array(
				'valor'  => 'S',
				'filtro' => PDO::PARAM_STR
			);
		}

		//Montando a query
		if ($tipoTransaction == 'ALT') {
			$sql = "UPDATE " . $dados['tabela'] . " SET ";
			if (count($campos) == count($params)) {
				foreach ($campos as $i => $campo) {
					$sql .= "$campo = {$params[$i]}, ";
				}
			} else {
				return false;
			}
			$sql .= $dados['prefixo'] . "DATA_{$tipoTransaction} = NOW() ";
			$sql .= "WHERE " . $dados['prefixo'] . "CODIGO = :" . strtolower($dados['prefixo'] . 'CODIGO');
		} else {
			if (isset($fields[$dados['prefixo'] . 'CODIGO'])) {
				unset($fields[$dados['prefixo'] . 'CODIGO']);
			}
			$sql = "INSERT INTO " . $dados['tabela'] . " (" . implode(', ', $campos) . ", " . $dados['prefixo'] . "DATA_{$tipoTransaction}) VALUES(" . implode(', ', $params) . ", NOW())";
		}
		$sql .= ';';


		//Iniciando a conexão
		$db = (!isset($dados['database'])) ? conectarBanco() : conectarBancoDPM();

		//Preparando a query
		$query = $db->prepare($sql);

		if ($dados['debug'] == 'S') echo $sql;

		//Filtrando os valores
		foreach ($fields as $field => $opcoes) {
			$query->BindValue(':' . strtolower($field), $opcoes['valor'], $opcoes['filtro']);
		}

		//Executando
		$query->Execute();

		//Retornando o Id inserido, ou modificado
		if ($tipoTransaction == 'INC')
			$vID = $db->lastInsertId();
		else
			$vID = $fields[$dados['prefixo'] . 'CODIGO']['valor'];

		if ($dados['debug'] == 'S') {
			echo 'ID = ' . $vID;
			return;
		}
		sweetAlert('', '', 'S', $dados['url'] . '?method=update&oid=' . $vID, $dados['msg']);

		//Retornando o Id inserido, ou modificado
		return $vID;
	} catch (PDOException $e) {
		if ($dados['debug'] == 'S') {
			echo $e;
			return;
		}
		sweetAlert('', '', 'E', '', $dados['msg']);
		return $e;
	}
}

//Função para trazer todos os fields de uma única tabela, quando informado o codigo
function fillUnico($dados)
{
	try {
		//Monatando a query
		$sql = "SELECT * FROM " . $dados['tabela'] . " WHERE " . $dados['prefixo'] . "CODIGO = :codigo;";

		//Iniciando a conexão
		$db = conectarBanco();

		//Preparando a query
		$query = $db->prepare($sql);

		//Filtrando os valores
		$query->BindValue(':codigo', $dados['codigo'], PDO::PARAM_INT);

		//Executando
		if ($query->Execute()) {
			//Retornando os dados
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		}

		return false;
	} catch (Exception $e) {
		return $e;
	}
}


//Função para consultas compostas
function consultaComposta($dados)
{
	try {
		$sql = !is_array($dados) ? trim($dados) : trim($dados['query']);

		//Iniciando a conexão
		$db = conectarBanco();

		//Preparando a query
		$query = $db->prepare($sql);

		//Filtrando os valores
		if (isset($dados['parametros']) && !empty($dados['parametros']))
			foreach ($dados['parametros'] as $i => $parametro) {
				$query->BindValue($i + 1, $parametro[0], $parametro[1]);
			}

		//Executando
		if ($query->Execute()) {
			//Retornando os dados
			$dados = ($query->rowCount() > 0 && (strpos($sql, 'DELETE') ===  false)) ? $query->fetchall(PDO::FETCH_ASSOC) : array();
			return array(
				'quantidadeRegistros' => $query->rowCount(),
				'dados'               => $dados
			);
		}
	} catch (Exception $e) {
		return $e;
	}
}

//Função para "DELETAR" registros
function deletarRegistro($dados)
{
	$sql = "UPDATE " . $dados['tabela'] . " SET " . $dados['prefixo'] . "STATUS = 'N', " . $dados['prefixo'] . "USU_ALT = :usuario, " . $dados['prefixo'] . "DATA_ALT = NOW() WHERE " . $dados['prefixo'] . "CODIGO = :codigo;";
	//Iniciando a conexão
	$db = conectarBanco();

	//Preparando a query
	$query = $db->prepare($sql);

	//Filtrando os valores
	$query->BindValue(':codigo', $dados['codigo'], PDO::PARAM_INT);
	$query->BindValue(':usuario', $_SESSION['SI_USUCODIGO'], PDO::PARAM_INT);

	//Executando
	if ($query->Execute()) {
		return true;
	}

	return false;
}

//Função para ordenar e limitar as consultas das grids
function limitDataTables($ordemColunas, $dados)
{
	$sql = $ordemColunas[$dados['order'][0]['column']] . ' ' . strtoupper($dados['order'][0]['dir']) . ' ';
	if ($dados['length'] > 0)
		$sql .= "LIMIT " . $dados['start'] . ', ' . $dados['length'];
	return $sql;
}

//Função para contar os registros ativos
function countRegistros($tabela, $prefixo)
{
	try {
		$sql = "SELECT count({$prefixo}CODIGO) AS qtd FROM {$tabela} WHERE {$prefixo}STATUS = 'S'";

		//Iniciando a conexão
		$db = conectarBanco();

		//Preparando a query
		$query = $db->prepare($sql);

		//Executando
		if ($query->Execute()) {
			$result = $query->fetch(PDO::FETCH_ASSOC);
			return $result['qtd'];
		}
	} catch (Exception $e) {
		return $e;
	}
}

//Função para criar tabelas no banco de dados
function createTables($sql)
{
	try {
		//Iniciando a conexão
		$db = conectarBanco();

		//Executando a query
		return $db->exec($sql);
	} catch (Exception $e) {
		return $e;
	}
}

function consultaCompostaDPM($dados)
{
	try {
		$sql = !is_array($dados) ? trim($dados) : trim($dados['query']);

		//Iniciando a conexão
		$db = conectarBancoDPM();

		//Preparando a query
		$query = $db->prepare($sql);

		//Filtrando os valores
		if (isset($dados['parametros']) && !empty($dados['parametros']))
			foreach ($dados['parametros'] as $i => $parametro) {
				$query->BindValue($i + 1, $parametro[0], $parametro[1]);
			}

		//Executando
		if ($query->Execute()) {
			//Retornando os dados
			$dados = ($query->rowCount() > 0 && (strpos($sql, 'DELETE') ===  false)) ? $query->fetchall(PDO::FETCH_ASSOC) : array();
			return array(
				'quantidadeRegistros' => $query->rowCount(),
				'dados'               => $dados
			);
		}
	} catch (Exception $e) {
		return $e;
	}
}