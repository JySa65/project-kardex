<?php 
/**
 * 
 */
if (!is_authenticated()) {
	return redirect('login');
}
use framework\view\View;
use app\databases\InstitucionBD;
use app\models\InstitucionModel;
class InstitucionController extends View
{
	function __construct()
	{
		parent::__construct();
		$this->error = array();
		new InstitucionBD;
	}

	function new()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('institucion/institucion_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();
		}
	}

	function update($id)
	{
		$account = new InstitucionModel;
		$user = $account->find('id', '=', $id);
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			if (count($user) != 0) {
				return $this->render('institucion/institucion_form', ['user' => $user]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->save($id);	
		}
	}

	private function save($id=null)
	{
		if (!val_csrf()) {
			return $this->render('error/403');
		}else{
			if ($this->form_valid()) {
				$institucion = new InstitucionModel;
				$institucion->rif = test_input($_POST['rif']);
				$institucion->name = test_input($_POST['name']);
				$institucion->description = test_input($_POST['description']);
				$institucion->address = test_input($_POST['address']);
				$institucion->tlf = (string)test_input($_POST['tlf_part1']) . (string)test_input($_POST['tlf_part2']);
				if ($id == null) {
					$comprobar = $institucion->execute_query("SELECT * FROM institucion WHERE rif='{$institucion->rif}'");
					if (!empty($comprobar)) {
						return redirect('institucion/new', ['error' => 'Institucion ya existente']);
					}
					$institucion->save();
					return redirect('list_institution');
				}else{
					$institucion->id = $id;
					$institucion->save();
					return redirect('list_institution');
				}
			}else{
				return redirect('institucion/new', ['error' => $this->error]);
			}
		}
	}

	private function form_valid()
	{
		$data = [
			'name' => 'nombre de la institucion', 
			'description' => 'Descripcion de la institucion',
			'rif' => 'rif de la institucion', 
			'address' => 'Direccion de la institucion',
			'tlf_part1' => 'Telefono De la institucion',
			'tlf_part2' => 'Telefono De la institucion',
		];
		foreach ($data as $key => $value) {
			if (empty($_POST[$key])) {
				array_push($this->error, "La Variable {$value} es requerida");	
			}
		}
		if (count($this->error) != 0) {
			return false;
		}
		return true;


	}
}

?>