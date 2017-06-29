<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 offset-md-5">
			<h1>FAERS</h1>
		</div>
	</div>
	<form action="" method="get">
		<div class="form-group row">
			<label for="drugName" class="control-label col-md-2">Drug:</label>
			<input type="text" name="drugName" class="form-control col-md-5" placeholder="Enter drug brand name or its part">
		</div>
		<div class="form-group row">
			<label for="drugName" class="control-label col-md-2">Active substance:</label>
			<input type="text" name="substanceName" class="form-control col-md-5" placeholder="Enter active substance name or its part">
		</div>
		<div class="form-group row">
			<label for="drugName" class="control-label col-md-2">Manufacturer name:</label>
			<input type="text" name="manufacturerName" class="form-control col-md-5" placeholder="Enter drug manufacturer name or its part">
		</div>
		<div class="form-group row">
			<div class="col-md-2 offset-md-7">
				<button type="submit" name="search" class="btn btn-default">Search</button>
			</div>
		</div>
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
		$search = '0/';
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
		echo '
			<div class="row">
				<div class="col-md-4 offset-md-4 alert alert-danger">No drugs found with entered search parameters.</div>
			</div>';
	} else {
		//if (count($drugs) < $pageLimit){
			$pageLimit = count($drugs);
		printDrugsList($drugs, $pageLimit);
	}
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