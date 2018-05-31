<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= url('dashboard') ?>">Vehiculo</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<!-- /.dropdown -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?= strtoupper(sessionLocal('user')->username);?><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
					</li>
					<li><a href="#"><i class="fa fa-gear fa-fw"></i>Configuracion</a>
					</li>
					<li class="divider"></li>
					<li><a href="<?= url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesi&oacute;n</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="sidebar" role="navigation" style="">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
				</li>
				<li class="active">
					<a href="<?= url('dashboard'); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>
				<li>
					<a href="<?= url('account'); ?>"><i class="fa fa-users fa-fw"></i>Conductores</a>
				</li>
				<li>
					<a href="<?= url('vehicle'); ?>"><i class="fa fa-car fa-fw"></i> Vehiculos</a>
				</li>
				<li>
					<a href="<?= url('assign_vehicle') ?>"><i class="fa fa-id-badge fa-fw "></i>Asignar Vehiculo</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-university fa-fw"></i> Departamento</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-support fa-fw"></i> Mantenimiento</a>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
	<div class="container-fluid">