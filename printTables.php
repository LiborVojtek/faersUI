<?php

function printDrugsList($drugs, $pageLimit){
	echo '<div class="row"><div class="col-md-4 offset-md-1 alert alert-success">Showing ' . $pageLimit . ' drugs from ' . count($drugs) . ' found.</div></div>';
	echo '<table class="table table-striped table-bordered table-hover">
			<tr>
				<thead class="thead-inverse">
					<th>Brand name▲</th>
					<th>Substance name</th>
					<th>Manufacturer name</th>
				</thead>
			</tr>';
	foreach ($drugs as $drug){
		//$brand_name = get_object_vars($drug)['brand_name'];
		echo '<tr><td><a href="sideeffects.php?brandname=' . get_object_vars($drug)['brand_name'] . '">'
		. get_object_vars($drug)['brand_name'] . '</a></td><td>'
		. get_object_vars($drug)['substance_name'] . '</td><td>'
		. get_object_vars($drug)['manufacturer_name'] . '</td></tr>';
	}
	echo '</table>';
}

function printSideEffectsList($sideEffects, $pageLimit){
	
	echo '<div class="row"><div class="col-md-4 offset-md-1 alert alert-success">Showing ' . $pageLimit . ' sideeffects from ' . count($sideEffects) . ' found.</div></div>';
	echo '<table class="table table-striped table-bordered table-hover">
			<tr>
				<thead class="thead-inverse">
					<th>Side effect</th>
					<th>Number of occurrences▼</th>
				</thead>
			</tr>';
	foreach ($sideEffects as $key => $value){
		echo '<tr><td>'	. $key . '</td><td>'
		. $value . '</td></tr>';
	}
	echo '</table>';
}
//Sorting unimplemented yet.
/*
function compareDrugsByNameAsc($a, $b){
	
}

function compareDrugsByNameDesc($a, $b){
	
}

function sortDrugs($drugs, $sortFunction){
	usort($drugs, $sortFunction());
}

function compareSideEffectsByNameAsc($a, $b){
	return strcmp($a, $b);
}

function compareSideEffectsByNameDesc($a, $b){
	
}

function sortSideEffects($sideEffects, $sortFunction){
	uksort($sideEffects, "compareSideEffectsByNameAsc");
}
*/
?>