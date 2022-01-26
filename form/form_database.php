<?php
    session_start();
    
    $Fname=$_POST['Fname'];
    $Mname=$_POST['Mname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['Email'];
    $Mobile=$_POST['Mobile'];
    $Gender=$_POST['Gender'];
    $Aadhar=$_POST['Aadhar'];
    $DOB=$_POST['DOB'];
    $Institute=$_POST['Institute'];
    $Course=$_POST['Course'];
    $Year=$_POST['Year'];
    
    $AdmissionDate=$_POST['AdmissionDate'];
    $FatherName=$_POST['FatherName'];
    $MotherName=$_POST['MotherName'];
    $Designation=$_POST['Designation'];
    $AddOffice=$_POST['AddOffice'];
    $Telephone=$_POST['Telephone'];
    $Residence=$_POST['Residence'];
    $Income=$_POST['Income'];
    $Guardian=$_POST['Guardian'];
    $ResidenceGU=$_POST['ResidenceGU'];
    $TelephoneGU=$_POST['TelephoneGU'];
    $Hostler=$_POST['Hostler'];
    $OldHostelNameNumber=$_POST['HostelNameNumber'];
    $LastExam=$_POST['LastExam'];
    $Board=$_POST['Board'];
    $Subject=$_POST['Subject'];
    $Score=$_POST['Score'];
    $Attempts=$_POST['Attempts'];
    $Medical=$_POST['Medical'];
    $Declaration=$_POST['Declaration'];
    $TransactionId=$_POST['TransactionId'];
  
   
    if(isset($_POST['Submit']))
    {
    require("../connection.php");
    if(!$con)
        echo "connection failed";
    
    else
        { 
           
            if ($Gender=="male") //boys 
            {
                $query="select * from boys_details where email='$Email'";
                $row=mysqli_query($con,$query);

               

                $num_row=mysqli_num_rows($row);
                if ($num_row==1) 
                {
                    echo "<h1 style='color:red;'>This Email is already exist, please re_try with another Emaill</h1>";
                }
                else
                {   
                    $Photoname=$_FILES['Photo']['name'];
                    $TempPhotoName=$_FILES['Photo']['tmp_name'];
                    $folder="boys photo/".$Photoname;
                    move_uploaded_file($TempPhotoName, $folder); //move image to folder
        
                    //set path to store photo to folder and database
                   $Identityname=$_FILES["Identity"]['name'];
                   $TempIdentityName=$_FILES["Identity"]['tmp_name']; //temporary name
                   $idfolder="boys identity/".$Identityname;
                   move_uploaded_file($TempIdentityName, $idfolder); //move image to folder

                      //set path to store photo to folder and database
                   $signaturename=$_FILES["signature"]['name'];
                   $TempsignatureName=$_FILES["signature"]['tmp_name']; //temporary name
                   $iddfolder="gaurdian sign/".$signaturename;
                   move_uploaded_file($TempsignatureName, $iddfolder); //move signature image to folder
                    
                 $q="INSERT INTO `boys_details`(`fname`, `mname`, `lname`, `email`, `mobile`, `gender`, `aadhar`, `dob`, `institute_id`, `c_id`, `year`, `admission_date`, `father`,`mother` ,`designation`, `addoffice`, `telephone`, `residence`, `income`, `guardian`, `residence_gua`, `telephone_gua`, `hostler`, `last_exam`, `board`, `subject`, `score`, `attempts`, `medical`, `photo`, `identity`,`signature`, `declaration`,`transaction_id`) VALUES ('$Fname', '$Mname', '$Lname', '$Email', '$Mobile', '$Gender', '$Aadhar', '$DOB',  '$Institute', '$Course', '$Year', '$AdmissionDate', '$FatherName','$MotherName', '$Designation','$AddOffice', '$Telephone', '$Residence', '$Income','$Guardian','$ResidenceGU','$TelephoneGU', '$Hostler','$LastExam', '$Board', '$Subject', '$Score', '$Attempts', '$Medical', '$folder', '$idfolder','$iddfolder', '$Declaration', '$TransactionId')";

                    $result=mysqli_query($con,$q);

                    if($Hostler=="YES"){
                        $q="UPDATE `boys_details` SET old_hostel_name_number='$OldHostelNameNumber' WHERE email='$Email'";
                        mysqli_query($con,$q); 
                    }
               

                    mysqli_close($con); //close connection
                    if($result)
                    {
                         header("location:../Student login/student_home.php?email=". urlencode($Email)."&&gender=". urlencode($Gender));
                        
                    }
                    else
                    {
                        echo "<br>failed";
                    }
                   
                } 
                 
            } //end of boys
           
            else if($Gender =="female") //girls
            {
                $query="SELECT * from girls_details where email='$Email'";
                $row=mysqli_query($con,$query);

               

                $num_row=mysqli_num_rows($row);
                if ($num_row==1) 
                {
                    echo "<h1 style='color:red;'>This Email is already exist, please re_try with another Email</h1>";
                }
                else
                {   
                    $Photoname=$_FILES['Photo']['name'];
                    $TempPhotoName=$_FILES['Photo']['tmp_name'];
                    $folder="girls photo/".$Photoname;
                    move_uploaded_file($TempPhotoName, $folder); //move image to folder
        
                    //set path to store photo to folder and database
                   $Identityname=$_FILES["Identity"]['name'];
                   $TempIdentityName=$_FILES["Identity"]['tmp_name']; //temporary name
                   $idfolder="girls identity/".$Identityname;
                   move_uploaded_file($TempIdentityName, $idfolder); //move image to folder
        
                    
                 $q="INSERT INTO `girls_details`(`fname`, `mname`, `lname`, `email`, `mobile`, `gender`, `aadhar`, `dob`, `institute_id`, `c_id`, `year`, `admission_date`, `father`, `designation`, `addoffice`, `telephone`, `residence`, `income`, `guardian`, `residence_gua`, `telephone_gua`, `hostler`, `last_exam`, `board`, `subject`, `score`, `attempts`, `medical`, `photo`, `identity`, `declaration`, `transaction_id`) VALUES ('$Fname', '$Mname', '$Lname', '$Email', '$Mobile', '$Gender', '$Aadhar', '$DOB',  '$Institute', '$Course', '$Year', '$AdmissionDate', '$FatherName', '$Designation','$AddOffice', '$Telephone', '$Residence', '$Income','$Guardian','$ResidenceGU','$TelephoneGU', '$Hostler', '$LastExam', '$Board', '$Subject', '$Score', '$Attempts', '$Medical', '$folder', '$idfolder', '$Declaration', '$TransactionId')";


                    $result=mysqli_query($con,$q);

                     if($Hostler=="YES"){
                        $q="UPDATE `girls_details` SET old_hostel_name_number='$OldHostelNameNumber' WHERE email='$Email'";
                        mysqli_query($con,$q); 
                    }
                    mysqli_close($con); //close connection

                    if($result)
                    {

                         header("location:../Student login/student_home.php?email=". urlencode($Email)."&&gender=". urlencode($Gender));
                        
                    }
                    else
                    {
                        echo "<br>failed";
                    }
                   
                } 
            	
            }//end of girls
           
        }//end of connection
       
    }//end of submit
   
?>
