



<?php 


// Create connection





$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);


	$text = $json->queryResult->parameters->designation;


$servername = "ancient-earwig-11.localtunnel.me";
$username = "root";
$password = "";
$database="test";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
	$sql = "SELECT * FROM test";
$result = $conn->query($sql);
	$conn->close();




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
