<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = 'localhost';
$username = 'saivenkatadada';
$password = '@Svenkat1';
$database = 'ExambitX'; 


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
