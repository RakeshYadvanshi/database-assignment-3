<?php
include_once "fpdf/fpdf.php";

class Pdf extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('logo/conestogalogo.png', ($this->GetPageWidth() - 20) / 2,5, 20);
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 13);
        // Move to the right
        $this->Cell(0, 0, 'Conestoga College', 0, 0, 'C');
        // Line break
        $this->Ln(40);
    }
    function Footer()
    {
        $centerOfPage = $this->GetPageWidth() / 2;
        $this->Ln(50);
        $this->Line($centerOfPage + $this->GetX(), $this->GetY(), $centerOfPage + $this->GetX() + 60, $this->GetY());
        $this->Cell($this->GetPageWidth() * 0.60, 5, "Signature", 0, 0, 'R');
    }
}
