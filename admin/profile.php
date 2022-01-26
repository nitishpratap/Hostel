<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require('../connection.php');
$username=$_SESSION['username'];
$q="SELECT * FROM admin_login WHERE username='$username'";
	$result=mysqli_query($con,$q);
	$data=mysqli_fetch_array($result);
?>

 <div class="card-body">

    <div class="table-responsive">
      <h1>Profile:</h1>
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
          <tr>
            <th>Email </th><td><?php echo $data['username'];?> </td>
          </tr>
          <tr>
            <th>Password </th><td><input type="password" id="pws" value="<?php echo $data['password'];?>" disabled > <button id="show" type="button" class="btn">Show</button></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
  <script src="../jquery.js"></script>
  <script>
  	$(document).ready(function(){
  		$("#show").click(function(){
  			var type=$("#pws").attr("type");
  			if(type=="password")
  			{
  				$("#pws").attr("type","text");
  				$("#show").html("Hide");
  			}else{
  				$("#pws").attr("type","password");
  				$("#show").html("Show");
  			}
  		});
  	});
  </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>