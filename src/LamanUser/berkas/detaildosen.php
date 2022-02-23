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
       
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
    </style>
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
<div class="padding20 bg-white">
              <h1 class="text-light">Detail Dosen<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<div class="container">
					<?php
                    $query = mysql_query("SELECT * FROM dosen WHERE nip='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
					$jk = ($data['jk']=="L")?"Laki-Laki" : "Perempuan";
					if($data['kode_prodi']=="P-01"){
						$prodi = "Pendidikan Agama Islam";
					}else if($data['kode_prodi']=="P-02"){
						$prodi = "Pendidikan Bahasa Arab";
					}else if($data['kode_prodi']=="P-03"){
						$prodi = "Manajemen Pendidikan Islam";
					}else if($data['kode_prodi']=="P-04"){
						$prodi = "Pendidikan Ekonomi";
					}else if($data['kode_prodi']=="P-05"){
						$prodi = "Pendidikan Kimia";
					}else if($data['kode_prodi']=="P-06"){
						$prodi = "Pendidikan Bahasa Inggris";
					}else if($data['kode_prodi']=="P-07"){	
						$prodi = "Pendidikan Islam Anak Usia Dini";
					}else if($data['kode_prodi']=="P-08"){
						$prodi = "Pendidikan Matematika";
					}else{
						$prodi = "Pendidikan Guru Madrasah Ibtidaiyah";
					}
		switch ($data['kode_ruangan']) {
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

                    ?>
					<div>
					<table class="table border bordered block-shadow">
                    <tr>
                    <td width="150">Nama</td>
                    <td width="500"><?php echo $data['nama']; ?></td>
					<td rowspan="12" width="300">
					<div class="image-container bordered"> 	
                    <div class="frame"><img src="<?php echo $data['foto']; ?>"  style="height:400px"></div>
                    </div>
                    </div>
					</td>
                    </tr>
					<tr>
                    <td>NIP/NIK</td>
                    <td><?php echo $data['nip']; ?></td>
                    </tr>
                    <tr>
                    <td>Tempat Lahir</td>
                    <td><?php echo $data['tempat_lahir']; ?></td>
                    </tr>
                    <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo $data['tgl_lahir']; ?></td>
                    </tr>
                    <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $jk; ?></td>
                    </tr>
                    <tr>
                    <td>Jabatan</td>
                    <td><?php echo $data['jabatan']; ?></td>
                    </tr>
                    <tr>
					 <tr>
                    <td>Ruangan</td>
                    <td><a href="detailruangan.php?page=edit&kd=<?php echo $data['kode_ruangan']; ?>"><?php echo $hasil ?></a></td>
                    </tr>
					 <tr>
                    <td>Prodi</td>
                    <td><a href="detailprodi.php?page=edit&kd=<?php echo $data['kode_prodi']; ?>"><?php echo $prodi ?></a></td></td>
                    </tr>
					 <tr>
                    <td>Nomor Telepon</td>
                    <td><?php echo $data['telp']?></td>
                    </tr>
					 <tr>
                    <td>E-mail</td>
                    <td><?php echo $data['email']?></td>
                    </tr>
                    <tr>
                    <td>Alamat</td>
                    <td><?php echo $data['alamat']; ?></td>
                    </tr>
                   </table>
					</div>
					<div class="place-right">
					<a href="lihatdosen.php"><button class="button primary icon-right rounded">
					Kembali
					<span class="icon mif-arrow-right"></span>
					</button></a>
					</div>     
		</div>
</div>


</body>
</html>