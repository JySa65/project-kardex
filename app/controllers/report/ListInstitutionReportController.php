<?php 
/**
 * 
 */
use framework\view\View;
use app\models\{InstitucionModel, CategoryModel, ProductModel};

class ListInstitutionReportController extends View
{
	function __construct()
	{
		new \app\databases\InstitucionBD;
		new \app\databases\CategoryBD;
		new \app\databases\ProductBD;

		$this->institute = new InstitucionModel;
		$this->category = new CategoryModel;
		$this->product = new ProductModel;
	}

	function index()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$institutes = $this->institute->all();
			$categorys = $this->category->all();
			return $this->render('report/list_empresa', 
								[
									'institutes' => $institutes,
									'categorys' => $categorys
								]
			);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->generate_report();
		}
	}
	function get_product_by_category() 
	{
		$id = $_GET['id'];
		if (!empty($id)) {
			$products = $this->product->where('id_category', '=', $id);
			$rs = [];
			foreach ($products as $product) {
				$data = [
					"id" => $product->id,
					"name" => $product->name
				];
				array_push($rs, $data);
			}
			echo json_encode($rs);
		}
	}

	function generate_report() 
	{
		$institute = $_POST['institute'];
		$category = $_POST['category'];
		$product = $_POST['product'];
		$date_min = $_POST['min'];
		$date_max = $_POST['max'];

		echo $institute, $category, $product, $date_min, $date_max;
	}
}
?>