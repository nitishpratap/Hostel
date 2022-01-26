
<?php
$con=mysqli_connect("localhost","root","","hostel");
if($con)
{
	echo "connection established";
}
else
{
	echo "connection failed";
}
$q="INSERT INTO institute (name) VALUES('University Institute of Engineering & Technology(UIET)'),('Deen Dayal Shodh Sansthan'),('Department of Adult & Continuing Education & Extension'),('Department of English'),('Department of Education'),('Department of Music'),('Institute of Pharmacy'),('Department of Fine Arts and Painting'),('Department of Library & Information Science'),('Department of Master of Social Work (MSW)'),('Department of Physical Education'),('Institute of Bioscience & Biotechnology'),('Institute of Business Management'),('Institute of Journalism & Mass Communication'),('Institute of Life Sciences'),('University Institute of Health Sciences'),('Institute of Hotel and Tourism Management'),('Institute of Legal Studies')";
	
	if (mysqli_query($con,$q)) {
		echo "<br>insertion successful";
	}
	else{
		echo "<br>insertion failed";
	}
	mysqli_close($con);
?>