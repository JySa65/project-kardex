<?php 
$user = sessionLocal('user');
?>

<div id="wrapper">
	
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= url('dashboard') ?>">KARDEX</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<!-- /.dropdown -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?= strtoupper(sessionLocal('user')->username);?><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="<?= url('change_password') ?>"><i class="fa fa-gear fa-fw"></i>Cambio de Clave</a></li>
					<li><a href="#"><i class="fa fa-file fa-fw"></i>Documentacion</a></li>
					<li class="divider"></li>
					<li><a href="<?= url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesi&oacute;n</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation" style="">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li class="active">
						<a href="<?= url('dashboard'); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i>Panel de control</a>
					</li>
					<?php if ($user->level != "supervisor") { ?>
						<li>
							<a href="#!" class="active"><i class="fa fa-users fa-fw"></i>Registros</a>
							<ul class="nav nav-second-level">
								<?php if ($user->level !== "trabajador") { ?>
									<li>
										<a href="<?= url('account/new') ?>" class="active">Usuario</a>
									</li>
									<li>
										<a href="<?= url('institucion/new')  ?>" class="active">Instituciones</a>
									</li>
								<?php }  ?>

								<li>
									<a href="<?= url('cat_product/new') ?>" class="active">Categoria de producto</a>
								</li>
								<li>
									<a href="<?= url('product/new') ?>" class="active">Producto</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="" class="active"><i class="fa fa-spinner"></i> Procesos</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="<?=url('general_stadistic') ?>" class="active" >Estadistica General</a>
								</li>
								<li>
									<a href="#!" class="active" >Inventario</a>
									<ul class="nav nav-third-level">
										<li>
											<a href="<?= url('inventory_register/entry') ?>" class="active">Entrada</a>
										</li>
										<li>
											<a href="<?= url('inventory_register/output') ?>" class="active">Salidas</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?= url('list'); ?>" class="active"><i class="fa fa-list fa-fw"></i> Listados</a>
							<ul class="nav nav-second-level">
								<?php if ($user->level !== "trabajador") { ?>
									<li>
										<a href="<?= url('list_account') ?>" class="active">Usuarios</a>
									</li>
									<li>
										<a href="<?= url('list_institution')?>" class="active">Instituciones</a>
									</li>
								<?php } ?>
								<li>
									<a href="<?= url('list_category')?>" class="active">Categorias de productos</a>
								</li>
								<li>
									<a href="<?= url('list_product')?>" class="active">Productos</a>
								</li>
								<li>
									<a href="#!" class="active">Inventario</a>
									<ul class="nav nav-third-level">
										<li>
											<a href="<?= url('list_inventario/resumen')?>" class="active">Inventario</a>
										</li>
										<li>
											<a href="<?= url('list_inventario/entry')?>" class="active">Entrada</a>
										</li>
										<li>
											<a href="<?= url('list_inventario/output')?>" class="active">Salidas</a>
										</li>
									</ul>
								</li>


							</ul>
						</li>
					<?php } ?>
					<li>
						<a href="#" class="active"><i class="fa fa-book fa-fw"></i> Reportes</a>
						<ul class="nav nav-third-level">
							<li>
								<a href="<?= url('report-list-empresa')?>" class="active">General</a>
							</li>
							<li>
								<a href="<?= url('')?>" class="active">Instituciones</a>
							</li>
							<li>
								<a href="<?= url('list_inventario/entry')?>" class="active">Producto</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= url('logout')?>" class="active"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n</a>
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>

	<div id="page-wrapper">
