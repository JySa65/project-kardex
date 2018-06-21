<?php 
/**
 * 
 */
use framework\view\View;
class AccountController extends View
{
	
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('account/account_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			echo "string";
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

		if (count($this->text) != 0) {
			return false;
		}
		return true;


	}
}

?>