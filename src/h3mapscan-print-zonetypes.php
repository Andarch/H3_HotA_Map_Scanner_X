<?php
/** @var H3MAPSCAN_PRINT $this */

/* DECLARATIONS */
$baseFilename = pathinfo($this->h3mapscan->mapfile, PATHINFO_FILENAME);
$timestamp = '?t='.microtime(true);
$imgGround = MAPDIR.$baseFilename.'_g3.png'.$timestamp;
$imgUnderground = MAPDIR.$baseFilename.'_u3.png'.$timestamp;
$hasUnderground = $this->h3mapscan->underground;

/* MAIN */

$output = '<div class="minimap-container">';

$output .= '
	<div class="minimap-ground">
		<table class="table-small table-minimap">
			<tr>
				<th>Ground</th>
			</tr>
			<tr>
				<td class="map-image-container"><img src="'.$imgGround.'" class="map-image-bg" /></td>
			</tr>
		</table>
	</div>';
if($hasUnderground) {
	$output .= '
		<div class="minimap-underground">
			<table class="table-small table-minimap">
				<tr>
					<th>Underground</th>
				</tr>
				<tr>
					<td class="map-image-container"><img src="'.$imgUnderground.'" class="map-image-bg" /></td>
				</tr>
			</table>
		</div>';
}

$output .= '</div></br>';

echo $output;
