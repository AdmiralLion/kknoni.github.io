<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style2.css">
	<script>
		function alertTimeout(mymsg,mymsecs)
		{
		 var myelement = document.createElement("div");
		myelement.setAttribute("style","background-color: grey;color:black; width: 450px;height: 200px;position: absolute;top:0;bottom:0;left:0;right:0;margin:auto;border: 4px solid black;font-family:arial;font-size:25px;font-weight:bold;display: flex; align-items: center; justify-content: center; text-align: center;");
		 myelement.innerHTML = mymsg;
		 setTimeout(function(){
		  myelement.parentNode.removeChild(myelement);
		 },mymsecs);
		 document.body.appendChild(myelement);
		}

		function showPassword(){
			var x = document.getElementById("Password");
			if (x.type === "password") {
				x.type = "text";
			}else {
				x.type = "password";
			}

			var y = document.getElementById("Password1");
			if (y.type === "password") {
				y.type = "text";
			}else {
				y.type = "password";
			}

			var z = document.getElementById("Password2");
			if (z.type === "password") {
				z.type = "text";
			}else {
				z.type = "password";
			}
		}
	</script>
</head>
<body>
<nav class="navbar navbar-inverse padding1">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		
      </button>
	  <img class="gambar" alt="Brand" src="logo1.png">
      <a class="navbar-brand" href="indexUser.php">Sidorukun80</a>
	  
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="indexUser.php">Home</a></li>
        <li><a href="TokoKelontongUser.php">Toserba</a></li>
		<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Akun
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href='#gantiPassword' data-toggle='modal' data-target='#gantiPassword'>Ganti Password</a></li>
          <li><a href="cekToko.php">Cek toko</a></li>
          <li><a href="../login/logout.php">Log Out</a></li>
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
	
	<div class="mycontainer my-4">
	<h1 class="text-center">Halo <a type="button" class="btn btn-info"><span class="glyphicon glyphicon-user"><b> <?php echo $_SESSION['user']; ?></b></span></a></h1></h1>	
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
        <form action="beritaUser.php" method="POST">
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
	<div id='gantiPassword' class='modal fade' role='dialog'>
	    <div class='modal-dialog'>
	    <div class='modal-content'>
	        <div class='modal-header'>
	        	<button type='button' class='close' data-dismiss='modal'>&times;</button>
	        	<h4 class='modal-title'>Ganti Password</h4>
	        </div>
	        <div class='modal-body'>
	        	<p>
	        		<form action='GantiPassword.php' method='POST'>
						<div class='modal-body'>
							<div class='form-group'>
								<label>Password Sekarang :</label>
								<input type='Password' class='form-control' name='PasswordLama' id="Password" required="required">
							</div>
							<div class='form-group'>
								<label>Password Baru :</label>
								<input type='Password' class='form-control' name='PasswordBaru1' minlength="8" id="Password1" required="required">
							</div>
							<div class='form-group'>
								<label>Konfirmasi Password</label>
								<input type='Password' class='form-control' name='PasswordBaru2' minlength="8" id="Password2" required="required">
								<input type="checkbox" onclick="showPassword()"> Show Password
							</div>
						</div>
				</p>
	        </div>
	        <div class='modal-footer'>
				<button type='submit' class='btn btn-primary'>Ganti Password</button>
	        	<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
	        		</form>
	        </div>
	    </div>
		</div>
	</div>
	<?php
		error_reporting(0);
		$pesan = $_GET['pesan'];
		if ($pesan == 'berhasilUpload') { ?>
			<script>
				alertTimeout("Upload Berhasil", 3000);
			</script>
    <?php }
    	if ($pesan == 'gagalUpload') { ?>
			<script>
				alertTimeout("Upload Gagal", 3000);
			</script>
	<?php }
		if ($pesan == 'fileBesar') { ?>
			<script>
				alertTimeout("Ukuran file terlalu besar", 3000);
			</script>
	<?php }
		if ($pesan == 'ekstensiSalah') { ?>
			<script>
				alertTimeout("Ekstensi gambar harus berformat JPG/PNG", 3000);
			</script>
	<?php }
		if ($pesan == 'GantiPassGagal') { ?>
				<script>
					alertTimeout("Ganti password gagal, panjang Password minimal 8 karakter. Pastikan password baru dan konfirmasi password sama", 3000);
				</script>
	<?php }
		if ($pesan == 'GantiPassBerhasil') { ?>
				<script>
					alertTimeout("Ganti Password Berhasil", 3000);
				</script>
	<?php }
	?>
</body>
</html>