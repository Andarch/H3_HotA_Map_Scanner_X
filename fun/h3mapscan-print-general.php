<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<table class="mediumtable">
			<tr><th colspan="2">General Info</th></tr>
			<tr><td class="rowheader">File</td><td>'.$this->h3mapscan->mapfile.'</td></tr>
			<tr><td class="rowheader">Name</td><td>'.$this->h3mapscan->map_name.'</td></tr>
			<tr><td class="rowheader">Description</td><td>'.nl2br($this->h3mapscan->description).'</td></tr>
			<tr><td class="rowheader">Version</td><td>'.$this->h3mapscan->versionname.$subrev.'</td></tr>
			<tr><td class="rowheader">Size</td><td>'.$this->h3mapscan->map_sizename.'</td></tr>
			<tr><td class="rowheader">Levels</td><td>'.($this->h3mapscan->underground ? 2 : 1).'</td></tr>
			<tr><td class="rowheader">Difficulty</td><td>'.$this->h3mapscan->map_diffname.'</td></tr>
			<tr><td class="rowheader">Victory</td><td>'.$this->h3mapscan->victoryInfo.'</td></tr>
			<tr><td class="rowheader">Loss</td><td>'.$this->h3mapscan->lossInfo.'</td></tr>
			<tr><td class="rowheader">Players count</td><td>'.$this->h3mapscan->mapplayersnum.', '.$this->h3mapscan->mapplayershuman.'/'.$this->h3mapscan->mapplayersai.'</td></tr>
			<tr><td class="rowheader">Team count</td><td>'.$this->h3mapscan->teamscount.'</td></tr>
			<tr><td class="rowheader">Heroes level cap</td><td>'.$this->h3mapscan->hero_levelcap.'</td></tr>
			<tr><td class="rowheader">Language</td><td>'.$this->h3mapscan->GetLanguage().'</td></tr>
		</table>';

echo '</br><table class="mediumtable">
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

echo '</br><table style="border:none; margin:0; padding:0;">';

sort($this->h3mapscan->disabledArtifacts);
		echo '<td style="vertical-align:top; border:none;">
			<table class="mediumtable">
				<tr><th>#</th><th>Disabled Artifacts</th></tr>';
		foreach($this->h3mapscan->disabledArtifacts as $k => $art) {
			echo '<tr>
				<td class="ac">'.($k+1).'</td>
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
				<td class="ac">'.($k+1).'</td>
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
				<td class="ac">'.($k+1).'</td>
				<td>'.$spell.'</td>
			</tr>';
		}
		echo '</table>';

		echo '</table>';
?>
