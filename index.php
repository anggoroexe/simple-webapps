<?php
session_start();
include 'conf.php';
$posts = mysqli_query($cont, "SELECT * FROM post");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<img src="icon/icon.jpg" width="150" height="150"><p>simple blog</p>
    <hr>

    <div style="text-align: center">
	<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
	<a href="admin.php">Admin</a> | 
	<?php endif; ?>
	<a href="index.php">Home</a> | 
	<a href="galeri.php">gallery</a> |
	<a href="gb.php">Guestbook</a>
	</div>
    <form action="search.php" method="get">
		Cari posting:
		<input type="text" name="q">
		<input type="submit" value="Cari">
	</form>

    <?php
	
	while($row = mysqli_fetch_array($posts)) {
	
		echo "<a href='post.php?id={$row['id']}'><h2>{$row['judul']}</h2></a>";
		echo "<small>Tanggal {$row['tanggal']}</small>";
		echo "<hr>";
		
	}
	?>
        
</body>
</html>