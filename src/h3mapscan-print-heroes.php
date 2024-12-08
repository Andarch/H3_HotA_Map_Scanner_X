<?php
/** @var H3MAPSCAN_PRINT $this */

//disabled heroes
$n = 0;
$sep = '</br>';
echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">Disabled Heroes</td>
		</tr>
		<tr>
			<th class="disabled-heroes-column">Knight</th>
			<th class="disabled-heroes-column">Ranger</th>
			<th class="disabled-heroes-column">Alchemist</th>
			<th class="disabled-heroes-column">Demoniac</th>
			<th class="disabled-heroes-column">Death Knight</th>
			<th class="disabled-heroes-column">Overlord</th>
			<th class="disabled-heroes-column">Barbarian</th>
			<th class="disabled-heroes-column">Beastmaster</th>
			<th class="disabled-heroes-column">Planeswalker</th>
			<th class="disabled-heroes-column">Captain</th>
			<th class="disabled-heroes-column">Mercenary</th>
		</tr>
		<tr>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Knight']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Ranger']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Alchemist']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Demoniac']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Death Knight']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Overlord']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Barbarian']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Beastmaster']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Planeswalker']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Captain']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Mercenary']).'</td>
		</tr>
		<tr>
			<th class="disabled-heroes-column">Cleric</th>
			<th class="disabled-heroes-column">Druid</th>
			<th class="disabled-heroes-column">Wizard</th>
			<th class="disabled-heroes-column">Heretic</th>
			<th class="disabled-heroes-column">Necromancer</th>
			<th class="disabled-heroes-column">Warlock</th>
			<th class="disabled-heroes-column">Battle Mage</th>
			<th class="disabled-heroes-column">Witch</th>
			<th class="disabled-heroes-column">Elementalist</th>
			<th class="disabled-heroes-column">Navigator</th>
			<th class="disabled-heroes-column">Artificer</th>
		</tr>
		<tr>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Cleric']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Druid']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Wizard']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Heretic']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Necromancer']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Warlock']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Battle Mage']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Witch']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Elementalist']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Navigator']).'</td>
			<td class="disabled-heroes-cell">'.implode($sep, $this->h3mapscan->disabledHeroes['Artificer']).'</td>
		</tr>
	</table>';

//template heroes
$n = 0;
echo '<table id="heroes-table-2" class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="12">Template Heroes</td>
		</tr>
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

$templateHeroesPrint = [];
foreach($this->h3mapscan->templateHeroes as $k => $templateHero) {
	$templateHeroFaceChanged = false;
	$hotafaceid = $templateHero['id'] + 7;
	if($templateHero['id'] < 156 && $templateHero['pface'] !== 255) {
		$templateHeroFaceChanged = true;
	} else if($templateHero['id'] >= 156 && $templateHero['pface'] !== $hotafaceid) {
		$templateHeroFaceChanged = true;
	}
	if(
		$templateHero['templateHeroName'] !== $templateHero['defName'] ||
		$templateHero['mask'] < 255 ||
		$templateHeroFaceChanged ||
		$templateHero['gender'] !== '' ||
		$templateHero['xp'] > 0 ||
		!empty($templateHero['priskills']) ||
		!empty($templateHero['skills']) ||
		!empty($templateHero['artifacts']) ||
		!empty($templateHero['spells']) ||
		$templateHero['bio'] !== ''
	) {
		$templateHeroesPrint[$k] = $templateHero;
	}
}

