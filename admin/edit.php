<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require('../connection.php');
 $email=$_POST['email'];
 $gender=$_POST['gender'];


if($gender=="male")
	{
		$query="SELECT * FROM boys_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    
	}
	else if($gender=="female")
	{
		$query="SELECT * FROM girls_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    
	}

	$q="SELECT * FROM student_login WHERE email='$email'";
	$data=mysqli_query($con,$q);
	$stuLog=mysqli_fetch_array($data);
?>


<style type="text/css" media="screen">
		.req
		{
			color: red;
			font-size: 20px;
		}
		.hr
		{
			border: 2px solid #2c5c3b ;
		}
		#mobile-error,#aadhar-error
		{
			color: red;
		}
	
	</style>
	<script src="../jquery.js"></script>
	<script src="../form/validate-form-fields.js"></script>

	<div class="container">
		<h1 class="text-center ">HOSTEL ADMISSION FORM</h1>
   		<hr class="hr">
		<form action="form_edit_database.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<fieldset>
				<h5>Mandatory fields are indicated by <span class="req">*</span></h5>
			<!-- show error message for all mandatory fields -->
			<div class="form-group">
				<span id="mandatory-error"></span>
			</div>
			
			<hr class="hr">
			<h3>Personal Detail</h3>
			<hr class="hr">
			<!-- first name -->
			<div class="form-group">
				<label for="First name">First Name<span class="req">*</span>:</label>
				<input type="text" name="Fname" id="fname" class="form-control" placeholder="Enter First Name..." required value="<?php echo $result['fname']; ?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="f-error"></span>
			</div>
			

		<!-- middle name -->
			<div class="form-group">
					<label for="Middle name">Middle Name:(optional)</label>
					<input type="text" name="Mname" id="mname" class="form-control" placeholder="Enter Middle Name..." value="<?php echo $result['mname']; ?>" >
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="m-error"></span>
			</div>


		<!-- last name -->
			<div class="form-group">
					<label for="Last name">Last Name<span class="req">*</span>:</label>
					<input type="text" name="Lname" id="lname" class="form-control" placeholder="Enter last Name..." required value="<?php echo $result['lname']; ?>" >
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="l-error"></span>
			</div>


		<!-- email -->
			<div class="form-group">
					<label for="Email">Email<span class="req">*</span>:</label>
					<input type="email" name="Email" id="email" class="form-control" placeholder="Enter Your Email..." required value="<?php echo $result['email'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="email-error"></span>
			</div>

		<!-- mobile number -->
			<div class="form-group">
					<label for="mobile">Mobile Number<span class="req">*</span>:</label>
					<input type="text" name="Mobile" id="mobile" class="form-control" placeholder="Enter 10 digit Mobile number..." required maxlength="10" value="<?php echo $result['mobile'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="mobile-error"></span>
			</div>

		<!-- gender -->
			<div class="form-group">
					<label for="gender">Gender<span class="req">*</span>:</label>
					<input type="text" name="Gender" id="gender" class="form-control" required value="<?php echo $result['gender'];?>" readonly>
					
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="gender-error"></span>
			</div>

		<!-- Aadhar number -->
			<div class="form-group">
					<label for="Aadhar">Aadhar Number<span class="req">*</span>:</label>
					<input type="text" name="Aadhar" id="aadhar" class="form-control" placeholder="Enter 12 digit Aadhar number..." required maxlength="12" value="<?php echo $result['aadhar'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="aadhar-error"></span>
			</div>


		<!-- Date of Birth -->
			<div class="form-group">
					<label for="DOB">DOB<span class="req">*</span>:</label>
					<input type="date" name="DOB" id="DOB" class="form-control" placeholder="Enter Date of Birth..." required maxlength="10" value="<?php echo $result['dob'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="DOB-error"></span>
			</div>

			<hr class="hr">
			<h3>Current Acadmic Detail</h3>
			<hr class="hr">

		<!-- Institute -->
			<div class="form-group">
				<label for="institute">Institute<span class="req">*</span>:</label>
				<select name="Institute" id="institute" class="form-control" required>
						
				<?php
					 $q="SELECT * FROM institute";
					 $temp=mysqli_query($con,$q);
					 while ($opt=mysqli_fetch_array($temp)) 
					 	{ ?>
					 	<option value="<?php echo $opt['institute_id']; ?>"><?php echo $opt['name']; ?></option>
						
						<?php
							if($opt['institute_id'] == $result['institute_id'])
							{
								echo '<option selected value="'.$result['institute_id'].'" hidden>'.$opt['name'].'</option>';
							}
						 } ?>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="institute-error"></span>
			</div>

		<!-- course -->
			<div class="form-group">
					<label for="course">Course<span class="req">*</span>:</label>
					<select name="Course" id="course" class="form-control" required>
						<?php
							 $q='SELECT * FROM course WHERE c_id='.$result['c_id'];
							 $temp=mysqli_query($con,$q);
							 $course=mysqli_fetch_array($temp); 
					 	 ?>
					 	<option value="<?php echo $course['c_id']; ?>" selected hidden><?php echo $course['name']; ?></option>
								
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
						<option selected value="<?php echo $result['year']; ?>" hidden><?php echo $result['year']; ?></option>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="year-error"></span>
			</div>

		<!-- Date of Admission -->
			<div class="form-group">
					<label for="AdmissionDate">Date of Admission<span class="req">*</span>:</label>
					<input type="date" name="AdmissionDate" id="admission" class="form-control" placeholder="Enter Date of Admission..." required value="<?php echo $result['admission_date'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="AdmissionDate-error"></span>
			</div>

		<!--transactionid-->
			<div class="form-group">
					<label for="Middle name">Transaction Id<span class="req">*</span>: </label>
					<input type="text" name="TransactionId" id="transactionid" class="form-control" placeholder="Enter Transaction Id..." value="<?php echo $result['transaction_id']; ?>" required>
			</div>

			<hr class="hr">
			<h3>Parent's Detail</h3>
			<hr class="hr">

		<!-- father's name -->
			<div class="form-group">
					<label for="father name">Father's/Mother's Name (if mother is the only parent then enter mother's name)<span class="req">*</span>:</label>
					<input type="text" name="FatherName" id="father-name" class="form-control" placeholder="Enter Father's/Mother's Name..." required value="<?php echo $result['father'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="father-error"></span>
			</div>


		<!-- Occupation/Designation: -->
			<div class="form-group">
					<label for="Designation">Occupation/Designation<span class="req">*</span>:</label>
					<input type="text" name="Designation" id="designation" class="form-control" placeholder="Enter Occupation/Designation..." required value="<?php echo $result['designation'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="designation-error"></span>
			</div>


		<!-- Office address -->
			<div class="form-group">
					<label for="AddOffice">Address (office):</label>
					<input type="text" name="AddOffice" id="addoffice" class="form-control" placeholder="Enter Address Of Office..." value="<?php echo $result['addoffice'];?>">
			</div>
		

		<!-- telephone/mobile (office) -->
			<div class="form-group">
					<label for="telephone">telephone/mobile (office):</label>
					<input type="text" name="Telephone" id="telephone"  class="form-control" placeholder="Enter Telephone Of Office..." value="<?php echo $result['telephone'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="telephone-error"></span>
			</div>

		<!-- Residential address -->
			<div class="form-group">
					<label for="residence">Residential Address<span class="req">*</span>:</label>
					<textarea name="Residence" id="residence" placeholder="Enter Residential Address..." rols="10" class="form-control" required><?php echo $result['residence'];?></textarea>
			</div>


		<!-- Annual Family Income(Approx) -->
			<div class="form-group">
					<label for="income">Annual Family Income(Approx)<span class="req">*</span>:</label>
					<input type="text" name="Income" id="income" class="form-control" placeholder="Enter Annual Family Income(Approx)..." required value="<?php echo $result['income'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="income-error"></span>
			</div>

			<hr class="hr">
			<h3>Local Guardian Detail</h3>
			<hr class="hr">

		<!-- Name of Local Guardian(if any) -->
			<div class="form-group">
					<label for="guardian">Name of Local Guardian(if any):</label>
					<input type="text" name="Guardian" id="guardian" class="form-control" placeholder="Enter Name of Local Guardian(if any)..." value="<?php echo $result['guardian'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="guardian-error"></span>
			</div>

		<!-- Residential address of local guardian-->
			<div class="form-group">
					<label for="ResidenceGU">Residential address of local guardian:</label>
					<textarea name="ResidenceGU" id="residenceGU" placeholder="Enter Residential Address of local guardian..." rols='10' class="form-control" ><?php echo $result['residence_gua'];?></textarea>
			</div>

		<!-- telephone/mobile local guardian -->
			<div class="form-group">
					<label for="telephone">telephone/mobile (local guardian):</label>
					<input type="text" name="TelephoneGU" id="telephoneGU"  class="form-control" placeholder="Enter Telephone/mobile of local guardian..." value="<?php echo $result['telephone_gua'];?>">
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="telephoneGU-error"></span>
			</div>

			<hr class="hr">
			<h3>Hostel Residence Detail</h3>
			<hr class="hr">

		<!-- Hostler or not -->
			<div class="form-group">
					<label for="hostler">Applicant has been the resident of C.S.J.M University, Kanpur hostel<span class="req">*</span>:</label>
					<label class="radio-inline"> <input type="radio" name="Hostler" id="hostlerY" value="YES" <?php if($result['hostler'] == "YES"){echo "checked";} ?> >YES </label>
					<label class="radio-inline"> <input type="radio" name="Hostler" id="hostlerN" value="NO" <?php if($result['hostler'] == "NO"){echo "checked";} ?> >NO</label>
			</div>
		<!-- show fields Hostel Name and Room Number -->
			<div class="form-group">
				<span id="HostelNameNumber"></span>
			</div>
			

		<hr class="hr">
		<h3>Last Passing Examination Detail</h3>
		<hr class="hr">

		<!-- Details of last passing Examination -->
			<div class="form-group">
					<label for="last-exam">Details of last passing Examination<span class="req">*</span>:</label>
					<input type="text" name="LastExam" placeholder="Enter Name Of Examination ..." id="LastExam"  class="form-control" required value="<?php echo $result['last_exam'];?>"><br>
		            <input type="text" name="Board" placeholder="Enter University Board ..." id="Board" class="form-control" required value="<?php echo $result['board'];?>"><br>
		            <input type="text" name="Subject" placeholder="Enter Subjects ..." id="subject" class="form-control" required value="<?php echo $result['subject'];?>"><br>
		            <input type="text" name="Score" placeholder="Enter Score In Percentage ..." id="score" class="form-control" required value="<?php echo $result['score'];?>"><br>
		            <input type="number" name="Attempts" placeholder="Enter Number Of Attempts ..." id="attempts" class="form-control" required value="<?php echo $result['attempts'];?>">
			</div>

		<hr class="hr">
		<h3>Medical History</h3>
		<hr class="hr">

		<!-- Medical History(if Any) -->
			<div class="form-group">
					<label for="medical">Medical History(if Any):</label>
					<input type="text" name="Medical" placeholder="Enter Medical History (if Any) ..." id="medical" class="form-control" value="<?php echo $result['medical'];?>">
			</div>
			<hr class="hr">

		<!-- hidden content student serial number-->
			<div class="form-group">
					<input type="text" name="Sno" class="form-control" value="<?php echo $result['sno'];?>" hidden>
			</div> 

		<!-- hidden content student login serial number -->
			<div class="form-group">
					<input type="text" name="StuLogSno" class="form-control" value="<?php echo $stuLog['sno'];?>" hidden>
			</div> 

		<!-- Declaration -->
			<div class="form-group">
					<label for="declaration">Declaration<span class="req">*</span>:</label>
					<div class="checkbox">
					<label><input type="checkbox" name="Declaration" id="Declaration" value="accepted" class="checkbox" required <?php if($result['declaration'] == "accepted"){echo "checked";} ?> > I declare that I have gone through all the regulations regarding the hostel and I promise that I have strictly follow them.
               		If I am found guilty of Violation of hostel rules, I shall accept any action against me. Information provided by me is correct.</label></div>
			</div>
			<button type="submit" name="Submit" value="Submit" class="btn btn-success btn-lg">SUBMIT</button>
			</fieldset>
		</form>
		
	</div> <!-- close of container div -->
	


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>