<?php
/** @var H3MAPSCAN_PRINT $this */

// usort($this->h3mapscan->monsters_list, 'ListSortByName');

// $maxItems = 40;
// $totalItems = count($this->h3mapscan->monsters_list);
// $numTables = ceil($totalItems / $maxItems);

// echo '<div class="flex-container">';

// for ($i = 0; $i < $numTables; $i++) {
	echo '<table class="table-small">
			<thead>
				<tr>
					<th>#</th>
					<th>Type</th>
					<th>Position</th>
					<th>Count</th>
					<th>Value</th>
					<th>Grow</th>
					<th>Disposition</th>
					<th>Flee</th>
					<th>Join</th>
					<th class="ac nowrap" nowrap="nowrap">Join %</th>
					<th>Upgraded</th>
					<th>Stack Count</th>
					<th>Resources</th>
					<th>Artifact</th>
					<th>Message</th>
				</tr>
			</thead>
			<tbody>';
	// for ($j = 0; $j < $maxItems; $j++) {
	// 	$n = $i * $maxItems + $j;
	// 	if ($n == $totalItems) break;
	foreach($this->h3mapscan->monsters_list as $monster) {
		// $monster = $this->h3mapscan->monsters_list[$n];
		$count = !$monster['isValue'] ? comma($monster['count']) : EMPTY_DATA;
		$value = $monster['isValue'] ? comma($monster['value']) : EMPTY_DATA;
		$disposition = $monster['disposition'] !== 'Precise'
					   ? $monster['disposition']
					   : 'Precise('.$monster['preciseDisposition'].')';
		$resources = [];
		foreach($monster['resources'] as $rid => $amount) {
			$sign = $amount > 0 ? '+' : '';
			$resources[] = $sign.comma($amount).' '.$this->h3mapscan->GetResourceById($rid);
		}

		$n = 0;
		echo '<tr>
				<td class="table__row-header--default">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$monster['name'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['pos']->GetCoords().'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$count.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$value.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['neverGrows'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$disposition.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['neverFlees'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['joinForMoney'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['joinPercent'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['upgraded'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$monster['stackCount'].'</td>
				<td class="nowrap" nowrap="nowrap">'.implode('<br />', $resources).'</td>
				<td class="nowrap" nowrap="nowrap">'.$monster['artifact'].'</td>
				<td>'.$monster['message'].'</td>
			</tr>';
	}
	echo '</tbody>';
	echo '</table>';
// }

// echo '</div>';
