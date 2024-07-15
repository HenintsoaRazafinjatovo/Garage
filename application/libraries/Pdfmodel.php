<?php 
require_once APPPATH . 'libraries/fpdf/fpdf.php';
class Pdfmodel extends FPDF
{
    function __construct()
    {
        
        parent::__construct();
    }
    function Header()
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(100, 10);
        // $this->Image('../assets/logo-ITU.png', 15, 6, 55);
        $this->SetTextColor(128, 128, 128);
        $this->Cell(20, 10, utf8_decode('Facture GARAGE'));
        $this->SetFont('Arial', '', 12);
        $this->Ln(10);
        // $this->Cell(58, 20);
        // $this->SetTextColor(0, 42, 112);
        // $this->Cell(50, 20, utf8_decode("RELEVÉ DE NOTES ET RESULTATS"));
    }
    
    function Body($idRdv)
    {
        $this->load->model('RdvModel');
        $rdv = $this->RdvModel->getById($idRdv);
        $this->load->model('Service');
        $service=$this->Service->getById($rdv['id_Service']);
        $dateFin=$this->RdvModel->slotDisponibles($rdv['dateHdebut'],$rdv['Id_Service'])[1];
        $this->Ln(20);
        $this->SetFont('Arial', '', 10);
        $this->Cell(8, 10);
        $this->Cell(36, 10, "Service:");
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, $service['intitule']);
        $this->Ln(5);
        $this->Cell(8, 10);
        $this->SetFont('Arial', '', 10);
        $this->Cell(36, 10, utf8_decode("Date debut:"));
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, $rdv['dateHdebut']);
        $this->Ln(5);
        $this->Cell(8, 10);
        $this->SetFont('Arial', '', 10);
        $this->Cell(36, 10, utf8_decode("Date fin:"));
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, $dateFin);
        $this->Ln(5);
        $this->Cell(8, 10);
        $this->SetFont('Arial', '', 10);
        $this->Cell(36, 10, utf8_decode("Prix:"));
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, $rdv['prix']);
        $this->Ln(5);
    }

}