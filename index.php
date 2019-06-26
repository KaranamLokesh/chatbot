


<?php

include('portal2.prospectatech.com/check.php');
$variable = $array;
	
	$requestBody = file_get_contents('php://input');

	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->text;

/* Execute the query. */  

switch ($text) {

		case 'designation':

			$speech = $variable;
			

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

	$response->fulfillmentText = $speech;

	$response->displayText = $speech;

	$response->source = "webhook";

	echo json_encode($response);






?>
