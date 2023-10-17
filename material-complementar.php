<?php include('include/constantes.php');

	$paginaLink = "cursos-realizados";
	include('header.php');

	if ((!isset($_SESSION['SI_ALUNO_USUCODIGO'])) || ($_SESSION['SS_SECURITY'] != '35qFZFUA')) {
		echo "<script language='javaScript'>window.location.href='login.php'</script>";
		return;
	}

	$Sql = "SELECT
                MXCCODIGO,
                MXCNOME,
                MXCCAMINHO,
				CURCODIGO,
                date_format(MXCDATA_INC, '%d/%m/%Y') AS DataInc,
                date_format(MXCDATA_INC, '%H:%i:%s') AS HoraInc
            FROM MATERIALXCURSO
            WHERE
                MXCSTATUS = 'S'
			and CURCODIGO = ".$_GET['oid'];
	$vConexao = sql_conectar_banco();
	$RS_POST = sql_executa(vGBancoSite, $vConexao,$Sql,FALSE);


	$Sql2 = " Select CURCURSO
			From CURSOS
			Where CURCODIGO = ".$_GET['oid'];
	$RS_POST2 = sql_executa(vGBancoSite, $vConexao,$Sql2,FALSE);
	$reg_post2 = sql_retorno_lista($RS_POST2);
?>
	<section class="section-standard-grey">
		<div class="container">
			<?php include('header-logado.php') ?>

			<h2 class="title-page fadeIn wow" data-wow-delay="1s"><i class="fa fa-files-o" aria-hidden="true"></i> Material complementar</h2>
			<div class="breadcrumb-sm fadeIn wow" data-wow-delay="1s"><a href="index.php">Home</a> > Material complementar</div>

			<h2 class="title-blue-md fadeIn wow" data-wow-delay="1s"><?php echo $reg_post2['CURCURSO']; ?></h2>

			<p style="font-size:1.4em;margin:10px 0;" class="fadeIn wow" data-wow-delay="1s"><i class="fa fa-exclamation-circle" aria-hidden="true" style="color:#EB3530"></i> O material complementar disponível nesta área, ficará à disposição por até 30 dias após o término do curso realizado.</p>

			<table class="table table-striped table-courses fadeIn wow">
				<thead class="fadeIn wow" data-wow-delay="1.5s">
					<tr>
						<th>Descrição do conteúdo postado</th>
						<th>Download</th>
					</tr>
				</thead>
				<tbody class="fadeIn wow" data-wow-delay="5s">
					<?php
						$wowDelay = 5.0;
					while($reg_post = sql_retorno_lista($RS_POST)){
					?>
					<tr class=" fadeIn wow" data-wow-delay="<?php echo "$wowDelay"; ?>s">
						<td data-title="Descrição do conteúdo postado"><?php echo $reg_post['MXCNOME'];?></td>
						<td data-title="Download" class="txt_center">
							<a href='<?php echo str_replace('../', 'https://dpmeducacao.com.br/app/', $reg_post['MXCCAMINHO']); ?>' title='Anexo' target='_blank'>
								<i class="fa fa-files-o" aria-hidden="true"></i><br>
								Material complementar
							</a>
						</td>
					</tr>
					<?php
						$wowDelay = $wowDelay + 0.25;
						}
					?>
				</tbody>
			</table>
			<!-- Back page button -->
			<div class="txt_right">
				<div class="btn-back-page">
					<a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
				</div>
			</div>
			<!-- Back page button -->

		</div><!-- container -->

	</section>

<?php include('footer.php') ?>