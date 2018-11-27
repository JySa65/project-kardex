<?php 
/**
 * 
 */
use app\report\PDF;
use app\models\InstitucionModel;
use app\databases\InstitucionBD;
class PruebaController 
{
	
	function __construct()
	{
		new InstitucionBD;
	}

	function index()
	{
		$pdf = new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'BU', 14);
		$pdf->Cell(180, 4, 'Listado De Instituciones', 0, 1, 'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 5, 'Rif', 1, 0, 'C');
		$pdf->Cell(110, 5, 'Nombre', 1, 0, 'C');
		$pdf->Cell(40, 5, 'Telefono', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$institutes = $this->list_institute();
		foreach ($institutes as $institute) {
			$pdf->Cell(40, 5, "{$institute->rif}", 1, 0, 'C');
			$pdf->Cell(110, 5, utf8_decode("{$institute->name}"), 1, 0, 'C');
			$pdf->Cell(40, 5, "{$institute->tlf}", 1, 1, 'C');
		}
		$pdf->Output();
	}

	function list_institute()
	{
		$institucion = new InstitucionModel;
		$institucions = $institucion->all();
		return $institucions;
	}
}
?>