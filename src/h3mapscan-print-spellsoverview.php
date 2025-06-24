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
			'mapobjs' => [],
			'towns' => [],
			'heroes' => []
		];
	}
	foreach ($this->h3mapscan->spells_list as $spell) {
		if($spell->name == $splname) {
			if ($spell->parent === 'Spell Scroll' || $spell->parent === 'Spell Shrine' || $spell->parent === 'Pyramid') {
				$location = $spell->parent . ' ' . $spell->mapcoor->GetCoords();
				$spellLocations[$spell->name]['mapobjs'][] = $location;
			} else if ($spell->parent === 'Town') {
				$location = $spell->add1 . ' ' . $spell->mapcoor->GetCoords();
				$spellLocations[$spell->name]['towns'][] = $location;
			} else if ($spell->parent === 'Hero') {
				$location = $spell->add1 . ' ' . $spell->mapcoor->GetCoords();
				$spellLocations[$spell->name]['heroes'][] = $location;
			}
		}
	}
}

// Create consolidated array
$consolidatedData = [];

foreach ($spellLocations as $group) {
    sort($group['mapobjs']);
    sort($group['towns']);
    sort($group['heroes']);
    
    $mapobjsText = count($group['mapobjs']) > 0 ? implode('</br>', $group['mapobjs']) : EMPTY_DATA;
    $townsText = count($group['towns']) > 0 ? implode('</br>', $group['towns']) : EMPTY_DATA;
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : EMPTY_DATA;
    
    $consolidatedData[] = [
        'name' => $group['spellname'],
		'id' => $group['spellid'],
        'mapobjs' => $mapobjsText,
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
	$headerClass = strpos($groupName, 'Disabled') === 0 ? 'table__title-bar--small3' : 'table__title-bar--small';	
	echo '<div class="spells-table-container"><table class="table-small spells-table">
				<thead>
					<tr>
						<th class="'.$headerClass.'" colspan="5">'.$groupName.'</th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Spell</th>
						<th>Map Objects</th>
						<th>Towns</th>
						<th>Heroes</th>
					</tr>
				</thead>
				<tbody>';
	for ($n = 0; $n < count($spells); $n++) {
		$spl = $spells[$n];
		$townsClass = $spl['towns'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';	
		$mapobjsClass = $spl['mapobjs'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$heroesClass = $spl['heroes'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$splClass = $spl['towns'] == EMPTY_DATA && $spl['mapobjs'] == EMPTY_DATA && $spl['heroes'] == EMPTY_DATA ? ' obj-count-inactive' : ' obj-count-active';
		echo '<tr>
				<td class="ac nowrap'.$splClass.'" nowrap="nowrap">'.$spl['id'].'</td>
				<td class="nowrap'.$splClass.'" nowrap="nowrap">'.$spl['name'].'</td>
				<td class="nowrap'.$mapobjsClass.'" nowrap="nowrap">'.$spl['mapobjs'].'</td>
				<td class="nowrap'.$townsClass.'" nowrap="nowrap">'.$spl['towns'].'</td>
				<td class="nowrap'.$heroesClass.'" nowrap="nowrap">'.$spl['heroes'].'</td>
			</tr>';
	}	
	echo '</tbody>';
	echo '</table></div>';	
}

echo '</div>';

