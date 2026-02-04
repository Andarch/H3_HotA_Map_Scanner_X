<?php
/** @var H3MAPSCAN_PRINT $this */

//disabled heroes
$n = 0;
$sep = '<br />';
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
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Knight']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Ranger']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Alchemist']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Demoniac']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Death Knight']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Overlord']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Barbarian']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Beastmaster']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Planeswalker']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Captain']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Mercenary']) . '</td>
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
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Cleric']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Druid']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Wizard']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Heretic']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Necromancer']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Warlock']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Battle Mage']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Witch']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Elementalist']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Navigator']) . '</td>
			<td class="disabled-heroes-cell">' . implode($sep, $this->h3mapscan->disabledHeroes['Artificer']) . '</td>
		</tr>
	</table>';

//template heroes
$n = 0;
echo '<table id="heroes-table-2" class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="13">Template Heroes</th>
		</tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Portrait</th>
			<th>Class</th>
			<th>Players</th>
			<th>Gender</th>
			<th>XP</th>
			<th>Primary<br />Skills</th>
			<th>Secondary<br />Skills</th>
			<th>Artifacts</th>
			<th>Spells</th>
			<th>Biography</th>
		</tr>';

$templateHeroesPrint = [];
foreach ($this->h3mapscan->templateHeroes as $k => $templateHero) {
	$templateHeroFaceChanged = false;
	$hotafaceid = $templateHero['id'] + 7;
	if ($templateHero['id'] < 156 && $templateHero['pface'] !== 255) {
		$templateHeroFaceChanged = true;
	} else if ($templateHero['id'] >= 156 && $templateHero['pface'] !== $hotafaceid) {
		$templateHeroFaceChanged = true;
	}
	if (
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

foreach ($templateHeroesPrint as $k => $templateHeroPrint) {
	if ($templateHeroPrint['mask'] < 255) {
		$playermask = $this->h3mapscan->playerMask & $templateHeroPrint['mask'];
		$players = $this->h3mapscan->PlayerColors($playermask);
	} else {
		$players = DEFAULT_DATA;
	}

	$class = $this->h3mapscan->GetHeroClassByHeroId($templateHeroPrint['id']);

	if ($templateHeroPrint['gender'] !== '') {
		$gender = $templateHeroPrint['gender'];
	} else {
		$gender = DEFAULT_DATA;
	}

	if ($templateHeroPrint['xp'] > 0) {
		$xp = $templateHeroPrint['xp'] . ' XP';
	} else {
		$xp = DEFAULT_DATA;
	}

	$level = $templateHeroPrint['level'] ?? '';

	if (!empty($templateHeroPrint['priskills'])) {
		$priskills = implode('<br />', $templateHeroPrint['priskills']);
	} else {
		$priskills = DEFAULT_DATA;
	}

	if (!empty($templateHeroPrint['skills'])) {
		$skills = implode(', ', $templateHeroPrint['skills']);
	} else {
		$skills = DEFAULT_DATA;
	}

	if (!empty($templateHeroPrint['artifacts'])) {
		$artifacts = implode('<br />', $templateHeroPrint['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if (!empty($templateHeroPrint['spells'])) {
		$spells = implode(', ', $templateHeroPrint['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	if ($templateHeroPrint['bio'] !== '') {
		$bio = nl2br($templateHeroPrint['bio']);
	} else {
		$bio = DEFAULT_DATA;
	}

	$portrait = $this->h3mapscan->GetPortraitByHeroId($templateHeroPrint['pface'], $templateHeroPrint['id']);

	echo '<tr>
			<td class="table__row-header--default" rowspan="2">' . (++$n) . '</td>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-right:none;">Template</td>
			<td class="ac nowrap small-text fixed-height-row" nowrap="nowrap" style="border-bottom:1px dotted grey; border-left:none;">' . $templateHeroPrint['templateHeroName'] . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="2" style="text-align: center; vertical-align: top;"><img src="' . $portrait . '"></td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="2">' . $class . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="2">' . $players . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="2">' . $gender . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="2">' . $xp . '<br />' . $level . '</td>
			<td class="ar small-text nowrap" nowrap="nowrap" rowspan="2">' . $priskills . '</td>
			<td class="al tiny-text" rowspan="2" style="max-width:500px;">' . $skills . '</td>
			<td class="tiny-text nowrap" nowrap="nowrap" rowspan="2">' . $artifacts . '</td>
			<td class="tiny-text" rowspan="2" style="max-width:500px;">' . $spells . '</td>
			<td class="tiny-text" rowspan="2" style="max-width:500px;">' . $bio . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none;">Def</td>
			<td class="ac nowrap small-text vat" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none;">' . $templateHeroPrint['defName'] . '</td>
		</tr>';
}
echo '</table>';

// Sort heroes_list
usort($this->h3mapscan->heroes_list, function ($a, $b) {
	$order = ['P-1', 'P-2', 'P-3', 'P-4', 'L-1', 'W-1', 'L-2', 'W-2', 'L-3', 'W-3', 'L-4', 'W-4', 'R-1', 'R-2', 'R-3', 'R-4'];

	// First sort by level (descending - higher levels first)
	$levelCompare = $a['data']['level'] <=> $b['data']['level'];
	if ($levelCompare !== 0) {
		return $levelCompare;
	}

	// Then by zone_type
	$posA = array_search($a['zone_type'], $order);
	$posB = array_search($b['zone_type'], $order);
	return $posA <=> $posB;
});

//map heroes
$n = 0;
echo '<table id="heroes-table-3" class="table-small">
		<tr><th class="table__title-bar--large" colspan="100">Map Heroes</td></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Portrait</th>
			<th>Coords</th>
			<th>Zone<br />Owner</th>
			<th>Zone<br />Type</th>
			<th>Class</th>
			<th>XP</th>
			<th>Primary<br />Skills</th>
			<th>Secondary<br />Skills</th>
			<th>Creatures</th>
			<th>Artifacts</th>
			<th>Spells</th>
			<th>Biography</th>
		</tr>';

foreach ($this->h3mapscan->heroes_list as $mapHero) {
	if ($mapHero['data']['prisoner']) {
		continue;
	}

	if ($mapHero['data']['templateHeroName'] === '') {
		$mapHero['data']['templateHeroName'] = EMPTY_DATA;
	}
	if ($mapHero['data']['defName'] === '') {
		$mapHero['data']['defName'] = EMPTY_DATA;
	}

	$objectOwner = $mapHero['data']['prisoner'] ? 'Prisoner' : $this->h3mapscan->GetPlayerColorById($mapHero['data']['PlayerColor']);

	match ($mapHero["zone_owner"]) {
		'Red' => $zone_owner = 1,
		'Blue' => $zone_owner = 2,
		'Tan' => $zone_owner = 3,
		'Green' => $zone_owner = 4,
		'Orange' => $zone_owner = 5,
		'Purple' => $zone_owner = 6,
		'Teal' => $zone_owner = 7,
		'Pink' => $zone_owner = 8,
		'Neutral' => $zone_owner = 256,
	};

	$class = $this->h3mapscan->GetHeroClassByHeroId($mapHero['data']['subid']);

	$level = $mapHero['data']['level'];

	if (!empty($mapHero['data']['priskills'])) {
		$primary = implode('<br />', $mapHero['data']['priskills']);
	} else {
		$primary = DEFAULT_DATA;
	}

	$secondary = '';
	if (!empty($mapHero['data']['skills'])) {
		foreach ($mapHero['data']['skills'] as $k => $skill) {
			if ($k > 0) {
				$secondary .= ', ';
			}
			$secondary .= $skill['level'] . ' ' . $skill['skill'];
		}
	} else {
		$secondary = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['stack'])) {
		$troops = $this->h3mapscan->PrintStack($mapHero['data']['stack']);
	} else {
		$troops = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['artifacts'])) {
		$artifacts = implode('<br />', $mapHero['data']['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['spells'])) {
		sort($mapHero['data']['spells']);
		$spells = implode(', ', $mapHero['data']['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	if ($mapHero['data']['bio'] !== '') {
		$bio = nl2br($templateHeroPrint['bio']);
	} else {
		$bio = DEFAULT_DATA;
	}

	if ($mapHero['data']['subid'] < 156) {
		$defPortraitID = $mapHero['data']['subid'];
	} else if ($mapHero['data']['subid'] < 178) {
		$defPortraitID = $mapHero['data']['subid'] + 7;
	} else {
		$defPortraitID = $mapHero['data']['subid'] + 8;
	}
	if (FromArray($mapHero['data']['portrait'], array: $this->h3mapscan->CS->Portraits) == 'Default') {
		if ($mapHero['data']['templatePortrait'] >= 0) {
			if (FromArray($mapHero['data']['templatePortrait'], $this->h3mapscan->CS->Portraits) == 'Default') {
				$portraitID = $defPortraitID;
			} else {
				$portraitID = $mapHero['data']['templatePortrait'];
			}
		} else {
			$portraitID = $defPortraitID;
		}
	} else {
		$portraitID = $mapHero['data']['portrait'];
	}
	$portrait = $this->h3mapscan->GetPortraitByHeroId($portraitID, $mapHero['data']['subid']);

	echo '<tr>
			<td class="table__row-header--default" style="font-size: 11px"; rowspan="4">' . (++$n) . '</td>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
			<td class="ac nowrap small-text fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-left:none;">' . $mapHero['data']['mapHeroName'] . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="4" style="text-align: center; vertical-align: top;"><img src="' . $portrait . '"></td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $mapHero['pos']->GetCoords() . '</td>
			<td class="ac nowrap player-dark' . $zone_owner . '" nowrap="nowrap" rowspan="4"></td>';

	if ($mapHero['zone_type'] == EMPTY_DATA) {
		$zoneTypeRow = '<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $mapHero['zone_type'] . '</td>';
	} else {
		$zoneTypeRow = '<td class="ac nowrap zone-type" nowrap="nowrap" rowspan="4" data-zone="' . htmlspecialchars($mapHero['zone_type'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($mapHero['zone_type'], ENT_QUOTES, 'UTF-8') . '</td>';
	}

	echo $zoneTypeRow . '
			<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $class . '</td>
			<td class="ac small-text nowrap" nowrap="nowrap" rowspan="4">' . comma($mapHero['data']['xp']) . ' XP<br />Level ' . $level . '</td>
			<td class="ar small-text nowrap" nowrap="nowrap" rowspan="4">' . $primary . '</td>
			<td class="al tiny-text" rowspan="4">' . $secondary . '</td>
			<td class="tiny-text nowrap" nowrap="nowrap" rowspan="4">' . $troops . '</td>
			<td class="tiny-text nowrap" nowrap="nowrap" rowspan="4">' . $artifacts . '</td>
			<td class="tiny-text" rowspan="4">' . $spells . '</td>
			<td class="tiny-text" rowspan="4">' . $bio . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Template</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-left:none; border-bottom:none;">' . $mapHero['data']['templateHeroName'] . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Def</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none; border-bottom:none;">' . $mapHero['data']['defName'] . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; vertical-align: middle;">Player</td>
			<td class="ac nowrap small-text" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none;">' . $objectOwner . '</td>
		</tr>';
}

echo '</table>';

//prisoners
$n = 0;
echo '<table id="heroes-table-4" class="table-small">
		<tr><th class="table__title-bar--large" colspan="100">Prisoners</td></tr>
		<tr>
			<th>#</th>
			<th colspan="2">Hero</th>
			<th>Portrait</th>
			<th>Coords</th>
			<th>Zone<br />Owner</th>
			<th>Zone<br />Type</th>
			<th>Class</th>
			<th>XP</th>
			<th>Primary<br />Skills</th>
			<th>Secondary<br />Skills</th>
			<th>Creatures</th>
			<th>Artifacts</th>
			<th>Spells</th>
			<th>Biography</th>
		</tr>';

foreach ($this->h3mapscan->heroes_list as $mapHero) {
	if (!$mapHero['data']['prisoner']) {
		continue;
	}
	if ($mapHero['data']['templateHeroName'] === '') {
		$mapHero['data']['templateHeroName'] = EMPTY_DATA;
	}
	if ($mapHero['data']['defName'] === '') {
		$mapHero['data']['defName'] = EMPTY_DATA;
	}

	$objectOwner = $this->h3mapscan->GetPlayerColorById($mapHero['data']['PlayerColor']);

	match ($mapHero["zone_owner"]) {
		'Red' => $zone_owner = 1,
		'Blue' => $zone_owner = 2,
		'Tan' => $zone_owner = 3,
		'Green' => $zone_owner = 4,
		'Orange' => $zone_owner = 5,
		'Purple' => $zone_owner = 6,
		'Teal' => $zone_owner = 7,
		'Pink' => $zone_owner = 8,
		'Neutral' => $zone_owner = 256,
	};

	$class = $this->h3mapscan->GetHeroClassByHeroId($mapHero['data']['subid']);

	$level = $mapHero['data']['level'];

	if (!empty($mapHero['data']['priskills'])) {
		$primary = implode('<br />', $mapHero['data']['priskills']);
	} else {
		$primary = DEFAULT_DATA;
	}

	$secondary = '';
	if (!empty($mapHero['data']['skills'])) {
		foreach ($mapHero['data']['skills'] as $k => $skill) {
			if ($k > 0) {
				$secondary .= ', ';
			}
			$secondary .= $skill['level'] . ' ' . $skill['skill'];
		}
	} else {
		$secondary = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['stack'])) {
		$troops = $this->h3mapscan->PrintStack($mapHero['data']['stack']);
	} else {
		$troops = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['artifacts'])) {
		$artifacts = implode('<br />', $mapHero['data']['artifacts']);
	} else {
		$artifacts = DEFAULT_DATA;
	}

	if (!empty($mapHero['data']['spells'])) {
		sort($mapHero['data']['spells']);
		$spells = implode(', ', $mapHero['data']['spells']);
	} else {
		$spells = DEFAULT_DATA;
	}

	if ($mapHero['data']['bio'] !== '') {
		$bio = nl2br($templateHeroPrint['bio']);
	} else {
		$bio = DEFAULT_DATA;
	}

	if ($mapHero['data']['subid'] < 156) {
		$defPortraitID = $mapHero['data']['subid'];
	} else if ($mapHero['data']['subid'] < 178) {
		$defPortraitID = $mapHero['data']['subid'] + 7;
	} else {
		$defPortraitID = $mapHero['data']['subid'] + 8;
	}
	if (FromArray($mapHero['data']['portrait'], array: $this->h3mapscan->CS->Portraits) == 'Default') {
		if ($mapHero['data']['templatePortrait'] >= 0) {
			if (FromArray($mapHero['data']['templatePortrait'], $this->h3mapscan->CS->Portraits) == 'Default') {
				$portraitID = $defPortraitID;
			} else {
				$portraitID = $mapHero['data']['templatePortrait'];
			}
		} else {
			$portraitID = $defPortraitID;
		}
	} else {
		$portraitID = $mapHero['data']['portrait'];
	}
	$portrait = $this->h3mapscan->GetPortraitByHeroId($portraitID, $mapHero['data']['subid']);

	echo '<tr>
			<td class="table__row-header--default" style="font-size: 11px"; rowspan="4">' . (++$n) . '</td>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-right:none;">Map Object</td>
			<td class="ac nowrap small-text fixed-height-row" nowrap="nowrap"
			style="border-bottom:1px dotted grey; border-left:none;">' . $mapHero['data']['mapHeroName'] . '</td>
			<td class="ac nowrap small-text" nowrap="nowrap" rowspan="4" style="text-align: center; vertical-align: top;"><img src="' . $portrait . '"></td>
			<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $mapHero['pos']->GetCoords() . '</td>
			<td class="ac nowrap player-dark' . $zone_owner . '" nowrap="nowrap" rowspan="4"></td>';

	if ($mapHero['zone_type'] == EMPTY_DATA) {
		$zoneTypeRow = '<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $mapHero['zone_type'] . '</td>';
	} else {
		$zoneTypeRow = '<td class="ac nowrap zone-type" nowrap="nowrap" rowspan="4" data-zone="' . htmlspecialchars($mapHero['zone_type'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($mapHero['zone_type'], ENT_QUOTES, 'UTF-8') . '</td>';
	}

	echo $zoneTypeRow . '
			<td class="ac nowrap" nowrap="nowrap" rowspan="4">' . $class . '</td>
			<td class="ac small-text nowrap" nowrap="nowrap" rowspan="4">' . comma($mapHero['data']['xp']) . ' XP<br />Level ' . $level . '</td>
			<td class="ar small-text nowrap" nowrap="nowrap" rowspan="4">' . $primary . '</td>
			<td class="al tiny-text" rowspan="4">' . $secondary . '</td>
			<td class="tiny-text nowrap" nowrap="nowrap" rowspan="4">' . $troops . '</td>
			<td class="tiny-text nowrap" nowrap="nowrap" rowspan="4">' . $artifacts . '</td>
			<td class="tiny-text" rowspan="4">' . $spells . '</td>
			<td class="tiny-text" rowspan="4">' . $bio . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Template</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
				style="border-top:1px dotted grey; border-left:none; border-bottom:none;">' . $mapHero['data']['templateHeroName'] . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; border-bottom:1px dotted grey;">Def</td>
			<td class="ac nowrap small-text vat fixed-height-row" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none; border-bottom:none;">' . $mapHero['data']['defName'] . '</td>
		</tr>
		<tr>
			<td class="ar nowrap hero-name-row-header" nowrap="nowrap"
			style="border-top:1px dotted grey; border-right:none; vertical-align: middle;">Player</td>
			<td class="ac nowrap small-text" nowrap="nowrap"
			style="border-top:1px dotted grey; border-left:none;">' . $objectOwner . '</td>
		</tr>';
}

echo '</table>';
