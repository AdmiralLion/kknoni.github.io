<?php
	require("../koneksi.php");

	$idBarang = $_POST['idBarang'];
	$NamaBarang = $_POST['NamaBarang'];
	$HargaBarang = $_POST['HargaBarang'];
	$NoTelpWa = $_POST['NoTelpWa'];

	$FotoBarang = $_FILES['FotoBarang']['name'];
	$ekstensi_diperbolehkan	= array('png','jpg');
	$x = explode('.', $FotoBarang);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['FotoBarang']['size'];
	$file_tmp = $_FILES['FotoBarang']['tmp_name'];

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 2000000 and $ukuran != 0){			
			move_uploaded_file($file_tmp, 'file/'.$FotoBarang);
				
			$sql = "UPDATE barang SET NamaBarang='$NamaBarang', HargaBarang='$HargaBarang', NoTelpWa='$NoTelpWa', FotoBarang='$FotoBarang'  WHERE idBarang='$idBarang'";

			$query = $conn->query($sql);
				
			if($query){
				header('Location:'."SemuaToko.php?pesan=berhasilUpload");
			}else{
				header('Location:'."SemuaToko.php?pesan=gagallUpload");
			}
	    }else{
				header('Location:'."SemuaToko.php?pesan=fileBesar");
		}
    }else{
		header('Location:'."SemuaToko.php?pesan=ekstensiSalah");
    }
	
?>