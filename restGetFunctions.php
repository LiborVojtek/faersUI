<?php

function getDrugNames($pathREST, $search){
	$service_url = $pathREST . $search;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	return json_decode($curl_response);
}

function compareDrugsByName($a, $b){
	
}

function sortDrugsInstances($drugs){
	
}

?>