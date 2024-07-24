<?php
/** @var H3MAPSCAN_PRINT $this */

$tableclass = 'smallesttable';
$rowHeaderOneWayEntrances = 'Entr';
$rowHeaderOneWayExits = 'Exit';

$categories = [
	$artifacts = [],
	$bonusMana = [],
	$bonusMorale = [],
	$bonusLuck = [],
	$bonusMovement = [],
	$bonusMixed = [],
	$borderGates = [],
	$borderGuards = [],
	$creatureBanksArtifacts = [],
	$creatureBanksCreatures = [],
	$creatureBanksResources = [],
	$creatureConversion = [],
	$creatureGenerators = [],
	$garrisons = [],
	$grail = [],
	$heroes = [],
	$heroUpgrades = [],
	$keymastersTents = [],
	$magicalTerrains = [],
	$mines = [],
	$monsters = [],
	$oneWayMonolithEntrances = [],
	$oneWayMonolithExits = [],
	$oneWayPortalEntrances = [],
	$oneWayPortalExits = [],
	$otherGateways = [],
	$otherResources = [],
	$quests = [],
	$resources = [],
	$resourceGenerators = [],
	$scouting = [],
	$special = [],
	$spells = [],
	$text = [],
	$towns = [],
	$trading = [],
	$transportation = [],
	$treasures = [],
	$twoWayMonoliths = [],
	$twoWayPortals = [],
	$twoWaySeaPortals = [],
	$warehouses = [],
	$warMachines = [],
	$other = [],
];

