<?php
$namafolder="gambar/"; //tempat menyimpan file
include "conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $kode_ruangan = $_POST['kode_ruangan'];
		$nama= mysql_real_escape_string($_POST['nama']);
		$lantai = $_POST['lantai'];
		
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO ruangan VALUES('$kode_ruangan','$nama','$lantai','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			
			echo "<script>alert('Ruangan berhasil di input !',document.location.href='inputruangan.php')</script>";
		} else {
		  echo "<script>alert('Ruangan gagal di di input !',document.location.href='inputdosen.php')</script>";
		}
   } else {
		 echo "<script>alert('Jenis Gambar salah (jpeg,jpg,png) !',document.location.href='inputruangan.php')</script>";
   }
} else {
	echo "<script>alert('Ruangan gagal di input !',document.location.href='inputruangan.php')</script>";
}

?>