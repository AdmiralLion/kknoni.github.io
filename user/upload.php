<?php session_start(); ?>
<html>
	<head>
		<title>Upload File</title>
	</head>
	<body>
	<h1>Upload Barang</h1>
		<?php 
		include '../koneksi.php';
		$ekstensi_diperbolehkan	= array('png','jpg');
		$NamaBarang = $_POST['NamaBarang'];
		$HargaBarang = $_POST['HargaBarang'];
		$NoTelp = $_POST['NoTelpWa'];
		$FotoBarang = $_FILES['FotoBarang']['name'];
		$x = explode('.', $FotoBarang);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['FotoBarang']['size'];
		$file_tmp = $_FILES['FotoBarang']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			    if($ukuran < 2000000 and $ukuran != 0){			
					move_uploaded_file($file_tmp, '../file/'.$FotoBarang);
					
					$sql = "INSERT INTO barang (idBarang, NamaBarang, HargaBarang, NoTelpWA, FotoBarang, idUser) VALUES ('', '$NamaBarang', '$HargaBarang', '+62".$NoTelp."', '$FotoBarang','".$_SESSION['iduser']."')";
					$query = $conn->query($sql);
					
					if($query){
						header('Location:'."cekToko.php?pesan=berhasilUpload");
					}else{
						header('Location:'."cekToko.php?pesan=gagallUpload");
					}
			    }else{
					header('Location:'."cekToko.php?pesan=fileBesar");
			    }
		    }else{
				header('Location:'."cekToko.php?pesan=ekstensiSalah");
		    }
		?>
	</body>
</html>