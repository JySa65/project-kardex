<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reporte General | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Reporte filtrado</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<label>Institucion</label>
						<select name="" id="" class="form-control">
							<option value="">Seleccione*</option>
							<option value="">1</option>
						</select>
					</div>
					<div class="col-md-2">
						<label>Categoria producto</label>
						<select name="" id="" class="form-control">
							<option value="">Seleccione*</option>
							<option value="">1</option>
						</select>
					</div>
					<div class="col-md-2">
						<label>Producto</label>
						<select name="" id="" class="form-control">
							<option value="">Seleccione*</option>
							<option value="">1</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="">Fecha Minima</label>
						<input type="date" class="form-control" value="">
					</div>
					<div class="col-md-3">
						<label for="">Fecha maxima</label>
						<input type="date" class="form-control">
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