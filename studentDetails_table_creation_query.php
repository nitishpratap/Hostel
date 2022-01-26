
<?php 

 $con=mysqli_connect('localhost','root', "", 'hostel');
 if(!$con)
        echo "connection failed";
    echo "<h1>connection established</h1>";

$q="CREATE TABLE boys_details ( sno INT(16) NOT NULL PRIMARY KEY AUTO_INCREMENT , fname VARCHAR(30) NOT NULL, mname VARCHAR(30) NOT NULL , lname VARCHAR(30) NOT NULL , email VARCHAR(40) NOT NULL , mobile VARCHAR(255) NOT NULL, gender VARCHAR(6) NOT NULL, aadhar VARCHAR(255) NOT NULL, dob VARCHAR(20) NOT NULL , institute_id VARCHAR(4) NOT NULL, c_id VARCHAR(4) NOT NULL  , year VARCHAR(3) NOT NULL , admission_date VARCHAR(20) NOT NULL , father VARCHAR(50) NOT NULL  , designation TEXT NOT NULL  , addoffice TEXT NULL , telephone VARCHAR(10) NULL , residence TEXT NOT NULL , income VARCHAR(15) NOT NULL  , guardian VARCHAR(255) NULL , residence_gua TEXT NULL , telephone_gua VARCHAR(10) NULL, hostler VARCHAR(3) NOT NULL  , old_hostel_name_number VARCHAR(255) NULL  , last_exam VARCHAR(255) NOT NULL  , board VARCHAR(255) NOT NULL  , subject VARCHAR(255) NOT NULL , score VARCHAR(15) NOT NULL , attempts VARCHAR(10) NOT NULL  , medical VARCHAR(255) NULL  , photo VARCHAR(500) NOT NULL , identity VARCHAR(500) NOT NULL , declaration VARCHAR(10) NOT NULL  , status VARCHAR(15) NOT NULL DEFAULT 'pending'  , transaction_id VARCHAR(255) NULL  , hostel_name VARCHAR(255) NULL , block VARCHAR(10) NULL  , room_no VARCHAR(10) NULL)";

 if(mysqli_query($con,$q))
 echo "  <h1> boys_details table created </h1>";
 



//girls_details table creation
 $q="CREATE TABLE girls_details ( sno INT(16) NOT NULL PRIMARY KEY AUTO_INCREMENT , fname VARCHAR(30) NOT NULL, mname VARCHAR(30) NOT NULL , lname VARCHAR(30) NOT NULL , email VARCHAR(40) NOT NULL , mobile VARCHAR(255) NOT NULL, gender VARCHAR(6) NOT NULL, aadhar VARCHAR(255) NOT NULL, dob VARCHAR(20) NOT NULL , institute_id VARCHAR(4) NOT NULL, c_id VARCHAR(4) NOT NULL  , year VARCHAR(3) NOT NULL , admission_date VARCHAR(20) NOT NULL , father VARCHAR(50) NOT NULL  , designation TEXT NOT NULL  , addoffice TEXT NULL , telephone VARCHAR(10) NULL , residence TEXT NOT NULL , income VARCHAR(15) NOT NULL  , guardian VARCHAR(255) NULL , residence_gua TEXT NULL , telephone_gua VARCHAR(10) NULL, hostler VARCHAR(3) NOT NULL  , old_hostel_name_number VARCHAR(255) NULL  , last_exam VARCHAR(255) NOT NULL  , board VARCHAR(255) NOT NULL  , subject VARCHAR(255) NOT NULL , score VARCHAR(15) NOT NULL , attempts VARCHAR(10) NOT NULL  , medical VARCHAR(255) NULL  , photo VARCHAR(500) NOT NULL , identity VARCHAR(500) NOT NULL , declaration VARCHAR(10) NOT NULL  , status VARCHAR(15) NOT NULL DEFAULT 'pending'  , transaction_id VARCHAR(255) NULL  , hostel_name VARCHAR(255) NULL , block VARCHAR(10) NULL  , room_no VARCHAR(10) NULL)";

 if(mysqli_query($con,$q))
 echo "  <h1> girls_details table created </h1>";
 


	mysqli_close($con);
 ?>

