<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "multivendor";

$con = mysqli_connect($server, $username, $pass, $db);

if (!$con) {
    echo "database is not connected";
}
