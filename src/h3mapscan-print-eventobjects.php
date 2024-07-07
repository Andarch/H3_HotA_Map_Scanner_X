<?php
/** @var H3MAPSCAN_PRINT $this */

//events, pandora box
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Position</th>
			<th class="nowrap" nowrap="nowrap">Available for</th>
			<th class="nowrap" nowrap="nowrap">Human/AI</th>
			<th class="nowrap" nowrap="nowrap">One Visit</th>
			<th class="nowrap" nowrap="nowrap">Guards</th>
			<th class="nowrap" nowrap="nowrap">Content</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';
foreach($this->h3mapscan->events_list as $evento) {
	if($evento['objname'] == 'Event Object') {
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
		if($event['gainedExp'] > 0) {
			$content[] = 'Experience = '.$event['gainedExp'];
		}
		if($event['manaDiff'] != 0) {
			$content[] = 'Mana = '.$event['manaDiff'];
		}
		if($event['moraleDiff'] != 0) {
			$content[] = 'Morale = '.$event['moraleDiff'];
		}
		if($event['luckDiff'] != 0) {
			$content[] = 'Luck = '.$event['luckDiff'];
		}
		foreach($event['resources'] as $rid => $amount) {
			$content[] = $this->h3mapscan->GetResourceById($rid).' = '.$amount;
		}
		foreach($event['priSkill'] as $k => $ps) {
			if($ps > 0) {
				$content[] = $this->h3mapscan->GetPriskillById($k).' = '.$ps;
			}
		}
		foreach($event['secSkill'] as $skill) {
			$content[] = $skill['skill'].' = '.$skill['level'];
		}
		if(!empty($event['artifacts'])) {
			$content[] = 'Artifacts: '.implode(', ', $event['artifacts']);
		}
		if(!empty($event['spells'])) {
			$content[] = 'Spells: '.implode(', ', $event['spells']);
		}
		if(array_key_exists('stack', $event)) {
			$content[] = $this->h3mapscan->PrintStack($event['stack']);
		}


		echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['objname'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['pos']->GetCoords().'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($event['availableFor']).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$event['humanActivate'].'/'.$event['computerActivate'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$event['removeAfterVisit'].'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap">'.$stack.'</td>
			<td class="smalltext1" style="width:25%;">'.implode('<br />', $content).'</td>
			<td class="smalltext1">'.$msg.'</td>
		</tr>';
	}
}
echo '</table>';
