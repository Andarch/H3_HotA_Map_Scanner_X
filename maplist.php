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
$timestamp = time(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>H3 HotA Map Scanner X</title>
		<link rel="shortcut icon" href="images/hotaicon.png?t=<?= $timestamp ?>" type="image/x-icon" />
		<link rel="stylesheet" href="css/style.css?v=<?= $timestamp ?>" />
<?php
$isLocalhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;
if ($isLocalhost) { ?>
		<link rel="stylesheet" href="css/local.css?v=<?= $timestamp ?>" />
<?php } ?>
	</head>
	<body>
		<table class="table-map-list">
			<thead>
				<tr>
					<th>Name</th>
					<th>Version</th>
					<th>Size</th>
					<th colspan="2">Minimap</th>
					<th>File</th>
				</tr>
			</thead>
			<tbody>
<?php
$sql = "
	SELECT m.idm, m.mapfile, m.mapname, m.mapdesc, m.version, m.subversion, m.size, m.sizename, m.levels, m.diff,
		   m.playersnum, m.playhuman, m.teamnum, m.victory, m.loss, m.filechanged, m.mapimage
	FROM heroes3_maps AS m
	ORDER BY m.mapname ASC
";
$query = mq($sql);

while ($res = mfa($query)) {
	$imgg = '<img src="' . MAPDIRIMG . $res['mapimage'] . '_g.png?t=' . $timestamp . '" />';
	$imgu = $res['levels'] ? '<img src="' . MAPDIRIMG . $res['mapimage'] . '_u.png?t=' . $timestamp . '" />' : '';

	$name = $res['mapname'] != '' ? $res['mapname'] : $res['mapfile'];

	$victory = array_key_exists($res['victory'], $VICTORY) ? $VICTORY[$res['victory']] : '?';
	$loss = array_key_exists($res['loss'], $LOSS) ? $LOSS[$res['loss']] : '?'; ?>
				<tr>
					<td class="ac" style="line-height: 1.75;">
						<a style="font-size: 22px;" href="index.php?mapid=<?= $res['idm'] ?>"><?= $name ?></a>
					</td>
					<td class="ac"><?= $res['version'] ?> <?= $res['subversion'] ?></td>
					<td class="ac"><?= $res['sizename'] ?></td>
					<td class="ac image-cell" style="padding: 0; vertical-align: middle;"><?= $imgg ?></td>
					<td class="ac image-cell" style="padding: 0; vertical-align: middle; margin: 0; auto;"><?= $imgu ?></td>
					<td style="font-size: 14px;"><?= $res['mapfile'] ?></td>
				</tr>
<?php
} ?>
			</tbody>
		</table>
	</body>
</html>
