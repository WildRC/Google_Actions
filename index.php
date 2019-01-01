<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->quantity;
	
	$response = new \stdClass();
	$response->fulfillmentText = "  ";
	$response->fulfillmentMessages = [
		simpleResponses->simpleResponses = [
		    textToSpeech: "example sentence",
		    displayText: "example sentence"
		]
	];
	$response->source = "";

	return json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
