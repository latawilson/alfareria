<?php
include '../reporte_pdf/plantilla1.php';
require_once("../clases/cls_conexion.php");
$pdf = new PDF('L','mm','A4');

require_once ("../clases/cls_cliente.php");
$obj_cliente = new asignatura();
$resultcli= $obj_cliente->ClientPDF($_GET['id_cli'],$_GET['id_ped']);



$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetTextColor(253, 254, 254  );
$pdf->SetFillColor(244, 81, 30);
$pdf->SetFont('Times','B',14);
$pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(20,6,'Nombre ',1,0,'C',1);
$pdf->Cell(20,6,'Apellido',1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Direccion'),1,0,'C',1);
$pdf->Cell(170,6,'DETALLE',1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Total'),1,1,'C',1);


while($row= mysql_fetch_array($resultcli))
{
	$pdf->SetTextColor(0, 0, 0 );
	$pdf->SetFillColor(247, 249, 249  );
	$id = $row ['id_ped'];
	$nombre = $row ['nombre_cli'];
	$apellido = $row ['apellido_cli'];
	$total = $row ['total_ped'];
	$direcion = $row['direccion_entriega_ped'];
	$unido = $row['todo'];
}
        

$pdf->Cell(10,6,$id,1,0,'c',1);
$pdf->Cell(20,6,$nombre,1,0,'c',1);
$pdf->Cell(20,6,$apellido,1,0,'c',1);
$pdf->Cell(30,6,$direcion,1,0,'c',1);
$pdf->Cell(170,6,$unido,1,0,'c',1); 
$pdf->Cell(20,6,$total,1,0,'c',1);

$pdf->Output();
?>