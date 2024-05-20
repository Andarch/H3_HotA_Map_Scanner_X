<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

//day events
usort($this->h3mapscan->events, 'EventSortByDate');
echo '<table class="smalltable">
		<tr>
			<th class="nowrap" nowrap="nowrap">Events Date</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Human</th>
			<th>AI</th>
			<th class="nowrap" nowrap="nowrap">Players</th>
			<th class="nowrap" nowrap="nowrap">First</th>
			<th class="nowrap" nowrap="nowrap">Interval</th>
			<th class="nowrap" nowrap="nowrap">Resources</th>
			<th>Message</th>
		</tr>';
foreach($this->h3mapscan->events as $k => $event) {
	$eres = [];
	foreach($event['resources'] as $r => $res) {
		if($res != 0) {
			$eres[] = $this->h3mapscan->GetResourceById($r).' '.$res;
		}
	}

	echo '<tr>
		<td class="ac">'.($k+1).'</td>
		<td>'.$event['name'].'</td>
		<td class="ac">'.$event['humanAble'].'</td>
		<td class="ac">'.$event['aiAble'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($event['players'], true).'</td>
		<td class="ar">'.$event['first'].'</td>
		<td class="ar">'.$event['interval'].'</td>
		<td class="nowrap" nowrap="nowrap">'.implode($eres, '<br />').'</td>
		<td>'.nl2br($event['message']).'</td>
	</tr>';
}
echo '</table>';
?>
