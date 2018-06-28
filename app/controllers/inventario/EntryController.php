<?php 
/**
 * 
 */
use framework\view\View;
use app\models\ProductModel;
use app\models\InstitucionModel;
class EntryController extends View
{
	
	function __construct()
	{
		
	}

	function index()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$institute = new InstitucionModel;
			$data = [
				'institutes' => $institute->all()
			];
			return $this->render("inventario/entry_form", $data);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();
		}
	}

	function save()
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			print_r($_POST);
		}
	}

	function search_entry()
	{
		$data = test_input($_GET['q']);
		if (!empty($data)) {
			$product = new ProductModel;
			$query = "SELECT * FROM product WHERE name LIKE '{$data}%'";
			$data = $product->execute_query($query);	
			if (!empty($data)) {
				echo json_encode(['rs'=>$data]);
			}else{
				echo json_encode(['rs'=>false]);
			}
		}
	}

	function search_id($id)
	{
		$data = (int)$id;
		if (!empty($data)) {
			$product = new ProductModel;
			$query = "SELECT * FROM product WHERE id = {$data}";
			$data = $product->execute_query($query);	
			if (!empty($data)) {
				echo json_encode(['rs'=>$data[0]]);
			}else{
				echo json_encode(['rs'=>false]);
			}
		}
	}
}
?>