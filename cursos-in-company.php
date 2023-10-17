<?php
$pageName = "cursos-in-company";
require_once 'header.php';
require_once 'include/constantes.php';
?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/banners.php'; ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12 px-0 pb-5">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
					<div class="col-12 px-0 py-0">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-1 mb-1">
								<div class="center-div">
									<span class="roboto-bold text-black-theme text-lead-header text-uppercase">
										cursos <span class="roboto-bold-italic">in company</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 px-0 py-0">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 pt-2 mt-2">
								<p class="roboto-regular text-sub-title-15 margin-bottom-5">
									Através da modalidade <span style="font-style: italic;">in company</span>, a DPM Educação realiza treinamentos e palestras com formatos e conteúdos adaptáveis, ou seja, adequados à realidade e necessidade de cada entidade.</p>
							</div>
						</div>
					</div>

					<div class="col-12 px-0 py-0">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-0 pt-2 mt-2">
								<p class="roboto-regular text-sub-title-15 margin-bottom-5">
									Para que possamos confeccionar um orçamento, preencha os dados abaixo e aguarde nosso contato.</p>
							</div>
						</div>
					</div>


					<div class="col-12 px-0 py-0">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-2 mt-1">
								<form class="cursos-in-company" id="cursos-in-company" name="cursos-in-company">
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0">
											<label class="required" for="vSCICNOME"></label>
											<input id="vSCICNOME" name="vSCICNOME" title="Nome" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Nome ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vSCICEMAIL"></label>
											<input id="vSCICEMAIL" name="vSCICEMAIL" title="E-mail" type="email" class="form-control lg-input ml-3 mr-3" placeholder="E-mail ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vSCICMUNICIPIO"></label>
											<input id="vSCICMUNICIPIO" name="vSCICMUNICIPIO" title="Município" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Município ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vSCICTELEFONE"></label>
											<input id="vSCICTELEFONE" name="vSCICTELEFONE" title="Telefone" type="text" class="form-control lg-input ml-3 mr-3 telefone" placeholder="Telefone ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vSCICCURSODESEJADO"></label>
											<input id="vSCICCURSODESEJADO" name="vSCICCURSODESEJADO" title="Curso desejado" type="text" class="form-control lg-input ml-3 mr-3" placeholder="Curso desejado ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vICICPARTICIPANTES"></label>
											<input id="vICICPARTICIPANTES" name="vICICPARTICIPANTES" title="Número aproximado de participantes" type="number" class="form-control lg-input ml-3 mr-3" placeholder="Número aproximado de participantes ..." required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 text-line-height-21">
											<label class="required" for="vSCICMENSAGEM"></label>
											<textarea id="vSCICMENSAGEM" name="vSCICMENSAGEM" title="Mensagem" class="form-control pr-0 ml-3" rows="7" placeholder="Mensagem (destaque os principais tópicos) ..." required></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-0 pb-0 pr-0 text-line-height-21">
											<span class="required roboto-bold ml-1 text-blue-theme text-sub-title-15">
												Campos com preenchimento obrigatório
											</span>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-xs-4 col-sm-7 col-md-7 col-lg-11 pt-2 pb-0 pr-3 text-line-height-21">
											<input class="roboto-bold btn btn-lg btn-block bg-orange-theme text-white-theme" type="submit" value="Enviar">
											<button id="recaptcha" class="g-recaptcha" data-sitekey="6LficJcUAAAAAIVtj-9bcIHijCDrHOtS7uB65vQW" data-callback="enviarCurso" data-badge="bottomleft" style="display: none;"></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/agenda-cursos.php'; ?>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/diferenciais.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'layout/galeria-videos.php'; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>