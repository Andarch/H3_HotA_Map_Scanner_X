<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->spells_list, 'ListSortByName');

$maxItems = 40;
$totalItems = count($this->h3mapscan->spells_list);
$numTables = ceil($totalItems / $maxItems);

echo '<div class="flex-container">';

for ($i = 0; $i < $numTables; $i++) {
	echo '<table class="table-large spells-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Spell</th>
					<th>Position</th>
					<th>Parent</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>';
	for ($j = 0; $j < $maxItems; $j++) {
		$n = $i * $maxItems + $j;
		if ($n >= $totalItems) break;
		$spl = $this->h3mapscan->spells_list[$n];
		echo '<tr>
				<td class="table__row-header--default">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$spl->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$spl->mapcoor->GetCoords().'</td>
				<td class="ar nowrap" nowrap="nowrap">'.$spl->parent.'</td>
				<td class="nowrap" nowrap="nowrap">'.$spl->add1.'</td>
				</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}

echo '</div>';
