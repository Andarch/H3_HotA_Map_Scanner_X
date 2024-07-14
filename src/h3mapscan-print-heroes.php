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
	$playermask = $this->h3mapscan->playerMask & $herop['mask'];

	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td class="ac nowrap" nowrap="nowrap">'.$herop['name'].'<br /><span style="font-size:0.9em;">('.$herop['defname'].')</span></td>
		<td class="ac nowrap" nowrap="nowrap">'.$this->h3mapscan->PlayerColors($playermask).'</td>
		<td class="ac">'.$herop['xp'].'</td>
		<td class="ac">'.$herop['gender'].'</td>
		<td class"smalltext1">'.nl2br($herop['bio']).'</td>
		<td class"ac smalltext1">'.implode(', ', $herop['priskills']).'</td>
		<td class"smalltext1">'.implode('<br />', $herop['skills']).'</td>
		<td class"smalltext1">'.implode(', ', $herop['spells']).'</td>
		<td class"smalltext1">'.implode('<br />', $herop['artifacts']).'</td>
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
