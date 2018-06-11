<?php 
/**
 * 
 */
use framework\view\View;
class CategoryProductController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('cat_pro/cat_pro_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			// move_uploaded_file($origen, $destino)
			// $this->save();	
		}
	}
}

?>