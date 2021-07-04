<?php
$DB_HOST = 'localhost'; // host name ng local server na gamit for example xampp / wamp
$DB_USER = 'root'; // username ng local server na gamit for example xampp / wamp
$DB_PASS = ''; // password  ng local server na gamit for example xampp / wamp,  by default wala sya password
$DB_NAME = 'biodata'; // database na makikita at magagawa sa phpmyadmin, "localhost/phpmyadmin"
session_start(); // built in method to para magamit yung mga sessions
ob_start(); // tinatangal neto yung white space para maging available yung header() kasi ang rules nya, kapag meron string including white spaces, mag soshow sya ng Warning: Cannot modify header information - headers already sent


$database = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if ($database->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();
}
	