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
			<th class="nowrap" nowrap="nowrap">Spells</th>
			<th class="nowrap" nowrap="nowrap">Buildings Built</th>
			<th class="nowrap" nowrap="nowrap">Buildings Disabled</th>
		</tr>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];

	// Reset the buildingsBuilt and buildingsDisabled variables
	$buildingsBuilt = '';
	$buildingsDisabled = '';

	if(isset($town['buildingsBuilt']) && $town['buildingsBuilt']) {
		$buildingsBuilt = implode('</br>', $town['buildingsBuilt']);
	}

	if(isset($town['buildingsDisabled']) && $town['buildingsDisabled']) {
		$buildingsDisabled = implode('</br>', $town['buildingsDisabled']);
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
		<td class="nowrap" nowrap="nowrap">'.$town['spells'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$buildingsBuilt.'</td>
		<td class="nowrap" nowrap="nowrap">'.$buildingsDisabled.'</td>
	</tr>';
}
echo '</table>';
