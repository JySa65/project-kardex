
<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"info" => "InfoController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "register/AccountController",
	"cat_product" => "register/CategoryProductController",
	"product" => "register/ProductController",
	"institucions" => "register/InstitucionController",
	"motivo_entrada" => "MotEController",
	"motivo_salida" => "MotSController",
	"list" => "ListController",
	"logout" => "LogoutController",
	"list_account" => "lists/ListAccountController",
	"list_category" => "lists/ListCategoryController",
	"list_product" => "lists/ListProductController",
	"list_institution" => "lists/ListInstitutionController"
])


?>