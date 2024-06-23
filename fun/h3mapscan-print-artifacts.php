<?php
// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

		//artifact list
		usort($this->h3mapscan->artifacts_list, 'ListSortByName');
		$n = 0;
		echo '<table class="smalltable">
				<tr><th>Artifacts</th><th>Name</th><th>Position</th><th>Parent</th></tr>';
		foreach($this->h3mapscan->artifacts_list as $art) {
			echo '<tr>
				<td class="ac">'.(++$n).'</td>
				<td>'.$art->name.'</td>
				<td>'.$art->mapcoor->GetCoords().'</td>
				<td>'.$art->parent.'</td>
			</tr>';
		}
		echo '</table>';
