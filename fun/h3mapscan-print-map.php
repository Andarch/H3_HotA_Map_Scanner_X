<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

$this->h3mapscan->BuildMap();
echo EOL.$this->h3mapscan->DisplayMap();

//terrain percentage
$totalsize1 = $this->h3mapscan->map_size * $this->h3mapscan->map_size;
$totalsize2 = $totalsize1 * ($this->h3mapscan->underground + 1);

echo '<table><tr>';
for ($i = 0; $i < 3; $i++) {
	$totalsize = $i == 2 ? $totalsize2 : $totalsize1;
	if($i == 0) {
		$title = 'Ground';
	}
	elseif($i == 1) {
		$title = 'Underground';
	}
	else {
		$title = 'Both';
	}

	$n = 0;
	arsort($this->h3mapscan->terrainRate[$i]);
	echo '<td>'.$title.'
		<table class="mediumtable">
			<tr><th>#</th><th>Terrain</th><th>Percentage</th></tr>';
	foreach($this->h3mapscan->terrainRate[$i] as $terrain => $ratio) {
		echo '<tr>
			<td class="rowheader">'.(++$n).'</td>
			<td>'.$this->h3mapscan->CS->TerrainType[$terrain].'</td>
			<td class="ar">'.comma(100 * $ratio / $totalsize, 1).' %</td>
		</tr>';
	}
	echo '</table>';
}
