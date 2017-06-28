<?php

function printDrugsList($drugs, $pageLimit){
	echo 'Showing ' . $pageLimit . ' drugs from ' . count($drugs) . ' found.';
	echo '<table><tr><th>Brand name▲</th><th>Substance name</th><th>Manufacturer name</th></tr>';
	foreach ($drugs as $drug){
		echo '<tr><td>' . get_object_vars($drug)['brand_name'] . '</td><td>'
		. get_object_vars($drug)['substance_name'] . '</td><td>'
		. get_object_vars($drug)['manufacturer_name'] . '</td></tr>';
	}
	echo '</table>';
}

?>