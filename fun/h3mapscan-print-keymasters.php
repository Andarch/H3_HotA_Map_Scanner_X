<?php
// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//keymaster's list
usort($this->h3mapscan->keys_list, 'KeyMasterSort');
$n = 0;
echo '<table class="smalltable">
		<tr>
			<th>#</th>
			<th>Keymasters</th>
			<th>Subid</th>
			<th>Type</th>
			<th>Position</th>
		</tr>';
foreach($this->h3mapscan->keys_list as $key) {
	$color = FromArray($key['subid'], $this->h3mapscan->CS->ObjectColors);

	echo '<tr>
		<td class="ac">'.(++$n).'</td>
		<td>'.$key['objname'].'</td>
		<td>'.$key['subid'].'</td>
		<td>'.$color.'</td>
		<td>'.$key['pos']->GetCoords().'</td>
	</tr>';
}
echo '</table>';
?>
