<?php
$namafolder="gambar/"; //tempat menyimpan file
include "conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $nip = $_POST['nip'];
		$nama= $_POST['nama'];
		$jk=$_POST['jk'];
        $jabatan= $_POST['jabatan'];
		$prodi = $_POST ['kode_prodi'];
		$ruangan = $_POST['kode_ruangan'];
        $tl = mysql_real_escape_string($_POST['tempat_lahir']);
		$tgl = $_POST['tgl_lahir'];
		$telp =  mysql_real_escape_string($_POST['telp']);
		$email = $_POST['email'];
        $alamat= mysql_real_escape_string($_POST['alamat']);
		$tglinput = date('Y-m-d H:i:s');
		
		$nama1 = mysql_real_escape_string($nama);
		$email1 = mysql_real_escape_string($email);
		
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO dosen(tglinput,nip,nama,tempat_lahir,tgl_lahir,jk,jabatan,kode_ruangan,kode_prodi,telp,email,alamat,foto) VALUES
            ('$tglinput','$nip','$nama1','$tl','$tgl','$jk','$jabatan','$ruangan','$prodi','$telp','$email1','$alamat','$gambar')";
			
			$res=mysql_query($sql) or die (mysql_error());
			
			echo "<script>alert('Gambar berhasil di upload !',document.location.href='inputdosen.php')</script>";
		} else {
		  echo "<script>alert('Gambar gagal di upload !',document.location.href='inputdosen.php')</script>";
		}
   } else {
		 echo "<script>alert('Jenis Gambar salah (jpeg,jpg,png) !',document.location.href='inputdosen.php')</script>";
   }
} else {
	echo "<script>alert('Gambar belum dipilih untuk diupload !',document.location.href='inputdosen.php')</script>";
}

?>