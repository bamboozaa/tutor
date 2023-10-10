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
				<a class="navbar-brand" href="https://www.utcc.ac.th/" target="_blank" style="padding:20px;">
					<img src="images/tutor_banner.jpg" class="img-responsive" width="310" height="50">
				</a>
			</div>			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
      	</div><!-- /.container -->
    </nav><!-- /.navbar -->  
	<!-- end menu -->
	
	<!-- start product -->
	<div class="jumbotron">
		<div class="container">
    		<div class="row" style="margin-top:150px; margin-bottom:100px">
        		<div class="col-md-4 col-sm-3" align="center"></div>
        		<div class="col-md-4 col-sm-6" align="center">
	            <!--login form-->
					<form data-toggle="validator" role="form" name="loginForm" action="checkpws.php" Method="Post">
		        	<span style="color:#003366; font-size:18px; font-weight:700">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</span><br><br>
	            	<!--login form-->
                	<div class="form-group">
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
	                        <input type="text" name="username" id="username" class="form-control" autocomplete="off"  placeholder="USERNAME" style="font-size:12pt" required>
	                    </div>
                	</div>
	                <div class="form-group">
	                    <div class="input-group ">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
	                        <input type="password" name="password" id = "password" class="form-control" autocomplete="off" placeholder="PASSWORD" style="font-size:12pt" required>
	                    </div>
	                </div>            
	                <div class="form-group" style="margin-top:10px">
	                    <input type="submit" value="เข้าสู่ระบบ" name="login_button" class="btn btn-primary btn-block login-button" id="login_button" style="font-size:12pt">
	                </div>
	        		</form>		                
         		</div>
         		<div class="col-md-4 col-sm-3" align="center"></div> 
         	</div> 	      	
	    </div> <!-- /container -->    
	</div>
	<!-- /container -->   	
  	
  	<!-- ======= Footer ======= -->
    <div class="container">
	<footer>
    	<div class="row">
        	<div class="col-md-4 col-md-offset-9">
	  			<p class="navbar-text"><span style="font-size:12pt; color:#2e3192">© 2023 - UTCC All Right Reserved</span></p>
	  		</div>
	  	</div>
	</footer>	
	</div> <!-- /container -->     
  	<!-- End Footer -->    	

	<div id="modalSignout" class="modal fade" role="dialog">
		<div class="modal-dialog">
    	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body  " >
					<p><strong>Username หรือ Password ไม่ถูกต้อง กรุณาติดต่อ email : naruemol_suw@utcc.ac.th เบอร์ภายใน 6288.</strong> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
    	</div>
	</div>	
	
	<div id="modalEdit" class="modal fade" role="dialog">
		<div class="modal-dialog">
    	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body  " >
					<p><strong>กรุณาตรวจสอบสิทธิการใช้งานของท่าน</strong> 
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