<?php
/** @var H3MAPSCAN_PRINT $this */

$artifactGroups = [];

foreach ($this->h3mapscan->artifacts_list as $art) {
	if(
		substr($art->name, 0, 6) != 'Random'
		&& $art->name != 'Spell Book'
		&& $art->name != 'Ammo Cart'
		&& $art->name != 'Ballista'
		&& $art->name != 'Cannon'
		&& $art->name != 'First Aid Tent') {
		if (!isset($artifactGroups[$art->name])) {
			$artifactGroups[$art->name] = [
				'artifactname' => $art->name,
				'mapobjs' => [],
				'miscmapobjs' => [],
				'heroes' => []
			];
		}
		
		if ($art->parent === 'Map') {
			$location = 'Artifact ' . $art->mapcoor->GetCoords();
			$artifactGroups[$art->name]['mapobjs'][] = $location;
		} else if ($art->parent != 'Hero') {
			if($art->parent == 'Monster') {
				$name = $art->add1;
			} else {
				$name = $art->parent;
			}
			$location = $name . ' ' . $art->mapcoor->GetCoords();
			$artifactGroups[$art->name]['miscmapobjs'][] = $location;
		} else if ($art->parent === 'Hero') {
			$location = $art->add1 . ' ' . $art->mapcoor->GetCoords();
			$artifactGroups[$art->name]['heroes'][] = $location;
		}
	}
}

// Create consolidated array
$consolidatedData = [];

foreach ($artifactGroups as $group) {
    sort($group['mapobjs']);
    sort($group['miscmapobjs']);
    sort($group['heroes']);
    
    $mapobjsText = count($group['mapobjs']) > 0 ? implode('</br>', $group['mapobjs']) : '<span class="tiny-grey-italics">None</span>';
    $miscmapobjsText = count($group['miscmapobjs']) > 0 ? implode('</br>', $group['miscmapobjs']) : '<span class="tiny-grey-italics">None</span>';
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : '<span class="tiny-grey-italics">None</span>';
    
    $consolidatedData[] = [
        'name' => $group['artifactname'],
        'mapobjs' => $mapobjsText,
        'miscmapobjs' => $miscmapobjsText,
        'heroes' => $heroesText
    ];
}

// Sort by artifact name
usort($consolidatedData, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

$totalItems = count($consolidatedData);

echo '<div class="flex-container">';

echo '<table class="table-large artifacts-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Artifact</th>
					<th>Map Objects</th>
					<th>Misc. Map Objects</th>
					<th>Heroes</th>
				</tr>
			</thead>
			<tbody>';
for ($n = 0; $n < $totalItems; $n++) {
	$art = $consolidatedData[$n];
	echo '<tr>
			<td class="table__row-header--default">'.($n + 1).'</td>
			<td class="nowrap" nowrap="nowrap">'.$art['name'].'</td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$art['mapobjs'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$art['miscmapobjs'].'</span></td>
			<td class="nowrap" nowrap="nowrap"><span class="small-text">'.$art['heroes'].'</span></td>
			</tr>';
}
echo '</tbody>';
echo '</table>';

echo '</div>';
