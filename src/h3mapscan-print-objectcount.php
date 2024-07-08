<?php
/** @var H3MAPSCAN_PRINT $this */

ksort($this->h3mapscan->objects_all);

/* echo '<table class="bigtable">
		<tr><td>';
	echo '<pre>';
	print_r($this->h3mapscan->objects_unique);
	// var_dump($this->h3mapscan->objects_unique);
	// echo var_export($this->h3mapscan->objects_unique, true);
	echo '</pre>';
echo '</tr></td></table></br>'; */

$n = 0;
echo '<table id="allObjectsTable" class="h3DataTable">
		<thead>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">#</th>
				<th class="ac nowrap" nowrap="nowrap">Category</th>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Name</th>
				<th class="ac nowrap" nowrap="nowrap" style="min-width: 70px;">Count</th>
			</tr>
		</thead>
    	<tbody>';
foreach($this->h3mapscan->objects_all as $objcategory => $objects) {
	foreach($objects as $objcomboid => $obj) {
		echo '<tr>
				<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$objcategory.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
				<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
				<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
			</tr>';
	}
}
echo '	</tbody>
	</table>
				</td>
			</tr>
		</table>
	</div>';