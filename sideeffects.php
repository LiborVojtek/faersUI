<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
<?php
	require "configUI.php";
	require "restGetFunctions.php";
	require "printTables.php";
	
	$brandName = $_GET['brandname'];
	
	echo '
	<div class="row">
		<div class="col-md-2 offset-md-5">
			<h1>' . $brandName . '</h1>
		</div>
	</div>
	<form action="" method="get">
		<input type="hidden" name="brandname" value="' . $brandName . '">
		<div class="form-group row">
			<label for="date" class="control-label col-md-4">Show only side effects reported later than date:</label>
			<input type="text" name="date" class="form-control col-md-2" placeholder="YYYYMMDD">
			<button type="submit" name="filter" class="btn btn-default col-md-2">Filter</button>
		</div>
	</form>
	';
	$date = 0;
	if (isset($_GET['date']) && strlen($_GET['date']) > 0){
		$date = $_GET['date'];
	}
	$sideEffects = array();
	foreach(getDrugSideEffects($pathREST, $brandName, $date) as $effect){
		$sideEffects[$effect->meddra_pt] = $effect->quantity;
	}
	//$sideEffects = getDrugSideEffects($pathREST, $brandName, $date);
	if (count($sideEffects) < 1){
		echo '
			<div class="row">
				<div class="col-md-4 offset-md-4 alert alert-danger">No side effects were found for this drug.</div>
			</div>';
	} else {
		$pageLimit = count($sideEffects);
		printSideEffectsList($sideEffects, $pageLimit);
	}

?>
	<div class="row">
		<div class="offset-md-4 col-md-4">
			© 2017, Gabriel Mohňanský, Patrik Rojek, Libor Vojtek
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>