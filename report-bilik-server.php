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

$bulan = 0;
if(isset($_POST['advanceCari']))
{
	$bulan = $_POST['bulan'];
	$bulan_nama = array("","Januari","Februari","Mac","April","Mei","Jun","Julai","Ogos","September","Oktober","November","Disember"); 	
	$kategori = $_POST['kategori'];
	$jawatan = $_POST['jawatan'];
	$status_permohonan = $_POST['status_permohonan'];
	$tujuan = $_POST['tujuan'];	
	$query = "SELECT * FROM borang WHERE MONTH(tarikh) = '$bulan' AND tujuan LIKE '%".$tujuan."%' AND kategori LIKE '%".$kategori."%' AND status_permohonan LIKE '".$status_permohonan."%' AND jawatan LIKE '%".$jawatan."%' ORDER BY tarikh DESC";
	$result = cari($query);
}
else
{
	$query = "SELECT * FROM borang WHERE 1 = 0";
	$result = cari($query);
}

function cari($query)
{
	$conn = mysqli_connect("localhost", "root", "", "sistem_pelawat_db");
	$result = mysqli_query($conn, $query);
	return $result;
}

?>

<html>
<head>
<title>Laporan Kemasukan Bilik Server</title>
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
.topnav a:hover  {
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

th {
	background-color: #CCCCCC;
}
	
.advCari{
	cursor: pointer;
	color: #372BD3;
}
	
.advCari:hover{
	color: #DB3415;
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
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
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
  <a href="senarai-borang.php">Senarai Borang Kemasukan Bilik Server</a>
  <div class="dropdown">
    <button class="dropbtn" style="background-color: #3B619C;">Laporan 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="report-permohonan.php">Senarai Permohonan</a>
      <a style="background-color: #3B619C; color: white" href="report-bilik-server.php">Bilik Server</a>
    </div>
  </div> 	
  <a href="logout.php" style="float:right">Log Keluar</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
		
   		   <h2>LAPORAN KEMASUKAN BILIK SERVER</h2>
    		<form action="report-bilik-server.php" method="post">
				<table width="70%">
				<tbody>
				<tr>
				<td>Bulan:<br>
				  <select name="bulan">
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Mac</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Jun</option>
					<option value="07">Julai</option>
					<option value="08">Ogos</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Disember</option>
				  </select>
				</td>
				<td>Kategori:<br>
				  <select name="kategori">
					<option value="">Semua</option>					  
					<option value="Kakitangan MPKj">Kakitangan MPKj</option>
					<option value="Orang Awam">Orang Awam</option>
					<option value="Polis">Polis</option>
					<option value="Vendor">Vendor</option>
				  </select>
				</td>					
				<td>Tujuan:<br><input type="text" name="tujuan" autocomplete="off"></td>				
				</tr>
				<tr><td><br></td></tr>										
				<tr>
				<td>Jawatan:<br><input type="text" name="jawatan" autocomplete="off"></td>
				<td>Status permohonan:<br>
				  <select name="status_permohonan">
					<option value="">Semua</option>					  
					<option value="Belum">Belum diluluskan</option>
					<option value="Lulus">Lulus</option>
					<option value="Tidak">Tidak</option>
				  </select>
				</td>	
				</tr>	
				<tr><td><br></td></tr>					
				<tr>
				<td><button class="myButton" type="submit" name="advanceCari">Jana Laporan</button></td>
				</tr>	
				</tbody>
				</table>
    		</form>	
			
		<br><hr><br>
  	
     <div id="printableArea">
			<?php for($i=1; $i <= 12; $i++)
			{
				if($bulan == $i)
				{
					echo "<h3>Laporan Kemasukan Bilik Server</h3>"; 
					echo "<h4>Bulan: $bulan_nama[$i]</h4>"; 
					echo "<h4>Kategori: $kategori</h4>"; 
					echo "<h4>Status Permohonan: $status_permohonan</h4>"; 

				}

			}
		  	if($bulan == 0)
		  	{
					echo "<h3>Laporan Kemasukan Bilik Server</h3>"; 
					echo "<h4>Bulan: </h4>"; 		
					echo "<h4>Kategori: </h4>"; 		
					echo "<h4>Status Permohonan: </h4>"; 		
				
			}
		  ?>		 
		  <table width='100%' border=1>
		  <tr bgcolor='#CCCCCC'>
			  <th>Kategori</th>
			  <th>Nama</th>
			  <th>IC</th>
			  <th>Jawatan</th>
			  <th>Syarikat/Jabatan</th>
			  <th>No. Bimbit</th>
			  <th>Tujuan</th>
			  <th>Tarikh</th>
			  <th>Masa Masuk</th>
			  <th>Masa Keluar</th>
			  <th>Status Permohonan</th>
		  </tr>
		  <?php
			  while($res = mysqli_fetch_array($result))
			  {
				  echo "<tr>";
				  echo "<td>".$res['kategori']."</td>";				  
				  echo "<td><a href=\"senarai-borang-detail.php?id=$res[borang_id]\">".$res['nama']."</a></td>";
				  echo "<td>".$res['ic']."</td>";				  
				  echo "<td>".$res['jawatan']."</td>";
				  echo "<td>".$res['syarikat']."</td>";
				  echo "<td>".$res['no_bimbit']."</td>";
				  echo "<td>".$res['tujuan']."</td>";
				  echo "<td>".$res['tarikh']."</td>";
				  echo "<td>".$res['masa_masuk']."</td>";
				  echo "<td>".$res['masa_keluar']."</td>";
				  echo "<td>".$res['status_permohonan']."</td>";
			  }
			?>
		  </table>
	  </div>
	<br><button class="myButton" onclick="printDiv('printableArea')">Print</button>

	<script>	
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
	window.print();

     document.body.innerHTML = originalContents;
	}
	</script>		
    </div>
  </div>
</body>
</html>

</body>