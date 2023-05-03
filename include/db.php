<?php
// Create Connection
$servername = "localhost";
$database = "pempek";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}
?>