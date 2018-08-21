<?php 
// framework
require('../framework/core.init.php');

require("controllers/report/BaseFpdf.php");

// bases de datos
require("databases/AccountBD.php");
require("databases/CategoryBD.php");
require("databases/ProductBD.php");
require("databases/InstitucionBD.php");
require("databases/ReasonBD.php");
require("databases/InputAndOutputBD.php");

// models
require("models/AccountModel.php");
require("models/CategoryModel.php");
require("models/ProductModel.php");
require("models/IntitucionModel.php");
require("models/ReasonModel.php");
require("models/InputAndOutputModel.php");

//helpers
require('helpers/helpers.php');

//
// routes
require('routes/routes.php');

?>