<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inicio</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= count($accounts) ?></div>
						<div>Usuarios</div>
					</div>
				</div>
			</div>
			<a href="<?=url('list_account')?>">
				<div class="panel-footer">
					<span class="pull-left">Ver Listado</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-car fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= count($institucions) ?></div>
						<div>Instituciones</div>
					</div>
				</div>
			</div>
			<a href="<?=url('list_institution')?>">
				<div class="panel-footer">
					<span class="pull-left">Ver Listado</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-university fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= count($products) ?></div>
						<div>Productos</div>
					</div>
				</div>
			</div>
			<a href="<?=url('list_product')?>">
				<div class="panel-footer">
					<span class="pull-left">Ver Listado</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= count($categorys) ?></div>
						<div>Categorias</div>
					</div>
				</div>
			</div>
			<a href="<?=url('list_category')?>">
				<div class="panel-footer">
					<span class="pull-left">Ver Listado</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>


<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>