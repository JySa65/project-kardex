<?php 
  @include (TEMPLATES_DIR . "templates/inc/head.php");  
   ?>
  
	<header id="estilo1">
		<img src="../static/img/banner.png" id="banner">
	</header>
	<nav class="navbar navbar-inverse" style="border-color: #7a78c3">
		<div class="container-fluid">
		<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        	<span class="sr-only"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
     		 </button>
      		<a class="navbar-brand" href="#">KARDEX</a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?=url("/")  ?>">Inicio <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Departamento</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DESEP <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=url("info/historia")  ?>">Reseña Historica</a></li>
            <li><a href="<?=url("info/misionvision")  ?>">Mision y Vision</a></li>
            <li><a href="<?= url("info/objetivos")  ?>">Objetivos Estrategicos</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=url("login")?>">Iniciar Sesion</a></li>
      </ul>

    </div>
		</div>
		</nav>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          
        </div>  
      </div>
    </div>
<?php 
@include (TEMPLATES_DIR . "templates/inc/footer.php");
 ?>