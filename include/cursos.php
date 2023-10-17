<?php
    $pageName = "cursos";
    require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'include/constantes.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionCursos.php';
    require_once __DIR__.DIRECTORY_SEPARATOR.'transaction/transactionTabela.php';

   
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/banners.php'; ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12 px-0 pb-5">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
			        <div class="col-12 px-0">
                        <div class="center-div">
                            <span class="roboto-bold text-lead-header">PESQUISAR CURSOS</span>
                        </div>
                        <div class="col-12 roboto-regular text-gray-3 text-sub-title-15 px-0">
                        <span class="roboto-bold">ATENÇÃO:</span> A consulta deverá conter obrigatoriamente a indicação de no mínimo uma <span class="roboto-bold">palavra-chave</span> com o <span class="roboto-bold">radical</span> do nome do curso buscado. Exemplo: “Contratos”.  
                        </div>
                        
                        <div class="col-12 px-0 py-0"><!-- begin section search -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-line-height-19 pl-0">
                                <div class="box-search">
                                    <form id="" class="" action="" method="" target="">
                                        <i class="icon-search fa fa-search"></i>
                                        <input class="input-search" type="text" id="filter_input_cursos" placeholder="Procurar Cursos">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl-0">    
                            <div class="center-div">
                                <span class="roboto-bold text-lead-header">PESQUISAR CURSOS POR ÁREA DE INTERESSE</span>
                            </div>    
                                <div class="input-group mt-3 mb-3">
                                    <select id="curso_area" name="curso_area" class="custom-select input-select" onchange="directArea(this.value);">
                                        <option disabled selected>Selecione cursos por área de interesse</option>
										<?php foreach($areas as $area) : ?>
											<option value="<?= $area['TABCODIGO']; ?>"><?= $area['TABDESCRICAO']; ?></option>									
										<?php endforeach; ?>                                        
                                    </select>
                                </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row" id="retCursos">
								
									<?php	foreach($cursos as $item) : ?>
                                    <div class="col-xs-12 col-ms-12 col-md-4 flex-item-column">
                                        <div class="card-items bg-beige-theme space-between">
                                            <div>
                                                <?php $imagem = (isset($item['CURTITULOSITE'])) ? $item['CURTITULOSITE'] : '' ?>
                                                <img class="img-fluid mx-auto d-block"
                                                <?php if (isset($item['CURIMAGEM'])) : ?>
                                                src="https://educacao.dpm-rs.com.br//imagensSite/<?= $item["CURIMAGEM"]; ?>"
                                                <?php else: ?>
                                                src="https://dpmeducacao.com.br/imgs/curso1.jpg"
                                                <?php endif; ?>
                                                >
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 px-2 pb-0">
                                                    <p class="divcursos roboto-medium text-line-height-19">
                                                        <?php echo $item['CURTITULOSITE'];?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-12 pt-0 pb-0 pl-1">
													<?php if ($item['CURDATAINICIO'] != $item['CURDATAFIM']) { ?>
                                                    <span class="date roboto-regular"><?php echo formatar_data($item['CURDATAINICIO']); ?></span>
													<span class="date roboto-regular"><?php echo formatar_data($item['CURDATAFIM']); ?></span>
													<?php } else { ?>
													<span class="date roboto-regular"><?php echo formatar_data($item['CURDATAINICIO']); ?></span>	
													<?php }  ?>                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-1 pb-2 mb-2 pl-1 text-line-height-11">
                                                    <span class="city text-margin-left-8 roboto-regular">
                                                        <?php echo $item['CIDDESCRICAO']; ?>
                                                    </span>
                                                </div>
                                                <div>
                                                    <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] <= 0) : ?>
                                                    <a class="roboto-bold btn btn-danger text-uppercase btn-sm btn-block rounded-0 transition-color mt-1" style="color: #ffffff !important;" role="button">lotado</a>
                                                    <a class="raleway-bold btn btn-blue text-uppercase btn-sm rounded-0 transition-color mt-1" href="cursos/lista-espera/<?php echo $item['CURCODIGO']; ?>" role="button">Lista de espera</a>
                                                    <?php endif; ?>
                                                    <?php if ($item['CURVAGAS'] - $item['CURMATRICULADOS'] > 0) : ?>
                                                    <a class="btn button-link raleway-bold mt-1" href="identificacao-acesso/clientes/<?php echo $item['CURCODIGO']; ?>" style="background-color: orange" role="button">Inscreva-se</a>
                                                    <?php endif; ?>
                                                    <?php if ($item['CURNOVATURMA'] == 'S') : ?>
                                                    <a class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1" href="cursos/<?php echo $item['CURVINCULOTREINAMENTO']; ?>" role="button">Nova Turma </br><span>(Inscrições abertas)</span></a>
                                                    <?php endif; ?>
                                                    <a class="btn button-link raleway-bold mt-1" href="cursos/<?php echo $item['CURCODIGO']; ?>" role="button">sobre o curso</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>		
								
								</div>
                            </div>
                        </div>
    
                    </div>
                </div>
				<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/agenda-cursos.php'; ?>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/diferenciais.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'layout/galeria-videos.php'; ?>
<?php require_once __DIR__.DIRECTORY_SEPARATOR.'footer.php'; ?>