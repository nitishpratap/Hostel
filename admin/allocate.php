<?php
	include('includes/security.php'); 	//security features
	include('includes/header.php');		//header
	include('includes/navbar.php');	//navbar 
	require('../connection.php');  //establishing connection from database
	$gender=$_POST['gender'];
	$email=$_POST['email'];
?>
<div class="container">
	<h1 class="h1">Allocation:</h1>
	<div class="form-group">
				<span id="Result">
					
				</span>
			</div>
	<form action="allocate_database.php" method="post" accept-charset="utf-8">
		<!-- Institute -->
			<div class="form-group">
				<label for="hostel">Hostel</label>
				<select name="Hostel" id="hostel" class="form-control" required>
						<option value="" hidden selected>-- Select --</option>
			<?php
			// for boys 
				if($gender == "male"){
					 $q="SELECT * FROM hostelname WHERE type='b'"; //select query form hostelname table 
					 $temp=mysqli_query($con,$q);
					 while ($opt=mysqli_fetch_array($temp)) //while loop
					 	{ ?>
					 	<option value="<?php echo $opt['h_id']; ?>"><?php echo $opt['name']; ?></option>
			<?php 		}//end of while loop
					}  // end of IF statement for boys
				else if($gender == "female") // for girls
				{
					 $q="SELECT * FROM hostelname WHERE type='g'"; //select query form hostelname table 
					 $temp=mysqli_query($con,$q);
					 while ($opt=mysqli_fetch_array($temp)) //while loop
					 	{ ?>
					 	<option value="<?php echo $opt['h_id']; ?>"><?php echo $opt['name']; ?></option>
			<?php 		}//end of while loop
					}  // end of IF statement for girls
			 ?>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="hostelname-error"></span>
			</div>

		<!-- block -->
			<div class="form-group">
					<label for="block">Block:</label>
					<select name="Block" id="block" class="form-control" required>
						<option value="" hidden selected>-- Select --</option>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="block-error"></span>
			</div>

		<!-- Room -->
			<div class="form-group">
					<label for="room">Room:</label>
					<select name="Room" id="room" class="form-control" required>
						<option value="" hidden selected> -- Select --</option>
					</select> 
			</div>
		<!-- show error -->
			<div class="form-group">
				<span id="room-error"></span>
			</div>

			<!-- hidden content student gender-->
			<div class="form-group">
					<input type="text" name="gender" class="form-control" value="<?php echo $gender;?>" hidden>
			</div> 

			<!-- hidden content student email-->
			<div class="form-group">
					<input type="text" name="email" class="form-control" value="<?php echo $email;?>" hidden>
			</div> 

			<button type="submit" id="submit" name="Submit" value="Allocate" class="btn btn-success btn-lg">Allocate</button>
	</form>
</div>

<!-- jQuery -->
<script>
	$(document).ready(function(){
		//ajax for selecting  block name
		$("#hostel").change(function(){
			var hostelId=$(this).val();
			$.ajax({
				url:"ajax_block_name.php",
				type:"post",
				data:{id:hostelId},
				datatype:"html",
				
				success:function(blockResult){
					$("#block").html(blockResult);
				}
			}); //end of ajax function
		}); 


		//ajax technique for selection of room
		$("#block").change(function(){
			var blockId=$(this).val();
			$.ajax({
				url:"ajaxroom.php",
				type:"post",
				data:{id:blockId},
				datatype:"html",
				
				success:function(roomResult){
					$("#room").html(roomResult);
				}
			});  //end of ajax function
		});


		$("#submit").click(function(){
			if(hostelvalid() && blockvalid() && roomvalid())
			{
				return true;
			}else{
				return false;
			}
				
		});

			//check empty field of hostel name
			function hostelvalid(){
				if ($("#hostel").val() == "") 
				{
					$("#hostelname-error").html("*** Please select a Hostel. ***");
					$("#hostelname-error").css("color","red");
					return false;
				}
				else
				{
					$("#hostelname-error").html("");
					return true;
				}
			}
			
			//check empty field of block name
			function blockvalid(){
				if ($("#block").val() == "") {
					$("#block-error").html("*** Please select a Block. ***");
					$("#block-error").css("color","red");
					return false;
				}
				else
				{
					$("#block-error").html("");
					return true;
				}
			}

			//check empty field of room name
			function roomvalid(){
				if ($("#room").val() == "") {
					$("#room-error").html("*** Please select a Room. ***");
					$("#room-error").css("color","red");
					return false;
				}
				else
				{
					$("#room-error").html("");
					return true;
				}
			}
		
	}); //end of ready function
</script>

<?php
	include('includes/scripts.php');  //scripts
	include('includes/footer.php');		//footer
?>