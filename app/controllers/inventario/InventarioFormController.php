<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\{ProductModel, InstitucionModel, ReasonModel, InputAndOutputModel as InpoutModel};
use app\databases\{ReasonBD, InputAndOutputBD as InpoutBD};
class InventarioFormController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = [];
		$this->id_reason = "";	
		new ReasonBD;	
		new InpoutBD;
	}

	function index()
	{
		return $this->render('error/404');
	}

	function entry()
	{
		$this->re_view(1, "entry", "Entrada");
	}


	function output()
	{
		$this->re_view(2, "output", "Salida");
	}

	private function re_view($num, $type, $na)
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$institute = new InstitucionModel;
			$data = [
				'institutes' => $institute->all(),
				'type' => $na,
			];
			return $this->render("inventario/entry_form", $data);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save($num);
			return redirect("detail_inventory/$type/{$this->id_reason}");
		}
	}

	private function save($num)
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()){
				$this->save_product($num);
			}else{
				return redirect('entry_inventory');
			}	
		}
	}

	private function save_product($num)
	{
		$reason = new ReasonModel;
		$reason->id_account = sessionLocal('user')->id;
		$reason->id_institute = (int)test_input($_POST['institute']);
		$reason->status = $num;
		$reason->name = test_input($_POST['name']);
		$reason->description = test_input($_POST['description']);
		$reason->save();
		$id_reason = $reason->execute_query("SELECT * FROM reason ORDER BY id DESC LIMIT 1")[0]->id;
		$this->id_reason = $id_reason;
		foreach ($_POST as $key => $value) {
			$pre = explode("_", $key);
			if (count($pre) == 2) {
				$product = new ProductModel;
				$res = $product->execute_query("SELECT * FROM  product WHERE id={$pre[1]} and name LIKE '{$pre[0]}%'");
				if (!empty($res[0])) {
					$inpout = new InpoutModel;
					$inpout->id_product = $res[0]->id;
					$inpout->id_reason = $id_reason;
					$inpout->quantity = $value;
					$inpout->type = $num;
					$inpout->save();
				}
			}
		}
	}

	private function form_valid()
	{
		$data = [
			'institute' => 'institucion',
			'name' => 'nombre',
			'description' => 'descripcion'
		];

		foreach ($data as $key => $value) {
			if (!isset($_POST[$key])) {
				array_push($this->error, "error {$key}");
			}
		}
		if (count($this->error) != 0) {
			return false;
		}
		return true;
	}
	


	function search_entry()
	{
		$data = test_input($_GET['q']);
		if (!empty($data)) {
			$product = new ProductModel;
			$query = "SELECT * FROM product WHERE name LIKE '{$data}%'";
			$data = $product->execute_query($query);	
			if (!empty($data)) {
				echo json_encode(['rs'=>$data]);
			}else{
				echo json_encode(['rs'=>false]);
			}
		}
	}

	function search_id($id)
	{
		$data = (int)$id;
		if (!empty($data)) {
			$product = new ProductModel;
			$query = "SELECT * FROM product WHERE id = {$data}";
			$data = $product->execute_query($query);	
			if (!empty($data)) {
				echo json_encode(['rs'=>$data[0], 'disp' => existence_products($data[0]->id)]);
			}else{
				echo json_encode(['rs'=>false]);
			}
		}
	}
}
?>