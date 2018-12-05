<?php 
/**
 * 
 */
use framework\view\View;
use app\models\{InstitucionModel, CategoryModel, ProductModel};
use app\report\PDF;

class ListInstitutionReportController extends View
{
	function __construct()
	{
		new \app\databases\InstitucionBD;
		new \app\databases\CategoryBD;
		new \app\databases\ProductBD;

		$this->institute = new InstitucionModel;
		$this->category = new CategoryModel;
		$this->product = new ProductModel;
	}

	function index()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$institutes = $this->institute->all();
			$products = $this->product->all();
			return $this->render('report/list_empresa', 
								[
									'institutes' => $institutes,
									'products' => $products
								]
			);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			return $this->generate_report();
		}
	}
	function get_product_by_category() 
	{
		$id = $_GET['id'];
		if (!empty($id)) {
			$products = $this->product->where('id_category', '=', $id);
			$rs = [];
			foreach ($products as $product) {
				$data = [
					"id" => $product->id,
					"name" => $product->name
				];
				array_push($rs, $data);
			}
			echo json_encode($rs);
		}
	}

	private function generate_report() 
	{
		$institute = $_POST['institute'];
		$type = $_POST['type'];
		$product = $_POST['product'];
		$date_min = !empty($_POST['min']) ? 
					$_POST['min'] : 
					date("Y-m-d",strtotime(date('Y-m-d')."- 100 year"));
		$date_max = !empty($_POST['max']) ? $_POST['max'] : date('Y-m-d');

		if (empty($institute)) {
				return redirect('report-list-empresa');
		}

		$institute_result = $this->institute->find('id', '=', $institute);
		if (empty($product)) {
			$results = $this->product->get_products_by_filter(
				$institute, $date_min, $date_max);
			return $this->report_pdf($institute_result, $results);
		}

		if(!empty($product) && $type == 0) {
			$results = $this->product->get_products_by_filter_product(
				$institute, $product, $date_min, $date_max);
			return $this->report_pdf($institute_result, $results);
		}

		if(!empty($product) && $type != 0) {
			$results = $this->product->get_products_by_filter_type(
				$institute, $product, $type, $date_min, $date_max);
			return $this->report_pdf($institute_result, $results);
		}
	}

	private function report_pdf($institute, $products) 
	{
		$pdf = new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'BU', 14);
		$pdf->Cell(180, 4, utf8_decode("Intitución: {$institute->name}"), 0, 1, 'C');
		$pdf->Ln(3);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(10, 7, '#', 1, 0, 'C');
		$pdf->Cell(25, 7, 'Fecha', 1, 0, 'C');
		$pdf->Cell(90, 7, 'Producto', 1, 0, 'C');
		$pdf->Cell(25, 7, 'Tipo', 1, 0, 'C');
		$pdf->Cell(30, 7, utf8_decode("Cantidad"), 1, 1, 'C');
		$pdf->SetFont('Arial', '', 11);
		$acum = 1;
		foreach ($products as $product) {
			$pdf->Cell(10, 7, $acum, 1, 0, 'C');
			$pdf->Cell(25, 7, date("Y-m-d",strtotime($product->created_at)), 1, 0, 'C');
			$pdf->Cell(90, 7, utf8_decode($product->name), 1, 0, 'C');
			$pdf->Cell(25, 7, utf8_decode($product->type == 1 ? 'Entrada' : 'Salida'), 1, 0, 'C');
			$pdf->Cell(30, 7, $product->quantity, 1, 1, 'C');
			$acum += 1;
		}
		$pdf->Output();
	}
}
?>