<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>
  
  <style type="text/css" media="screen">
		.req
		{
			color: red;
			font-size: 20px;
		}
  		#submit
  		{
  			width: 150px;
  			
  		}
  		#reg-error
  		{
  			color: red;
  		}
  		.borderR
  		{
  			border: 5px solid red;
  		}
  </style>
	<!-- actual content -->
	<div class="container">
	<h1 class="text-center">Student Registration</h1>
	<hr>
	<form action="validation_register.php" method="post" accept-charset="utf-8" >
		<fieldset>
			<legend><h4>Mandatory fields are indicated by <span class="req">*</span></h4></legend>

		<!-- Registration Error -->
		<div class="form-group">
			<span id="reg-error">
				<?php 
					if(isset($_SESSION['fail']))
						echo '<h3 class="h3">'.$_SESSION['fail']."</h3>";
					if(isset($_SESSION['dup-email']))
						echo '<h5 class="h5">'.$_SESSION['dup-email']."</h5>";
					if(isset($_SESSION['registered']))
						echo '<h3 class="h3" style="color:green;">'.$_SESSION['registered']."</h3>";
					unset($_SESSION['fail']);
					unset($_SESSION['dup-email']);
					unset($_SESSION['registered']);
			 	?>			 
			 </span>
		</div>

		<!-- first name -->
			<div class="form-group">
				<label for="First name">First Name<span class="req">*</span>:</label>
				<input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name..." required="required" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="f-error"></span>
			</div>
			

		<!-- middle name -->
			<div class="form-group">
					<label for="Middle name">Middle Name:(optional)</label>
					<input type="text" name="mname" id="mname" class="form-control" placeholder="Enter Middle Name..." autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="m-error"></span>
			</div>


		<!-- last name -->
			<div class="form-group">
					<label for="Last name">Last Name<span class="req">*</span>:</label>
					<input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last Name..." required="required" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="l-error"></span>
			</div>


		<!-- email -->
			<div class="form-group">
					<label for="Email">Email<span class="req">*</span>:</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..." required="required" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
			</div>

			<!--Transaction ID -->
			<div class="form-group">
					<label for="transactionid">Transaction ID<span class="req">*</span>:</label>
					<input type="text" name="transactionId" id="transactionid" class="form-control" placeholder="Enter Transaction Id..." required="required" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="transactionid-error"></span>
			</div>

		<!-- gender -->
			<div class="form-group">
					<label for="gender">Gender<span class="req">*</span>:</label>
					<select name="Gender" id="gender" class="form-control" required>
						<option value="" selected hidden>--Select--</option>
						<option value="male" class="form-control ">Male</option>
						<option value="female" class="form-control">Female</option>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="gender-error"></span>
			</div>


		<!-- password -->
			<div class="form-group">
					<label for="Password">Password<span class="req">*</span>:</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password..." required="required" maxlength="15" autocomplete="off">
			</div>

		<!-- show error -->
			<div class="form-group">
				<span id="pws-error"></span>
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="pws-error1"></span>
			</div>

		<!-- confirm passord -->
			<div class="form-group">
					<label for="Confirm Password">Confirm Password<span class="req">*</span>:</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re_enter your Password..." required="required" maxlength="15" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="cpws-error"></span>
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="cpws-error1"></span>
			</div>

			<div>
				<input type="submit" value="Register" name="submit" id="submit" class="btn btn-success">
			</div>
			
		</div>
		</fieldset>
	</form>
	<br>

 <!-- jQuery -->
