<?php
/** @var H3MAPSCAN_PRINT $this */

//day events
usort($this->h3mapscan->events, 'EventSortByDate');
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Human</th>
			<th class="nowrap" nowrap="nowrap">AI</th>
			<th class="nowrap" nowrap="nowrap">Players</th>
			<th class="nowrap" nowrap="nowrap">First</th>
			<th class="nowrap" nowrap="nowrap">Interval</th>
			<th class="nowrap" nowrap="nowrap">Resources</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';
foreach($this->h3mapscan->events as $k => $event) {
	$eres = [];
	foreach($event['resources'] as $r => $res) {
		if($res != 0) {
			$eres[] = $this->h3mapscan->GetResourceById($r).' '.$res;
		}
	}

	echo '<tr>
		<td class="rowheader nowrap" nowrap="nowrap">'.($k+1).'</td>
		<td class="nowrap" nowrap="nowrap">'.$event['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$event['humanAble'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$event['aiAble'].'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($event['players'], false).'</td>
		<td lass="ac nowrap" nowrap="nowrap">'.$event['first'].'</td>
		<td lass="ac nowrap" nowrap="nowrap">'.$event['interval'].'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.implode('<br />', $eres).'</td>
		<td class="smalltext1">'.nl2br($event['message']).'</td>
	</tr>';
}
echo '</table>';
