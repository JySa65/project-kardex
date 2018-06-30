<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Usuario: <?= strtoupper($account->name)?> <?= strtoupper($account->last_name)?>| <a href="<?= url('list_account') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Perfil</h4>
			</div>
			<div class="panel-body">
				<div class="col-lg-6">
					<h4><b>Cedula: </b><?= $account->nationality ?>-<?= $account->cedula ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><b>Nombres: </b><?= $account->name ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><b>Apellidos: </b><?= $account->last_name ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><b>Correo Electronico: </b><?= $account->email ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><b>Direcci&oacute;n: </b><?= $account->address ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><b>Tipo De Usuario: </b><?= $account->level ?></h4>					
				</div>
			</div>
		</div>
	</div>
</div>
<?php
@include(TEMPLATES_DIR . "templates/inc/contex2.php");
@include(TEMPLATES_DIR . "templates/inc/footer.php");
?>
