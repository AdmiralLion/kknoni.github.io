<?php
	require "../koneksi.php";

	$idUser = $_GET['idUser'];

	$sql = "DELETE FROM tableuser WHERE idUser = '$idUser'";

	if ($conn->query($sql) === TRUE) {
	    echo 'Data berhasil dihapus';
	} else {
	    echo "Kesalahan saat menghapus data: " . $sql . "<br>" . $conn->error;
	}

	header('Location:'."cekUser.php");
?>