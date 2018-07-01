<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Resumen De <?= $type[0] ?> | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Listado</h4>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="display" style="width: 100%" id="inventario_list">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre</th>
										<th>Motivo</th>
										<th>Creado</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody id="id_result">
									<?php $acum = 1; foreach ($reasons as $reason) { ?>
										<tr>
											<td><?= $acum ?></td>
											<td><?= $reason->name ?></td>
											<td><?= $reason->description ?></td>
											<td><?= date("d-m-Y", strtotime($reason->created_at)) ?> a Las: <?= date("h:i:s A", strtotime($reason->created_at)) ?></td>
											<td><a class="btn btn-primary btn-sm" href="<?= url("detail_inventory/{$type[1]}/{$reason->id}") ?>"><i class="fa fa-eye"></i> Ver</a>
												<a class="btn btn-danger btn-sm" href="<?= url("account/delete/{$reason->id}") ?>"><i class="fa fa-trash"></i> Eliminar</a></td>
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
	<script>
		$(document).ready(function() {
			$('#inventario_list').DataTable();
		} );
	</script>