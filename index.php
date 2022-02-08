<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Pendaftaran Pelawat / Bilik Server</title>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<style type="text/css">
@import url("css/floatStyle.css");
</style>	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</head>
<body>

<div class="header">
  <h2><img src="img/title.png" alt="Logo"></h2>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="active">
        <a class="nav-link" href="index.php">Halaman Utama <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pendaftaran Pelawat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="daftar-pelawat-masuk.php">Masuk</a>
          <a class="dropdown-item" href="daftar-pelawat-keluar.php">Keluar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Borang Kemasukan Bilik Server
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="borang-kemasukan-bilik-server-masuk.php">Masuk</a>
          <a class="dropdown-item" href="borang-kemasukan-bilik-server-keluar.php">Keluar</a>
        </div>
      </li>		
    </ul>
  </div>
</nav>	
	
<div class="container">	
<div class="row">
  <div class="column side" style="padding-left: 6px">
	  Selamat datang ke Sistem Pendaftaran Pelawat / Bilik Server Bahagian Teknologi Maklumat MPKj. Anda diminta untuk mengisi ruang form terlebih dahulu sebelum melakukan lawatan di Bahagian Teknologi Maklumat.<br><br>
  </div>
  <div class="column middle text-center" >
	<img src="img/logo.png" width="171" height="290">
  </div>
</div>
	
<div class="footer">
	<!-- <img src="img/logo.png" width="30" height="55"> -->
	<p style=" font-size: 11px;">MAJLIS PERBANDARAN KAJANG<br>
		<a href="http://www.mpkj.gov.my/">www.mpkj.gov.my</a>
    </p>
</div>
</div>

	
</body>
</html>