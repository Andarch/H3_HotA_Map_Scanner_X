<?php
	header('Content-Type: text/html; charset=utf-8');

	require_once './src/mi.php';
	require_once './src/config.php';
	require_once './src/h3mapscan.php';
	require_once './src/h3mapconstants.php';
	require_once './src/mapsupport.php';

	$mapname = expost('map', '');
	$num = expost('num', 0);


	$mapfile = MAPDIR.$mapname;

	if(!file_exists($mapfile)) {
		exit;
	}

	echo '<br /><br />'.$num.' '.$mapname.'<br />';

	$tm = new TimeMeasure();
	//H3M_SAVEMAPDB | H3M_BUILDMAP
	$map = new H3MAPSCAN($mapfile, H3M_SAVEMAPDB | H3M_BASICONLY);
	$map->ReadMap();

	if(!$map->readok) {
		echo '<br />';
		//rename($mapfile, 'mapsx/'.$mapname);
	}
	else {
		echo ', Duration: ';
		$tm->Measure();
		$tm->showTime();
		echo ' ** ';
	}
