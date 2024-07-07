<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//towns events list
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">Town #</th>
			<th class="nowrap" nowrap="nowrap">Town Name</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th class="nowrap" nowrap="nowrap">Owner</th>
			<th class="nowrap" nowrap="nowrap">Type</th>
			<th class="nowrap" nowrap="nowrap">Event #</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Players</th>
			<th class="nowrap" nowrap="nowrap">Human / AI</th>
			<th class="nowrap" nowrap="nowrap">First</th>
			<th class="nowrap" nowrap="nowrap">Period</th>
			<th class="nowrap" nowrap="nowrap">Resources</th>
			<th class="nowrap" nowrap="nowrap">Monsters</th>
			<th class="nowrap" nowrap="nowrap">Buildings</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];

	if($town['eventsnum'] == 0) {
		continue;
	}

	$monlvlprint = false;
	$monIdOffset = 0;
	if($towno['id'] == OBJECTS::RANDOM_TOWN) {
		$monlvlprint = true;
	}

	$rows = $town['eventsnum'];

	echo '<tr>
		<td class="rowheader" rowspan="'.$rows.'">'.(++$n).'</td>
		<td rowspan="'.$rows.'" class="ac nowrap" nowrap="nowrap">'.$town['name'].'</td>
		<td rowspan="'.$rows.'" class="ac nowrap" nowrap="nowrap">'.$towno['pos']->GetCoords().'</td>
		<td rowspan="'.$rows.'" class="nowrap" nowrap="nowrap">'.$town['player'].'</td>
		<td rowspan="'.$rows.'" class="ac nowrap" nowrap="nowrap">'.$town['affiliation'].'</td>';

	usort($town['events'], 'SortTownEventsByDate');
	foreach($town['events'] as $e => $event) {
		if($e > 0) {
			echo '<tr>';
		}

		$resources = [];
		foreach($event['res'] as $rid => $amount) {
			$resources[] = $this->h3mapscan->GetResourceById($rid).' = '.$amount;
		}

		$monsters = [];
		foreach($event['monsters'] as $lvl => $amount) {
			if($amount > 0) {
				$monname = $monlvlprint ? 'Lvl '.($lvl + 1) : $this->h3mapscan->GetCreatureById($this->h3mapscan->CS->TownUnits[$towno['subid']][$lvl]);
				$monsters[] = $monname.' = '.$amount;
			}
		}

		$buildings = [];
		foreach($event['buildings'] as $k => $bbyte) {
			for ($i = 0; $i < 8; $i++) {
				if(($bbyte >> $i) & 0x01) {
					$bid = $k * 8 + $i;
					$buildings[] = $this->h3mapscan->GetBuildingById($bid);
				}
			}
		}

		echo '
				<td class="ac specialcell1">'.($e + 1).'</td>
				<td>'.$event['name'].'</td>
				<td>'.$this->h3mapscan->PlayerColors($event['players']).'</td>
				<td class="ac">'.$event['human'].'/'.$event['computerAffected'].'</td>
				<td class="ac">'.$event['firstOccurence'].'</td>
				<td class="ac">'.$event['nextOccurence'].'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $resources).'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $monsters).'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $buildings).'</td>
				<td class="smalltext1">'.nl2br($event['message']).'</td>
			</tr>';
	}

}
echo '</table>';
