
<!-- student home page -->
<?php
	include('includes/security.php');
	 include('includes/header.php');
	include('includes/navbar.php');
	
	error_reporting(0);
	$email=$_GET['email'];
	$gender=$_GET['gender'];
	require("../connection.php");

	// security check for auto logout after details deleted.
	$qu = "SELECT * FROM student_login WHERE email = '$email'";
	$check = mysqli_query($con,$qu);
	$num_check = mysqli_num_rows($check);
	if ($num_check != 1) {
		session_destroy();
		header('location:login.php');
	}

	
	//show details of boys
	if($gender=="male")
	{
		$query="SELECT * FROM boys_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    $num=mysqli_num_rows($data);


	    $q="SELECT * FROM student_login WHERE email='$email'";
	    $d=mysqli_query($con,$q);
	    $res=mysqli_fetch_array($d);
	    $TransactionId=$res['transactionid'];
	    $stu_name=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
	}
	else if($gender=="female")
	{
		$query="SELECT * FROM girls_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    $num=mysqli_num_rows($data);


	    $q="SELECT * FROM student_login WHERE email='$email'";
	    $d=mysqli_query($con,$q);
	    $res=mysqli_fetch_array($d);
	    $TransactionId=$res['transactionid'];
	    $stu_name=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
	}

	if($result['status'] == "allocated")
	{
	//select hostel name 
	    $query="SELECT name FROM hostelname WHERE h_id='$result[hostel_name]'";
	     $data=mysqli_query($con,$query);
	    $Res=mysqli_fetch_array($data);
	    $hostel=$Res['name'];

	    //select hostel block name 
	    $query="SELECT name FROM block WHERE b_id='$result[block]'";
	     $data=mysqli_query($con,$query);
	    $Resu=mysqli_fetch_array($data);
	    $block=$Resu['name'];

	    //select hostel room number 
	    $query="SELECT room_name FROM room WHERE room_id='$result[room_no]'";
	     $data=mysqli_query($con,$query);
	    $Resul=mysqli_fetch_array($data);
	    $room=$Resul['room_name'];
		//select amount
		$query="SELECT amount FROM hostelname WHERE h_id='$result[hostel_name]'";
	     $data=mysqli_query($con,$query);
	    $Res=mysqli_fetch_array($data);
	    $amount=$Res['amount'];

    }
    //fetching institute name from database
	$q="SELECT * FROM institute WHERE institute_id='".$result['institute_id']."'";
	$data=mysqli_query($con,$q);
	$inst=mysqli_fetch_array($data);

	 //fetching course name from database
	$q="SELECT * FROM course WHERE c_id='".$result['c_id']."'";
	$data=mysqli_query($con,$q);
	$course_name=mysqli_fetch_array($data);
?>

  

<!-- Modal for photo-->
<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle"><?php echo $stu_name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal body -->
      <div class="modal-body">
       		<img src="../form/<?php echo $result['photo']; ?>" alt="image of student" class="m-0">
      </div>
      <!-- modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
      </div>
    </div>
  </div>
</div>


<!-- Modal for identity-->
<div class="modal fade" id="identity-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">IDENTITY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal body -->
      <div class="modal-body">
       		<!-- identity -->
			<img src="../form/<?php echo $result['identity']; ?>" alt="image of identity" class="m-0">
      </div>
      <!-- modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
      </div>
    </div>
  </div>
