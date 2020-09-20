<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "insurers_register";

$conn_insurer = mysqli_connect($servername, $db_username, $db_password, $db_name);

if(!$conn_insurer) {
    die("Connection failed: ".mysqli_connect_error());
}