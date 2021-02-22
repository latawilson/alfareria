<?php
include 'plantilla.php';
require_once("../clases/cls_conexion.php");
$pdf = new PDF();

require_once("../clases/cls_pedido.php");
$obj_ped= new pedido();
$result=$obj_ped->consultart();
// $datos= array();


$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetTextColor(253, 254, 254  );
$pdf->SetFillColor(244, 81, 30);
$pdf->SetFont('Times','B',10);
$pdf->Cell(10,6,utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(20,6,'Nombre ',1,0,'C',1);
$pdf->Cell(20,6,'Apellido',1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Direcci&oacuten'),1,0,'C',1);
$pdf->Cell(30,6,'Fecha del pedido',1,0,'C',1);
$pdf->Cell(40,6,'Fecha del comprobante',1,0,'C',1);
$pdf->Cell(30,6,'Estado',1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Total'),1,1,'C',1);

while($row= mysql_fetch_array($result))
{
 $pdf->SetTextColor(0, 0, 0  );
 $pdf->SetFillColor(247, 249, 249  );
    $pdf->Cell(10,6,$row ['id_ped'],1,0,'C',1);
	$pdf->Cell(20,6,$row ['nombre_cli'],1,0,'C',1);
	$pdf->Cell(20,6,$row ['apellido_cli'],1,0,'C',1);
	$pdf->Cell(20,6,$row ['direccion_entriega_ped'],1,0,'C',1);
	$pdf->Cell(30,6,$row ['fecha_ped'],1,0,'C',1);
	$pdf->Cell(40,6,$row ['fecha_compro_ped'],1,0,'C',1);
	$pdf->Cell(30,6,$row ['estado_ped'],1,0,'C',1);
	$pdf->Cell(20,6,$row ['total_ped'],1,1,'C',1);

}

$pdf->Output();
?>