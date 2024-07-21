<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->spells_list, 'ListSortByName');

$itemsPerTable = 40;
$totalItems = count($this->h3mapscan->spells_list);
$numTables = ceil($totalItems / $itemsPerTable);

echo '<div class="flex-container">';

$n = 0;
for ($i = 0; $i < $numTables; $i++) {
    echo '<div class="table-container">';
	echo '<table class="bigtable">
			<tr>
				<th>#</th>
				<th>Spell</th>
				<th>Coordinates</th>
				<th>Parent</th>
				<th>Name</th>
			</tr>';

	for ($j = 0; $j < $itemsPerTable; $j++) {
		$n = $i * $itemsPerTable + $j;
		if ($n >= $totalItems) break;
		$spl = $this->h3mapscan->spells_list[$n];
		echo '<tr>
				<td class="rowheader">'.(++$n).'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$spl->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$spl->mapcoor->GetCoords().'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$spl->parent.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$spl->add1.'</td>
				</tr>';
	}

	echo '</table>';
	echo '</div>';
}

echo '</div>';
