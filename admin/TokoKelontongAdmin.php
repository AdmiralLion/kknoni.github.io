<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
		session_start();
		if($_SESSION['level']==""){
			header("location:../login/login.php?pesan=gagal");
		}
	 
	?>
	<nav class="navbar navbar-inverse padding1">
	<div class="container-fluid ">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			
		</button>
		<img class="gambar" alt="Brand" src="logo1.png">
		<a class="navbar-brand" href="indexAdmin.php">Sidorukun80</a>
		
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="indexAdmin.php">Home</a></li>
			<li><a href="TokoKelontongAdmin.php">Toserba</a></li>
			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="cekAdmin.php">Kelola Admin</a></li>
			<li><a href="cekUser.php">Kelola User</a></li>
			<li><a href="SemuaToko.php">Kelola Toko</a></li>
			<li><a href="../login/logout.php">Log Out</a></li>
			</ul>
		</li>
		</ul>
		</div>
	</div>
	</nav>
	<h1 class="text-center">Toserba</h1>
	
	<table class="table table-hover table-responsive">
		<?php
			require("../koneksi.php");
			$sql = "SELECT * FROM barang";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
			        	echo "<td align='center'> <img style='width: 200px;' class='img-responsive img-rounded' src='../file/".$row['FotoBarang']."'><b>"
			        		.$row['NamaBarang']."</b><br> Rp ".$row['HargaBarang']."<br><a href='https://wa.me/".$row['NoTelpWa']."'>".$row['NoTelpWa']."</a>
			        	</td>";
					echo "</tr>";
			    }
			}
		?>
	</table>
</body>
</html>