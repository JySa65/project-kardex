<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\ProductModel;
use app\models\CategoryModel;
use app\databases\ProductBD;
class ProductController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
		new ProductBD;
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$category = new CategoryModel;
			$categorys = $category->all();
			return $this->render('product/product_form', ['categorys' => $categorys]);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			$this->save();		
		}
	}

	function update($id)
	{
		$account = new CategoryModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('product/product_form', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->save($id);	
		}
	}

	private function save()
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()) {
				$product = new ProductModel;
				$product->id_category = (int)test_input($_POST['category']);
				$product->name = test_input($_POST['name']);
				$product->description = test_input($_POST['description']);
				$product->minimo = (int)test_input($_POST['minimo']);
				if ($id == null) {
					$product->save();
					return redirect('product/new');
				}else{

				}
			}else{
				return redirect('product/new', ['error' => $this->error]);
			}
		}
	}

	private function form_valid()
	{
		$data = [
			'name' => 'nombre de la categoria',
			'category' => 'Categoria Del Producto',
		];

		foreach ($data as $key => $value) {
			if (empty($_POST[$key])) {
				array_push($this->error, "El campo {$value} es requerida");	
			}
		}
		if (!is_numeric($_POST['category'])) {
			array_push($this->error, "El campo Categoria del Producto Es Incorrecta");
		}
		if (count($this->error) != 0) {
			return false;
		}
		return true;
	}
}

?>