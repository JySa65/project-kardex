<?php 
/**
 * 
 */
use framework\view\View;
use app\models\CategoryModel;
use app\databases\CategoryBD;


class ListCategoryController extends View
{
	
	function __construct()
	{
			new CategoryBD;	
	}

	function index()
	{
		$category = new CategoryModel;
		$categorys = $category->all();
		return $this->render('cat_pro/list', ["categorys"=>$categorys]);

	}

}

?>