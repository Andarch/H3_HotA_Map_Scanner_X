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
	:root {
		--sidepanel-color: #555;
		--sidepanel-border-color: #999;
		--sidepanel-border-style: solid;
		--sidepanel-border-width: 4px;
		--hrule1-border-color: #999;
		--hrule2-border-color: #777;
		--hyperlink-color: #29fff1;
		--cell-bg: #2b2b2b;
		--flex-gap: 3em;
		--table-border-style: solid;
		--table-border-width: 2px;
		--table-border-color: #aaa;
		--thin-border-style: dotted;
		--thin-border-width: 1px;
		--thin-border-color: grey;
	}

	@font-face {
		font-family: 'H3Reader';
		src: url('fonts/H3Reader.woff') format('woff');
	}

	body { background: #333; font-family: calibri, arial, sans-serif; margin: 0;}
	table { border-collapse: collapse; margin: 0; border: solid 2px #aaa; }
	th, td {border: var(--table-border-style) var(--table-border-width) var(--table-border-color); min-width: 1em; padding: 3px 6px; }
	th { color: #fcf4ad; background: #51442c; font-family: 'H3Reader', calibri, arial, sans-serif; border-bottom: solid 2px #aaa; border-right: solid 2px #aaa; }
	td { border-right: solid 2px #aaa; background: var(--cell-bg); }
	.ar { text-align: right; }
	.ac { text-align: center; }
	.al { text-align: left; }
	.mc { margin: 1em; }

	a, a:visited { color: var(--hyperlink-color); text-decoration: none; background-color: transparent }
	a:hover { text-decoration: underline; }

	.bigtable th { font-size: 14px; }
	.bigtable td { font-size: 13px; }
	.smalltable th { font-size: 14px; }
	.smalltable td { font-size: 11px; }
	.colw100 { width: 100px; }
	.colA { width: 30%; }

	body, table { color: #ddd; }

	.hrule1 { border: 8px double var(--hrule1-border-color); margin: 0; }
	.hrule2 { border: 1.25px groove var(--hrule2-border-color); margin: 0; }

	.content {
		position: absolute;
		left: 250px;
		margin: 2em;
		padding-bottom: 2em;
	}

	.rowheader {
		background: #595142;
		font-weight: bold;
		text-align: center;
	}

	.subheader {
		color: #fcf4ad;
		background: #51442c;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		border-bottom: solid 2px #aaa;
		border-right: solid 2px #aaa;
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

	.redtext {
		color: red;
	}

	.mls {
		line-height: 1.1rem;
	}

	.cellfill {
		--dot-bg: #333;
		--dot-color: #555;
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

	.tableheader1 {
		background: #451713;
		font-weight: bold;
		text-align: center;
		font-size: 18px !important;
		font-family: 'H3Reader', calibri, arial, sans-serif;
	}

	.tableheader2 {
		background: #3a1345;
		font-weight: bold;
		text-align: center;
		font-size: 18px !important;
		font-family: 'H3Reader', calibri, arial, sans-serif;
	}

	.flex-container {
		display: flex;
		flex-wrap: wrap;
		align-items: start;
		gap: var(--flex-gap);
	}

	.flex-container .bigtable,
	.flex-container .smalltable {
		margin: 0;
	}

	.table-container {
		/* flex-basis: calc(33.33% - var(--flex-gap)); */
	}

	.table-container table {
		/* width: 100%; */
	}

	.forcebreak {
		flex-basis: 100%;
	}

	.sidebarTop {
		margin: 0;
		padding: 0;
		width: 250px;
		background-color: var(--sidepanel-color);
		position: fixed;
		left: 0px;
		top: 0px;
		height: 30px;
		overflow: auto;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		font-size: 16px;
		text-align: center;
		border-left: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
		border-right: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
		border-top: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
		/* border-bottom: 2.5px solid var(--sidepanel-border-color); */
		box-sizing: border-box;
		overflow: hidden;
		/* display: none; */
	}

	.sidebarTopTable {
		margin: 0;
		padding: 0;
		width: 100%;
		height: 100%;
		border: none;
		position: relative;
	}

	.sidebarTopTableCell {
		margin: 0;
		padding: 0;
		width: 50%;
		border: none;
		position: relative;
		font-size: 18px;
	}

	.sidebarTopTableCell:first-child {
		border-right: 2px solid var(--sidepanel-border-color);
	}

	.sidebarTopTableCell:last-child {
		border-left: 2px solid var(--sidepanel-border-color);
	}

	.sidebarTopTableCell a {
		display: block;
		width: 100%;
		height: 100%;
		text-align: center;
		padding: 1px 0;
		box-sizing: border-box;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		text-decoration: none;
		color: #ddd;
		/* color: var(--cell-bg); */
		background-color: #3a4d4f;
	}

	.sidebarTopTableCell a.selected {
		color: #fcf4ad;
	}

	.sidebarTopTableCell a.active {
		color: #fcf4ad;
	}

	.sidebarTopTableCell a:hover:not(.active) {
		color: #51442c;
		background-color: var(--hyperlink-color);
	}

	.sidebarMain {
		margin: 0;
		padding: 0;
		width: 250px;
		background-color: var(--sidepanel-color);
		position: fixed;
		left: 0px;
		top: 30px;
		height: 1035px;
		overflow: auto;
		color: #ddd;
		font-size: 22px;
		font-family: 'H3Reader', calibri, arial, sans-serif;
		border-left: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
		border-right: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
		border-bottom: var(--sidepanel-border-width) var(--sidepanel-border-style) var(--sidepanel-border-color);
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
		color: #fcf4ad;
	}

	.sidebarMain a.active {
		color: #51442c;
		background-color: #fcf4ad;
	}

	.sidebarMain a:hover:not(.active) {
		color: #51442c;
		background-color: #fcf4ad;
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
		<br />
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
<script type="application/javascript" src="js/datatables.js"></script>
</body>
</html>
