<?php 
/**
 * 
 */
use framework\view\View;
use app\models\AccountModel;
use app\databases\AccountBD;

class ListAccountController extends View
{
	
	function __construct()
	{
		new AccountBD;		
	}

	function index()
	{
		$account = new AccountModel;
		$accounts = $account->where("level", "!=", "administrador");
		return $this->render('account/list', ["accounts"=>$accounts]);

	}

}

?>