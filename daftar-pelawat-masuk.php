<?php
include ('config.php');

$sql = mysqli_query($conn, "SELECT * FROM pelawat");
if(isset($_POST['rekod_km']))
{
	$nama = $_POST['nama'];
	$ic = $_POST['ic'];
	$nama_syarikat = $_POST['nama_syarikat'];
	$tujuan = $_POST['tujuan'];
	
	$result = mysqli_query($conn, "INSERT INTO pelawat(pelawat_nama,pelawat_ic,pelawat_syarikat,pelawat_tarikh,pelawat_masa_masuk,pelawat_tujuan,borang_id) VALUES ('$nama','$ic','$nama_syarikat',CURDATE(),CURTIME(),'$tujuan',NULL)");

	echo '<script language="javascript">';
	echo 'alert("Pendaftaran masuk berjaya. Sila log keluar sebelum meninggalkan pejabat."); location.href="daftar-pelawat-masuk.php"';
	echo '</script>';	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Pendaftaran Pelawat / Bilik Server</title>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<style type="text/css">
@import url("css/floatStyle.css");
</style>	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
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
      <li>
        <a class="nav-link" href="index.php">Halaman Utama <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pendaftaran Pelawat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item active" href="daftar-pelawat-masuk.php">Masuk</a>
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
	  Sila isi maklumat berikut.<br><br>
	  
	  <b>Perhatian!</b> Untuk membuat lawatan ke Bilik Server sila isi Borang Kemasukan Bilik Server terlebih dahulu. <a href="borang-kemasukan-bilik-server-masuk.php">Klik di sini</a>
  </div>
  <div class="column middle" >
	<form id="form" name="form" method="post" action="daftar-pelawat-masuk.php">
	<table width="330" align="center" style="border-radius: 15px; background: #F7F7F7">
		<tbody>
		<tr>
		<td width="110">&nbsp Nama</td>
		<td width="202" height="40">
			: <input name="nama" type="text" style="width:200px;" pattern=".{3,}" title="Tiga atau lebih patah perkataan" autocomplete="off" required>
		</td>
		</tr>	

		<tr>
		<td width="116">&nbsp No.KP</td>
		<td width="202" height="40">
			: <input name="ic" type="text" style="width:200px;" autocomplete="off" required>
			<label style="font-size: 11px;">&nbsp Tanpa dash '-'. Contoh: 861111015321</label>
		</td>
		</tr>	
			
		<tr>
		<td>&nbsp Nama Syarikat</td>
		<td height="40">
			: <input name="nama_syarikat" type="text" style="width:200px;" autocomplete="off" required>
		</td>
		</tr>
		
		<tr>
		<td>&nbsp Tarikh</td>			
		<td height="40">
			: <span id="date"></span>
			<script>
			n =  new Date();
			y = n.getFullYear();
			m = n.getMonth() + 1;
			d = n.getDate();
			document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
			</script>
		</td>
		</tr>
			
		<tr>
		<td>&nbsp Masa Masuk</td>			
		<td height="40">
			: <span id="time"></span>
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
		</td>
		</tr>			
			
		
		<tr>
		<td>
			&nbsp Tujuan
		</td>			
		<td height="40">
			: <input name="tujuan" type="text" style="width:200px;" id="inputother" autocomplete="off" required>
			<script>
			document.getElementById('inputother').addEventListener('keyup', function(e) {
			var text = document.getElementById('inputother').value;
			if (text.match(/bilikserver|bilik server/gi)) {
				alert('Bilik server tidak dibenarkan! Sila isi borang yang telah disediakan, lihat paparan disebelah kiri halaman.');
			}
			text = text.replace(/bilikserver|bilik server/gi,'');
			document.getElementById('inputother').value = text;
			},false);
			</script>

		</td>
		</tr>
			

		<tr>
		<td></td>
		<td style= "padding-top: 30px; padding-bottom: 10px">
			<div style="padding-left: 15px">
			<input type="submit" name="rekod_km" value="Hantar">
			</div>
		</td>
		</tr>
		</tbody>
		</table>	  
	  </form>
	  
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