<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<table style="border:none;">';

sort($this->h3mapscan->disabledArtifacts);
		echo '<td style="vertical-align:top; border:none;">
			<table class="smalltable">
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
			<table class="smalltable">
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
			<table class="smalltable">
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
