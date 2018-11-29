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
        <li><a href="<?=url("/") ?>">Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DESEP <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=url("info/historia") ?>">Reseña Historica</a></li>
            <li><a href="<?=url("info/misionvision")  ?>">Mision y Vision</a></li>

          </ul>
        </li>
        <li>
          <a href="#">Contacto</a>
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
        <div class="col-md-12" style="text-align: justify;">
          <center><h3>MISIÓN</h3></center>
          <p>
            La Dirección Estadal de salud, Organismo rector del Sistema Integral de Salud, fundamentada en los principios éticos y valores institucionales con el propósito de promocionar, reservar, defender y restituir la salud, a través de acciones estratégicas basadas en liderizar y gerenciar planes, programas y proyectos acorde con las necesidades propias de la organización y de la colectividad para mejorar la calidad debida.
          </p>
          <center><h3>VISIÓN</h3></center>
          <p>
            La Dirección Estadal de salud, Consolida como la organización descentralizada rectora de los servicios de la Salud y el desarrollo social, como autonomía Administrativa, Financiera y el Recurso Humano idóneo para garantizar el bienestar con la participación de la comunidad.
          </p>
        </div>  
      </div>
    </div>
    <br>
<?php 
@include (TEMPLATES_DIR . "templates/inc/footer.php");
 ?>