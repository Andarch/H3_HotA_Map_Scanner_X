<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: text/html; charset=utf-8');

require_once 'src/mi.php';
require_once 'src/config.php';
require_once 'src/h3mapindexconst.php';

$mapsearch = expost('map', exget('map', ''));
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
</head>

<body>
	<p>
		<a href="?c=list">Map List</a><br />
		<a href="?c=stat">Map Stat</a>
	</p>

	<form method="post" action="maplist.php">
		<input type="text" name="map" value="<?php echo $mapsearch; ?>" />
		<input type="submit" name="ok" value="Search" />
	</form>
<?php

$cmd = exget('c', 'list');
$qcol = exget('q', '');
$qval = exget('v', '');

if($cmd == 'stat') {
	MapStats();
}
else {
	$where = '';
	$llink = '';

	if($qcol != '' && $qval != ''){
		$qcol = mes($qcol);
		$qval = mes($qval);
		$where = "WHERE $qcol='$qval'";
		$llink = 'q='.$qcol.'&amp;v='.$qval;
	}
	elseif($mapsearch) {
		$mapsearch = mes($mapsearch);
		$where = "WHERE m.mapname LIKE '%$mapsearch%' OR m.mapfile LIKE '%$mapsearch%'";
		$llink = 'map='.$mapsearch;
	}

	global $VICTORY;
	global $LOSS;


	$limit = 20; //maps per page
	$start = intval(exget('start', 0));
	$offset = $start * $limit;

	$sqlt = "SELECT COUNT(m.idm) AS mc
		FROM heroes3_maps AS m
		$where";
	$total = mgr($sqlt);

	echo 'Found: '.$total.'<br /><br />';

	$links = more_links($limit, $start, $total, $llink);

	echo $links;

	echo '<table class="table-map-list">';

	$maphead = '<tr>
			<th>Name</th>
			<th>Version</th>
			<th>Size</th>
			<th>Levels</th>
			<th>Players</th>
			<th>Human</th>
			<th>Teams</th>
			<th>Victory</th>
			<th>Loss</th>
		</tr>';

	$timestamp = time();

	$sql = "SELECT m.idm, m.mapfile, m.mapname, m.mapdesc, m.version, m.size, m.sizename, m.levels, m.diff,
			m.playersnum, m.playhuman, m.teamnum, m.victory, m.loss, m.filechanged, m.mapimage
		FROM heroes3_maps AS m $where
		ORDER BY m.mapname ASC
		LIMIT $offset, $limit";
	$query = mq($sql);
	while($res = mfa($query)) {

		$imgg = '<img src="'.MAPDIRIMG.$res['mapimage'].'_g.png?t='.$timestamp.'" />';
		$imgu = $res['levels'] ? '<img src="'.MAPDIRIMG.$res['mapimage'].'_u.png?t='.$timestamp.'" />' : '';

		$name = $res['mapname'] != '' ? $res['mapname'] : $res['mapfile'];

		$levels = $res['levels'] ? 2 : 1;

		$victory = array_key_exists($res['victory'], $VICTORY) ? $VICTORY[$res['victory']] : '?';
		$loss = array_key_exists($res['loss'], $LOSS) ? $LOSS[$res['loss']] : '?';

		echo $maphead.'<tr>
			<td><a href="index.php?mapid='.$res['idm'].'">'.$name.'</a></td>
			<td>'.$res['version'].'</td>
			<td>'.$res['sizename'].'</td>
			<td>'.$levels.'</td>
			<td>'.$res['playersnum'].'</td>
			<td>'.$res['playhuman'].'</td>
			<td>'.$res['teamnum'].'</td>
			<td>'.$victory.'</td>
			<td>'.$loss.'</td>
		</tr>
		<tr>
			<td>'.$res['mapfile'].'</td>
			<td colspan="8">'.nl2br($res['mapdesc']).'</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="4" class="ac">'.$imgg.'</td>
			<td colspan="4" class="ac">'.$imgu.'</td>
		</tr>';
	}

	echo '</table>';

	echo $links.'<br /><br />';
}

function MapStats() {
	$sqls[] = "SELECT m.version, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.version
		ORDER BY CASE m.version
		WHEN 'RoE' THEN  0
		WHEN 'AB' THEN  1
		WHEN 'SoD' THEN  2
		WHEN 'WOG' THEN  3
		END";

	$sqls[] = "SELECT m.size, m.sizename, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.size
		ORDER BY m.size";

	$sqls[] = "SELECT m.diff, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.diff
		ORDER BY CASE m.diff
		WHEN 'Easy' THEN  0
		WHEN 'Normal' THEN  1
		WHEN 'Hard' THEN  2
		WHEN 'Expert' THEN  3
		WHEN 'Impossible' THEN  4
		END";

	$sqls[] = "SELECT m.playersnum, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.playersnum
		ORDER BY m.playersnum";

	$sqls[] = "SELECT m.victory, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.victory
		ORDER BY m.victory";

	$sqls[] = "SELECT m.loss, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.loss
		ORDER BY m.loss";

	$sqls[] = "SELECT m.victory, m.loss, COUNT(m.idm) AS count
		FROM heroes3_maps AS m
		GROUP BY m.victory, m.loss
		ORDER BY m.victory";

	foreach($sqls as $sql) {
		MakeTableFromSQL($sql);
	}
}

function MakeTableFromSQL($sql) {
	echo '<table class="bigtable">';
	$n = 0;
	$ncol = 0;
	$namecol = array();
	$query = mq($sql);
	while($res = mfa($query)) {
		if($n == 0) {
			echo '<tr>';
			foreach($res as $key => $field) {
				if(is_int($key)) continue;
				$namecol[] = $key;
				$ncol++;
				echo '<th>'.ucfirst($key).'</th>';
			}
			echo '</tr>';
		}
		$n++;

		echo '<tr>';
		for($i = 0; $i < $ncol; $i++) {
			if($namecol[$i] == 'victory') {
				global $VICTORY;
				$value = $VICTORY[$res[$i]];
			}
			elseif($namecol[$i] == 'loss') {
				global $LOSS;
				$value = $LOSS[$res[$i]];
			}
			else {
				$value = $res[$i];
			}

			if($namecol[$i] != 'count') {
				$value = '<a href="?q='.$namecol[$i].'&amp;v='.$res[$i].'">'.$value.'</a>';
			}

			$cl = $namecol[$i] == 'count' ? ' class="ar"' : '';
			echo '<td'.$cl.'>'.$value.'</td>';
		}
		echo '</tr>';
	}
	echo '<table>';
}

function more_links($div, $start, $total, $llink) {
	$out = '<p class="mc ac">';
	$posts = ceil($total / $div);
	for($i = $posts; $i > 0; $i--){
		$link = $posts - $i + 1;
		if($start == $link - 1) {
			$out .= '<span>'.$link.'</span>';
		}
		else {
			$out .= '<a href="?'.$llink.'&amp;start='.($link - 1).'">'.$link.'</a>';
		}
		if($i > 1) {
			$out .= ' | ';
		}
	}
	return $out.'</p>';
}

function Mapsort($a, $b){
	return strnatcasecmp($a['mapname'], $b['mapname']);
}

?>
</body>
</html>
