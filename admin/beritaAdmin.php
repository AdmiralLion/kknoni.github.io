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
    <link rel="stylesheet" href="../style2.css">
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
    <h1 class="text-center">Update Perkembangan Covid-19</h1>
    <?php


$alamatAPI = "https://api.kawalcorona.com/indonesia/provinsi/";


 //ambil data json dari file
 $content=file_get_contents($alamatAPI);

 //mengubah standar encoding
 $content=utf8_encode($content);

 //mengubah data json menjadi data array asosiatif
 $result=json_decode($content,true); 

 error_reporting(0);
 $getProvinsi = $_POST['sellist1'];


 ?>
    <div class="margin">
        <form action="beritaAdmin.php" method="POST">
            <div class="form-group">
              <label for="sel1">Pilih Provinsi :</label>
              <select class="form-control" id="sel1" name="sellist1">

            <?php
             //looping data menggunakan foreach
            foreach ($result as $covid) { ?>
        
                <option><?php echo $covid['attributes']['Provinsi'] ?></option>

        <?php 
            } ?>

            </select>
            </div>
            <div align="center">
                <button type="submit" class="btn btn-primary">Pilih Provinsi</button>
            </div>
        </form>
    </div>
<?php
foreach ($result as $covid) {
    if ($covid['attributes']['Provinsi'] == $getProvinsi) { ?>
    <div class="row margin">
        <div class="col-sm-3 provinsicss">
            <h3> <?php echo "Provinsi : ".$covid['attributes']['Provinsi']."<br>"; ?> </h3>
        </div>
        <div class="col-sm-3 kasPositif">
            <h3> <?php echo "Positif : ".$covid['attributes']['Kasus_Posi']."<br>"; ?> </h3>
        </div>
        <div class="col-sm-3 kasSembuh">
            <h3> <?php echo "Sembuh : ".$covid['attributes']['Kasus_Semb']."<br>"; ?> </h3>
        </div>
        <div class="col-sm-3 kasMeninggal">
            <h3> <?php echo "Meninggal : ".$covid['attributes']['Kasus_Meni']."<br>"; ?> </h3>
        </div>
    </div>
<?php }
}
?>
<?php

$kataKunci = "corona";
$from = date("Y-m-d");
$sortBy = "publishedAt";
$apiKey = "cab25a5ebc074d42af509df196f7a87a"; /* <-- Silakan register di newsapi.org untuk mendapatkan API_KEY */
$language = "id";
$alamatAPI2 = "http://newsapi.org/v2/everything?" .
    "q={$kataKunci}&language={$language}&from={$from}" .
    "&sortBy={$sortBy}&apiKey={$apiKey}";
# ambil data json dari $alamatAPI
$data = file_get_contents($alamatAPI2);
# parsing variabel $data ke dalam array
$dataBerita = json_decode($data);
if ($dataBerita->status === "ok") {
    # tampilkan menggunakan perulangan
    echo "<div class='beritaContainer'>";
    foreach ($dataBerita->articles as $berita) {
        echo "<h3><a href='{$berita->url}'>{$berita->title}</a></h3>";

        if ($berita->urlToImage) {
            echo "<img src='{$berita->urlToImage}'>";
        }

        echo "<p>{$berita->description}</p>";
        echo "<hr>";
    }
    echo "</div>";
}
?>
			</div>
</body>
</html>