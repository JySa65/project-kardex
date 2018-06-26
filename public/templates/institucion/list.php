<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista de Instituciones | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Lista de Instituciones</h4>
			</div>
			<div class="panel-body">
					<table id="list_a" class="display" style="width: 100%">
						<thead>
							<tr>
								<th>#</th>
								<th>RIF</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
								<?php $acum=1; foreach ($institucions as $institucion) {  ?>
								<tr>
									<td><?=$acum?></td>
									<td><?=$institucion->rif ?></td>
									<td><?=$institucion->name?></td>
									<td><?=$institucion->description?></td>
									<td><?=$institucion->address?></td>
									<td><?=$institucion->tlf?></td>
									<td>
										<a class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a>
										<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Actualizar</a>
										<a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
									</td>
								</tr>
							<?php $acum+= 1;} ?>
						</tbody>
					</table>
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
    $('#list_a').DataTable();
} );
</script>