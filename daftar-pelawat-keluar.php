<?php
include ('config.php');
$sql = mysqli_query($conn, "SELECT * FROM pelawat");

if(isset($_POST['log_keluar']))
{
	$pelawatID = $_POST['pelawat'];
	$result = mysqli_query($conn, "UPDATE pelawat SET pelawat_masa_keluar = NOW() WHERE pelawat_id = '$pelawatID'");

	echo '<script language="javascript">';
	echo 'alert("Log keluar berjaya."); location.href="daftar-pelawat-keluar.php"';
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
          <a class="dropdown-item" href="daftar-pelawat-masuk.php">Masuk</a>
          <a class="dropdown-item active" href="daftar-pelawat-keluar.php">Keluar</a>
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
  <div class="column side" style="padding-left: 25px">
	  Sila log keluar sebelum meninggalkan pejabat.
  </div>
  <div class="column middle">
	<form id="form" name="form" method="post" action="daftar-pelawat-keluar.php">
	<table width="330" align="center" style="border-radius: 15px; background: #F7F7F7">
	  	<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt">CARIAN MAKLUMAT</th>
  		</tr>
		<tr><td><br></td></tr>	
		<tr>
			<th scope="col" colspan="2" style="text-align: center"><label style="font-size: 12px;">No.KP:</label></th>
		</tr>
		<tr>
			<td scope="col" colspan="2" style="text-align: center"><input type="text" name="ic" autocomplete="off">&nbsp<input type="submit" name="carian" value="Cari"></td>
		</tr>
		<tr>
			<th scope="col" colspan="2" style="text-align: center"><label style="font-size: 12px;">Sila pilih:</label></th>
		</tr>
		<tr>
			<th scope="col" colspan="2" style="text-align: center">
			<select name="pelawat" style="font-weight: normal">
			<option value="" disabled selected>Nama , No.KP</option>
			<?php
			if(isset($_POST['carian']))	
			{
				$ic = $_POST['ic'];
				$result2 = mysqli_query($conn,"SELECT * FROM pelawat WHERE pelawat_tarikh = CURDATE()
				AND pelawat_masa_keluar = '00:00:00' AND pelawat_ic = '$ic'");
				while($res = mysqli_fetch_array($result2))
				{
					echo "<option value='".$res['pelawat_id']."'>".$res['pelawat_nama']." , ".$res['pelawat_ic']."</option>";
				}
			}	
			?>		
			</select></th>	
		</tr>
				
		<tr><td><br></td></tr>		
		
		<tr>
		<td>
			&nbsp Masa Keluar :
		</td>			
		<td>
		<span id="time"></span>
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
		<tr><td><br></td></tr>		
		</table>
		
		<div class="button" align="center">
			<br><input type="submit" name="log_keluar" value="Log Keluar">
		</div>	  
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