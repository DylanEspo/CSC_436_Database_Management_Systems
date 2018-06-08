<?php

$servername = "localhost";
$username = "desposit_dylan";
$password = "dylan0210";
$dbname = "desposit_national_parks";


$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>