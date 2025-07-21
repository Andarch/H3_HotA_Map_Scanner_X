<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<table class="table-large">
	<tr>
		<th class="ac nowrap" nowrap="nowrap">Color</th>
		<th class="ac nowrap" nowrap="nowrap">Team</th>
		<th class="ac nowrap" nowrap="nowrap">Player<br />Type</th>
		<th class="ac nowrap" nowrap="nowrap">AI<br />Behaviour</th>
		<th class="ac nowrap" nowrap="nowrap">Allowed<br />Factions</th>
		<th class="ac nowrap" nowrap="nowrap">Has<br />Main Town</th>
		<th class="ac nowrap" nowrap="nowrap">Main Town<br />Faction</th>
		<th class="ac nowrap" nowrap="nowrap">Main Town<br />Position</th>
		<th class="ac nowrap" nowrap="nowrap">Generate Hero<br />at Main Town</th>
		<th class="ac nowrap" nowrap="nowrap">Random Hero<br />on Map</th>
		<th class="ac nowrap" nowrap="nowrap">Specific Heros<br />on Map</th>
	</tr>';

foreach($this->h3mapscan->players as $k => $player) {
	$tm = $this->h3mapscan->teams[($k)];
	$teamNum = $tm + 1;

	if($player['human'] == "Yes" && $player['ai'] == "Yes") {
		$allowedPlayers = 'Human / AI';
	} else if ($player['human'] == "Yes") {
		$allowedPlayers = 'Human';
	} else if ($player['ai'] == "Yes") {
		$allowedPlayers = 'AI';
	} else {
		$allowedPlayers = EMPTY_DATA;
	}

	if(empty($player['HeroName'])) {
		$player['HeroName'][] = EMPTY_DATA;
	}

	echo '<tr>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($k, true).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$teamNum.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$allowedPlayers.'</td>
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

echo '<div class="flex-container">';

echo '<table class="table-large">
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
			$townsList .= $town['affiliation'].': '.$town['count'].'<br />';
		}

	$townsList = rtrim($townsList, ', ');

	echo '<tr>
			<td class="table__row-header--default">'.(++$n).'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($player, true).'</td>
			<td class="nowrap" nowrap="nowrap">'. $townsList . '</td>
		</tr>';
}

echo '</table>';

echo '<table class="table-large">
		<tr>
			<th class="ac nowrap" nowrap="nowrap">Difficulty</th>
		</tr>
		<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->map_diffname.'</td>
		</tr>
	</table>';

echo '<table class="table-large">
		<tr>
			<th class="ac nowrap" nowrap="nowrap">Victory<br />Condition</th>
		</tr>
		<tr>
			<td class="ac">'.$this->h3mapscan->victoryInfo.'</td>
		</tr>
	</table>';

echo '<table class="table-large">
		<tr>
			<th class="ac nowrap" nowrap="nowrap">Loss<br />Condition</th>
		</tr>
		<tr>
			<td class="ac">'.$this->h3mapscan->lossInfo.'</td>
		</tr>
	</table>';

sort($this->h3mapscan->disabledArtifacts);

echo '<table class="table-large">
		<tr>
			<th>#</th>
			<th>Disabled Artifacts</th>
		</tr>';
foreach($this->h3mapscan->disabledArtifacts as $k => $art) {
	echo '<tr>
		<td class="table__row-header--default">'.($k+1).'</td>
		<td>'.$art.'</td>
	</tr>';
}
echo '</table>';

sort($this->h3mapscan->disabledComboArtifacts);

echo '<table class="table-large">
		<tr>
			<th>#</th>
			<th>Disabled Assemble/Disassemble</th>
		</tr>';
foreach($this->h3mapscan->disabledComboArtifacts as $k => $artc) {
	echo '<tr>
		<td class="table__row-header--default">'.($k+1).'</td>
		<td>'.$artc.'</td>
	</tr>';
}
echo '</table>';

sort($this->h3mapscan->disabledSpells);

echo '<table class="table-large">
		<tr>
			<th>#</th>
			<th>Disabled Spells</th>
		</tr>';
foreach($this->h3mapscan->disabledSpells as $k => $spell) {
	echo '<tr>
		<td class="table__row-header--default">'.($k+1).'</td>
		<td>'.$spell.'</td>
	</tr>';
}
echo '</table>';

sort($this->h3mapscan->disabledSkills);

echo '<table class="table-large">
		<tr>
			<th>#</th>
			<th>Disabled Skills</th>
		</tr>';
foreach($this->h3mapscan->disabledSkills as $k => $spell) {
	echo '<tr>
		<td class="table__row-header--default">'.($k+1).'</td>
		<td>'.$spell.'</td>
	</tr>';
}
echo '</table>';

echo '<table class="table-large">
		<tr>
			<th colspan="2">Grail</th>
		</tr>
		<tr>
			<td class="table__row-header--alt ar">Has Grail</td>
			<td class="ac">'.($this->h3mapscan->hasGrail ? 'Yes' : 'No').'</td>
		</tr>
		<tr>
			<td class="table__row-header--alt ar"># of Obelisks</td>
			<td class="ac">'.$this->h3mapscan->obelisksnum.'</td>
		</tr>
	</table>';

echo '</div>';
