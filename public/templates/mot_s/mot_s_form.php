<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Motivos de Salida | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro de nuevos motivos de salida de productos</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nombre del motivo de salida <span style="color: red">*</span></label>
								<input type="text" name="" class="form-control" placeholder="Ej: Traspaso de terceros">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Descripci&oacute;n</label>
								<input type="text" name="" class="form-control" placeholder="Breve Descripcion del motivo">
							</div>
						</div>
						<div class="col-lg-12">
							<p>(<span style="color: red">*</span>) Campos obligatorios</p>
						</div>

						<div class="col-lg-12 text-center">
							<div class="form-group">
								<button class="btn btn-primary "><i class="fa fa-save"></i> Aceptar</button>
								<button class="btn btn-warning " type="reset"><i class="fa fa-recycle"></i> Limpiar</button>
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