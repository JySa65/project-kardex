<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\InstitucionModel;
class DetailInstitucionController extends View
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
		$account = new InstitucionModel;
		$detail = $account->find('id', '=', (int)$id); 
		if (empty($detail)) {
			return $this->render('error/404');	
		}
		return $this->render('institucion/institucion_detail', ['account' => $detail]);
	}
}

?>