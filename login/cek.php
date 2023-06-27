<?php  
require "../koneksi.php";
$Username = $_POST['Username'];
$Password = MD5($_POST['Password']);

$sql = "SELECT * FROM tableuser WHERE Username='$Username' and Password='$Password'";

$result = $conn->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['user'] = $row['Username'];
        $_SESSION['level'] = $row['Level'];
        $_SESSION['iduser'] = $row['idUser'];

        $lvl = $row['Level'];

        if ($lvl == 'admin') {
            header("Location:../admin/indexAdmin.php");
        }
        if ($lvl == 'user') {
            header("Location:../user/indexUser.php");
        } else {
            echo "gagal";
        }
    }
}
else {
    header("Location:login.php?pesan=gagal");
}

?>
