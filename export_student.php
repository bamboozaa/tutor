<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_student.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<body>

<table width="2163" border="1">
	<tr>
		<th width="60" rowspan="2"><div align="center"><strong>ลำดับที่</strong></div></th>
		<th width="200" rowspan="2"><div align="center"><strong>ชื่อ - สกุล</strong></div></th>
		<th width="100" rowspan="2"><div align="center"><strong>สถานที่ติว</strong></div></th>
		<th width="150" rowspan="2"><div align="center"><strong>mobile</strong></div></th>
		<th width="150" rowspan="2"><div align="center"><strong>lineid</strong></div></th>
		<th width="200" rowspan="2"><div align="center"><strong>email</strong></div></th>
		<th width="120" rowspan="2"><div align="center"><strong>ระดับชั้น</strong></div></th>			
		<th width="200" rowspan="2"><div align="center"><strong>โรงเรียนที่ศึกษา</strong></div></th>
		<th width="120" rowspan="2"><div align="center"><strong>จังหวัด</strong></div></th>	
		<th width="200" rowspan="2"><div align="center"><strong>คณะที่สนใจ</strong></div></th>
		<th width="100" rowspan="2"><div align="center"><strong>วันที่สมัคร</strong></div></th>
		<th width="120" colspan="2">คณิตศาสตร์1</th>
		<th width="120" colspan="2">ภาษาอังกฤษ</th>
	</tr>

	<tr>
		<th width="60"><div align="center"><strong>in</strong></div></th>
		<th width="60"><div align="center"><strong>out</strong></div></th>
		<th width="60"><div align="center"><strong>in</strong></div></th>
		<th width="60"><div align="center"><strong>out</strong></div></th>				
	</tr>

	<?php 
		require "dbconnect.php";	
	
		$station = $_POST['station'];
		
		if ($station) { $checkname = "where stu_station = '$station'"; }
					
		$sql = "select * from `student` $checkname order by `stu_no`  ";                      
		$dbquery = mysqli_query($my_connect, $sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));
	
                $num_rows = mysqli_num_rows($dbquery);
		$row = 0;
		
		while ($row < $num_rows){
			$result = mysqli_fetch_array($dbquery);
			$no = $result["stu_no"];
			$stu_name = $result["stu_name"];		
			$stu_mobile = $result["stu_mobile"];
			$stu_lineid = $result["stu_lineid"];
			$stu_email = $result["stu_email"];
			$stu_level = $result["stu_level"];
			$stu_school = $result["stu_school"];
			$stu_school_province = $result["stu_school_province"];
			$stu_scholarship = $result["stu_scholarship"];
			$stu_station = $result["stu_station"];
			$stu_update = $result["stu_update"];
			$chk_in1 = $result["chk_in1"];
			$chk_in2 = $result["chk_in2"];
			$chk_out1 = $result["chk_out1"];
			$chk_out2 = $result["chk_out2"];					
	?>	
	<tr>
		<td valign="top"><div align="center"><?php echo $row+1?>.</div></td>
		<td valign="top"><?php echo $stu_name?></td>
		<td valign="top"><?php echo $stu_station?></td>
		<td valign="top"><?php echo $stu_mobile?></td>
		<td valign="top"><?php echo $stu_lineid?></td>
		<td valign="top"><?php echo $stu_email?></td>
		<td valign="top"><?php echo $stu_level?></td>		
		<td valign="top"><?php echo $stu_school?></td>
		<td valign="top"><?php echo $stu_school_province?></td>
		<td valign="top"><?php echo $stu_scholarship?></td>
		<td valign="top"><?php echo $stu_update?></td>
		<td valign="top"><?php echo $chk_in1?></td>
		<td valign="top"><?php echo $chk_out1?></td>
		<td valign="top"><?php echo $chk_in2?></td>
		<td valign="top"><?php echo $chk_out2?></td>			
	</tr>
<?php
	$row++;
	} 
?>	
</table>

</body>
</html>
