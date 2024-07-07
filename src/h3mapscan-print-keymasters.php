<?php
/** @var H3MAPSCAN_PRINT $this */

//keymaster's list
usort($this->h3mapscan->keys_list, 'KeyMasterSort');
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Type</th>
			<th class="nowrap" nowrap="nowrap"v>Position</th>
		</tr>';
foreach($this->h3mapscan->keys_list as $key) {
	$color = FromArray($key['subid'], $this->h3mapscan->CS->ObjectColors);

	echo '<tr>
		<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
		<td class="nowrap" nowrap="nowrap">'.$key['objname'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$color.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$key['pos']->GetCoords().'</td>
	</tr>';
}
echo '</table>';
