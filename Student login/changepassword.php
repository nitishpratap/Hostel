<!-- student change password page -->
<?php
	include('includes/security.php');
	include('includes/header.php');
	include('includes/navbar.php');

	error_reporting(0);
	$email=$_GET['email'];
	$done=$_POST['done'];
	if (isset($done)) 
	{
		require("../connection.php"); //include connection file

	    $query="SELECT * FROM student_login where email='$email' ";
	    $data=mysqli_query($con,$query);   //execute query
	    $result=mysqli_fetch_array($data); //fetch array from selected tuples

	    $oldpass=$_POST['oldpass'];   //accept old password
	    $newpass=$_POST['newpass'];		//accept new password
	    
	    
	    if ($oldpass==$result['password']) //entered password and database password validation
	     {
	    	$q="UPDATE `student_login` SET password='$newpass' WHERE email='$email'";
	    	
	    	if (mysqli_query($con,$q)) //execute query 
	    	{
	    		session_destroy();
	    		header('location:login.php'); //redirect to login page
	    	}
	    	else
	    	{
	    		$_SESSION['err']="*** Sorry some internal error occured ***";
	    	}
	    }
	    else
	    {
	    	$_SESSION['err']="*** Wrong current password ***"; //set error session flag
	    }
	}
?>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- sweetalert plugin CDN-->
	<style type="text/css">
		#div
		{
			width: 50%;
			margin: 5% 25% 10% 25%;
			border-radius: 4;
		}
		#show-result{
			color: red;
			text-align: center;
		}
	</style>


	<div class="container"><div id="div">
	<h1 class="text-center">Change Password</h1>
	<form action="#" method="post">

			<!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="show-result">
		    		<?php
		    			if(isset($_SESSION['err']))
		    			{
		    				echo $_SESSION['err'];
		    				unset($_SESSION['err']);
		    			}
		    		?>
		    	</span>
		    </div>


			
				<!-- old password -->
			<div class="form-group">
			    <label>Current Password</label>
				<input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Current Password" maxlength="15" required autocomplete="off"><br>
		    </div>
		    <!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="showerror1"></span>
		    </div>


		    <!-- new password -->
		    <div class="form-group">
			    <label>New Password</label>
				<input type="password" name="newpass" class="form-control" id="newpass" placeholder="New Password" maxlength="15" required autocomplete="off"><br>
		    </div>
		    <!-- show error message for confirm password -->
		    <div class="form-group">
		    	<span id="showerror2"></span>
		    </div>


		    <!-- confirm password -->
		    <div class="form-group">
			    <label>Confirm Password</label>
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
		    <button type="submit" class="btn btn-primary btn-md" name="done">Submit</button><br>
		    
		    
	</form>
	</div>
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
				var type=$('#oldpass').attr('type');
				if (type=="password") 
				{
					$('#oldpass').attr("type","text");
					$('#newpass').attr("type","text");
					$('#confirmpass').attr("type","text");
				}else{
					$('#oldpass').attr("type","password");
					$('#newpass').attr("type","password");
					$('#confirmpass').attr("type","password");
				}
			});

				//current password length validation
		$("#oldpass").keyup(function(){
			var pws= $("#oldpass").val();
			
			if(!(pws.length >= 6 && pws.length <= 15))
			{
				$("#showerror1").html("* Please enter between 6 and 15 characters *");
				$("#showerror1").css("color","red");
				$("#oldpass").focus();
				return false;
			}else{
				$("#showerror1").html("");
				return true;
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
	include('includes/scripts.php');
	include('includes/footer.php');
?>