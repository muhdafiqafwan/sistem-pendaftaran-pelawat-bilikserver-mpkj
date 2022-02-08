<?php
include ('config.php');
$sql = mysqli_query($conn, "SELECT * FROM borang,pelawat");
if(isset($_POST['rekod_borang']))
{
	$kategori = $_POST['kategori'];
	$nama  = $_POST['nama'];
	$ic = $_POST['ic'];
	$jawatan = $_POST['jawatan'];
	$syarikat = $_POST['syarikat'];
	$alamat_pejabat = $_POST['alamat_pejabat'];
	$no_pejabat = $_POST['no_pejabat'];
	$no_bimbit = $_POST['no_bimbit'];
	$tujuan = $_POST['tujuan'];
	$nama_pegawai_pengesahan = mysqli_real_escape_string($conn, $_POST['nama_pegawai_pengesahan']); 
	$status_permohonan = $_POST['status_permohonan'];

	$result = mysqli_query($conn, "INSERT INTO borang(kategori,nama,ic,jawatan,syarikat,alamat_pejabat,no_pejabat,no_bimbit,tujuan,masa_masuk,tarikh,nama_pegawai_pengesahan,status_permohonan) VALUES ('$kategori', '$nama', '$ic', '$jawatan', '$syarikat', '$alamat_pejabat', '$no_pejabat', '$no_bimbit', '$tujuan', CURTIME(), CURDATE(),'$nama_pegawai_pengesahan','$status_permohonan')");
	
	$sql2 = $conn->query("SELECT MAX(borang_id) borang_id FROM borang");
	$row = mysqli_fetch_assoc($sql2);
	$borang_id = $row['borang_id'];
	
	$result2 = mysqli_query($conn, "INSERT INTO pelawat(pelawat_nama,pelawat_ic,pelawat_syarikat,pelawat_tarikh,pelawat_masa_masuk,pelawat_tujuan,borang_id) VALUES ('$nama','$ic','$syarikat',CURDATE(),CURTIME(),'Bilik Server','$borang_id')");
	
	echo '<script language="javascript">';
	echo 'alert("Permohonan berjaya. Sila log keluar sebelum meninggalkan pejabat."); location.href="borang-kemasukan-bilik-server-masuk.php"';
	echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Pendaftaran Pelawat / Bilik Server</title>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<style type="text/css">
@import url("css/floatStyle.css");
@import url("css/borangStyle.css");
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
      <li>
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
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Borang Kemasukan Bilik Server
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item active" href="borang-kemasukan-bilik-server-masuk.php">Masuk</a>
          <a class="dropdown-item" href="borang-kemasukan-bilik-server-keluar.php">Keluar</a>
        </div>
      </li>		
    </ul>
  </div>
</nav>	
	
<div class="container">
<div class="row">
  <div class="column side">
	  Sila isi maklumat berikut.
  </div>
  <div class="column middle">
<div class="container" style="background-color: #F7F7F7;border-radius: 25px">

  <center>
    <h2>BORANG KEMASUKAN BILIK SERVER MPKj</h2>
  </center>
	<br><br>
<form id="form" name="form" method="post" action="borang-kemasukan-bilik-server-masuk.php">
	<div class="form-row">
	<div class="form-check-inline">
  	<label class="form-check-label">
    	<input type="radio" class="form-check-input" name="kategori" value="Kakitangan MPKj" required>Kakitangan MPKj
  	</label>
	</div>
		
	<div class="form-check-inline">
  	<label class="form-check-label">
    	<input type="radio" class="form-check-input" value="Orang Awam" name="kategori">Orang Awam
  	</label>
	</div>
	
	<div class="form-check-inline">
  	<label class="form-check-label">
    	<input type="radio" class="form-check-input" value="Polis" name="kategori">Polis
  	</label>
	</div>
	
	<div class="form-check-inline">
  	<label class="form-check-label">
    	<input type="radio" class="form-check-input" value="Pihak Vendor" name="kategori">Pihak Vendor
  	</label>	
	</div>
	</div>
	
	
  <br>
  <h5>BAHAGIAN A: MAKLUMAT PERIBADI</h5>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" autocomplete="off" required>
      </div>
      <div class="form-group col-md-6">
        <label>No.KP / No.Kakitangan</label>
        <input type="text" class="form-control" name="ic" autocomplete="off" required>
		<label style="font-size: 12px;">No. KP tanpa dash '-'. Contoh: 861111015321</label>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Jawatan</label>
        <input type="text" class="form-control" name="jawatan" autocomplete="off" required>
      </div>
      <div class="form-group col-md-4">
        <label>Nama Syarikat / Nama Jabatan</label>
        <input type="text" class="form-control" name="syarikat" autocomplete="off" required>
      </div>
      <div class="form-group col-md-4">
        <label>Alamat Pejabat</label>
        <textarea class="form-control" rows="1" name="alamat_pejabat" required></textarea>
      </div>
    </div>
	  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Telefon Pejabat</label>
        <input type="text" class="form-control" name="no_pejabat" autocomplete="off" required>
      </div>
      <div class="form-group col-md-6">
        <label>Telefon Bimbit</label>
        <input type="text" class="form-control" name="no_bimbit" autocomplete="off" required>
      </div>
    </div>	  
  <br>
	  
	  
	  
  <hr>
  <h5>BAHAGIAN B: ALIRAN KELUAR MASUK</h5>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tujuan</label>
        <input type="text" class="form-control" name="tujuan" autocomplete="off" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Masa Masuk</label>
		<br><span id="time" class="form-control" readonly></span>
		  <script>
			function setTime() {
			var d = new Date(),
			  el = document.getElementById("time");

			  el.innerHTML = formatAMPM(d);

			setTimeout(setTime, 1000);
			}

			function formatAMPM(date) {
			  var hours = date.getHours(),
				minutes = date.getMinutes(),
				seconds = date.getSeconds(),
				ampm = hours >= 12 ? 'pm' : 'am';
			  hours = hours % 12;
			  hours = hours ? hours : 12; // the hour '0' should be '12'
			  minutes = minutes < 10 ? '0'+minutes : minutes;
			  var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
			  return strTime;
			}

			setTime();
		</script>			  
      </div>
      <div class="form-group col-md-4">
        <label for="contoh2">Tarikh</label>
        <br><span id="date" class="form-control" readonly></span>
		<script>
			n =  new Date();
			y = n.getFullYear();
			m = n.getMonth() + 1;
			d = n.getDate();
			document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
		</script>  
      </div>
    </div>
	<br>
  <input type="hidden"  name="nama_pegawai_pengesahan" value="MOHD ZIKRI BIN DATO' ZA'BA">
  <input type="hidden" class="form-control" name="status_permohonan" value="Belum diluluskan">

  <button type="submit" class="btn btn-primary" name="rekod_borang">Hantar</button><Br><Br>
</form>
	  </div>
	</div>
	  </div>
	  	  <footer class="page-footer blue pt-4">
	<div class="footer-copyright font-small text-center py-3">
		<!-- <img src="img/logo.png" width="30" height="55"><br> -->
		<small>
		MAJLIS PERBANDARAN KAJANG<br>
    	<a href="http://www.mpkj.gov.my/">www.mpkj.gov.my</a></small>
	</div>
</footer>
	</div>
</body>
</html>
