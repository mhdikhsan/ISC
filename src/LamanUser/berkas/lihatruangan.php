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
	 </ul>
</header>
<div class="page-content">
<div class="padding20 bg-white" id="cell-content">
                   	<h1 class="text-light">Daftar Ruangan<span class="mif-home place-right"></span></h1>
					<hr class="thin bg-grayLighter">
					<h5 class="text-light">Sortir Berdasarkan Lantai :</h5>
					<div class ="toolbar">
					<div class="toolbar-section " id="button-group-1">
					<button class="button  small-button rounded" id ="btn1">Lantai 1</button>
					<button class="button  small-button rounded" id="btn2">Lantai 2</button>
                    <button class="button small-button rounded" id="btn3">Lantai 3</button>
					</div>
					<div class="toolbar-section">
					<a href="lihatruangan.php"><button class="button small-button cycle-button"><span class="mif-loop2"></span></button></a>
					</div>
					</div>
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
			<a href="detailruangan.php?page=edit&kd=<?php echo $data['kode_ruangan']; ?>"><button class="button small-button rounded bg-hover-blue fg-hover-white">Lihat Denah <span class="mif-location"></span></button></a>
			</center>
			</td>
		</tr>	
	<?php $no++; }?>
                </tbody>
            </table>
            <br />        
		</div>
</div>
</body>
</html>