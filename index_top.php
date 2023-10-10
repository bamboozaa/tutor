<?php 
//ob_start();
@session_start(); 

?>

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

<body>
	<!-- start menu -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		    	</button>
				<a class="navbar-brand" href="https://www.utcc.ac.th/" target="_blank" style="padding:10px;">
					<img src="images/tutor_banner.jpg" class="img-responsive" width="310" height="50">
				</a>
			</div>			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav navbar-right">
					<li><a href="checksum_tutor.php">จำนวนผู้สมัครรายจังหวัด</a></li>
					<li><a href="checksum_checkin.php">จำนวนผู้เข้าติวรายจังหวัด</a></li>
		        	<li><a href="checkname_tutor.php">ข้อมูลผู้สมัคร</a></li>
					<li><a href="signout.php">ออกจากระบบ</a></li>
		        </ul>			
			</div>
      	</div><!-- /.container -->
    </nav><!-- /.navbar -->  
	<!-- end menu -->
	