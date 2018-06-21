<?php 
/**
 * 
 */
use framework\view\View;


class ListCategoryController extends View
{
	
	function __construct()
	{
				
	}

	function index()
	{
		return $this->render('cat_pro/list');

	}

}

?>