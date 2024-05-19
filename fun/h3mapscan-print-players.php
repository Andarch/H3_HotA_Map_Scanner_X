<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<a name="players"></a>
	<table class="smalltable">
		<tr>
		<th class="ac nowrap" nowrap="nowrap">#</th>
			<th class="ac nowrap" nowrap="nowrap">Color</th>
			<th class="ac nowrap" nowrap="nowrap">Team</th>
			<th class="ac nowrap" nowrap="nowrap">Human</br>Allowed</th>
			<th class="ac nowrap" nowrap="nowrap">AI</br>Allowed</th>
			<th class="ac nowrap" nowrap="nowrap">AI</br>Behaviour</th>
			<th class="ac nowrap" nowrap="nowrap">Allowed Factions</th>
			<th class="ac nowrap" nowrap="nowrap">Has</br>Main Town</th>
			<th class="ac nowrap" nowrap="nowrap">Main Town</br>Faction</th>
			<th class="ac nowrap" nowrap="nowrap">Main Town</br>Coords</th>
			<th class="ac nowrap" nowrap="nowrap">Generate Hero</br>at Main</th>
			<th class="ac nowrap" nowrap="nowrap">Random Hero</br>Count</th>
			<th class="ac nowrap" nowrap="nowrap">Specific Heros</th>
		</tr>';

foreach($this->h3mapscan->players as $k => $player) {
	$tm = $this->h3mapscan->teams[($k)];
	$teamNum = $tm + 1;

	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.($k + 1).'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($k).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$teamNum.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['human'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['ai'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->GetBehaviour($player['behaviour']).'</td>
			<td class="nowrap" nowrap="nowrap">'.$player['towns_allowed'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['HasMainTown'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['mainTownFaction'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['townpos']->GetCoords().'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['HeroAtMain'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$player['RandomHero'].'</td>
			<td class="nowrap" nowrap="nowrap">'.implode($player['HeroName'], ', ').'</td>
		</tr>';
}
echo '</table>';
?>
