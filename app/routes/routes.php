
<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"info" => "InfoController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "account/AccountController",
	"cat_product" => "CategoryProductController",
	"product" => "ProductController",
	"institucions" => "InstitucionController",
	"motivo_entrada" => "MotEController",
	"motivo_salida" => "MotSController",
	"list" => "ListController",
	"logout" => "LogoutController",
])


?>