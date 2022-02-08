<!DOCTYPE html>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:admin.php");
    exit;
}
?>
<html>
<head>
<title>Halaman Utama</title>
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
  <a href="admin-halaman-utama.php" style="background-color: #3B619C">Halaman Utama</a>
  <a href="senarai-pelawat.php">Senarai Pelawat</a>
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
	  <h2 align="center">BAHAGIAN TEKNOLOGI MAKLUMAT MPKJ</h2>
	  <div style="text-align: center">
		<img src="img/logo.png" width="171" height="290">
	  </div>
    </div>
  </div>
</body>
</html>
</body>