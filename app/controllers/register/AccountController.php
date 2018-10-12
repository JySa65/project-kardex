<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\models\AccountModel;
use app\databases\AccountBD;
class AccountController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
		new AccountBD;
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('account/account_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();
		}
	}

	function update($id)
	{
		$account = new AccountModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('account/account_form', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->save($id);	
		}
	}

	function delete($id)
	{
		$account = new AccountModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('account/account_delete', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			if (isset($_POST['csrftoken'])) {
				if($user->delete($user->id)){
					return redirect('list_account', ['message' => 'Cuenta eliminada Sastifactoriamente']);
				}else{
					return redirect('list_account', ['message' => 'Cuenta No Pudo Ser Eliminada']);
				}
			}else{
				return $this->render('error/403');
			}	
		}
	}

	private function save($id=null)
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()) {
				$account = new AccountModel;
				$account->nationality = test_input($_POST['nacionality']);
				$account->cedula = (int)test_input($_POST['cedula']);
				$account->name = test_input($_POST['name']);
				$account->last_name = test_input($_POST['last_name']);
				$account->email = test_input($_POST['email']);
				$account->address = test_input($_POST['address']);
				$account->level = test_input($_POST['level']);
				if ($id == null) {
					$account->password = encrypt(test_input($_POST['cedula']));
					$comprobar = $account->execute_query("SELECT * FROM account WHERE cedula='{$account->cedula}' OR email='{$account->email}'");
					if (!empty($comprobar)) {
						return redirect('account/new', ['error' => 'La Cedula o el correo ya existe']);
					}
					$account->save();
					return redirect('list_account');
				}else{
					$account->id = (int)test_input($id);
					$account->save();
					return redirect('list_account');
				}
			}else{
				if ($id==null) {
					return redirect('account/new', ['error' => $this->error]);
				}
				return redirect("account/update/{$id}", ['error' => $this->error]);
			}
		}
	}

	private function form_valid($id=null)
	{
		$data = [
			'nacionality' => 'nacionalidad',
			'cedula' => 'cedula', 
			'name' => 'nombre', 
			'last_name' => 'apellido',
			'email' => 'correo electronico',
			'address' => 'direccion',
		];
		$data_text = ['nacionality', 'name', 'last_name', 'level'];
		$data_len = ['cedula'];
		foreach ($data as $key => $value) {
			if (empty($_POST[$key])) {
				array_push($this->error, "La Variable {$value} es requerida");	
			}
		}
		foreach ($data_text as $value) {
			if (!test_text(test_input($_POST[$value]))) {
				array_push($this->error, "El Campo {$data[$value]} Es Solo Letra");	
			}
		}
		if (!test_number(test_input($_POST['cedula']))) {
			array_push($this->error, "El Campo cedula Es Solo numero");	
		}
		if (!test_input(test_email($_POST['email']))) {
			array_push($this->error, "El Campo email no es correcto");	
		}
		foreach ($data_len as $value) {
			if (strlen($_POST[$value]) < 7) {
				array_push($this->error, "La logitud del campo {$data[$value]} es muy corto mayor o igual 7");		
			}
		}
		if (count($this->error) != 0) {
			return false;
		}
		return true;


	}
}

?>