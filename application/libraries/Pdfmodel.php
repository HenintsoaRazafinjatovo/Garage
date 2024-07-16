<?php 
require_once APPPATH . 'libraries/fpdf/fpdf.php';
class Pdfmodel extends FPDF
{
    function __construct()
    {
        parent::__construct('L','mm','A5');
    }
    function Header()
    {
        $this->SetFont('Arial', '', 15);
        $this->Cell(80, 10);
        // Logo
        // $this->Image('../assets/logo-ITU.png', 15, 6, 55);
        $this->SetTextColor(128, 128, 128);
        $this->Cell(30, 10, utf8_decode('Facture GARAGE'), 0, 0, 'C');
        $this->Ln(20);
    }
    
    function Body($data)
    {
        $this->Ln(15);
        $this->SetFont('Arial', 'B', 12);
        
        // Service
        $this->Cell(10, 10, '', 0, 0);
        $this->Cell(36, 10, "Service:", 0, 0);
        $this->SetFont('Arial','', 12);
        $this->Cell(100, 10, utf8_decode($data['intitule']), 0, 1);
        
        // Date début
        $this->Cell(10, 10, '', 0, 0);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(36, 10, utf8_decode("Date début:"), 0, 0);
        $this->SetFont('Arial','', 12);
        $this->Cell(100, 10, $data['dateDebut'], 0, 1);
        
        // Date fin
        $this->Cell(10, 10, '', 0, 0);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(36, 10, utf8_decode("Date fin:"), 0, 0);
        $this->SetFont('Arial','', 12);
        $this->Cell(100, 10, $data['dateFin'], 0, 1);
        
        // Prix
        $this->Ln(20);
        $this->Cell(80, 10, '', 0, 0);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(36, 20, utf8_decode("Prix:"), 0, 0);
        $this->SetFont('Arial','', 20);
        $this->Cell(50, 20, utf8_decode($data['prix'].' Ar'), 0, 1);
    }
    function FancyTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 12);
        
        // En-tête
        $w = array(40, 35, 45, 40); // Largeurs des colonnes
        for($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '');
        
        // Données
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}