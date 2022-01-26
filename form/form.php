<?php
	session_start();
	if(!isset($_SESSION['email']))
	{
		header("location:../Student login/login.php");
	}

	include('../Student login/includes/header.php');
	
     require("../connection.php"); //include connection file
     $email=$_GET['email'];
     $q="SELECT * FROM student_login WHERE email='$email'";
     $data=mysqli_query($con,$q);
    $result=mysqli_fetch_array($data);
     
?>
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
			     			 	<a class="nav-link" href="../gallery.php">Gallery</a>
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
      					  			<a style=" background-color:#007bff;" class="dropdown-item" href="../admin/adminlogin.php">Admin</a>
      							</div>
      						</li>
			  			</ul>
  					</div>
				</nav>


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
	<div class="contain">
		<h1 class="text-center ">HOSTEL ADMISSION FORM</h1>
   		<br>
		<form action="form_database.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<fieldset>
				<legend>Mandatory fields are indicated by <span class="req">*</span></legend>
			<!-- show error message for all mandatory fields -->
			<div class="form-group">
				<span id="mandatory-error"></span>
			</div>

			<!-- first name -->
			<div class="row">
				<div class="col-md-4">
			<div class="form-group">
				<label for="First name">First Name<span class="req">*</span>:</label>
				<input type="text" name="Fname" id="fname" class="form-control" placeholder="Enter First Name..." required value="<?php echo $result['first_name']; ?>" readonly autocomplete="off">
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
					<input type="text" name="Mname" id="mname" class="form-control" placeholder="Enter Middle Name..." value="<?php echo $result['middle_name']; ?>" readonly autocomplete="off">
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
					<input type="text" name="Lname" id="lname" class="form-control" placeholder="Enter last Name..." required value="<?php echo $result['last_name']; ?>"  readonly autocomplete="off">
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
					<input type="email" name="Email" id="email" class="form-control" placeholder="Enter Your Email..." required value="<?php echo $_GET['email'];?>" readonly autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
			</div>
</div>
			<div class="col-md-4">
		<!-- mobile number -->
			<div class="form-group">
					<label for="mobile">Mobile Number<span class="req">*</span>:</label>
					<input type="text" name="Mobile" id="mobile" class="form-control" placeholder="Enter 10 digit Mobile number..." required maxlength="10" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="mobile-error"></span>
			</div>
            </div>
			
		<!-- gender -->
		<div class="col-md-4">
			<div class="form-group">
					<label for="gender">Gender<span class="req">*</span>:</label>
					<select name="Gender" id="gender" class="form-control" required readonly>
						<option selected hidden value="<?php echo $result['gender']; ?>"><?php echo $result['gender']; ?></option>
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
					<label for="Aadhar">Aadhar Number<span class="req">*</span>:</label>
					<input type="text" name="Aadhar" id="aadhar" class="form-control" placeholder="Enter 12 digit Aadhar number..." required maxlength="12" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="aadhar-error"></span>
	    </div>
</div>

		<!-- Date of Birth -->
		<div class="col-md-6">
			<div class="form-group">
					<label for="DOB">DOB<span class="req">*</span>:</label>
					<input type="date" name="DOB" id="DOB" class="form-control" placeholder="Enter Date of Birth..." required maxlength="10" autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="DOB-error"></span>
			</div>
