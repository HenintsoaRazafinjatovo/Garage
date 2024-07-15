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
        // $this->Image('../assets/logo-ITU.png', 15, 6, 55);
        $this->SetTextColor(128, 128, 128);
        $this->Cell(20, 10, utf8_decode('Facture GARAGE'));
        $this->SetFont('Arial', '', 12);
        $this->Ln(10);
        // $this->Cell(58, 20);
        // $this->SetTextColor(0, 42, 112);
        // $this->Cell(50, 20, utf8_decode("RELEVÉ DE NOTES ET RESULTATS"));
    }
    
    function Body($data)
    {
        $this->Ln(15);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(8, 10);
        $this->Cell(36, 10, "Service:");
        $this->SetFont('Arial','', 12);
        $this->Cell(10, 10, $data['intitule']);
        $this->Ln(7);
        $this->Cell(8, 10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(36, 10, utf8_decode("Date debut:"));
        $this->SetFont('Arial','', 12);
        $this->Cell(10, 10, $data['dateDebut']);
        $this->Ln(7);
        $this->Cell(8, 10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(36, 10, utf8_decode("Date fin:"));
        $this->SetFont('Arial','', 12);
        $this->Cell(10, 10, $data['dateFin']);
        $this->Ln(7);
        $this->Cell(80, 10);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(36, 72, utf8_decode("Prix:"));
        $this->SetFont('Arial','', 20);
        $this->Cell(10, 72, $data['prix'].' Ar');
    }

}