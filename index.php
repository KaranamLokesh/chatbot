



<?php 


// Create connection





$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);


	$text = $json->result->parameters->designation;

$serverName = "182.75.89.80,5180"; 
$uid = "lokesh";   
$pwd = "welcome1#";  
$databaseName = "AviatorSMSTesting"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$tsql = "SELECT * FROM TRANS_INCIDENT_INCIDENT_IDENTIFICATIONS";  

/* Execute the query. */  

$stmt = sqlsrv_query( $conn,$tsql);  

if ( $stmt )  
{  
     echo "Statement executed.<br>\n";  

}   
else   
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}


	switch ($text) {
		case 'designation':
			$speech = "got it!";
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
