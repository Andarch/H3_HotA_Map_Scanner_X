<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->artifacts_list, 'ListSortByName');

$maxItems = 40;
$totalItems = count($this->h3mapscan->artifacts_list);
$numTables = ceil($totalItems / $maxItems);

echo '<div class="flex-container">';

for ($i = 0; $i < $numTables; $i++) {
	echo '<table class="smalltable artifacts-table">
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
		$art = $this->h3mapscan->artifacts_list[$n];
		echo '<tr>
				<td class="rowheader">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$art->mapcoor->GetCoords().'</td>
				<td class="ar nowrap" nowrap="nowrap">'.$art->parent.'</td>
				<td class="nowrap" nowrap="nowrap">'.$art->add1.'</td>
				</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}

echo '</div>';