</div>
</div>
			<hr>
			<h3>Current Acadmic Detail</h3>
			<hr>

		<!-- Institute -->
			<div class="form-group">
				<label for="institute">Institute<span class="req">*</span>:</label>
				<select name="Institute" id="institute" class="form-control" required>
						<option value="" selected hidden>--Select--</option>
				<?php
					 $q="SELECT * FROM institute";
					 $temp=mysqli_query($con,$q);
					 while ($opt=mysqli_fetch_array($temp)) 
					 	{ ?>
					 	<option value="<?php echo $opt['institute_id']; ?>"><?php echo $opt['name']; ?></option>
				
				<?php } ?>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="institute-error"></span>
			</div>

		<!-- course -->
			<div class="form-group">
					<label for="course">Branch/Department<span class="req">*</span>:</label>
					<select name="Course" id="course" class="form-control" required>
						<option value="" selected hidden>--Select--</option>
						
						
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="course-error"></span>
			</div>

		<!-- Year -->
			<div class="form-group">
					<label for="year">Year<span class="req">*</span>:</label>
					<select name="Year" id="year" class="form-control" required>
						<option value="" selected hidden>--Select--</option>
						
						
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="year-error"></span>
			</div>

		<!-- Date of Admission -->
		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
					<label for="AdmissionDate">Date of Admission<span class="req">*</span>:</label>
					<input type="date" name="AdmissionDate" id="admission" class="form-control" placeholder="Enter Date of Admission..." required autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="AdmissionDate-error"></span>
			</div>
		</div>
		<!--transactionid-->
		<div class="col-md-6">
			<div class="form-group">
					<label for="Middle name">Transaction Id<span class="req">*</span>: </label>
					<input type="text" name="TransactionId" id="transactionid" class="form-control" placeholder="Enter Transaction Id..." value="<?php echo $result['transactionid']; ?>" readonly required autocomplete="off">
			</div>
						 </div>
						 </div>
			<hr>
			<h3>Parent's Detail</h3>
			<hr>

		<!-- father's name -->
		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
					<label for="father name">Father's Name <span class="req">*</span>:</label>
					<input type="text" name="FatherName" id="father-name" class="form-control" placeholder="Enter Father's Name" required autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="father-error"></span>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
					<label for="mother name">Mother's Name <span class="req">*</span>:</label>
					<input type="text" name="MotherName" id="Mother-name" class="form-control" placeholder="Enter Mother's Name" required autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="mother-error"></span>
			</div>
						 </div>
		</div>
		<!-- Occupation/Designation: -->
			<div class="form-group">
					<label for="Designation">Occupation/Designation<span class="req">*</span>:</label>
					<input type="text" name="Designation" id="designation" class="form-control" placeholder="Enter Occupation/Designation..." required autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="designation-error"></span>
			</div>


		<!-- Office address -->
			<div class="form-group">
					<label for="AddOffice">Address (office):</label>
					<input type="text" name="AddOffice" id="addoffice" class="form-control" placeholder="Enter Address Of Office..." autocomplete="off">
			</div>
		

		<!-- telephone/mobile (office) -->
			<div class="form-group">
					<label for="telephone">telephone/mobile (office):</label>
					<input type="text" name="Telephone" id="telephone"  class="form-control" placeholder="Enter Telephone Of Office..." autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="telephone-error"></span>
			</div>

		<!-- Residential address -->
			<div class="form-group">
					<label for="residence">Residential Address<span class="req">*</span>:</label>
					<textarea name="Residence" id="residence" placeholder="Enter Residential Address..." rols="10" class="form-control" required autocomplete="off"></textarea>
			</div>


		<!-- Annual Family Income(Approx)
			<div class="form-group">
					<label for="income">Annual Family Income(Approx)<span class="req">*</span>:</label>
					<input type="text" name="Income" id="income" class="form-control" placeholder="Enter Annual Family Income(Approx)..." required autocomplete="off">
			</div> -->
		<!-- show error -->
			<div class="form-group">
				<span id="income-error"></span>
			</div>

			<hr>
			<h3>Local Guardian Detail</h3>
			<hr>

		<!-- Name of Local Guardian(if any) -->
			<div class="form-group">
					<label for="guardian">Name of Local Guardian(if any):</label>
					<input type="text" name="Guardian" id="guardian" class="form-control" placeholder="Enter Name of Local Guardian(if any)..." autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="guardian-error"></span>
			</div>

		<!-- Residential address of local guardian-->
			<div class="form-group">
					<label for="ResidenceGU">Residential address of local guardian:</label>
					<textarea name="ResidenceGU" id="residenceGU" placeholder="Enter Residential Address of local guardian..." rols='10' class="form-control" autocomplete="off"></textarea>
			</div>

		<!-- telephone/mobile local guardian -->
			<div class="form-group">
					<label for="telephone">telephone/mobile (local guardian):</label>
					<input type="text" name="TelephoneGU" id="telephoneGU"  class="form-control" placeholder="Enter Telephone/mobile of local guardian..." autocomplete="off">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="telephoneGU-error"></span>
			</div>

			<hr>
			<h3>Hostel Residence Detail</h3>
			<hr>

		<!-- Hostler or not -->
			<div class="form-group">
					<label for="hostler">Applicant has been the resident of C.S.J.M University, Kanpur hostel<span class="req">*</span>:</label>
					<label class="radio-inline"> <input type="radio" name="Hostler" id="hostlerY" value="YES">YES </label>
					<label class="radio-inline"> <input type="radio" name="Hostler" id="hostlerN" value="NO">NO</label>
			</div>
		<!-- show fields Hostel Name and Room Number -->
			<div class="form-group">
				<span id="HostelNameNumber"></span>
			</div>
			

		<hr>
		<h3>Last Passing Examination Detail</h3>
		<hr>

  
		<!-- Details of last passing Examination -->
			<div class="form-group">
					<label for="last-exam">Details of last passing Examination<span class="req">*</span>:</label>
					<!-- <input type="text" name="1styear" placeholder="1st year Entrance Rank" id="1styear"  class="form-control"  autocomplete="off"><br> -->
					 <input type="text" name="LastExam" placeholder="1st year Entrance Rank" id="LastExam"  class="form-control" required autocomplete="off"><br>
		            <!-- <input type="text" name="Board" placeholder="Enter University Board ..." id="Board" class="form-control" required autocomplete="off"><br>
		            <input type="text" name="Subject" placeholder="Enter Subjects ..." id="subject" class="form-control" required autocomplete="off"><br>
		            <input type="text" name="Score" placeholder="Enter Score In Percentage ..." id="score" class="form-control" required autocomplete="off"><br>
		            <input type="number" name="Attempts" placeholder="Enter Number Of Attempts ..." id="attempts" class="form-control" required autocomplete="off"> -->
			</div>

		<hr>
		<h3>Medical History</h3>
		<hr>

		<!-- Medical History(if Any) -->
			<div class="form-group">
					<label for="medical">Medical History(if Any):</label>
					<input type="text" name="Medical" placeholder="Enter Medical History (if Any) ..." id="medical" class="form-control" autocomplete="off">
			</div>

		<hr>
		<h3>Photo and Identity document</h3>
		<hr>

		<div class="row">
		<!-- Upload your photo -->
		<div class="col-md-6">
			<div class="form-group">
					<label for="photo">Upload your photo<span class="req">*</span>:</label>
					<input type="file"name="Photo" id="Photo" accept="image/*" class="form-control" required autocomplete="off">
			</div>
						 </div>
		<!-- Upload Valid Photo Identity -->
		<div class="col-md-6">
			<div class="form-group">
					<label for="identity">Upload Valid Photo Identity<span class="req">*</span>:</label>
					<input type="file" name="Identity" id="Identity" accept="image/*" class="form-control" required  autocomplete="off">
			</div>
		</div>
			<!-- Upload valid signature photo -->
			<div class="form-group">
					<label for="signature">Upload gaurdian signature<span class="req">*</span>:</label>
					<input type="file"name="signature" id="signature" accept="image/*" class="form-control" required autocomplete="off">
			</div>
						 </div>
		<!--  -->
			<div class="form-group">
					<label for="declaration">Declaration<span class="req">*</span>:</label>
					<div class="checkbox">
					<label><input type="checkbox" name="Declaration" id="Declaration" value="accepted" class="checkbox" required> I declare that I have gone through all the regulations regarding the hostel and I promise that I have strictly follow them.
               		If I am found guilty of Violation of hostel rules, I shall accept any action against me. Information provided by me is correct.</label></div>
			</div>
			<button type="submit" name="Submit" value="Submit" class="btn btn-success btn-lg">SUBMIT</button><br>
			</fieldset>
		</form>
		
	</div><br> <!-- close of container div -->
	<script src="../jquery.js"></script>
	<script src="validate-form-fields.js"></script>
	
<?php
	include('../Student login/includes/scripts.php');
	include('../Student login/includes/footer.php');
?>