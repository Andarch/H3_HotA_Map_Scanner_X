<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<br />Templates count: '.$this->h3mapscan->objTemplatesNum.'<br />';

		echo 'Objects type count: '.count($this->h3mapscan->objects_unique).'<br />';
		echo 'Objects total count: '.$this->h3mapscan->objectsNum.'<br />';

		asort($this->h3mapscan->objects_unique);
		$n = 0;
		echo '<a name="objects"></a>
			<table class="smalltable">
				<tr><th>Objects</th><th>ID</th><th>Name</th><th>Count</th></tr>';
		foreach($this->h3mapscan->objects_unique as $objid => $obju) {
			echo '<tr>
				<td class="ac">'.(++$n).'</td>
				<td>'.$objid.'</td>
				<td>'.$obju['name'].'</td>
				<td class="ar">'.$obju['count'].'</td>
			</tr>';
		}
		echo '</table>
						</td>
					</tr>
				</table>
			</div>';
?>
