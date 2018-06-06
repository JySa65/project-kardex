<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Usuarios | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro de nuevos usuarios</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_nacionality">Nacionalidad</label>
								<select name="nacionality" id="id_nacionality" class="form-control" autofocus="on" autocomplete="off" required value="">
									<?php if (isset($user)){ 
										echo "<option selected value=" . $user->nationality . ">". $user->nationality ."</option>"; 
									}else{ ?>
										<option value="" selected="">Escojer Nacionalidad</option>
										<option value="V">V</option>
										<option value="E">E</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_nacionality">Nivel de Acceso</label>
								<select name="nacionality" id="id_nacionality" class="form-control" autofocus="on" autocomplete="off" required value="">
									<?php if (isset($user)){ 
										echo "<option selected value=" . $user->nationality . ">". $user->nationality ."</option>"; 
									}else{ ?>
										<option value="" selected="">Escojer Nivel</option>
										<option value="1">Administrador</option>
										<option value="2">Supervisor</option>
										<option value="3">Trabajador</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_cedula">Cedula</label>
								<input class="form-control" id="id_cedula" name="cedula" type="text" placeholder="Cedula" maxlength="8" autocomplete="off" pattern="[0-9]{0,8}" oninvalid="setCustomValidity('la cedula debe ser numerica')" required value="<?= isset($user) ? $user->cedula : '' ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_name">Nombre</label>
								<input class="form-control" id="id_name" name="name" type="text" placeholder="Primer Nombre" maxlength="50" autocomplete="off" pattern="[a-zA-Z]" required value="<?= isset($user) ? $user->name : '' ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_last_name">Apellido</label>
								<input class="form-control" id="id_last_name" name="last_name" type="text" placeholder=" Primer Apellido" maxlength="50" autocomplete="off" pattern="[a-zA-Z]" required value="<?= isset($user) ? $user->last_name : '' ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_email">Correo Electronico</label>
								<input class="form-control" id="id_email" name="email" type="email" placeholder="Correo Electronico" maxlength="255" autocomplete="off" value="<?= isset($user) ? $user->email : '' ?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="id_email">Direccion</label>
								<textarea name="address" id="id_address" cols="30" rows="1" class="form-control" style="overflow:auto; height: 50%;" placeholder="Direccion"><?= isset($user) ? $user->address : '' ?></textarea>
							</div>
						</div>

						<!-- <div class="col-lg-6">
							<div class="form-group">
								<label for="id_email">Direccion</label>
								<input class="form-control" id="id_img" name="img[]" type="file" placeholder="Hola" multiple="multiple" >
							</div>
						</div> -->

						<div class="col-lg-12 text-center">
							<div class="form-group">
								<button class="btn btn-primary "><i class="fa fa-save"></i> Aceptar</button>
								<button class="btn btn-warning "><i class="fa fa-recycle"></i> Limpiar</button>
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