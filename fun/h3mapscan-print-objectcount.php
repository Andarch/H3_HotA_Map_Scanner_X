<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

echo '<br />Templates count: '.$this->h3mapscan->objTemplatesNum.'<br />';

		echo 'Objects type count: '.count($this->h3mapscan->objects_unique).'<br />';
		echo 'Objects total count: '.$this->h3mapscan->objectsNum.'<br />';

		asort($this->h3mapscan->objects_unique);
		foreach ($this->h3mapscan->objects_unique as &$obju) {
			// Step 3: Sort each sub-array by its keys
			ksort($obju);
		}
		unset($obju);

		$n = 0;
		echo '<a name="objects"></a>
			<table class="smalltable">
				<tr>
					<th class="ac nowrap" nowrap="nowrap">#</th>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Sub ID</th>
					<th class="ac nowrap" nowrap="nowrap">Name</th>
					<th class="ac nowrap" nowrap="nowrap">Count</th>
				</tr>';
		foreach($this->h3mapscan->objects_unique as $objid => $obj) {
			foreach($obj as $objsubid => $subobj) {
				echo '<tr>
					<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
					<td class="ac nowrap" nowrap="nowrap">'.$objid.'</td>
					<td class="ac nowrap" nowrap="nowrap">'.$objsubid.'</td>
					<td class="nowrap" nowrap="nowrap">'.$subobj['name'].'</td>
					<td class="ar nowrap" nowrap="nowrap">'.$subobj['count'].'</td>
				</tr>';
			}
		}
		echo '</table>
						</td>
					</tr>
				</table>
			</div>';
