<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<div class="flex-container">';

usort($this->h3mapscan->events, 'EventSortByDate');
echo '<table class="table-large">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Human / AI</th>
			<th class="nowrap" nowrap="nowrap">Players</th>
			<th class="nowrap" nowrap="nowrap">First</th>
			<th class="nowrap" nowrap="nowrap">Interval</th>
			<th class="nowrap" nowrap="nowrap">Resources</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';

foreach($this->h3mapscan->events as $k => $event) {
	$first = 'Day '.$event['first'];
	$period = '';
	switch($event['interval']) {
		case 0:
			$period = EMPTY_DATA;
			break;
		case 1:
			$period = 'Every day';
			break;
		default:
			$period = 'Every '.$event['interval'].' days';
			break;
	}

	$eres = [];
	foreach($event['resources'] as $r => $res) {
        if($res != 0) {
            $sign = $res > 0 ? '+' : '';
            $eres[] = $sign.comma($res).' '.$this->h3mapscan->GetResourceById($r);
        }
	}

	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">'.($k+1).'</td>
		<td class="nowrap" nowrap="nowrap">'.$event['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$event['humanOrAi'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($event['players'], false).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$first.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$period.'</td>
		<td class="small-text nowrap" nowrap="nowrap">'.implode('<br />', $eres).'</td>
		<td class="small-text">'.nl2br($event['message']).'</td>
	</tr>';
}
echo '</table>';

echo '</div>';
