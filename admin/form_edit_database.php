<?php
    session_start();
    
    $Sno=$_POST['Sno'];
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
    $Designation=$_POST['Designation'];
    $AddOffice=$_POST['AddOffice'];
    $Telephone=$_POST['Telephone'];
    $Residence=$_POST['Residence'];
    $Income=$_POST['Income'];
    $Guardian=$_POST['Guardian'];
    $ResidenceGU=$_POST['ResidenceGU'];
    $TelephoneGU=$_POST['TelephoneGU'];
    $Hostler=$_POST['Hostler'];
    $TransactionId=$_POST['TransactionId'];

    $LastExam=$_POST['LastExam'];
    $Board=$_POST['Board'];
    $Subject=$_POST['Subject'];
    $Score=$_POST['Score'];
    $Attempts=$_POST['Attempts'];
    $Medical=$_POST['Medical'];
    $Declaration=$_POST['Declaration'];
    $StuLogSno=$_POST['StuLogSno'];

    if(isset($_POST['HostelNameNumber']))
    {
        $OldHostelNameNumber=$_POST['HostelNameNumber'];
    }
   
    if(isset($_POST['Submit']))
    {
    require("../connection.php");
    if(!$con)
        echo "connection failed";
    
    else
        { 
           
            if ($Gender=="male") //boys 
            {
                 $q="UPDATE `boys_details` SET `fname`='$Fname', `mname`='$Mname', `lname`='$Lname',`email`='$Email',`mobile`='$Mobile',`gender`='$Gender', `aadhar`='$Aadhar', `dob`='$DOB', `institute_id`='$Institute', `c_id`='$Course', `year`='$Year', `admission_date`='$AdmissionDate', `father`='$FatherName', `designation`='$Designation', `addoffice`='$AddOffice', `telephone`='$Telephone', `residence`='$Residence', `income`='$Income', `guardian`='$Guardian', `residence_gua`='$ResidenceGU', `telephone_gua`='$TelephoneGU', `hostler`='$Hostler', `last_exam`='$LastExam', `board`='$Board', `subject`='$Subject', `score`='$Score', `attempts`='$Attempts', `medical`='$Medical' ,`transaction_id`='$TransactionId' WHERE sno='$Sno'";

                    $result=mysqli_query($con,$q);

                    if($Hostler=="YES"){
                        $q="UPDATE `boys_details` SET old_hostel_name_number='$OldHostelNameNumber' WHERE sno='$Sno'";
                        mysqli_query($con,$q); 
                    }
               
                     //update login table also
                    $q="UPDATE `student_login` SET first_name='$Fname', `middle_name`='$Mname', `last_name`='$Lname',`email`='$Email',`transactionid`='$TransactionId' WHERE sno='$StuLogSno'";
                    mysqli_query($con,$q); 

                    mysqli_close($con); //close connection
                    if($result)
                    {
                        $_SESSION['success1']="*** Successfully Updated ***";

                         header("location:boys.php");
                        
                    }
                    else
                    {
                        $_SESSION['error_edit']="*** Updation failed! please try again ***";
                         header("location:boys.php");
                    }
                 
            } //end of boys
            else if($Gender =="female") //girls
            {
                 $q="UPDATE `girls_details` SET `fname`='$Fname', `mname`='$Mname', `lname`='$Lname',`email`='$Email', `mobile`='$Mobile',`gender`='$Gender', `aadhar`='$Aadhar', `dob`='$DOB', `institute_id`='$Institute', `c_id`='$Course', `year`='$Year', `admission_date`='$AdmissionDate', `father`='$FatherName', `designation`='$Designation', `addoffice`='$AddOffice', `telephone`='$Telephone', `residence`='$Residence', `income`='$Income', `guardian`='$Guardian', `residence_gua`='$ResidenceGU', `telephone_gua`='$TelephoneGU', `hostler`='$Hostler', `last_exam`='$LastExam', `board`='$Board', `subject`='$Subject', `score`='$Score', `attempts`='$Attempts', `medical`='$Medical',`transaction_id`='$TransactionId' WHERE sno='$Sno'";

                    $result=mysqli_query($con,$q);

                    if($Hostler=="YES"){
                        $q="UPDATE `girls_details` SET old_hostel_name_number='$OldHostelNameNumber' WHERE sno='$Sno'";
                        mysqli_query($con,$q); 
                    }

                    //update login table also
                    $q="UPDATE `student_login` SET first_name='$Fname', `middle_name`='$Mname', `last_name`='$Lname',`gender`='$Gender',`email`='$Email',`transactionid`='$TransactionId' WHERE sno='$StuLogSno'";
                    mysqli_query($con,$q); 

                    mysqli_close($con); //close connection
                    if($result)
                    {
                        $_SESSION['success1']="*** Successfully Updated ***";
                         header("location:girls.php");
                        
                    }
                    else
                    {
                        $_SESSION['error_edit']="*** Updation failed! please try again ***";
                         header("location:girls.php");
                    }
            }//end of girls
           
        }//end of connection
       
    }//end of submit
   
?>
