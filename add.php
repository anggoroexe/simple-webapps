<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("conf.php");

if(isset($_POST['Submit'])) {	
	$judul = mysqli_real_escape_string($cont, $_POST['judul']);
	$konten = mysqli_real_escape_string($cont, $_POST['konten']);
	$tanggal = mysqli_real_escape_string($cont, $_POST['tanggal']);
		
	// checking empty fields
	if(empty($judul) || empty($konten) || empty($tanggal)) {
				
		if(empty($judul)) {
			echo "<font color='red'>judul masih kosong.</font><br/>";
		}
		
		if(empty($konten)) {
			echo "<font color='red'>konten belum di isi</font><br/>";
		}
		
		if(empty($tanggal)) {
			echo "<font color='red'>tanggal belum di input</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($cont, "INSERT INTO post(judul,konten,tanggal) VALUES('$judul','$konten','$tanggal')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
