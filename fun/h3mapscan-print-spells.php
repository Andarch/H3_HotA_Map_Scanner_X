<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

		//spell list
		usort($this->h3mapscan->spells_list, 'ListSortByName');
		$n = 0;
		echo '<a name="spells"></a>
			<table class="bigtable">
				<tr><th>Spells</th><th>Name</th><th>Position</th><th>Parent</th></tr>';
		foreach($this->h3mapscan->spells_list as $art) {
			echo '<tr>
				<td class="ac">'.(++$n).'</td>
				<td>'.$art->name.'</td>
				<td>'.$art->mapcoor->GetCoords().'</td>
				<td>'.$art->parent.'</td>
			</tr>';
		}
		echo '</table>';
