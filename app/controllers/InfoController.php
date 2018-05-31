<?php 
/**
 * 
 */
use framework\view\View;
class InfoController extends View
{
	
	function __construct()
	{
		
	}

	function index()
	{
		return $this->render("index/departamento");
	}
}
?>