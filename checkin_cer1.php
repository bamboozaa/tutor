<?php
	header('Content-type: application/pdf');
	require('fpdf/fpdf.php');
	require('dbconnect.php');	
	
	$stuno = $_GET['stuno'];
	$stuno1	= explode(".", $stuno);
	
	$pdf = new FPDF();
	
	$db_sql = "select * from student where stu_idcard = $stuno1[0]";                 
	$db_query = mysqli_query($my_connect, $db_sql);
	$result = mysqli_fetch_array($db_query);
	
	$pdf->AddPage(L);
	$pdf->Image('images/Math-1.png', 0, 0, $fpdf->w, $fpdf->h);
	$pdf->AddFont('heavent','','DB Heavent Bd v3.2.1.php');
	
	$pdf->SetY(103);
	$pdf->SetFont('heavent','',36);
	$pdf->Cell(0,10,iconv('utf-8','cp874',$result['stu_name']),0,1,'C');
	
	$db_sql1 = "select * from station where sta_no = $stuno1[1]";                 
	$db_query1 = mysqli_query($my_connect, $db_sql1);
	$result1 = mysqli_fetch_array($db_query1);	
	
	$pdf->SetXY(61,139.5);
	$pdf->SetFont('heavent','',30);
	$pdf->Cell(0,10,iconv('utf-8','cp874',$result1['sta_date']),0,1,'');	
	
	$pdf->SetXY(170,139.5);
	$pdf->SetFont('heavent','',30);
	$pdf->Cell(0,10,iconv('utf-8','cp874',$result1['sta_station']),0,1,'');		

	$pdf->Output();
			
 ?>  
