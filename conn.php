<?php
$serverName = "182.75.89.80,5180"; 

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

$array=array();
	while($row = sqlsrv_fetch_array($stmt)) {
        $array[]=$row;

    }

} 
echo json_encode($array)
       ?>
