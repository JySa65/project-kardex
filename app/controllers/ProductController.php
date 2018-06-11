<?php 
/**
 * 
 */
use framework\view\View;
class ProductController extends View
{
	
	function __construct()
	{
		
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('product/product_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
			// move_uploaded_file($origen, $destino)
			// $this->save();	
		}
	}
}

?>