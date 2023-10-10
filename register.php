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
	<!-- start product -->
	
	<div class="container" style="margin-top: 20px">
		<div class="panel panel-default panel-info"  style="margin-top:50px">
			<div class="panel-body">
				<div align="center">
					<img width="1200" height="200" src="images/tutor_banner.jpg"  class="img-responsive">
				</div>
				<h4 class="text-center" style="color:#25ABE2">โครงการติวเตรียมสอบเข้ามหาวิทยาลัย</h4>
				<h4 class="text-center" style="color:#25ABE2">UTCC ติวทั่วไทย พิชิตมหาลัยในฝัน</h4>	<br>			
				<form data-toggle="validator" role="form" id="registerForm" name="registerForm" action="savedata.php" Method="Post" enctype="multipart/form-data">					
				<div class="col-sm-6">
					<div style="padding-bottom: 10px; border-bottom: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;">
						<span style="font-size:16px; font-weight:bold; color:#006699">ข้อมูลทั่วไป</span>
					</div>						
					<div class="form-group" style="padding: 5px;">
						<div class="input-group" data-validate="name">
							<input type="text" class="form-control" name="name" id="validate-name" placeholder="ชื่อ - นามสกุล" style="font-size: 15px;" required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>	
						<div class="input-group" data-validate="idcard">
							<input type="text" class="form-control" name="idcard" id="validate-idcard" placeholder="รหัสประจำตัวประชาชน" style="font-size: 15px;" required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>							
						<input type="text" class="form-control" name="nickname" placeholder="ชื่อเล่น" style="font-size:15px;"><div class="col-sm-12 space"></div>
						<div class="input-group" data-validate="mobile">
							<input type="text" class="form-control" name="mobile" id="validate-mobile" placeholder="เบอร์โทรศัพท์มือถือ" style="font-size: 15px;" required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>	
						<div class="input-group" data-validate="lineid">
							<input type="text" class="form-control" name="lineid" id="validate-lineid" placeholder="Line ID." style="font-size:15px;" required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>
						<div class="input-group" data-validate="email">														
							<input type="text" class="form-control" name="email" id="validate-email" placeholder="e-mail" style="font-size:15px;"  required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>															
					</div>
				</div>								
					
				<div class="col-sm-6">			
					<div style="padding-bottom: 10px; border-bottom: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;">
					<span style="font-size:16px; font-weight:bold; color:#006699;">การศึกษา</span></div>						
					<div class="form-group" style="padding: 5px;">
						<select class="form-control" name="level" style="font-size:15px;">
							<option value="">ระดับชั้นที่กำลังศึกษา</option>
							<option value="1">ม.1</option>
							<option value="3">ม.2</option>
							<option value="3">ม.3</option>
							<option value="4">ม.4/ปวช.1</option>
							<option value="5">ม.5/ปวช.2</option>
							<option value="6">ม.6/ปวช.3</option>
				    		</select><div class="col-sm-12 space"></div>						
						<div class="input-group" data-validate="school_name">
							<input type="text" class="form-control" name="school_name" id="validate-school_name" placeholder="โรงเรียน" style="font-size:15px;" required>
							<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
						</div><div class="col-sm-12 space"></div>
						<?php 	
							require "dbconnect.php";
							$sql_p = "SELECT * FROM provinces";
							$dbquery_p = mysqli_query($my_connect, $sql_p) or die(mysqli_error($my_connect));
							$num_rows_p = mysqli_num_rows($dbquery_p);
						?>	
						<select class="form-control" name="school_province" id="school_province" style="font-size:14px" required>
							<option value="" selected>เลือกจังหวัดที่ตั้งของโรงเรียน</option>
							<?php  
								while($result_p = mysqli_fetch_array($dbquery_p)){
							?>	
							<option value='<?php echo $result_p[2];?>' ><?php echo $result_p[2];?></option>
							<?php }?>																																						
						</select>															
						<select class="form-control" name="school_scholarship" id="school_scholarship" style="font-size:15px;">
							<option value="">คณะที่อยากเข้าเรียนในระดับมหาวิทยาลัย</option>
							<option value="บริหารธุรกิจ">บริหารธุรกิจ</option>
							<option value="บัญชี">บัญชี</option>
							<option value="มนุษยศาสตร์ / ภาษาศาสตร์">มนุษยศาสตร์ / ภาษาศาสตร์</option>
							<option value="ท่องเที่ยวและอุตสาหกรรมการบริการ">ท่องเที่ยวและอุตสาหกรรมการบริการ</option>
							<option value="นิเทศศาสตร์">นิเทศศาสตร์</option>
							<option value="ศิลปะและการออกแบบดิจิทัล">ศิลปะและการออกแบบดิจิทัล</option>	
							<option value="นิติศาสตร์">นิติศาสตร์</option>
							<option value="ผู้ประกอบการ">ผู้ประกอบการ</option>
							<option value="เศรษฐศาสตร์">เศรษฐศาสตร์</option>																				
							<option value="วิทยาศาสตร์">วิทยาศาสตร์</option>	
							<option value="วิศวกรรมศาสตร์">วิศวกรรมศาสตร์</option>
							<option value="การศึกษาปฐมวัย">การศึกษาปฐมวัย</option>
							<option value="หลักสูตรนานาชาติ">หลักสูตรนานาชาติ</option>	
							<option value="หลักสูตรนานาชาติจีน">หลักสูตรนานาชาติจีน</option>
							<option value="0">อื่น ๆ</option>	
				    	</select>
				    		<input type="text" class="form-control" name="school_scholarship_other" id="school_scholarship_other" placeholder="โปรดระบุคณะที่อยากเข้าเรียนในระดับมหาวิทยาลัย" style="font-size:15px;"><div class="col-sm-12 space"></div>
						<?php 
							$sql = "SELECT * FROM station where sta_count < '1001' order by sta_order";
							$dbquery = mysqli_query($my_connect, $sql) or die(mysqli_error($my_connect));
							$num_rows = mysqli_num_rows($dbquery);
						?>							
						<select class="form-control" name="station" id="station" style="font-size:14px" required>
							<option value="" selected>เลือกสถานที่ติว</option>
							<?php  
								while($result = mysqli_fetch_array($dbquery)){
							?>	
							<option value='<?php echo $result[1];?>' ><?php echo $result[2];?></option>
							<?php }?>																																						
						</select>							
					</div>		
				</div>
					
			 	<div class="col-sm-12">
			    	<span style="font-size:15px; color:#2e3192">มหาวิทยาลัยหอการค้าไทยเก็บรวบรวมข้อมูลส่วนบุคคลของท่านเพื่อวัตถุประสงค์ในการให้บริการการศึกษา 
			    	และบริหารจัดการด้านการเรียนการสอนเพื่อประโยชน์กับตัวท่าน สามารถศึกษานโยบายการคุ้มครองข้อมูลส่วนบุคคลของมหาวิทยาลัยฯ ได้ที่ 
					<a target="_blank" href="http://www.utcc.ac.th/privacy-policy">www.utcc.ac.th/privacy-policy</a></span>
			  	</div>						
				<div class="col-sm-12"  style="padding-top: 10px;">
					<button type="submit" class="btn btn-primary" disabled><span style="font-size:15px; font-weight:bold">&nbsp;&nbsp;บันทึก&nbsp;&nbsp;</span></button>
				</div>
			</form>  
			</div>	    
		</div>					        	
	</div> <!-- /container --> 
	     
    <div class="container">
	<footer>
    	<div class="row">
        	<div class="col-md-4 col-md-offset-9">
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
                <div class="modal-body  " >
                    <p> <strong>บันทึกข้อมูลผู้สมัครเรียบร้อย</strong> 
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
		$(document).ready(function(e) {
		   var h = $('nav').height() + 10;
		   $('body').animate({ paddingTop: h });
		});
	</script>   	
	
	<script type="text/javascript">
		$(document).ready(function() {
	   	$('.input-group input[required]').on('keyup change', function() {
	    	var $form = $(this).closest('form'),
	          $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
	            
	    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "name") {
			state =/[^0-9]$/.test($(this).val())							
		}else if ($group.data('validate') == "idcard") {	
			if(checkID(document.registerForm.idcard.value)) {
				state = true;
			}	
		}else if ($group.data('validate') == "mobile") {
			state =/^\(?(\d{2,3})\)?[-. ]?(\d{3,4})[-. ]?([0-9]{4})$/.test($(this).val())
		}else if ($group.data('validate') == "lineid") {
			state =/[^null]$/.test($(this).val())	
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())			
		}else if ($group.data('validate') == "school_name") {
			state =/[^null]$/.test($(this).val())							
		}	
			
	
		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'glyphicon glyphicon-ok');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'glyphicon glyphicon-remove');
		}
	        
	        if ($form.find('.input-group-addon.danger').length == 0) {
	            $form.find('[type="submit"]').prop('disabled', false);
	        }else{
	            $form.find('[type="submit"]').prop('disabled', true);
	        }
		});
	    
	    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
	    
	    
	});	
	</script>
	
	<script type="text/javascript">
		function checkID(id) {
			if(id.length != 13) return false;
			for(i=0, sum=0; i < 12; i++) sum += parseFloat(id.charAt(i))*(13-i);
			if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;	 
			return true;
		}
	</script>
		
	<script type="text/javascript">
		function checkID(id) {
			if(id.length != 13) return false;
			for(i=0, sum=0; i < 12; i++) sum += parseFloat(id.charAt(i))*(13-i);
			if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;	 
			return true;
		}
	</script>
	
    <script type="text/javascript"> 
		$(document).ready(function () {
		    toggleFields(); // call this first so we start out with the correct visibility depending on the selected form values
		    // this will call our toggleFields function every time the selection value of our other field changes
		    $("#school_scholarship").change(function () {
		        toggleFields();
		    });	
		});
		
		function toggleFields() {
		    if ($("#school_scholarship").val() != "0") 
		    {
			    $("#school_scholarship_other").hide();
		    } else {
			    $("#school_scholarship_other").show();
		    }		    
		}		    
	</script>
	 		
	<script type="text/javascript">
		
			$(document).ready(function() {
			
			  if(window.location.href.indexOf('#confirmdata') != -1) {
			    $('#confirmdata').modal('show');
			  }
			  
			});
	
	</script>		
	
</body>
</html>
