<?php
$namafolder="gambar/"; //tempat menyimpan file

include "conn.php";

        $jenis_gambar=$_FILES['nama_file']['type'];
        $nip = $_POST['nip'];
		$nama= mysql_real_escape_string($_POST['nama']);
		$jk=$_POST['jk'];
        $jabatan= $_POST['jabatan'];
		$prodi = $_POST ['kode_prodi'];
		$ruangan = $_POST['kode_ruangan'];
        $tl = mysql_real_escape_string($_POST['tempat_lahir']);
		$tgl = $_POST['tgl_lahir'];
		$telp =  $_POST['telp'];
		$email = mysql_real_escape_string($_POST['email']);
        $alamat=mysql_real_escape_string($_POST['alamat']);		
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);	
		
			if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE dosen SET nama='$nama', jk='$jk', jabatan='$jabatan', kode_prodi='$prodi', kode_ruangan='$ruangan', 
			tempat_lahir='$tl', tgl_lahir='$tgl',telp='$telp',email='$email', alamat='$alamat', foto='$gambar' WHERE nip='$nip'";
			$res=mysql_query($sql) or die (mysql_error());	
			 echo "<script>alert('Data Dosen di perbaharui!',document.location.href='lihatdosen.php')</script>";
		} else {
		   echo "<script>alert('Data Dosen gagal diperbaharui / Foto belum dipilh !',document.location.href='lihatdosen.php')</script>";
		}
 


?>