</div>


    <div style="margin: 10px 10% 10px 10%;">
    	<?php if($num!=1){ ?>
    		<a class="btn btn-success btn-icon-split" href="../form/form.php?email=<?php echo urlencode($email)?>" > Apply Now </a>
   		 <?php }?>
        <a  class="btn btn-success btn-icon-split" href="changepassword.php?email=<?php echo urlencode($email)?>"> Change password </a>
        <a class="btn btn-success btn-icon-split" href='logout.php'> logout </a>
        <a class="btn btn-success btn-icon-split" href="#" id="print">Print</a>
		<?php if($result['status'] == "allocated") { ?>
        <a class="btn btn-success btn-icon-split" href="https://rzp.io/l/bVIgTfX" target = "_blank" type="button" >Payment</a>
		<?php } ?>
		<!-- code for payment of hostel  -->
			<!-- <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_ID6krQmLcu7HV4" async> </script> </form> -->
    </div>
	<div class="container font-italic" id="page">

	<style type="text/css">
		img
		{
			width: 100%;
			height: 200px;
		}
		.heading1
		{
			background-color: #566D7E;
		}
		body{
			text-transform: capitalize;
			
		}
		#identity,#stu-photo
		{
			cursor: pointer;
		}

	</style>


	<div id="heading" class="bg-success">
		<h1 class="text-center">Student Personal Details</h1>
	</div>

	<div class="row">
		<!-- show photo -->
		<div class="col-sm-4">
			<div id="div1" class="card media overflow-hidden"> 
				<div class="card-header bg-secondary text-center w-100 text-uppercase font-weight-bold">
					<span><?php echo $stu_name; ?></span>
				</div>	
				<!-- photo --> <!--  trriger of modal -->
				<img src="../form/<?php echo $result['photo']; ?>" alt="image of student" class="mr-3 mt-3 rounded-circle" id="stu-photo" data-toggle="modal" data-target="#photo-modal" data-toggle="tooltip" data-placement="bottom" title="click to view">
			</div>
		</div>

		<!-- show identity  -->
		<div class="col-sm-4">
				<div  class="card media overflow-hidden"> 
					<div class="card-header w-100 bg-secondary text-center text-capitalize font-weight-bold">
						<span>IDENTITY</span>
					</div>	
					<!-- identity --><!--  trriger of modal -->
					<img src="../form/<?php echo $result['identity']; ?>" alt="image of identity" id="identity" class="mr-3 mt-3" data-toggle="modal" data-target="#identity-modal" data-toggle="tooltip" data-placement="bottom" title="click to view">
				</div>
		</div>

		<!-- show hostel details -->
		<div class="col-sm-4 overflow-auto">
					<div  class="card media"> 
						<div class="card-header bg-secondary text-center w-100 text-capitalize font-weight-bold">
							<span>CURRENT STATUS</span>
						</div>
						
						<table class="table table-striped m-0">
							<tr>
								<th>status</th>
								<td><?php if(isset($result))
											{
												echo $result['status']; 
											}
											else
											{
												echo "Not applied yet!";
											}
									?>
													
								</td>
							</tr>
							<tr>
								<th>Transaction ID</th>
								<td><?php echo $TransactionId; ?></td>
							</tr>
							<tr>
								<th>hostel name</th>
								<td><?php echo $hostel; ?></td>
							</tr>
							<tr>
								<th>block</th>
								<td><?php echo $block; ?></td>
							</tr>
							<tr>
								<th>room number</th>
								<td><?php echo $room; ?></td>
							</tr>

							<tr>
								<th>Amount</th>
								<td><?php echo $amount; ?></td>
							</tr>
						</table>
						
					</div>
		</div>
	</div> <!-- end of row -->

	<?php if(isset($result)){  ?>
	<div id="table_container" class="overflow-auto mt-2">
		<table class="table table-striped m-0"> 
			<tr>
				<th colspan="2" class="heading1"><h1>personal details:</h1></th>
				
			</tr>
			<tr>
				<th>First Name:</th>
				<td><?php echo $result['fname']; ?></td>
			</tr>
			<tr>
				<th>Middle Name:</th>
				<td><?php echo $result['mname']; ?></td>
			</tr>
			<tr>
				<th>Last Name:</th>
				<td><?php echo $result['lname']; ?></td>
			</tr>
			<tr>
				<th>Email:</th>
				<td style="text-transform: none;"><?php echo $result['email']; ?></td>
			</tr>
			<tr>
				<th>Mobile</th>
				<td><?php echo $result['mobile']; ?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?php echo $result['gender']; ?></td>
			</tr>
			<tr>
				<th>Aadhar</th>
				<td><?php echo $result['aadhar']; ?></td>
			</tr>
			<tr>
				<th>DOB</th>
				<td><?php echo $result['dob']; ?></td>
			</tr>
			<tr>
				<th colspan="2" class="heading1"><h1>Acadmic Details:</h1></th>
			</tr>
			<tr>
				<th>Institute</th>
				<td><?php echo $inst['name']; ?></td>
			</tr>
			<tr>
				<th>Course</th>
				<td><?php echo $course_name['name']; ?></td>
			</tr>
			<tr>
				<th>Year</th>
				<td><?php echo $result['year']; ?></td>
			</tr>
			
			<tr>
				<th>Admission Date</th>
				<td><?php echo $result['admission_date']; ?></td>
			</tr>
			<tr>
				<th colspan="2" class="heading1"><h1>Parent's Details:</h1></th>
			</tr>
			<tr>
				<th>Father</th>
				<td><?php echo $result['father']; ?></td>
			</tr>
			<tr>
				<th>Mother</th>
				<td><?php echo $result['mother']; ?></td>
			</tr>
			<tr>
				<th>Designation/Occupation</th>
				<td><?php echo $result['designation']; ?></td>
			</tr>
			<tr>
				<th>Office Address</th>
				<td><?php echo $result['addoffice']; ?></td>
			</tr>
			<tr>
				<th>Telephone</th>
				<td><?php echo $result['telephone']; ?></td>
			</tr>
			<tr>
				<th>Residence</th>
				<td><?php echo $result['residence']; ?></td>
			</tr>
			<tr>
				<th>Family Income(approx)</th>
				<td><?php echo $result['income']; ?></td>
			</tr>
			<tr>
				<th colspan="2" class="heading1"><h1>local guardian Details:</h1></th>
			</tr>
			<tr>
				<th>Local Guardian</th>
				<td><?php echo $result['guardian']; ?></td>
			</tr>
			<tr>
				<th>Residence of Local Guardian</th>
				<td><?php echo $result['residence_gua']; ?></td>
			</tr>


			<tr >
				<th colspan="2" class="heading1"><h1>Resident of hostel Details:</h1></th>
			</tr>
			<tr>
				<th>Is student was resigent of CSJMU hostel:</th>
				<td><?php echo $result['hostler']; ?></td>
			</tr>
			<?php if (isset($result['hostler'])) {  ?>
			<tr>
				<th>Old hostel name and room number</th>
				<td><?php echo $result['old_hostel_name_number']; ?></td>
			</tr>
		    <?php } ?>


		    <tr>
				<th colspan="2" class="heading1"><h1>last passing examination Details:</h1></th>
			</tr>
			<tr>
				<th>1st year entrance rank</th>
				<td><?php echo $result['last_exam']; ?></td>
			</tr>
			<tr>
				<th>Board</th>
				<td><?php echo $result['board']; ?></td>
			</tr>
			<tr>
				<th>subject</th>
				<td><?php echo $result['subject']; ?></td>
			</tr>
			<tr>
				<th>Score</th>
				<td><?php echo $result['score']; ?></td>
			</tr>
			<tr>
				<th>Number of Attempts</th>
				<td><?php echo $result['attempts']; ?></td>
			</tr>


			<tr>
				<th colspan="2" class="heading1"><h1>Medical Details:</h1></th>
			</tr>
			<tr>
				<th>medical history</th>
				<td><?php echo $result['medical']; ?></td>
			</tr>
			<tr>
				<th colspan="2" class="heading1"><h1>other:</h1></th>
			</tr>
			<tr>
				<th>declaration</th>
				<td><?php echo $result['declaration']; ?></td>
			</tr>
			<tr>
			<th colspan="2" class="heading1"><h1>Approval of Director/Head:</h1></th>
			</tr>
			<tr>
				<th>First Name:</th>
				<td><?php echo $result['fname']; ?></td>
			</tr>
			<tr>
				<th>Middle Name:</th>
				<td><?php echo $result['mname']; ?></td>
			</tr>
			<tr>
				<th>Last Name:</th>
				<td><?php echo $result['lname']; ?></td>
			</tr>
			<tr>
				<th>Son/Daughter of :</th>
				<td><?php echo $result['father']; ?></td>
			</tr>
			<tr>
				<th>Department/Institute</th>
				<td><?php echo $inst['name']; ?></td>
			</tr>
		</table>	
	</div>
	<div>
		<b> has admitted his behaviour satisfactory . I approvedc his her admission in Hostel.</b> <br> <br>
		<b> Date :</b> <input type="text">   <br> <br>
		 <b>Sign and Stamp of hod </b>...........................................................................
		<br>
		<center>
	    <th colspan="2" class="heading1"><h1>Approval of Warden:</h1></th>
		</center>
		<br>
		<tr>
		   <b>	Date of Submission Hostel Application form :  .................................................................... </b>
		</tr>
		<br>
		<tr>
				<th> <b> hostel name :       </b> </th>
				<td><?php echo $hostel; ?></td>
		</tr>
		
		<tr>
			<br>
			<th> <b> room number  </b></th>
			<td><?php echo $room; ?></td>
		</tr>
		<tr>
			<th>
				<br> <b>Hostel Fees and Mess Fees : ..................................................................</b>
			</th>
			<th>
				<b>Date : .............................................................................................</b>
			</th>
		</tr>
		<br>
		<br>
		<br>
		<tr>
			<b>Sign of Clerk  : ......................................................................................</b>
			<b>Sign of Warden : ......................................................................................</b>
		</tr>
		
	</div>
	<br>



	<?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#print").click(function(){
			var backuppage=$("body").html();
			var pagevalue=$("#page").html();
			$("body").html(pagevalue);
			window.print();
			$("body").html(backuppage);
		});
	});
</script>
<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>