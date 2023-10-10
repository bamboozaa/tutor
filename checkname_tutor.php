<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<?php
	require_once("index_top.php");
	
	$_SESSION['user'];
	
	if (empty($_SESSION['user'])) {
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php\">";
	} else {	
	
		require "dbconnect.php";
		$emp_user = $_SESSION['user'];
		          
		$sql_user = "select * from `tbl_user` where u_username ='$emp_user'";
		$dbquery_user = mysqli_query($my_connect, $sql_user) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));
		$result_user = mysqli_fetch_array($dbquery_user);
		
		if(empty($result_user)){
			//die("Invalid user name and password");
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalSignout\"> ";		   
		} else {
 
 			if ($result_user[3] == '99') {
				echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalEdit\"> ";
			} else if ($result_user[3] == '0') {
?>	
	<!-- start product -->
	<div class="container">
		<div class="row" style="margin-top:120px; margin-bottom:50px">
		<div align="center"><span style="color:#000066; font-size:24px">ข้อมูลผู้สมัคร UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</span></div>
		<br><br>
		<form data-toggle="validator" role="form" id="registerForm" name="registerForm" action="checkname_tutor.php" Method="Post" enctype="multipart/form-data">
		<div class="row" style="padding-top: 10px">
			<div class="col-lg-3">
				<div class="form-group">
					<?php 
						$sql = "SELECT * FROM station_report";
						$dbquery = mysqli_query($my_connect, $sql) or die(mysqli_error($my_connect));
						$num_rows = mysqli_num_rows($dbquery);
					?>							
					<select class="form-control" name="station" id="station" style="font-size:14px">
						<option value="" selected>เลือกสถานที่ติว</option>
						<?php  
							while($result = mysqli_fetch_array($dbquery)){
						?>	
						<option value='<?php echo $result[1];?>' ><?php echo $result[2];?></option>
						<?php }?>																																						
					</select>
				</div>	
			</div>
			<div class="col-lg-3">
				<div class="form-group">
			      	<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;ค้นหา&nbsp;&nbsp;</button>
			      	<input type="hidden" name="off_status" value="1">
				</div>
			</div>		
		</div>
		</form>		
		<table class="table table-bordered table-striped" style="margin-top:20px">
			<tr class="active">
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ลำดับที่</span></td>
				<td width="30%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ชื่อ - นามสกุล</span></td>
				<td width="40%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				โรงเรียน</span></td>
				<td width="20%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				สถานที่ติว</span></td>				
			</tr>		  	

<?php 
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
		$stu_station = $result["stu_station"];			
?>					
			<tr>
				<td width="10%" align="center">&nbsp;<?php echo $row+1?>.</span></td>
				<td width="30%">&nbsp;<?php echo $stu_name?></td>
				<td width="40%">&nbsp;<?php echo $stu_school?></td>
				<td width="20%">&nbsp;<?php echo $stu_station?></td>
			</tr>
				
<?php
	$row++;
	} 
?>				
		</table>

		<form data-toggle="validator" role="form" id="exportForm" name="exportForm" action="export_student.php" Method="Post" enctype="multipart/form-data">
		<div class="row" style="padding-top: 10px">
			<div class="col-lg-3 offset-lg-11">		
				<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;Export&nbsp;&nbsp;</button>
				<input type="hidden" name="station" value="<?php echo $station?>">
			</div>
		</div>
		</form>
				
		</div>		        	
	</div> <!-- /container --> 

<?php } else { ?>

	<!-- start product -->
	<div class="container">
		<div class="row" style="margin-top:120px; margin-bottom:50px">
		<div align="center"><span style="color:#000066; font-size:24px">ข้อมูลผู้สมัคร UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</span></div>
		<br><br>
		<table class="table table-bordered table-striped" style="margin-top:20px">
			<tr class="active">
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ลำดับที่</span></td>
				<td width="30%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ชื่อ - นามสกุล</span></td>
				<td width="40%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				โรงเรียน</span></td>
				<td width="20%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				สถานที่ติว</span></td>				
			</tr>		  	

<?php 
	$sql_station = "SELECT * FROM station_report where sta_no = '$result_user[3]'";
	$dbquery_station = mysqli_query($my_connect, $sql_station) or die(mysqli_error($my_connect));
	$result_station = mysqli_fetch_array($dbquery_station);	
				
	$sql = "select * from `student` where stu_station = '$result_station[1]' order by `stu_no` ";                      
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
		$stu_station = $result["stu_station"];			
?>					
			<tr>
				<td width="10%" align="center">&nbsp;<?php echo $row+1?>.</span></td>
				<td width="30%">&nbsp;<?php echo $stu_name?></td>
				<td width="40%">&nbsp;<?php echo $stu_school?></td>
				<td width="20%">&nbsp;<?php echo $stu_station?></td>
			</tr>
				
<?php
	$row++;
	} 
?>				
		</table>

		<form data-toggle="validator" role="form" id="exportForm" name="exportForm" action="export_student1.php" Method="Post" enctype="multipart/form-data">
		<div class="row" style="padding-top: 10px">
			<div class="col-lg-3 offset-lg-11">		
				<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;Export&nbsp;&nbsp;</button>
				<input type="hidden" name="station" value="<?php echo $result_station[1]?>">
			</div>
		</div>
		</form>
				
		</div>		        	
	</div> <!-- /container --> 

<?php } ?>

  	<!-- ======= Footer ======= -->
    <div class="container">
	<footer>
    	<div class="row">
        	<div class="col-md-4 col-md-offset-9">
	  			<p class="navbar-text"><span style="color:#2e3192">© 2023 - UTCC All Right Reserved</span></p>
	  		</div>
	  	</div>
	</footer>	
	</div> <!-- /container -->     
  	<!-- End Footer -->
  	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-filestyle.js"></script>	
	
</body>
</html>
<?php
	}
	}
?>
