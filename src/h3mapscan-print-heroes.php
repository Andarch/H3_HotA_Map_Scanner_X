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
		<tr><th class="tableheader2" colspan="10">Predefined Hero Changes</th></tr>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Players</th>
			<th>XP</th>
			<th>Gender</th>
			<th>Bio</th>
			<th>Primary</th>
			<th>Secondary</th>
			<th>Spells</th>
			<th>Artifacts</th>
		</tr>';

foreach($this->h3mapscan->heroesPredefined as $k => $herop) {
	$heropf = [];
	if(
		$herop['name'] !== $herop['defname'] ||
		$herop['mask'] < 255 ||
		$herop['face'] !== $herop['id'] ||
		$herop['xp'] > 0 ||
		$herop['gender'] !== '' ||
		$herop['bio'] !== '' ||
		!empty($herop['priskills']) ||
		!empty($herop['skills']) ||
		!empty($herop['spells']) ||
		!empty($herop['artifacts'])
	) {
		$heropf[$k] = $herop;

		echo 'name: '.$herop['name'].'</br>';
		echo 'defname: '.$herop['defname'].'</br>';
		echo 'mask: '.$herop['mask'].'</br>';
		echo 'face: '.$herop['face'].'</br>';
		echo 'id: '.$herop['id'].'</br>';
		echo 'xp: '.$herop['xp'].'</br>';
		echo 'gender: '.$herop['gender'].'</br>';
		echo 'bio: '.$herop['bio'].'</br>';
		echo 'priskills: '.implode(', ', $herop['priskills']).'</br>';
		echo 'skills: '.implode(', ', $herop['skills']).'</br>';
		echo 'spells: '.implode(', ', $herop['spells']).'</br>';
		echo 'artifacts: '.implode(', ', $herop['artifacts']).'</br>';
		echo '</br>';
	}
}

foreach($heropf as $k => $hero) {
	$playermask = $this->h3mapscan->playerMask & $hero['mask'];

	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$hero['name'].'<br /><span style="font-size:0.9em;">('.$hero['defname'].')</span></td>
		<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($playermask).'</td>
		<td class="ac">'.$hero['xp'].'</td>
		<td class="ac">'.$hero['gender'].'</td>
		<td class"smalltext1">'.nl2br($hero['bio']).'</td>
		<td class"ac smalltext1">'.implode(', ', $hero['priskills']).'</td>
		<td class"smalltext1">'.implode('<br />', $hero['skills']).'</td>
		<td class"smalltext1">'.implode(', ', $hero['spells']).'</td>
		<td class"smalltext1">'.implode('<br />', $hero['artifacts']).'</td>
	</tr>';
}
echo '</table>';

//map heroes
$n = 0;
echo '</br><table class="bigtable">
		<tr><th class="tableheader2" colspan="11">Map Heroes</th></tr>
		<tr>
			<th>#</th>
			<th>Heroes</th>
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
foreach($this->h3mapscan->heroes_list as $hero) {
	$color = $hero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($hero['data']['PlayerColor']);

	$class = $this->h3mapscan->GetHeroClassByHeroId($hero['data']['subid']);

	$primary = implode(' ', $hero['data']['priskills']);
	$secondary = '';
	foreach($hero['data']['skills'] as $k => $skill) {
		if($k > 0) {
			$secondary .= '<br />';
		}
		$secondary .= $skill['level'].' '.$skill['skill'];
	}
	$artifacts = implode('<br />', $hero['data']['artifacts']);

	$level = $this->h3mapscan->GetLevelByExp($hero['data']['xp']);

	sort($hero['data']['spells']);

	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$hero['data']['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$hero['pos']->GetCoords().'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$color.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$class.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.comma($hero['data']['xp']).' XP<br />Level '.$level.'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$primary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$secondary.'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($hero['data']['stack']).'</td>
		<td class="smalltext1 nowrap" nowrap="nowrap">'.$artifacts.'</td>
		<td class="smalltext1">'.implode(', ', $hero['data']['spells']).'</td>
	</tr>';
}

foreach($this->h3mapscan->heroes_placeholder as $hero) {
	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td class="nowrap" nowrap="nowrap">'.$hero['name'].'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$hero['pos']->GetCoords().'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetPlayerColorById($hero['owner']).'</td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->GetHeroClassByHeroId($hero['heroid']).'</td>
		<td></td>
		<td></td>
		<td></td>
		<td class="nowrap" nowrap="nowrap">'.$this->h3mapscan->PrintStack($hero['stack']).'</td>
		<td>'.implode('<br />', $hero['artifacts']).'</td>
		<td></td>
	</tr>';
}
