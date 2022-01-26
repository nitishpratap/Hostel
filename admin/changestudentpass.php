<?php
	include('includes/security.php'); 	//security features
	include('includes/header.php');		//header
	include('includes/navbar.php');	//navbar 
	

	error_reporting(0);


?>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- sweetalert plugin CDN-->
	<style type="text/css">
		.req
		{
			color: red;
			font-size: 20px;
		}
		#show-result{
			color: red;
			text-align: center;
		}
	</style>


	<div class="container">
	<h1 class="text-center">Change Student Password</h1>
	<form action="changestupass_data.php" method="post" class="m-50">

			<!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="show-result">
		    		<?php
		    			if(isset($_SESSION['changesuccess']))
		    			{
		    				echo '<h4 class="h4 text-success">'.$_SESSION['changesuccess'].'</h4>';
		    				unset($_SESSION['changesuccess']);
		    			}

		    			if(isset($_SESSION['err']))
		    			{
		    				echo '<h4 class="h4 text-danger">'.$_SESSION['err'].'</h4>';
		    				unset($_SESSION['err']);
		    			}

		    			
		    		?>
		    	</span>
		    </div>


			<!-- email -->
			<div class="form-group">
					<label for="Email">Email <span class="req">*</span>:</label>
					<input type="email" name="Email" id="email" class="form-control" placeholder="Enter Your Email..." required autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
			</div>
				
		    <!-- new password -->
		    <div class="form-group">
			    <label>New Password <span class="req">*</span>:</label>
				<input type="password" name="newpass" class="form-control" id="newpass" placeholder="New Password" maxlength="15" required autocomplete="off"><br>
		    </div>
		    <!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="showerror2"></span>
		    </div>


		    <!-- confirm password -->
		    <div class="form-group">
			    <label>Confirm Password <span class="req">*</span>:</label>
				<input type="password" name="confirmpass" class="form-control" id="confirmpass" placeholder="Confirm Password" maxlength="15" required autocomplete="off">
		    </div>
		    <!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="showerror"></span>
		    </div>
		    <!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="showerror3"></span>
		    </div>
		    <!-- show password -->
		    <div class="form-group">
			    <label for="show-password">Show Password</label>
				<input type="checkbox" id="checkbox" name="show-password"><br>
		    </div>
		    <!-- submit button -->
		    <button type="submit" class="btn btn-primary btn-md" name="changeStuPass">Change</button><br>
		    
		    
	</form>
	</div>
	
	
	
	<script>
		// confirm password Validatition
		$(document).ready(function(){
			$('#confirmpass').keyup(function(){
				var pws=$('#newpass').val();
				var cpws= $('#confirmpass').val();
				if(cpws != pws)
				{
					$('#showerror').html('**Password are not matching.');
					$('#showerror').css('color','red');
					return false;
				}else{
					$('#showerror').html(' ');
					return true;
				}
			});
			// show password
			$("#checkbox").click(function(){
				var type=$('#newpass').attr('type');
				if (type=="password")  //show password 
				{
					$('#newpass').attr("type","text");  //show new password 
					$('#confirmpass').attr("type","text"); //show old password 
				}else //hide password
				{
					$('#newpass').attr("type","password");   // hide new password 
					$('#confirmpass').attr("type","password"); // hide old password 
				}
			});

			//new password length validation
		$("#newpass").keyup(function(){
			var pws= $("#newpass").val();
			
			if(!(pws.length >= 6 && pws.length <= 15))
			{
				$("#showerror2").html("* Please enter between 6 and 15 characters *");
				$("#showerror2").css("color","red");
				$("#newpass").focus();
				return false;
			}else{
				$("#showerror2").html("");
				return true;
			}
		});

		//Email validation
		$("#email").keyup(function(){
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var email=$("#email").val();
			if (email.match(mailformat))
			 {
			 	$("#email-error").html("");
			 	$("#email-error").css("display","none");
			 	return true;
			 }else{
			 	$("#email-error").html("*** Please enter a valid email address ***");
			 	$("#email-error").css("color","red");
			 	$("#email-error").css("display","inline");
			 	$("#email").focus();
			 	return false;
			 }
			
		});

			//confirm password length validation
		$("#confirmpass").keyup(function(){
			var pws= $("#confirmpass").val();
			
			if(!(pws.length >= 6 && pws.length <= 15))
			{
				$("#showerror3").html("* Please enter between 6 and 15 characters *");
				$("#showerror3").css("color","red");
				$("#confirmpass").focus();
				return false;
			}else{
				$("#showerror3").html("");
				return true;
			}
		});
			
		});
	</script>



<?php
	include('includes/scripts.php');  //scripts
	include('includes/footer.php');		//footer
?>