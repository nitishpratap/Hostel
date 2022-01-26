<?php 
	session_start();
	include('../Student login/includes/header.php');
	include('../Student login/includes/navbar.php');
?>

	<style type="text/css" media="screen">

	
		.req
		{
			color: red;
			font-size: 20px;
		}
		hr
		{
			border: 2px solid black;
		}
		#mobile-error,#aadhar-error
		{
			color: red;
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
.contain {
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
  /* border:1px solid black; */
  background: #f9f9f9;
  padding: 25px;
  
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
	</style>


<br>
<br>
<br>

	

<div class="contain">

		<h1 class="text-center ">Student Registration Form</h1>
   		<br>
		
		<div class="form-group">
				<span id="mandatory-error"></span>
			</div>

			<!-- first name -->
			<div class="row">
				<div class="col-md-4">
			<div class="form-group">
				<label for="First name">First Name<span class="req">*</span>:</label>
				<input type="text" name="Fname" id="fname" class="form-control" placeholder="Enter First Name..."  readonly autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="f-error"></span>
			</div>
			</div>

		<!-- middle name -->
		<div class="col-md-4">
			<div class="form-group">
					<label for="Middle name">Middle Name:(optional)</label>
					<input type="text" name="Mname" id="mname" class="form-control" placeholder="Enter Middle Name..." readonly autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="m-error"></span>
			</div>
</div>

		<!-- last name -->
		<div class="col-md-4">
			<div class="form-group">
					<label for="Last name">Last Name<span class="req">*</span>:</label>
					<input type="text" name="Lname" id="lname" class="form-control" placeholder="Enter last Name..." required   readonly autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="l-error"></span>
			</div>
</div>
</div>

		<!-- email -->
		<div class="row">
			<div class="col-md-4">
			<div class="form-group">
					<label for="Email">Email<span class="req">*</span>:</label>
					<input type="email" name="Email" id="email" class="form-control" placeholder="Enter Your Email..." required  readonly autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
			</div>
           </div>
			
			
		<!-- gender -->
		<div class="col-md-4">
			<div class="form-group">
					<label for="gender">Gender<span class="req">*</span>:</label>
					<select name="Gender" id="gender" class="form-control" required readonly>
						
						<option selected >Male</option>
						<option selected  >Female</option>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="gender-error"></span>
			</div>
		</div>
</div>
		<!-- Aadhar number -->
<div class="row">
		<div class="col-md-6">
			<div class="form-group">
					<label for="Transaction Id">Transaction Id<span class="req">*</span>:</label>
					<input type="text" name="Transaction Id" id="Tid" class="form-control" placeholder="Enter your transaction id" required maxlength="12" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="aadhar-error"></span>
	    </div>
       </div>

		<!-- Date of Birth -->
		<div class="col-md-6">
			<div class="form-group">
					<label for="Password"><span class="req">*</span>Password:</label>
					<input type="password" name="DOB" id="DOB" class="form-control" placeholder="Password" required maxlength="10" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="DOB-error"></span>
			</div>
         </div>
</div>

<button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
     
</div>
<br>
<br>
<br>
<script src="../jquery.js"></script>
<script src="validate-form-fields.js"></script>
	
<?php
	include('../Student login/includes/scripts.php');
	include('../Student login/includes/footer.php');
?>