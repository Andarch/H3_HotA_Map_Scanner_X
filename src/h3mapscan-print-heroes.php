<?php
/** @var H3MAPSCAN_PRINT $this */

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
		<td class="rowheader">'.(++$n).'</td>
		<td>'.$class.'</td>
		<td>'.implode(', ', $heroes).'</td>
	</tr>';
}
echo '</table>';

//predefined hero changes
$n = 0;
echo '</br>
	<table class="bigtable">
		<tr><th class="tableheader2" colspan="11">Hero Template Changes</th></tr>
		<tr>
			<th>#</th>
			<th colspan="2" class="thsub">Template Name</br><span class="smalltext3">(Actual Name) | (Def Name)</span></th>
			<th>Players</th>
			<th>XP</th>
			<th>Gender</th>
			<th>Bio</th>
			<th>Primary</th>
			<th>Secondary</th>
			<th>Spells</th>
			<th>Artifacts</th>
		</tr>';

foreach($this->h3mapscan->heroesPredefined as $k => $pHero) {
	$fpHeroes = [];
	$pfaceChanged = false;
	$hotafaceid = $pHero['id'] + 7;
	if($pHero['id'] < 156 && $pHero['pface'] !== 255) {
		$pfaceChanged = true;
	} else if($pHero['id'] >= 156 && $pHero['pface'] !== $hotafaceid) {
		$pfaceChanged = true;
	}
	/* if(
		$pHero['pname'] !== $pHero['defname'] ||
		$pHero['mask'] < 255 ||
		$pfaceChanged ||
		$pHero['xp'] > 0 ||
		$pHero['gender'] !== '' ||
		$pHero['bio'] !== '' ||
		!empty($pHero['priskills']) ||
		!empty($pHero['skills']) ||
		!empty($pHero['spells']) ||
		!empty($pHero['artifacts'])
	) { */
		$fpHeroes[$k] = $pHero;

		// echo 'defname: '.$pHero['defname'].'</br>';
		// echo 'pname: '.$pHero['pname'].'</br>';
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
	// }
}

foreach($fpHeroes as $k => $fpHero) {
	if($fpHero['mask'] < 255) {
		$playermask = $this->h3mapscan->playerMask & $fpHero['mask'];
	} else {
		$playermask = 0;
	}

	echo '<tr>
		<td class="rowheader" rowspan="2">'.(++$n).'</td>
		<td class="ac nowrap" nowrap="nowrap" colspan="2" style="border-bottom:1px dashed grey;;">'.$fpHero['pname'].'</td>
		<td class="ac nowrap" nowrap="nowrap" rowspan="2">'.$this->h3mapscan->PlayerColors($playermask).'</td>
		<td class="ac" rowspan="2">'.$fpHero['xp'].'</td>
		<td class="ac" rowspan="2">'.$fpHero['gender'].'</td>
		<td class"smalltext1" rowspan="2">'.nl2br($fpHero['bio']).'</td>
		<td class"ac smalltext1" rowspan="2">'.implode(', ', $fpHero['priskills']).'</td>
		<td class"smalltext1" rowspan="2">'.implode('<br />', $fpHero['skills']).'</td>
		<td class"smalltext1" rowspan="2">'.implode(', ', $fpHero['spells']).'</td>
		<td class"smalltext1" rowspan="2">'.implode('<br />', $fpHero['artifacts']).'</td>
	</tr>
	<tr>
		<td class="ac nowrap smalltext2" nowrap="nowrap" style="min-width:60px; border-top:1px dashed grey; border-right:1px dashed grey;">('.$fpHero['mname'].')</td>
		<td class="ac nowrap smalltext2" nowrap="nowrap" style="min-width:60px; border-top:1px dashed grey; border-left:1px dashed grey;">('.$fpHero['defname'].')</td>
	</tr>';
}
echo '</table>';

//map heroes
$n = 0;
echo '</br><table class="bigtable">
		<tr><th class="tableheader2" colspan="11">Map Heroes</th></tr>
		<tr>
			<th>#</th>
			<th>Hero</th>
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
	$color = $mHero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($mHero['data']['PlayerColor']);

	$class = $this->h3mapscan->GetHeroClassByHeroId($mHero['data']['subid']);

	$primary = implode(' ', $mHero['data']['priskills']);
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
		<td class="rowheader">'.(++$n).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$mHero['data']['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$mHero['pos']->GetCoords().'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$color.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$class.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.comma($mHero['data']['xp']).' XP<br />Level '.$level.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$primary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$secondary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($mHero['data']['stack']).'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$artifacts.'</td>
		<td class="smalltext1">'.implode(', ', $mHero['data']['spells']).'</td>
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
