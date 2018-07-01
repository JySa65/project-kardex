<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\{ProductModel, InstitucionModel, ReasonModel, InputAndOutputModel as InpoutModel, AccountModel};

class ListInventarioController extends View
{
	
	function index()
	{
		return $this->render('error/404');
	}

	function entry()
	{
		$reason = new ReasonModel;
		$data = [
			'reasons' => array_reverse($reason->where('status', '=', 1), true),
			'type' => ["Entrada", "entry"],
		];
		return $this->render('inventario/inventario_list', $data);
	}

	function output()
	{
		$reason = new ReasonModel;
		$data = [
			'reasons' => array_reverse($reason->where('status', '=', 2), true),
			'type' => ["Salida", 'output'],
		];
		return $this->render('inventario/inventario_list', $data);
	}

	function resumen()
	{
		$product = new ProductModel;
		$data = [
			'products' => array_reverse($product->all()),
		];
		return $this->render("inventario/resumen", $data);
	}



}
?>