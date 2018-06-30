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
		$data = [
			'reason' => $detail_reason,
			'account' => $account->find('id', '=', (int)$detail_reason->id_account),
			'institute' => $institute->find('id', '=', (int)$detail_reason->id_institute),
			'product' => $
		];
		return $this->render('inventario/inventario_detail', $data);
	}


}
?>