
<?php 
use framework\route\Routes;

new Routes([
	"/" => "IndexController",
	"info" => "InfoController",
	"login/" => "LoginController",
	"dashboard/" => "DashBoardController",
	"account" => "register/AccountController",
	"list_account" => "lists/ListAccountController",
	"detail_account" => "detail/DetailAccountController",

	"cat_product" => "register/CategoryProductController",
	"product" => "register/ProductController",
	"institucions" => "register/InstitucionController",
	"motivo_entrada" => "MotEController",
	"motivo_salida" => "MotSController",
	"list" => "ListController",
	"logout" => "LogoutController",
	"list_category" => "lists/ListCategoryController",
	"list_product" => "lists/ListProductController",
	"list_institution" => "lists/ListInstitutionController",
	"entry_inventory" => "inventario/EntryController",

])


?>