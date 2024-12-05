<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: text/html; charset=utf-8');

require_once 'src/mi.php';
require_once 'src/config.php';

$timestamp = time();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<title>H3 HotA Map Scanner X</title>
	<link rel="shortcut icon" href="images/hotaicon.png?t=<?= $timestamp ?>" type="image/x-icon" />
	<link rel="stylesheet" href="css/style.css?v=<?= $timestamp ?>">

    <?php
    $isLocalhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;
    if ($isLocalhost) {
		echo '<link rel="stylesheet" href="css/local.css?v='.$timestamp.'">';
    }
    ?>

	<script type="application/javascript" src="js/jquery-2.1.3.min.js?t=<?= $timestamp ?>"></script>
	<script type="application/javascript" src="js/jquery-ui.js?t=<?= $timestamp ?>"></script>
	<script type="application/javascript" src="js/mapread.js?t=<?= $timestamp ?>"></script>
</head>

<body>
	<div class="grid-container">
		<div class="sidebarTop">
			<hr class="hrule1">
			<table class="sidebarTopTable">
				<tr>
					<td class="sidebarTopTableCell">
						<a href="index.php?scan=1">Scan</a>
					</td>
					<td class="sidebarTopTableCell">
						<a href="maplist.php">Map List</a>
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
			echo 'There are no maps to proccess in map folder. You can go to <a href="maplist.php">Map List</a><br /><br />';
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

</body>
</html>
