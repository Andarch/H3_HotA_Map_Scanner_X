<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//monolith list
ksort($this->h3mapscan->monolith_list);
$n = 0;
echo '<a name="monolith"></a>
	<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Color</th>
			<th class="nowrap" nowrap="nowrap">Count</th>
			<th class="nowrap" nowrap="nowrap">Positions</th>
		</tr>';
$prev = false;
$positions = [];
foreach($this->h3mapscan->monolith_list as $objid => $liths) {
	ksort($liths);
	foreach($liths as $subid => $lith) {
		$name = $this->h3mapscan->GetObjectNameById($objid);
		$color = EMPTY_DATA;
		if($objid == OBJECTS::MONOLITH_PORTAL_TWO_WAY) {
			$color = FromArray($subid, $this->h3mapscan->CS->MonolithsTwo);
		}
		elseif($objid == OBJECTS::MONOLITH_PORTAL_ONE_WAY_ENTRANCE || $objid == OBJECTS::MONOLITH_PORTAL_ONE_WAY_EXIT) {
			$color = FromArray($subid, $this->h3mapscan->CS->MonolithsOne);
		}

		echo '
			<tr>
				<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
				<td class="nowrap" nowrap="nowrap">'.$name.'</td>
				<td class="nowrap" nowrap="nowrap">'.$color.'</td>
				<td class="ac nowrap" nowrap="nowrap">'.count($lith).'</td>
				<td class="ac nowrap" nowrap="nowrap">'.implode('<br />', $lith).'</td>
			</tr>';
	}
}
