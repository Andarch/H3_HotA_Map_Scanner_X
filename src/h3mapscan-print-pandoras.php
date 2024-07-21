<?php
/** @var H3MAPSCAN_PRINT $this */

//events, pandora box
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th class="nowrap" nowrap="nowrap">Difficulty</th>
			<th class="nowrap" nowrap="nowrap">Guardians</th>
			<th class="nowrap" nowrap="nowrap" colspan="6">Rewards</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';
foreach($this->h3mapscan->events_list as $evento) {
	if($evento['objname'] == 'Pandora\'s Box') {
		$event = $evento['data'];

		$stack = '';
		$msg = '';
		if(!empty($event['MessageStack'])) {
			$msg = nl2br($event['MessageStack']['message']);
			if(array_key_exists('stack', $event['MessageStack'])) {
				$stack = $this->h3mapscan->PrintStack($event['MessageStack']['stack']);
			}
		}

		$content = [];
		$content = $this->h3mapscan->CreateRewardContents($event);

		echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['objname'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['pos']->GetCoords().'</td>
			<td class="ac" style="width:120px;">'.implode(', ', $event['difficulty']).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap">'.$stack.'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[1]).'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[2]).'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[3]).'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[4]).'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[5]).'</td>
			<td class="smalltext1 thinvertical nowrap" nowrap="nowrap">'.implode('<br />', $content[6]).'</td>
			<td class="smalltext1">'.$msg.'</td>
		</tr>';
	}
}
echo '</table>';
