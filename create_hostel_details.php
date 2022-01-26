<?php 

 $con=mysqli_connect('localhost','root', "", 'hostel');
 if(!$con)
        echo "connection failed";
    echo "<h1>connection established</h1>";

  // hostelname table creation
$q="CREATE TABLE hostelname (h_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,name varchar(100) NOT NULL,type varchar(5) NOT NULL,amount int NOT NULL)";
if (mysqli_query($con,$q)) {
	echo "<h1>Hostelname table created.</h1>";
}

 // block table creation
$q="CREATE TABLE block (b_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,name varchar(100) NOT NULL, h_id varchar(10) NOT NULL)";
if (mysqli_query($con,$q)) {
	echo "<h1>block table created.</h1>";
}

// Room table creation
$q="CREATE TABLE room (room_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,room_name varchar(100) NOT NULL, capecity varchar(10) NOT NULL, b_id varchar(10) NOT NULL)";
if (mysqli_query($con,$q)) {
	echo "<h1>room table created.</h1>";

}




 mysqli_close($con);
?>