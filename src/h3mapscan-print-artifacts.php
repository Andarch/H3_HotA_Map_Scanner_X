<?php
/** @var H3MAPSCAN_PRINT $this */

$artifacts = $this->h3mapscan->artifacts_list;
usort($artifacts, 'ListSortByName');

# Remove Ammo Cart, First Aid Tent, Ballista, Cannon, Catapult, and Spell Book from $artifacts
$exclude_names = [
	"Ammo Cart",
	"First Aid Tent",
	"Ballista",
	"Cannon",
	"Catapult",
	"Spell Book",
	"Spell Scroll"
];

$artifacts = array_filter($artifacts, function($artifact) use ($exclude_names) {
	// Check if artifact name is in exclude list
	if (in_array($artifact->name, $exclude_names)) {
		return false;
	}
	// Check if artifact name starts with "Scroll of"
	if (strpos($artifact->name, 'Scroll of') === 0) {
		return false;
	}
	// Check if artifact name starts with "Random"
	if (strpos($artifact->name, 'Random') === 0) {
		return false;
	}
	return true;
});

// Reindex the array to fix gaps created by array_filter
$artifacts = array_values($artifacts);

$maxItems = 40;
$totalItems = count($artifacts);
$numTables = ceil($totalItems / $maxItems);

echo '<div class="flex-container">';

for ($i = 0; $i < $numTables; $i++) {
	echo '<table class="table-small artifacts-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Artifact</th>
					<th>Position</th>
					<th>Parent</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>';
	for ($j = 0; $j < $maxItems; $j++) {
		$n = $i * $maxItems + $j;
		if ($n == $totalItems) break;
		$art = $artifacts[$n];
		echo '<tr>
				<td class="table__row-header--default">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$art->mapcoor->GetCoords().'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$art->parent.'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->add1.'</td>
				</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}

echo '</div>';
