<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tester";

$cont = mysqli_connect($host, $user, $pass);
mysqli_select_db($cont, $db);
