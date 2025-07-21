<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->towns_list, 'SortTownsByName');
$n = 0;
echo '<table class="table-large">
		<thead>
			<tr>
				<th class="nowrap" nowrap="nowrap">#</th>
				<th class="nowrap" nowrap="nowrap">Town<br />Name</th>
				<th class="nowrap" nowrap="nowrap">Coords</th>
				<th class="nowrap" nowrap="nowrap">Owner</th>
				<th class="nowrap" nowrap="nowrap">Faction</th>
				<th class="nowrap" nowrap="nowrap"># of<br />Events</th>
				<th class="nowrap" nowrap="nowrap">Garrison</th>
				<th class="nowrap" nowrap="nowrap">Spell<br />Research</th>
				<th class="nowrap" nowrap="nowrap">Spells<br />Always</th>
				<th class="nowrap" nowrap="nowrap">Spells<br />Disabled</th>
				<th class="nowrap" nowrap="nowrap">Buildings<br />Built</th>
				<th class="nowrap" nowrap="nowrap">Buildings<br />Disabled</th>
			</tr>
		</thead>
    	<tbody>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];

	if(!empty($town['stack'])) {
		$garrison = $this->h3mapscan->PrintStack($town['stack']);
	} else {
		$garrison = EMPTY_DATA;
	}

	if(!empty($town['spellsA'])) {
		$spellsAlways = implode(', ', $town['spellsA']);
	} else {
		$spellsAlways = EMPTY_DATA;
	}

	if(!empty($town['spellsD'])) {
		$spellsDisabled = implode(', ', $town['spellsD']);
	} else {
		$spellsDisabled = EMPTY_DATA;
	}

	$buildingsBuilt = '';
	$buildingsDisabled = '';

	if($town['hasCustomBuildings']) {
		if(!empty($town['buildingsBuilt'])) {
			$buildingsBuilt = implode(', ', $town['buildingsBuilt']);
		} else {
			$buildingsBuilt = EMPTY_DATA;
		}

		if(!empty($town['buildingsDisabled'])) {
			$buildingsDisabled = implode(', ', $town['buildingsDisabled']);
		} else {
			$buildingsDisabled = EMPTY_DATA;
		}
	} else if($town['hasFort']) {
		$buildingsBuilt = 'Fort';
	} else {
		$buildingsBuilt = EMPTY_DATA;
	}

	echo '<tr>
			<td class="table__row-header--default nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$town['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$towno['pos']->GetCoords().'</td>
			<td class="nowrap" nowrap="nowrap">'.$town['player'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$town['affiliation'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$town['eventsnum'].'</td>
			<td class="small-text nowrap" nowrap="nowrap">'.$garrison.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$town['spell_research'].'</td>
			<td class="small-text">'.$spellsAlways.'</td>
			<td class="small-text">'.$spellsDisabled.'</td>
			<td class="small-text">'.$buildingsBuilt.'</td>
			<td class="small-text">'.$buildingsDisabled.'</td>
	</tr>';
}
echo '</tbody></table>';
