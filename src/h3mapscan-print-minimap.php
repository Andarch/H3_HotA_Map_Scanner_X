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
		<table class="table-minimap">
			<tr>
				<th>Ground</th>
			</tr>
			<tr>
				<td><img src="'.$imgGround.'" /></td>
			</tr>
		</table>
	</div>';
if($hasUnderground) {
	$output .= '
		<div class="minimap-underground">
			<table class="table-minimap">
				<tr>
					<th>Underground</th>
				</tr>
				<tr>
					<td><img src="'.$imgUnderground.'" /></td>
				</tr>
			</table>
		</div>';
}

$output .= '</div></br>';

echo $output;
