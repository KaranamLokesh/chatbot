<?php
$requestBody = file_get_contents('php://input');

  $json = json_decode($requestBody);





  $text = $json->queryResult->parameters->designation;
$servername = "182.75.89.80";
$username = "lokesh";
$password = "welcome1#";
$database = "AviatorSMSTesting";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
$tsql = "Select * from TRANS_ADP_ADP_FORM";  

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
