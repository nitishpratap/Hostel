<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require('../connection.php');

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="validate_register.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <span id="status"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="pws" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="cpws" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit1" name="registerbtn" class="btn btn-primary">Save</button>
            <script src="../jquery-3.4.1.min.js"></script>
            <script>
                $(document).ready(function(){
                    //password validation
                    $("#submit1").click(function(){
                        var pws=$("#pws").val();
                        var cpws=$("#cpws").val();
                        if (pws != cpws) {
                            $("#status").html("*** Password and Confirm Password are not same. ***");
                            $("#status").css("color","red");
                            return false;
                        }
                        else{
                            $("#status").html(" ");
                            return true;
                        }
                    });
                });
              </script>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>
  
  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <?php 

              $username=$_SESSION['username'];
              $q="SELECT * FROM admin_login";
              $result=mysqli_query($con,$q);
              
         ?>
        <tbody>
            <?php while($data=mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td> <?php echo $data['sno'];?> </td>
            <td> <?php echo $data['username'];?></td>
            <td> <input type="password" value="<?php echo $data['password'];?>" disabled> </td>
            <td>
                <form action="admin_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $data['sno'];?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="admin_delete.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $data['sno'];?>">
                  <button type="submit" id="delete_btn" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php }?>
       
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<script src="../jquery-3.4.1.min.js"></script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>