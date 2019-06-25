


<?php



	$requestBody = file_get_contents('file.txt');

	$json = json_decode($requestBody);





	$text = $json->queryResult->parameters->designation;


$serverName = "182.75.89.80,5180\\sqlexpress"; 

$uid = "lokesh";   

$pwd = "welcome1#";  

$databaseName = "AviatorSMSTesting"; 



$connectionInfo = array( "UID"=>$uid,                            

                         "PWD"=>$pwd,                            

                         "Database"=>$databaseName); 



/* Connect using SQL Server Authentication. */  

$conn = sqlsrv_connect( $serverName, $connectionInfo);





$tsql = "SELECT smallint_205_ME FROM TRANS_INCIDENT_INCIDENT_IDENTIFICATIONS";  



/* Execute the query. */  



$stmt = sqlsrv_query( $conn,$tsql); 
if ($stmt) {

 
	while($row = sqlsrv_fetch_array($stmt)) {
        echo $row["smallint_205_ME"];

    }


     echo "Statement executed.<br>\n";
     



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






?>
