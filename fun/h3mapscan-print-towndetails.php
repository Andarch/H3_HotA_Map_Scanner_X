<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//towns list
usort($this->h3mapscan->towns_list, 'SortTownsByName');
$n = 0;
echo '<table class="smalltable">
		<tr>
			<th class="nowrap" nowrap="nowrap">Towns</th>
			<th>Name</th>
			<th>Position</th>
			<th>Owner</th>
			<th>Type</th>
			<th class="nowrap" nowrap="nowrap">Events</th>
			<th>Troops</th>
			<th>Max Mage Guild</th>
			<th>Spell Research</th>
			<th>Spells</th>
			<th>Buildings Built</th>
			<th>Buildings Disabled</th>
		</tr>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];

	// Reset the buildingsBuilt and buildingsDisabled variables
	$buildingsBuilt = '';
	$buildingsDisabled = '';

	if(isset($town['buildingsBuilt']) && $town['buildingsBuilt']) {
		$buildingsBuilt = implode($town['buildingsBuilt'], '</br>');
	}

	if(isset($town['buildingsDisabled']) && $town['buildingsDisabled']) {
		$buildingsDisabled = implode($town['buildingsDisabled'], '</br>');
	}

	echo '<tr>
		<td class="ac">'.(++$n).'</td>
		<td>'.$town['name'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$towno['pos']->GetCoords().'</td>
		<td class="nowrap" nowrap="nowrap">'.$town['player'].'</td>
		<td>'.$town['affiliation'].'</td>
		<td class="ar">'.$town['eventsnum'].'</td>
		<td class="colw100">'.$this->h3mapscan->PrintStack($town['stack']).'</td>
		<td class="ac">'.$town['max_guild'].'</td>
		<td>'.$town['spell_research'].'</td>
		<td>'.$town['spells'].'</td>
		<td>'.$buildingsBuilt.'</td>
		<td>'.$buildingsDisabled.'</td>
	</tr>';
}
echo '</table>';
