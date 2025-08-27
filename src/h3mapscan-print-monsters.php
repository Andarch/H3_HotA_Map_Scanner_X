<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->monsters_list, 'ListSortByName');

$maxItems = 40;
$totalItems = count($this->h3mapscan->monsters_list);
$numTables = ceil($totalItems / $maxItems);

echo '<div class="flex-container">';

for ($i = 0; $i < $numTables; $i++) {
	echo '<table class="table-small monsters-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Count</th>
					<th>Position</th>
					<th>Parent</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>';
	for ($j = 0; $j < $maxItems; $j++) {
		$n = $i * $maxItems + $j;
		if ($n == $totalItems) break;
		$monster = $this->h3mapscan->monsters_list[$n];
		echo '<tr>
				<td class="table__row-header--default">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$monster->name.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster->mapcoor->GetCoords().'</td>
				<td class="ar nowrap" nowrap="nowrap">'.$monster->parent.'</td>
				<td class="nowrap" nowrap="nowrap">'.$monster->add1.'</td>
				</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}

echo '</div>';
