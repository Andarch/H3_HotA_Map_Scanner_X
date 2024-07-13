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
			<th class="nowrap" nowrap="nowrap" colspan="6">Rewards</th>
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
		$content[1] = [];
		$content[2] = [];
		$content[3] = [];
		$content[4] = [];
		$content[5] = [];
		$content[6] = [];

		if($event['gainedExp'] > 0) {
			$content[1][] = '+'.comma($event['gainedExp']).' XP';
		}
		if($event['manaDiff'] != 0) {
			$sign = $event['manaDiff'] > 0 ? '+' : '';
			$content[1][] = $sign.comma($event['manaDiff']).' Mana';
		}
		if($event['moraleDiff'] != 0) {
			$sign = $event['moraleDiff'] > 0 ? '+' : '';
			$content[1][] = $sign.comma($event['moraleDiff']).' Morale';
		}
		if($event['luckDiff'] != 0) {
			$sign = $event['luckDiff'] > 0 ? '+' : '';
			$content[1][] = $sign.comma($event['luckDiff']).' Luck';
		}

		foreach($event['resources'] as $rid => $amount) {
			$sign = $amount > 0 ? '+' : '';
			$content[2][] = $sign.comma($amount).' '.$this->h3mapscan->GetResourceById($rid);
		}

		foreach($event['priSkill'] as $k => $ps) {
			if($ps > 0) {
				$content[3][] = '+'.$ps.' '.$this->h3mapscan->GetPriskillById($k);
			}
		}
		if($content[3] != null && $event['secSkill'] != null) {
			$content[3][] = "\n";
		}
		foreach($event['secSkill'] as $skill) {
			$content[3][] = $skill['level'].' '.$skill['skill'];
		}

		if(!empty($event['artifacts'])) {
			$content[4][] = implode('<br />', $event['artifacts']);
		}
		if(!empty($event['spells'])) {
			$content[5][] = implode('<br />', $event['spells']);
		}

		if(!empty($event['stack'])) {
			$content[6][] = $this->h3mapscan->PrintStackIncrease($event['stack']);
		}

		for($i = 1; $i <= 6; $i++) {
			if(empty($content[$i])) {
				$content[$i][] = EMPTY_DATA;
			}
		}

		echo '<tr>
			<td class="rowheader nowrap" nowrap="nowrap">'.(++$n).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['objname'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$evento['pos']->GetCoords().'</td>
			<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($event['availableFor']).'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$event['humanActivate'].'/'.$event['computerActivate'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$event['removeAfterVisit'].'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap">'.$stack.'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap" style="border-right:none;">'.implode('<br />', $content[1]).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap" style="border-left:1px dashed grey;border-right:none;">'.implode('<br />', $content[2]).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap" style="border-left:1px dashed grey;border-right:none;">'.implode('<br />', $content[3]).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap"" style="border-left:1px dashed grey;border-right:none;">'.implode('<br />', $content[4]).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap"" style="border-left:1px dashed grey;border-right:none;">'.implode('<br />', $content[5]).'</td>
			<td class="smalltext1 nowrap" nowrap="nowrap"" style="border-left:1px dashed grey;">'.implode('<br />', $content[6]).'</td>
			<td class="smalltext1">'.$msg.'</td>
		</tr>';
	}
}
echo '</table>';
