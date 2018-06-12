<?php 
/**
 * 
 */
use framework\view\View;
class MotSController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('mot_s/mot_s_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			// move_uploaded_file($origen, $destino)
			// $this->save();	
		}
	}
}

?>