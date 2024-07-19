<?php
/** @var H3MAPSCAN_PRINT $this */

		usort($this->h3mapscan->artifacts_list, 'ListSortByName');

		$itemsPerTable = 40;
		$totalItems = count($this->h3mapscan->artifacts_list);
		$numTables = ceil($totalItems / $itemsPerTable);

		echo '<div class="flex-container">';

		$n = 0;
		for ($i = 0; $i < $numTables; $i++) {
			echo '<table class="smalltable">
					<tr>
						<th>#</th>
						<th>Artifact</th>
						<th>Coordinates</th>
						<th>Parent</th>
					</tr>';

			for ($j = 0; $j < $itemsPerTable; $j++) {
				$n = $i * $itemsPerTable + $j;
				if ($n >= $totalItems) break;
				$art = $this->h3mapscan->artifacts_list[$n];
				echo '<tr>
						<td class="rowheader">'.(++$n).'</td>
						<td>'.$art->name.'</td>
						<td class="ac">'.$art->mapcoor->GetCoords().'</td>
						<td>'.$art->parent.'</td>
					  </tr>';
			}

			echo '</table>';
		}

		echo '</div>';
