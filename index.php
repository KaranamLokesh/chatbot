<?php
$requestBody = file_get_contents('php://input');

  $json = json_decode($requestBody);





  $text = $json->queryResult->parameters->designation;
$servername = "";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
$tsql = "SELECT * FROM mocktable";  

$stmt = mysqli_query( $conn,$tsql);
if ($stmt) {

  

     echo "Statement executed.<br>\n";

} 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
switch ($text) {

    case 'designation':


      $speech = "hello";


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
