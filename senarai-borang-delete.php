<!DOCTYPE html>
<?php
// Initialize the session
session_start();
include_once("config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM borang WHERE borang_id=$id");

header("Location: senarai-borang.php");
?>