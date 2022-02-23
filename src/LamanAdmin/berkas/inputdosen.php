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
	<script src="metro/js/select2.min.js"></script>
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
	<script type="text/javascript">

				function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
				};

				</script>
	<title> ISC Tarbiyah </title>
</head>	
<body>
<div>
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
		<li><a href="lihatdosen.php">Dosen</a></li>
		<li><a href="#">Input Dosen</a></li>
		</ul>
		</div>
					 <hr class="thin bg-grayLighter">
                    <h1 class="text-light">Input Dosen<span class="mif-user-plus place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<div class="container">
					<form action="insertdosen.php" method="post" enctype="multipart/form-data" data-role="validator" data-hint-mode="line"
					data-hint-background="bg-red" data-hint-color="fg-white " data-hide-error="5000">
						<table>
			<tr>
				<td width="200" class="text-light">NIP/NIK</td>
				<td><div class="input-control text full-size">
				<input data-validate-func="required"
						data-validate-hint="Kolom ini masih kosong!" 
						type="text" name="nip" id="nip" placeholder ="NIP Dosen" />
						<span class="input-state-error mif-warning"></span>
						<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">Nama</td>
				<td><div class="input-control text full-size">
				<input
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				type="text" name="nama" id="nama" placeholder = "Nama Dosen">
						<span class="input-state-error mif-warning"></span>
						<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class ="text-light">Jenis Kelamin</td>
				<td>
				<label class="input-control radio small-check">
				<input type="radio" name="jk" value="L" checked>
				<span class="check"></span>
				<span class="caption text-light">Laki-Laki</span>
				</label>
				<label class="input-control radio small-check">
				<input type="radio" name="jk" value="P">
				<span class="check"></span>
				<span class="caption text-light">Perempuan</span>
				</label>
				</td>
			</tr>
			<tr>
				<td class="text-light">Jabatan</td>
				<td><div class="input-control text full-size">
				<input 
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				type="text" name="jabatan" id="jabatan" placeholder = "Jabatan Dosen">
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">Prodi</td>
				<td>
				 <div class="input-control full-size required" data-role="select" data-placeholder="Pilih Prodi" data-allow-clear="true">
                            <select class="full-size" data-validate-func="required" name="kode_prodi">
                                <option></option>
                                <?php $query = "SELECT * FROM prodi order by kode_prodi";
								$sql = mysql_query ($query);
								while ($data = mysql_fetch_array ($sql)) {
								$kp = $data['kode_prodi'];
								$nama = $data['namaprodi'];
								?>
								<option value="<?php echo $kp ?>"><?php echo $nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
				</td>
			</tr>
			<tr>
				<td class="text-light">Ruangan</td>
				<td>
				<div class="input-control full-size required" data-role="select" data-placeholder="Pilih Ruangan" data-allow-clear="true">
                            <select class="full-size" data-validate-func="required" name="kode_ruangan">
							<option></option>
							<?php $query = "SELECT * FROM ruangan order by kode_ruangan ";
								$sql = mysql_query ($query);
								while ($data = mysql_fetch_array ($sql)) {
								$kr = $data['kode_ruangan'];
								$nama = $data['nama'];
								?>
								<option value="<?php echo $kr ?>"><?php echo $nama ?></option>
								
                                <?php } ?>
                            </select>
                        </div>
				</td>
			</tr>
			<tr>
				<td class="text-light">Tempat Lahir</td>
				<td><div class="input-control text full-size">
				 <input
				 data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				 type="text" name="tempat_lahir" id ="tempat_lahir" placeholder="Tempat Lahir Dosen"/>
					<span class="input-state-error mif-warning"></span>
					<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">Tanggal Lahir</td>
				<td><div class="input-control text required" data-role="datepicker" data-format="dd-mm-yyyy">
				<input
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				type="text" name = "tgl_lahir" id ="tgl_lahir" placeholder="dd-mm-yyyy">
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				<button class="button"
				data-role="hint"
				data-hint-background="bg-red"
				data-hint-color="fg-white"
				data-hint-mode="2"
				data-hint="Date Picker|Tekan untuk mode date picker"
				><span class="mif-calendar"></span></button>
				<script>
				$(function(){
				$("#datepicker").datepicker();
					});
				</script>
					
				</div>
				</td>
			</tr>
			<tr>
				<td class="text-light">Telepon</td>
				<td><div class="input-control text full-size required">
				<input 
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				type="text" name="telp" id="telp" placeholder = "+62-8**-****-****">
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">E-mail</td>
				<td><div class="input-control text full-size required">
				<input 
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!" 
				type="text" name="email" id="email" placeholder = "nama@email.com">
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">Alamat</td>
				<td><div class="input-control textarea required"><textarea
				data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!"
				name="alamat" id="alamat" cols="40" rows="4" placeholder="Masukkan Alamat Dosen"></textarea>
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				</div></td>
			</tr>
			<tr>
				<td class="text-light">Foto</td>
				<td><div class="input-control file required " data-role="input">
				<input data-validate-func="required"
				data-validate-hint="Kolom ini masih kosong!"  id="uploadImage" type="file" name ="nama_file" id="nama_file" placeholder="Pilih Foto" onchange="PreviewImage();"
				>
				<span class="input-state-error mif-warning"></span>
				<span class="input-state-success mif-checkmark"></span>
				<button class="button"
				data-role="hint"
				data-hint-background="bg-red"
				data-hint-color="fg-white"
				data-hint-mode="2"
				data-hint="Browse File|Tekan untuk browse foto"
				><span class="mif-folder"></span></button>
				</div>
				<br>
				<div class="image-container bordered"> 
				<div class="frame"><img id="uploadPreview" style="width: 150px; height: 150px;"></div>
				</div>

			</tr>
			<tr>
				<td>&nbsp;&nbsp;</td>
				<td><div class="form-actions" >
                <button class="button small-button image-button primary fg-white icon-right">
				Simpan
				<span class="icon mif-floppy-disk mif-2x bg-blue"></span>
				</button>
                <a href = ""><button type="reset" class="button link fg-gray ">Reset</button></a>
            </div></td>
			</tr>
		
        
		</table>
					</form>
					</div>        
		</div>
	</div>
</div>
</div>
</body>
</html>