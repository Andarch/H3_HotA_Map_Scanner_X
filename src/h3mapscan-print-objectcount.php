<?php
/** @var H3MAPSCAN_PRINT $this */

/* DECLARATIONS */
$tableclass = 'table-small';
$categories = [];

/* SORT BY CATEGORY */
foreach($this->h3mapscan->objects_all as $objcategory => $obj) {
	switch($objcategory) {
		case OBJECTCATEGORIES::ARTIFACTS:
			$categories['artifacts'] = $obj;
			break;

		case OBJECTCATEGORIES::BOATS_AND_AIRSHIPS:
			$categories['boatsAndAirships'] = $obj;
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

		case OBJECTCATEGORIES::CREATURE_BANKS_RELICS:
			$categories['creatureBanksRelics'] = $obj;
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

		case OBJECTCATEGORIES::HEROES_AND_INFO:
			$categories['heroes'] = $obj;
			break;

		case OBJECTCATEGORIES::KEYMASTERS_TENTS:
			$categories['keymastersTents'] = $obj;
			break;

		case OBJECTCATEGORIES::LUCK:
			$categories['luck'] = $obj;
			break;

		case OBJECTCATEGORIES::MAGICAL_TERRAINS_BONUSES:
			$categories['magicalTerrainsBonuses'] = $obj;
			break;

		case OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS:
			$categories['magicalTerrainsSpells'] = $obj;
			break;

		case OBJECTCATEGORIES::MANA:
			$categories['mana'] = $obj;
			break;

		case OBJECTCATEGORIES::MINES:
			$categories['mines'] = $obj;
			break;

		case OBJECTCATEGORIES::MONSTERS:
			$categories['monsters'] = $obj;
			break;

		case OBJECTCATEGORIES::MORALE:
			$categories['morale'] = $obj;
			break;

		case OBJECTCATEGORIES::MOVEMENT:
			$categories['movement'] = $obj;
			break;

		case OBJECTCATEGORIES::MULTI_BONUS:
			$categories['multiBonus'] = $obj;
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

		case OBJECTCATEGORIES::PRIMARY_SKILLS_1:
			$categories['primarySkills1'] = $obj;
			break;

		case OBJECTCATEGORIES::PRIMARY_SKILLS_2:
			$categories['primarySkills2'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_1:
			$categories['resources1'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCES_2:
			$categories['resources2'] = $obj;
			break;

		case OBJECTCATEGORIES::RESOURCE_GENERATORS:
			$categories['resourceGenerators'] = $obj;
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

		case OBJECTCATEGORIES::TRADING:
			$categories['trading'] = $obj;
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

		case OBJECTCATEGORIES::WAR_MACHINES_AND_UPGRADES:
			$categories['warMachinesAndUpgrades'] = $obj;
			break;

		case OBJECTCATEGORIES::XP:
			$categories['xp'] = $obj;
			break;
	}
}

/* START FLEX */
echo '<div class="flex-container">';

// Towns
$n = 0;
$customOrder = [
	'Random Town',
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
];
uasort($categories['towns'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="7" class="table__title-bar--small">'.OBJECTCATEGORIES::TOWNS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Heroes & Info
$n = 0;
$customOrder = [
	'Random Hero',
	'Hero',
	'Prison',
	'Hero Camp',
	'Tavern',
	'Den of Thieves',
	'Sign',
	'Ocean Bottle',
];
uasort($categories['heroes'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::HEROES_AND_INFO.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Monsters
$n = 0;
$customOrder = [
	'Random Monster L1',
	'Random Monster L2',
	'Random Monster L3',
	'Random Monster L4',
	'Random Monster L5',
	'Random Monster L6',
	'Random Monster L7',
	'Random Monster',
	'Monster',
];
uasort($categories['monsters'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MONSTERS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Keymaster's Tents & Border Gates/Guards
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
				<td colspan="5" class="table__title-bar--small">'.OBJECTCATEGORIES::KEYMASTERS_TENTS_AND_BORDER_GATES_GUARDS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Tent</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Gate</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Grd</th>
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

// One-Way Monoliths
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
				<td colspan="4" class="table__title-bar--small">'.OBJECTCATEGORIES::ONE_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Entr</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Exit</th>
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

// One-Way Portals
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
				<td colspan="4" class="table__title-bar--small">'.OBJECTCATEGORIES::ONE_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Entr</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Exit</th>
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

// Two-Way Monoliths
$n = 0;
$colors = ['Green', 'Brown', 'Violet', 'Orange', 'Pink', 'Turquoise', 'Yellow', 'Black', 'Blue', 'Red'];
$keys = array_keys($categories['twoWayMonoliths']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::TWO_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Two-Way Portals
$n = 0;
$colors = ['Green', 'Yellow', 'Red', 'Cyan', 'Chartreuse', 'Turquoise', 'Violet', 'Orange', 'Pink', 'Blue'];
$keys = array_keys($categories['twoWayPortals']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::TWO_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Two-Way Sea Portals
$n = 0;
$colors = ['White', 'Red', 'Blue', 'Chartreuse', 'Yellow'];
$keys = array_keys($categories['twoWaySeaPortals']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Other Gateways
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::OTHER_GATEWAYS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

/* END FLEX */
echo '</div class="flex-container">';

/* START FLEX */
echo '<div class="flex-container">';

// Mines & Warehouses
$n = 0;
$customOrderMines = [
	'Sawmill',
	'Ore Pit',
	'Alchemist\'s Lab',
	'Sulfur Dune',
	'Crystal Cavern',
	'Gem Pond',
	'Gold Mine',
	'Abandoned Mine',
];
uasort($categories['mines'], function($a, $b) use ($customOrderMines) {
	return customSort($a, $b, $customOrderMines);
});
$customOrderWarehouses = [
	'Warehouse of Wood',
	'Warehouse of Ore',
	'Warehouse of Mercury',
	'Warehouse of Sulfur',
	'Warehouse of Crystal',
	'Warehouse of Gem',
	'Warehouse of Gold',
];
uasort($categories['warehouses'], function($a, $b) use ($customOrderWarehouses) {
	return customSort($a, $b, $customOrderWarehouses);
});
$ids = [];
$types = ['Wood', 'Ore', 'Mercury', 'Sulfur', 'Crystal', 'Gems', 'Gold', 'Abandoned'];
$mineKeys = array_keys($categories['mines']);
$warehouseKeys = array_keys($categories['warehouses']);
$warehouseKeys[7] = '142-N/A';
$categories['warehouses'][$warehouseKeys[7]] = ['name' => '', 'count' => ''];
for($i = 0; $i < 7; $i++) {
	$id1 = $mineKeys[$i];
	$id2 = $warehouseKeys[$i];
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$ids[] = $mineKeys[7];
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="5" class="table__title-bar--small">'.OBJECTCATEGORIES::MINES_AND_WAREHOUSES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Mine</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">WH</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 8; $i++) {
	if($i < 7) {
		$whCellClass = 'ac nowrap';
	} else {
		$whCellClass = 'cell-greyed-out ac nowrap';
	}
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$ids[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$types[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['mines'][$mineKeys[$i]]['count'].'</td>
			<td class="'.$whCellClass.'" nowrap="nowrap">'.$categories['warehouses'][$warehouseKeys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Dwellings
$n = 0;
$customOrder = [
	'Random Dwelling – Level',
	'Random Dwelling – Faction',
	'Random Dwelling',
	'Dwelling',
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::DWELLINGS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Garrisons & Quest Gates/Guards
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// War Machines & Upgrades
$n = 0;
$customOrder = [
	'War Machine Factory',
	'Cannon Yard',
	'Hill Fort – Original',
	'Hill Fort – HotA',
	'Skeleton Transformer',
];
uasort($categories['warMachinesAndUpgrades'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::WAR_MACHINES_AND_UPGRADES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['warMachinesAndUpgrades'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Trading
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::TRADING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Creature Banks – Elite
$n = 0;
$customOrder = [
	'Dragon Utopia',
	'Temple of the Sea',
	'Ancient Altar',
];
uasort($categories['creatureBanksRelics'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::CREATURE_BANKS_RELICS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureBanksRelics'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Creature Banks – Artifacts
$n = 0;
asort($categories['creatureBanksArtifacts']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Creature Banks – Resources
$n = 0;
asort($categories['creatureBanksResources']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Creature Banks – Creatures
$n = 0;
asort($categories['creatureBanksCreatures']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::CREATURE_BANKS_CREATURES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

/* END FLEX */
echo '</div class="flex-container">';

/* START FLEX */
echo '<div class="flex-container">';

// Boats & Airships
$n = 0;
$customOrder = [
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
];
uasort($categories['boatsAndAirships'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::BOATS_AND_AIRSHIPS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['boatsAndAirships'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Primary Skills 1
$n = 0;
$customOrder = [
	'Mercenary Camp',
	'Marletto Tower',
	'Star Axis',
	'Garden of Revelation',
];
uasort($categories['primarySkills1'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::PRIMARY_SKILLS_1.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['primarySkills1'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Primary Skills 2
$n = 0;
$customOrder = [
	'School of War',
	'School of Magic',
	'Arena',
	'Colosseum of the Magi',
	'Library of Enlightenment',
];
uasort($categories['primarySkills2'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::PRIMARY_SKILLS_2.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['primarySkills2'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Secondary Skills
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::SECONDARY_SKILLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// XP
$n = 0;
$customOrder = [
	'Learning Stone',
	'Gazebo',
	'Tree of Knowledge',
	'Altar of Sacrifice',
	'Sirens',
];
uasort($categories['xp'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::XP.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['xp'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Mana
$n = 0;
$customOrder = [
	'Magic Well',
	'Magic Spring',
	'Vial of Mana',
	'Altar of Mana',
];
uasort($categories['mana'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MANA.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['mana'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Multi-Bonus
$n = 0;
$customOrder = [
	'Rally Flag',
	'Idol of Fortune',
	'Fountain of Youth',
	'Mineral Spring',
	'Oasis',
	'Watering Hole',
];
uasort($categories['multiBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MULTI_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['multiBonus'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Movement
$n = 0;
$customOrder = [
	'Stables',
	'Trailblazer',
	'Watering Place',
	'Lighthouse',
];
uasort($categories['movement'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MOVEMENT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['movement'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Morale
$n = 0;
$customOrder = [
	'Temple',
	'Buoy',
	'Temple of Loyalty',
];
uasort($categories['morale'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MORALE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['morale'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Luck
$n = 0;
$customOrder = [
	'Faerie Ring',
	'Fountain of Fortune',
	'Swan Pond',
	'Mermaid',
];
uasort($categories['luck'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::LUCK.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['luck'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* END FLEX */
echo '</div class="flex-container">';

/* START FLEX */
echo '<div class="flex-container">';

// Special
$n = 0;
$customOrder = [
	'Grail',
	'Obelisk',
	'Sanctuary',
	'Seer\'s Hut',
	'Pandora\'s Box',
	'Event Object',
];
uasort($categories['special'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::SPECIAL.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Spells
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
$names = [
	'Shrine – Incantation',
	'Shrine – Gesture',
	'Shrine – Thought',
	'Shrine – Mystery',
	'Pyramid',
	'Spell Scroll'
];
$keys = array_keys($categories['spells']);
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
for($i = 0; $i < 6; $i++) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$keys[$i].'</td>
			<td class="nowrap" nowrap="nowrap">'.$names[$i].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$categories['spells'][$keys[$i]]['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Artifacts
$n = 0;
$customOrder = [
    'Random Treasure Artifact',
    'Random Minor Artifact',
    'Random Major Artifact',
    'Random Relic',
    'Random Artifact',
    'Artifact',
];
uasort($categories['artifacts'], function($a, $b) use ($customOrder) {
    return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Treasures
$n = 0;
$customOrder = [
	'Treasure Chest',
	'Scholar',
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::TREASURES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Resources 1
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
uasort($categories['resources1'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
$randomResourceComboId = '76-0';
$categories['resources1'][$randomResourceComboId]['name'] = 'Random';
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::RESOURCES_1.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resources1'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Resources 2
$n = 0;
$customOrder = [
	'Campfire',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Lean To',
];
uasort($categories['resources2'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::RESOURCES_2.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['resources2'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Resource Generators
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
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::RESOURCE_GENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Scouting
$n = 0;
$customOrder = [
	'Redwood Observatory',
	'Pillar of Fire',
	'Observation Tower',
	'Observatory',
	'Hut of the Magi',
	'Eye of the Magi',
	'Cover of Darkness',
	'Land Cartographer',
	'Subterranean Cartographer',
	'Sea Cartographer',
];
uasort($categories['scouting'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::SCOUTING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
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

// Magical Terrains – Spells
$n = 0;
$customOrder = [
	'Magic Plains',
	'Cursed Ground',
	'Rocklands',
	'Fiery Fields',
	'Lucid Pools',
	'Magic Clouds',
];
uasort($categories['magicalTerrainsSpells'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['magicalTerrainsSpells'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Magical Terrains – Bonuses
$n = 0;
$customOrder = [
	'Holy Ground',
	'Evil Fog',
	'Clover Field',
	'Cracked Ice',
	'Dunes',
	'Fields of Glory',
	'Favorable Winds',
];
uasort($categories['magicalTerrainsBonuses'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="table__title-bar--small">'.OBJECTCATEGORIES::MAGICAL_TERRAINS_BONUSES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['magicalTerrainsBonuses'] as $objcomboid => $obj) {
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