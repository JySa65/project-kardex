<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\databases\CategoryBD;
use app\models\CategoryModel;
class CategoryProductController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
		new CategoryBD;
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('cat_pro/cat_pro_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();			
		}
	}

	function update($id)
	{
		$account = new CategoryModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('cat_pro/cat_pro_form', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->save($id);
			return redirect('list_category');
		}
	}
	function delete($id)
	{
		$account = new CategoryModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('cat_pro/cat_pro_delete', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			if (isset($_POST['csrftoken'])) {
				if($user->delete($user->id)){
					return redirect('list_cat_pro', ['message' => 'Categoria Eliminado Sastifactoriamente']);
				}else{
					return redirect('list_category', ['message' => 'Categoria No Pudo Ser Eliminada']);
				}
			}else{
				return $this->render('error/403');
			}	
		}
	}
	private function save($id=null)
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()) {
				$category = new CategoryModel;
				$category->name = test_input($_POST['name']);
				$category->description = test_input($_POST['description']);
				if ($id == null) {
					$category->save();
					return redirect('list_category');
				}else{

				}
			}else{
				return redirect('cat_product/new', ['error' => $this->error]);
			}
		}
	}

	private function form_valid()
	{
		$data = [
			'name' => 'nombre de la categoria',
		];

		foreach ($data as $key => $value) {
			if (empty($_POST[$key])) {
				array_push($this->error, "El campo {$value} es requerida");	
			}
		}

		if (count($this->error) != 0) {
			return false;
		}
		return true;
	}
}

?>