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
	
	$stuno = $_GET['stuno'];
	
	$sql = "select * from `student` where stu_no = $stuno";                 
	$dbquery = mysqli_query($my_connect, $sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));

    $num_rows = mysqli_num_rows($dbquery);
	$row = 0;
	
	while ($row < $num_rows){
		$result = mysqli_fetch_array($dbquery);
		$stu_no = $result["stu_no"];
		$stu_name = $result["stu_name"];
		$stu_mobile = $result["stu_mobile"];
		$stu_lineid = $result["stu_lineid"];
		$stu_email = $result["stu_email"];
		$stu_school = $result["stu_school"];
		$stu_station = $result["stu_station"];			
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
				
				<div class="col-lg-offset-1 col-lg-10">							
					<p><span style="color:#2e3192; font-size:16px; font-weight:medium">ชื่อ-สกุล : </span>
					<span style="font-size:16px; font-weight:medium"><?php echo $stu_name?></span></p>
					<?php 
						$sql_sta = "SELECT * FROM station WHERE sta_name = '$stu_station'";
						$dbquery_sta = mysqli_query($my_connect, $sql_sta) or die(mysqli_error($my_connect));
						$result_sta = mysqli_fetch_array($dbquery_sta);
					?>					
					<p><span style="color:#2e3192; font-size:16px; font-weight:medium">สถานที่ติว : </span>
					<span style="font-size:16px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
					<div class="col-sm-6" align="center" style="margin-top:10px">
						<span style="color:#2e3192; font-size:16px; font-weight:medium">ขั้นตอนที่ 1 เพื่อยืนยันตัวตน<br>เพิ่มเพื่อนใน
						<a target="_blank" href="https://lin.ee/jyoQ47c">Line OA</a> โครงการ</span><br>
						<a target="_blank" href="https://lin.ee/jyoQ47c"><img width="130" height="130" src="images/lineoa.png" ></a>
					</div>
					<div class="col-sm-6" align="center" style="margin-top:10px">
						<span style="color:#2e3192; font-size:16px; font-weight:medium">ขั้นตอนที่ 2 เพื่อรับเอกสารการติว<br>เข้ากลุ่ม 
						<a target="_blank" href="<?php echo $result_sta[3]?>">OpenChat</a> สนามติว</span><br>
						<a target="_blank" href="<?php echo $result_sta[3]?>"><img width="120" height="120" src="qr/<?php echo $result_sta[0]?>.jpg" ></a>
					</div>	
				</div>				

				<div class="col-sm-12" align="center" style="margin-top:15px">
					<span style="color:#2e3192; font-size:16px; font-weight:medium">สามารถตรวจสอบข้อมูลการสมัครภายหลังได้ที่
					<br>เว็บไซต์ของโครงการ	<a target="_blank" href="https://tutor.utcc.ac.th/">https://tutor.utcc.ac.th</a> หรือ <a target="_blank" href="https://tutor.utcc.ac.th/checkregister.php">คลิกที่นี่</a></span>
					<br><br>
					<button type="submit" class="btn btn-info" onclick="history.back()">&nbsp;&nbsp;ปิด&nbsp;&nbsp;</button>
				</div>
			</div>
		</div>				    
		</div>			        	
	</div> <!-- /container --> 
<?php
	$row++;
	} 
?>	     		

    <div class="container">
	<footer>
    	<div class="row">
        	<div class="col-md-4 col-md-offset-9" align="right">
	  			<p class="navbar-text"><span style="color:#2e3192">© 2023 - UTCC All Right Reserved</span></p>
	  		</div>
	  	</div>
	</footer>	
	</div> <!-- /container -->     
  	
	<!-- modal -->	     
    <div id="Modal_Register" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body  " >
                    <p> <strong>เราได้ข้อมูลการสมัครของท่านแล้ว</strong> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>    	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-filestyle.js"></script>	
	
	<script type="text/javascript">
	    $(window).on('load',function(){
	        $('#Modal_Register').modal('show');
	    });
	</script>		
</body>
</html>
