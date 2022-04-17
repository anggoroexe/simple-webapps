<?php
include_once("conf.php");
session_start();
if (!$_SESSION['admin']) {
	header("Location: admin_login.php");
}
$result = mysqli_query($cont, "SELECT * FROM post ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<h1 style="text-align: center">My Blog</h1>
	<hr>
	<div style="text-align: center">
		<a href="admin_logout.php">Logout</a>  |
        <a href="index.php">Home</a> |
		<a href="galeri.php">gallery</a> |
        <a href="gb.php">guestbook</a>
	</div>
	<hr>	
	<a href="add.html">Add New Data</a><br/><br/>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>judul</td>
		<td>konten</td>
		<td>tanggal</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['judul']."</td>";
		echo "<td>".$res['konten']."</td>";
		echo "<td>".$res['tanggal']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>

</html>
