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



 input:focus
{
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
input
{
    border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}
    

    
    h1 {
        color: rgb(10, 3, 54);
    }
	
	</style>
	

	<div class="container">
		<h1 class="text-center ">HOSTEL ADMISSION FORM</h1>
		<form action="form_database.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			
        <div class="contain">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Student Name </b></label>
            <input type="text" name="Sname" class="form-control" placeholder="Student Name" required/>
        </div>
        <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Father's Name</b></label>           
            <input type="text" name="Fname" class="form-control" placeholder="Father's Name" required/>
        </div>

         <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Mother's Name</b></label>           
            <input type="text" name="Mname" class="form-control" placeholder="Mother's Name" required/>
        </div>
    </div>

     <div class="row">
        <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Class </b></label>
            <input type="text" name="Class" class="form-control" placeholder="Class" required/>
        </div>
        <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Branch</b></label>           
            <input type="text"  name="Branch" class="form-control" placeholder="Branch" required/>
        </div>

         <div class="col-md-4">
            <div class="form-group"></div>
            <label for="Name" class="control-label"><b>Entrance Rank</b></label>           
            <input type="text" name="Ee" class="form-control" placeholder="Entrance Rank" required/>
        </div>
    </div>

 
    <div class="row">
        <div class="col-md-8 ">
            <div class="form-group">
            <label for="Name" class="control-label"><b>Permanent Address</b></label>
            <input type="text" name="PA" class="form-control" placeholder="Permanent Address" required/>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="form-group">
            <label for="Name"><b>Pincode</b></label>
            <input type="text" name="Pincode" class="form-control" placeholder="Pincode" required/>
            </div>
    </div>
        </div>
    
      <div class="row">
        <div class="col-md-8 ">
            <div class="form-group">
            <label for="Name"><b>Local Guardian's Name</b></label>
            <input type="text" name="Gname" class="form-control" placeholder="Local Guardian's Name" required/>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="form-group">
            <label for="Name"><b>Relation</b></label>
           
            <input type="text"name="Rel" class="form-control" placeholder="Relation" required/>
            </div>
    </div>
          </div>
    
     
  
         
    <div class="row">
        <div class="col-md-8 ">
            <div class="form-group">
            <label for="Name"><b>Local Address</b></label>
            <input type="text" name="LocalAdd"class="form-control" placeholder="Local Address" required/>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="form-group">
            <label for="Name"><b>Pincode</b></label>
            <input type="text" name="PincodeLocal"class="form-control" placeholder="Pincode" required/>
            </div>
    </div>
        </div>


        <div class="row">
            <div class="col-md-4 ">
            <div class="form-group">
            <label for="Name"><b>Category</b></label>
             <input type="file" name="Cat" class="form-control" placeholder="Category" required/>
            </div> 
        </div>
        <div class="col-md-4 ">
            <div class="form-group">
    <select name="Gender" id="gender">
    <option value="">-Select Gender-</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select>
            </div>
        </div>
            </div>
        

        <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="Name"><b>Student Mobile Number</b></label>
            <input type="text" name="Smobile"class="form-control" placeholder="Student Mobile Numbeer" required/>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="Name"><b>Father's Mobile Number</b></label>
            <input type="text"name="Fmobile" class="form-control" placeholder="Father's Mobile Number" required/>
            </div>
    </div>
            </div>

            
        <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="Name"><b>Fee Receipt Number</b></label>
            <input type="text" name="FRN"class="form-control" placeholder="Fee Receipt Number " required/>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="Name"><b>Date</b></label>
            <input type="text" name="Date"class="form-control" placeholder="Date" required/>
            </div>
    </div>

            </div>

    
            <div>
                <button name="submit" value="submit"  type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </div>
    
        </div>
		</form>
		
	</div><br> <!-- close of container div -->
	<script src="../jquery.js"></script>
	<script src="validate-form-fields.js"></script>
	
<?php
	include('../Student login/includes/scripts.php');
	include('../Student login/includes/footer.php');
?>