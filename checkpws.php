<?php
 	
 	session_start();
	require "dbconnect.php";	
	//error_reporting(0);  
	$user = $_POST["username"];
	$pass = $_POST["password"];

	if(empty($user) || empty($pass)){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php\"> ";
	} else {
		$sql = "select * from `tbl_user` where u_username ='$user' and u_password = '$pass'";                 
		$dbquery = mysqli_query($my_connect, $sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง". mysqli_error($my_connect));
		$result = mysqli_fetch_array($dbquery);

		if(empty($result)){
		   //die("Invalid user name and password");
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalSignout\"> ";		   
		} else if($result) {	
		   	//echo "Login pass!<br>";
		   	$_SESSION['user'] = $user;
		   	
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checksum_tutor.php\"> ";
		
		} else {
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalSignout\"> ";
		}
	}

?>
