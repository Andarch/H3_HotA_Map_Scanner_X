<?php
/** @var H3MAPSCAN_PRINT $this */

// echo '<div class="tables-flex-container">';

//disabled heroes
$n = 0;
$sep = '</br>';
echo '<table class="bigtable">
		<tr>
			<th class="tableheader1" colspan="11">Disabled Heroes</th>
		</tr>
		<tr>
			<th class="disabledheroescolumn">Knight</th>
			<th class="disabledheroescolumn">Ranger</th>
			<th class="disabledheroescolumn">Alchemist</th>
			<th class="disabledheroescolumn">Demoniac</th>
			<th class="disabledheroescolumn">Death Knight</th>
			<th class="disabledheroescolumn">Overlord</th>
			<th class="disabledheroescolumn">Barbarian</th>
			<th class="disabledheroescolumn">Beastmaster</th>
			<th class="disabledheroescolumn">Planeswalker</th>
			<th class="disabledheroescolumn">Captain</th>
			<th class="disabledheroescolumn">Mercenary</th>
		</tr>
		<tr>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Knight']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Ranger']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Alchemist']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Demoniac']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Death Knight']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Overlord']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Barbarian']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Beastmaster']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Planeswalker']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Captain']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Mercenary']).'</td>
		</tr>
		<tr>
			<th class="disabledheroescolumn">Cleric</th>
			<th class="disabledheroescolumn">Druid</th>
			<th class="disabledheroescolumn">Warlock</th>
			<th class="disabledheroescolumn">Wizard</th>
			<th class="disabledheroescolumn">Heretic</th>
			<th class="disabledheroescolumn">Necromancer</th>
			<th class="disabledheroescolumn">Battle Mage</th>
			<th class="disabledheroescolumn">Witch</th>
			<th class="disabledheroescolumn">Elementalist</th>
			<th class="disabledheroescolumn">Navigator</th>
			<th class="disabledheroescolumn">Artificer</th>
		</tr>
		<tr>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Cleric']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Druid']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Wizard']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Heretic']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Necromancer']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Warlock']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Battle Mage']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Witch']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Elementalist']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Navigator']).'</td>
			<td class="disabledheroescell">'.implode($sep, $this->h3mapscan->disabledHeroes['Artificer']).'</td>
		</tr>
	</table>';

//custom heroes
$n = 0;
echo '<table class="bigtable">
		<tr><th class="tableheader2" colspan="12">Custom Heroes</th></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Class</th>
			<th>Players</th>
			<th>Gender</th>
			<th>XP</th>
			<th>Primary</br>Skills</th>
			<th>Secondary</br>Skills</th>
			<th>Artifacts</th>
			<th>Spells</th>
			<th>Biography</th>
		</tr>';

$fpHeroes = [];
foreach($this->h3mapscan->heroesPredefined as $k => $pHero) {
	$pfaceChanged = false;
	$hotafaceid = $pHero['id'] + 7;
	if($pHero['id'] < 156 && $pHero['pface'] !== 255) {
		$pfaceChanged = true;
	} else if($pHero['id'] >= 156 && $pHero['pface'] !== $hotafaceid) {
		$pfaceChanged = true;
	}
	if(
		$pHero['tname'] !== $pHero['defname'] ||
		$pHero['mask'] < 255 ||
		$pfaceChanged ||
		$pHero['gender'] !== '' ||
		$pHero['xp'] > 0 ||
		!empty($pHero['priskills']) ||
		!empty($pHero['skills']) ||
		!empty($pHero['artifacts']) ||
		!empty($pHero['spells']) ||
		$pHero['bio'] !== ''
	) {
		$fpHeroes[$k] = $pHero;
	}
}

