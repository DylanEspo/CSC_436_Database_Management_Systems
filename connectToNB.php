<!DOCTYPE html>
<html lang="en">

<head>
	
</head>

<body>

<?php

	//Get cURL resource
	$curl = curl_init();
	// Set options
	//$dataURL = 'https://developer.nps.gov/api/v1/campgrounds?limit=100&fields=accessibility&api_key=vjwEN5z7i5jhhT1ZVXAZI8OpgwKu4Huiam01BWiw';
	$dataURL = 'https://developer.nps.gov/api/v1/parks?limit=500&q=National%20Historical%20Reserve&fields=images&api_key=vjwEN5z7i5jhhT1ZVXAZI8OpgwKu4Huiam01BWiw';
	

	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL => $dataURL,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT']
		//CURLOPT_HTTPHEADER => array('vjwEN5z7i5jhhT1ZVXAZI8OpgwKu4Huiam01BWiw')
	));
	
	// Send the request & save response to $response
	$response = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	$json = json_decode($response);
	
	//echo $json->total , "<br/>";
	// Prepare and execute address output
	for ($i = 0; $i < count($json->data); $i++) {
		//$json->data[$i]->fullName, " ",
		$parsedVal = $json->data[$i]->designation;
		if($parsedVal == 'National Historical Reserve'){
			echo $json->data[$i]->images[0]->url, "<br/>";
			echo $json->data[$i]->fullName, " ", $json->data[$i]->images[0]->url, "<br/>";	
		}	
		
	}
		
	
	

	/*
		if(strpos($currTitle, 'National Park') !== false){
			//echo $i+1, "<br/>";
			echo $json->data[$i]->fullName , "<br/>";
		}
		/*
		$parsedVal = $json->data[$i]->images->url;
		if(empty($parsedVal)){
			echo "No Image", "<br/>";
		}
		else{
			echo $parsedVal, "<br/>";
		}
		//echo $i + 1, "<br/>";
		*/
	
	
	

?>

	
</body>
</html>