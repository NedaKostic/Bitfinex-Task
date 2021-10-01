<?php

if (isset($_GET['symbol'])) $url = "https://api.bitfinex.com/v1/pubticker/" . $_GET['symbol'];
else $url = "https://api.bitfinex.com/v1/symbols";
$curl = curl_init();


curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($curl);

$symbolName = json_decode($response);

curl_close($curl);

?>