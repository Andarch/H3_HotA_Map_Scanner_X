<?php
/** @var H3MAPSCAN_PRINT $this */

/* DECLARATIONS */
$tableclass = 'smallesttable';
$categories = [
	$armyUpgrades = [],
	$artifacts = [],
	$bonusXP = [],
	$borderGates = [],
	$borderGuards = [],
	$creatureBanksArtifacts = [],
	$creatureBanksCreatures = [],
	$creatureBanksElite = [],
	$creatureBanksResources = [],
	$dwellings = [],
	$fortifications = [],
	$heroes = [],
	$information = [],
	$keymastersTents = [],
	$luck = [],
	$magicalTerrainsBonuses = [],
	$magicalTerrainsSpells = [],
	$mana = [],
	$mines = [],
	$monsters = [],
	$morale = [],
	$movement = [],
	$multiBonus = [],
	$multiResources = [],
	$oneWayMonolithEntrances = [],
	$oneWayMonolithExits = [],
	$oneWayPortalEntrances = [],
	$oneWayPortalExits = [],
	$primarySkills = [],
	$resources = [],
	$resourceGenerators = [],
	$scouting = [],
	$secondarySkills = [],
	$shelter = [],
	$special = [],
	$spells = [],
	$towns = [],
	$trading = [],
	$transit = [],
	$treasures = [],
	$twoWayMonoliths = [],
	$twoWayPortals = [],
	$twoWaySeaPortals = [],
	$warehouses = [],
	$xp = [],
];

/* SORT BY CATEGORY */
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

		case OBJECTCATEGORIES::CREATURE_BANKS_ELITE:
			$categories['creatureBanksElite'] = $obj;
			break;

		case OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES:
			$categories['creatureBanksResources'] = $obj;
			break;

		case OBJECTCATEGORIES::DWELLINGS:
			$categories['dwellings'] = $obj;
			break;

		case OBJECTCATEGORIES::FORTIFICATIONS:
			$categories['fortifications'] = $obj;
			break;

		case OBJECTCATEGORIES::HEROES:
			$categories['heroes'] = $obj;
			break;

		case OBJECTCATEGORIES::INFORMATION:
			$categories['information'] = $obj;
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

		case OBJECTCATEGORIES::MULTI_RESOURCES:
			$categories['multiResources'] = $obj;
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

		case OBJECTCATEGORIES::PRIMARY_SKILLS:
			$categories['primarySkills'] = $obj;
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

		case OBJECTCATEGORIES::SECONDARY_SKILLS:
			$categories['secondarySkills'] = $obj;
			break;

		case OBJECTCATEGORIES::SHELTER:
			$categories['shelter'] = $obj;
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

		case OBJECTCATEGORIES::WAREHOUSES:
			$categories['warehouses'] = $obj;
			break;

		case OBJECTCATEGORIES::XP:
			$categories['xp'] = $obj;
			break;
	}
}

/* START FLEX */
echo '<div class="flex-container" style="display: flex; flex-wrap: wrap; row-gap: 1em;">';

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

// Heroes
$n = 0;
$customOrder = [
	'Random Hero',
	'Hero',
	'Prison',
	'Hero Camp',
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

// Transit
$n = 0;
$customOrder = [
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
	'Subterranean Gate',
	'Town Gate',
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

// Fortifications
$n = 0;
$customOrder = [
	'Garrison',
	'Anti-magic Garrison',
	'Quest Gate',
	'Quest Guard',
];
uasort($categories['fortifications'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::FORTIFICATIONS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['fortifications'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Keymasters / Border
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
				<td colspan="5" class="tableheader3">'.OBJECTCATEGORIES::KEYMASTERS_BORDER.'</td>
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
				<td colspan="4" class="tableheader3">'.OBJECTCATEGORIES::ONE_WAY_MONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">Entr</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">Exit</th>
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
				<td colspan="4" class="tableheader3">'.OBJECTCATEGORIES::ONE_WAY_PORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">Entr</th>
				<th class="count-column-header3 ac nowrap" nowrap="nowrap">Exit</th>
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

// Two-Way Portals
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

// Two-Way Sea Portals
$n = 0;
$colors = ['White', 'Red', 'Blue', 'Chartreuse', 'Yellow', 'Whirlpool'];
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
for($i = 0; $i < 6; $i++) {
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

// Monsters
$n = 0;
$customOrder = [
	'Random Monster 1',
	'Random Monster 2',
	'Random Monster 3',
	'Random Monster 4',
	'Random Monster 5',
	'Random Monster 6',
	'Random Monster 7',
	'Random Monster',
	'Monster',
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

// Mines
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

// Warehouses
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MANA.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MULTI_BONUS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MOVEMENT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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
	'Temple of Loyalty',
	'Buoy',
];
uasort($categories['morale'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MORALE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::LUCK.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';

// Creature Banks – Artifacts
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

// Creature Banks – Dwellings
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

// Creature Banks – Resources
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

// Creature Banks – Elite
$n = 0;
$customOrder = [
	'Dragon Utopia',
	'Temple of the Sea',
	'Ancient Altar',
];
uasort($categories['creatureBanksElite'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::CREATURE_BANKS_ELITE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['creatureBanksElite'] as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

// Primary Skills
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::XP.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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

// Army Upgrades
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

// Information
$n = 0;
$customOrder = [
	'Tavern',
	'Den of Thieves',
	'Sign',
	'Ocean Bottle',
];
uasort($categories['information'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::INFORMATION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['information'] as $objcomboid => $obj) {
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

// Special
$n = 0;
$customOrder = [
	'Grail',
	'Obelisk',
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

// Resources
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

// Multi-Resources
$n = 0;
$customOrder = [
	'Campfire',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Lean To',
];
uasort($categories['multiResources'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MULTI_RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['multiResources'] as $objcomboid => $obj) {
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

// Shelter
$n = 0;
$customOrder = [
	'Cover of Darkness',
	'Sanctuary',
];
uasort($categories['shelter'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.$tableclass.'">
		<thead>
			<tr>
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::SHELTER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
			</tr>
		</thead>
		<tbody>';
foreach($categories['shelter'] as $objcomboid => $obj) {
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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
				<td colspan="3" class="tableheader3">'.OBJECTCATEGORIES::MAGICAL_TERRAINS_BONUSES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="count-column-header1 ac nowrap" nowrap="nowrap">#</th>
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