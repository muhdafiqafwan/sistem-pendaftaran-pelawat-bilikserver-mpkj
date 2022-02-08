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
	@media all 
{
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
	
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}	

th.special_header {
    text-align: center;
	font-size: 15pt;
	background: #D7D7D7;
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

button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
	font-size: medium;
	padding: 1px;
	padding-left: 3px;
	padding-right: 3px;
}	
.center {
  margin: auto;
  width: 30%;
}	

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
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
	


}	
</style>
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
      <h2>BORANG KEMASUKAN BILIK SERVER</h2>
      <div>
		<a style="text-decoration:none" href="#" onClick="goBack()"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>  
		<script>
		function goBack() {
		  window.history.back();
		}
		</script>
		<br><br> 
		<div id="printableArea">
		<table style="width: 90%;">
			<tr>
    		<th scope="col" colspan="2" class="special_header">BAHAGIAN A: MAKLUMAT PERIBADI</th>
  			</tr>
			<tbody>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Kategori</td>
			<td style="width: 74%; height: 21px;"><?php echo $kategori;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Nama</td>
			<td style="width: 74%; height: 21px;"><?php echo $nama;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">No.KP / No.Kakitangan</td>
			<td style="width: 74%; height: 21px;"><?php echo $ic;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Jawatan</td>
			<td style="width: 74%; height: 21px;"><?php echo $jawatan;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Nama Syarikat / Nama Jabatan</td>
			<td style="width: 74%; height: 21px;"><?php echo $syarikat;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Alamat Pejabat</td>
			<td style="width: 74%; height: 21px;"><?php echo $alamat_pejabat;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Telefon Pejabat</td>
			<td style="width: 74%; height: 21px;"><?php echo $no_pejabat;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Telefon Bimbit</td>
			<td style="width: 74%; height: 21px;"><?php echo $no_bimbit;?></td>
			</tr>
			</tbody>
		</table>
		<br><br><br>
		<table style="width: 90%;">
			<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN B: ALIRAN KELUAR MASUK</th>
  			</tr>
			<tbody>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Tujuan</td>
			<td style="width: 74%; height: 21px;"><?php echo $tujuan;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Masa Masuk</td>
			<td style="width: 74%; height: 21px;"><?php echo $masa_masuk;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Masa Keluar</td>
			<td style="width: 74%; height: 21px;"><?php echo $masa_keluar;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Tarikh</td>
			<td style="width: 74%; height: 21px;"><?php echo $tarikh;?></td>
			</tr>
			</tbody>
		</table>
		<br><br><br>
		<table style="width: 90%;">
			<tr>
    		<th scope="col" colspan="4" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN C: KETERANGAN PENYELENGGARAAN</th>
  			</tr>
			<tbody>
			<tr style="height: 21px;" class="special_row_header">
			<td style="width: 2%; height: 21px; text-align: center;">BIL</td>	
			<td style="width: 30.667%; height: 21px; text-align: center;">KETERANGAN PENYELENGGARAAN</td>
			<td style="width: 30.667%; height: 21px; text-align: center;">JENIS PENYELENGGARAAN</td>
			<td style="width: 30.667%; height: 21px; text-align: center;">CADANGAN</td>
			</tr>	
			<tr style="height: 21px;">
			<td style="width: 2%; height: 21px; text-align: center;">1.</td>
			<td style="width: 30.667%; height: 21px;"><?php echo $keterangan_selenggara_1;?></td>
			<td style="width: 30.667%; height: 21px;"><?php echo $jenis_selenggara_1;?></td>
			<td style="width: 30.667%; height: 21px;"><?php echo $cadangan_1;?></td>
			</tr>
			<tr style="height: 21px;">
			<td style="width: 2%; height: 21px; text-align: center;">2.</td>		
			<td style="width: 30.667%; height: 21px;"><?php echo $keterangan_selenggara_2;?></td>
			<td style="width: 30.667%; height: 21px;"><?php echo $jenis_selenggara_2;?></td>
			<td style="width: 30.667%; height: 21px;"><?php echo $cadangan_2;?></td>
			</tbody>
		</table>
		<br><br><br>
		<table style="width: 90%;">
			<tr>
    		<th scope="col" colspan="2" style="text-align: center; font-size: 15pt; background-color: #D7D7D7">BAHAGIAN D: PENGESAHAN PEGAWAI BAHAGIAN TEKNOLOGI MAKLUMAT</th>
  			</tr>
			<tbody>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Status Permohonan</td>
			<td style="width: 74%; height: 21px;"><?php echo $status_permohonan;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Catatan</td>
			<td style="width: 74%; height: 21px;"><?php echo $catatan_pengesahan;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Nama</td>
			<td style="width: 74%; height: 21px;"><?php echo $nama_pegawai_pengesahan;?></td>
			</tr>
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Tandatangan & Cop Rasmi</td>
			<td style="width: 74%; height: 21px;">
				<?php
					  if($status_permohonan == "Lulus" || $status_permohonan == "Tidak") 
						{ echo "<img src='img/tt.png'>"; }
					  else
					  	{ echo "&nbsp"; }
				?>
			</td>
			</tr>				
			<tr style="height: 21px;" class="special_row">
			<td style="width: 20%; height: 21px;">Tarikh</td>
			<td style="width: 74%; height: 21px;"><?php echo $tarikh_pengesahan;?></td>
			</tr>
			</tbody>
		</table>
		</div>	
		  <br><br>	
		  
		  <div class="center">
			<button class="button" onclick="printDiv('printableArea')">Print</button> &nbsp &nbsp
			<script>	
			function printDiv(divName) {
			 var printContents = document.getElementById(divName).innerHTML;
			 var originalContents = document.body.innerHTML;

			 document.body.innerHTML = printContents;
			window.print();

			 document.body.innerHTML = originalContents;
			}
			</script>			  
		  <?php
		  echo "<a href=\"senarai-borang-edit-pengesahan.php?id=$id\" class=\"button\" >Edit / Pengesahan</a> &nbsp &nbsp";
		  echo "<a href=\"senarai-borang-delete.php?id=$id\"onClick=\"return confirm('Are you sure you want to delete?')\" class=\"button\">Delete</a>";
		  ?>
		 </div>
		</div>
    </div>
  </div>
</body>
</html>