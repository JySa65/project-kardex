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
        <div class="col-md-12" style="text-align: justify;">
          <center><h2>DIRECCION ESTADAL DE SALUD DEL ESTADO PORTUGUESA</h2></center>
          <p>
            El 15 de noviembre de 1967, por convenio entre el Ministerio de Sanidad y Asistencia Social y el Ejecutivo del Estado Portuguesa, se crea el Servicio Cooperativo de Salud pública como ente sin personalidad jurídica, contando con presencia física en la ciudad de Guanare, y teniendo como propósito el suministro a la población del estado una mejor atención sanitaria, para ese momento se designó como director el Dr.Ferreira Jorge.
          </p>
          <p>
            Posteriormente por resolución Ministerial Nº G-146 del 06 de agosto de 1975 se crea la COMISIONADURIA GENERAL DE SALUD DEL ESTADO PORTUGUESA designándose como director el Dr. Díaz Peña Franz. Años después, en 1994 fue denominada Dirección Regional del Sistema Nacional de Salud del estado Portuguesa.
          </p>
          <p>
            A principios del año 2011 por instrucciones del Director en funciones Dr. Antonio José Brito Bastardo, quien ordeno la reestructuración y revisión de los proceso y procedimientos de la Dirección Regional de Salud, aplicando principios detransparencia administrativa, objetividad y eficiencia. Situación está que se inicia el mesde Febrero de ese mismo año y el cual concluye en la aprobación por parte de la Ciudadana Ministra del Poder Popular para La Salud Coronela. Eugenia Sader de una nueva estructura organizativa ajustada al proceso político, hacia el desarrollo de una nueva direccionalidad en las políticas sociales del Estado Venezolano, en plena correspondencia con el Sistema Público Nacional de Salud, así como, de denominaciónpasando hacer DIRECCION ESTADAL DE SALUD DE PORTUGUESA, todo ello aprobado según oficio Nº 00863, de fecha Julio ocho de 2011.
          </p>
        </div>  
      </div>
    </div>
    <br>
<?php 
@include (TEMPLATES_DIR . "templates/inc/footer.php");
 ?>