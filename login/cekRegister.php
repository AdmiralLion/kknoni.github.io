<?php
require "../koneksi.php";
$username = $_POST['Username'];
$password = $_POST['Password'];

$lenUsername = strlen($username);
$lenPassword = strlen($password);

if ($lenUsername < 8 || $lenPassword < 8){
	header("Location:register.php?pesan=gagal");
} else {
	$sql = "INSERT INTO tableuser (idUser, Username, Password, Level) VALUES ('', '$username', MD5('$password'), 'user')";

	if ($conn->query($sql) === TRUE) {
	    header("Location:login.php?pesan=registrasi");
	} else {
	    echo "Kesalahan saat input data: " . $conn->error;
	    header("Location:register.php?pesan=gagal");
	}
}


?>