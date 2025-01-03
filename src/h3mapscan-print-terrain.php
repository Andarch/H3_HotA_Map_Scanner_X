<?php
/** @var H3MAPSCAN_PRINT $this */

echo DisplayMap($this->h3mapscan->mapimage, $this->h3mapscan->underground);

echo '<div class="flex-container">';

$totalsize1 = $this->h3mapscan->map_size * $this->h3mapscan->map_size;
$totalsize2 = $totalsize1 * ($this->h3mapscan->underground + 1);

for ($i = 0; $i < 3; $i++) {
	$totalsize = $i == 2 ? $totalsize2 : $totalsize1;
	if($i == 0) {
		$title = 'Ground';
	}
	elseif($i == 1) {
		$title = 'Underground';
	}
	else {
		$title = 'Total';
	}

	$n = 0;
	arsort($this->h3mapscan->terrainRate[$i]);

	echo '<table class="table-large">
			<tr>
				<th colspan="3" class="table__title-bar--large">'.$title.'</td>
			</tr>
			<tr>
				<th>#</th>
				<th>Terrain</th>
				<th>Percentage</th>
			</tr>';
	foreach($this->h3mapscan->terrainRate[$i] as $terrain => $ratio) {
		echo '<tr>
				<td class="table__row-header--default">'.(++$n).'</td>
				<td>'.$this->h3mapscan->CS->TerrainType[$terrain].'</td>
				<td class="ar">'.comma(100 * $ratio / $totalsize, 1).' %</td>
			</tr>';
	}
	echo '</table>';
}

echo '</div>';

function DisplayMap($mapimage, $underground) {
	$timestamp = time();
	$imgmapnameg = MAPDIRIMG.$mapimage.'_g.png';
	$imgmapnameu = MAPDIRIMG.$mapimage.'_u.png';

	$imgground = file_exists($imgmapnameg) ? '<img src="'.$imgmapnameg.'?t='.$timestamp.'" />' : 'Map Ground';
	$output = '<table class="table-large"><th>Ground</th><th>Underground</th><tr><td>'.$imgground.'</td>';
	if($underground) {
		$imguground = file_exists($imgmapnameu) ? '<img src="'.$imgmapnameu.'?t='.$timestamp.'" />' : 'Map Underground';
		$output .= '<td>'.$imguground.'</td>';
	}
	$output .= '</tr></table>';
	return $output;
}
