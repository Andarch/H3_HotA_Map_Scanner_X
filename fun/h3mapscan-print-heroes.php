<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

//disabled heroes
$n = 0;
echo '<table class="smalltable">
		<tr><th>#</th><th colspan="2">Unavailable Heroes</th></tr>';
foreach($this->h3mapscan->disabledHeroes as $class => $heroes) {
	echo '<tr>
		<td class="ac">'.(++$n).'</td>
		<td>'.$class.'</td>
		<td>'.implode($heroes, ', ').'</td>
	</tr>';
}
echo '</table>';

echo '
	<table class="smalltable">
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
		<td class="ac">'.($k+1).'</td>
		<td>'.$hero['name'].'<br />('.$hero['defname'].')</td>
		<td>'.$this->h3mapscan->PlayerColors($playermask).'</td>
		<td class="ar">'.comma($hero['exp']).'</td>
		<td class="ac">'.$hero['sex'].'</td>
		<td>'.nl2br($hero['bio']).'</td>
		<td>'.implode($hero['priskills'], ', ').'</td>
		<td>'.implode($skills, '<br />').'</td>
		<td>'.implode($hero['spells'], ', ').'</td>
		<td>'.implode($hero['artifacts'], '<br />').'</td>
	</tr>';
}
echo '</table>';
//heroes and placeholder list
$n = 0;
echo '<table class="smalltable">
		<tr>
			<th>Heroes</th>
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

	$primary = implode($hero['data']['priskills'], ' ');
	$secondary = '';
	foreach($hero['data']['skills'] as $k => $skill) {
		if($k > 0) {
			$secondary .= '<br />';
		}
		$secondary .= $skill['skill'].': '.$skill['level'];
	}
	$artifacts = implode($hero['data']['artifacts'], '<br />');

	$level = $this->h3mapscan->GetLevelByExp($hero['data']['exp']);

	sort($hero['data']['spells']);

	echo '<tr>
		<td>'.(++$n).'</td>
		<td>'.$hero['data']['name'].'</td>
		<td>'.$hero['pos']->GetCoords().'</td>
		<td>'.$color.'</td>
		<td>'.$class.'</td>
		<td>'.comma($hero['data']['exp']).'<br />Level '.$level.'</td>
		<td>'.$primary.'</td>
		<td>'.$secondary.'</td>
		<td>'.$this->h3mapscan->PrintStack($hero['data']['stack']).'</td>
		<td>'.$artifacts.'</td>
		<td>'.implode($hero['data']['spells'], '<br />').'</td>
	</tr>';
}

foreach($this->h3mapscan->heroes_placeholder as $hero) {
	echo '<tr>
		<td>'.(++$n).'</td>
		<td>'.$hero['name'].'</td>
		<td>'.$hero['pos']->GetCoords().'</td>
		<td>'.$this->h3mapscan->GetPlayerColorById($hero['owner']).'</td>
		<td>'.$this->h3mapscan->GetHeroClassByHeroId($hero['heroid']).'</td>
		<td></td>
		<td></td>
		<td></td>
		<td>'.$this->h3mapscan->PrintStack($hero['stack']).'</td>
		<td>'.implode($hero['artifacts'], '<br />').'</td>
		<td></td>
	</tr>';
}
?>
