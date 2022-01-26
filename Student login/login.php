<?php 
	session_start();
	include('includes/header.php');
	include('includes/navbar.php');
?>

  <style type="text/css">
  	#login-error
  	{
  		color: red;
  	}
  	.div1{
  		width: 50%;
  		margin: 5% 25% 10% 25%;
		border-radius: 4;
  	}

	  button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #0c0125;
  color: #fff;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

button[type="submit"]:hover {
  background: #0c0125;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}
  </style>


<div class="container div1">
  <h1 class="text-center">Student login</h1>
  <form action="validation_login.php" method="post">
  	<fieldset>
  		
  		<!-- show error -->
	<div class="form-group">
		<span id="login-error">
			<?php
				
				if(isset($_SESSION['error-login'])){
					echo "<p>".$_SESSION['error-login']."</p>";
					unset($_SESSION['error-login']);
				}
			
			?>
		</span>
	</div>

 <!-- email 	 -->
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email..." name="email" required="required" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" autocomplete="off">
    </div>
<!-- show error -->
	<div class="form-group">
		<span id="email-error"></span>
	</div>

<!-- paswword -->
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password..." name="password" required="required" maxlength="15" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" autocomplete="off">
    </div>
<!-- show error -->
	<div class="form-group">
		<span id="pws-error"></span>
	</div>

<!-- remember me -->
    <div class="checkbox">
      <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?>checked <?php } ?> > Remember me</label>
    </div>
<!-- submit button -->
    <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
	
	<div class="row">
	<div class="col">
	<span>New User ?</span>
	<a href="..\form\registration.php" style="">Registration</a>
	</div>
	</div>
   

    </fieldset>
  </form>

</div>

<script>
	    $(document).ready(function(){
	    	//email validation
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
			//password length validation
		$("#password").keyup(function(){
			var pws= $("#password").val();
			
			if(!(pws.length >= 6 && pws.length <= 15))
			{
				$("#pws-error").html("* Please enter between 6 and 15 characters *");
				$("#pws-error").css("color","red");
				$("#password").focus();
				return false;
			}else{
				$("#pws-error").html("");
				return true;
			}
		});

		//password length validation
		$("#submit").click(function(){
			if(emptypass() && emptyemail())
			{
				return true;
			}else{
				return false;
			}
			

		});

		function emptyemail()
		{
			if ($.trim($("#email").val()) == "")
				 {
				 	$("#email-error").html("*** Please enter a valid email address ***");
				 	$("#email-error").css("color","red");
				 	return false;
				 }else{
				 	$("#email-error").html("");
				 	return true;
				 }
		}
		function emptypass()
		{
			if($.trim($("#password").val()) == "")
			{
				$("#pws-error").html("*** Please fill this field.. ***");
				$("#pws-error").css("color","red");
				return false;
			}
			else
			{
				$("#pws-error").html("");
				return true;
			}
		}

	    });
</script>	

<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>

