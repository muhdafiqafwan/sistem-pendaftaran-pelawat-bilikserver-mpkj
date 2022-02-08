<!DOCTYPE html>
<?php
// Initialize the session
session_start();
include_once("config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM pelawat WHERE pelawat_id=$id");

header("Location: senarai-pelawat.php");
?>