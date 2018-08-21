<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\CategoryModel;
class DetailCategoryController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function index()
	{
		return $this->render('error/404');
	}

	function view($id)
	{
		if (!is_numeric($id)) {
			return $this->render('error/404');
		}
		$account = new CategoryModel;
		$detail = $account->find('id', '=', (int)$id); 
		if (empty($detail)) {
			return $this->render('error/404');	
		}
		return $this->render('cat_pro/cat_pro_detail', ['account' => $detail]);
	}
}

?>