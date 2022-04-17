<?php
// including the database connection file
include_once("conf.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($cont, $_POST['id']);
	
	$judul = mysqli_real_escape_string($cont, $_POST['judul']);
	$konten = mysqli_real_escape_string($cont, $_POST['konten']);
	$tanggal = mysqli_real_escape_string($cont, $_POST['tanggal']);	
	
	// checking empty fields
	if(empty($judul) || empty($konten) || empty($tanggal)) {	
			
		if(empty($judul)) {
			echo "<font color='red'>judul kosong.</font><br/>";
		}
		
		if(empty($konten)) {
			echo "<font color='red'>isi konten kosong.</font><br/>";
		}
		
		if(empty($tanggal)) {
			echo "<font color='red'>tanggal belom di isi.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($cont, "UPDATE post SET judul='$judul',konten='$konten',tanggal='$tanggal' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: admin.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($cont, "SELECT * FROM post WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$judul = $res['judul'];
	$konten = $res['konten'];
	$tanggal = $res['tanggal'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="judul" value="<?php echo $judul; ?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><textarea name="konten" cols="35" wrap="soft" value="<?php echo $konten; ?>"></textarea></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="date" name="tanggal" value="<?php echo $tanggal; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
