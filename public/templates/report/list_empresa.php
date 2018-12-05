<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reporte General | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i>
				Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Reporte filtrado</h4>
			</div>
			<div class="panel-body">
				<form method="post" id="id_form">
					<div class="row">
						<div class="col-md-2">
							<label>Institucion</label>
							<select required name="institute" id="id_institute" class="form-control">
								<option value="" selected>Seleccione*</option>
								<?php	foreach ($institutes as $institute) { ?>
								<option value="<?=$institute->id ?>">
									<?=$institute->name ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label>Producto</label>
							<select name="product" id="id_product" class="form-control">
								<option selected value="">Seleccione*</option>
								<?php foreach ($products as $product) { ?>
								<option value="<?=$product->id ?>">
									<?=$product->name ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label>Tipo</label>
							<select name="type" id="id_type" class="form-control">
								<option value="1">Entrada</option>
								<option value="2">Salida</option>
								<option value="0" selected>Todos</option>
							</select>
						</div>
						<div class="col-md-3">
							<label for="">Fecha Minima</label>
							<input type="date" class="form-control" value="" name="min" id="id_min">
						</div>
						<div class="col-md-3">
							<label for="">Fecha maxima</label>
							<input type="date" class="form-control" name="max" id="id_max">
						</div>
					</div>
					<div class="row" style="margin-top: 20px;">
						<div class="col-md-12 text-center">
							<button class="btn btn-primary" id="btn_report">Generar
								Reporte</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>