<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<div class="flex-container">';

echo '<div class="flex-row-container">';

if(!strcmp($this->h3mapscan->description, '')) {
	$this->h3mapscan->description = EMPTY_DATA;}

echo '<table class="bigtable">
		<tr>
			<th class="ac nowrap" nowrap="nowrap" colspan="2">Map</th>
			<th class="ac nowrap" nowrap="nowrap">Version</th>
			<th class="ac nowrap" nowrap="nowrap">Size</th>
			<th class="ac nowrap" nowrap="nowrap"># of</br>Levels</th>
			<th class="ac nowrap" nowrap="nowrap">Difficulty</th>
			<th class="ac nowrap" nowrap="nowrap">Victory</br>Condition</th>
			<th class="ac nowrap" nowrap="nowrap">Loss</br>Condition</th>
			<th>Description</th>
		</tr>
		<tr>
			<td class="ar nowrap specialcell3" nowrap="nowrap">Name</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->map_name.'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="2">'.$this->h3mapscan->versionname.$subrev.'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="2">'.$this->h3mapscan->map_sizename.'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="2">'.($this->h3mapscan->underground ? 2 : 1).'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="2">'.$this->h3mapscan->map_diffname.'</td>
			<td class="ac" rowspan="2">'.$this->h3mapscan->victoryInfo.'</td>
			<td class="ac" rowspan="2">'.$this->h3mapscan->lossInfo.'</td>
			<td class="smalltext1" rowspan="2">'.nl2br($this->h3mapscan->description).'</td>
		</tr>
		<tr>
			<td class="ar nowrap specialcell3" nowrap="nowrap">File</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->mapfile.'</td>
		</tr>
	</table>';

// echo PRINT_BREAK;
echo '</div>';

echo '<div class="flex-row-container">';
// echo '<div class="flex-container">';

echo '<table class="bigtable">
	<tr>
		<th class="ac nowrap" nowrap="nowrap">#</th>
		<th class="ac nowrap" nowrap="nowrap">Color</th>
		<th class="ac nowrap" nowrap="nowrap">Team</th>
		<th class="ac nowrap" nowrap="nowrap">Human</br>Allowed</th>
		<th class="ac nowrap" nowrap="nowrap">AI</br>Allowed</th>
		<th class="ac nowrap" nowrap="nowrap">AI</br>Behaviour</th>
		<th class="ac nowrap" nowrap="nowrap">Allowed</br>Factions</th>
		<th class="ac nowrap" nowrap="nowrap">Has</br>Main Town</th>
		<th class="ac nowrap" nowrap="nowrap">Main Town</br>Faction</th>
		<th class="ac nowrap" nowrap="nowrap">Main Town</br>Position</th>
		<th class="ac nowrap" nowrap="nowrap">Generate Hero</br>at Main Town</th>
		<th class="ac nowrap" nowrap="nowrap">Random Hero</br>on Map</th>
		<th class="ac nowrap" nowrap="nowrap">Specific Heros</br>on Map</th>
	</tr>';

foreach($this->h3mapscan->players as $k => $player) {
	$tm = $this->h3mapscan->teams[($k)];
	$teamNum = $tm + 1;

	if(empty($player['HeroName'])) {
		$player['HeroName'][] = EMPTY_DATA;
	}

	echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.($k + 1).'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($k, true).'</td>
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
			<td class="nowrap" nowrap="nowrap">'.implode(', ', $player['HeroName']).'</td>
		</tr>';
}
echo '</table>';

// echo PRINT_BREAK;
echo '</div>';
echo '<div class="flex-row-container">';
// echo '<div class="flex-container">';

echo '<table class="bigtable">
<tr>
	<th>#</th>
	<th class="nowrap" nowrap="nowrap">Player</th>
	<th class="nowrap" nowrap="nowrap">Town Count</th>
</tr>';

$n = 0;
ksort($this->h3mapscan->townTypeCounts);

foreach ($this->h3mapscan->townTypeCounts as $player => $towns) {
		ksort($towns);
		$townsList = '';
		foreach ($towns as $affiliationKey => $town) {
			$townsList .= $town['affiliation'].': '.$town['count'].'</br>';
		}

	$townsList = rtrim($townsList, ', ');

	echo '<tr>
			<td class="rowheader">'.(++$n).'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($player, true).'</td>
			<td class="nowrap" nowrap="nowrap">'. $townsList . '</td>
		</tr>';
}

echo '</table>';

sort($this->h3mapscan->disabledArtifacts);

echo '<table class="bigtable">
		<tr>
			<th>#</th>
			<th>Disabled Artifacts</th>
		</tr>';
foreach($this->h3mapscan->disabledArtifacts as $k => $art) {
	echo '<tr>
		<td class="rowheader">'.($k+1).'</td>
		<td>'.$art.'</td>
	</tr>';
}
echo '</table>';

sort($this->h3mapscan->disabledSpells);

echo '<table class="bigtable">
		<tr>
			<th>#</th>
			<th>Disabled Spells</th>
		</tr>';
foreach($this->h3mapscan->disabledSpells as $k => $spell) {
	echo '<tr>
		<td class="rowheader">'.($k+1).'</td>
		<td>'.$spell.'</td>
	</tr>';
}
echo '</table>';

sort($this->h3mapscan->disabledSkills);

echo '<table class="bigtable">
		<tr>
			<th>#</th>
			<th>Disabled Skills</th>
		</tr>';
foreach($this->h3mapscan->disabledSkills as $k => $spell) {
	echo '<tr>
		<td class="rowheader">'.($k+1).'</td>
		<td>'.$spell.'</td>
	</tr>';
}
echo '</table>';

echo '<table class="bigtable">
		<tr>
			<th colspan="2">Grail</th>
		</tr>
		<tr>
			<td class="specialcell3 ar">Has Grail</td>
			<td class="ac">'.($this->h3mapscan->hasGrail ? 'Yes' : 'No').'</td>
		</tr>
		<tr>
			<td class="specialcell3 ar"># of Obelisks</td>
			<td class="ac">'.$this->h3mapscan->obelisksnum.'</td>
		</tr>
	</table>';

echo '</div>';
echo '</div>';
