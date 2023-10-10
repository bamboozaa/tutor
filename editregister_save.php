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
	$name = $_POST["name"];
	$idcard = $_POST["idcard"];
	$nickname = $_POST["nickname"];
	$mobile = $_POST["mobile"];
	$lineid = $_POST["lineid"];
	$email = $_POST["email"];
	$level = $_POST["level"];
	$school_name = $_POST["school_name"];
	$school_province = $_POST["school_province"];
	$school_scholarship = $_POST["school_scholarship"];
	$station = $_POST["station"];

	
	if ($idcard) {	
	$query_update_student = "UPDATE `student` SET `stu_name`='$name',`stu_idcard`='$idcard',`stu_nickname`='$nickname',`stu_mobile`='$mobile',`stu_lineid`='$lineid',`stu_email`='$email',
											 `stu_level`='$level',`stu_school`='$school_name',`stu_school_province`='$school_province',`stu_scholarship`='$school_scholarship',`stu_station`='$station'
									  WHERE stu_no = '$stu_no'";	
	} else {
	$query_update_student = "UPDATE `student` SET `stu_name`='$name',`stu_nickname`='$nickname',`stu_mobile`='$mobile',`stu_lineid`='$lineid',`stu_email`='$email',
											 `stu_level`='$level',`stu_school`='$school_name',`stu_school_province`='$school_province',`stu_scholarship`='$school_scholarship',`stu_station`='$station'
									  WHERE stu_no = '$stu_no'";	
	}	
		
	if(!mysqli_query($my_connect, $query_update_student)){
		echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง";
	}else{						
		$last_id = mysqli_insert_id($my_connect);
		echo "<meta http-equiv=\"refresh\" content=\"0; url=confirmdata.php?stuno=$stu_no\"> ";
	}
?>
