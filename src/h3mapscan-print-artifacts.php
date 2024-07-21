<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->artifacts_list, 'ListSortByName');

$itemsPerTable = 40;
$totalItems = count($this->h3mapscan->artifacts_list);
$numTables = ceil($totalItems / $itemsPerTable);

echo '<div class="flex-container">';

$n = 0;
for ($i = 0; $i < $numTables; $i++) {
    echo '<div class="table-container">';
	echo '<table class="bigtable">
			<tr>
				<th>#</th>
				<th>Artifact</th>
				<th>Position</th>
				<th>Parent</th>
				<th>Name</th>
			</tr>';

	for ($j = 0; $j < $itemsPerTable; $j++) {
		$n = $i * $itemsPerTable + $j;
		if ($n >= $totalItems) break;
		$art = $this->h3mapscan->artifacts_list[$n];
		echo '<tr>
				<td class="rowheader">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$art->mapcoor->GetCoords().'</td>
				<td class="ar nowrap" nowrap="nowrap">'.$art->parent.'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->add1.'</td>
				</tr>';
	}

	echo '</table>';
	echo '</div>';
}

echo '</div>';
