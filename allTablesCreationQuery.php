<?php
require("connection.php");
if (!$con)
echo "<h1>connection failed</h1>"; 
	echo "<h1>connection established</h1>";

// institute table creation
$q="CREATE TABLE institute (institute_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,name varchar(100) NOT NULL)";
if (mysqli_query($con,$q)) {
	echo "<h1>Institute table created.</h1>";
}



// course table creation
$q="CREATE TABLE course (c_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,name varchar(100) NOT NULL, institute_id VARCHAR(10) NOT NULL,first_year varchar(3) NULL,second_year varchar(3) NULL,third_year varchar(3) NULL,forth_year varchar(3) NULL)";
if (mysqli_query($con,$q)) {
	echo "<h1>course table created.</h1>";
}



 // student_login table creation
 $q="CREATE TABLE student_login (sno int(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,first_name varchar(50) NOT NULL, middle_name varchar(50) NOT NULL, last_name varchar(50) NOT NULL, email varchar(70) NOT NULL UNIQUE,gender varchar(6) NOT NULL,transactionid varchar(255) NOT NULL,password varchar(255) NOT NULL)";
 if(mysqli_query($con,$q))
 	//echo "<h1>student_login table created</h1>";
echo $q;
// Admin_login table creation
 $q="CREATE TABLE admin_login (sno int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(70) NOT NULL,password varchar(255) NOT NULL)";
if(mysqli_query($con,$q))
 	echo "<h1>admin_login table created</h1>";

 	mysqli_close($con);
?>