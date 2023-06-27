<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Daftar</h5>
            <form class="form-signin" action="cekRegister.php" method="POST">
              <div class="form-label-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="Username" type="text" minlength="8" class="form-control" name="Username" placeholder="Username" required autofocus>
                <label for="Username">Username</label>
              </div>
              <div class="form-label-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="Password" type="password" minlength="8" class="form-control" name="Password" placeholder="Password" required>
                <label for="Password">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Daftar">Daftar</button>
              <hr class="my-4">
              <button class="btn btn-outline-success text-uppercase" type="submit" onclick="location.href='login.php'"><i class="glyphicon glyphicon-user"></i> Login</button>
              <button class="btn btn-outline-success text-uppercase" type="submit" onclick="location.href='../index.php'"><i class="glyphicon glyphicon-home"></i> Beranda</button>
            </form>
		  </div>
		  <?php
		error_reporting(0);
		$pesan = $_GET['pesan'];
		if ($pesan == 'gagal') { ?>
			<script>
				alertTimeout("Registrasi Gagal", 3000);
			</script>
    <?php
    	}
    ?>
        </div>
      </div>
    </div>
  </div>
	
</body>
</html>