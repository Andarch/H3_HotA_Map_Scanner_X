<?php
/** @var H3MAPSCAN_PRINT $this */

//towns events list
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Town Name</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th class="nowrap" nowrap="nowrap">Owner</th>
			<th class="nowrap" nowrap="nowrap">Type</th>
			<th class="nowrap" nowrap="nowrap">#</th>
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

		$first = 'Day '.$event['firstOccurence'];
		$period = '';
		switch($event['nextOccurence']) {
			case 0:
				$period = EMPTY_DATA;
				break;
			case 1:
				$period = 'Every day';
				break;
			default:
				$period = 'Every '.$event['nextOccurence'].' days';
				break;
		}

		$eres = [];
		if(!empty($event['res'])) {
			foreach($event['res'] as $r => $res) {
				if($res != 0) {
					$sign = $res > 0 ? '+' : '';
					$eres[] = $sign.comma($res).' '.$this->h3mapscan->GetResourceById($r);
				}
			}
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
				<td class="ac">'.$event['humanOrAi'].'</td>
				<td class="ac">'.$first.'</td>
				<td class="ac">'.$period.'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $eres).'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $monsters).'</td>
				<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $buildings).'</td>
				<td class="smalltext1">'.nl2br($event['message']).'</td>
			</tr>';
	}

}
echo '</table>';
