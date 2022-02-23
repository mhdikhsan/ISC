<?php
include "conn.php";

        $kode_prodi = $_POST['kode_prodi'];
		$nama= mysql_real_escape_string($_POST['namaprodi']);
		$visi= mysql_real_escape_string($_POST['visi']);
        $misi= mysql_real_escape_string($_POST['misi']);
		
			$sql="INSERT INTO prodi VALUES('$kode_prodi','$nama','$visi','$misi')";
			$res=mysql_query($sql) or die (mysql_error());
			
			if($res){
				echo "<script>alert('prodi berhasil di upload !',document.location.href='inputprodi.php')</script>";
			}else{
				echo "<script>alert('prodi berhasil di upload !',document.location.href='inputprodi.php')</script>";
			}
?>