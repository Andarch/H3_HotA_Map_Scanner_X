<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3splconstants.php';

// Group by location
$spellLocations = [];
foreach (SPELL_INFO as $splid => $splname) {
	if (!isset($spellLocations[$splname])) {
		$spellLocations[$splname] = [
			'spellname' => $splname,
			'spellid' => $splid,
			'miscmapobjs' => [],
			'towns' => [],
			'heroes' => []
		];
	}
	foreach ($this->h3mapscan->spells_list as $mapspell) {
		if($mapspell->name == $splname) {
			if ($mapspell->parent === 'Spell Scroll' || $mapspell->parent === 'Spell Shrine' || $mapspell->parent === 'Pyramid') {
				$location = $mapspell->parent . ' ' . $mapspell->mapcoor->GetCoords();
				$spellLocations[$mapspell->name]['miscmapobjs'][] = $location;
			} else if ($mapspell->parent === 'Town') {
				$location = $mapspell->add1 . ' ' . $mapspell->mapcoor->GetCoords();
				$spellLocations[$mapspell->name]['towns'][] = $location;
			} else if ($mapspell->parent === 'Hero') {
				$location = $mapspell->add1 . ' ' . $mapspell->mapcoor->GetCoords();
				$spellLocations[$mapspell->name]['heroes'][] = $location;
			}
		}
	}
}

// Create consolidated array
$consolidatedData = [];

foreach ($spellLocations as $group) {
    sort($group['miscmapobjs']);
    sort($group['towns']);
    sort($group['heroes']);
    
    $miscmapobjsText = count($group['miscmapobjs']) > 0 ? implode('</br>', $group['miscmapobjs']) : EMPTY_DATA;
    $townsText = count($group['towns']) > 0 ? implode('</br>', $group['towns']) : EMPTY_DATA;
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : EMPTY_DATA;
    
    $consolidatedData[] = [
        'name' => $group['spellname'],
		'id' => $group['spellid'],
        'miscmapobjs' => $miscmapobjsText,
        'towns' => $townsText,
        'heroes' => $heroesText
    ];
}

// Sort by spell name
usort($consolidatedData, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

// Split by group
$spellGroups = [];
$spellGroups['Disabled'] = [];
$spellGroups['Enabled'] = [];

foreach ($consolidatedData as $spl) {
	$groupKey = in_array($spl['name'], $this->h3mapscan->disabledSpells) ? 'Disabled' : 'Enabled';
	$spellGroups[$groupKey][] = $spl;
}

// Print
echo '<div class="flex-container">';

foreach($spellGroups as $groupName => $spells) {
	$headerClass = strpos($groupName, 'Disabled') === 0 ? 'table__title-bar--small2' : 'table__title-bar--small';	
	echo '<div class="spells-table-container"><table class="table-small spells-table">
				<thead>
					<tr>
						<th class="'.$headerClass.'" colspan="5">'.$groupName.'</th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Spell</th>
						<th>Misc. Map Objects</th>
						<th>Towns</th>
						<th>Heroes</th>
					</tr>
				</thead>
				<tbody>';
	for ($n = 0; $n < count($spells); $n++) {
		$spl = $spells[$n];
		$townsClass = $spl['towns'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';	
		$miscmapobjsClass = $spl['miscmapobjs'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$heroesClass = $spl['heroes'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$splClass = $spl['towns'] == EMPTY_DATA && $spl['miscmapobjs'] == EMPTY_DATA && $spl['heroes'] == EMPTY_DATA ? ' obj-count-inactive' : ' obj-count-active';
		echo '<tr>
				<td class="ac nowrap'.$splClass.'" nowrap="nowrap">'.$spl['id'].'</td>
				<td class="nowrap'.$splClass.'" nowrap="nowrap">'.$spl['name'].'</td>
				<td class="nowrap'.$miscmapobjsClass.'" nowrap="nowrap">'.$spl['miscmapobjs'].'</td>
				<td class="nowrap'.$townsClass.'" nowrap="nowrap">'.$spl['towns'].'</td>
				<td class="nowrap'.$heroesClass.'" nowrap="nowrap">'.$spl['heroes'].'</td>
			</tr>';
	}	
	echo '</tbody>';
	echo '</table></div>';	
}

echo '</div>';

