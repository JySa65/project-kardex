<?php
include(TEMPLATES_DIR . "templates/inc/head.php");
include(TEMPLATES_DIR . "templates/inc/contex1.php");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuario: <?= strtoupper($user->name)?> <?= strtoupper($user->last_name)?>| <a href="<?= url('list_account') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Eliminar Categoria de producto: <?= strtoupper($user->name) ?></h4>
			</div>
			<div class="panel-body">
                <form action="" method="POST">
                    <input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
                    <h2 class="text-center">¿Esta Seguro De Eliminar?</h2>
                    <div class="col-lg-6">
                        <h4><b>Nombre de la Categoria: </b><?= $user->name ?></h4>
                    </div>
                    <div class="col-lg-6">
                        <h4><b>Descripcion: </b><?= $user->description ?></h4>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <br><br>
                            <button class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i> Aceptar</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
		<?php
		include(TEMPLATES_DIR . "templates/inc/contex2.php");
		include(TEMPLATES_DIR . "templates/inc/footer.php");
		?>