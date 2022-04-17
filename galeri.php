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
    <p> made with love </p>
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
    <hr> 

    <a href="galeri.php?page=photo1.php">photo 1</a> |
    <a href="galeri.php?page=photo2.php">photo 2</a> |
    <a href="galeri.php?page=photo3.php">photo 3</a>
    
    <hr/>
    
    <?php 
    
    if (isset($_GET['page'])) 
    {   
        include $_GET['page']; 
    } 
    else 
    {
        echo "<p> gallery</p>";
    }
    ?>
        
</body>
</html>