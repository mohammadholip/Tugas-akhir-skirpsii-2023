<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_holip";

$koneksi = mysqli_connect($server, $username, $password, $database) or die(mysql_error());
