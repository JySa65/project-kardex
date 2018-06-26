<?php 
/**
 * 
 */
use framework\view\View;
use app\models\InstitucionModel;
use app\databases\InstitucionBD;


class ListInstitutionController extends View
{
	
	function __construct()
	{
			new InstitucionBD;	
	}

	function index()
	{
		$institucion = new InstitucionModel;
		$institucions = $institucion->all();
		return $this->render('institucion/list', ["institucions"=>$institucions]);

	}

}

?>