<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require('../connection.php');

$query="SELECT * FROM girls_details";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);	
?>

<div class="container-fluid">
	<!-- show status of edit result -->
<span id="showstatus"><?php if (isset($_SESSION['success'])) {
	echo "<h4 style='color:green;'>".$_SESSION['success']."</h4>";
	unset($_SESSION['success']);
}
if (isset($_SESSION['error_edit'])) {
	echo "<h4 style='color:red;'>".$_SESSION['error_edit']."</h4>";
	unset($_SESSION['error_edit']);
}

 ?></span>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  

  <div class="card-body">

    <div class="table-responsive">
    	
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th>S.no.</th>
			<th>Name</th>
		    <th>Father</th>
		    <th>Email</th>
		    <th>Course</th>
		    <th>Status</th>
            <th>Gender</th>
		    <th colspan="4">Operations</th>
          </tr>
        </thead>
        <tbody>
     			<?php
		    	  		if ($total != 0) {
		    	  			$num = 1;
		    	  			while ($result=mysqli_fetch_assoc($data)) {
		    	  				$que="SELECT name FROM course WHERE c_id='$result[c_id]'";
		    	  				$dat=mysqli_query($con,$que);
		    	  				$res=mysqli_fetch_array($dat);
		    	  				echo "<tr>
		    	  							<td>".$num."</td>
		    	  							<td>".$result['fname']." ".$result['mname']." ".$result['lname']."</td>
		    	  							<td>".$result['father']."</td>
		    	  							<td>".$result['email']."</td>
		    	  							<td>".$res['name']."</td>
		    	  							<td>".$result['status']."</td>
                                            <td>".$result['gender']."</td>";
                                            
		    	  							if($result['status'] == "pending"){
		    	  							echo '<td>
								                <form action="allocate.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="allocate_btn" class="btn btn-info"> ALLOCATE</button>
								                </form>
								            </td>';}
								            echo '<td>
								                <form action="view.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="view_btn" class="btn btn-success"> VIEW</button>
								                </form>
								            </td>
										    <td>
								                <form action="edit.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="edit_btn" class="btn btn-warning"> EDIT</button>
								                </form>
								            </td>
		    	  							<td>
								                <form action="delete.php" method="post">
								                  <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                  <button type="submit" id="delete_btn" name="delete_btn" class="btn btn-danger"> DELETE</button>
								                </form>
								            </td>';
								             
		    	  					echo '</tr>';
		    	  					$num += 1;
		    	  			} //end of while loop
		    	  			
		    	  		} //end of IF for total 
		    	  		else
		    	  		{
		    	  			echo "<h1>No Record Found!.</h1>";
		    	  		}
		    	  	?>
     	
        </tbody>
      </table>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->
<script>
   $(document).ready(function(){
      $("#delete_btn").click(function(){
        var conf=confirm("Are you sure! you want to delete the details.");
        if (conf) {
          return true;
        }
        else{
          return false;
        }
      });
   });
 </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>