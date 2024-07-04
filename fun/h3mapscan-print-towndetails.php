<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//towns list
usort($this->h3mapscan->towns_list, 'SortTownsByName');
$n = 0;
echo '<table class="mediumtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Town Name</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th class="nowrap" nowrap="nowrap">Owner</th>
			<th class="nowrap" nowrap="nowrap">Faction</th>
			<th class="nowrap" nowrap="nowrap"># of</br>Events</th>
			<th class="nowrap" nowrap="nowrap">Garrison</th>
			<th class="nowrap" nowrap="nowrap">Spell</br>Research</th>
			<th class="nowrap" nowrap="nowrap">Spells Always</th>
			<th class="nowrap" nowrap="nowrap">Spells Disabled</th>
			<th class="nowrap" nowrap="nowrap">Buildings Built</th>
			<th class="nowrap" nowrap="nowrap">Buildings Disabled</th>
		</tr>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];

	// Reset the buildingsBuilt and buildingsDisabled variables
	$buildingsBuilt = '';
	$buildingsDisabled = '';

	if(isset($town['buildingsBuilt'])) {
		$buildingsBuilt = implode(', ', $town['buildingsBuilt']);
	}

	if(isset($town['buildingsDisabled'])) {
		$buildingsDisabled = implode(', ', $town['buildingsDisabled']);
	}

	if(isset($town['spellsA'])) {
		$spellsAlways = implode(', ', $town['spellsA']);
	}

	if(isset($town['spellsD'])) {
		$spellsDisabled = implode(', ', $town['spellsD']);
	}

	echo '<tr>
		<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
		<td class="nowrap" nowrap="nowrap">'.$town['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$towno['pos']->GetCoords().'</td>
		<td class="nowrap" nowrap="nowrap">'.$town['player'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$town['affiliation'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$town['eventsnum'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($town['stack']).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$town['spell_research'].'</td>
		<td>'.$spellsAlways.'</td>
		<td>'.$spellsDisabled.'</td>
		<td>'.$buildingsBuilt.'</td>
		<td>'.$buildingsDisabled.'</td>
	</tr>';
}
echo '</table>';
