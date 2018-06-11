<?php 
/**
 * 
 */
use framework\view\View;
class MotEController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('mot_e/mot_e_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			// move_uploaded_file($origen, $destino)
			// $this->save();	
		}
	}
}

?>