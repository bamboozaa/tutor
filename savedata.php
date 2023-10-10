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
	
	$name = $_POST["name"];
	$idcard = $_POST["idcard"];
	$nickname = $_POST["nickname"];
	$mobile = $_POST["mobile"];
	$lineid = $_POST["lineid"];
	$email = $_POST["email"];
	$school_name = $_POST["school_name"];
	$level = $_POST["level"];
	$school_province = $_POST["school_province"];
	$school_scholarship = $_POST["school_scholarship"];
	$school_scholarship_other = $_POST["school_scholarship_other"];
	$station = $_POST["station"];
	$date_t = date("d/m/Y");
	
	if ($school_scholarship_other) {
		$scholarship = $school_scholarship_other;
	} else {
		$scholarship = $school_scholarship;
	}
	
	$sql_cardid = "select stu_idcard from student where stu_idcard = '$idcard' and stu_station = '$station'";
	$dbquery_cardid = mysqli_query($my_connect, $sql_cardid) or die("Query failed" . mysqli_error($my_connect));	
	$num_rows = mysqli_num_rows($dbquery_cardid);
	
	if ($num_rows) {	
?>	
			<div class="container" style="margin-top: 10px">
				<div class="col-lg-offset-2 col-lg-8">
				<div class="panel panel-default panel-info" style="margin-top:20px">
					<div class="panel-body">
						<div align="center">
							<img width="1200" height="200" src="images/tutor_banner.jpg"  class="img-responsive">
						</div>
						<h4 class="text-center" style="color:#25ABE2">โครงการติวเตรียมสอบเข้ามหาวิทยาลัย</h4>
						<h4 class="text-center" style="color:#25ABE2">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</h4>	<br>		

						<div class="col-sm-12" align="center" style="margin-top:20px">
							<span style="color:#2e3192; font-size:16px; font-weight:medium">นักเรียนได้สมัครโครงการ UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน สนามนี้แล้ว!!!</span><br><br>
							
							<span style="color:#2e3192; font-size:16px; font-weight:medium">สามารถตรวจสอบข้อมูลการสมัครได้ที่
							<br>เว็บไซต์ของโครงการ	<a target="_blank" href="index.html">https://tutor.utcc.ac.th</a> หรือ <a target="_blank" href="checkregister.php">คลิกที่นี่</a></span>
							<div style="margin-top:100px">
								<button type="submit" class="btn btn-info" onclick="location.href='register.php';">&nbsp;&nbsp;ปิด&nbsp;&nbsp;</button>	
							</div>	
						</div>
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 	
<?php	
	} else {
		
			$query_insert = "INSERT INTO `student` (`stu_no`,`stu_name`,`stu_idcard`,`stu_nickname`,`stu_mobile`,`stu_lineid`,`stu_email`,`stu_level`,`stu_school`,`stu_school_province`,`stu_scholarship`,`stu_station`,`stu_update`) 
							VALUES (NULL,'$name','$idcard','$nickname','$mobile','$lineid','$email','$level','$school_name','$school_province','$scholarship','$station','$date_t')";	
		//$dbquery = mysql_query($query) or die ("<br><br><br><br><br><br>ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง<br><br><br><br><br><br>");		
		
		$strSQL = "UPDATE station SET sta_count = sta_count + 1 WHERE sta_name = '$station'";
		$objQuery = mysqli_query($my_connect, $strSQL);
		
		if(!mysqli_query($my_connect, $query_insert)){
			echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง";
		}else{						
			$last_id = mysqli_insert_id($my_connect);
			echo "<meta http-equiv=\"refresh\" content=\"0; url=confirmdata.php?stuno=$last_id\"> ";
		}
	}
?>
