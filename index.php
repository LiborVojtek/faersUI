<html>
<head>
</head>
<body>
<form action="" method="get">
<label for="drugName">Enter drug name or its part:</label>
<input type="text" name="drugName"><br>
<label for="drugName">Enter substance name or its part:</label>
<input type="text" name="substanceName"><br>
<label for="drugName">Enter manufacturer name or its part:</label>
<input type="text" name="manufacturerName"><br>
<input type="submit" name="search" value="Search">
</form>
<?php
require "configUI.php";
$pageLimit = 50;
$page = 1;
if (isset($_GET['search'])){
	if (isset($_GET['drugName']) && strlen($_GET['drugName']) > 0)
		$search = 'brandnames/' . strtoupper($_GET['drugName']);
	else if (isset($_GET['substanceName']) && strlen($_GET['substanceName']) > 0)
		$search = 'substancename/' . strtoupper($_GET['substanceName']);
	else if (isset($_GET['manufacturerName']) && strlen($_GET['manufacturerName']) > 0)
		$search = 'manufacturername/' . strtoupper($_GET['manufacturerName']);
	else
		goto end;
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
	$decoded = json_decode($curl_response);
	if (count($decoded) < 1){
		echo "No drugs found with entered search parameters.";
	} else {
		$index = 0;
		foreach ($decoded as $item){
			$drugInstance = get_object_vars($item);
			$drugs[$index] = $drugInstance['brand_name'];
			$index++;
		}
		sort($drugs);
		//if (count($drugs) < $pageLimit){
			$pageLimit = count($drugs);
		echo 'Showing ' . $pageLimit . ' drugs from ' . count($drugs) . ' found.';
		echo '<table>';
		for($i = 0; $i < $pageLimit; $i++){
			echo '<tr><td>' . $drugs[$i] . '</td></tr>';
		}
		echo '</table>';
	}
}
end:
?>
</body>
</html>