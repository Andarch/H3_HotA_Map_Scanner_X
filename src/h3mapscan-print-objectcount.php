<?php
/** @var H3MAPSCAN_PRINT $this */

$tableclass = 'smallesttable';
$rowHeaderOneWayEntrances = 'Entr';
$rowHeaderOneWayExits = 'Exit';

$categories = [
	$armyUpgrades = [],
	$artifacts = [],
	$bonusXP = [],
	$borderGates = [],
	$borderGuards = [],
	$creatureBanksArtifacts = [],
	$creatureBanksCreatures = [],
	$creatureBanksResources = [],
	$dwellings = [],
	$garrisonsAndQuestGatesGuards = [],
	$grail = [],
	$heroes = [],
	$keymastersTents = [],
	$luckBonus = [],
	$magicalTerrains = [],
	$manaBonus = [],
	$mixedBonus = [],
	$monsters = [],
	$moraleBonus = [],
	$movementBonus = [],
	$oneWayMonolithEntrances = [],
	$oneWayMonolithExits = [],
	$oneWayPortalEntrances = [],
	$oneWayPortalExits = [],
	$other = [],
	$primarySkills = [],
	$resourcesGenerators = [],
	$resourcesMain = [],
	$resourcesMines = [],
	$resourcesOther = [],
	$resourcesWarehouses = [],
	$scouting = [],
	$secondarySkills = [],
	$special = [],
	$spells = [],
	$towns = [],
	$tradingAndInformation = [],
	$transit = [],
	$treasures = [],
	$twoWayMonoliths = [],
	$twoWayPortals = [],
	$twoWaySeaPortals = [],
	$xpBonus = [],
];

