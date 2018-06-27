<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inventario | <a href="<?= url('dashboard') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Entrada</h4>
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
							<div id="container" hidden="">
								<hr>
								<div class="table-responsive">
									<form action="">
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
									</form>
								</div>
							</div>
						</div>
					</div>
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