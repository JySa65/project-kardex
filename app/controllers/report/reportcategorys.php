<?php 
/**
 * 
 */
use app\report\PDF;
use app\models\CategoryModel;
use app\databases\CategoryBD;
class reportcategorys
{
	
	function __construct()
	{
		new CategoryBD;
	}

	function index()
	{
		$pdf = new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'BU', 14);
		$pdf->Cell(180, 4, 'Listado De Categorias de producto', 0, 1, 'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 5, 'Rif', 1, 0, 'C');
		$pdf->Cell(110, 5, 'Nombre', 1, 0, 'C');
		$pdf->Cell(40, 5, 'Telefono', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$categorys = $this->list_category();
		foreach ($categorys as $category) {
			$pdf->Cell(40, 5, "{$category->name}", 1, 0, 'C');
			$pdf->Cell(110, 5, utf8_decode("{$category->description}"), 1, 0, 'C');
			$pdf->Cell(40, 5, "{$category->name}", 1, 1, 'C');
		}
		$pdf->Output();
	}

	function list_category()
	{
		$category = new CategoryModel;
		$categorys = $category->all();
		return $categorys;
	}
}
?>