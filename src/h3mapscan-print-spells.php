<?php
/** @var H3MAPSCAN_PRINT $this */

// Group spells by name, collecting heroes and towns separately
$spellGroups = [];

foreach ($this->h3mapscan->spells_list as $spl) {
    if (!isset($spellGroups[$spl->name])) {
        $spellGroups[$spl->name] = [
            'spellname' => $spl->name,
            'spellobjs' => [],
            'towns' => [],
            'heroes' => []
        ];
    }
    
	if ($spl->parent === 'Spell Scroll' || $spl->parent === 'Pyramid' || $spl->parent === 'Spell Shrine') {
    	$location = $spl->parent . ' ' . $spl->mapcoor->GetCoords();
        $spellGroups[$spl->name]['spellobjs'][] = $location;
    } else if ($spl->parent === 'Town') {		
    	$location = $spl->add1 . ' ' . $spl->mapcoor->GetCoords();
        $spellGroups[$spl->name]['towns'][] = $location;
    } else if ($spl->parent === 'Hero') {
    	$location = $spl->add1 . ' ' . $spl->mapcoor->GetCoords();
        $spellGroups[$spl->name]['heroes'][] = $location;
    }
}

// Create consolidated array
$consolidatedData = [];

foreach ($spellGroups as $group) {
    sort($group['spellobjs']);
    sort($group['towns']);
    sort($group['heroes']);
    
    $spellobjsText = count($group['spellobjs']) > 0 ? implode('</br>', $group['spellobjs']) : '<span class="tiny-grey-italics">None</span>';
    $townsText = count($group['towns']) > 0 ? implode('</br>', $group['towns']) : '<span class="tiny-grey-italics">None</span>';
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : '<span class="tiny-grey-italics">None</span>';
    
    $consolidatedData[] = [
        'name' => $group['spellname'],
        'spellobjs' => $spellobjsText,
        'towns' => $townsText,
        'heroes' => $heroesText
    ];
}

// Sort by spell name
usort($consolidatedData, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

$totalItems = count($consolidatedData);

echo '<div class="flex-container">';

echo '<table class="table-large spells-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Spell</th>
					<th>Misc. Map Objects</th>
					<th>Towns</th>
					<th>Heroes</th>
				</tr>
			</thead>
			<tbody>';
for ($n = 0; $n < $totalItems; $n++) {
	$spl = $consolidatedData[$n];
	echo '<tr>
			<td class="table__row-header--default">'.($n + 1).'</td>
			<td class="nowrap" nowrap="nowrap">'.$spl['name'].'</td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['spellobjs'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['towns'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['heroes'].'</span></td>
			</tr>';
}
echo '</tbody>';
echo '</table>';

echo '</div>';
