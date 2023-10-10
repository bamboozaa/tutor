<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<link rel="icon" href="images/UTCC.png" type="image/x-icon"/>
<link rel="shortcut icon" href="images/UTCC.png" type="image/x-icon" />    
<title>UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- style -->
<link href="css/style.css" rel="stylesheet">    

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="offcanvas.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!-- [if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>    
</head>

<?php	
	require "dbconnect.php";
	
	$stu_no = $_POST["stu_no"];
	$date_t = date("d/m/Y");
	
	$sql_student = "select * from student where stu_idcard = '$stu_no'";
	$dbquery_student = mysqli_query($my_connect, $sql_student) or die("Query failed" . mysqli_error($my_connect));	
	$num_rows = mysqli_num_rows($dbquery_student);
	
	$result = mysqli_fetch_array($dbquery_student);
	$stu_cardid = $result["stu_cardid"];
	$chk_in2 = $result["chk_in2"];
	$chk_out2 = $result["chk_out2"];
		
	
	if ($chk_in2)  {
		
		$query_update = "UPDATE `student` SET `chk_out2`='yes' WHERE stu_idcard = '$stu_no'";	
		
		
		if(!mysqli_query($my_connect, $query_update)){
			echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง";
		}else{						
			$last_id = mysqli_insert_id($my_connect);
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkin_detail.php?stuno=$stu_no#survey\"> ";
		}
	} else {
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkin_detail.php?stuno=$stu_no#confirmdata\"> ";
	}
?>
