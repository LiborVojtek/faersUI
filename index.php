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
require "restGetFunctions.php";
require "printTables.php";
$page = 1;
$search = 'filter/';
if (isset($_GET['search'])){
	if (strlen($_GET['drugName']) > 0)
		$search = $search . strtoupper($_GET['drugName']) . '/';
	else
		$search = $search . '0/';
	if (strlen($_GET['substanceName']) > 0)
		$search = $search . strtoupper($_GET['substanceName']) . '/';
	else
		$search = $search . '0/';
	if (strlen($_GET['manufacturerName']) > 0)
		$search = $search . strtoupper($_GET['manufacturerName']) . '/';
	else
		$search = $search . '0/';
	$decoded = getDrugNames($pathREST, $search);
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
		printDrugsList($decoded, $pageLimit);
	}
}
?>
</body>
</html>