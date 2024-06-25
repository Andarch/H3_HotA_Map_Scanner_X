<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
// $this->h3mapscan = $_SESSION['h3mapscan'];

// echo '<br />Templates count: '.$this->h3mapscan->objTemplatesNum.'<br />';
// echo 'Objects type count: '.count($this->h3mapscan->objects_unique).'<br />';
// echo 'Objects total count: '.$this->h3mapscan->objectsNum.'<br />';

ksort($this->h3mapscan->objects_unique);
/* uasort($this->h3mapscan->objects_unique, function($a, $b) {
    // Assuming you want to compare the first subarray's name within each
    reset($a); // Move the internal pointer to the first element
    reset($b);
    $firstA = current($a);
    $firstB = current($b);
    return strcmp($firstA['name'], $firstB['name']);
}); */

/* echo '<table class="smalltable">
		<tr><td>';
	echo '<pre>';
	print_r($this->h3mapscan->objects_unique);
	// var_dump($this->h3mapscan->objects_unique);
	// echo var_export($this->h3mapscan->objects_unique, true);
	echo '</pre>';
echo '</tr></td></table></br>'; */

$n = 0;
echo '<a name="objects"></a>
	<table class="smalltable">
		<tr>
			<th class="ac nowrap" nowrap="nowrap">#</th>
			<th class="ac nowrap" nowrap="nowrap">ID</th>
			<th class="ac nowrap" nowrap="nowrap">Sub-ID</th>
			<th class="ac nowrap" nowrap="nowrap">Category</th>
			<th class="ac nowrap" nowrap="nowrap">Name</th>
			<th class="ac nowrap" nowrap="nowrap">Count</th>
		</tr>';
foreach($this->h3mapscan->objects_unique as $objid => $obju) {
	foreach($obju as $objsubid => $objsub) {
		echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$objid.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$objsubid.'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$objsub['category'].'</td>
			<td class="nowrap" nowrap="nowrap">'.$objsub['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$objsub['count'].'</td>
		</tr>';
	}
}
echo '</table>
				</td>
			</tr>
		</table>
	</div>';
