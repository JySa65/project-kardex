	<?php 
  @include (TEMPLATES_DIR . "templates/inc/head.php");  
   ?>
  
	<header id="estilo1">
		<img src="static/img/banner.png" id="banner">
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DESEP <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=url("info/historia")  ?>">Reseña Historica</a></li>
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
    <br></br>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src=<?= STATIC_DIR . "img/gh.png"; ?> style="width: 100%; height: 400px;">
      </div>

      <div class="item">
        <img src=<?= STATIC_DIR . "img/g.png"; ?> style="width: 100%; height: 400px;">
        
      </div>

      <div class="item">
        <img src=<?= STATIC_DIR . "img/gh.png"; ?> style="width: 100%; height: 400px;">
      </div>

      <div class="item">
        <img src=<?= STATIC_DIR . "img/g.png"; ?> style="width: 100%; height: 400px;">
      </div>
    </div>

  <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    </div>
    </div>
    </div>
</div>
<?php 
@include (TEMPLATES_DIR . "templates/inc/footer.php");
 ?>