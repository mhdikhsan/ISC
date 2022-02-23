<?php
include "conn.php";
$id = $_GET['id'];

$query = mysql_query("DELETE FROM dosen WHERE nip='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'lihatdosen.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'lihatdosen.php'</script>";	
}
?>