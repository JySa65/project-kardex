<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?= $type ?>: <?= strtoupper($reason->name) ?> | <a href="<?= $type=="Entrada" ? url('list_inventario/entry') : url('list_inventario/output') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
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
					<div class="col-lg-12">
						<h4><b>Registrado Por: </b> <?= $account->nationality ?>-<?= $account->cedula?> <?= strtoupper($account->name) ?> <?= strtoupper($account->last_name) ?></h4> 
					</div>
					<div class="col-lg-12">
						<h4><b><?= $type=="Entrada" ? 'Donado Por' : 'Entregado a' ?>:</b> <?= strtoupper($institute->rif) ?> <?= strtoupper($institute->name) ?></h4> 
					</div>
					<div class="col-lg-12">
						<h4><b>Motivo De <?= $type ?>: </b> <?= strtoupper($reason->description) ?></h4> 
					</div>
					<div class="col-lg-12">
						<h4><b>Fue Registrado En EL Sistema El Dia: </b> <?= date("d-m-Y", strtotime($reason->created_at)) ?> A Las: <?= date("h:i:s A", strtotime($reason->created_at)) ?></h4> 
						<hr>
					</div>
					<div class="container-fluid">
						<div class="col-lg-12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Cantidad</th>
										</tr>
									</thead>
									<tbody id="id_result">
										<?php $acum = 1; foreach ($products as $product) { ?>
											<tr>
												<td><?= $acum ?></td>
												<td><?= $product->name ?></td>
												<td><?= $product->quantity ?></td>
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
<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>
