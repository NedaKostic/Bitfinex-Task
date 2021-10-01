<?php
require_once("connection.php");

$json['redirect'] = "";


if(isset($_GET['login'])) {
    setcookie("x", "x", time()+2147483647, "/"); 
    $json['redirect'] = "index.php";

    echo JSON_encode($json, 256);
}



function login(){
    if(isset($_COOKIE['x'])) return true;
    else return false;
}


?>