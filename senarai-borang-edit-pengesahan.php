<!DOCTYPE html>
<?php
// Initialize the session
session_start();
include_once("config.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:admin.php");
    exit;
}

if(isset($_POST['Update']))
{
	$borang_id = mysqli_real_escape_string($conn, $_POST['id']);
	$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$ic = mysqli_real_escape_string($conn, $_POST['ic']);
	$jawatan = mysqli_real_escape_string($conn, $_POST['jawatan']);
	$syarikat = mysqli_real_escape_string($conn, $_POST['syarikat']);
	$alamat_pejabat = mysqli_real_escape_string($conn, $_POST['alamat_pejabat']);
	$no_pejabat = mysqli_real_escape_string($conn, $_POST['no_pejabat']);
	$no_bimbit = mysqli_real_escape_string($conn, $_POST['no_bimbit']);
	$tujuan = mysqli_real_escape_string($conn, $_POST['tujuan']);
	$masa_masuk = mysqli_real_escape_string($conn, $_POST['masa_masuk']);
	$masa_keluar = mysqli_real_escape_string($conn, $_POST['masa_keluar']);
	$tarikh = mysqli_real_escape_string($conn, $_POST['tarikh']);
	$keterangan_selenggara_1 = mysqli_real_escape_string($conn, $_POST['keterangan_selenggara_1']);
	$jenis_selenggara_1 = mysqli_real_escape_string($conn, $_POST['jenis_selenggara_1']);
	$cadangan_1 = mysqli_real_escape_string($conn, $_POST['cadangan_1']);
	$keterangan_selenggara_2 = mysqli_real_escape_string($conn, $_POST['keterangan_selenggara_2']);
	$jenis_selenggara_2 = mysqli_real_escape_string($conn, $_POST['jenis_selenggara_2']);
	$cadangan_2 = mysqli_real_escape_string($conn, $_POST['cadangan_2']);
	$status_permohonan = mysqli_real_escape_string($conn, $_POST['status_permohonan']);
	$catatan_pengesahan = mysqli_real_escape_string($conn, $_POST['catatan_pengesahan']);
	$nama_pegawai_pengesahan = mysqli_real_escape_string($conn, $_POST['nama_pegawai_pengesahan']);
	$tarikh_pengesahan = mysqli_real_escape_string($conn, $_POST['tarikh_pengesahan']);
	
	$result2 = mysqli_query($conn, "UPDATE borang SET kategori = '$kategori',  nama = '$nama',  ic = '$ic',  jawatan = '$jawatan',  syarikat = '$syarikat',  alamat_pejabat = '$alamat_pejabat',  no_pejabat = '$no_pejabat',  no_bimbit = '$no_bimbit',  tujuan = '$tujuan',  masa_masuk = '$masa_masuk',  masa_keluar = '$masa_keluar',  tarikh = '$tarikh', keterangan_selenggara_1 = '$keterangan_selenggara_1',  jenis_selenggara_1 = '$jenis_selenggara_1', cadangan_1 = '$cadangan_1',  keterangan_selenggara_2 = '$keterangan_selenggara_2',  jenis_selenggara_2 = '$jenis_selenggara_2',  cadangan_2 = '$cadangan_2',  status_permohonan = '$status_permohonan',  catatan_pengesahan = '$catatan_pengesahan',  nama_pegawai_pengesahan = '$nama_pegawai_pengesahan',  tarikh_pengesahan = '$tarikh_pengesahan' WHERE borang_id='$borang_id'");
	header("Location: senarai-borang.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM borang WHERE borang_id=$id");

while($res = mysqli_fetch_array($result))
{
	$kategori = $res['kategori'];
	$nama = $res['nama'];
	$ic = $res['ic'];
	$jawatan = $res['jawatan'];
	$syarikat = $res['syarikat'];
	$alamat_pejabat = $res['alamat_pejabat'];
	$no_pejabat = $res['no_pejabat'];
	$no_bimbit = $res['no_bimbit'];
	$tujuan = $res['tujuan'];
	$masa_masuk = $res['masa_masuk'];
	$masa_keluar = $res['masa_keluar'];
	$tarikh = $res['tarikh'];
	$keterangan_selenggara_1 = $res['keterangan_selenggara_1'];
	$jenis_selenggara_1 = $res['jenis_selenggara_1'];
	$cadangan_1 = $res['cadangan_1'];
	$keterangan_selenggara_2 = $res['keterangan_selenggara_2'];
	$jenis_selenggara_2 = $res['jenis_selenggara_2'];
	$cadangan_2 = $res['cadangan_2'];
	$status_permohonan = $res['status_permohonan'];
	$catatan_pengesahan = $res['catatan_pengesahan'];
	$nama_pegawai_pengesahan = $res['nama_pegawai_pengesahan'];
	$tarikh_pengesahan = $res['tarikh_pengesahan'];
	
}
?>

<html>
<head>
<title>Borang Kemasukan Bilik Server</title>
<style>
* {
  box-sizing: border-box;
}
	
	
body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
	float: left;
	width: 100%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}	
	
