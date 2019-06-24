



<?php 
define('DBSERVER', '182.75.89.80:5180');
define('DBUSER', 'lokesh');
define('DBPASS', 'welcome1#');

define('DBNAME', 'AviatorSMSTesting');

$conn = new mysqli(DBSERVER, DBUSER, DBPASS, DBNAME);

// Create connection


// Check connection
if ($conn->connect_error) {
    die( $conn->connect_error);
} 
echo "Connected successfully";
$sql = "SELECT * from TRANS_INCIDENT_INCIDENT_IDENTIFICATIONS";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo $result;
 }
} else {
 echo "0 results";
}

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);


	$text = $json->result->parameters->designation;



	switch ($text) {
		case 'designation':
			$speech = $result;
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

	
?>
