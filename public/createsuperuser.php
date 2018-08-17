<?php
#!/usr/bin/php
require('../vendor/autoload.php');
require('../setting.php');
require('../app/init.php');
use app\models\AccountModel;
use app\databases\AccountBD;

/**
 * This class have to create 
 * the superuser and save it in the database
 */
class Createsuperuser
{
	
	function __construct()
	{
		new AccountBD;
		echo "Bienvenido \nIngrerse nombre y contraseña \n"; 
		$this->form();
		echo "\nUsuario Creado Correctamente"; 
	}

	function form()
	{
		echo "Cedula: ";
		$this->ci = trim(fgets(STDIN)); 
		echo "Password: ";
		shell_exec('stty -echo'); 
		$this->password = rtrim(fgets(STDIN), "\n");
		$this->save(); 
	}

	function save()
	{
		$account = new AccountModel;
		$search_account = $account->find('cedula', '=', $this->ci);
		if (count($search_account) !=0) {
			die("\nUsuario Ya Existe");
		}
		$account->nationality = test_input("V");
		$account->cedula = test_input($this->ci);
		$account->password = encrypt(test_input($this->password));
		$account->level = test_input("administrador");
		$account->save();
	}
}

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	shell_exec('cls');
} else {
	shell_exec('reset');
}
new Createsuperuser;
?>