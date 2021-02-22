<?php
   require 'fpdf/fpdf.php';
   class PDF extends FPDF{
   function Header(){

   	$this->Image('../images/fon2.jpg',50,10,110);
   	$this->SetFont('Times','B',10);
   	$this->Cell(50);
     $this->Cell (250,10,date("Y/m/d"),0,0,'C');
     $this->Ln(20);
     $this->Cell(40);
     $this->SetFont('Times','B',20);
    $this->Cell (120,10,'Reporte de Pedidos',0,0,'C');
    $this->Ln(10);
   }
   function Footer(){

   	// Posici&oacuten: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }


   }
?>