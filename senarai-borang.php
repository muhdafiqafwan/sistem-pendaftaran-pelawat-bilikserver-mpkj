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




if(isset($_POST['advanceCari']))
{
	$nama = $_POST['nama'];
	$ic = $_POST['ic'];
	$tarikh = $_POST['tarikh'];
	$status_permohonan = $_POST['status_permohonan'];
	$query = "SELECT * FROM borang WHERE nama LIKE '%".$nama."%' AND ic LIKE '%".$ic."%' AND tarikh LIKE '%".$tarikh."%' AND status_permohonan LIKE '%".$status_permohonan."%' ORDER BY tarikh DESC";
	$result = cari($query);
}
else
{
	$query = "SELECT * FROM borang ORDER BY tarikh DESC";
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
<title>Senarai Borang Kemasukan Bilik Server</title>
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
	
th {
    cursor: pointer;
}	
	
tr:hover {background-color:#f5f5f5;}	

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
	  <div style="float: right">
		    <div class="advCari" onClick="myFunction()">Cari... &nbsp<i class="fa fa-search"></i></div>
    		<form action="senarai-borang.php" method="post" style="display: none" id="myDIV">
				<table>
				<tbody>
				<tr>
				<td>Nama:<br><input type="text" name="nama" autocomplete="off"></td>
				</tr>
				<tr>
				<td>IC:<br><input type="text" name="ic" autocomplete="off"></td>
				</tr>
				<tr>
				<td>Tarikh:<br><input type="text" name="tarikh" id="datepicker" autocomplete="off"></td>
				</tr>
				<tr>
				<td>Status Permohonan:<br><input type="text" name="status_permohonan" autocomplete="off"></td>
				</tr>
				<tr>
				<td><button type="submit" name="advanceCari">Cari</button></td>
				</tr>	
				</tbody>
				</table>
    		</form>	
			<script>
			function myFunction() {
			  var x = document.getElementById("myDIV");
			  if (x.style.display === "none") {
				x.style.display = "block";
			  } else {
				x.style.display = "none";
			  }
			}
			</script>
  		</div>		
      <h2>SENARAI BORANG KEMASUKAN BILIK SERVER</h2>
      <div>
		  <table width='60%' border=1>
		  <tr bgcolor='#CCCCCC'>
			  <th>Borang ID<i class="fa fa-fw fa-sort"></i></th>			  
			  <th>Nama<i class="fa fa-fw fa-sort"></i></th>
			  <th>IC<i class="fa fa-fw fa-sort"></i></th>
			  <th>Tarikh<i class="fa fa-fw fa-sort"></i></th>
			  <th>Status Pengesahan<i class="fa fa-fw fa-sort"></i></th>
		  </tr>
		  <?php
			  while($res = mysqli_fetch_array($result))
			  {
				  echo "<tr>";
				  echo "<td align='center'><a href=\"senarai-borang-detail.php?id=$res[borang_id]\">".$res['borang_id']."</a></td>";
				  echo "<td>".$res['nama']."</td>";
				  echo "<td>".$res['ic']."</td>";
				  echo "<td>".$res['tarikh']."</td>";
				  echo "<td>".$res['status_permohonan']."</td>";
				  echo "<td align='center'><a href=\"senarai-borang-delete.php?id=$res[borang_id]\"onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fas fa-trash-alt\" title=\"Delete\"></i></a></td>";
			  }
			?>
		  </table>
	    <script type="text/javascript">
			const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

			const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
				v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
				)(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

			// do the work...
			document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
				const table = th.closest('table');
				Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
					.sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
					.forEach(tr => table.appendChild(tr) );
			})));
		</script>
	  </div>
    </div>
  </div>
</body>
</html>