<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\{ProductModel, InstitucionModel, ReasonModel, InputAndOutputModel as InpoutModel, AccountModel};

class DetailInventarioController extends View
{
	
	function index()
	{
		return $this->render('error/404');
	}

	function entry($id)
	{
		if (!is_numeric($id)) {
			return $this->render('error/404');
		}
		$reason = new ReasonModel;
		$account = new AccountModel;
		$institute = new InstitucionModel;
		$inpout = new InpoutModel;
		$product = new ProductModel;
		$detail_reason = $reason->find('id', '=', (int)$id); 
		if (empty($detail_reason)) {
			return $this->render('error/404');	
		}
		$query = "SELECT * FROM inpout as i LEFT JOIN product as p ON i.id_product = p.id WHERE id_reason = {$detail_reason->id}";
		$data = [
			'reason' => $detail_reason,
			'account' => $account->find('id', '=', (int)$detail_reason->id_account),
			'institute' => $institute->find('id', '=', (int)$detail_reason->id_institute),
			'products' => $product->execute_query($query),
			'type' => 'Entrada',
		];
		return $this->render('inventario/inventario_detail', $data);
	}

	function output($id)
	{
		if (!is_numeric($id)) {
			return $this->render('error/404');
		}
		$reason = new ReasonModel;
		$account = new AccountModel;
		$institute = new InstitucionModel;
		$inpout = new InpoutModel;
		$product = new ProductModel;
		$detail_reason = $reason->find('id', '=', (int)$id); 
		if (empty($detail_reason)) {
			return $this->render('error/404');	
		}
		$query = "SELECT * FROM inpout as i LEFT JOIN product as p ON i.id_product = p.id WHERE id_reason = {$detail_reason->id}";
		$data = [
			'reason' => $detail_reason,
			'account' => $account->find('id', '=', (int)$detail_reason->id_account),
			'institute' => $institute->find('id', '=', (int)$detail_reason->id_institute),
			'products' => $product->execute_query($query),
			'type' => 'Salida',
		];
		return $this->render('inventario/inventario_detail', $data);
	}

	function history($id)
	{
		if (!is_numeric($id)) {
			return $this->render('error/404');
		}
		$reason = new InpoutModel;
		$entry = $reason->execute_query("SELECT sum(quantity) FROM inpout WHERE id_product = {$id} and type = 1");
		$output = $reason->execute_query("SELECT sum(quantity) FROM inpout WHERE id_product = {$id} and type = 2");
		$product = $reason->execute_query("SELECT * FROM inpout as i LEFT JOIN product as p ON i.id_product = p.id WHERE id_product={$id}");
		$data = [
			'entry' => $entry[0]->sum,
			'output' => $output[0]->sum,
			'products' => $product,
			'disp' => existence_products($id),
		];
		return $this->render('inventario/history', $data);
	}

}
?>