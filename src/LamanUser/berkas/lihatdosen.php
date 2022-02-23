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
	<link rel="icon" href="img/logo2.jpg">
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
		.bgimg {
		background-image: url('foto/books2.jpg');
		min-height: 100%;
		background-position: center;
		background-size: cover;
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
<body>
<div>
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
</div>
<div class="page-content">
<div class="padding20 bg-white" id="cell-content">
                   <h1 class="text-light">Daftar Dosen<span class="mif-users place-right"></span></h1>
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
					 <hr class="thin bg-grayLighter">
					 <table id="table" class="table hovered block-shadow " data-auto-width="false"  style="text-align:center;">
					<thead>
					<tr>
                    <th><center>No</center></th>
					<th><center>Nama</center></th>
					<th><center>NIP/NIK</center></th>
					<th><center>Jenis Kelamin</center></th>
					<th><center>Prodi</center></th>
					<th><center>Ruangan</center></th>
					
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><center>No</center></th>
					<th><center>Nama</center></th>
					<th><center>NIP/NIK</center></th>
					<th><center>Jenis Kelamin</center></th>
					<th><center>Prodi</center></th>
					<th><center>Ruangan</center></th>
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
		if($data['jk']=="L"){
			$jk = "Laki-Laki";
		}else{
			$jk = "Perempuan";
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
					<td><?php echo $jk ?></td>
					<td><?php echo $prodi ?></td>
					<td><?php echo $hasil ?></td>
					
		</tr>	
	<?php $no++; }?>
                </tbody>
            </table>
            <br/>        
		</div>
</div>


</body>
</html>