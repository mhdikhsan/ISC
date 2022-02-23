<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$q = mysql_query("select * from admin where username='$username' and password='$password'");
$row = mysql_fetch_array ($q);

if (mysql_num_rows($q) == 1) {
    $_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $username;
	$_SESSION['fullname'] = $row['fullname'];	

	header('location:index.php');
} else {
	echo "<script>alert('Username atau Password Salah !',document.location.href='../index.html')</script>";
	
	
}
?>