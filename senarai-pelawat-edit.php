<!DOCTYPE html>
<?php
// Initialize the session
session_start();
include_once("config.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location:admin.php");
    exit;
}

if(isset($_POST['Update']))
{
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$nama_syarikat = mysqli_real_escape_string($conn, $_POST['nama_syarikat']);
	$tarikh = mysqli_real_escape_string($conn, $_POST['tarikh']);
	$masa_masuk = mysqli_real_escape_string($conn, $_POST['masa_masuk']);
	$masa_keluar = mysqli_real_escape_string($conn, $_POST['masa_keluar']);
	
if(empty($nama) || empty($nama_syarikat) || empty($tarikh) || empty($masa_masuk) || empty($masa_keluar))
{
	if(empty($nama))
	{
		echo "<font color='red'>Ruang nama kosong!</font><br/>";
	}
	if(empty($nama_syarikat))
	{
		echo "<font color='red'>Ruang nama syarikat kosong!</font><br/>";
	}
	if(empty($tarikh))
	{
		echo "<font color='red'>Ruang tarikh kosong!</font><br/>";
	}
	if(empty($masa_masuk))
	{
		echo "<font color='red'>Ruang masa masuk kosong!</font><br/>";
	}
	if(empty($masa_keluar))
	{
		echo "<font color='red'>Ruang masa keluar kosong!</font><br/>";
	}	
}
	else
	{
		$result = mysqli_query($conn, "UPDATE pelawat SET pelawat_nama = '$nama', pelawat_syarikat='$nama_syarikat', pelawat_tarikh='$tarikh', pelawat_masa_masuk='$masa_masuk', pelawat_masa_keluar='$masa_keluar' WHERE pelawat_id='$id'");
		header("Location: senarai-pelawat.php");
	}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM pelawat WHERE pelawat_id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama = $res['pelawat_nama'];
	$nama_syarikat = $res['pelawat_syarikat'];
	$tarikh = $res['pelawat_tarikh'];
	$masa_masuk = $res['pelawat_masa_masuk'];
	$masa_keluar = $res['pelawat_masa_keluar'];
}
?>
<html>
<head>
<title>Edit Senarai Pelawat</title>
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
<link href="css/all.css" rel="stylesheet" type="text/css">	
</head>
<body>

<div class="header">
  <h1>BAHAGIAN ADMIN</h1>
</div>

<div class="topnav">
  <a href="admin-halaman-utama.php">Halaman Utama</a>
  <a href="senarai-pelawat.php" style="background-color: #3B619C">Senarai Pelawat</a>
  <a href="senarai-borang.php">Senarai Borang Kemasukan Bilik Server</a>
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
      <h2>EDIT MAKLUMAT PELAWAT</h2>
      <div>
		<a style="text-decoration:none" href="#" onClick="goBack()"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>  
		<script>
		function goBack() {
		  window.history.back();
		}
		</script>
		<br/><br/>
		  
		  <form name="form1" method="post" action="senarai-pelawat-edit.php">
		  <table border="0">
			  <tr>
				  <td>Nama</td>
				  <td><input name="nama" type="text" value="<?php echo $nama;?>"></td>
			  </tr>
			  <tr>
				  <td>Nama Syarikat</td>
				  <td><input name="nama_syarikat" type="text" value="<?php echo $nama_syarikat;?>"></td>
			  </tr>
			  <tr>
				  <td>Tarikh</td>
				  <td><input name="tarikh" type="text" id="datepicker" value="<?php echo $tarikh;?>"></td>
			  </tr>
			  <tr>
				  <td>Masa Masuk</td>
				  <td><input name="masa_masuk" type="time" value="<?php echo $masa_masuk;?>"></td>
			  </tr>			  
			  <tr>
				  <td>Masa Keluar</td>
				  <td><input name="masa_keluar" type="time" value="<?php echo $masa_keluar;?>"></td>
			  </tr>			  
			  <tr>
				  <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				  <td><input type="submit" name="Update" value="Update"></td>
			  </tr>
		  </table>
		  </form>
		  
	  </div>
    </div>
  </div>
</body>
</html>

</body>