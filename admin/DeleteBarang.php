<?php
	require "../koneksi.php";

	$idBarang = $_GET['idBarang'];


	$sql = "DELETE FROM barang WHERE idBarang = '$idBarang'";

	if ($conn->query($sql) === TRUE) {
	    echo 'Data berhasil dihapus';
	} else {
	    echo "Kesalahan saat menghapus data: " . $sql . "<br>" . $conn->error;
	}

	header('Location:'."SemuaToko.php");
?>