foreach($fpHeroes as $k => $fpHero) {
	if($fpHero['mask'] < 255) {
		$playermask = $this->h3mapscan->playerMask & $fpHero['mask'];
		$players = $this->h3mapscan->PlayerColors($playermask);
	} else {
		$players = DEFAULT_DATA;
	}

	$class = $this->h3mapscan->GetHeroClassByHeroId($fpHero['id']);

	if($fpHero['gender'] !== '') {
		$gender = $fpHero['gender'];
	} else {
		$gender = DEFAULT_DATA;
	}

	if($fpHero['xp'] > 0) {
		$xp = $fpHero['xp'].' XP';
		$level = 'Level '.$this->h3mapscan->GetLevelByExp($fpHero['xp']);
	} else {
		$xp = DEFAULT_DATA;
		$level = '';
	}

	if(!empty($fpHero['priskills'])) {
		$priskills = implode('</br>', $fpHero['priskills']);
	} else {
		$priskills = DEFAULT_DATA;
	}

	if(!empty($fpHero['skills'])) {
		$skills = implode('</br>', $fpHero['skills']);
	} else {
		$skills = DEFAULT_DATA;
	}

	if(!empty($fpHero['artifacts'])) {
		$artifacts = implode('</br>', $fpHero['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if(!empty($fpHero['spells'])) {
		$spells = implode(', ', $fpHero['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	if($fpHero['bio'] !== '') {
		$bio = nl2br($fpHero['bio']);
	} else {
		$bio = DEFAULT_DATA;
	}

	echo '<tr>
		<td class="rowheader" rowspan="4">'.(++$n).'</td>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-bottom:1px dotted grey; border-left:none;">'.$fpHero['mname'].'</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" rowspan="4">'.$class.'</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" rowspan="4">'.$players.'</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" rowspan="4">'.$gender.'</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" rowspan="4">'.$xp.'</br>'.$level.'</td>
		<td class="ar smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$priskills.'</td>
		<td class="al smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$skills.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$artifacts.'</td>
		<td class="smalltext1" rowspan="4" style="max-width:200px;">'.$spells.'</td>
		<td class="smalltext1" rowspan="4">'.$bio.'</td>
	</tr>
	<tr>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Map Specs</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$fpHero['tname'].'</td>
	</tr>
	<tr>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Identity</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:1px dotted grey;">'.$fpHero['defname'].'</td>
	</tr>
	<tr>
		<td class="cellfill" colspan="2" style="border-top:none;"></td>
	</tr>';
}
echo '</table>';

//map heroes
$n = 0;
echo '</br><table class="bigtable">
		<tr><th class="tableheader2" colspan="12">Map Heroes</th></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Coordinates</th>
			<th>Owner</th>
			<th>Class</th>
			<th>XP</th>
			<th>Primary</br>Skills</th>
			<th>Secondary</br>Skills</th>
			<th>Creatures</th>
			<th>Artifacts</th>
			<th>Spells</th>
		</tr>';
foreach($this->h3mapscan->heroes_list as $mHero) {
	if($mHero['data']['tname'] === '') {
		$mHero['data']['tname'] = EMPTY_DATA;
	}
	if($mHero['data']['defname'] === '') {
		$mHero['data']['defname'] = EMPTY_DATA;
	}

	$color = $mHero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($mHero['data']['PlayerColor'], true);

	$class = $this->h3mapscan->GetHeroClassByHeroId($mHero['data']['subid']);

	$level = $this->h3mapscan->GetLevelByExp($mHero['data']['xp']);

	if(!empty($mHero['data']['priskills'])) {
		$primary = implode('</br>', $mHero['data']['priskills']);
	} else {
		$primary = DEFAULT_DATA;
	}

	$secondary = '';
	if(!empty($mHero['data']['skills'])) {
		foreach($mHero['data']['skills'] as $k => $skill) {
			if($k > 0) {
				$secondary .= '<br />';
			}
			$secondary .= $skill['level'].' '.$skill['skill'];
		}
	} else {
		$secondary = DEFAULT_DATA;
	}

	if(!empty($mHero['data']['stack'])) {
		$troops = $this->h3mapscan->PrintStack($mHero['data']['stack']);
	} else {
		$troops = DEFAULT_DATA;
	}

	if(!empty($mHero['data']['artifacts'])) {
		$artifacts = implode('</br>', $mHero['data']['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if(!empty($mHero['data']['spells'])) {
		sort($mHero['data']['spells']);
		$spells = implode(', ', $mHero['data']['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	echo '<tr>
		<td class="rowheader" rowspan="4">'.(++$n).'</td>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-bottom:1px dotted grey; border-left:none;">'.$mHero['data']['mname'].'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$mHero['pos']->GetCoords().'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$color.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$class.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.comma($mHero['data']['xp']).' XP<br />Level '.$level.'</td>
		<td class="ar smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$primary.'</td>
		<td class="al smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$secondary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$troops.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$artifacts.'</td>
		<td class="smalltext1" rowspan="4">'.$spells.'</td>
	</tr>
	<tr>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Map Specs</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$mHero['data']['tname'].'</td>
	</tr>
	<tr>
		<td class="ar nowrap heronameheader" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Identity</td>
		<td class="ac nowrap smalltext1" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:1px dotted grey;">'.$mHero['data']['defname'].'</td>
	</tr>
	<tr>
		<td class="cellfill" colspan="2" style="border-top:none;"></td>
	</tr>';
}

foreach($this->h3mapscan->heroes_placeholder as $hHero) {
	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td class="nowrap" nowrap="nowrap">'.$hHero['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$hHero['pos']->GetCoords().'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($hHero['owner']).'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetHeroClassByHeroId($hHero['heroid']).'</td>
		<td></td>
		<td></td>
		<td></td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($hHero['stack']).'</td>
		<td>'.implode('<br />', $hHero['artifacts']).'</td>
		<td></td>
	</tr>';
}
echo '</table>';

// echo '</div>';
