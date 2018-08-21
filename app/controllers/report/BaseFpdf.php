<?php 
/**
 * Esta clase es la base para todo los pdf que haras :D 
 */
namespace app\report;
class PDF extends \FPDF
{
    function Header()
    {
        $this->Image("../public/static/img/banner.png", 6, 5, 190, 30);
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(150, 4, '', 0, 0);
        $date = date("d/m/Y");
        $this->Cell(60, 4, "Fecha: {$date}", 0, 1, 'L');
        $this->Ln(4);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(180,10, "Pagina: {$this->PageNo()}/{nb}",0,0,'R');
    }
}
?>