<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<a name="general"></a>
	<table class="bigtable">
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
?>
