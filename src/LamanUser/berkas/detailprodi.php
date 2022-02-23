<?php 
	include "conn.php";
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
            var dataTables = $('#table').DataTable({
		});
		$('#btn1').on('click', function () {
        dataTables.columns(3).search("Lantai 1").draw();
    });
	$('#btn2').on('click', function () {
        dataTables.columns(3).search("Lantai 2").draw();
    });
	$('#btn3').on('click', function () {
        dataTables.columns(3).search("Lantai 3").draw();
    });
        });
    </script>
	<script>
    $(function(){
        $("#button-group-1").group({
            groupType: 'one-state',
        });
    });
</script>
	<title> ISC Tarbiyah </title>
</head>	
<body>
<header class="app-bar fixed-top" data-role="appbar">
 <a href="../index.html"><span class="app-bar-element branding fg-white "style="padding-right:85px">ISC Tarbiyah</span ></a>
	<span class="app-bar-divider"></span>
	 <ul class="app-bar-menu">
	 <li><a href="lihatdosen.php" >Daftar Dosen</a></li>
		<li><a href="lihatruangan.php">Daftar Ruangan</a></li>
		<li><a href="lihatprodi.php">Daftar Prodi</a></li>
		<li>
                <a href="" class="dropdown-toggle">Ekstra</a>
                <ul class="d-menu" data-role="dropdown">
					<li><a href="bagan.php">Bagan Kepemimpinan</a></li>
					<li><a href="error404.php">Acara Fakultas</a></li>
                    <li class="divider"></li>
					<li><a href="" class="dropdown-toggle">Bantuan</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="error404.php">FAQs</a></li>
                        <li><a href="info.php">Tentang</a></li>
						 <li class="divider"></li>
                        <li><a href=""><span class="mif-phone"></span>Contact US</a></li>
                    </ul>
                </li>
                </ul>
            </li>
</header>
<div class="page-content">
<div class="padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Detail Prodi<span class="mif-school place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<div class="container">
					<?php
                    $query = mysql_query("SELECT * FROM prodi WHERE kode_prodi='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
					
                    ?>
					<div class="padding10">
					<table class="table border bordered block-shadow" style="text-align:justify;">
                    <tr>
                    <td width="150">Kode Prodi</td>
                    <td width="500"><?php echo $data['kode_prodi']; ?></td>
                    </tr>
					<tr>
                    <td>Nama Prodi</td>
                    <td><?php echo $data['namaprodi']; ?></td>
                    </tr>
                    <tr>
                    <td>Visi</td>
                    <td><?php echo $data['visi']; ?></td>
                    </tr>
                    <tr>
                    <td>Misi</td>
                    <td><?php echo $data['misi']; ?></td>
                    </tr>
                    <tr>
                   </table>
					</div>
					<div class="place-right">
					<a href="lihatprodi.php"><button class="button primary fg-white icon-right rounded">
					Kembali
					<span class="icon mif-arrow-right"></span>
					</button></a>
					</div>
		</div>
</div>
</body>
</html>