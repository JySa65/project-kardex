
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
	
	#inventario
	"inventory_register" => "inventario/InventarioFormController",
	"detail_inventory" => "inventario/DetailInventarioController",
	"list_inventario" => "inventario/ListInventarioController",

	#password
	"change_password" => "index/ChangePasswordController",

	"report_list_empresa" => "report/PruebaController"

])


?>