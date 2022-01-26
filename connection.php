
<?php
$host="localhost";
$username="root";
$pass="";
$db="hostel";
$con=mysqli_connect($host,$username,$pass,$db) or die("ERROR IN CONNECTION");
            //$hostname="localhost";
			//$username="techmart";
			//$username="";
			//$password="";
			//$password="abcd@1234";
			//$dbname="techmart";
			//$conn=mysqli_connect($hostname,$username,$password,$dbname);
			//if(!$conn)
			//{
			//	die("Connection failed: ".mysqli_connect_error());
			//}
			
			//$conn=mysqli_connect("localhost","webdev","abcd@123");
if(!$con)
{
echo "connection failed";
}
else
{
mysqli_select_db($con,"hostel");
}
?>