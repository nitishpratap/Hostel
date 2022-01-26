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
$q="INSERT INTO `course`( `name`, `institute_id`, `first_year`, `second_year`, `third_year`, `forth_year`) VALUES ('Bachelor Of Computer Application(BCA)','1','1','2','3',''),('Master Of Computer Application(MCA)','1','1','2','3',''),('B.Tech CSE','1','1','2','3','4'),('B.Tech IT','1','1','2','3','4'),('B.Tech Machenical Engineering','1','1','2','3','4'),('B.Tech Chemical Engineering','1','1','2','3','4'),('B.Tech MSME','1','1','2','3','4'),('B.Tech ECE','1','1','2','3','4'),('Bachelor Of Vocation(B.Voc) Fashion Technology','1','1','2','3',''),('Bachelor Of Vocation(B.Voc) Interior Technology','1','1','2','3',''),('Research work','2','1','','',''),('PG Diploma in ACEE(PMDACEE)','3','1','','',''),('Master of Extension and Rural Development(MERD)','3','1','2','',''),('MA English Language and Literature','4','1','2','',''),('B.ED','5','1','2','',''),('M.ED','5','1','2','',''),('M.phil','5','1','2','',''),('Bachelor of music','6','1','2','',''),('Bachelor of Pharmancy','7','1','2','3','4'),('Master of Pharmancy','7','1','2','',''),('Diploma in Pharmancy','7','1','2','',''),('Bachelor of Fine arts(BFA)','8','1','2','3','4'),('Bachdelor of Liabrary and Information science(B.lib.I.Sc)','9','1','','',''),('Master of Liabrary and Information science(M.lib.I.Sc)','9','1','','',''),('Master of Social Works','10','1','2','',''),('Bachelor of Physical Education(B.P.Ed)','11','1','2','3',''),('Master of Physical Education(M.P.Ed)','11','1','2','3',''),('Bsc Biotechnology','12','1','2','3',''),('Msc Biochemistory','12','1','2','',''),('Msc Biotechnology','12','1','2','',''),('Msc Environmental Science','12','1','2','',''),('Msc Food Technology','12','1','2','',''),('Msc Microbiology','12','1','2','',''),('Msc Nutrition Science','12','1','2','',''),('Bachelor of Business Administration(BBA)','13','1','2','3',''),('MBA Full Time','13','1','2','',''),('MBA Part Time','13','1','2','3',''),('MBA Tourism Management','13','1','2','',''),('MBA Finance & Control','13','1','2','',''),('MBA Business Economics','13','1','2','',''),('M.phil(Commars/Business Management)','13','1','2','',''),('P.hd (Business Management)','13','1','2','',''),('Master Of Journalism & Mass Communication','14','1','2','',''),('PG Diploma in Journalism & Mass Communication','14','1','','',''),('Msc Life Science','15','1','2','',''),('Bachelor of Pysiotharapy','16','1','2','3','4'),('Bsc in medical Laboratory Technology','16','1','2','3',''),('Bsc in medical Microbiology','16','1','2','3',''),('Bsc in Human Nutrition','16','1','2','3',''),('Bsc Hospital Administration','16','1','2','3',''),('Bsc in Yoga','16','1','2','3',''),('Masters of Pysiotharapy','16','1','2','',''),('Msc in medical Laboratory Technology','16','1','2','',''),('Bachelor of Hostel Management & Catoring Technology','17','1','2','3','4'),('Dimploma in Food & Beverage Service','17','1','','',''),('Dimploma in Food Production','17','1','','',''),('Master of Laws(LLM)','18','1','2','','')";
if (mysqli_query($con,$q)) {
		echo "<br>insertion successful";
	}
	else{
		echo "<br>insertion failed";
	}
	mysqli_close($con);
?>