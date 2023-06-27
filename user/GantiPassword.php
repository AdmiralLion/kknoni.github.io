<?php
	require "../koneksi.php";
	session_start();

	$PasswordLama = MD5($_POST['PasswordLama']);
	$PasswordBaru1 = $_POST['PasswordBaru1'];
	$PasswordBaru2 = $_POST['PasswordBaru2'];

	if ($PasswordBaru1 != $PasswordBaru2) {
		header('Location:'."indexUser.php?pesan=GantiPassGagal");
	} else {
		$PasswordBaru = MD5($PasswordBaru1);
		$sql = "UPDATE tableuser SET Password='$PasswordBaru' WHERE Password='$PasswordLama' AND Username='".$_SESSION['user']."'";

		if ($conn->query($sql) === TRUE) {
		    header('Location:'."indexUser.php?pesan=GantiPassBerhasil");
		} else {
		    echo "Kesalahan saat menghapus data: " . $sql . "<br>" . $conn->error;
		    header('Location:'."indexUser.php?pesan=GantiPassGagal");
		}
	}
?>