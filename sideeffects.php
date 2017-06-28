<html>
<head>
</head>
<body>

<?php
	require "configUI.php";
	require "restGetFunctions.php";
	require "printTables.php";
	
	$brandName = $_GET['brandname'];
	
	echo '
	<form action="" method="get">
	<label for="date">Enter date from which to show reported side effects (YYYYMMDD):</label>
	<input type="text" name="date"><br>
	<input type="hidden" name="brandname" value="' . $brandName . '">
	<input type="submit" name="filter" value="Filter">
	</form>
	';
	$date = 0;
	if (isset($_GET['date']) && strlen($_GET['date']) > 0){
		$date = $_GET['date'];
	}
	$sideEffects = getDrugSideEffects($pathREST, $brandName, $date);
	if (count($sideEffects) < 1){
		echo 'No side effects were found for this drug.';
	} else {
		$pageLimit = count($sideEffects);
		printSideEffectsList($sideEffects, $pageLimit);
	}

?>