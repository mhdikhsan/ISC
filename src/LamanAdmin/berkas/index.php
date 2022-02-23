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
		<!-- Icon -->
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
	<script src="metro/js/go.js"></script>
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
		
		 $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });
    </style>
	<style type="text/css">
	#myOverviewDiv {
    width:200px;
    height:100px;
    background-color: gray;
    z-index: 300; /* make sure its in front */
    border: solid 1px blue;
	}
</style>


	
	<title> Dashboard | ISC Tarbiyah </title>
</head>	
<body>
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
            <div class="app-bar-drop-container bg-white padding10 place-right block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h3 class="text-light"> <span class="mif-cogs"> Akses Cepat</h3>
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
<div class="flex-grid no-responsive-future" style="height: 100%;">
<div class ="row" >
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
                        <li class="active"><a href="index.php">
                            <span class="mif-lamp icon"></span>
                            <span class="title">dashboard</span>
                        </a></li>
                        <li><a href="lihatdosen.php">
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
<div class="cell auto-size  bg-white" id="cell-content">
                   <div class="presenter " data-role="presenter" data-height="220" data-easing="swing" style="height: 250px; width: 100%;">
					<div class="scene">
					<div class="act bg-darkBlue fg-white">
                        <img src="foto/uin.jpg" class="actor" data-position="10,10" style="width:250px;height: 200px; opacity: 1; position: absolute; display: block; top: 10px; left: 10px;">
                        <h2 class="actor text-light" data-position="10,300" style="opacity: 1; position: absolute; display: block; left: 300px; top: 10px;">Universitas Islam Negri Sultan Syarif Kasim Riau</h2>
                        <h3 class="actor" data-position="70,300" style="opacity: 1; position: absolute; display: block; top: 60px; left: 300px;"><i>"Menuju World Class University"</i></h3>
                        <a class="actor button bg-crimson fg-white" data-position="150,300" target="_blank" href="https://uin-suska.ac.id/" style="opacity: 1; position: absolute; display: block; top: 130px; left: 300px;">Go to HomePage</a>
                    </div>
					 <div class="act bg-steel fg-white">
                        <img src="foto/ftk.jpg" class="actor" data-position="10,10" style="width:250px;height: 200px; opacity: 1; position: absolute; display: block; left: 10px; top: 10px;">
                        <h1 class="actor text-light" data-position="10,300" style="opacity: 1; position: absolute; display: block; top: 10px; left: 300px;">Fakultas Tarbiyah dan Keguruan</h1>
                        <p class="actor align-justify" data-position="60,300" style="opacity: 1; position: absolute; display: block; left: 300px; top: 60px;">Fakultas Tarbiyah dan Keguruan (FTK) UIN Suska Riau merupakan fakultas tertua di lingkungan Universitas Islam Negeri (UIN) Suska Riau yang bertanggung jawab mempersiapkan guru-guru agama maupun umum dalam rangka mencerdaskan bangsa.</p>
                        <a class="actor button primary" data-position="150,300" href="http://siasy.uin-suska.ac.id/ftk/site/page/view/sekilas_fakultas" target="_blank" style="opacity: 1; position: absolute; display: block; top: 170px; left: 300px;">Baca Selengkapnya</a>
                    </div>
					<div class="act bg-darkGreen fg-white">
                        <img src="foto/logo2.jpg" class="actor" data-position="10,10" style="width:200px;height: 200px">
                        <h2 class="actor text-light" data-position="10,250">Information Search Center Tarbiyah</h2>
                        <p class="actor align-justify" data-position="70,250">Pelayanan Pencarian Informasi dengan Akses Mudah Meliputi : Pencarian Data Dosen, Pencarian Data Ruangan, Pencarian Data Prodi, Akses Denah, Dan Lain-lain.</p>
                        <p class="actor" data-position="130,250"><strong>Copyright &copy Muhammad Ikhsan 2017</strong></p>
                    </div>
                </div>
            </div> 
             <hr class="thin bg-grayLighter">
			 <div class="container">
			<div class="grid" style="padding-top:20px;">
			<div class="row cell2">
			<div class="cell colspan7">
			<div class="panel collapsible " data-role="panel">
			 <div class="heading bg-violet ">
			 <span class="icon bg-darkViolet"><span class="mif-loop2 mif-ani-spin"></span></span>
			<span class="title">Recent Update</span>
			</div>
			<div class="content">
			<div class="padding40 no-padding-top">
			<h3 class="text-light">Data Baru</h3>
			<div class="accordion block-shadow" data-role="accordion">
			<div class="frame">
			<div class="heading">
			Data Dosen baru
			<span class="icon mif-user"></span>
			</div>
			<div class="content"><?php
                        $tampil=mysql_query("select * from dosen order by tglinput desc limit 3");
                        while($data1=mysql_fetch_array($tampil)){
                        ?>
						<div class="listview  set-border" >
						<a href="detaildosen.php?hal=edit&kd=<?php echo $data1['nip']; ?>"><div class="list">
						<img src="<?php echo $data1['foto']; ?>" class="list-icon " >
						<span class="list-title  text-accent"><?php echo $data1['nama']; ?></span>
						
						</div></a>
					</div>
						 <?php } ?>
					<a href="inputdosen.php"><button class="button small-button alert" ><span class="mif-user-plus"></span> Tambah...</button></a></div>
			</div>
			<div class="frame">
			<div class="heading">
			Data Ruangan baru
			<span class="icon mif-home"></span>
			</div>
			<div class="content ">
			<?php
                        $tampil=mysql_query("select * from ruangan order by kode_ruangan desc limit 3");
                        while($data1=mysql_fetch_array($tampil)){
                        ?>
						<div class="listview  set-border" >
						<a href="lihatruangan.php">
						<div class="list">
						<img src="<?php echo $data1['denah']; ?>" class="list-icon">
						<span class="list-title text-accent" ><?php echo $data1['nama']; ?></span>
						
						</div></a>
					</div>
						 <?php } ?>
						 <a href="inputruangan.php"><button class="button small-button success" ><span class="mif-plus"></span> Tambah...</button></a>
					</div>
			</div>
			<div class="frame">
			<div class="heading">
			Data Prodi baru
			<span class="icon mif-school"></span>
			</div>
			<div class="content">
			<?php
                        $tampil=mysql_query("select * from prodi order by kode_prodi desc limit 3");
                        while($data1=mysql_fetch_array($tampil)){
                        ?>
						<div class="listview set-border" >
						<a href="detailprodi.php?hal=edit&kd=<?php echo $data1['kode_prodi']; ?>"><div class="list">
						<span class="mif-school list-icon"></span> 
						<span class="list-title text-accent"><?php echo $data1['namaprodi']; ?></span>
						</div></a>
						
					</div>
						 <?php } ?>
						 <a href="inputprodi.php"><button class="button small-button primary" ><span class="mif-plus"></span> Tambah...</button></a>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<div class="cell colspan4">
			<div class="panel" data-role="panel">
			 <div class="heading bg-lightTeal ">
			 <span class="icon bg-teal fg-dark"><span class="mif-vpn-publ mif-ani-ripple"></span></span>
			<span class="title fg-dark">Notification</span>
			</div>
			<div class="content" id="noti-box">
				 <?php
				 $tampil=mysql_query("select * from dosen order by tglinput desc limit 1");
				 while($data2=mysql_fetch_array($tampil)){
					 ?>
					 <div class="notify bg-steel fg-white block-shadow">
                            <span class="notify-text"> <strong><?php echo $data2['nama'];?></strong>, Telah Terdaftar Menjadi Dosen Fakultas.</span>
                      </div>
				<?php } ?>
				<?php
				 $tampil=mysql_query("select * from ruangan order by kode_ruangan desc limit 1");
				 while($data2=mysql_fetch_array($tampil)){
					 ?>
					 <div class="notify block-shadow bg-green fg-white">
                            <span class="notify-text"> <strong><?php echo $data2['nama'];?></strong>, Telah Terdaftar Menjadi Ruangan Fakultas.</span>
                      </div>
				<?php } ?>
				<?php
				 $tampil=mysql_query("select * from prodi order by kode_prodi desc limit 1");
				 while($data2=mysql_fetch_array($tampil)){
					 ?>
					 <div class="notify block-shadow bg-blue fg-white">
                            <span class="notify-text"> <strong><?php echo $data2['namaprodi'];?></strong>, Telah Terdaftar Menjadi Prodi Fakultas.</span>
                      </div>
				<?php } ?>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<hr class="thin bg-grayLighter">
			<div class="container">
			<div style="padding-top:20px; padding-bottom:20px;">
			<h3 class="fg-magenta text-light margin5">Struktur Kepemimpinan<span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
			<br />
			<div class="place-left" id="myOverviewDiv"></div>
				<div id="myDiagramDiv" style="background-color: #696969;width: 100%; height: 900px; padding-top:20px;"></div>
			</div>
			</div>
		<hr class="thin bg-grayLighter">
		<div class="container">
		<div style="padding-top:20px; padding-bottom:20px;">
		<h3 class="fg-magenta text-light margin5">Acara Fakultas <span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
		<div class="place-right" style="padding-bottom:20px;">
		 <a href="editacara.php">Edit <span class="mif-pencil"></span></a>
		</div>
		
		 <div class="streamer " data-role="streamer" data-scroll-bar="true" data-slide-to-time="10:20" >
                <div class="streams block-shadow">
                    <div class="streams-title">
                        <div class="toolbar streamer-toolbar">
                            <button class="toolbar-button js-show-all-streams" title="Show all streams"><span class="mif-event-available"></span></button>
                            <button class="toolbar-button js-schedule-mode" title="On|Off schedule mode"><span class="mif-history"></span></button>
                            <button class="toolbar-button js-go-previous-time" title="Go to previous time interval"><span class="mif-previous"></span></button>
                            <button class="toolbar-button js-go-next-time" title="Go to next time interval"><span class="mif-next"></span></button>
                        </div>
                    </div>
                    <div class="stream bg-teal">
                        <div class="stream-title">INTERNET<br/>BUSINESS</div>
                        <div class="stream-number">room 1</div>
                    </div>
                    <div class="stream bg-orange">
                        <div class="stream-title">ADVERTISING<br />ANALYST<br />SEO</div>
                        <div class="stream-number">room 2</div>
                    </div>
                    <div class="stream bg-lightBlue">
                        <div class="stream-title">STARTUPS<br/>E-COMMERCE</div>
                        <div class="stream-number">room 3</div>
                    </div>
                    <div class="stream bg-darkGreen">
                        <div class="stream-title">MOBILE<br />GAMES<br />USABILITY</div>
                        <div class="stream-number">room 4</div>
                    </div>
                    <div class="stream bg-pink">
                        <div class="stream-title">INTERNET<br />TECHNOLOGY</div>
                        <div class="stream-number">room 5</div>
                    </div>
                    <div class="stream bg-violet">
                        <div class="stream-title">MASTERS</div>
                        <div class="stream-number">room 6</div>
                    </div>
                </div>
                <div class="events">
                    <div class="events-area">
                        <div class="events-grid">
                            <div class="event-group double">
                                <div class="event-super padding20">
                                    <div>9:00 - 9:40</div>
                                    <h2 class="no-margin">Registration</h2>
                                </div>
                            </div>
                            <div class="event-group double">
                                <div class="event-super padding20">
                                    <div>9:40 - 10:20</div>
                                    <h2 class="no-margin">Keynote speech</h2>
                                    <br />
                                    <h4 class="no-margin">Aleksandr Olshanskiy</h4>
                                    <p>Imena.UA, MiroHost</p>

                                </div>
                            </div>

                            <div class="event-group">
                                <div class="event-stream" >
                                    <div class="event" data-role="tile">
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Katerina Kostereva</div>
                                                <div class="subtitle">Terrasoft</div>
                                                <div class="remark">Create and develop a business without external investment</div>
                                            </div>
                                        </div>
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:30</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Vlad Voskresensky</div>
                                                <div class="subtitle">InvisibleCRM</div>
                                                <div class="remark">Team Building in your startup: what to do and what not</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
									 <div class="event">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">11:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Tes table</div>
                                                <div class="remark">Tes in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="event-stream" >
                                    <div class="event double margin-one">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">11:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Sergey Pimenov</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Create a site with interface similar to Windows 8</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="event-stream" >
                                    <div class="event" data-role="tile" data-effect="slideDown" data-period="3000">
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Sergey Pimenov</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Create a site with interface similar to Windows 8</div>
                                            </div>
                                        </div>
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:30</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Discussion</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event double">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="event-stream" >
                                    <div class="event" data-role="tile" data-effect="slideRight" data-period="3000">
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Sergey Pimenov</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Create a site with interface similar to Windows 8</div>
                                            </div>
                                        </div>
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:30</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Discussion</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event double">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="event-stream" >
                                    <div class="event margin-one" data-role="tile" data-effect="slideDown" data-period="3000">
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Sergey Pimenov</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Create a site with interface similar to Windows 8</div>
                                            </div>
                                        </div>
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time"></div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title"></div>
                                                <div class="subtitle"></div>
                                                <div class="remark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event double">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="event-stream" >
                                    <div class="event" data-role="tile" data-effect="slideDown" data-period="3000">
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time">10:20</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Sergey Pimenov</div>
                                                <div class="subtitle">Metro UI CSS</div>
                                                <div class="remark">Create a site with interface similar to Windows 8</div>
                                            </div>
                                        </div>
                                        <div class="event-content live-slide">
                                            <div class="event-content-logo">
                                                <div class="time"></div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title"></div>
                                                <div class="subtitle"></div>
                                                <div class="remark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event">
                                        <div class="event-content">
                                            <div class="event-content-logo">
                                                <div class="time">10:40</div>
                                            </div>
                                            <div class="event-content-data">
                                                <div class="title">Round table</div>
                                                <div class="remark">Trends in mobile platforms</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
					</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
