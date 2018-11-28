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
				<form action="" method="post" id="id_form">
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
							<label>Categoria producto</label>
							<select required name="category" id="id_category" class="form-control">
								<option selected>Seleccione*</option>
								<?php foreach ($categorys as $category) { ?>
								<option value="<?=$category->id ?>">
									<?=$category->name ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label>Producto</label>
							<select required name="product" id="id_product" class="form-control">
								<option selected>Debe Seleccionar Una Categoria Primero*</option>
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
	<script>
		var category = document.getElementById("id_category");
		var product = document.getElementById("id_product");

		category.addEventListener('change', function (e) {
			getProduct(e.target.value);
		})

		function getProduct(id) {
			if (id !== "") {
				$.getJSON(`/project-kardex/report-list-empresa/get_product_by_category/`, {
						id: id
					})
					.done(function (res) {
						var option = "";
						$.each(res, function (i, item) {
							option += `
								<option value="${item.id}">${item.name}</option>
							`
						})
						product.innerHTML = option;
					})
			}
		}
	</script>
</div>
<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>