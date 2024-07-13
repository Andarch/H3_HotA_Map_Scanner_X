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
			<th class="nowrap" nowrap="nowrap">Creatures</th>
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
		if(empty($eres)) {
			$eres[] = EMPTY_DATA;
		}

		$monsters = [];
		foreach($event['monsters'] as $lvl => $amount) {
			if($amount > 0) {
				$monname = $monlvlprint ? 'Level '.($lvl + 1).' Creatures' : $this->h3mapscan->GetCreatureById($this->h3mapscan->CS->TownUnits[$towno['subid']][$lvl]);
				$monsters[] = '+'.$amount.' '.$monname;
			}
		}
		if(empty($monsters)) {
			$monsters[] = EMPTY_DATA;
		}

		// if(!strcmp($town['affiliation'], 'Random')) {
		// 	echo 'hotaLevel7b: '.$event['hotaLevel7b'];
		// 	echo '</br>';
		// 	echo 'hotaAmount: '.$event['hotaAmount'];
		// 	echo '</br>';
		// 	echo 'hotaSpecial: '.implode(', ', $event['hotaSpecial']);
		// }

		$buildings = [];
		foreach($event['buildings'] as $k => $bbyte) {
			for ($i = 0; $i < 8; $i++) {
				if(($bbyte >> $i) & 0x01) {
					$bid = $k * 8 + $i;
					$buildings[] = $this->h3mapscan->GetBuildingById($bid);
				}
			}
		}
		if($event['hotaSpecial'][0] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial1 as $bit => $name) {
				if($event['hotaSpecial'][0] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if($event['hotaSpecial'][1] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial2 as $bit => $name) {
				if($event['hotaSpecial'][1] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if($event['hotaSpecial'][2] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial3 as $bit => $name) {
				if($event['hotaSpecial'][2] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if($event['hotaSpecial'][3] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial4 as $bit => $name) {
				if($event['hotaSpecial'][3] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if($event['hotaSpecial'][4] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial5 as $bit => $name) {
				if($event['hotaSpecial'][4] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if($event['hotaSpecial'][5] > 0) {
			$selectedSpecials = [];
			foreach($this->h3mapscan->CS->TownEventHotaSpecial6 as $bit => $name) {
				if($event['hotaSpecial'][5] & $bit) {
					$buildings[] = $name;
				}
			}
		}
		if(empty($buildings)) {
			$buildings[] = EMPTY_DATA;
		}

		echo '
				<td class="ac specialcell1">'.($e + 1).'</td>
				<td>'.$event['name'].'</td>
				<td>'.$this->h3mapscan->PlayerColors($event['players']).'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$event['humanOrAi'].'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$first.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$period.'</td>';

		if($eres[0] == EMPTY_DATA) {
			echo '<td class="smalltext1 nowrap ac" nowrap="nowrap">'.implode('<br />', $eres).'</td>';
		} else {
			echo '<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $eres).'</td>';
		}

		if($monsters[0] == EMPTY_DATA) {
			echo '<td class="smalltext1 nowrap ac" nowrap="nowrap">'.implode('<br />', $monsters).'</td>';
		} else {
			echo '<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $monsters).'</td>';
		}

		if($buildings[0] == EMPTY_DATA) {
			echo '<td class="smalltext1 ac">'.implode(', ', $buildings).'</td>';
		} else {
			echo '<td class="smalltext1">'.implode(', ', $buildings).'</td>';
		}

		if($event['message'] == EMPTY_DATA) {
			echo '<td class="smalltext1 ac">'.nl2br($event['message']).'</td>';
		} else {
			echo '<td class="smalltext1">'.nl2br($event['message']).'</td>';
		}

		echo '</tr>';
	}

}
echo '</table>';
