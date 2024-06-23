<?php
/** @var H3MAPSCAN_PRINT $this */

// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//disabled heroes
$n = 0;
echo '<table class="mediumtable">
		<tr><th class="rowheaderLarge1" colspan="3">Disabled Heroes</th></tr>
		<tr><th>#</th><th>Class</th><th>Name(s)</th></tr>';
foreach($this->h3mapscan->disabledHeroes as $class => $heroes) {
	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td>'.$class.'</td>
		<td>'.implode(', ', $heroes).'</td>
	</tr>';
}
echo '</table>';

echo '</br>
	<table class="mediumtable">
		<tr><th class="rowheaderLarge2" colspan="10">Predefined Hero Changes</th></tr>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Players</th>
			<th>Exp</th>
			<th>Sex</th>
			<th>Bio</th>
			<th>Primary</th>
			<th>Skills</th>
			<th>Spells</th>
			<th>Artifacts</th>
		</tr>';
foreach($this->h3mapscan->heroesPredefined as $k => $hero) {
	if($hero['mask'] == 0) {
		//continue;
	}
	$playermask = $this->h3mapscan->playerMask & $hero['mask'];

	$skills = [];
	foreach($hero['skills'] as $skill) {
		$skills[] = $skill[0].': '.$skill[1];
	}

	echo '<tr>
		<td class="rowheader">'.($k+1).'</td>
		<td>'.$hero['name'].'<br />('.$hero['defname'].')</td>
		<td>'.$this->h3mapscan->PlayerColors($playermask).'</td>
		<td class="ar">'.comma($hero['exp']).'</td>
		<td class="ac">'.$hero['sex'].'</td>
		<td>'.nl2br($hero['bio']).'</td>
		<td>'.implode(', ', $hero['priskills']).'</td>
		<td>'.implode('<br />', $skills).'</td>
		<td>'.implode(', ', $hero['spells']).'</td>
		<td>'.implode('<br />', $hero['artifacts']).'</td>
	</tr>';
}
echo '</table>';
//heroes and placeholder list
$n = 0;
echo '</br><table class="mediumtable">
		<tr><th class="rowheaderLarge2" colspan="11">Map Heroes</th></tr>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Position</th>
			<th>Owner</th>
			<th>Class</th>
			<th>Exp</th>
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
		$secondary .= $skill['skill'].': '.$skill['level'];
	}
	$artifacts = implode('<br />', $hero['data']['artifacts']);

	$level = $this->h3mapscan->GetLevelByExp($hero['data']['exp']);

	sort($hero['data']['spells']);

	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td>'.$hero['data']['name'].'</td>
		<td>'.$hero['pos']->GetCoords().'</td>
		<td>'.$color.'</td>
		<td>'.$class.'</td>
		<td>'.comma($hero['data']['exp']).'<br />Level '.$level.'</td>
		<td>'.$primary.'</td>
		<td>'.$secondary.'</td>
		<td>'.$this->h3mapscan->PrintStack($hero['data']['stack']).'</td>
		<td>'.$artifacts.'</td>
		<td>'.implode('<br />', $hero['data']['spells']).'</td>
	</tr>';
}

foreach($this->h3mapscan->heroes_placeholder as $hero) {
	echo '<tr>
		<td class="rowheader">'.(++$n).'</td>
		<td>'.$hero['name'].'</td>
		<td>'.$hero['pos']->GetCoords().'</td>
		<td>'.$this->h3mapscan->GetPlayerColorById($hero['owner']).'</td>
		<td>'.$this->h3mapscan->GetHeroClassByHeroId($hero['heroid']).'</td>
		<td></td>
		<td></td>
		<td></td>
		<td>'.$this->h3mapscan->PrintStack($hero['stack']).'</td>
		<td>'.implode('<br />', $hero['artifacts']).'</td>
		<td></td>
	</tr>';
}
