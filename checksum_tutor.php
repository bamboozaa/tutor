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
		
		$date_t = date("d/m/Y");
?>	
	
	<!-- start product -->
	<div class="container">
		<div class="row" style="margin-top:120px; margin-bottom:50px">
		<div align="center"><span style="color:#000066; font-size:24px">ข้อมูลผู้สมัคร UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</span></div>
		<br><br>
		<table class="table table-bordered">
			<tr class="active">
				<td width="5%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ลำดับที่</span></td>	
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				วันที่ติว</span></td>						
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				จังหวัด</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ผู้สมัครวันที่ <?php echo $date_t?></span></td>	
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ผู้สมัครรายจังหวัด</span></td>													
			</tr>		  	

<?php 
	if (($result_user[3] == '0') || ($result_user[3] == '99')){
		$sql = "SELECT * FROM station_report order by `sta_no` ";
	} else {
		$sql = "SELECT * FROM station_report where sta_no = $result_user[3] ";
	}
	$dbquery = mysqli_query($my_connect, $sql) or die(mysqli_error($my_connect));
	$num_rows = mysqli_num_rows($dbquery);	
	
	while ($row < $num_rows){
		$result = mysqli_fetch_array($dbquery);
		
		$sql_count = "select count(stu_no) AS count_stu from `student` where stu_station='$result[1]'";                      
		$dbquery_count = mysqli_query($my_connect, $sql_count) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));
		$result_count = mysqli_fetch_array($dbquery_count);
		
		$sql_count1 = "select count(stu_no) AS count_stu1 from `student` where stu_station='$result[1]' and stu_update ='$date_t'";                      
		$dbquery_count1 = mysqli_query($my_connect, $sql_count1) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));
		$result_count1 = mysqli_fetch_array($dbquery_count1);		
	
?>					
			<tr>
				<td width="5%" align="center">&nbsp;<?php echo $row+1?>.</td>
				<td width="10%" align="center">&nbsp;<?php echo $result[4]?></td>				
				<td width="10%" align="center">&nbsp;<?php echo $result[1]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_count1[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_count[0]?></td>
			</tr>
				
<?php
		$sum_stu = $sum_stu+$result_count[0];

	$row++;
	} 
?>	
			<tr>
				<td width="60%" colspan="4" align="right"><span style="color:#CC0000; font-size:16px; font-weight:bold">รวมสมัครทั้งหมด</span></td>
				<td width="10%" align="center"><span style="color:#CC0000; font-size:16px; font-weight:bold">&nbsp;<u><?php echo $sum_stu?></u>&nbsp;คน</span></td>
			</tr>			
		</table>

		</div>		        	
	</div> <!-- /container --> 
  	
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
