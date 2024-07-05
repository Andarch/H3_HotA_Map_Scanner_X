<?php
header('Content-Type: text/html; charset=utf-8');

require_once 'fun/mi.php';
require_once 'fun/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Heroes III Map Scanner</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
    <link rel="shortcut icon" href="css/img/heroes.png" type="image/x-icon" />
    <!-- <link type="text/css" rel="stylesheet" media="all" href="css/heroesmaps.css	" /> -->
    <script type="application/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="application/javascript" src="js/jquery-ui.js"></script>
    <script type="application/javascript" src="js/mapread.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="application/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
    <script type="application/javascript" src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<style>

	@font-face {
		font-family: 'Komet';
		src: url('fonts/Komet Bold SC.woff') format('woff');
	}

	body { background: #333; font-family: calibri, arial, sans-serif; }
	table { border-collapse: collapse; margin: 1em; border: solid 3px #aaa; }
	th, td {border: solid 1px #aaa; min-width: 1em; padding: 6px; }
	th { color: #fcf4ad; background: #555; font-family: 'Komet', calibri, arial, sans-serif; border-bottom: solid 3px #aaa; border-right: solid 3px #aaa; }
	td { border-right: solid 3px #aaa; }
	.ar { text-align:right; }
	.ac { text-align:center; }
	.al { text-align:left; }
	.mc { margin: 1em; }

	a, a:visited { color: #29fff1; text-decoration: none; background-color: transparent }
	a:hover { text-decoration: underline; }

	.smalltable { font-size: 11px; }
	.mediumtable { font-size: 14px; }
	.bigtable { font-size: 16px; }
	.bigtable th { font-size: 18px; }
	.bigtable td { font-size: 16px; }
	.containertable { vertical-align:top; border:none; margin:0; padding:0; }
	.colw100 { width: 100px; }
	.colA { width: 30%; }

	body, table { color: #ddd; }

	.sidebarTop {
		margin: 0;
		padding: 16px 0px;
		width: 250px;
		background-color: #444;
		position: fixed;
		left: 0px;
		top: 0px;
		height: 50px;
		overflow: auto;
		color: #ddd;
		font-family: 'Komet', calibri, arial, sans-serif;
		font-size: 16px;
		text-align: center;
	}

	.sidebarMain {
		margin: 0;
		padding: 0;
		width: 250px;
		background-color: #444;
		position: fixed;
		left: 0px;
		top: 50px;
		height: 100%;
		overflow: auto;
		color: #ddd;
		font-size: 22px;
	}

	.sidebarMain a {
		display: block;
		color:  #ddd;
		padding: 0px 10px 4px 10px;
		text-decoration: none;
		font-weight: bold;
	}

	.sidebarMain a.selected {
    	background-color: #666;
	}

	.sidebarMain a.active {
		color: #ddd;
		background-color: #5e4b00;
	}

	.sidebarMain a:hover:not(.active) {
		background-color: #888;
		color: #ddd;
	}

	.content {
		position: absolute;
		left: 250px;
		padding: 0px 20px 0px 20px;
	}

	.rowheader {
		background: #444;
		font-weight: bold;
		text-align: center;
		/* color: #fbf08a; */
	}

	.rowheaderLarge1 {
		background: #451713;
		font-weight: bold;
		text-align: left;
		padding-left: 8px;
		font-size: 18px;
	}

	.rowheaderLarge2 {
		background: #3a1345;
		font-weight: bold;
		text-align: left;
		padding-left: 8px;
		font-size: 18px;
	}

	.h3DataTable {
		border-collapse: collapse !important;
		box-sizing: border-box !important;
		font-size: 14px !important;
		margin-bottom: 20px !important;
	}

	.h3DataTable td,
	.h3DataTable th {
		padding: 5px !important;
		border: solid 1px #ddd !important;
		box-sizing: border-box !important;
	}

	.h3DataTable th {
		padding: 5px 16px !important;
	}

	#objectsTable_filter input,
	#townDetailsTable_filter input {
		background-color: #222 !important;
		color: #ddd !important;
	}

	#objectsTable_filter,
	#townDetailsTable_filter {
		color: grey !important;
		margin: 10px 0px !important;
		font-size: 14px !important;
		float: left !important;
	}

	.color1 { background: #ff0000; padding: 0px 6px; border-radius:5px; } /* red */
	.color2 { background: #3152ff; padding: 0px 6px; border-radius:5px; } /* blue */
	.color3 { background: #9c7352; padding: 0px 6px; border-radius:5px; } /* tan */
	.color4 { background: #429429; padding: 0px 6px; border-radius:5px; } /* green */
	.color5 { background: #ff8400; padding: 0px 6px; border-radius:5px; } /* orange */
	.color6 { background: #8c29a5; padding: 0px 6px; border-radius:5px; } /* purple */
	.color7 { background: #089ca5; padding: 0px 6px; border-radius:5px; } /* teal */
	.color8 { background: #c67b8c; padding: 0px 6px; border-radius:5px; } /* pink */
	.color256 { background: #848484; padding: 0px 6px; border-radius:5px; } /* neutral */

</style>
</head>
<body>
	<div class="sidebarTop">
		<span style="background-color: #444;">
			<a href="mapscan.php?scan=1">Scan</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="mapindex.php">Map List</a>
		</span>
		<br />
</div>
<?php

require_once 'fun/h3mapscan.php';
require_once 'fun/h3mapconstants.php';
require_once 'fun/mapsupport.php';



$mapok = false;
$buildmap = true;
$mapfiledb = false;
$mapid = intval(exget('mapid', 0));

$scan = exget('scan');

$mapcode = exget('mapcode');
$disp = '';

if($mapid) {
	if(exget('del')) {
		$sql = "DELETE FROM heroes3_maps WHERE idm = $mapid";
		mq($sql);
	}
	else {
		$sql = "SELECT m.mapfile FROM heroes3_maps AS m WHERE m.idm = $mapid";
		$mapfiledb = mgr($sql);
	}
}
elseif($scan) {
	echo '<div class="content">';

	$scan = new ScanSubDir();
	$scan->SetFilter(array('h3m'));
	$scan->scansubdirs(MAPDIR);
	$files = $scan->GetFiles();


	if(!empty($files)) {
		echo 'Maps in folder which are not saved and scanned yet<br /><br />';

		$displayed = 0;
		$maplist = '';
		$maplistjs = array();

		$mapdbs = array();
		$sql = "SELECT m.mapfile, m.idm FROM heroes3_maps AS m";
		$query = mq($sql);
		while($res = mfa($query)) {
			$mapdbs[$res['idm']] = $res['mapfile'];
		}

		foreach($files as $k => $mfile) {
			$mapname = str_replace(MAPDIR, '', $mfile);
			$par = base64_encode($mapname);
			if($mapcode == $par) {
				$disp = $mapname.'<br />';
				//continue;
			}

			$smapname = mes($mapname);

			if(in_array($mapname, $mapdbs)) {
				continue;
			}

			$maplistjs[] = $smapname;

			$maplist .= ($k + 1).' <a href="?mapcode='.$par.'">'.$mapname.'</a><br />';
			$displayed++;
		}

		if($displayed == 0) {
			echo 'There are no maps to proccess in map folder. You can go to <a href="mapindex.php">Map List</a><br /><br />';
		}
		else {
			echo '<a href="saveall" id="mapread" onclick="return false;">Read and save all maps</a><br />';
			echo 'Total unsaved maps: '.count($maplistjs);
			if(!exget('nl', 0)) {
				echo '<p>'.$maplist.'</p>';
			}
			echo '<p id="mapreadstate"></p>';
			echo '<p id="maplist"></p>';
			echo '<script type="text/javascript">'.EOL.'var maplist = ['.EOL.TAB.'"'.implode('",'.EOL.TAB.'"', $maplistjs).'"'.EOL.']'.EOL.'</script>';
		}

	}

	echo '</div>';
}

if($mapfiledb) {
	$mapfile = MAPDIR.$mapfiledb;
	$mapok = true;
}
elseif($mapcode) {
	$mapok = true;
	$mapfile = MAPDIR.base64_decode($mapcode);
}

//read some maps only
if($mapok) {
	echo $disp;
	$tm = new TimeMeasure();

	/*
	H3M_WEBMODE
	H3M_PRINTINFO
	H3M_BUILDMAP
	H3M_SAVEMAPDB
	H3M_EXPORTMAP
	H3M_BASICONLY
	H3M_MAPHTMCACHE
	H3M_SPECIALACCESS
	*/

	$map = new H3MAPSCAN($mapfile, H3M_WEBMODE | H3M_PRINTINFO | H3M_BUILDMAP); // | H3M_BUILDMAP | H3M_SAVEMAPDB | H3M_MAPHTMCACHE
	$map->ReadMap();

	//$tm->Measure('End');
	//$tm->showTimes();
}

?>
<script type="text/javascript">
$(document).ready(function() {
    var objectsTable = $('#objectsTable').DataTable({
        "paging": false,
        "info": false,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
        "initComplete": function(settings, json) {
			new $.fn.dataTable.FixedHeader(this.api());
		}
    });

    var townDetailsTable = $('#townDetailsTable').DataTable({
        "paging": false,
        "info": false,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
        "initComplete": function(settings, json) {
			new $.fn.dataTable.FixedHeader(this.api());
		}
    });
});
</script>
</body>
</html>
