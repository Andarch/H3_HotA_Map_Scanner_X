<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<table class="mediumtable">
		<tr>
			<th class="ac nowrap" nowrap="nowrap">File</th>
			<th class="ac nowrap" nowrap="nowrap">Name</th>
			<th style="width:600px">Description</th>
			<th class="ac nowrap" nowrap="nowrap">Version</th>
			<th class="ac nowrap" nowrap="nowrap">Size</th>
			<th class="ac nowrap" nowrap="nowrap"># of</br>Levels</th>
			<th class="ac nowrap" nowrap="nowrap">Difficulty</th>
			<th class="ac nowrap" nowrap="nowrap">Victory Condition</th>
			<th class="ac nowrap" nowrap="nowrap">Loss Condition</th>
		</tr>
		<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->mapfile.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->map_name.'</td>
			<td style="width:600px">'.nl2br($this->h3mapscan->description).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->versionname.$subrev.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->map_sizename.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.($this->h3mapscan->underground ? 2 : 1).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->map_diffname.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->victoryInfo.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->lossInfo.'</td>
		</tr>
	</table>';

echo '</br><table class="mediumtable">
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
		<th class="ac nowrap" nowrap="nowrap">Main Town</br>Coords</th>
		<th class="ac nowrap" nowrap="nowrap">Generate Hero</br>at Main</th>
		<th class="ac nowrap" nowrap="nowrap">Random Hero</br>Count</th>
		<th class="ac nowrap" nowrap="nowrap">Specific</br>Heros</th>
	</tr>';

foreach($this->h3mapscan->players as $k => $player) {
$tm = $this->h3mapscan->teams[($k)];
$teamNum = $tm + 1;

echo '<tr>
		<td class="rowheader nowrap" nowrap="nowrap">'.($k + 1).'</td>
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

echo '</br><table style="border:none; margin:0; padding:0;">';

sort($this->h3mapscan->disabledArtifacts);
		echo '<td style="vertical-align:top; border:none;">
			<table class="mediumtable">
				<tr><th>#</th><th>Disabled Artifacts</th></tr>';
		foreach($this->h3mapscan->disabledArtifacts as $k => $art) {
			echo '<tr>
				<td class="rowheader">'.($k+1).'</td>
				<td>'.$art.'</td>
			</tr>';
		}
		echo '</table>';

		sort($this->h3mapscan->disabledSpells);
		echo '<td style="vertical-align:top; border:none;">
			<table class="mediumtable">
				<tr><th>#</th><th>Disabled Spells</th></tr>';
		foreach($this->h3mapscan->disabledSpells as $k => $spell) {
			echo '<tr>
				<td class="rowheader">'.($k+1).'</td>
				<td>'.$spell.'</td>
			</tr>';
		}
		echo '</table>';

		sort($this->h3mapscan->disabledSkills);
		echo '<td style="vertical-align:top; border:none;">
			<table class="mediumtable">
				<tr><th>#</th><th>Disabled Skills</th></tr>';
		foreach($this->h3mapscan->disabledSkills as $k => $spell) {
			echo '<tr>
				<td class="rowheader">'.($k+1).'</td>
				<td>'.$spell.'</td>
			</tr>';
		}
		echo '</table>';

		echo '</table>';
?>
