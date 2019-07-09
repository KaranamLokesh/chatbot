
<?php

// From URL to get webpage contents. 
$url = "portal2.prospectatech.com/mobnum.php?name=diwakar"; 
  
// Initialize a CURL session. 
$ch = curl_init();  
  
// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $url); 
  
$result = curl_exec($ch);
$variable = $result;
	
	$requestBody = file_get_contents('php://input');

	$json = json_decode($requestBody);
  //$period = "-period";
  $perd = 'date-period';
  $perdtime = 'date-time';
  $name='given-name';
  $text = $json->queryResult->parameters->text;
  $queryText=$json->queryResult->queryText;
  $endDate=$json->queryResult->parameters->$perd->endDate;
  $startDate=$json->queryResult->parameters->$perd->startDate;
  $endDatetime=$json->queryResult->parameters->$perdtime->endDate;
  $startDatetime=$json->queryResult->parameters->$perdtime->startDate;
  $date = $json->queryResult->parameters->$perdtime;
  $outputaudio=$json->outputAudio;
  $givenname=$json->queryResult->parameters->$name;

/* Execute the query. */  

switch ($date) {

		case 'diwakar':

			$speech = $variable;
		
			break;

		case 'bye':

			$speech = <speak>
  my SSML content
</speak>;

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
