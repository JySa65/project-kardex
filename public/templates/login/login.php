<?php 
@include (TEMPLATES_DIR . "templates/inc/head.php");  
?>

<header id="estilo1">
		<img src="static/img/banner.png" id="banner">
	</header>
	<nav class="navbar navbar-inverse" style="border-color: #0f487f">
		<div class="container-fluid">
		<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        	<span class="sr-only"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
     		 </button>
      		<a class="navbar-brand" href="index">KARDEX</a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?=url("/") ?>">Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DESEP <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=url("info/historia") ?>">Reseña Historica</a></li>
            <li><a href="<?=url("info/misionvision") ?>">Mision y Vision</a></li>

          </ul>
        </li>
        <li>
          <a href="#">Contacto</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=url("login") ?>">Iniciar Sesion</a></li>
      </ul>
    </div>
		</div>
		</nav>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6" align="center">
                <img class="img-responsive" src="static/img/img-01.png" >
            </div>
            <div class="col-md-6">
                      <section class="login-form">
                        <form method="post" action="<?= url("login/check") ?>">
                            <input type="hidden" name="csrftoken" value="<?= csrf_token() ?>">
                            <h1>Ingrese sus datos</h1>
                            <div>
                                <input type="text" name="username" id="id_username" class="form-control" placeholder="Nombre de Usuario" required autofocus autocomplete="off" />
                            </div>
                            <br>
                            <div>
                                <input type="password" name="password" id="id_password" class="form-control" placeholder="Contraseña" autocomplete="off" required/>
                            </div>
                            <br>
                            <div>
                            	<button class="btn btn-primary">Entrar...</button>
                            </div>
                        </form>
                      </section>
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?= STATIC_DIR . "js/login.js" ?>"></script>
<?php 
@include (TEMPLATES_DIR . "templates/inc/footer.php");
?>