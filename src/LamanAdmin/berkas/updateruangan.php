<?php
$namafolder="gambar/"; //tempat menyimpan file

include "conn.php";

        $jenis_gambar=$_FILES['nama_file']['type'];
        $kode_ruangan = $_POST['kode_ruangan'];
		$nama= $_POST['nama'];
		$lantai = $_POST['lantai'];
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);	
		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE ruangan SET nama='$nama', lantai='$lantai', denah='$gambar' WHERE kode_ruangan='$kode_ruangan'";
			$res=mysql_query($sql) or die (mysql_error());	
		 echo "<script>alert('Data Ruangan di perbaharui!',document.location.href='lihatruangan.php')</script>";
		} else {
		   echo "<script>alert('Data Ruangan gagal diperbaharui / Gambar belum dipilh !',document.location.href='lihatruangan.php')</script>";
		}
 


?>