<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\AccountModel;
class DetailAccountController extends View
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
		$account = new AccountModel;
		$detail = $account->find('id', '=', (int)$id); 
		if (empty($detail)) {
			return $this->render('error/404');	
		}
		return $this->render('account/account_detail', ['account' => $detail]);
	}
}

?>