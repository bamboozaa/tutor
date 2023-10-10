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
	
	<div class="container" style="margin-top: 10px">
		<div class="col-lg-offset-2 col-lg-8">
		<div class="panel panel-default panel-info" style="margin-top:20px">
			<div class="panel-body">
				<div align="center">
					<img width="1200" height="200" src="images/tutor_banner.jpg"  class="img-responsive">
				</div>
				<h4 class="text-center" style="color:#25ABE2">โครงการติวเตรียมสอบเข้ามหาวิทยาลัย</h4>
				<h4 class="text-center" style="color:#25ABE2">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</h4>	<br>	
				
	    		<div class="row" style="margin-top:20px; margin-bottom:100px">
	        		<div class="col-md-4 col-sm-3" align="center"></div>
	        		<div class="col-md-4 col-sm-6" align="center">
		            	<!--login form-->
		            	<form data-toggle="validator" role="form" name="loginForm" action="checksheet_detail.php" Method="Post">
	                	<div class="form-group" style="margin-top:20px">
		                    <div class="input-group">
		                        <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
		                        <input type="text" name="username" id="username" class="form-control" autocomplete="off"  placeholder="เลขประจำตัวประชาชน" style="font-size:12pt" required>
		                    </div>
	                	</div>           
		                <div class="form-group" style="margin-top:10px">
		                    <input type="submit" value="ดาวน์โหลดเอกสารติว" name="login_button" class="btn btn-primary btn-block login-button" id="login_button" style="font-size:12pt">
		                </div>
	        			</form>	
	        		</div>
	        		<div class="col-md-4 col-sm-3" align="center"></div>	                
         		</div>
			</div>
		</div>				    
		</div>			        	
	</div> <!-- /container -->   	
  	
    <div class="container">
	<footer>
    	<div class="row">
        	<div class="col-md-4 col-md-offset-9" align="right">
	  			<p class="navbar-text"><span style="color:#2e3192">© 2023 - UTCC All Right Reserved</span></p>
	  		</div>
	  	</div>
	</footer>	
	</div> <!-- /container -->     

	<div id="modalSignout" class="modal fade" role="dialog">
		<div class="modal-dialog">
    	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body  " >
					<p><strong>รหัสบัตรประชาชนของท่านไม่ถูกต้อง กรุณาตรวจสอบข้อมูลอีกครั้ง</strong> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
    	</div>
	</div>		
	<!-- end product -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-filestyle.js"></script>	
	
    <script type="text/javascript">
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#modalSignout') != -1) {
		    $('#modalSignout').modal('show');
		  }
		
		});		
    </script>	
    
    <script type="text/javascript">
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#modalEdit') != -1) {
		    $('#modalEdit').modal('show');
		  }
		
		});		
    </script>	
</body>
</html>	    