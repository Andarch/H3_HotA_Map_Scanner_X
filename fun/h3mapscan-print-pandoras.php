<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//events, pandora box
$n = 0;
echo '<table class="smalltable">
		<tr><th>#</th><th>Event / Box</th><th>Position</th><th>Available for</th><th>Human/AI</th><th>One visit</th>
			<th>Guards</th><th>Content</th>
			<th style="width: 50%;">Text</th>
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
			<td class="ac">'.(++$n).'</td>
			<td>'.$evento['objname'].'</td>
			<td>'.$evento['pos']->GetCoords().'</td>
			<td>'.$this->h3mapscan->PlayerColors($event['availableFor']).'</td>
			<td class="ac">'.$event['humanActivate'].'/'.$event['computerActivate'].'</td>
			<td class="ac">'.$event['removeAfterVisit'].'</td>
			<td>'.$stack.'</td>
			<td>'.implode('<br />', $content).'</td>
			<td>'.$msg.'</td>
		</tr>';
	}
}
echo '</table>';
