<?php
include ('config.php');
session_start();

if(isset($_SESSION['id'])){
    header('location:admin-halaman-utama.php');
}

if(isset($_POST['logSubmit']))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$query = "SELECT * FROM admin where username='$user' AND
	password='$pass'";

	// SQL statement for checking
	$result = mysqli_query($conn,$query) or die("Query failed");

	if(mysqli_num_rows($result) <=0) 
	{
		echo "<font color = 'red'>Username atau Password yang anda masukkan adalah salah</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
	}
	else 
	{
		$admin_info = mysqli_fetch_array($result);
		$_SESSION['staff']=$admin_info['nama'];
		$_SESSION['id']=$admin_info['adminID'];
		$_SESSION['loggedin'] = true;             
		header("location:admin-halaman-utama.php");  
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sistem Pendaftaran Pelawat / Bilik Server</title>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
@import url("css/floatStyle.css");
</style>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
	
<body>
<div class="header">
  <h2><img src="img/title.png" alt="Logo"></h2>
</div><br><br>
	
<form name="form" method="post" action="admin.php" style="text-align: center">
 	Username:
 	<input name="username" type="text" autocomplete="off" required><br><br>
 	Password: &nbsp   
 	<input name="password" type="password"  required><br><br>
  <input type="submit" name="logSubmit" value="Log Masuk"><br>
</form>

<div class="footer">
	<!-- <img src="img/logo.png" width="30" height="55"> -->
	<p style=" font-size: 11px;">MAJLIS PERBANDARAN KAJANG<br>
		<a href="http://www.mpkj.gov.my/">www.mpkj.gov.my</a>
    </p>
</div>	
</body>
</html>