<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
 
	// cek apakah yang mengakses halaman ini sudah login
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
	
	<div class="mycontainer my-4">
	<h1 class="text-center">Halo <a type="button" class="btn btn-info"><span class="glyphicon glyphicon-user"><b> <?php echo $_SESSION['user']; ?></b></span></a>	 Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
			<h1 class="text-center">Selamat Datang di Website Sidorukun80</h1>
			<p class="text-center"><a href="beritaAdmin.php" class="btn btn-info text-center">Info Terbaru mengenai Covid-19</a></p>
			<br>
			</div>
</body>
</html>