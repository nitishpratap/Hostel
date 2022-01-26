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
</style>
<div class="container">
	<h1 class="h1">Search</h1>
	<!-- email -->
			<div class="form-group">
					<label for="Email">Email<span class="req">*</span>:</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..." required="required" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
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
	<!-- show search result Here-->
	<hr>
	<h2 class="h2">Search Result Will Go Here</h2>
	<hr>
	<div class="" id="showresult">
		
	</div>
	
</div> <!-- end of container -->
<script>
	$(document).ready(function(){
		$("#gender").change(function(){
			if ($("#email").val() == "") //check email for empty
			{
				$("#email-error").html("*** Fill this field ***");
				$("#email-error").css("color","red");
				return false;
			}
			else
			{
				var email = $("#email").val();
				var gender = $("#gender").val();
				$.ajax({
				url:"ajax_search_reallocate.php",
				type:"post",
				data:{email:email,gender:gender},
				datatype:"html",
				
				success:function(searchResult){
					$("#showresult").html(searchResult);
				}
			});
			}
		}); //end of gender id

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
	});
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>