<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use app\models\ProductModel;
use app\models\CategoryModel;
use app\models\AccountModel;
use app\models\InstitucionModel;
use framework\view\View;
class DashBoardController
{
	
	function __construct()
	{
		$this->view= new View;
	}

	function index()
	{
		$account = new AccountModel;
		$institucion = new InstitucionModel;
		$product = new ProductModel;
		$category = new CategoryModel;
		$data = [
			'accounts' => $account->all(),
			'institucions' => $institucion->all(),
			'products' => $product->all(),
			'categorys' => $category->all()
		];
		return $this->view->render('index/dashboard', $data);
	}
}
?>