<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use app\models\AccountModel;
use framework\view\View;
class ChangePasswordController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function index()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('index/change_password');		
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();
			
		}
	}

	private function save()
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()) {
				$account = new AccountModel;
				$id = sessionLocal('user')->id;
				$result = $account->find('id', '=', $id);
				if (encrypt($_POST['password_old']) === $result->password) {
					if ($_POST['password_old'] !== $_POST['password_new1']) {
						$account->id = $id;
						$account->password = encrypt($_POST['password_new1']);
						$account->save();
						session_start();
						session_destroy();
						return redirect('login');
					}else{
						return redirect('change_password', ['error' => "La Contraseña No Puede Ser Igual A La Anterior"]);
					}
				}else{
					return redirect('change_password', ['error' => "La Contraseña Actual No Coincide Con La Anterior"]);
				}
			}else{
				return redirect('change_password', ['error' => $this->error]);
			}
		}
	}

	private function form_valid($id=null)
	{
		$data = [
			'password_old' => 'Contraseña Actual',
			'password_new1' => 'Nueva Contraseña', 
			'password_new2' => 'Repetir Contraseña', 
		];
		foreach ($data as $key => $value) {
			if (empty($_POST[$key])) {
				array_push($this->error, "El Campo {$value} es requerida");	
			}
			if (strlen($key) <= 8 and strlen($key) >= 12) {
				array_push($this->error, "La Longitud Del Campo {$value} No Es La Correcta");	
			}
		}
		if ($_POST['password_new1'] != $_POST['password_new2']) {
			array_push($this->error, "La Contraseña No Coinciden");
		}

		if (count($this->error) != 0) {
			return false;
		}
		return true;
	}
}



?>