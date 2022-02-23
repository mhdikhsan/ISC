<?php
include "conn.php";
$id = $_GET['id'];

$query = mysql_query("DELETE FROM ruangan WHERE kode_ruangan='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'lihatruangan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'lihatruangan.php'</script>";	
}
?>