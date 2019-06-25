<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
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
$row=mysqli_fetch_row($stmt);

 
switch ($text) {

    case 'designation':


      $speech = $row[0];


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
// Check connection





  $response = new \stdClass();

  $response->speech = $speech;

  $response->displayText = $speech;

  $response->source = "webhook";


  echo json_encode($response);
}


?>
