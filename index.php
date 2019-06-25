<?php
$requestBody = file_get_contents('php://input');

  $json = json_decode($requestBody);





  $text = $json->queryResult->parameters->designation;
$servername = "65bb3802.ngrok.io";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
$tsql = "SELECT * FROM mocktable";  
$result = mysqli_query($conn, $tsql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
      $array = array();
       while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
       }



 
switch ($text) {

    case 'designation':


      $speech = $array;


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
  }
// Check connection





  $response = new \stdClass();

  $response->speech = $speech;

  $response->displayText = $speech;

  $response->source = "webhook";
  

  echo json_encode($response);


?>
