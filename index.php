<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->quantity;
	
	$requestjson = file_get_contents('http://wildrc.epizy.com/data_json.php');
	$json_data = json_decode($requestjson);
	$jsontext = $json_data->string;
	
	$text = $jsontext;
	
	$speech = "a bike is " . $text;
	$display = "a car is ". $text;
	
	$response = new \stdClass();
	$response->fulfillmentText = "fulfill text" . $text;
	$response->fulfillmentMessages = [array("simpleResponses" => 
					       array( "simpleResponses" => 
						     [array("textToSpeech" => $speech, 
							   "displayText" => $display)
							     ])
					      )];
	$response->source = "webhook-sample";

	echo json_encode($response);
}
else
{
	echo "Method not allowed\n";
	echo file_get_contents("data_json.php");

}

?>
