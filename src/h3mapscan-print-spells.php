<?php
/** @var H3MAPSCAN_PRINT $this */

$spells_all = [
	0 => 'Summon Boat',
	1 => 'Scuttle Boat',
	2 => 'Visions',
	3 => 'View Earth',
	4 => 'Disguise',
	5 => 'View Air',
	6 => 'Fly',
	7 => 'Water Walk',
	8 => 'Dimension Door',
	9 => 'Town Portal',
	10 => 'Quicksand',
	11 => 'Land Mine',
	12 => 'Force Field',
	13 => 'Fire Wall',
	14 => 'Earthquake',
	15 => 'Magic Arrow',
	16 => 'Ice Bolt',
	17 => 'Lightning Bolt',
	18 => 'Implosion',
	19 => 'Chain Lightning',
	20 => 'Frost Ring',
	21 => 'Fireball',
	22 => 'Inferno',
	23 => 'Meteor Shower',
	24 => 'Death Ripple',
	25 => 'Destroy Undead',
	26 => 'Armageddon',
	27 => 'Shield',
	28 => 'Air Shield',
	29 => 'Fire Shield',
	30 => 'Protection From Air',
	31 => 'Protection From Fire',
	32 => 'Protection From Water',
	33 => 'Protection From Earth',
	34 => 'Anti-Magic',
	35 => 'Dispel',
	36 => 'Magic Mirror',
	37 => 'Cure',
	38 => 'Resurrection',
	39 => 'Animate Dead',
	40 => 'Sacrifice',
	41 => 'Bless',
	42 => 'Curse',
	43 => 'Bloodlust',
	44 => 'Precision',
	45 => 'Weakness',
	46 => 'Stone Skin',
	47 => 'Disrupting Ray',
	48 => 'Prayer',
	49 => 'Mirth',
	50 => 'Sorrow',
	51 => 'Fortune',
	52 => 'Misfortune',
	53 => 'Haste',
	54 => 'Slow',
	55 => 'Slayer',
	56 => 'Frenzy',
	58 => 'Counterstrike',
	59 => 'Berserk',
	60 => 'Hypnotize',
	61 => 'Forgetfulness',
	62 => 'Blind',
	63 => 'Teleport',
	64 => 'Remove Obstacle',
	65 => 'Clone',
	66 => 'Summon Fire Elemental',
	67 => 'Summon Earth Elemental',
	68 => 'Summon Water Elemental',
	69 => 'Summon Air Elemental',
];

$spellGroups = [];

foreach ($this->h3mapscan->spells_list as $spl) {
    if (!isset($spellGroups[$spl->name])) {
        $spellGroups[$spl->name] = [
            'spellname' => $spl->name,
            'miscmapobjs' => [],
            'towns' => [],
            'heroes' => []
        ];
    }
    
	if ($spl->parent === 'Spell Scroll' || $spl->parent === 'Pyramid' || $spl->parent === 'Spell Shrine') {
    	$location = $spl->parent . ' ' . $spl->mapcoor->GetCoords();
        $spellGroups[$spl->name]['miscmapobjs'][] = $location;
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
    sort($group['miscmapobjs']);
    sort($group['towns']);
    sort($group['heroes']);
    
    $miscmapobjsText = count($group['miscmapobjs']) > 0 ? implode('</br>', $group['miscmapobjs']) : '<span class="tiny-grey-italics">None</span>';
    $townsText = count($group['towns']) > 0 ? implode('</br>', $group['towns']) : '<span class="tiny-grey-italics">None</span>';
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : '<span class="tiny-grey-italics">None</span>';
    
    $consolidatedData[] = [
        'name' => $group['spellname'],
        'miscmapobjs' => $miscmapobjsText,
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
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['miscmapobjs'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['towns'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$spl['heroes'].'</span></td>
			</tr>';
}
echo '</tbody>';
echo '</table>';

echo '</div>';
