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

	/*function index()
	{
		return $this->render("index/departamento");
	}*/
	function misionvision()
	{
		return $this->render("info/misionvision");
	}
	function historia()
	{
		return $this->render("info/historia");
	}
	function objetivos()
	{
		return $this->render("info/objetivos");
	}
}
?>