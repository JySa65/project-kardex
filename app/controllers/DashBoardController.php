<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
class DashBoardController
{
	
	function __construct()
	{
		$this->view= new View;
	}

	function index()
	{
		return $this->view->render('index/dashboard');
	}
}
?>