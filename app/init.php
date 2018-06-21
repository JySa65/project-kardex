<?php 
// framework
require('../framework/core.init.php');

// bases de datos
require("databases/AccountBD.php");
require("databases/CategoryBD.php");
require("databases/ProductBD.php");
require("databases/InstitucionBD.php");


// models
require("models/AccountModel.php");
require("models/CategoryModel.php");
require("models/ProductModel.php");
require("models/IntitucionModel.php");


// routes
require('routes/routes.php');
?>