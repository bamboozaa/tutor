<?php

	require('fpdf/fpdf.php');

	$pdf = new FPDF();
	
	$pdf->AddPage();
	$pdf->AddFont('heavent','','DB Heavent Bd v3.2.1.php');
	
	$pdf->SetFont('heavent','',20);
	$pdf->Cell(0,10,'PHP TO PDF',0,1,'C');
	$pdf->Cell(0,10,'วิธีสร้างไฟล์ PDF ด้วย PHP',0,1,'C');
	
	
	$pdf->Output();

?>