foreach($templateHeroesPrint as $k => $templateHeroPrint) {
	if($templateHeroPrint['mask'] < 255) {
		$playermask = $this->h3mapscan->playerMask & $templateHeroPrint['mask'];
		$players = $this->h3mapscan->PlayerColors($playermask);
	} else {
		$players = DEFAULT_DATA;
	}

	$class = $this->h3mapscan->GetHeroClassByHeroId($templateHeroPrint['id']);

	if($templateHeroPrint['gender'] !== '') {
		$gender = $templateHeroPrint['gender'];
	} else {
		$gender = DEFAULT_DATA;
	}

	if($templateHeroPrint['xp'] > 0) {
		$xp = $templateHeroPrint['xp'].' XP';
		$level = 'Level '.$this->h3mapscan->GetLevelByExp($templateHeroPrint['xp']);
	} else {
		$xp = DEFAULT_DATA;
		$level = '';
	}

	if(!empty($templateHeroPrint['priskills'])) {
		$priskills = implode('</br>', $templateHeroPrint['priskills']);
	} else {
		$priskills = DEFAULT_DATA;
	}

	if(!empty($templateHeroPrint['skills'])) {
		$skills = implode(', ', $templateHeroPrint['skills']);
	} else {
		$skills = DEFAULT_DATA;
	}

	if(!empty($templateHeroPrint['artifacts'])) {
		$artifacts = implode('</br>', $templateHeroPrint['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if(!empty($templateHeroPrint['spells'])) {
		$spells = implode(', ', $templateHeroPrint['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	if($templateHeroPrint['bio'] !== '') {
		$bio = nl2br($templateHeroPrint['bio']);
	} else {
		$bio = DEFAULT_DATA;
	}

	echo '<tr>
			<td class="table__row-header--default" rowspan="3">'.(++$n).'</td>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
			<td class="ac nowrap small-text fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-left:none;">'.$templateHeroPrint['mapHeroName'].'</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="3">'.$class.'</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="3">'.$players.'</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="3">'.$gender.'</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="3">'.$xp.'</br>'.$level.'</td>
			<td class="ar small-text nowrap" nowrap="nowrap" rowspan="3">'.$priskills.'</td>
			<td class="al small-text" rowspan="3" style="max-width:500px;">'.$skills.'</td>
			<td class="small-text nowrap" nowrap="nowrap" rowspan="3">'.$artifacts.'</td>
			<td class="small-text" rowspan="3" style="max-width:500px;">'.$spells.'</td>
			<td class="small-text" rowspan="3" style="max-width:500px;">'.$bio.'</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Template</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$templateHeroPrint['templateHeroName'].'</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Def</td>
			<td class="ac nowrap small-text vat" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none; border-bottom:1px dotted grey;">'.$templateHeroPrint['defName'].'</td>
		</tr>';
}
echo '</table>';

//map heroes
$n = 0;
echo '<table id="heroes-table-3" class="table-large">
		<tr><th class="table__title-bar--large" colspan="12">Map Heroes</td></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Position</th>
			<th>Owner</th>
			<th>Class</th>
			<th>XP</th>
			<th>Primary</br>Skills</th>
			<th>Secondary</br>Skills</th>
			<th>Creatures</th>
			<th>Artifacts</th>
			<th>Spells</th>
		</tr>';
foreach($this->h3mapscan->heroes_list as $mapHero) {
	if($mapHero['data']['templateHeroName'] === '') {
		$mapHero['data']['templateHeroName'] = EMPTY_DATA;
	}
	if($mapHero['data']['defName'] === '') {
		$mapHero['data']['defName'] = EMPTY_DATA;
	}

	$color = $mapHero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($mapHero['data']['PlayerColor'], true);

	$class = $this->h3mapscan->GetHeroClassByHeroId($mapHero['data']['subid']);

	$level = $this->h3mapscan->GetLevelByExp($mapHero['data']['xp']);

	if(!empty($mapHero['data']['priskills'])) {
		$primary = implode('</br>', $mapHero['data']['priskills']);
	} else {
		$primary = DEFAULT_DATA;
	}

	$secondary = '';
	if(!empty($mapHero['data']['skills'])) {
		foreach($mapHero['data']['skills'] as $k => $skill) {
			if($k > 0) {
				$secondary .= ', ';
			}
			$secondary .= $skill['level'].' '.$skill['skill'];
		}
	} else {
		$secondary = DEFAULT_DATA;
	}

	if(!empty($mapHero['data']['stack'])) {
		$troops = $this->h3mapscan->PrintStack($mapHero['data']['stack']);
	} else {
		$troops = DEFAULT_DATA;
	}

	if(!empty($mapHero['data']['artifacts'])) {
		$artifacts = implode('</br>', $mapHero['data']['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if(!empty($mapHero['data']['spells'])) {
		sort($mapHero['data']['spells']);
		$spells = implode(', ', $mapHero['data']['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	echo '<tr>
			<td class="table__row-header--default" rowspan="3">'.(++$n).'</td>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
			<td class="ac nowrap small-text fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-left:none;">'.$mapHero['data']['mapHeroName'].'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="3">'.$mapHero['pos']->GetCoords().'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="3">'.$color.'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="3">'.$class.'</td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="3">'.comma($mapHero['data']['xp']).' XP<br />Level '.$level.'</td>
			<td class="ar small-text nowrap" nowrap="nowrap" rowspan="3">'.$primary.'</td>
			<td class="al small-text" rowspan="3" style="max-width:500px;">'.$secondary.'</td>
			<td class="small-text nowrap" nowrap="nowrap" rowspan="3">'.$troops.'</td>
			<td class="small-text nowrap" nowrap="nowrap" rowspan="3">'.$artifacts.'</td>
			<td class="small-text" rowspan="3" style="max-width:500px;">'.$spells.'</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Template</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-left:none; border-bottom:none;">'.$mapHero['data']['templateHeroName'].'</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none;">Def</td>
			<td class="ac nowrap small-text vat" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none;">'.$mapHero['data']['defName'].'</td>
		</tr>';
}

echo '</table>';
