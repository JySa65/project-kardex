<?php 
/**
 * 
 */
use framework\view\View;
class AccountController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('account/account_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
		}
	}


}

?>