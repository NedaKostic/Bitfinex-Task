<?php
require_once("connection.php");

$json['fail'] = "";
$json['redirect'] = "";


//add to favorites
if (isset($_GET['add'])) {
	$symbol = $_POST['symbol'];
	$symbolLower = strtolower($symbol);

	$insert = $connect->prepare("INSERT INTO favorites(favorites_symbol_name) VALUES('$symbol')");
	$insert->bindParam(':favorites_symbol_name', $symbol);
	if ($insert->execute()) $json['redirect'] = "details.php?symbol=$symbolLower";
	else $json['fail'] = "Currency can not be added to favorites!";
}

//remove from favorites
if (isset($_GET['remove'])) {
	$symbol = $_POST['symbol'];
	$symbolLower = strtolower($symbol);

	$delete = $connect->prepare("DELETE FROM favorites WHERE favorites_symbol_name = '{$symbol}'");
	$delete->bindParam(':favorites_symbol_name', $symbol);
	if ($delete->execute()) 	$json['redirect'] = "details.php?symbol=$symbolLower";
	else $json['fail'] = "Currency can not be removed from favorites!";
}


echo JSON_encode($json, 256);

?>