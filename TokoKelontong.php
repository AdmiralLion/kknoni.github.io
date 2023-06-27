<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style2.css">
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

	<h1 class="text-center">Toserba</h1>
	
	<table class="table table-hover">
		<?php
			require("koneksi.php");
			$sql = "SELECT * FROM barang";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
			        	echo "<td align='center'> <img style='width: 200px;' class='img-responsive img-rounded' src='file/".$row['FotoBarang']."'><br> <b>"
			        		.$row['NamaBarang']."</b><br> Rp ".$row['HargaBarang']."<br><a href='https://wa.me/".$row['NoTelpWa']."'>".$row['NoTelpWa']."</a>
			        	</td>";
					echo "</tr>";
			    }
			}
		?>
	</table>
	
</body>
</html>