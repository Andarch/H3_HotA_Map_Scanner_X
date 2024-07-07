<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//towns list
usort($this->h3mapscan->towns_list, 'SortTownsByName');
$n = 0;
echo '<table id="townDetailsTable" class="h3DataTable">
		<thead>
			<tr>
				<th class="nowrap" nowrap="nowrap">#</th>
				<th class="nowrap" nowrap="nowrap">Town</br>Name</th>
				<th class="nowrap" nowrap="nowrap">Map</br>Coords</th>
				<th class="nowrap" nowrap="nowrap">Owner</th>
				<th class="nowrap" nowrap="nowrap">Faction</th>
				<th class="nowrap" nowrap="nowrap"># of</br>Events</th>
				<th class="nowrap" nowrap="nowrap">Garrison</th>
				<th class="nowrap" nowrap="nowrap">Spell</br>Research</th>
				<th class="nowrap" nowrap="nowrap">Spells</br>Always</th>
				<th class="nowrap" nowrap="nowrap">Spells</br>Disabled</th>
				<th class="nowrap" nowrap="nowrap">Buildings</br>Built</th>
				<th class="nowrap" nowrap="nowrap">Buildings</br>Disabled</th>
			</tr>
		</thead>
    	<tbody>';
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
			<td class="smalltext1 nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($town['stack']).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$town['spell_research'].'</td>
			<td class="smalltext1">'.$spellsAlways.'</td>
			<td class="smalltext1">'.$spellsDisabled.'</td>
			<td class="smalltext1">'.$buildingsBuilt.'</td>
			<td class="smalltext1">'.$buildingsDisabled.'</td>
	</tr>';
}
echo '</tbody></table>';
