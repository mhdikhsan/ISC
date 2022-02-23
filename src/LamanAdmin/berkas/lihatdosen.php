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
        dataTables.columns(4).search("PAI").draw();
    });
	$('#btn2').on('click', function () {
        dataTables.columns(4).search("PBA").draw();
    });
	$('#btn3').on('click', function () {
        dataTables.columns(4).search("PBI").draw();
    });
	$('#btn4').on('click', function () {
        dataTables.columns(4).search("PGMI").draw();
    });
	$('#btn5').on('click', function () {
        dataTables.columns(4).search("PIAUD").draw();
    });
	$('#btn6').on('click', function () {
        dataTables.columns(4).search("PMT").draw();
    });
	$('#btn7').on('click', function () {
        dataTables.columns(4).search("PKA").draw();
    });
	$('#btn8').on('click', function () {
        dataTables.columns(4).search("PE").draw();
    });
	$('#btn9').on('click', function () {
        dataTables.columns(4).search("MPI").draw();
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
<div class="flex-grid" style="height: 100%">
<div class ="row" style="min-height:100%; height: auto-size">
<div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1;height: auto-size; ">
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
                        <li class="active"><a href="lihatdosen.php">
                            <span class="mif-users icon"></span>
                            <span class="title">dosen</span>
                            <span class="counter"><?php echo "$user"; ?></span>
                        </a>
						</li>
                        <li ><a href="lihatruangan.php">
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
		<li><a href="#">Dosen</a></li>
		</ul>
		</div>
					 <hr class="thin bg-grayLighter">
                   <h1 class="text-light">Daftar Dosen<span class="mif-users place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<a href="inputdosen.php"><button class="button alert" ><span class="mif-user-plus"></span> Tambah...</button></a>
                    <hr class="thin bg-grayLighter">
					<h5 class="text-light">Sortir Berdasarkan Prodi :</h5>
					<div class ="toolbar">
					<div class="toolbar-section " id="button-group-1">
					<button class="button  small-button rounded" id ="btn1">PAI</button>
					<button class="button  small-button rounded" id="btn2">PBA</button>
                    <button class="button small-button rounded" id="btn3">PBI</button>
					<button class="button  small-button rounded" id="btn4">PGMI</button>
					<button class="button  small-button rounded" id="btn5">PIAUD</button>
                    <button class="button  small-button rounded" id="btn6">PMT</button>
					<button class="button  small-button rounded " id="btn7">PKA</button>
					<button class="button  small-button rounded" id="btn8">PE</button>
					<button class="button  small-button rounded" id="btn9">MPI</button>
					</div>
					<div class="toolbar-section">
					<a href="lihatdosen.php"><button class="button small-button cycle-button"><span class="mif-loop2"></span></button></a>
					</div>
					</div>
					 <table id="table" class="table hovered block-shadow " data-auto-width="false"  style="text-align:center;">
					<thead>
					<tr>
                    <th><center>No</center></th>
					<th><center>Nama</center></th>
					<th><center>NIP/NIK</center></th>
					<th><center>Ruangan</center></th>
					<th><center>Prodi</center></th>
					<th><center>Aksi</center></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><center>No</center></th>
					<th><center>Nama</center></th>
					<th><center>NIP/NIK</center></th>
					<th><center>Ruangan</center></th>
					<th><center>Prodi</center></th>
					<th><center>Aksi</center></th>
                </tr>
                </tfoot>
                <tbody>
				<?php
	$no = 1;
	$query = "SELECT * FROM dosen order by nama ";
	$sql = mysql_query ($query);
	while ($data = mysql_fetch_array ($sql)) {
		$nip = $data['nip'];
		$nama = $data['nama'];
		$jabatan = $data['jabatan'];
		$ruangan = $data['kode_ruangan'];
		if($data['kode_prodi']=="P-01"){
			$prodi = "PAI";
		}else if($data['kode_prodi']=="P-02"){
			$prodi = "PBA";
		}else if($data['kode_prodi']=="P-03"){
			$prodi = "MPI";
		}else if($data['kode_prodi']=="P-04"){
			$prodi = "PE";
		}else if($data['kode_prodi']=="P-05"){
			$prodi = "PKA";
		}else if($data['kode_prodi']=="P-06"){
			$prodi = "PBI";
		}else if($data['kode_prodi']=="P-07"){	
			$prodi = "PIAUD";
		}else if($data['kode_prodi']=="P-08"){
			$prodi = "PMT";
		}else{
			$prodi = "PGMI";
		}
		
		switch ($ruangan) {
		case 'R-01' : $hasil = "Ruang Kajur MPI"; break;
		case 'R-02' : $hasil = "Ruang Kajur PMT"; break;
		case 'R-03' : $hasil = "Ruang Kajur PKA"; break;
		case 'R-04' : $hasil = "Ruang Kajur PBA"; break;
		case 'R-05' : $hasil = "Ruang Kajur PE"; break;
		case 'R-06' : $hasil = "Ruang Kajur PGMI"; break;
		case 'R-07' : $hasil = "Ruang Kajur PIAUD"; break;
		case 'R-08' : $hasil = "Ruang Kajur PBI"; break;
		case 'R-09' : $hasil = "Ruang Pendidikan Ekonomi"; break;
		case 'R-10' : $hasil = "Ruang Sekjur PKA"; break;
		case 'R-11' : $hasil = "Ruang Sekjur PBA"; break;
		case 'R-12' : $hasil = "Ruang Sekjur PGMI"; break;
		case 'R-13' : $hasil = "Ruang Sekjur PIAUD"; break;
		case 'R-14' : $hasil = "Rung Staf PBA"; break;
		case 'R-15' : $hasil = "Ruang Staf PMT"; break;
		case 'R-16' : $hasil = "Ruang FTK"; break;
		case 'R-17' : $hasil = "Ruang Sekjur PBI"; break;
		case 'R-18' : $hasil = "Ruang Sekjur MPI"; break;
		case 'R-19' : $hasil = "Ruang Sekjur PMT"; break;
		case 'R-20' : $hasil = "Ruang Sekjur PGMI"; break;
		case 'R-21' : $hasil = "Ruang Dekan"; break;
		case 'R-22' : $hasil = "Ruang Kasubag Adm. Umum"; break;
		case 'R-23' : $hasil = "Ruang Kasubag Kemhas."; break;
		case 'R-24' : $hasil = "Ruang Perencanaan dan Keuangan"; break;
		case 'R-25' : $hasil = "Ruang Sub. Bagian Umum"; break;
		case 'R-26' : $hasil = "Ruang Rapat"; break;
		case 'R-27' : $hasil = "Ruang Staff"; break;
		case 'R-28' : $hasil = "Ruang Rapat Senat"; break;
		case 'R-29' : $hasil = "Ruang Sekretarian Senat"; break;
		case 'R-30' : $hasil = "Ruang Sub. Bagian Umum 2"; break;
		case 'R-31' : $hasil = "Ruangan Wakil Dekan I"; break;
		case 'R-32' : $hasil = "Ruangan Wakil Dekan II"; break;
		case 'R-33' : $hasil = "Ruangan Wakil Dekan III"; break;
		case 'R-34' : $hasil = "Ruangan Aula FTK"; break;
		case 'R-35' : $hasil = "Ruang DPL"; break;
		case 'R-36' : $hasil = "Ruang Lab PAI"; break;
		case 'R-37' : $hasil = "Ruang Lab PMT"; break;
		case 'R-38' : $hasil = "Ruang Labor"; break;
		case 'R-39' : $hasil = "Ruang Penjamin Mutu"; break;
		case 'R-40' : $hasil = "Ruang DMS"; break;
		case 'R-41' : $hasil = "Ruang Seminar Iktibar"; break;
		case 'R-42' : $hasil = "Ruang Seminar Al-Imtihan"; break;
		default : $hasil = "none";
}

		//tampilkan data dosen
	?>
		<tr>

					<td><?php echo $no ?></td>
                    <td><a class="fg-hover-dark" href="detaildosen.php?hal=edit&kd=<?php echo $data['nip'];?>"data-role="hint"
				data-hint-background="bg-blue"
				data-hint-color="fg-white"
				data-hint-mode="2"
				data-hint="Detail Dosen|Tekan untuk melihat detail dosen"><span class="mif-user"></span> <?php echo $nama ?></a></td>
					<td><?php echo $nip ?></td>
					<td><?php echo $hasil ?></td>
					<td><?php echo $prodi ?></td>
			<td> 
			<div class="padding10 no-padding-top no-padding-bottom">
			<a href="editdosen.php?page=edit&kd=<?php echo $data['nip']; ?>"><button class=" button small-button rounded bg-hover-blue fg-hover-white" data-role="hint"
				data-hint-background="bg-cyan"
				data-hint-color="fg-white"
				data-hint-mode="2"
				data-hint="Edit Button|Tekan Untuk Merubah Data"><span class="mif-pencil icon"></span></button></a>
			<a href="delete-dosen.php?page=delete&id=<?php echo $data['nip']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Dosen <?php echo $data['nama']; ?> ?')"><button class="button small-button rounded bg-hover-blue fg-hover-white"><span class="mif-bin icon"></span></button></a>
			</div>
			</td>
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