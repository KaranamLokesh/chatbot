


<?php
include_once('conn.php');
	$servername = "localhost";
$username = "Prospecta";
$password = "";
$dbname = "nightDuty";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die( $conn->connect_error);
} 
echo "Connected successfully";
$sql = "SELECT * from Timesheet";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo $result;
 }
} else {
 echo "0 results";
}
?>