foreach($this->h3mapscan->objects_all as $objcategory => $obj) {
	switch($objcategory) {
		case OBJECTCATEGORIES::ARMY_UPGRADES:
			$categories['armyUpgrades'] = $obj;
			break;

		case OBJECTCATEGORIES::ARTIFACTS:
			$categories['artifacts'] = $obj;
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

		case OBJECTCATEGORIES::DWELLINGS:
			$categories['dwellings'] = $obj;
			break;

		case OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS:
			$categories['garrisonsAndQuestGatesGuards'] = $obj;
			break;

		case OBJECTCATEGORIES::GRAIL:
			$categories['grail'] = $obj;
			break;

		case OBJECTCATEGORIES::HEROES:
			$categories['heroes'] = $obj;
			break;

		case OBJECTCATEGORIES::KEYMASTERS_TENTS:
			$categories['keymastersTents'] = $obj;
			break;

		case OBJECTCATEGORIES::LUCK_BONUS:
			$categories['luckBonus'] = $obj;
			break;

		case OBJECTCATEGORIES::MAGICAL_TERRAINS:
			$categories['magicalTerrains'] = $obj;
			break;

		case OBJECTCATEGORIES::MANA_BONUS:
			$categories['manaBonus'] = $obj;
			break;

		case OBJECTCATEGORIES::MIXED_BONUS:
			$categories['mixedBonus'] = $obj;
			break;

		case OBJECTCATEGORIES::MONSTERS:
			$categories['monsters'] = $obj;
			break;

		case OBJECTCATEGORIES::MORALE_BONUS:
			$categories['moraleBonus'] = $obj;
			break;

		case OBJECTCATEGORIES::MOVEMENT_BONUS:
			$categories['movementBonus'] = $obj;
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

		case OBJECTCATEGORIES::OTHER:
			$categories['other'] = $obj;
			break;

		case OBJECTCATEGORIES::PRIMARY_SKILLS:
			$categories['primarySkills'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_GENERATORS:
			$categories['resourcesGenerators'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_MAIN:
			$categories['resourcesMain'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_MINES:
			$categories['resourcesMines'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_OTHER:
			$categories['resourcesOther'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_WAREHOUSES:
			$categories['resourcesWarehouses'] = $obj;
			break;

		case OBJECTCATEGORIES::SCOUTING:
			$categories['scouting'] = $obj;
			break;

		case OBJECTCATEGORIES::SECONDARY_SKILLS:
			$categories['secondarySkills'] = $obj;
			break;

		case OBJECTCATEGORIES::SPECIAL:
			$categories['special'] = $obj;
			break;

		case OBJECTCATEGORIES::SPELLS:
			$categories['spells'] = $obj;
			break;

		case OBJECTCATEGORIES::TOWNS:
			$categories['towns'] = $obj;
			break;

		case OBJECTCATEGORIES::TRADING_AND_INFORMATION:
			$categories['tradingAndInformation'] = $obj;
			break;

		case OBJECTCATEGORIES::TRANSIT:
			$categories['transit'] = $obj;
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
	}
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

/* TOWNS */
$n = 0;
$customOrder = [
	'Castle',
	'Rampart',
	'Tower',
	'Inferno',
	'Necropolis',
	'Dungeon',
	'Stronghold',
	'Fortress',
	'Conflux',
	'Cove',
	'Factory',
	'Random Town',
];
uasort($categories['towns'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
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

/* MONSTERS */
$n = 0;
$customOrder = [
	'Monster',
	'Random Monster',
	'Random Monster 1',
	'Random Monster 2',
	'Random Monster 3',
	'Random Monster 4',
	'Random Monster 5',
	'Random Monster 6',
	'Random Monster 7',
];
uasort($categories['monsters'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
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

/* DWELLINGS */
$n = 0;
$customOrder = [
	'Dwelling',
	'Random Dwelling',
	'Random Dwelling – Faction',
	'Random Dwelling – Level',
	'Golem Factory',
	'Elemental Conflux',
	'Refugee Camp',
	'Ancient Lamp',
];
uasort($categories['dwellings'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::DWELLINGS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['dwellings'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* ARMY UPGRADES */
$n = 0;
$customOrder = [
	'War Machine Factory',
	'Cannon Yard',
	'Hill Fort – Original',
	'Hill Fort – HotA',
	'Skeleton Transformer',
];
uasort($categories['armyUpgrades'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::ARMY_UPGRADES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['armyUpgrades'] as $objcomboid => $obj) {
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

/* TRADING & INFORMATION */
$n = 0;
$customOrder = [
	'Trading Post',
	'Warlock\'s Lab',
	'Black Market',
	'Junkman',
	'Freelancer\'s Guild',
	'Den of Thieves',
	'Sign',
	'Ocean Bottle',
];
uasort($categories['tradingAndInformation'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TRADING_AND_INFORMATION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['tradingAndInformation'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRANSIT */
$n = 0;
$customOrder = [
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
	'Subterranean Gate',
	'Town Gate',
	'Whirlpool',
];
uasort($categories['transit'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::TRANSIT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['transit'] as $objcomboid => $obj) {
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
	'Event Object',
	'Pandora\'s Box',
	'Scholar',
	'Seer\'s Hut',
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

/* GARRISONS & QUEST GATES/GUARDS */
$n = 0;
$customOrder = [
	'Garrison',
	'Anti-magic Garrison',
	'Quest Gate',
	'Quest Guard',
];
uasort($categories['garrisonsAndQuestGatesGuards'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['garrisonsAndQuestGatesGuards'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* KEYMASTER'S TENTS & BORDER GATES/GUARDS */
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
				<td colspan="5" class="tableheader3">'.OBJECTCATEGORIES::KEYMASTERS_AND_BORDER.'</td>
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

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

/* PRIMARY SKILLS */
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
];
uasort($categories['primarySkills'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::PRIMARY_SKILLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['primarySkills'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SECONDARY SKILLS */
$n = 0;
$customOrder = [
	'Witch Hut',
	'Hermit\'s Shack',
	'University',
	'Seafaring Academy',
];
uasort($categories['secondarySkills'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::SECONDARY_SKILLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['secondarySkills'] as $objcomboid => $obj) {
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

/* RESOURCES – MAIN */
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
uasort($categories['resourcesMain'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES_MAIN.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcesMain'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES – OTHER */
$n = 0;
$customOrder = [
	'Campfire',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Lean To',
];
uasort($categories['resourcesOther'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES_OTHER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcesOther'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES – MINES */
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
uasort($categories['resourcesMines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES_MINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcesMines'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES – WAREHOUSES */
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
uasort($categories['resourcesWarehouses'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES_WAREHOUSES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcesWarehouses'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES – GENERATORS */
$n = 0;
$customOrder = [
	'Windmill',
	'Water Wheel',
	'Mystical Garden',
	'Derrick',
	'Prospector',
];
uasort($categories['resourcesGenerators'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::RESOURCES_GENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resourcesGenerators'] as $objcomboid => $obj) {
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

/* MANA BONUS */
$n = 0;
$customOrder = [
	'Magic Well',
	'Magic Spring',
	'Vial of Mana',
	'Altar of Mana',
];
uasort($categories['manaBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MANA_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['manaBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MIXED BONUS */
$n = 0;
$customOrder = [
	'Rally Flag',
	'Idol of Fortune',
	'Fountain of Youth',
	'Mineral Spring',
	'Oasis',
	'Watering Hole',
];
uasort($categories['mixedBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MIXED_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['mixedBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MORALE BONUS */
$n = 0;
$customOrder = [
	'Temple',
	'Temple of Loyalty',
	'Buoy',
];
uasort($categories['moraleBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MORALE_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['moraleBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* LUCK BONUS */
$n = 0;
$customOrder = [
	'Faerie Ring',
	'Fountain of Fortune',
	'Swan Pond',
	'Mermaid',
];
uasort($categories['luckBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::LUCK_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['luckBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MOVEMENT BONUS */
$n = 0;
$customOrder = [
	'Stables',
	'Trailblazer',
	'Watering Place',
	'Lighthouse',
];
uasort($categories['movementBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MOVEMENT_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['movementBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* XP BONUS */
$n = 0;
$customOrder = [
	'Tree of Knowledge',
	'Learning Stone',
	'Gazebo',
	'Altar of Sacrifice',
	'Sirens',
];
uasort($categories['xpBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::XP_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['xpBonus'] as $objcomboid => $obj) {
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

/* CREATURE BANKS – DWELLINGS */
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

/* CREATURE BANKS – RESOURCES_MAIN */
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

/* OTHER */
$n = 0;
$customOrder = [
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

/* END FLEX */
echo '</div>';
