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
	$stuno = $_POST['username'];
	$stumobile = $_POST['password'];
	
	if ($stuno) {
		$sql = "select * from `student` where stu_idcard = $stuno";      
	} else {  
		$sql = "select * from `student` where stu_mobile = $stumobile";
	}         
	//print_r($sql);
	$dbquery = mysqli_query($my_connect, $sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));

        $num_rows = mysqli_num_rows($dbquery);
	$row = 0;
	
	if ($num_rows) {
	
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
							<span style="font-size:16px; font-weight:medium"><?php echo $stu_name?></span>
							<br>
							<?php 
								$sql_sta = "SELECT * FROM station WHERE sta_name = '$stu_station'";
								$dbquery_sta = mysqli_query($my_connect, $sql_sta) or die(mysqli_error($my_connect));
								$result_sta = mysqli_fetch_array($dbquery_sta);
							?>					
							<span style="color:#2e3192; font-size:16px; font-weight:medium">สถานที่ติว : </span>
							<span style="font-size:16px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
							<div class="col-sm-12" align="center" style="margin-top:20px; margin-bottom:20px">
								<span style="color:#2e3192; font-size:16px; font-weight:medium">เข้ากลุ่ม 
								<a target="_blank" href="<?php echo $result_sta[3]?>">OpenChat</a> สนามติว<br>เพื่อรับข่าวสารและเอกสารการติว</span><br>
								<?php if ($result_sta[0] == '2') {?>
								<span style="color:#2e3192; font-size:16px; font-weight:medium">รหัสสำหรับเข้า OpenChat ของท่านคือ <u><?php echo $result_sta[7]?></u></span><br>
								<?php }?><br>
								<a target="_blank" href="<?php echo $result_sta[3]?>"><img width="120" height="120" src="qr/<?php echo $result_sta[0]?>.jpg" ></a><br><br>
		          				<a href="<?php echo $result_sta[3]?>" target="_blank">
		              			<button type="button" class="btn btn-success">
			                		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
			  								<path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
									</svg>
			                		เข้ากลุ่ม Line OpenChat
		                		</button></a>
							</div>	
							<div class="col-sm-12" align="center" style="margin-top:10px; margin-bottom:30px">											
								<span style="color:#800000; font-size:14px; font-weight:medium">:: แก้ไขข้อมูลการสมัคร <a target="_blank" href="editregister.php?stuno=<?php echo $stu_no?>">คลิกที่นี่</a> ::</span>
							</div>
						</div>				
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 
<?php
		$row++;
		} 
	} else {
?>	
     		
			<div class="container" style="margin-top: 10px">
				<div class="col-lg-offset-2 col-lg-8">
				<div class="panel panel-default panel-info" style="margin-top:20px">
					<div class="panel-body">
						<div align="center">
							<img width="1200" height="200" src="images/tutor_banner.jpg"  class="img-responsive">
						</div>
						<h4 class="text-center" style="color:#25ABE2">โครงการติวเตรียมสอบเข้ามหาวิทยาลัย</h4>
						<h4 class="text-center" style="color:#25ABE2">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</h4>	<br><br>	
						
						<div class="col-sm-12" align="center" style="margin-top:10px">
							<span style="color:#2e3192; font-size:16px; font-weight:medium">ไม่พบข้อมูลการสมัครของท่าน
							<br>สามารถสมัครเข้าร่วมโครงการติวได้ที่นี่	
							<br>คลิก >> <a href="https://lin.ee/jyoQ47c" target="_blank"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="สมัครเข้าร่วมโครงการ" height="36" border="0"></a></span>
							<div style="margin-top:100px">
								<button type="submit" class="btn btn-info" onclick="location.href='checkregister.php';">&nbsp;&nbsp;ปิด&nbsp;&nbsp;</button>		
							</div>						
						</div>
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 

<?php 
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
	
	<!--
	<script type="text/javascript">
	    $(window).on('load',function(){
	        $('#Modal_Register').modal('show');
	    });
	</script>	 -->	
</body>
</html>
