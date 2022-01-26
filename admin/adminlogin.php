<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index-style.css">
	<!-- favicon -->
   <link rel="icon" href="../image/clg-logo.png" type="image/gif" sizes="16x16">
   <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
   <script src="../jquery.js"></script>
	<title>WELCOME TO ADMIN PORTAL</title>
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
    </style>

</head>
<body>

		<div class="hdr-top">
			<div class="container">
				<div class="inr-top">
					<div class="top-box">
						<p>E-mail: csjmu@kanpuruniversity.org</p>
					</div>
					<div class="top-box">
						<p class="right">Kanpur, Uttar Pradesh, India-208024</p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>


		<div class="lower-hdr">
			<div class="container-2">
				<div class="inr-lower-hdr">
					<div class="logo_sec">
						<img src="../image/logo_1.jpg">
					</div>
					<div class="cnt_sec">
						<h1>Chhatrapati Shahu Ji Maharaj University</h1>
						<h4>Kalyanpur, Kanpur Uttar Pradesh, India-208024</h4>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-primary ">

  					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-icon"></span>
  					</button>

  					<div class="collapse navbar-collapse" id="navbarSupportedContent">
    					<ul class="navbar-nav">
			    			<li class="nav-item active">
			      				<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
			    			</li>
			    			<li class="nav-item active">
			     				 <a class="nav-link" href="http://www.kanpuruniversity.org/contact_us.htm">Contact</a>
			    			</li>
			    			<li class="nav-item active">
			     			 	<a class="nav-link" href="../gallery.php">Gallary</a>
			    			</li>
			    			<li class="nav-item active">
			      				<a class="nav-link" href="../About.php">About</a>
			    			</li>
			    			<li class="nav-item dropdown">
      							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      				 			Login
      							</a>
      							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      					 	 		<a style=" background-color:#007bff;" class="dropdown-item" href="../Student login/login.php">Student</a>
      					  			<a style=" background-color:#007bff;" class="dropdown-item" href="adminlogin.php">Admin</a>
      							</div>
      						</li>
			  			</ul>
  					</div>
				</nav>
 
<div class="container div1">
  <h1 class="text-center">Admin Login</h1>
  <form action="validation_admin_login.php" method="post">
  	<fieldset>
  		
  		<!-- show error -->
	<div class="form-group">
		<span id="login-error">
			<?php
				session_start();
				if(isset($_SESSION['error-login'])){
					echo "<p>".$_SESSION['error-login']."</p>";
					#session_unset();
					unset($_SESSION['error-login']);
				}
				
			?>

		</span>
	</div>

 <!-- email 	 -->
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter username..." name="username" required="required" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" autocomplete="off">
    </div>
<!-- show error -->
	<div class="form-group">
		<span id="username-error"></span>
	</div>

<!-- paswword -->
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password..." name="password" required="required" maxlength="15" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" autocomplete="off">
    </div>
<!-- show error -->
	<div class="form-group">
		<span id="pws-error"></span>
	</div>

<!-- remember me -->
    <div class="checkbox">
      <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) { ?>checked <?php } ?> > Remember me</label>
    </div>
<!-- submit button -->
    <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
    </fieldset>
  </form>

</div>

<!-- footer -->
	<footer>
			<p>&copy  Chhatrapati Shahu Ji Maharaj University, Kanpur |</p>
	</footer>

<script>
	    $(document).ready(function(){
	    	
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
	    });
</script>	
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
