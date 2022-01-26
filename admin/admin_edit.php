 <?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
require('../connection.php');
if(isset($_POST['edit_id']))
{
    $sno=$_POST['edit_id'];
    $q="SELECT * FROM admin_login WHERE sno='$sno'";
    $data=mysqli_query($con,$q);
    $result=mysqli_fetch_array($data);
}
if(isset($_POST['registerbtn'])){
    $sno=$_POST['sno'];
    $username=$_POST['email'];
    $pass=$_POST['password'];
    $q="SELECT * FROM admin_login WHERE sno='$sno'";
    $data=mysqli_query($con,$q);
    $result=mysqli_fetch_array($data);

    if($result['password']==$_POST['curr_password']){
        $q="UPDATE admin_login SET username='$username',password='$pass' WHERE sno='$sno'";
        if(mysqli_query($con,$q))
        {
            $_SESSION['success']="*** updated successfully ***";
            if ($result['username'] == $_SESSION['username']) {
                session_destroy();
            }
        }
        else{
            $_SESSION['status']="*** updation failed! Please try again. ***";
        }
    }
    else
    {
        $_SESSION['status']="*** current password is incorrect! ***";
    }
    unset($_POST['registerbtn']);
}
?>
<div class="container m-10">
<h1 class="h1">Edit Admin details</h1>
 <form action="admin_edit.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <span id="show-result">
                    <?php 
                        if (isset($_SESSION['status'])) {
                           echo '<h5 class="h5" style="color:red;">'.$_SESSION['status'].'</h5>';
                           unset($_SESSION['status']);
                        }
                        if (isset($_SESSION['success'])) {
                           echo '<h5 class="h5" style="color:green;">'.$_SESSION['success'].'</h5>';
                           unset($_SESSION['success']);
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <span id="status"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required value="<?php echo $result['username'];?>" autocomplete="off">
            </div>
            <!-- show error -->
            <div class="form-group">
                <span id="email-error"></span>
            </div>

             <div class="form-group">
                <label>Current Password</label>
                <input type="password" id="curr-pws" name="curr_password" class="form-control" placeholder="Enter Current Password" required autocomplete="off">
            </div>
            <!-- show error -->
            <div class="form-group">
                <span id="curr-pws-error"></span>
            </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password" id="pws" name="password" class="form-control" placeholder="Enter Password" required autocomplete="off">
            </div>
            <!-- show error -->
            <div class="form-group">
                <span id="pws-error"></span>
            </div>


            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="cpws" name="confirmpassword" class="form-control" placeholder="Confirm Password" required autocomplete="off">
            </div>
             <div class="form-group">
                <span id="cpws-error"></span>
            </div>
             <div class="form-group">
                <input type="hidden" name="sno" class="form-control" value="<?php echo $sno;?>">
            </div>
        
        </div>
            <button type="submit" id="update" name="registerbtn" class="btn btn-primary">UPDATE</button>
      
      </form>
  </div>
<script src="../jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function(){
        //password validation
        $("#cpws").keyup(function(){
            var pws=$("#pws").val();
            var cpws=$("#cpws").val();
            if (pws != cpws) {
                $("#cpws-error").html("*** Password and Confirm Password are not same. ***");
                $("#cpws-error").css("color","red");
                return false;
            }
            else{
                $("#cpws-error").html(" ");
                return true;
            }
        });

        //Email validation
        $("#email").keyup(function(){
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var email=$("#email").val();
            if (email.match(mailformat))
             {
                $("#email-error").html("");
                $("#email-error").css("display","none");
                return true;
             }else{
                $("#email-error").html("*** Please enter a valid email address ***");
                $("#email-error").css("color","red");
                $("#email-error").css("display","inline");
                $("#email").focus();
                return false;
             }
            
        });


        $("#update").click(function(){
            if(emptyemail() && emptycurrentpass() && emptypassword() && emptyconfirmpass())
            {
                return true;
            }else
            {
                return false;
            }
            
        });

        

        //current password 
        function emptycurrentpass()
        {
            if($("#curr-pws").val() == "")
            {
                $("#curr-pws-error").html("*** Please Fill This Field. ***");
                $("#curr-pws-error").css("color","red");
                $("#curr-pws").focus();
                return false;
            }
            else
            {
                $("#curr-pws-error").html("");
                return true;    
            }
        }

        //Email validation for empty
        function emptyemail()
        {
            var email=$("#email").val();
            if (email == "")
             {
                $("#email-error").html("");
                $("#email-error").css("display","none");
                return true;
             }else{
                $("#email-error").html("*** Please Fill This Field. ***");
                $("#email-error").css("color","red");
                $("#email-error").css("display","inline");
                $("#email").focus();
                return false;
             }
        }

        //confirm password validation for empty
        function emptyconfirmpass()
        {
            if($.trim($("#cpws").val()) == "")
            {
                $("#cpws-error").html(" *** Please fill this field. ***");
                $("#cpws-error").css("color","red");
                $("#cpws").focus();
                return false;
            }
            else{
                $("#cpws-error").html("");
                return true;
            }
        }

        //password validation for empty
        function emptypassword()
        {
            if($.trim($("#pws").val()) == "")
            {
                $("#pws-error").html("*** Please fill this field. ***");
                $("#pws-error").css("color","red");
                $("#pws").focus();
                return false;
            }else{
                $("#pws-error").html("");
                return true;
                
            }
        }
    });
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>