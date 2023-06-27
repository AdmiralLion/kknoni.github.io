<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cek Toko</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
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
	</script>
</head>
<body>
	<?php 
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
	<h2 class="text-center">Semua Toko User</h2>
	<table class="table table-hover table-responsive">
		<tr class="info">
			<th>Pemilik Toko</th>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
			<th>No Telepon / WA</th>
			<th>Foto Barang</th>
			<th>Opsi</th>
		</tr>
		<?php
			require("../koneksi.php");
			$sql = "SELECT barang.*, tableuser.Username FROM barang INNER JOIN tableuser ON barang.idUser = tableuser.idUser";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
			        	echo "<td>".$row['Username']."</td>";
						echo "<td>".$row['NamaBarang']."</td>";
						echo "<td>Rp ".$row['HargaBarang']."</td>";
						echo "<td>".$row['NoTelpWa']."</td>";
						echo "<td> <img style='width: auto; height: auto; object-fit: contain; max-width: 150px;' class='img-responsive img-rounded' src='../file/".$row['FotoBarang']."'></td>";
						echo "<td> 
								<a href='DeleteBarang.php?idBarang=$row[idBarang]'><button type='button' class='btn btn-danger'>Delete</button></a>
								<a href='#myModal".$row['idBarang']."' data-toggle='modal' data-target='#myModal".$row['idBarang']."' class='btn btn-info'>Update</a>
							</td>";
					echo "</tr>";
			    }
			}
		?>
	</table>

	<!-- Modal Update Barang -->
	<?php
		$sql = "SELECT * FROM barang";

		$result = $conn->query($sql);
		$count = 1;
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
				echo "<div id='myModal".$row['idBarang']."' class='modal fade' role='dialog'>";
				    echo "<div class='modal-dialog'>";
				    echo "<div class='modal-content'>";
				        echo "<div class='modal-header'>";
				        	echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
				        	echo "<h4 class='modal-title'>Edit Data Barang</h4>";
				        echo "</div>";
				        echo "<div class='modal-body'>";
				        	echo "<p>";
				        		echo "<form action='UpdateBarang.php' method='POST' enctype='multipart/form-data'>";
									echo "<div class='modal-body'>";
										echo "<div class='form-group'>";
											echo "<input type='hidden' class='form-control' name='idBarang' value='".$row['idBarang']."'>";
										echo "</div>";
										echo "<div class='form-group'>";
											echo "<label>Nama Barang</label>";
											echo "<input type='text' class='form-control' name='NamaBarang' value='".$row['NamaBarang']."'>";
										echo "</div>";
										echo "<div class='form-group'>";
											echo "<label>Harga Barang</label>";
											echo "<input type='text' class='form-control' name='HargaBarang' value='".$row['HargaBarang']."'>";
										echo "</div>";
										echo "<div class='form-group'>";
											echo "<label>No Telepon / WA</label>";
											echo "<input type='text' class='form-control' name='NoTelpWa' value='".$row['NoTelpWa']."'>";
										echo "</div>";
										echo "<div class='form-group'>";
											echo "<label>Foto Barang</label>";
											echo "<input type='file' name='FotoBarang'>";
											echo "<p style='color: red'>*File JPG/PNG dengan Ukuran Maksimal 2MB</p>";
										echo "</div>";
									echo "</div>";
							echo "</p>";
				        echo "</div>";
				        echo "<div class='modal-footer'>";
							echo "<button type='submit' class='btn btn-primary'>Edit</button>";
				        	echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
				        		echo "</form>";
				        echo "</div>";
				    echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		}
	?>
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
	?>
</body>
</html>