<script>
	$(document).ready(function(){
		//first name validation
		$("#fname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#fname").val();
			if(value.match(letters))
			{
				$("#f-error").html("");
				$("#f-error").css("display","none");
				return true;
			}else{
				$("#f-error").css("display","inline");
				$("#f-error").html("*** For your name please use alphabets and space only. ***");	
				$("#f-error").css("color","red");
				return false;
			}
		});

		//middle name validation
				$("#mname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#mname").val();
			if(value.match(letters))
			{
				$("#m-error").html("");
				$("#m-error").css("display","none");
				return true;
			}else{
				$("#m-error").css("display","inline");
				$("#m-error").html("*** For your name please use alphabets and space only. ***");	
				$("#m-error").css("color","red");
				return false;
			}
		});

		
		//last name validation
			$("#lname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#lname").val();
			if(value.match(letters))
			{
				$("#l-error").html("");
				$("#l-error").css("display","none");
				return true;
			}else{
				$("#l-error").css("display","inline");
				$("#l-error").html("*** For your name please use alphabets and space only. ***");	
				$("#l-error").css("color","red");
				return false;
			}
		});

		
		$("#submit").click(function(){
			if(emptyfirstname() && emptylastname() && emptytransactionid() && emptygander() && emptyemail() && emptypassword() && emptyconfirmpass())
			{
				return true;
			}else
			{
				return false;
			}
			
		});

		//first name validation if empty
		function emptyfirstname()
		{
			if($.trim($("#fname").val()) == "")
			{
				$("#f-error").css("display","inline");
				$("#f-error").html("*** Please fill this field. ***");	
				$("#f-error").css("color","red");
				return false;
			}else{
				$("#f-error").html("");
				$("#f-error").css("display","none");
				return true;
			}
		}


		//last name validation if empty
		function emptylastname()
		{
			if($.trim($("#lname").val()) == "")
			{
				$("#l-error").css("display","inline");
				$("#l-error").html("*** Please fill this field. ***");	
				$("#l-error").css("color","red");
				return false;
			}else{
				$("#l-error").html("");
				$("#l-error").css("display","none");
				return true;
			}
		}


		//Transaction ID validation if empty
		function emptytransactionid()
		{
			if($.trim($("#transactionid").val()) == ""){
				$("#transactionid-error").html("*** Please enter a Transaction Id. ***");
				$("#transactionid-error").css("color","red");
				return false;
			}
			else
			{
				$("#transactionid-error").html("");
				return true;
			}
		}

		//select gender
		function emptygander()
		{
			if($("#gender").val() == "")
			{
				$("#gender-error").html("*** Please select an option. ***");
				$("#gender-error").css("color","red");
				return false;
			}
			else
			{
				$("#gender-error").html("");
				return true;	
			}
		}

		//Email validation for empty
		function emptyemail()
		{
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var email=$("#email").val();
			if (email.match(mailformat))
			 {
			 	$("#email-error").html("");
			 	$("#email-error").css("display","none");
			 	return true;
			 }else{
			 	$("#email-error").html("*** Please enter a valid email address. ***");
			 	$("#email-error").css("color","red");
			 	$("#email-error").css("display","inline");
			 	return false;
			 }
		}

		//confirm password validation for empty
		function emptyconfirmpass()
		{
			if($.trim($("#confirm_password").val()) == "")
			{
				$("#cpws-error1").html(" *** Please fill this field. ***");
				$("#cpws-error1").css("color","red");
				return false;
			}
			else{
				$("#cpws-error1").html("");
				return true;
			}
		}

		//password validation for empty
		function emptypassword()
		{
			if($.trim($("#password").val()) == "")
			{
				$("#pws-error").html("*** Please fill this field. ***");
				$("#pws-error").css("color","red");
				$("#password").focus();
				return false;
			}else{
				$("#pws-error").html("");
				return true;
				
			}
		}

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
			 	$("#email-error").html("*** Please enter a valid email address. ***");
			 	$("#email-error").css("color","red");
			 	$("#email-error").css("display","inline");
			 	$("#email").focus();
			 	return false;
			 }
			
		});
		
		//password validation
		$("#confirm_password").keyup(function(){
			var pws=$("#password").val();
			var cpws=$("#confirm_password").val();
			if(pws != cpws)
			{
				$("#cpws-error").html("*** Password do not match. ***");
				$("#cpws-error").css("color","red");
				return false;
			}
			else{
				$("#cpws-error").html("");
				return true;
			}
		});
		//password length validation
		$("#password").keyup(function(){
			var pws= $("#password").val();
			
			if(!(pws.length >= 6 && pws.length <= 15))
			{
				$("#pws-error").html("* Please enter between 6 and 15 characters. *");
				$("#pws-error").css("color","red");
				$("#password").focus();
				return false;
			}else{
				$("#pws-error").html("");
				return true;
			}
		});
		//confirm password length validation
		$("#confirm_password").keyup(function(){
			var cpws= $("#confirm_password").val();
			if(!(cpws.length >= 6 && cpws.length <= 15))
			{
				$("#cpws-error1").html(" *** Please enter between 6 and 15 characters. ***");
				$("#cpws-error1").css("color","red");
				return false;
			}
			else{
				$("#cpws-error1").html("");
				return true;
			}
		});
		
		


	});

</script>


  <?php

include('includes/scripts.php');
include('includes/footer.php');
?>
