<?php
    define("vGUsernameDPMEduc", "dpmeducacao");
	define("vGPasswordDPMEduc", "VN94KSXF");
	define("vGBancoSiteDPMEduc", "dpmeducacao");
	define("vGHostSiteDPMEduc", "mysql.dpmeducacao.com.br");


function conectarBancoDPMEduc()
{
	try {
		$db = new PDO("mysql:host=" . vGHostSiteDPMEduc . ";dbname=" . vGBancoSiteDPMEduc . ";charset=UTF8", vGUsernameDPMEduc, vGPasswordDPMEduc);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
		return $db;
	} catch (Exception $e) {
		return $e;
	}
}

//Função para consultas compostas
function consultaCompostaDPMEduc($dados)
{
	try {
		$sql = !is_array($dados) ? trim($dados) : trim($dados['query']);

		//Iniciando a conexão
		$db = conectarBancoDPMEduc();

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


  $SqlCur = "
  SELECT
    c.CURDATAINICIO AS INICIO,
    c.CURDATAFIM AS FIM,
    c.CURDATA_INC,
    c.CURCODIGO,
    c.CURCURSO,
    t.CIDDESCRICAO,
    c.CURTITULOSITE,
    c.CURRESUMOSITE,
    c.CURIMAGEM,
    t2.TABDESCRICAO as modalidade,
    t2.TABCOR as cormodalidade, 
    c.CURINSTRUTOR
  FROM
    CURSOS c
  LEFT JOIN
    CIDADES t ON t.CIDCODIGOIBGE = c.CIDCODIGO
   LEFT JOIN 
    TABELAS t2  ON 
    t2.TABCODIGO = c.CURMODALIDADE    
  WHERE
    c.CURDATAINICIO >= DATE(NOW())
    AND c.CURSTATUS = 'S'  AND c.CURPOSICAO = 'S'	
    AND c.EMPCODIGO = 1
    ORDER BY c.CURDATAINICIO , c.CURCODIGO
  LIMIT 0, 10";

   $arrayQuery = array(
		'query' => $SqlCur,
		'parametros' => array()
	);
  $result = consultaCompostaDPMEduc($arrayQuery);
  foreach ($result['dados'] as $rows) {

    $codCur             = $rows['CURCODIGO'];
    $tipoCur            = $rows['CURCURSO'];
    // $textoCur           = nl2br(substr($rows['CURRESUMOSITE'], 0, 400));
    $tituloCur          = $rows['CURTITULOSITE'];
    $tituloInst          = $rows['CURINSTRUTOR'];
     $viinicial = $rows[ 'inicial' ];
	  $vifinal = $rows[ 'final' ];   
    $dataIni            = $rows['INICIO'];
    $dataIni            = strtotime($dataIni);
    $dia                = strftime('%d', $dataIni);
    $mes                = ucfirst(strftime('%b', $dataIni));
    $dataIni            = ucfirst(strftime('%d/%m/%Y', $dataIni));

    $dataFim            = $rows['FIM'];
    $dataFim            = strtotime($dataFim);
    $dia                = strftime('%d', $dataFim);
    $mes                = ucfirst(strftime('%b', $dataFim));
    $dataFim            = ucfirst(strftime('%d/%m/%Y', $dataFim));
    $modalidade =  $rows['modalidade'];
                  if ($modalidade == 'EAD')
                  $cidadeCur = 'Transmissão on-line ';
                  else
                  $cidadeCur = ' ' .$rows[ 'CIDDESCRICAO' ];
  ?>



          

            
              <div class="fixed-right-modal-item mt-30" style="padding: 0px 5px 0 0">
                  <div>
                    <div><span class="curso-ead" span style="background-color:<?= $rows['cormodalidade']; ?>;"><?= $rows['modalidade']; ?></span>
                        
        
                     <h4 class="fixed-right-modal-title pb-12">
                        <div class="fixed-right-course-creator" style="font-size:13px;line-height: 15px !important;margin-top: 8px"><a href="cursos/<?= $rows['CURCODIGO']; ?>"><?= $tituloCur ?></a></div>
                      </h4>

                  </div>
                      
    
                        <div class="row">
                          

                            <div class="col-md-12 d-flex" style="font-size: 12px; color: #166db1; font-weight: 500; padding: 5px 15px">
                                    <span><?= $tituloInst  ?></span>
                                </div>
                                <div class="" style="padding: 0 5px 0 15px">
                                 <span class="fixed-right-modal-data"><?= $dataIni ?></span>
                                </div>

                                <div class="" style="padding: 0 15px 0 0px">
                                <span class="fixed-right-modal-data">e <?= $dataFim ?></span>
                                </div>

                         </div>
                  </div>
                </div>


            




    



  <?php
  } ?>