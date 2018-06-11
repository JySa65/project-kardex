
<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"info" => "InfoController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "AccountController",
	"cat_product" => "CategoryProductController",
	"product" => "ProductController",
	"logout" => "LogoutController",
])


?>