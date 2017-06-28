<?php

function printDrugsList($drugs, $pageLimit){
	echo 'Showing ' . $pageLimit . ' drugs from ' . count($drugs) . ' found.';
	echo '<table><tr><th>Brand name▲</th><th>Substance name</th><th>Manufacturer name</th></tr>';
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
	echo 'Showing ' . $pageLimit . ' sideeffects from ' . count($sideEffects) . ' found.';
	echo '<table><tr><th>Side effect</th><th>Number of occurrences▼</th></tr>';
	foreach ($sideEffects as $sideEffect){
		//$brand_name = get_object_vars($drug)['brand_name'];
		echo '<tr><td>'	. get_object_vars($sideEffect)['meddra_pt'] . '</td><td>'
		. get_object_vars($sideEffect)['quantity'] . '</td><td></tr>';
	}
	echo '</table>';
}

?>