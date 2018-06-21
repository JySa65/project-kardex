<?php 
/**
 * 
 */
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

	private function save($id=null)
	{
		if ($this->form_valid()) {
			$account = new AccountModel;
			$account->nationality = test_input($_POST['nacionality']);
			$account->cedula = (int)test_input($_POST['cedula']);
			$account->name = test_input($_POST['name']);
			$account->last_name = test_input($_POST['last_name']);
			$account->password = encrypt(test_input($_POST['password']));
			$account->email = test_input($_POST['email']);
			$account->address = test_input($_POST['address']);
			$account->level = test_input($_POST['level']);
			if ($id == null) {
				$comprobar = $account->execute_query("SELECT * FROM account WHERE cedula='{$account->cedula}' OR email='{$account->email}'");
				if (!empty($comprobar)) {
					return redirect('account/new', ['error' => 'La Cedula o el correo ya existe']);
				}
				$account->save();
				return redirect('account/new');
			}else{

			}
		}else{
			// return redirect('account/new', ['error' => $this->error]);
		}
	}

	private function form_valid()
	{
		$data = [
			'nacionality' => 'nacionalidad',
			'cedula' => 'cedula', 
			'name' => 'nombre', 
			'last_name' => 'apellido',
			'email' => 'correo electronico',
			'level' => 'nivel de acceso',
			'address' => 'direccion',
			'password' => 'contraseña'
		];
		$data_text = ['nacionality', 'name', 'last_name', 'level'];
		$data_len = ['cedula', 'password'];
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
			$dat = strlen($value);
			echo "{$value} = {$dat} <br>";
			if (strlen($value) < 7) {
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