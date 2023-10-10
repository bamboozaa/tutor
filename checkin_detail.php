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
	date_default_timezone_set("Asia/Bangkok");
	require "dbconnect.php";
	
	if ($_POST['username']) {
		$stuno = $_POST['username'];	
	} else {
		$stuno = $_GET['stuno'];
	}
	
	$sql = "select * from `student` where stu_idcard = $stuno";                 
	$dbquery = mysqli_query($my_connect, $sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง" . mysqli_error($my_connect));
    $num_rows = mysqli_num_rows($dbquery);
	
	if ($num_rows) {
	
		$result = mysqli_fetch_array($dbquery);
		$stu_no = $result["stu_no"];
		$stu_name = $result["stu_name"];
		$stu_idcard = $result["stu_idcard"];
		$stu_mobile = $result["stu_mobile"];
		$stu_lineid = $result["stu_lineid"];
		$stu_email = $result["stu_email"];
		$stu_school = $result["stu_school"];
		$stu_station = $result["stu_station"];
		$stu_day = $result["stu_day"];
		$chk_in1 = $result["chk_in1"];
		$chk_in2 = $result["chk_in2"];	
		$chk_in3 = $result["chk_in3"];
		$chk_in4 = $result["chk_in4"];
		$chk_out1 = $result["chk_out1"];
		$chk_out2 = $result["chk_out2"];
		$chk_out3 = $result["chk_out3"];
		$chk_out4 = $result["chk_out4"];
		$date_t = date("d/m/Y");
		echo $time_t = date("H:i:s");
			
		$sql_sta = "SELECT * FROM station WHERE sta_name = '$stu_station'";
		$dbquery_sta = mysqli_query($my_connect, $sql_sta) or die(mysqli_error($my_connect));
		$result_sta = mysqli_fetch_array($dbquery_sta);
		
		if ($result_sta[4] == $date_t) {

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
					
							<br><span style="color:#2e3192; font-size:16px; font-weight:medium">สถานที่ติว : </span>
							<span style="font-size:16px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
								
							<br>
							<?php if (($chk_in1) && ($chk_out1)) { ?>
							<span style="color:#2e3192; font-size:15px; font-weight:medium">คณิตศาสตร์ 1 [รอบเช้า 07:00 - 13:00 น.]</span>							
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="50%" align="center"><img src="images/approve.png" width="25" height="25" style="margin-top:5px"></td>
										<td width="50%" align="center">
											<a href="checkin_cer1.php?stuno=<?php echo $stu_idcard?>.<?php echo $result_sta[0]?>" target="_blank" class="btn btn-primary btn-sm"> 
											<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เกียรติบัตร</a>											
										</td>
									</tr>
								</table>
							</div>
							<?php } else { ?>
							<span style="color:#2e3192; font-size:15px; font-weight:medium">คณิตศาสตร์ 1 [รอบเช้า 07:00 - 13:00 น.]</span>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="50%" align="center">
											<?php if ($chk_in1) { ?>
												<button type="submit" class="btn btn-success btn-sm" disabled>CHECK IN</button>
											<?php } else { 
													if (($time_t > '06:00:00') && ($time_t < '13:00:00')) {
											?>
												<form data-toggle="validator" role="form" name="chkin1" action="checkin1.php" Method="Post" class="form-inline">
													<button type="submit" class="btn btn-danger btn-sm">CHECK IN</button>
													<input type="hidden" name="stu_no" id="stu_no" value="<?php echo $stu_idcard?>">												
												</form>
											<?php 	} else { ?>	
												<button type="submit" class="btn btn-danger btn-sm" disabled>CHECK IN</button>											
											<?php   }
												}
											?>								
										</td>
										<td width="50%" align="center">
											<?php if ($chk_out1) { ?>
												<button type="submit" class="btn btn-success btn-sm" disabled>CHECK OUT</button>
											<?php } else {
													if (($time_t > '11:00:00') && ($time_t < '18:00:00')) {
											?>											
												<form data-toggle="validator" role="form" name="chkout1" action="checkout1.php" Method="Post">
													<button type="submit" class="btn btn-danger btn-sm">CHECK OUT</button>
													<input type="hidden" name="stu_no" id="stu_no" value="<?php echo $stu_idcard?>">
												</form>
											<?php 	} else { ?>	
												<button type="submit" class="btn btn-danger btn-sm" disabled>CHECK OUT</button>
											<?php   }
												}
											?>								
										</td>
									</tr>
								</table>
							</div>
							<?php } ?>

							<br>
							<?php if (($chk_in2) && ($chk_out2)) { ?>
							<span style="color:#2e3192; font-size:15px; font-weight:medium">ภาษาอังกฤษ [รอบบ่าย 12:00 - 18:00 น.]</span>							
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="50%" align="center"><img src="images/approve.png" width="25" height="25" style="margin-top:5px"></td>
										<td width="50%" align="center">
											<a href="checkin_cer2.php?stuno=<?php echo $stu_idcard?>.<?php echo $result_sta[0]?>" target="_blank" class="btn btn-info btn-sm"> 
											<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เกียรติบัตร</a>										
										</td>									
									</tr>
								</table>						
							</div>
							<?php } else { ?>
							<span style="color:#2e3192; font-size:15px; font-weight:medium">ภาษาอังกฤษ [รอบบ่าย 12:00 - 18:00 น.]</span>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="50%" align="center">
											<?php if ($chk_in2) { ?>
												<button type="submit" class="btn btn-success btn-sm" disabled>CHECK IN</button>
											<?php } else { 
													if (($time_t > '12:00:00') && ($time_t < '18:00:00')) {
											?>
												<form data-toggle="validator" role="form" name="chkin2" action="checkin2.php" Method="Post" class="form-inline">
													<button type="submit" class="btn btn-danger btn-sm">CHECK IN</button>
													<input type="hidden" name="stu_no" id="stu_no" value="<?php echo $stu_idcard?>">
												</form>
											<?php 	} else { ?>	
												<button type="submit" class="btn btn-danger btn-sm" disabled>CHECK IN</button>
											<?php   }
												}
											?>										
										</td>
										<td width="50%" align="center">
											<?php if ($chk_out2) { ?>
												<button type="submit" class="btn btn-success btn-sm" disabled>CHECK OUT</button>
											<?php } else { 
													if (($time_t > '15:00:00') && ($time_t < '18:00:00')) {
											?>
												<form data-toggle="validator" role="form" name="chkout2" action="checkout2.php" Method="Post">
													<button type="submit" class="btn btn-danger btn-sm">CHECKOUT</button>
													<input type="hidden" name="stu_no" id="stu_no" value="<?php echo $stu_idcard?>">
												</form>
											<?php 	} else { ?>	
												<button type="submit" class="btn btn-danger btn-sm" disabled>CHECK OUT</button>
											<?php   }
												}
											?>									
										</td>
									</tr>
								</table>
							</div>	
							<?php } ?>	
							<br>
							<span style="color:#2e3192; font-size:15px; font-weight:medium">เอกสารติว</span>
							<div class="row">
								<div class="col-lg-6 sm-6" align="center" style="margin-top:20px">
									<a href="download.php?file=3" target="_blank" class="btn btn-primary"> 
									<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เอกสารวิชาคณิตศาสตร์</a>
								</div>
								<div class="col-lg-6 sm-6" align="center" style="margin-top:20px">								
									<a href="download.php?file=4" target="_blank" class="btn btn-primary"> 
									<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เอกสารวิชาภาษาอังกฤษ</a>
								</div>
							</div>																
						</div>				
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 
<?php
		} else {
		
			if (($chk_out1) || ($chk_out2)) {
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
					
							<br><span style="color:#2e3192; font-size:16px; font-weight:medium">สถานที่ติว : </span>
							<span style="font-size:16px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
								
							<br><br>
							
							<?php if (($chk_in1) && ($chk_out1)) { ?>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="120px"><span style="color:#2e3192; font-size:15px; font-weight:medium">คณิตศาสตร์ 1 :<br>[รอบเช้า]</span></td>
										<td width="100px" align="center"><img src="images/approve.png" width="25" height="25" style="margin-top:5px"></td>
										<td>
											<a href="checkin_cer1.php?stuno=<?php echo $stu_idcard?>.<?php echo $result_sta[0]?>" target="_blank" class="btn btn-info btn-sm"> 
											<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เกียรติบัตร</a>										
										</td>
									</tr>
								</table>
							</div>
							<?php } 
								  if (($chk_in2) && ($chk_out2)) {
							?>		
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td width="120px"><span style="color:#2e3192; font-size:15px; font-weight:medium">ภาษาอังกฤษ :<br>[รอบบ่าย]</span></td>
										<td width="100px" align="center"><img src="images/approve.png" width="25" height="25" style="margin-top:5px"></td>
										<td>
											<a href="checkin_cer2.php?stuno=<?php echo $stu_idcard?>.<?php echo $result_sta[0]?>" target="_blank" class="btn btn-info btn-sm"> 
											<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> เกียรติบัตร</a>										
										</td>									
									</tr>
								</table>						
							</div>
						</div>
						<?php } ?>
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 							
<?php		

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
						<h4 class="text-center" style="color:#25ABE2">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</h4>	<br>	
						
						<div class="col-lg-offset-1 col-lg-10">							
							<p><span style="color:#2e3192; font-size:16px; font-weight:medium">ชื่อ-สกุล : </span>
							<span style="font-size:16px; font-weight:medium"><?php echo $stu_name?></span>
					
							<br><span style="color:#2e3192; font-size:16px; font-weight:medium">สถานที่ติว : </span>
							<span style="font-size:16px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
						</div>				
						<div class="col-sm-12" align="center" style="margin-top:50px; margin-bottom:100px">
							<span style="color:#2e3192; font-size:16px; font-weight:medium">สนามติวของท่านยังไม่เปิดให้เช็คอิน
							<br>ท่านสามารถตรวจสอบตารางโครงการติวได้ที่นี่	
							<br><a href="index.html#schedule" target="_blank"><button type="button" class="btn btn-info">ตรวจสอบ วัน เวลา สถานที่ ติว</button></a>							
							
							<br><br><br>หรือสมัครเข้าร่วมโครงการติวได้ที่นี่ 	
							<br><a href="register.php" target="_blank"><button type="button" class="btn btn-success">สมัครโครงการติว</button></a>	
						</div>
					</div>
				</div>				    
				</div>			        	
			</div> <!-- /container --> 	
			
<?php
			}
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
					
					<div class="col-sm-12" align="center" style="margin-top:10px; margin-bottom:150px">
						<span style="color:#2e3192; font-size:16px; font-weight:medium">ไม่พบข้อมูลการสมัครของท่าน
						<br>สมัครเข้าร่วมโครงการติว	
						<br><br><a href="https://lin.ee/jyoQ47c" target="_blank"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="สมัครเข้าร่วมโครงการ" height="40" border="0"></a></span>					
					</div>
				</div>
			</div>				    
			</div>			        	
		</div> <!-- /container --> 

<?php } ?>

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
    <div id="confirmdata" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" >
                    <p><h4 class="text-center" style="color:#25ABE2">กรุณา Check In ก่อน Check Out</h4></p> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>  
    
    <div id="survey" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                	<br><br><br>
                    <p><h4 class="text-center" style="color:#25ABE2">พี่อยากรู้ใจ น้องๆ … <br>ช่วยตอบแบบสอบถามให้หน่อยนะคะ<br>ขอบคุณค่ะ</h4></p>
                    <br>
                    <p><h4 class="text-center" style="color:#25ABE2">>> <a target="_blank" href="https://bit.ly/tutor-Survey2">คลิกเพื่อทำแบบสอบถาม</a> <<</h4></p>
                    <br><br>
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
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#confirmdata') != -1) {
		    $('#confirmdata').modal('show');
		  }
		
		});		
    </script>	
    
    <script type="text/javascript">
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#survey') != -1) {
		    $('#survey').modal('show');
		  }
		
		});		
    </script>	    
</body>
</html>
