<?php 
/**
 * 
 */
use framework\view\View;
class IndexController extends View
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		return $this->render('index/index');
	}
}



?>