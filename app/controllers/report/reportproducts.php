<?php 
/**
 * 
 */
use app\report\PDF;
use app\models\ProductModel;
use app\databases\ProductBD;
class reportproducts
{
	
	function __construct()
	{
		new ProductBD;
	}

	function index()
	{
		$pdf = new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'BU', 14);
		$pdf->Cell(180, 4, 'Listado De productos', 0, 1, 'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(40, 5, 'CATEGORIA', 1, 0, 'C');
		$pdf->Cell(110, 5, 'NOMBRE', 1, 0, 'C');
		$pdf->Cell(40, 5, 'PRECIO UNITARIO', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$products = $this->list_product();
		foreach ($products as $product) {
			$pdf->Cell(40, 5, "{$product->id_category}", 1, 0, 'C');
			$pdf->Cell(110, 5, utf8_decode("{$product->name}"), 1, 0, 'C');
			$pdf->Cell(40, 5, "{$product->price}", 1, 1, 'C');
		}
		$pdf->Output();
	}

	function list_product()
	{
		$product = new ProductModel;
		$products = $product->all();
		return $products;
	}
}
?>