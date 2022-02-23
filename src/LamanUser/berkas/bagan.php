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
					<li><a href="info.php">Acara Fakultas</a></li>
                    <li class="divider"></li>
					<li><a href="" class="dropdown-toggle">Bantuan</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="FAQs.php">FAQs</a></li>
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
                   <h1 class="text-light">Bagan Kepemimpinan <span class="mif-tree place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<div class="place-left" id="myOverviewDiv"></div>
					<div id="myDiagramDiv" style="background-color: #696969;width: 100%; height: 900px; padding-top:20px;"></div>
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