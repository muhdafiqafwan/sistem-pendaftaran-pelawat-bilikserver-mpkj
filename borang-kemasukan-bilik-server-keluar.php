<?php
include ('config.php');
$sql = mysqli_query($conn, "SELECT * FROM borang,pelawat");
if(isset($_POST['rekod_borang']))
{
	$borangID = $_POST['borang'];
	$keterangan_selenggara_1 = $_POST['keterangan_selenggara_1'];
	$jenis_selenggara_1 = $_POST['jenis_selenggara_1'];
	$cadangan_1 = $_POST['cadangan_1'];
	$keterangan_selenggara_2 = $_POST['keterangan_selenggara_2'];
	$jenis_selenggara_2 = $_POST['jenis_selenggara_2'];
	$cadangan_2 = $_POST['cadangan_2'];

	$result = mysqli_query($conn, "UPDATE borang SET masa_keluar = CURTIME(), keterangan_selenggara_1 = '$keterangan_selenggara_1', jenis_selenggara_1 = '$jenis_selenggara_1', cadangan_1 = '$cadangan_1', keterangan_selenggara_2 = '$keterangan_selenggara_2', jenis_selenggara_2 = '$jenis_selenggara_2', cadangan_2 = '$cadangan_2' WHERE borang_id = '$borangID'");
	
	$result2 = mysqli_query($conn, "UPDATE pelawat SET pelawat_masa_keluar = CURTIME() WHERE borang_id = '$borangID'");
	
	echo '<script language="javascript">';
	echo 'alert("Log keluar berjaya."); location.href="borang-kemasukan-bilik-server-keluar.php"';
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
          <a class="dropdown-item" href="borang-kemasukan-bilik-server-masuk.php">Masuk</a>
          <a class="dropdown-item active" href="borang-kemasukan-bilik-server-keluar.php">Keluar</a>
        </div>
      </li>		
    </ul>
  </div>
</nav>	
	
<div class="container">
<div class="row">
  <div class="column side">
	  Sila log keluar sebelum meninggalkan pejabat.
  </div>
  <div class="column middle">
<div class="container" style="background-color: #F7F7F7;border-radius: 25px">

  <center>
    <h2>BORANG KEMASUKAN BILIK SERVER MPKj</h2>
  </center>
	<br><br>
<form id="form" name="form" method="post" action="borang-kemasukan-bilik-server-keluar.php">
    <h5>CARIAN</h5>
	<div class="form-row">
	 <div class="form-group col-md-3">
     <label>No.KP</label>
        <input type="text" class="form-control" name="ic" autocomplete="off">
	 </div>
	 <div class="form-group col-md-3">
		<label>&nbsp</label>
		<br><button type="submit" class="btn btn-primary" name="carian">Cari</button><Br>
     </div>	
	</div>
	
    <div class="form-row">
      <div class="form-group col-md-6">
		<label>Pilih</label>
		<select class="custom-select" name="borang" >
		  <option value="" disabled selected>Nama , No.KP</option>
			<?php
			if(isset($_POST['carian']))
			{
				$ic = $_POST['ic'];
				$result3 = mysqli_query($conn,"SELECT * FROM borang WHERE tarikh = CURDATE()
				AND masa_keluar = '00:00:00' AND ic = '$ic'");
				while($res = mysqli_fetch_array($result3))
				{
					echo "<option value='".$res['borang_id']."'>".$res['nama']." , ".$res['ic']."</option>";
				}
			}
			?>		
		</select>
      </div>
    </div>
	<br><hr>		
	
	<h5>BAHAGIAN B: ALIRAN KELUAR MASUK</h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Masa Keluar</label>
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
    </div>
	
  <br><hr>	
	
    <h5>BAHAGIAN C: KETERANGAN PENYELENGGARAAN</h5>
	 <table class="table table-bordered">
    <thead>
      <tr>
		<th width="5%" style="text-align: center">BIL</th>
        <th width="31%" style="text-align: center">KETERANGAN PENYELENGGARAAN</th>
        <th width="31%" style="text-align: center">JENIS PENYELENGGARAAN</th>
        <th width="31%" style="text-align: center">CADANGAN</th>
      </tr>
    </thead>
    <tbody>
      <tr>
		<td style="text-align: center">1.</td>
        <td><input type="text" class="form-control" name="keterangan_selenggara_1" autocomplete="off"></td>
        <td><input type="text" class="form-control" name="jenis_selenggara_1" autocomplete="off"></td>
        <td><textarea class="form-control" rows="1" name="cadangan_1"></textarea></td>
      </tr>
      <tr>
		<td style="text-align: center">2.</td>
        <td><input type="text" class="form-control" name="keterangan_selenggara_2" autocomplete="off"></td>
        <td><input type="text" class="form-control" name="jenis_selenggara_2" autocomplete="off"></td>
        <td><textarea class="form-control" rows="1" name="cadangan_2"></textarea></td>
      </tr>
    </tbody>
  </table>
  <br>
  <button type="submit" class="btn btn-primary" name="rekod_borang">Log Keluar</button><Br><Br>
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
