<?php
// Retrieve the $h3mapscan object from the session
$this->h3mapscan = $_SESSION['h3mapscan'];

//disabled heroes
$n = 0;
echo '<a name="heroescustom"></a>
	<table class="smalltable">
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
?>
