<?php
/** @var H3MAPSCAN_PRINT $this */

// echo '<div class="tables-flex-container">';

//disabled heroes
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="tableheader1" colspan="3">Disabled Heroes</th>
		</tr>
		<tr>
			<th>#</th>
			<th>Class</th>
			<th>Heroes</th>
		</tr>';
foreach($this->h3mapscan->disabledHeroes as $class => $heroes) {
	echo '<tr>
		<td class="rowheader" style="padding-top:2px; padding-bottom:2px;">'.(++$n).'</td>
		<td style="padding-top:2px; padding-bottom:2px;">'.$class.'</td>
		<td class="smalltext1" style="padding-top:2px; padding-bottom:2px;">'.implode(', ', $heroes).'</td>
	</tr>';
}
echo '</table>';

//hero template changes
$n = 0;
echo '<table class="bigtable">
		<tr><th class="tableheader2" colspan="12">Custom Heroes</th></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Names</th>
			<th>Class</th>
			<th>Players</th>
			<th>Gender</th>
			<th>XP</th>
			<th>Primary</th>
			<th>Secondary</th>
			<th>Artifacts</th>
			<th>Spells</th>
			<th>Bio</th>
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

		// echo 'defname: '.$pHero['defname'].'</br>';
		// echo 'tname: '.$pHero['tname'].'</br>';
		// echo 'mname: '.$pHero['mname'].'</br>';
		// echo 'mask: '.$pHero['mask'].'</br>';
		// echo 'pface: '.$pHero['pface'].'</br>';
		// echo 'mface: '.$pHero['mface'].'</br>';
		// echo 'id: '.$pHero['id'].'</br>';
		// echo 'xp: '.$pHero['xp'].'</br>';
		// echo 'gender: '.$pHero['gender'].'</br>';
		// echo 'bio: '.$pHero['bio'].'</br>';
		// echo 'priskills: '.implode(', ', $pHero['priskills']).'</br>';
		// echo 'skills: '.implode(', ', $pHero['skills']).'</br>';
		// echo 'spells: '.implode(', ', $pHero['spells']).'</br>';
		// echo 'artifacts: '.implode(', ', $pHero['artifacts']).'</br>';
		// echo '</br>';
	}
}

foreach($fpHeroes as $k => $fpHero) {
	if($fpHero['mask'] < 255) {
		$playermask = $this->h3mapscan->playerMask & $fpHero['mask'];
		$players = $this->h3mapscan->PlayerColors($playermask);
	} else {
		$players = EMPTY_DATA;
	}

	$class = $this->h3mapscan->GetHeroClassByHeroId($fpHero['id']);

	if($fpHero['gender'] !== '') {
		$gender = $fpHero['gender'];
	} else {
		$gender = EMPTY_DATA;
	}

	if($fpHero['xp'] > 0) {
		$xp = $fpHero['xp'].' XP';
		$level = 'Level '.$this->h3mapscan->GetLevelByExp($fpHero['xp']);
	} else {
		$xp = EMPTY_DATA;
		$level = '';
	}

	if(!empty($fpHero['priskills'])) {
		$priskills = implode('</br>', $fpHero['priskills']);
	} else {
		$priskills = EMPTY_DATA;
	}

	if(!empty($fpHero['skills'])) {
		$skills = implode('</br>', $fpHero['skills']);
	} else {
		$skills = EMPTY_DATA;
	}

	if(!empty($fpHero['artifacts'])) {
		$artifacts = implode('</br>', $fpHero['artifacts']);
	} else {
		$artifacts = EMPTY_DATA;
	}

	if(!empty($fpHero['spells'])) {
		$spells = implode(', ', $fpHero['spells']);
	} else {
		$spells = EMPTY_DATA;
	}

	if($fpHero['bio'] !== '') {
		$bio = nl2br($fpHero['bio']);
	} else {
		$bio = EMPTY_DATA;
	}

	echo '<tr>
		<td class="rowheader" rowspan="4">'.(++$n).'</td>
		<td class="ar nowrap specialcell1" nowrap="nowrap" style="border-bottom:1px dotted grey; border-right:none;">Identity</td>
		<td class="al nowrap" nowrap="nowrap" style="border-bottom:1px dotted grey; border-left:none;">'.$fpHero['tname'].'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$class.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$players.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$gender.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$xp.'</br>'.$level.'</td>
		<td class="ac smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$priskills.'</td>
		<td class="ac smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$skills.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$artifacts.'</td>
		<td class="smalltext1" rowspan="4" style="max-width:200px;">'.$spells.'</td>
		<td class="smalltext1" rowspan="4">'.$bio.'</td>
	</tr>
	<tr>
		<td class="ar nowrap specialcell2" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Map</td>
		<td class="al nowrap smalltext2" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$fpHero['mname'].'</td>
	</tr>
	<tr>
		<td class="ar nowrap specialcell2" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Default</td>
		<td class="al nowrap smalltext2" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:1px dotted grey;">'.$fpHero['defname'].'</td>
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
			<th colspan="2">Names</th>
			<th>Coordinates</th>
			<th>Owner</th>
			<th>Class</th>
			<th>XP</th>
			<th>Primary</th>
			<th>Secondary</th>
			<th>Troops</th>
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

	$color = $mHero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($mHero['data']['PlayerColor']);

	$class = $this->h3mapscan->GetHeroClassByHeroId($mHero['data']['subid']);

	$primary = implode('</br>', $mHero['data']['priskills']);
	$secondary = '';
	foreach($mHero['data']['skills'] as $k => $skill) {
		if($k > 0) {
			$secondary .= '<br />';
		}
		$secondary .= $skill['level'].' '.$skill['skill'];
	}
	$artifacts = implode('<br />', $mHero['data']['artifacts']);

	$level = $this->h3mapscan->GetLevelByExp($mHero['data']['xp']);

	sort($mHero['data']['spells']);

	echo '<tr>
		<td class="rowheader" rowspan="4">'.(++$n).'</td>
		<td class="ar nowrap specialcell1" nowrap="nowrap" style="border-bottom:1px dotted grey; border-right:none;">Identity</td>
		<td class="al nowrap" nowrap="nowrap" style="border-bottom:1px dotted grey; border-left:none;">'.$mHero['data']['mname'].'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$mHero['pos']->GetCoords().'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$color.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.$class.'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="4">'.comma($mHero['data']['xp']).' XP<br />Level '.$level.'</td>
		<td class="ac smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$primary.'</td>
		<td class="ac smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$secondary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$this->h3mapscan->PrintStack($mHero['data']['stack']).'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap" rowspan="4">'.$artifacts.'</td>
		<td class="smalltext1" rowspan="4">'.implode(', ', $mHero['data']['spells']).'</td>
	</tr>
	<tr>
		<td class="ar nowrap specialcell2" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Template</td>
		<td class="al nowrap smalltext2" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$mHero['data']['tname'].'</td>
	</tr>
	<tr>
		<td class="ar nowrap specialcell2" nowrap="nowrap" style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Default</td>
		<td class="al nowrap smalltext2" nowrap="nowrap" style="border-top:1px dotted grey; border-left:none; border-bottom:1px dotted grey;">'.$mHero['data']['defname'].'</td>
	</tr>
	<tr>
		<td colspan="2" style="border-top:none;"></td>
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
