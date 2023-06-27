<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo"	<div class='alert alert-danger alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Login Gagal!</strong> Masukkan Username dan Password yang benar.
					</div>";
		}else if($_GET['pesan'] == "logout"){
			echo"	<div class='alert alert-info alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Logout Berhasil</strong>
					</div>";
		}else if($_GET['pesan'] == "registrasi"){
			echo"	<div class='alert alert-success alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Registrasi Berhasil</strong> Silahkan login.
					</div>";
		}
	}
	?>
	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action="cek.php" method="POST">
              <div class="form-label-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="Username" type="text" class="form-control" name="Username" placeholder="Username" required autofocus>
                <label for="Username">Username</label>
              </div>
              <div class="form-label-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="Password" type="password" class="form-control" name="Password" placeholder="Password" required>
                <label for="Password">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Masuk">Sign in</button>
              <hr class="my-4">
              <button class="btn btn-outline-success text-uppercase" type="submit" onclick="location.href='register.php'"><i class="glyphicon glyphicon-user"></i> Daftar disini</button>
              <button class="btn btn-outline-success text-uppercase" type="submit" onclick="location.href='../index.php'"><i class="glyphicon glyphicon-home"></i> Beranda</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	<!--<form action="cek.php" method="POST">
		<div class="input-group">
		    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input id="Username" type="text" class="form-control" name="Username" placeholder="Username">
		</div>
		<div class="input-group">
		    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="Password" type="password" class="form-control" name="Password" placeholder="Password">
		</div>
		<input type="submit" name="submit" value="Masuk">
		<a href="register.php">Daftar Baru</a>
	</form>
	<a href="../index.php">Beranda</a> -->
</body>
</html>