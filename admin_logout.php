<?php

session_start();
session_destroy();

echo "Anda sudah logout";
header("Location: admin_login.php");
