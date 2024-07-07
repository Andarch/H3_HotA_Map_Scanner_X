<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
// $this->h3mapscan = $_SESSION['h3mapscan'];

// echo '<br />Templates count: '.$this->h3mapscan->objTemplatesNum.'<br />';
// echo 'Objects type count: '.count($this->h3mapscan->objects_unique).'<br />';
// echo 'Objects total count: '.$this->h3mapscan->objectsNum.'<br />';

asort($this->h3mapscan->objects_unique);

/* echo '<table class="bigtable">
		<tr><td>';
	echo '<pre>';
	print_r($this->h3mapscan->objects_unique);
	// var_dump($this->h3mapscan->objects_unique);
	// echo var_export($this->h3mapscan->objects_unique, true);
	echo '</pre>';
echo '</tr></td></table></br>'; */

$n = 0;
echo '<table id="objectsTable" class="h3DataTable">
		<thead>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">#</th>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Category</th>
				<th class="ac nowrap" nowrap="nowrap">Name</th>
				<th class="ac nowrap" nowrap="nowrap" style="min-width: 70px;">Count</th>
			</tr>
		</thead>
    	<tbody>';
foreach($this->h3mapscan->objects_unique as $objcomboid => $obju) {
    echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obju['category'].'</td>
			<td class="nowrap" nowrap="nowrap">'.$obju['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obju['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>
				</td>
			</tr>
		</table>
	</div>';