tr.special_row_header {
    background-color: #E0E0E0;
	font-weight: bold;
}	
	
tr.special_row td {
    background-color: #E0E0E0;
	font-weight: bold;
}

tr.special_row td + td {
    background-color: #FFFFFF;
	font-weight: normal;
	padding-left: 10px;
}
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
	font-size: medium;
	padding: 3px;
}
.center {
  margin: auto;
  width: 30%;
}	

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown:hover .dropbtn  {
  background-color: #ddd;
  color: black;	
}	
	
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: #f2f2f2;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
	
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}	
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">	
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ minDate:0, dateFormat: 'yy-mm-dd'});
  } );
</script>	
<link href="css/all.css" rel="stylesheet" type="text/css">	
</head>
<body>

<div class="header">
  <h1>BAHAGIAN ADMIN</h1>
</div>

<div class="topnav">
  <a href="admin-halaman-utama.php">Halaman Utama</a>
  <a href="senarai-pelawat.php">Senarai Pelawat</a>
  <a href="senarai-borang.php" style="background-color: #3B619C">Senarai Borang Kemasukan Bilik Server</a>
  <div class="dropdown">
    <button class="dropbtn">Laporan 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="report-permohonan.php">Senarai Permohonan</a>
      <a href="report-bilik-server.php">Bilik Server</a>
    </div>
  </div> 	
  <a href="logout.php" style="float:right">Log Keluar</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
	<h2>EDIT/PENGESAHAN BORANG KEMASUKAN BILIK SERVER</h2>
      <div>
		<a style="text-decoration:none" href="#" onClick="goBack()"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>  
		<script>
		function goBack() {
		  window.history.back();
		}
		</script>
		<br/><br/>
		  
		<form name="form1" method="POST" action="senarai-borang-edit-pengesahan.php">
		<table style="width: 90%;">
			<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN A: MAKLUMAT PERIBADI</th>
  			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Kategori</td>
				<td style="width: 74%; height: 21px;"><input name="kategori" type="text" value="<?php echo $kategori;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Nama</td>
				<td style="width: 74%; height: 21px;"><input name="nama" type="text" value="<?php echo $nama;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">No.KP / No.Kakitangan</td>
				<td style="width: 74%; height: 21px;"><input name="ic" type="text" value="<?php echo $ic;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Jawatan</td>
				<td style="width: 74%; height: 21px;"><input name="jawatan" type="text" value="<?php echo $jawatan;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Nama Syarikat / Nama Jabatan</td>
				<td style="width: 74%; height: 21px;"><input name="syarikat" type="text" value="<?php echo $syarikat;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Alamat Pejabat</td>
				<td style="width: 74%; height: 21px;"><textarea rows="1" name="alamat_pejabat" required><?php echo $alamat_pejabat;?></textarea></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Telefon Pejabat</td>
				<td style="width: 74%; height: 21px;"><input name="no_pejabat" type="text" value="<?php echo $no_pejabat;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Telefon Bimbit</td>
				<td style="width: 74%; height: 21px;"><input name="no_bimbit" type="text" value="<?php echo $no_bimbit;?>" required></td>
			</tr>
			
		</table>
		<br><br><br>
		<table style="width: 90%;">
			
			<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN B: ALIRAN KELUAR MASUK</th>
  			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Tujuan</td>
				<td style="width: 74%; height: 21px;"><input name="tujuan" type="text" value="<?php echo $tujuan;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Masa Masuk</td>
				<td style="width: 74%; height: 21px;"><input name="masa_masuk" type="time" value="<?php echo $masa_masuk;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Masa Keluar</td>
				<td style="width: 74%; height: 21px;"><input name="masa_keluar" type="time" value="<?php echo $masa_masuk;?>" required></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Tarikh</td>
				<td style="width: 74%; height: 21px;"><input name="tarikh" type="text" id="datepicker" value="<?php echo $tarikh;?>" required></td>
			</tr>
			
		</table>
		<br><br><br>
		<table style="width: 90%;">
			
			<tr>
    		<th scope="col" colspan="4" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN C: KETERANGAN PENYELENGGARAAN</th>
  			</tr>
			<tr style="height: 21px;" class="special_row_header">
				<td style="width: 2%; height: 21px; text-align: center;">BIL</td>	
				<td style="width: 30.667%; height: 21px; text-align: center;">KETERANGAN PENYELENGGARAAN</td>
				<td style="width: 30.667%; height: 21px; text-align: center;">JENIS PENYELENGGARAAN</td>
				<td style="width: 30.667%; height: 21px; text-align: center;">CADANGAN</td>
			</tr>	
			<tr style="height: 21px;">
				<td style="width: 2%; height: 21px; text-align: center;">1.</td>
				<td style="width: 30.667%; height: 21px;"><input name="keterangan_selenggara_1" type="text" value="<?php echo $keterangan_selenggara_1;?>"></td>
				<td style="width: 30.667%; height: 21px;"><input name="jenis_selenggara_1" type="text" value="<?php echo $jenis_selenggara_1;?>"></td>
			<td style="width: 30.667%; height: 21px;"><textarea rows="1" name="cadangan_1"><?php echo $cadangan_1;?></textarea></td>
			</tr>
			<tr style="height: 21px;">
				<td style="width: 2%; height: 21px; text-align: center;">2.</td>		
				<td style="width: 30.667%; height: 21px;"><input name="keterangan_selenggara_2" type="text" value="<?php echo $keterangan_selenggara_2;?>"></td>
				<td style="width: 30.667%; height: 21px;"><input name="jenis_selenggara_2" type="text" value="<?php echo $jenis_selenggara_2;?>"></td>
				<td style="width: 30.667%; height: 21px;"><textarea rows="1" name="cadangan_1" ><?php echo $cadangan_2;?></textarea></td>
			</tbody>
		</table>
		<br><br><br>
		<table style="width: 90%;">
			
			<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN D: PENGESAHAN PEGAWAI BAHAGIAN TEKNOLOGI MAKLUMAT</th>
  			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Status Permohonan</td>
				<td style="width: 74%; height: 21px;">
				<input type="radio" name="status_permohonan" value="Lulus" <?php echo ($status_permohonan=='Lulus')?'checked':'' ?>> Lulus
				<input type="radio" name="status_permohonan" value="Tidak" <?php echo ($status_permohonan=='Tidak')?'checked':'' ?>> Tidak</td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Catatan</td>
				<td style="width: 74%; height: 21px;"><input name="catatan_pengesahan" type="text" value="<?php echo $catatan_pengesahan;?>"></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Nama</td>
				<td style="width: 74%; height: 21px;"><input name="nama_pegawai_pengesahan" type="text" value="<?php echo $nama_pegawai_pengesahan;?>"></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
				<td style="width: 20%; height: 21px;">Tarikh</td>
				<td style="width: 74%; height: 21px;"><input name="tarikh_pengesahan" type="text" id="datepicker" value="<?php echo $tarikh_pengesahan;?>"></td>
			</tr>
					</table>
		<br><br><br>
		<table style="width: 90%; border: 0;">
		  	<tr style="border: 0">
				<td scope="col" colspan="2" style="text-align: center;border: 0;"><input type="hidden" name="id" value=<?php echo $_GET['id'];?>><br><input type="submit" name="Update" value="Update"></td>
			</tr>
		</table>	
		</form>	
		</div>	
    </div>
  </div>
</body>
</html>