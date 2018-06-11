<?php 
/**
 * 
 */
use framework\view\View;
class InstitucionController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('institucion/institucion_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			// move_uploaded_file($origen, $destino)
			// $this->save();	
		}
	}
}

?>