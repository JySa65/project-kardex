<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<script>
	var type = "<?= $type ?>";
	console.log(type);
</script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inventario | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4><?= $type ?></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-10">
						<div class="form-group">
							<label for="id_search">Buscar producto por nombre:</label>
							<input type="text" name="q" id="id_search" class="form-control" autofocus="on" autocomplete="off">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group text-center">
							<br>
							<button type="button" class="btn btn-primary" onclick="javascript:search_product()"><i class="fa fa-search"> </i> Buscar</button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div id="container" hidden>
								<form method="POST" id="form_post">
									<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
									<hr>
									<div class="row">
										<div class="container-fluid text-center">
											<div class="col-lg-12">
												<h3>Resumen</h3>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="container-fluid">
											<div class="col-lg-12">
												
												<div class="col-lg-6">
													<div class="form-group">
														<label for="id_nacionality">Institucion</label>
														<select name="institute" id="id_institute" class="form-control" autofocus="on" autocomplete="off" required>
															<option selected value="">Escojer Instituci&oacute;n</option>
															<?php foreach ($institutes as $institute) { ?>
																<option value="<?= $institute->id ?>"><?= $institute->name ?></option>
															<?php } ?>
														</select>
													</div>
												</div>

												<div class="col-lg-6">
													<div class="form-group">
														<label for="id_cedula">Nombre De la <?= $type ?></label>
														<input class="form-control" id="id_name" name="name" type="text" placeholder="Motivo de Entrada"  maxlength="1000" autocomplete="off" required>
													</div>
												</div>

												<div class="col-lg-12">
													<div class="form-group">
														<label for="id_description">Motivo De La <?= $type ?></label>
														<textarea name="description" id="id_description" cols="30" rows="2" class="form-control" style="resize: none;" placeholder="Breve Descripcion de la entrada"></textarea>
													</div>
												</div>

											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="container-fluid">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th>Nombre</th>
																<th>Existencia</th>
																<th>Añadir</th>
																<th>Opciones</th>
															</tr>
														</thead>
														<tbody id="id_result">

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="container-fluid text-center">
											<div class="col-lg-12">
												<div class="form-group">
													<button class="btn btn-primary " type="submit" name="save"><i class="fa fa-save"></i> Aceptar</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>                      
			</div>	
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Resultado de <span id="title_id"></span></h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody id="id_context">

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>
<script src=<?= STATIC_DIR . "js/inventario_entry.js" ?>></script>