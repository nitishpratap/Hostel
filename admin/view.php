<?php
	include('includes/security.php');
	include('includes/header.php'); 
	include('includes/navbar.php'); 
	require('../connection.php');

	error_reporting(0);
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	require("../connection.php");

	if($gender=="male")
	{
		//select student detail from boys_details table
		$query="SELECT * FROM boys_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    $num=mysqli_num_rows($data);
	}
	else if($gender=="female")
	{
		$query="SELECT * FROM girls_details where email='$email' ";
	    $data=mysqli_query($con,$query);
	    $result=mysqli_fetch_array($data);
	    $num=mysqli_num_rows($data);
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
	}
	// combining student name
		$stu_name=$result['fname']." ".$result['mname']." ".$result['lname'];

	//fetching institute name from database
	$q="SELECT * FROM institute WHERE institute_id='".$result['institute_id']."'";
	$data=mysqli_query($con,$q);
	$inst=mysqli_fetch_array($data);

	 //fetching course name from database
	$q="SELECT * FROM course WHERE c_id='".$result['c_id']."'";
	$data=mysqli_query($con,$q);
	$course_name=mysqli_fetch_array($data);
    

?>


	<style type="text/css">
		img
		{
			width: 100%;
			height: 200px;
		}
 	.heading1
 	{
 		background-color: #566D7E;
 		color: white;
 	}
 	span{
 		color: white;
 	}
 	body{
 		text-transform: capitalize;
 	}

 	#identity,#stu-photo
		{
			cursor: pointer;
		}
	</style>
	
	

	


<!-- Modal for photo-->
<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle"><?php echo $stu_name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-dark">&times;</span>
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
          <span aria-hidden="true" class="text-dark">&times;</span>
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



	<div class="container font-italic" id="page">

	<div id="heading" class="bg-success w-100">
		<h1 class="text-center">Student Personal Details</h1>
	</div>
	

	
	
	<div class="row">
		<!-- show photo -->
		<div class="col-sm-4">
			<div id="div1" class="card media overflow-hidden"> 
				<div class="card-header bg-secondary w-100 text-center text-uppercase font-weight-bold">
					<span><?php echo $stu_name; ?></span>
				</div>	
				<!-- photo --> <!--  trriger of modal -->
				<img src="../form/<?php echo $result['photo']; ?>" alt="image of student" class="mr-3 mt-3 rounded-circle" id="stu-photo" data-toggle="modal" data-target="#photo-modal" data-toggle="tooltip" data-placement="bottom" title="click to view">
			</div>
		</div>

		<!-- show identity  --> 
		<div class="col-sm-4">
				<div  class="card media overflow-hidden"> 
					<div class="card-header bg-secondary w-100 text-center text-capitalize font-weight-bold">
						<span>IDENTITY</span>
					</div>	
					<!-- identity --> <!--  trriger of modal -->
					<img src="../form/<?php echo $result['identity']; ?>" alt="image of identity" class="mr-3 mt-3" id="identity" data-toggle="modal" data-target="#identity-modal" data-toggle="tooltip" data-placement="bottom" title="click to view">
				</div>
		</div>

		<!-- show hostel details -->
		<div class="col-sm-4 overflow-auto">
					<div  class="card media"> 
						<div class="card-header bg-secondary w-100 text-center text-capitalize font-weight-bold">
							<span>CURRENT STATUS</span>
						</div>
					</div>
					
					<div id="table_container">
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
								<td><?php echo $result['transaction_id']; ?></td>
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
						</table>
					</div>
			
		</div>
	</div> <!-- end of row -->
	
	<?php if(isset($result)){  ?>
	<div id="table_container" class="mt-2 overflow-auto">
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
				<th>last exam</th>
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
			
			
		</table>	
	</div>
	<?php } ?>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>