foreach($this->h3mapscan->objects_all as $objcategory => $obj) {
	switch($objcategory) {
		case OBJECTCATEGORIES::ARTIFACTS:
			$categories['artifacts'] = $obj;
			break;

		case OBJECTCATEGORIES::BONUS_MANA:
			$categories['bonusMana'] = $obj;
			break;

		case OBJECTCATEGORIES::BONUS_MORALE:
			$categories['bonusMorale'] = $obj;
			break;

		case OBJECTCATEGORIES::BONUS_LUCK:
			$categories['bonusLuck'] = $obj;
			break;

		case OBJECTCATEGORIES::BONUS_MOVEMENT:
			$categories['bonusMovement'] = $obj;
			break;

		case OBJECTCATEGORIES::BONUS_MIXED:
			$categories['bonusMixed'] = $obj;
			break;

		case OBJECTCATEGORIES::BORDER_GATES:
			$categories['borderGates'] = $obj;
			break;

		case OBJECTCATEGORIES::BORDER_GUARDS:
			$categories['borderGuards'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS:
			$categories['creatureBanksArtifacts'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_BANKS_CREATURES:
			$categories['creatureBanksCreatures'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES:
			$categories['creatureBanksResources'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_CONVERSION:
			$categories['creatureConversion'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_GENERATORS:
			$categories['creatureGenerators'] = $obj;
			break;

		case OBJECTCATEGORIES::GARRISONS:
			$categories['garrisons'] = $obj;
			break;

		case OBJECTCATEGORIES::GRAIL:
			$categories['grail'] = $obj;
			break;

		case OBJECTCATEGORIES::HEROES:
			$categories['heroes'] = $obj;
			break;

		case OBJECTCATEGORIES::HERO_UPGRADES:
			$categories['heroUpgrades'] = $obj;
			break;

		case OBJECTCATEGORIES::KEYMASTERS_TENTS:
			$categories['keymastersTents'] = $obj;
			break;

		case OBJECTCATEGORIES::MAGICAL_TERRAINS:
			$categories['magicalTerrains'] = $obj;
			break;

		case OBJECTCATEGORIES::MINES:
			$categories['mines'] = $obj;
			break;

		case OBJECTCATEGORIES::MONSTERS:
			$categories['monsters'] = $obj;
			break;

		case OBJECTCATEGORIES::ONE_WAY_MONOLITH_ENTRANCES:
			$categories['oneWayMonolithEntrances'] = $obj;
			break;

		case OBJECTCATEGORIES::ONE_WAY_MONOLITH_EXITS:
			$categories['oneWayMonolithExits'] = $obj;
			break;

		case OBJECTCATEGORIES::ONE_WAY_PORTAL_ENTRANCES:
			$categories['oneWayPortalEntrances'] = $obj;
			break;

		case OBJECTCATEGORIES::ONE_WAY_PORTAL_EXITS:
			$categories['oneWayPortalExits'] = $obj;
			break;

		case OBJECTCATEGORIES::OTHER_GATEWAYS:
			$categories['otherGateways'] = $obj;
			break;

		case OBJECTCATEGORIES::OTHER_RESOURCES:
			$categories['otherResources'] = $obj;
			break;

		case OBJECTCATEGORIES::QUESTS:
			$categories['quests'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES:
			$categories['resources'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCE_GENERATORS:
			$categories['resourceGenerators'] = $obj;
			break;

		case OBJECTCATEGORIES::SCOUTING:
			$categories['scouting'] = $obj;
			break;

		case OBJECTCATEGORIES::SPECIAL:
			$categories['special'] = $obj;
			break;

		case OBJECTCATEGORIES::SPELLS:
			$categories['spells'] = $obj;
			break;

		case OBJECTCATEGORIES::TEXT:
			$categories['text'] = $obj;
			break;

		case OBJECTCATEGORIES::TOWNS:
			$categories['towns'] = $obj;
			break;

		case OBJECTCATEGORIES::TRADING:
			$categories['trading'] = $obj;
			break;

		case OBJECTCATEGORIES::TRANSPORTATION:
			$categories['transportation'] = $obj;
			break;

		case OBJECTCATEGORIES::TREASURES:
			$categories['treasures'] = $obj;
			break;

		case OBJECTCATEGORIES::TWO_WAY_MONOLITHS:
			$categories['twoWayMonoliths'] = $obj;
			break;

		case OBJECTCATEGORIES::TWO_WAY_PORTALS:
			$categories['twoWayPortals'] = $obj;
			break;

		case OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS:
			$categories['twoWaySeaPortals'] = $obj;
			break;

		case OBJECTCATEGORIES::WAREHOUSES:
			$categories['warehouses'] = $obj;
			break;

		case OBJECTCATEGORIES::WAR_MACHINES:
			$categories['warMachines'] = $obj;
			break;

		case OBJECTCATEGORIES::OTHER:
			$categories['other'] = $obj;
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
// 	echo '<table class="'.$tableclass.'">
// 			<thead>
// 				<tr>
// 					<td colspan="3" class="tableheader3">'.$category.'</td>
// 				</tr>
// 				<tr>
// 					<th class="ac nowrap" nowrap="nowrap">ID</th>
// 					<th class="ac nowrap" nowrap="nowrap">Type</th>
// 					<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
// 				</tr>
// 			</thead>
// 			<tbody>';
// 	foreach($objects as $objcomboid => $obj) {
// 		echo '<tr>
// 				<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
// 				<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
// 				<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
// 			</tr>';
// 	}
// 	echo '	</tbody>
// 		</table>';
// }

// /* END FLEX */
// echo '</div>';

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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::HEROES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['heroes'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TOWNS */
$n = 0;
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="7" class="tableheader3">'.OBJECTCATEGORIES::TOWNS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['towns'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MONSTERS */
$n = 0;
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MONSTERS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['monsters'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* CREATURE_GENERATORS */
$n = 0;
$customOrder = [
	'Dwelling',
	'Golem Factory',
	'Elemental Conflux',
	'Random Dwelling',
	'Random Dwelling – Level',
	'Random Dwelling – Faction',
	'Ancient Lamp',
	'Refugee Camp',
];
uasort($categories['creatureGenerators'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_GENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureGenerators'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::SCOUTING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['scouting'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRADING */
$n = 0;
$customOrder = [
	'Trading Post',
	'Warlock\'s Lab',
	'Black Market',
	'Junkman',
	'Freelancer\'s Guild',
];
uasort($categories['trading'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TRADING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['trading'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
uasort($categories['warMachines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::WAR_MACHINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['warMachines'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* CREATURE_CONVERSION */
$n = 0;
$customOrder = [
	'Hill Fort – Original',
	'Hill Fort – HotA',
	'Skeleton Transformer',
];
uasort($categories['creatureConversion'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_CONVERSION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureConversion'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MAGICAL TERRAINS */
$n = 0;
$customOrder = [
	'Magic Plains',
	'Cursed Ground',
	'Rocklands',
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
uasort($categories['magicalTerrains'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MAGICAL_TERRAINS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['magicalTerrains'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::GRAIL.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['grail'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SPECIAL */
$n = 0;
$customOrder = [
    'Pandora\'s Box',
	'Event Object',
];
uasort($categories['special'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::SPECIAL.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['special'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['spells'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
];
uasort($categories['artifacts'], function($a, $b) use ($customOrder) {
    return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['artifacts'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TREASURES */
$n = 0;
$customOrder = [
	'Treasure Chest',
	'Sea Chest',
	'Shipwreck Survivor',
	'Warrior\'s Tomb',
	'Wagon',
	'Corpse',
	'Grave',
];
uasort($categories['treasures'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TREASURES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['treasures'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES */
$n = 0;
$customOrder = [
	'Random Resource',
	'Wood',
	'Ore',
	'Mercury',
	'Sulfur',
	'Crystal',
	'Gems',
	'Gold',
];
uasort($categories['resources'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resources'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MINES */
$n = 0;
$customOrder = [
	'Sawmill',
	'Ore Pit',
	'Alchemist\'s Lab',
	'Sulfur Dune',
	'Crystal Cavern',
	'Gem Pond',
	'Gold Mine',
	'Abandoned Mine',
];
uasort($categories['mines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['mines'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* WAREHOUSES */
$n = 0;
$customOrder = [
	'Warehouse of Wood',
	'Warehouse of Ore',
	'Warehouse of Mercury',
	'Warehouse of Sulfur',
	'Warehouse of Crystal',
	'Warehouse of Gem',
	'Warehouse of Gold',
];
uasort($categories['warehouses'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::WAREHOUSES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['warehouses'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
];
uasort($categories['resourceGenerators'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCE_GENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourceGenerators'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* OTHER RESOURCES */
$n = 0;
$customOrder = [
	'Campfire',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Lean To',
];
uasort($categories['otherResources'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::OTHER_RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['otherResources'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* TRANSPORTATION */
$n = 0;
$customOrder = [
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
];
uasort($categories['transportation'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TRANSPORTATION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['transportation'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::GARRISONS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['garrisons'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::QUESTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['quests'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* KEYMASTERS / BORDER */
$n = 0;
$ids = [];
$colors = ['Light Blue', 'Green', 'Red', 'Dark Blue', 'Brown', 'Purple', 'White', 'Black'];
$tentKeys = array_keys($categories['keymastersTents']);
$bGateKeys = array_keys($categories['borderGates']);
$bGuardKeys = array_keys($categories['borderGuards']);
for($i = 0; $i < 8; $i++) {
	$id1 = $tentKeys[$i] ?? null;
	$id2 = $bGateKeys[$i] ?? null;
	$id3 = $bGuardKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2.COMBOID_SEPARATOR.$id3;
}
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="5" class="tableheader3">'.OBJECTCATEGORIES::BORDER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header2 ac nowrap" nowrap="nowrap">Tent</th>
				<th class="count-column-header2 ac nowrap" nowrap="nowrap">Gate</th>
				<th class="count-column-header2 ac nowrap" nowrap="nowrap">Grd</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 8; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['keymastersTents'][$tentKeys[$i]]['count'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['borderGates'][$bGateKeys[$i]]['count'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['borderGuards'][$bGuardKeys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="4" class="tableheader3">'.OBJECTCATEGORIES::ONE_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">'.$rowHeaderOneWayEntrances.'</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">'.$rowHeaderOneWayExits.'</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 8; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['oneWayMonolithEntrances'][$entranceKeys[$i]]['count'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['oneWayMonolithExits'][$exitKeys[$i]]['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="4" class="tableheader3">'.OBJECTCATEGORIES::ONE_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">'.$rowHeaderOneWayEntrances.'</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">'.$rowHeaderOneWayExits.'</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 4; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['oneWayPortalEntrances'][$entranceKeys[$i]]['count'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['oneWayPortalExits'][$exitKeys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY MONOLITHS */
$n = 0;
$colors = ['Green', 'Brown', 'Violet', 'Orange', 'Pink', 'Turquoise', 'Yellow', 'Black', 'Blue', 'Red'];
$keys = array_keys($categories['twoWayMonoliths']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TWO_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 10; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['twoWayMonoliths'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY PORTALS */
$n = 0;
$colors = ['Green', 'Yellow', 'Red', 'Cyan', 'Chartreuse', 'Turquoise', 'Violet', 'Orange', 'Pink', 'Blue'];
$keys = array_keys($categories['twoWayPortals']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TWO_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 10; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['twoWayPortals'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY SEA PORTALS */
$n = 0;
$colors = ['White', 'Red', 'Blue', 'Chartreuse', 'Yellow'];
$keys = array_keys($categories['twoWaySeaPortals']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 5; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$colors[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['twoWaySeaPortals'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* OTHER GATEWAYS */
$n = 0;
$customOrder = [
	'Subterranean Gate',
	'Town Gate',
	'Whirlpool',
];
uasort($categories['otherGateways'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::OTHER_GATEWAYS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['otherGateways'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* BONUS – MANA */
$n = 0;
$customOrder = [
	'Magic Well',
	'Magic Spring',
	'Vial of Mana',
	'Altar of Mana',
];
uasort($categories['bonusMana'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::BONUS_MANA.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusMana'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
uasort($categories['bonusMorale'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::BONUS_MORALE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusMorale'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
uasort($categories['bonusLuck'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::BONUS_LUCK.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusLuck'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
uasort($categories['bonusMovement'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::BONUS_MOVEMENT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['bonusMovement'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

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
	'University',
	'Scholar',
	'Witch Hut',
	'Hermit\'s Shack',
	'Seafaring Academy',
];
uasort($categories['heroUpgrades'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::HERO_UPGRADES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['heroUpgrades'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* CREATURE BANKS – ARTIFACTS */
$n = 0;
asort($categories['creatureBanksArtifacts']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureBanksArtifacts'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* CREATURE BANKS – CREATURES */
$n = 0;
asort($categories['creatureBanksCreatures']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_BANKS_CREATURES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureBanksCreatures'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* CREATURE BANKS – RESOURCES */
$n = 0;
asort($categories['creatureBanksResources']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureBanksResources'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
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
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TEXT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['text'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* OTHER */
$n = 0;
$customOrder = [
	'Altar of Sacrifice',
	'Sirens',
	'Den of Thieves',
	'Sanctuary',
];
uasort($categories['other'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::OTHER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['other'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* END FLEX */
echo '</div>';
