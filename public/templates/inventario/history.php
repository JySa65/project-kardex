<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Historial: <?= strtoupper($products[0]->name) ?> | <a href="<?= url('list_inventario/resumen') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Detalles</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge"><?= empty($entry) ? 0 : $entry ?></div>
									</div>
								</div>
							</div>
							<a href="#!">
								<div class="panel-footer text-center">
									<span><b>Entradas</b></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge"><?= empty($disp) ? 0 : $disp ?></div>
									</div>
								</div>
							</div>
							<a href="#!">
								<div class="panel-footer text-center">
									<span><b>Disponibles</b></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge"><?= empty($output) ? 0 : $output ?></div>
									</div>
								</div>
							</div>
							<a href="#!">
								<div class="panel-footer text-center">
									<span><b>Salidas</b></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="container-fluid">
							<div class="col-lg-12 text-left">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>Cantidad</th>
												<th>Tipo</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody id="id_result">
											<?php $acum = 1; foreach ($products as $product) { ?>
												<tr>
													<td><?= $acum ?></td>
													<td><?= $product->quantity ?></td>
													<td><?= $product->type == 1 ? "Entrada" : "Salida" ?></td>
													<td><?= date("d-m-Y", strtotime($product->created_at)) ?> A Las: <?= date("h:i:s A", strtotime($product->created_at)) ?></td>
												</tr>
												<?php  $acum += 1; }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	@include(TEMPLATES_DIR . "templates/inc/contex2.php");
	@include(TEMPLATES_DIR . "templates/inc/footer.php");
	?>
