<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Productos | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro de nuevos ingresos de productos</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Categoria de Producto  <span style="color: red">*</span></label>
								<select name="category" id="id_category" autocomplete="off" required class="form-control">
									<option value="">Seleccione Categoria <span class="ast-input">*</span></option>
									<?php foreach ($categorys as $category) {?>
										<option value="<?= $category->id ?>"><?= $category->name ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nombre del producto <span style="color: red">*</span></label>
								<input type="text" name="name" id="id_name" class="form-control" onkeypress="return sololetras(event)" placeholder="Ej: Inyectadora" value="<?= isset($product) ? $product->name : '' ?>" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Descripcion del producto</label>
								<input type="text" name="description" id="id_description" class="form-control" onkeypress="return sololetras(event)" placeholder="Breve Descripcion del producto/S" value="<?= isset($product) ? $product->description : '' ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Precio De Prodcuto</label>
								<input type="number" name="price" id="id_price" class="form-control" onkeypress="return solonumeros(event)" placeholder="Por Defecto Precio = 0" autocomplete="off" value="<?= isset($product) ? $product->price : '' ?>">
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">
								<label>Cantidad Minina Inventario</label>
								<input type="number" name="minimo" id="id_minimo" class="form-control" onkeypress="return solonumeros(event)" placeholder="Por Defecto Cant = 0" autocomplete="off" value="<?= isset($product) ? $product->minimo : '' ?>">
							</div>
						</div>	
					</div>
					<div class="col-lg-12">
						<p>(<span style="color: red">*</span>) Campos obligatorios</p>
					</div>

					<div class="col-lg-12 text-center">
						<div class="form-group">
							<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Aceptar</button>
							<button class="btn btn-warning" type="reset"><i class="fa fa-recycle"></i> Limpiar</button>
						</div>
					</div>
				</form>
			</div>                      
		</div>	
		<?php if (SESSION::has('error')) { ?>
			<div class="panel-footer panel-danger">
				<div class="alert alert-danger alert-dismissable">
					<ul>
						<?php 
						if (is_array($_SESSION['error'])) {
							foreach (SESSION::get('error') as $value) { ?>
								<li class="h5"><?= $value ?></li>	
							<?php }
						}else{ ?>
							<li class="h5"><?= SESSION::get('error') ?></li>
						<?php } ?>	
					</ul>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>


<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>