<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Instituciones | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro de nuevas Instituciones</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nombre de la institucion <span style="color: red">*</span></label>
								<input type="text" name="name" id="id_name" class="form-control" placeholder="Ej: Hospital Miguel Oraa" onkeypress="return sololetras(event)" value="<?= isset($user) ? $user->name : '' ?>" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Descripcion del la institucion</label>
								<input type="text" name="description" id="id_description" class="form-control" onkeypress="return sololetras(event)" placeholder="Breve Descripcion de la isntitucion" value="<?= isset($user) ? $user->description : '' ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>RIF de la institucion <span style="color: red">*</span></label>
								<input pattern="^[JGVEP][-][0-9]{7,9}[-][0-9]{1}" min="1" name="rif" id="id_rif" class="form-control" placeholder="Ej: J0000000" value="<?= isset($user) ? $user->rif : '' ?>" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Direccion de la institucion <span style="color: red">*</span></label>
								<input type="text" name="address" id="id_address" class="form-control" value="<?= isset($user) ? $user->address : '' ?>" placeholder="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Telefono de la instituci&oacute;n <span style="color: red">*</span></label>
								<br>
								<div class="col-lg-3">
									<input type="number" min="1" autocomplete="off" name="tlf_part1" id="id_tlf_part1" class="form-control" placeholder="Codigo" required>
								</div>
								<div class="col-lg-6">
									<input type="number" name="tlf_part2" id="id_tlf_part2" autocomplete="off" class="form-control" placeholder="Numero" required>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<p>(<span style="color: red">*</span>) Campos obligatorios</p>
						</div>

						<div class="col-lg-12 text-center">
							<div class="form-group">
								<button class="btn btn-primary " type="submit"><i class="fa fa-save"></i> Aceptar</button>
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