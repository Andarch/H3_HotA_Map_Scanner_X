<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

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
			<th>Spell</th>
		</tr>';
foreach($this->h3mapscan->towns_list as $towno) {
	$town = $towno['data'];
	echo '<tr>
		<td class="ac">'.(++$n).'</td>
		<td>'.$town['name'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$towno['pos']->GetCoords().'</td>
		<td class="nowrap" nowrap="nowrap">'.$town['player'].'</td>
		<td>'.$town['affiliation'].'</td>
		<td class="ar">'.$town['eventsnum'].'</td>
		<td class="colw100">'.$this->h3mapscan->PrintStack($town['stack']).'</td>
		<td class="ac">'.$town['max_guild'].'</td>
		<td>'.$town['spells'].'</td>
	</tr>';
}
echo '</table>';
?>
