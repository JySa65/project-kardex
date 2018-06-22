<?php 
/**
 * 
 */
use framework\view\View;
use app\models\ProductModel;
use app\databases\ProductBD;


class ListCategoryController extends View
{
	
	function __construct()
	{
			new ProductBD;	
	}

	function index()
	{
		$product = new ProductModel;
		$products = $product->all();
		return $this->render('product/list', ["products"=>$products]);

	}

}

?>