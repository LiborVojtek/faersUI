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
if (isset($_GET['search'])){
	if (isset($_GET['drugName']) && strlen($_GET['drugName']) > 0)
		$search = strtoupper($_GET['drugName']) . '/';
	else
		$search = $search . '0/';
	if (isset($_GET['substanceName']) && strlen($_GET['substanceName']) > 0)
		$search = $search . strtoupper($_GET['substanceName']) . '/';
	else
		$search = $search . '0/';
	if (isset($_GET['manufacturerName']) && strlen($_GET['manufacturerName']) > 0)
		$search = $search . strtoupper($_GET['manufacturerName']) . '/';
	else
		$search = $search . '0/';
	$drugs = getDrugNames($pathREST, $search);
	if (count($drugs) < 1){
		echo "No drugs found with entered search parameters.";
	} else {
		//if (count($drugs) < $pageLimit){
			$pageLimit = count($drugs);
		printDrugsList($drugs, $pageLimit);
	}
}
?>
</body>
</html>