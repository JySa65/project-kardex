<?php 
/**
 * 
 */
use framework\view\View;
use app\models\ProductModel;
use app\databases\ProductBD;


class ListProductController extends View
{
	
	function __construct()
	{
			new ProductBD;	
	}

	function index()
	{
		$product = new ProductModel;
		$products = $product->all_products();
		return $this->render('product/list', ["products"=>$products]);

	}

}

?>