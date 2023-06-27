<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="index.php">Sidorukun80</a>
		<img class="gambar" alt="Brand" src="logo2.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="TokoKelontong.php">Toserba</a>
				</li>
				<li class="nav-item">
					<button class="btn btn-outline-success text-uppercase" type="submit" onclick="location.href='login/login.php'"><i class="glyphicon glyphicon-user"></i> Login</button>
				</li>
		</div>
		
</nav>	

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
        <form action="berita.php" method="POST">
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
	
</body>
</html>

