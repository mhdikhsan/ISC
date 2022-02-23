<?php
include "conn.php";

        
        $kode_prodi = $_POST['kode_prodi'];
		$nama= $_POST['namaprodi'];
		$visi = $_POST['visi'];
		$misi = $_POST['misi'];
		
		
		
			$sql="UPDATE prodi SET namaprodi='$nama',visi='$visi', misi ='$misi' WHERE kode_prodi='$kode_prodi'";
			$res=mysql_query($sql) or die (mysql_error());	
		if ($res) {
			 echo "<script>alert('Data Prodi di perbaharui!',document.location.href='lihatprodi.php')</script>";
		} else {
		   echo "<script>alert('Data Prodi gagal diperbaharui !',document.location.href='lihatprodi.php')</script>";
		}
 


?>