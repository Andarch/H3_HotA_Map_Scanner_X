<?php
/** @var H3MAPSCAN_PRINT $this */

$categories = [
	$artifacts = [],
	$bonusmana = [],
	$bonusmorale = [],
	$bonusluck = [],
	$bonusmovement = [],
	$bonusmixed = [],
	$bordergates = [],
	$borderguards = [],
	$creaturebanks = [],
	$dwellings = [],
	$garrisons = [],
	$grail = [],
	$heroes = [],
	$heroupgrades = [],
	$keymasterstents = [],
	$magicalterrains = [],
	$mines = [],
	$monsters = [],
	$oneWayMonolithEntrances = [],
	$oneWayMonolithExits = [],
	$oneWayPortalEntrances = [],
	$oneWayPortalExits = [],
	$twoWayMonoliths = [],
	$twoWayPortals = [],
	$twoWaySeaPortals = [],
	$quests = [],
	$resources = [],
	$resourcegenerators = [],
	$scouting = [],
	$spells = [],
	$text = [],
	$towns = [],
	$trading = [],
	$transportation = [],
	$warmachines = [],
	$other = [],
];

foreach($this->h3mapscan->objects_all as $objcategory => $objcomboid) {
	switch($objcategory) {
		case OBJECTCATEGORIES::ARTIFACTS:
			$categories['artifacts'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUS_MANA:
			$categories['bonusmana'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUS_MORALE:
			$categories['bonusmorale'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUS_LUCK:
			$categories['bonusluck'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUS_MOVEMENT:
			$categories['bonusmovement'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUS_MIXED:
			$categories['bonusmixed'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BORDER_GATES:
			$categories['bordergates'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::BORDER_GUARDS:
			$categories['borderguards'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::CREATURE_BANKS:
			$categories['creaturebanks'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::DWELLINGS:
			$categories['dwellings'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::GARRISONS:
			$categories['garrisons'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::GRAIL:
			$categories['grail'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::HEROES:
			$categories['heroes'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::HERO_UPGRADES:
			$categories['heroupgrades'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::KEYMASTERS_TENTS:
			$categories['keymasterstents'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::MAGICAL_TERRAINS:
			$categories['magicalterrains'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::MINES:
			$categories['mines'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONSTERS:
			$categories['monsters'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::ONE_WAY_MONOLITH_ENTRANCES:
			$categories['oneWayMonolithEntrances'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::ONE_WAY_MONOLITH_EXITS:
			$categories['oneWayMonolithExits'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::ONE_WAY_PORTAL_ENTRANCES:
			$categories['oneWayPortalEntrances'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::ONE_WAY_PORTAL_EXITS:
			$categories['oneWayPortalExits'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::QUESTS:
			$categories['quests'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::RESOURCES:
			$categories['resources'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::RESOURCE_GENERATORS:
			$categories['resourcegenerators'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::SCOUTING:
			$categories['scouting'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::SPELLS:
			$categories['spells'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TEXT:
			$categories['text'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TOWNS:
			$categories['towns'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TRADING:
			$categories['trading'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TRANSPORTATION:
			$categories['transportation'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TWO_WAY_MONOLITHS:
			$categories['twoWayMonoliths'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TWO_WAY_PORTALS:
			$categories['twoWayPortals'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS:
			$categories['twoWaySeaPortals'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::WAR_MACHINES:
			$categories['warmachines'] = $objcomboid;
			break;

		case OBJECTCATEGORIES::OTHER:
			$categories['other'] = $objcomboid;
			break;
	}
}

function customSort($a, $b, $customOrder) {
    $posA = array_search($a['name'], $customOrder);
    $posB = array_search($b['name'], $customOrder);

    // If both elements are found in the custom order array
    if ($posA !== false && $posB !== false) {
        return $posA - $posB;
    }

    // If only one element is found, it should come first
    if ($posA !== false) {
        return -1;
    }
    if ($posB !== false) {
        return 1;
    }

    // If neither element is found, keep their original order
    return 0;
}

/* START FLEX */
echo '<div class="flex-container" style="display: flex; flex-wrap: wrap; row-gap: 1em;">';

// foreach($categories as $category => $objects) {
// 	$n = 0;
// 	echo '<table class="smalltable">
// 			<thead>
// 				<tr>
// 					<td colspan="3" class="tableheader2">'.$category.'</td>
// 				</tr>
// 				<tr>
// 					<th class="ac nowrap" nowrap="nowrap">ID</th>
// 					<th class="ac nowrap" nowrap="nowrap">Type</th>
// 					<th class="ac nowrap" nowrap="nowrap">Count</th>
// 				</tr>
// 			</thead>
// 			<tbody>';
// 	foreach($objects as $objcomboid => $obj) {
// 		echo '<tr>
// 				<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
// 				<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
// 				<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
// 			</tr>';
// 	}
// 	echo '	</tbody>
// 		</table>';
// }

// /* END FLEX */
// echo '</div>';

/* KEYMASTER'S TENTS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::KEYMASTERS_TENTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['keymasterstents'] as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BORDER GATES */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BORDER_GATES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bordergates'] as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BORDER GUARDS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BORDER_GUARDS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['borderguards'] as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* GARRISONS */
$n = 0;
$customOrder = [
	'Garrison',
	'Anti-magic Garrison',
];
uasort($categories['garrisons'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::GARRISONS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['garrisons'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* QUESTS */
$n = 0;
$customOrder = [
	'Quest Gate',
	'Quest Guard',
	'Seer\s Hut',
];
uasort($categories['quests'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::QUESTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['quests'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRANSPORTATION */
$n = 0;
$customOrder = [
	'Subterranean Gate',
	'Town Gate',
	'Whirlpool',
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
];
uasort($categories['transportation'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TRANSPORTATION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['transportation'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* ONE-WAY MONOLITHS */
$n = 0;
$ids = [];
$colors = ['Blue', 'Pink', 'Orange', 'Yellow', 'Turquoise', 'Violet', 'Chartreuse', 'White'];

$entranceKeys = array_keys($categories['oneWayMonolithEntrances']);
$exitKeys = array_keys($categories['oneWayMonolithExits']);
for($i = 0; $i < 8; $i++) {
    $id1 = $entranceKeys[$i] ?? null;
    $id2 = $exitKeys[$i] ?? null;
    $ids[] = $id1.COMBOID_SEPARATOR.$id2;
}

echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="4" class="tableheader2">'.OBJECTCATEGORIES::ONE_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap" style="">En.</th>
				<th class="ac nowrap" nowrap="nowrap" style="">Ex.</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 8; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['oneWayMonolithEntrances'][$entranceKeys[$i]]['count'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['oneWayMonolithExits'][$exitKeys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* ONE-WAY PORTALS */
$n = 0;
$ids = [];
$colors = ['Purple', 'Orange', 'Red', 'Cyan'];
$entranceKeys = array_keys($categories['oneWayPortalEntrances']);
$exitKeys = array_keys($categories['oneWayPortalExits']);
for($i = 0; $i < 8; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="4" class="tableheader2">'.OBJECTCATEGORIES::ONE_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap" style="">En.</th>
				<th class="ac nowrap" nowrap="nowrap" style="">Ex.</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 4; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['oneWayPortalEntrances'][$entranceKeys[$i]]['count'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['oneWayPortalExits'][$exitKeys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY MONOLITHS */
$n = 0;
$colors = ['Green', 'Brown', 'Violet', 'Orange', 'Pink', 'Turquoise', 'Yellow', 'Black', 'Blue', 'Red'];
$keys = array_keys($categories['twoWayMonoliths']);
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TWO_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 10; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['twoWayMonoliths'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY PORTALS */
$n = 0;
$colors = ['Green', 'Yellow', 'Red', 'Cyan', 'Chartreuse', 'Turquoise', 'Violet', 'Orange', 'Pink', 'Blue'];
$keys = array_keys($categories['twoWayPortals']);
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TWO_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 10; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['twoWayPortals'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY SEA PORTALS */
$n = 0;
$colors = ['White', 'Red', 'Blue', 'Chartreuse', 'Yellow'];
$keys = array_keys($categories['twoWaySeaPortals']);
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 5; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$categories['twoWaySeaPortals'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* GRAIL */
$n = 0;
$customOrder = [
    'Grail',
    'Obelisk',
];
uasort($categories['grail'], function($a, $b) use ($customOrder) {
    return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::GRAIL.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['grail'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* ARTIFACTS */
$n = 0;
$customOrder = [
    'Artifact',
    'Random Artifact',
    'Random Treasure Artifact',
    'Random Minor Artifact',
    'Random Major Artifact',
    'Random Relic',
    'Black Market',
    'Shipwreck Survivor',
    'Warrior\'s Tomb',
    'Pandora\'s Box',
];
uasort($categories['artifacts'], function($a, $b) use ($customOrder) {
    return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['artifacts'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MANA */
$n = 0;
$customOrder = [
	'Magic Well',
	'Magic Spring',
	'Vial of Mana',
	'Altar of Mana',
];
uasort($categories['bonusmana'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUS_MANA.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusmana'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MORALE */
$n = 0;
$customOrder = [
	'Temple',
	'Temple of Loyalty',
	'Buoy',
];
uasort($categories['bonusmorale'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUS_MORALE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusmorale'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – LUCK */
$n = 0;
$customOrder = [
	'Faerie Ring',
	'Fountain of Fortune',
	'Swan Pond',
	'Mermaid',
];
uasort($categories['bonusluck'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUS_LUCK.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusluck'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MOVEMENT */
$n = 0;
$customOrder = [
	'Stables',
	'Trailblazer',
	'Watering Place',
	'Lighthouse',
];
uasort($categories['bonusmovement'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUS_MOVEMENT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusmovement'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* HEROES */
$n = 0;
$customOrder = [
	'Hero',
	'Random Hero',
	'Prison',
	'Hero Camp',
	'Tavern',
];
uasort($categories['heroes'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::HEROES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['heroes'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TOWNS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TOWNS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['towns'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* DWELLINGS */
$n = 0;
$customOrder = [
	'Dwelling',
	'Golem Factory',
	'Elemental Conflux',
	'Random Dwelling',
	'Random Dwelling – Level',
	'Random Dwelling – Faction',
	'Dwellings 2',
	'Dwellings 3',
];
uasort($categories['dwellings'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::DWELLINGS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['dwellings'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MONSTERS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONSTERS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['monsters'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* WAR MACHINES */
$n = 0;
$customOrder = [
	'War Machine Factory',
	'Cannon Yard',
];
uasort($categories['warmachines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::WAR_MACHINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['warmachines'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRADING */
$n = 0;
$customOrder = [
	'Trading Post',
	'Warlock\'s Lab',
	'Junkman',
	'Freelancer\'s Guild',
];
uasort($categories['trading'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TRADING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['trading'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* HERO UPGRADES */
$n = 0;
$customOrder = [
	'Mercenary Camp',
	'Marletto Tower',
	'Star Axis',
	'Garden of Revelation',
	'School of War',
	'School of Magic',
	'Arena',
	'Colosseum of the Magi',
	'Library of Enlightenment',
	'Learning Stone',
	'Gazebo',
	'Tree of Knowledge',
	'Scholar',
	'Witch Hut',
	'Hermit\'s Shack',
	'University',
	'Seafaring Academy',
	'Sirens',
];
uasort($categories['heroupgrades'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::HERO_UPGRADES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['heroupgrades'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SPELLS */
$n = 0;
$customOrder = [
	'Shrine of Magic Incantation',
	'Shrine of Magic Gesture',
	'Shrine of Magic Thought',
	'Shrine of Magic Mystery',
	'Pyramid',
	'Spell Scroll',
];
uasort($categories['spells'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['spells'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES */
$n = 0;
$customOrder = [
	'Treasure Chest',
	'Campfire',
	'Random Resource',
	'Wood',
	'Ore',
	'Mercury',
	'Sulfur',
	'Crystal',
	'Gems',
	'Gold',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Sea Chest',
	'Corpse',
	'Grave',
];
uasort($categories['resources'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resources'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MINES */
$n = 0;
$customOrder = [
	'Treasure Chest',
	'Campfire',
	'Random Resource',
	'Wood',
	'Ore',
	'Mercury',
	'Sulfur',
	'Crystal',
	'Gems',
	'Gold',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Sea Chest',
];
uasort($categories['mines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['mines'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCE GENERATORS */
$n = 0;
$customOrder = [
	'Windmill',
	'Water Wheel',
	'Mystical Garden',
	'Derrick',
	'Prospector',
	'Lean To',
	'Wagon',
	'Warehouse of Wood',
	'Warehouse of Ore',
	'Warehouse of Mercury',
	'Warehouse of Sulfur',
	'Warehouse of Crystal',
	'Warehouse of Gem',
	'Warehouse of Gold',
];
uasort($categories['resourcegenerators'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::RESOURCE_GENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcegenerators'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* CREATURE BANKS */
$n = 0;
asort($creaturebanks);
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::CREATURE_BANKS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creaturebanks'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SCOUTING */
$n = 0;
$customOrder = [
	'Redwood Observatory',
	'Pillar of Fire',
	'Observation Tower',
	'Observatory',
	'Hut of the Magi',
	'Eye of the Magi',
	'Cover of Darkness',
	'Cartographer – Land',
	'Cartographer – Subterranean',
	'Cartographer – Water',
];
uasort($categories['scouting'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::SCOUTING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['scouting'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MAGICAL TERRAINS */
$n = 0;
$customOrder = [
	'Magic Plains',
	'Cursed Ground',
	'Rockland',
	'Fiery Fields',
	'Lucid Pools',
	'Magic Clouds',
	'Holy Ground',
	'Evil Fog',
	'Clover Field',
	'Cracked Ice',
	'Dunes',
	'Fields of Glory',
	'Favorable Winds',
];
uasort($categories['magicalterrains'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MAGICAL_TERRAINS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['magicalterrains'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TEXT */
$n = 0;
$customOrder = [
	'Sign',
	'Ocean Bottle',
];
uasort($categories['text'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TEXT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['text'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* OTHER */
$n = 0;
$customOrder = [
	'Event Object',
	'Hill Fort – Original',
	'Hill Fort – HotA',
	'Fiery Fields',
	'Lucid Pools',
	'Magic Clouds',
	'Holy Ground',
	'Evil Fog',
	'Clover Field',
	'Cracked Ice',
	'Dunes',
	'Fields of Glory',
	'Favorable Winds',
];
uasort($categories['other'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::OTHER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['other'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* END FLEX */
echo '</div>';
