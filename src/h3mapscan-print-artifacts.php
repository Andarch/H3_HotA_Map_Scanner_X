<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3artconstants.php';

// Group by location
$artifactLocations = [];
foreach (ARTIFACT_INFO as $artid => $artdata) {
	$artname = $artdata['name'];
	if (!isset($artifactLocations[$artname])) {
		$artifactLocations[$artname] = [
			'artifactname' => $artname,
			'artifactid' => $artid,
			'category' => $artdata['category'],
			'mapobjs' => [],
			'miscmapobjs' => [],
			'heroes' => []
		];
	}
	foreach ($this->h3mapscan->artifacts_list as $mapartifact) {
		if($mapartifact->name == $artname) {
			if ($mapartifact->parent === 'Map') {
				$artifactLocations[$mapartifact->name]['mapobjs'][] = 'Artifact ' . $mapartifact->mapcoor->GetCoords();
			} else if ($mapartifact->parent != 'Hero') {
				if($mapartifact->parent == 'Monster') {
					$name = $mapartifact->add1;
				} else {
					$name = $mapartifact->parent;
				}
				$location = $name . ' ' . $mapartifact->mapcoor->GetCoords();
				$artifactLocations[$mapartifact->name]['miscmapobjs'][] = $location;
			} else if ($mapartifact->parent === 'Hero') {
				$location = $mapartifact->add1 . ' ' . $mapartifact->mapcoor->GetCoords();
				$artifactLocations[$mapartifact->name]['heroes'][] = $location;
			}
		}
	}
}

// Create consolidated array
$consolidatedData = [];

foreach ($artifactLocations as $group) {
    sort($group['mapobjs']);
    sort($group['miscmapobjs']);
    sort($group['heroes']);
    
    $mapobjsText = count($group['mapobjs']) > 0 ? implode('</br>', $group['mapobjs']) : EMPTY_DATA;
    $miscmapobjsText = count($group['miscmapobjs']) > 0 ? implode('</br>', $group['miscmapobjs']) : EMPTY_DATA;
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : EMPTY_DATA;
    
    $consolidatedData[] = [
        'name' => $group['artifactname'],
		'id' => '5-'.$group['artifactid'],
		'category' => $group['category'],
        'mapobjs' => $mapobjsText,
        'miscmapobjs' => $miscmapobjsText,
        'heroes' => $heroesText
    ];
}

// Sort by artifact name
usort($consolidatedData, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

// Split by group
$artifactGroups = [];
$artifactGroups['Disabled Relic'] = [];
$artifactGroups['Disabled Major'] = [];
$artifactGroups['Disabled Minor'] = [];
$artifactGroups['Disabled Treasure'] = [];
$artifactGroups['Enabled Relic'] = [];
$artifactGroups['Enabled Major'] = [];
$artifactGroups['Enabled Minor'] = [];
$artifactGroups['Enabled Treasure'] = [];

foreach ($consolidatedData as $art) {
	$prefix = in_array($art['name'], $this->h3mapscan->disabledArtifacts) ? 'Disabled' : 'Enabled';
	$groupKey = $prefix . ' ' . $art['category'];
	$artifactGroups[$groupKey][] = $art;
}

// Print
echo '<div class="flex-container">';

foreach($artifactGroups as $groupName => $artifacts) {
	$headerClass = strpos($groupName, 'Disabled') === 0 ? 'table__title-bar--small2' : 'table__title-bar--small';	
	echo '<table class="table-small artifacts-table">
				<thead>
					<tr>
						<th class="'.$headerClass.'" colspan="5">'.$groupName.'</th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Artifact</th>
						<th>Map Objects</th>
						<th>Misc. Map Objects</th>
						<th>Heroes</th>
					</tr>
				</thead>
				<tbody>';
	for ($n = 0; $n < count($artifacts); $n++) {
		$art = $artifacts[$n];
		$mapobjsClass = $art['mapobjs'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';	
		$miscmapobjsClass = $art['miscmapobjs'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$heroesClass = $art['heroes'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$artClass = $art['mapobjs'] == EMPTY_DATA && $art['miscmapobjs'] == EMPTY_DATA && $art['heroes'] == EMPTY_DATA ? ' obj-count-inactive' : ' obj-count-active';
		echo '<tr>
				<td class="ac nowrap'.$artClass.'" nowrap="nowrap">'.$art['id'].'</td>
				<td class="nowrap'.$artClass.'" nowrap="nowrap">'.$art['name'].'</td>
				<td class="nowrap'.$mapobjsClass.'" nowrap="nowrap">'.$art['mapobjs'].'</td>
				<td class="nowrap'.$miscmapobjsClass.'" nowrap="nowrap">'.$art['miscmapobjs'].'</td>
				<td class="nowrap'.$heroesClass.'" nowrap="nowrap">'.$art['heroes'].'</td>
			</tr>';
	}	
	echo '</tbody>';
	echo '</table>';	
}

echo '</div>';
