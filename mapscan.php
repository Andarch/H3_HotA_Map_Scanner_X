<?php
// Prevent caching
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: text/html; charset=utf-8');

require_once 'src/mi.php';
require_once 'src/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>H3 HotA Map Scanner X</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
    <link rel="shortcut icon" href="images/hotaicon.png" type="image/x-icon" />
    <script type="application/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="application/javascript" src="js/jquery-ui.js"></script>
    <script type="application/javascript" src="js/mapread.js"></script>
<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	:root {
		--total-width: 2195.43px;

		--sidebar-width: 250px;
		--sidebar-top-height: 60px;
		--sidebar-color: #555;

		--sidebar-border-width: 4px;
		--sidebar-border-color: #aaa;
		--sidebar-border-style: solid;

		--hrule1-border-color: #999;
		--hrule1-border-thickness: 8px;
		--hrule1-border-style: double;

		--hrule2-border-color: #777;
		--hrule2-border-thickness: 1.25px;
		--hrule2-border-style: groove;

		--flex-gap: 1.5em;

		--content-container-width: calc(var(--total-width) - var(--sidebar-width));

		--count-column-header-width: 34.04px;

		--hyperlink-color: #29fff1;
		--cell-bg: #282828;

		--table-border-style: solid;
		--table-border-width-column: 2px;
		--table-border-width-row: 2px;
		--table-border-width-outer: 2px;
		--table-border-color: #aaa;

		--thin-border-style: dotted;
		--thin-border-width: 1px;
		--thin-border-color: grey;

		--gold: #fcf4ad;
		--brown: #51442c;
	}

	@font-face {
		font-family: 'H3Reader';
		src: url('fonts/H3Reader.woff') format('woff');
	}

	.ar { text-align: right; }
	.ac { text-align: center; }
	.al { text-align: left; }
	.mc { margin: 1em; }

	body {
		color: #ddd;
		background: #333;
		font-family: calibri, arial, sans-serif;
		margin: 0;
	}

	a, a:visited {
		color: var(--hyperlink-color);
		text-decoration: none;
		background-color: transparent;
	}

	a:hover {
		text-decoration: underline;
	}

	table {
		border-collapse: collapse;
		margin: 0;
		border: var(--table-border-style) var(--table-border-width-outer) var(--table-border-color);
	}

	th, td {
		border-top: var(--table-border-style) var(--table-border-width-row) var(--table-border-color);
		border-bottom: var(--table-border-style) var(--table-border-width-row) var(--table-border-color);
		border-right: var(--table-border-style) var(--table-border-width-column) var(--table-border-color);
		border-left: var(--table-border-style) var(--table-border-width-column) var(--table-border-color);
	}

	th {
		color: var(--gold);
		background: var(--brown);
		font-family: 'H3Reader', calibri, arial, sans-serif;
	}

	td {
		background: var(--cell-bg);
	}

	.bigtable th, .bigtable td, .smalltable th, .smalltable td { min-width: 1em; }

	.bigtable th, .bigtable td { padding: 3px 6px; }
	.bigtable th { font-size: 14px; }
	.bigtable td { font-size: 13px; }

	.smalltable th, .smalltable td { padding: 3px 3px; }
	.smalltable th { font-size: 14px; }
	.smalltable td { font-size: 11px; }

	.smallesttable th, .smallesttable td { padding: 2px 4px; }
	.smallesttable th { font-size: 10px; }
	.smallesttable td:first-child { font-size: 9px; }
	.smallesttable td:not(td:first-child) { font-size: 12px; }

	.content-container {
		position: relative;
		left: var(--sidebar-width);
		padding: var(--flex-gap);
		width: var(--content-container-width);
	}

	.flex-container {
		display: flex;
		flex-wrap: wrap;
		align-items: start;
		column-gap: var(--flex-gap) !important;
		/* row-gap: calc(var(--flex-gap) / 2) !important; */
		row-gap: var(--flex-gap) !important;
		/* flex-grow: 0 !important; */
		/* flex-shrink: 0 !important; */
		flex-basis: 100% !important;
		/* width: 100% !important; */
		max-width: 100% !important;
		border: 2px dashed violet;
		background: repeating-linear-gradient(
			45deg,
			transparent 0px,
			transparent 8px,
			#ee82ee40 8px,
			#ee82ee80 9px,
			#ee82ee40 10px
		) padding-box;
	}

	.flex-row-container {
		flex-grow: 1 !important;
		/* flex-shrink: 0 !important; */
		/* flex-basis: 100% !important; */
		/* width: 100% !important; */
		/* max-width: 100% !important; */
		border: 2px solid #87ceeb;
		background: #87ceeb80 padding-box;
	}

	.flex-break {
		flex-grow: 1;
		/* flex-basis: auto; */
		border: 2px solid red;
	}

	.row-break {
		width: 100%;
		height: var(--flex-gap)
	}

	.artifacts-table,
	.spells-table {
		flex-grow: 1;
		flex-basis: calc(25% - var(--flex-gap));
		max-width: 452.21px;
		table-layout: auto;
	}

	.artifacts-table td:first-child,
	.artifacts-table th:first-child,
	.spells-table td:first-child,
	.spells-table th:first-child {
		width: 32px !important;
	}

	.artifacts-table td:nth-child(2) {
		width: 162px;
	}

	.spells-table td:nth-child(2) {
		width: 132px;
	}

	.artifacts-table td:nth-child(3),
	.spells-table td:nth-child(3) {
		width: 74px !important;
	}

	.artifacts-table td:nth-child(4),
	.spells-table td:nth-child(4) {
		width: 78px !important;
	}

	.rowheader {
		background: #595142;
		font-weight: bold;
		text-align: center;
	}

	.tableheader1 {
		background: #3a1345;
		font-weight: bold;
		text-align: left;
		font-size: 18px !important;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		padding-left: 0.5em !important;
		padding-right: 0.5em !important;
	}

	.tableheader2 {
		background: #3a1345;
		font-weight: bold;
		text-align: center;
		font-size: 18px !important;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		padding-left: 0.5em !important;
		padding-right: 0.5em !important;
	}

	.tableheader3 {
		background: #3a1345;
		font-weight: bold;
		text-align: center;
		font-size: 10px !important;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		/* padding-left: 0.5em !important; */
		/* padding-right: 0.5em !important; */
	}

	.count-column-header1 {
		width: var(--count-column-header-width);
		box-sizing: border-box;
	}

	.count-column-header2 {
		width: var(--count-column-header-width);
		/* font-size: 8px !important; */
	}

	.count-column-header3 {
		width: var(--count-column-header-width);
		/* font-size: 8px !important; */
	}

	.specialcell1 {
		background: #5a5855;
		font-weight: bold;
		font-size: 12px !important;
	}

	.specialcell2 {
		background: #5a5855;
		font-weight: bold;
		font-size: 11px !important;
	}

	.specialcell3 {
		background: #4e4e4e;
		font-weight: bold;
		font-size: 13px !important;
	}

	.smalltext1 {
		font-size: 11px !important;
	}

	.smalltext2 {
		font-size: 10px !important;
		color: grey;
	}

	.normaltext {
		font-size: 13px !important;
	}

	.redtext {
		color: red;
	}

	.greytext {
		color: grey;
	}

	.solidcell {
		background: #777;
	}

	.cellfill {
		--dot-bg: #282828;
		--dot-color: #aaa;
		--dot-size: 0.25px;
		--dot-space: 1px;
		background:
			linear-gradient(90deg, var(--dot-bg) calc(var(--dot-space) - var(--dot-size)), transparent 1%) center / var(--dot-space) var(--dot-space),
			linear-gradient(var(--dot-bg) calc(var(--dot-space) - var(--dot-size)), transparent 1%) center / var(--dot-space) var(--dot-space),
			var(--dot-color);
	}

	.vat {
		vertical-align: top;
	}

	.thinvertical {
		border-left: var(--thin-border-style) var(--thin-border-width) var(--thin-border-color);
		border-right: var(--thin-border-style) var(--thin-border-width) var(--thin-border-color);
	}

	.thinvertical-left {
		border-left: var(--thin-border-style) var(--thin-border-width) var(--thin-border-color);
	}

	.thinvertical-right {
		border-right: var(--thin-border-style) var(--thin-border-width) var(--thin-border-color);
	}

	.thickvertical {
		border-left: var(--table-border-style) var(--table-border-width) var(--table-border-color);
		border-right: var(--table-border-style) var(--table-border-width) var(--table-border-color);
	}

	.thickvertical-left {
		border-left: var(--table-border-style) var(--table-border-width) var(--table-border-color);
	}

	.thickvertical-right {
		border-right: var(--table-border-style) var(--table-border-width) var(--table-border-color);
	}

	.heronameheader1 {
		background: #4e4e4e;
		font-weight: bold;
		font-size: 11px !important;
		vertical-align: top;
		height: 13px;
	}

	.heronameheader2 {
		background: #4e4e4e;
		font-weight: bold;
		font-size: 11px !important;
		vertical-align: top;
	}

	.disabledheroescolumn {
		width: 120px;
	}

	.disabledheroescell {
		vertical-align: top;
		text-align: center;
	}

	.sidebarTop {
		margin: 0;
		padding: 0;
		width: var(--sidebar-width);
		background-color: var(--sidespanel-color);
		position: fixed;
		left: 0px;
		top: 0px;
		height: var(--sidebar-top-height);
		font-family: 'H3Reader', calibri, arial, sans-serif;
		text-align: center;
		font-size: 16px;
		border-left: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		border-right: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		border-top: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		box-sizing: border-box;
	}

	.sidebarTopTable {
		margin: 0;
		padding: 0;
		width: 100%;
		height: calc(var(--sidebar-top-height) - (4 * var(--hrule1-border-thickness)) - var(--sidebar-border-width));
		border: none;
		position: relative;
		border-collapse: separate;
	}

	.sidebarTopTableCell {
		margin: 0;
		padding: 0;
		width: 50%;
		border: none;
		position: relative;
	}

	.sidebarTopTableCell a {
		display: block;
		width: 100%;
		height: 100%;
		text-align: center;
		text-decoration: none;
		color: #ddd;
		background-color: #3a4d4f;
	}

	.sidebarTopTableCell a.selected {
		color: var(--gold);
	}

	.sidebarTopTableCell a.active {
		color: var(--gold);
	}

	.sidebarTopTableCell a:hover:not(.active) {
		color: var(--brown);
		background-color: var(--hyperlink-color);
	}

	.sidebarMain {
		margin: 0;
		padding: 0;
		width: var(--sidebar-width);
		background-color: var(--sidebar-color);
		position: fixed;
		left: 0px;
		top: var(--sidebar-top-height);
		height: 1005px;
		overflow: auto;
		color: #ddd;
		font-size: 22px;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		border-left: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		border-right: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		border-bottom: var(--sidebar-border-width) var(--sidebar-border-style) var(--sidebar-border-color);
		box-sizing: border-box;
		/* display: none; */
	}

	.sidebarMain a {
		display: block;
		color:  #ddd;
		background-color: #444;
		text-align: center;
		padding: 3px 0 4px;
		text-decoration: none;
	}

	.sidebarMain a.selected {
		color: var(--gold);
	}

	.sidebarMain a.active {
		color: var(--brown);
		background-color: var(--gold);
	}

	.sidebarMain a:hover {
		color: var(--brown);
		background-color: var(--gold);
	}

	.hrule1 {
		border: var(--hrule1-border-thickness) var(--hrule1-border-style) var(--hrule1-border-color);
		margin: 0;
	}

	.hrule2 {
		border: var(--hrule2-border-thickness) var(--hrule2-border-style) var(--hrule2-border-color);
		margin: 0;
	}

	.color1 { background: #ff0000; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* red */
	.color2 { background: #3152ff; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* blue */
	.color3 { background: #9c7352; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* tan */
	.color4 { background: #429429; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* green */
	.color5 { background: #ff8400; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* orange */
	.color6 { background: #8c29a5; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* purple */
	.color7 { background: #089ca5; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* teal */
	.color8 { background: #c67b8c; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* pink */
	.color256 { background: #848484; padding: 0px 6px; border-radius:3px; font-size: 9px; position: relative; top: -1.5px; } /* neutral */

</style>
</head>
<body>
	<div class="sidebarTop">
		<hr class="hrule1">
		<table class="sidebarTopTable">
			<tr>
				<td class="sidebarTopTableCell">
					<a href="mapscan.php?scan=1">Scan</a>
				</td>
				<td class="sidebarTopTableCell">
					<a href="mapindex.php">Map List</a>
				</td>
			</tr>
		</table>
		<hr class="hrule1">
</div>
<?php

require_once 'src/h3mapscan.php';
require_once 'src/h3mapconstants.php';
require_once 'src/mapsupport.php';

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
	echo '<div class="content-container">';

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
<script type="application/javascript" src="js/datatables.js"></script>
</body>
</html>
