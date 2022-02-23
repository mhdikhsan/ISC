<?php 
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda Harus Login Terlebih dahulu !',document.location.href='../index.html')</script>";
} else {
	include "conn.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="ISC Tarbiyah">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="ikhsanmhd">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../logo2.jpg">
 <!-- Metro-UI core CSS -->
    <link href="metro/css/metro.css" rel="stylesheet">
	<link href="metro/css/metro-icons.css" rel="stylesheet">
	<link href="metro/css/metro-responsive.css" rel="stylesheet">
	<link href="metro/css/metro-schemes.css" rel="stylesheet">
	<link href="metro/css/docs.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <script src="metro/js/jquery-2.1.3.min.js"></script>
	<script src="metro/js/metro.js"></script>
	<script src="metro/js/docs.js"></script>
	<script src="metro/js/ga.js"></script>
	<script src="metro/js/jquery.dataTables.min.js"></script>
 <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>
	 <script>
        $(function(){
            $('#table').dataTable( { 'searching' : true});
        });
    </script>
	<title> ISC Tarbiyah </title>
</head>	
<body class="bg-steel">
<div>
<header class="app-bar fixed-top" data-role="appbar">
   <span class="app-bar-element branding " href="index.php" style="padding-right:85px">ISC Tarbiyah</span >
	<span class="app-bar-divider"></span>
	 <ul class="app-bar-menu">
	 <li>
	<a class="app-bar-element">
        <span id="toggle-tiles-dropdown" class="mif-apps mif-2x"></span>
        <div class="app-bar-drop-container"
                data-role="dropdown"
                data-toggle-element="#toggle-tiles-dropdown"
                data-no-close="false" style="width: 324px;">
            <div class="tile-container bg-white">
                <div class="tile-small bg-cyan">
                    <div class="tile-content iconic">
                        <span class="icon mif-onedrive"></span>
                    </div>
                </div>
                <div class="tile-small bg-yellow">
                    <div class="tile-content iconic">
                        <span class="icon mif-google"></span>
                    </div>
                </div>
                <div class="tile-small bg-red">
                    <div class="tile-content iconic">
                        <span class="icon mif-facebook"></span>
                    </div>
                </div>
                <div class="tile-small bg-green">
                    <div class="tile-content iconic">
                        <span class="icon mif-twitter"></span>
                    </div>
                </div>
            </div>
        </div>
    </a>
	</li>
	 <li>
                <a href="" class="dropdown-toggle">Input Data</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="inputdosen.php">Input Dosen</a></li>
					<li><a href="inputruangan.php">Input Ruangan</a></li>
					<li><a href="inputprodi.php">Input Prodi</a></li>
                </ul>
            </li>
			<li>
                <a href="" class="dropdown-toggle">Bantuan</a>
                <ul class="d-menu" data-role="dropdown">
					<li><a href="FAQs.php">FAQs</a></li>
					<li><a href="info.php">About</a></li>
                    <li class="divider"></li>
					<li><a href=""><span class="mif-phone"></span> Contact Us</a></li>
                </ul>
            </li>
	 </ul>
	 <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-user"></span> <?php echo $_SESSION['fullname']; ?> </span>
            <div class="app-bar-drop-container bg-white padding10 place-right block-shadow fg-blue" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h3 class="text-light"> <span class="mif-cog"> Akses Cepat</h3>
				 <hr class="thin bg-blue">
                <ul class="unstyled-list fg-dark">
                    <li class="padding10"><a a href ="#"  ><span class="mif-user"></span> Profile</a>
					</li>
                    <li class="padding10"><a href ="#" ><span class="mif-lock"> Security</a></li>
                    <li class="padding10"><a href="logout.php"><span class="mif-exit"> Exit</a></li>
                </ul>
            </div>
        </div>
		<div class="app-bar-divider place-right"></div>
		</header>
</div>

 <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.html"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
			echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<div class="page-content">
<div class="flex-grid" style="height:100%">
<div class ="row" style="min-height:100%; height:auto-size">
<div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1;height: auto-size">
					<?php 
						$tampil1=mysql_query("select * from dosen order by nama");
						$tampil2=mysql_query("select * from prodi order by namaprodi");
						$tampil3=mysql_query("select * from ruangan order by nama");
						
						
                        $user=mysql_num_rows($tampil1);
						$prodi = mysql_num_rows($tampil2);
						$ruangan = mysql_num_rows($tampil3);
                    ?>
                    <ul class="sidebar">
                        <li><a href="index.php">
                            <span class="mif-lamp icon"></span>
                            <span class="title">dashboard</span>
                        </a></li>
                        <li><a href="lihatdosen.php">
                            <span class="mif-users icon"></span>
                            <span class="title">dosen</span>
                            <span class="counter"><?php echo "$user"; ?></span>
                        </a>
						</li>
                        <li  class="active" ><a href="lihatruangan.php">
                            <span class="mif-home icon"></span>
                            <span class="title">ruangan</span>
                            <span class="counter"><?php echo "$ruangan"; ?></span>
                        </a>
						</li>
                        <li><a href="lihatprodi.php">
                            <span class="mif-school icon"></span>
                            <span class="title">prodi</span>
                            <span class="counter"><?php echo "$prodi"; ?></span>
                        </a>
						</li>
                        <li><a href="info.php">
                            <span class="mif-info icon"></span>
                            <span class="title">Info</span>
                        </a></li>
                        <li><a href="logout.php">
                            <span class="mif-exit icon"></span>
                            <span class="title">Keluar</span>
                        </a></li>
                    </ul>
                </div>
<div class="cell auto-size padding20 bg-white" id="cell-content">
					<div class="no-padding">
					<ul class="breadcrumbs2">
				<li><a href="index.php"><span class="icon mif-lamp"></span></a></li>
				<li><a href=" ">Ruangan</a></li>
				</ul>
				</div>
					 <hr class="thin bg-grayLighter">
                   <h1 class="text-light">Daftar Ruangan<span class="mif-home place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<a href="inputruangan.php"><button class="button success" ><span class="mif-plus"></span> Tambah...</button></a>
                    <hr class="thin bg-grayLighter">
					 <table id="table" class="table border hovered block-shadow" data-auto-width="false">
					<thead>
					<tr>
                    <th style="width: 60px"><center>No</center></th>
					<th><center>Kode Ruangan</center></th>
					<th><center>Nama Ruangan</center></th>
					<th><center>Lantai</center></th>
					<th><center>Aksi</center></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                     <th><center>No</center></th>
					<th><center>Kode Ruangan</center></th>
					<th><center>Nama Ruangan</center></th>
					<th><center>Lantai</center></th>
					<th><center>Aksi</center></th>
                </tr>
                </tfoot>
                <tbody>
				<?php
	$no = 1;
	$query = "SELECT * FROM ruangan order by kode_ruangan ";
	$sql = mysql_query ($query);
	while ($data = mysql_fetch_array ($sql)) {
		$kode_ruangan = $data['kode_ruangan'];
		$nama= $data['nama'];
		$lantai= $data['lantai'];
        $denah= $data['denah'];
		

		//tampilkan data dosen
	?>
		<tr>

					<td><center><?php echo $no ?></center></td>
					<td><center><?php echo $kode_ruangan ?></center></td>
                    <td><center><?php echo $nama ?></a></center></td>
                    <td><center><?php echo $lantai ?></center></td>
					
			<td> 
			<center>
			<div class="button-group">
			<a href="detailruangan.php?page=edit&kd=<?php echo $data['kode_ruangan']; ?>"><button class="button small-button rounded bg-hover-blue fg-hover-white">Lihat Denah <span class="mif-location"></span></button></a>
			<a href="editruangan.php?page=edit&kd=<?php echo $data['kode_ruangan']; ?>"><button class=" button small-button rounded bg-hover-blue fg-hover-white" data-role="hint"
				data-hint-background="bg-cyan"
				data-hint-color="fg-white"
				data-hint-mode="2"
				data-hint="Edit Button|Tekan Untuk Merubah Data" ><span class="mif-pencil icon"></span></button></a>
			<a href="delete-ruangan.php?page=delete&id=<?php echo $data['kode_ruangan']; ?>" onclick="return confirm('Anda yakin akan menghapus  <?php echo $data['nama']; ?> ?')"><button class="button small-button rounded bg-hover-blue fg-hover-white"><span class="mif-bin icon"></span></button></a>
			</div>
			</center></td>
		</tr>	
	<?php $no++; }?>
                </tbody>
            </table>
                    
		</div>
</div>
</div>
</div>
</body>
</html>