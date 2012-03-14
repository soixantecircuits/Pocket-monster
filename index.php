<?php
	$json_data = file_get_contents('data.txt');
	$jsonArray = json_decode($json_data, true);
	foreach ($jsonArray as $value) {
    echo "Valeur : $value<br />\n";
	}
?>