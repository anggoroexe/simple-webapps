<?php
//including the database connection file
include("conf.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($cont, "DELETE FROM post WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>