


<?php

	include('https://chatterbot12.herokuapp.com?result=$result');

	$requestBody = file_get_contents('php://input');

	$json = json_decode($requestBody);





	$text = $json->queryResult->parameters->designation;





/* Execute the query. */  







switch ($text) {

		case 'designation':

			$speech = result;
			

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






?>
