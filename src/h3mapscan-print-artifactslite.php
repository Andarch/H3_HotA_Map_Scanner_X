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
			'mapobjs1' => [],
			'mapobjs2' => [],
			'heroes' => []
		];
	}
	foreach ($this->h3mapscan->artifacts_list as $artifact) {
		if($artifact->name == $artname) {
			if ($artifact->parent === 'Map') {
				$artifactLocations[$artifact->name]['mapobjs1'][] = 'Artifact ' . $artifact->mapcoor->GetCoords();
			} else if ($artifact->parent != 'Hero') {
				if($artifact->parent == 'Monster') {
					$name = $artifact->add1;
				} else {
					$name = $artifact->parent;
				}
				$location = $name . ' ' . $artifact->mapcoor->GetCoords();
				$artifactLocations[$artifact->name]['mapobjs2'][] = $location;
			} else if ($artifact->parent === 'Hero') {
				$location = $artifact->add1 . ' ' . $artifact->mapcoor->GetCoords();
				$artifactLocations[$artifact->name]['heroes'][] = $location;
			}
		}
	}
}

// Create consolidated array
$consolidatedData = [];

foreach ($artifactLocations as $group) {
    sort($group['mapobjs1']);
    sort($group['mapobjs2']);
    sort($group['heroes']);
    
    $mapobjs1Text = count($group['mapobjs1']) > 0 ? implode('</br>', $group['mapobjs1']) : EMPTY_DATA;
    $mapobjs2Text = count($group['mapobjs2']) > 0 ? implode('</br>', $group['mapobjs2']) : EMPTY_DATA;
    $heroesText = count($group['heroes']) > 0 ? implode('</br>', $group['heroes']) : EMPTY_DATA;
    
    $consolidatedData[] = [
        'name' => $group['artifactname'],
		'id' => '5-'.$group['artifactid'],
		'category' => $group['category'],
        'mapobjs1' => $mapobjs1Text,
        'mapobjs2' => $mapobjs2Text,
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
echo START_FLEX;

foreach($artifactGroups as $groupName => $artifacts) {
	$headerClass = strpos($groupName, 'Disabled') === 0 ? 'table__title-bar--small3' : 'table__title-bar--small';	
	echo '<div class="artifacts-lite-table-container"><table class="table-small artifacts-lite-table">
				<thead>
					<tr>
						<th class="'.$headerClass.'" colspan="5">'.$groupName.'</th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Map Objects 1</th>
						<th>Map Objects 2</th>
						<th>Heroes</th>
					</tr>
				</thead>
				<tbody>';
	for ($n = 0; $n < count($artifacts); $n++) {
		$art = $artifacts[$n];
		$mapobjs1Class = $art['mapobjs1'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';	
		$mapobjs2Class = $art['mapobjs2'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$heroesClass = $art['heroes'] == EMPTY_DATA ? ' obj-count-inactive tiny-grey' : ' obj-count-active';
		$artClass = $art['mapobjs1'] == EMPTY_DATA && $art['mapobjs2'] == EMPTY_DATA && $art['heroes'] == EMPTY_DATA ? ' obj-count-inactive' : ' obj-count-active';
		echo '<tr>
				<td class="ac nowrap'.$artClass.'" nowrap="nowrap">'.$art['id'].'</td>
				<td class="nowrap'.$artClass.'" nowrap="nowrap">'.$art['name'].'</td>
				<td class="nowrap'.$mapobjs1Class.'" nowrap="nowrap">'.$art['mapobjs1'].'</td>
				<td class="nowrap'.$mapobjs2Class.'" nowrap="nowrap">'.$art['mapobjs2'].'</td>
				<td class="nowrap'.$heroesClass.'" nowrap="nowrap">'.$art['heroes'].'</td>
			</tr>';
	}	
	echo '</tbody>';
	echo '</table></div>';
	if($groupName == 'Disabled Treasure') {
		echo END_FLEX;
		echo START_FLEX;
	}
	if($groupName == 'Enabled Treasure') {
		echo END_FLEX;
	}
}