<script>			
			var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram =
      $(go.Diagram, "myDiagramDiv",  // the DIV HTML element
        {
          // Put the diagram contents at the top center of the viewport
          initialDocumentSpot: go.Spot.TopCenter,
          initialViewportSpot: go.Spot.TopCenter,
          // OR: Scroll to show a particular node, once the layout has determined where that node is
			"InitialLayoutCompleted": function(e) {
            var node = e.diagram.findNodeForKey(0);
           if (node !== null) e.diagram.commandHandler.scrollToPart(node);
          },
          layout:
            $(go.TreeLayout,  // use a TreeLayout to position all of the nodes
              {
                treeStyle: go.TreeLayout.StyleLastParents,
                // properties for most of the tree:
                angle: 90,
                layerSpacing: 80,
                // properties for the "last parents":
                alternateAngle: 0,
                alternateAlignment: go.TreeLayout.AlignmentStart,
                alternateNodeIndent: 20,
                alternateNodeIndentPastParent: 1,
                alternateNodeSpacing: 20,
                alternateLayerSpacing: 40,
                alternateLayerSpacingParentOverlap: 1,
                alternatePortSpot: new go.Spot(0.001, 1, 20, 0),
                alternateChildPortSpot: go.Spot.Left
              })
        });

    

    function theInfoTextConverter(info) {
      var str = "";
      if (info.title) str += "Jabatan: " + info.title;
      if (info.nip) str += "\n\nNIP  : " + info.nip;
    
      return str;
    }

    // define the Node template
    myDiagram.nodeTemplate =
      $(go.Node, "Auto",
        // the outer shape for the node, surrounding the Table
        $(go.Shape, "Rectangle",
          { stroke: null, strokeWidth: 0 },
                                                  /* reddish if highlighted, blue otherwise */
          new go.Binding("fill", "isHighlighted", function(h) { return h ? "#F44336" :"#5133AB"; }).ofObject()),
        // a table to contain the different parts of the node
        $(go.Panel, "Table",
          { margin: 6, maxSize: new go.Size(500, NaN) },
          // the two TextBlocks in column 0 both stretch in width
          // but align on the left side
          $(go.RowColumnDefinition,
            {
              column: 0,
              stretch: go.GraphObject.Horizontal,
              alignment: go.Spot.Left
            }),
         
         
          $(go.Picture,
            {
              row: 0, column: 1, margin: 10, width: 90, height: 100, background: "gray"
			  
             
            },
            // only set a desired size if a flag is also present:
           
            new go.Binding("source")),
			 // the name
          $(go.TextBlock,
            {
              row: 0, column: 0,
              maxSize: new go.Size(160, NaN), margin: 2, stroke: "white",
              font: '500 13px Arial, sans-serif',
              alignment: go.Spot.Top
            },
            new go.Binding("text", "name")),
          // the additional textual information
          $(go.TextBlock,
            {
              row: 1, column: 0, columnSpan: 2, stroke: "white",
              font: "12px Roboto, sans-serif"
            },
            new go.Binding("text", "", theInfoTextConverter))
        )  // end Table Panel
      );  // end Node

    // define the Link template, a simple orthogonal line
    myDiagram.linkTemplate =
      $(go.Link, go.Link.Orthogonal,
        { corner: 5, selectable: false },
        $(go.Shape, { strokeWidth: 3, stroke: "#424242" } ));  // dark gray, rounded corner links

	<?php
					//query dekan
                    $query1 = mysql_query("SELECT * FROM dosen WHERE jabatan='Dekan'");
					$query2 = mysql_query("SELECT * FROM dosen WHERE jabatan='Wakil Dekan I'");
					$query3 = mysql_query("SELECT * FROM dosen WHERE jabatan='Wakil Dekan II'");
					$query4 = mysql_query("SELECT * FROM dosen WHERE jabatan='Wakil Dekan III'");
					//query kajur
					$query5 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-01'");
					$query6 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-02'");
					$query7 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-03'");
					$query8 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-04'");
					$query9 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-05'");
					$query10 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-06'");
					$query11 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-07'");
					$query12 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-08'");
					$query13 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua Jurusan' and kode_prodi='P-09'");
					//query sekjur
					$query14 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-01'");
					$query15 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-02'");
					$query16 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-03'");
					$query17 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-04'");
					$query18 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-05'");
					$query19 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-06'");
					$query20 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-07'");
					$query21 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-08'");
					$query22 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris Jurusan' and kode_prodi='P-09'");
					//query kepala
					 $query23 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Bahasa'");
					 $query24 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Komputer dan Internet'");
					 $query25 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Kewirausahaan'");
					 $query26 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Pendidikan Kimia'");
					 $query27 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Micro Teaching'");
					 $query28 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Matematika'");
					 $query29 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor PGMI'");
					 $query30 = mysql_query("SELECT * FROM dosen WHERE jabatan='Kepala Labor Micro Konseling'");
					 $query31 = mysql_query("SELECT * FROM dosen WHERE jabatan='Ketua KPM'");
					 $query32 = mysql_query("SELECT * FROM dosen WHERE jabatan='Sekretaris KPM'");
					 
					// pimpinan atas
                    $dekan = mysql_fetch_array($query1);
					$wd1   = mysql_fetch_array($query2);
					$wd2   = mysql_fetch_array($query3);
					$wd3   = mysql_fetch_array($query4);
					//ketua jurusan
					$kj1 = mysql_fetch_array($query5);
					$kj2 = mysql_fetch_array($query6);
					$kj3 = mysql_fetch_array($query7);
					$kj4 = mysql_fetch_array($query8);
					$kj5 = mysql_fetch_array($query9);
					$kj6 = mysql_fetch_array($query10);
					$kj7 = mysql_fetch_array($query11);
					$kj8 = mysql_fetch_array($query12);
					$kj9 = mysql_fetch_array($query13);
					//sekjur
					$sj1 = mysql_fetch_array($query14);
					$sj2 = mysql_fetch_array($query15);
					$sj3 = mysql_fetch_array($query16);
					$sj4 = mysql_fetch_array($query17);
					$sj5 = mysql_fetch_array($query18);
					$sj6 = mysql_fetch_array($query19);
					$sj7 = mysql_fetch_array($query20);
					$sj8 = mysql_fetch_array($query21);
					$sj9 = mysql_fetch_array($query22);
					//kepala
					$kpl1 = mysql_fetch_array($query23);
					$kpl2 = mysql_fetch_array($query24);
					$kpl3 = mysql_fetch_array($query25);
					$kpl4 = mysql_fetch_array($query26);
					$kpl5 = mysql_fetch_array($query27);
					$kpl6 = mysql_fetch_array($query28);
					$kpl7 = mysql_fetch_array($query29);
					$kpl8 = mysql_fetch_array($query30);
					$kpl9 = mysql_fetch_array($query31);
					$kpl10 = mysql_fetch_array($query32);
                    ?>		
    // set up the nodeDataArray, describing each person/position
    var nodeDataArray = [
      { key: 0, name:"<?php echo $dekan['nama']?>", source: "<?php echo $dekan['foto']?>", title: "Dekan Fakultas", nip: "<?php echo $dekan['nip']?>" },
	  { key: 1, boss: 0, name: "<?php echo $wd1['nama']?>", source: "<?php echo $wd1['foto']?>", title: "Wakil Dekan I", nip: "<?php echo $wd1['nip']?>" },
	   { key: 2, boss: 0, name: "<?php echo $wd2['nama']?>", source: "<?php echo $wd2['foto']?>", title: "Wakil Dekan II", nip: "<?php echo $wd2['nip']?>" },
	   { key: 4, boss: 0, name: "<?php echo $wd3['nama']?>", source: "<?php echo $wd3['foto']?>", title: "<?php echo $wd3['jabatan']?>", nip: "<?php echo $wd3['nip']?>" },
	   { key: 7, boss: 4, name: "<?php echo $kj1['nama']?>", source: "<?php echo $kj1['foto']?>", title: "Ketua Jurusan PAI", nip: "<?php echo $kj1['nip']?>" },
	   { key: 26, boss: 7, name: "<?php echo $sj1['nama']?>", source: "<?php echo $sj1['foto']?>", title: "Sekretaris Jurusan PAI", nip: "<?php echo $sj1['nip']?>" },
	   { key: 8, boss: 4, name: "<?php echo $kj2['nama']?>", source: "<?php echo $kj2['foto']?>", title: "Ketua Jurusan PBA", nip: "<?php echo $kj2['nip']?>" },
	   { key: 27, boss: 8, name: "<?php echo $sj2['nama']?>", source: "<?php echo $sj2['foto']?>", title: "Sekretaris Jurusan PBA", nip: "<?php echo $sj2['nip']?>" },
	   { key: 9, boss: 4, name: "<?php echo $kj3['nama']?>", source: "<?php echo $kj3['foto']?>", title: "Ketua Jurusan MPI", nip: "<?php echo $kj3['nip']?>" },
	   { key: 28, boss: 9, name: "<?php echo $sj3['nama']?>", source: "<?php echo $sj3['foto']?>", title: "Sekretaris Jurusan MPI", nip: "<?php echo $sj3['nip']?>" },
	   { key: 10, boss: 4, name: "<?php echo $kj4['nama']?>", source: "<?php echo $kj4['foto']?>", title: "Ketua Jurusan PE", nip: "<?php echo $kj4['nip']?>" },
	   { key: 29, boss: 10, name: "<?php echo $sj4['nama']?>", source: "<?php echo $sj4['foto']?>", title: "Sekretaris Jurusan PE", nip: "<?php echo $sj4['nip']?>" },
	   { key: 11, boss: 4, name: "<?php echo $kj5['nama']?>", source: "<?php echo $kj5['foto']?>", title: "Ketua Jurusan PKA", nip: "<?php echo $kj5['nip']?>" },
	   { key: 30, boss: 11, name: "<?php echo $sj5['nama']?>", source: "<?php echo $sj5['foto']?>", title: "Sekretaris Jurusan PKA", nip: "<?php echo $sj5['nip']?>" },
	   { key: 12, boss: 4, name: "<?php echo $kj6['nama']?>", source: "<?php echo $kj6['foto']?>", title: "Ketua Jurusan PBI", nip: "<?php echo $kj6['nip']?>" },
	   { key: 31, boss: 12, name: "<?php echo $sj6['nama']?>", source: "<?php echo $sj6['foto']?>", title: "Sekretaris Jurusan PBI", nip: "<?php echo $sj6['nip']?>" },
	   { key: 13, boss: 4, name: "<?php echo $kj7['nama']?>", source: "<?php echo $kj7['foto']?>", title: "Ketua Jurusan PIAUD", nip: "<?php echo $kj7['nip']?>" },
	   { key: 32, boss: 13, name: "<?php echo $sj7['nama']?>", source: "<?php echo $sj7['foto']?>", title: "Sekretaris Jurusan PIAUD", nip: "<?php echo $sj7['nip']?>" },
	   { key: 14, boss: 4, name: "<?php echo $kj8['nama']?>", source: "<?php echo $kj8['foto']?>", title: "Ketua Jurusan PMT", nip: "<?php echo $kj8['nip']?>" },
	   { key: 33, boss: 14, name: "<?php echo $sj8['nama']?>", source: "<?php echo $sj8['foto']?>", title: "Sekretaris Jurusan PMT", nip: "<?php echo $sj8['nip']?>" },
	   { key: 15, boss: 4, name: "<?php echo $kj9['nama']?>", source: "<?php echo $kj9['foto']?>", title: "Ketua Jurusan PGMI", nip: "<?php echo $kj9['nip']?>" },
	   { key: 34, boss: 15, name: "<?php echo $sj9['nama']?>", source: "<?php echo $sj9['foto']?>", title: "Sekretaris Jurusan PGMI", nip: "<?php echo $sj9['nip']?>" },
	   { key: 16, boss: 4, name: "<?php echo $kpl1['nama']?>", source: "<?php echo $kpl1['foto']?>", title: "Kepala Labor Bahasa", nip: "<?php echo $kpl1['nip']?>" },
	   { key: 17, boss: 4, name: "<?php echo $kpl2['nama']?>", source: "<?php echo $kpl2['foto']?>", title: "Kepala Labor Komputer dan Internet", nip: "<?php echo $kpl2['nip']?>" },
	   { key: 18, boss: 4, name: "<?php echo $kpl3['nama']?>", source: "<?php echo $kpl3['foto']?>", title: "Kepala Labor Kewirausahaan", nip: "<?php echo $kpl3['nip']?>" },
	   { key: 19, boss: 4, name: "<?php echo $kpl4['nama']?>", source: "<?php echo $kpl4['foto']?>", title: "Kepala Labor Pendidikan Kimia", nip: "<?php echo $kpl4['nip']?>" },
	   { key: 20, boss: 4, name: "<?php echo $kpl5['nama']?>", source: "<?php echo $kpl5['foto']?>", title: "Kepala Labor Micro Teaching", nip: "<?php echo $kpl5['nip']?>" },
	   { key: 21, boss: 4, name: "<?php echo $kpl6['nama']?>", source: "<?php echo $kpl6['foto']?>", title: "Kepala Labor Matematika", nip: "<?php echo $kpl6['nip']?>" },
	   { key: 22, boss: 4, name: "<?php echo $kpl7['nama']?>", source: "<?php echo $kpl7['foto']?>", title: "Kepala Labor PGMI", nip: "<?php echo $kpl7['nip']?>" },
	   { key: 23, boss: 4, name: "<?php echo $kpl8['nama']?>", source: "<?php echo $kpl8['foto']?>", title: "Kepala Labor Micro Konseling", nip: "<?php echo $kpl8['nip']?>" },
	   { key: 24, boss: 4, name: "<?php echo $kpl9['nama']?>", source: "<?php echo $kpl9['foto']?>", title: "Ketua KPM", nip: "<?php echo $kpl9['nip']?>" },
	   { key: 25, boss: 4, name: "<?php echo $kpl10['nama']?>", source: "<?php echo $kpl10['foto']?>", title: "Sekretaris KPM", nip: "<?php echo $kpl10['nip']?>" },
	  
	   
      
    ];

    // create the Model with data for the tree, and assign to the Diagram
    myDiagram.model =
      $(go.TreeModel,
        { nodeParentKeyProperty: "boss",  // this property refers to the parent node data
          nodeDataArray: nodeDataArray });

    // Overview
    myOverview =
      $(go.Overview, "myOverviewDiv",  // the HTML DIV element for the Overview
        { observed: myDiagram, contentAlignment: go.Spot.Center });   // tell it which Diagram to show and pan
  
    </script>
</body>

</html>