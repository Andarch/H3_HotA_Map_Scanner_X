<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

//monolith list
ksort($this->h3mapscan->monolith_list);
$n = 0;
echo '<a name="monolith"></a>
	<table class="smalltable">
		<tr>
			<th>#</th>
			<th>Monolith</th>
			<th>Subid</th>
			<th>Color</th>
			<th>Count</th>
			<th>Positions</th>
		</tr>';
$prev = false;
$positions = [];
foreach($this->h3mapscan->monolith_list as $objid => $liths) {
	ksort($liths);
	foreach($liths as $subid => $lith) {
		$name = $this->h3mapscan->GetObjectById($objid);
		$color = '';
		if($objid == OBJECTS::MONOLITH_TWO_WAY) {
			$color = FromArray($subid, $this->h3mapscan->CS->MonolithsTwo);
		}
		elseif($objid == OBJECTS::MONOLITH_ONE_WAY_ENTRANCE || $objid == OBJECTS::MONOLITH_ONE_WAY_EXIT) {
			$color = FromArray($subid, $this->h3mapscan->CS->MonolithsOne);
		}

		echo '
			<tr>
				<td class="ac">'.(++$n).'</td>
				<td>'.$name.'</td>
				<td class="ac">'.$subid.'</td>
				<td>'.$color.'</td>
				<td class="ac">'.count($lith).'</td>
				<td>'.implode($lith, '<br />').'</td>
			</tr>';
	}
}
?>
