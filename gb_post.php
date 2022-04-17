<?php

session_start();

include 'conf.php';

$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

$insert = mysqli_query($cont, "INSERT INTO guestbook (id, tanggal, nama, pesan) VALUES(NULL, NOW(), '{$nama}', '{$pesan}')");

if ($insert) {
	echo "Pesan Anda sudah disimpan.";
	header("Location: gb.php");
}


