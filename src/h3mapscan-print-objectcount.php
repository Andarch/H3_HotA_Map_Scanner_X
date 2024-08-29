<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

/* DECLARATIONS */
$this->OBJCCS = new ObjectCountConstants();
$categories = [];

/* SORT INTO CATEGORIES */
foreach($this->h3mapscan->objects_all as $objcategory => $obj) {
	match($objcategory) {
		OBJECTCATEGORIES::ARTIFACTS => $categories['artifacts'] = $obj,
		OBJECTCATEGORIES::BOATS_AND_AIRSHIPS => $categories['boatsAndAirships'] = $obj,
		OBJECTCATEGORIES::BORDER_GATES => $categories['borderGates'] = $obj,
		OBJECTCATEGORIES::BORDER_GUARDS => $categories['borderGuards'] = $obj,
		OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS => $categories['creatureBanksArtifacts'] = $obj,
		OBJECTCATEGORIES::CREATURE_BANKS_CREATURES => $categories['creatureBanksCreatures'] = $obj,
		OBJECTCATEGORIES::CREATURE_BANKS_RELICS => $categories['creatureBanksRelics'] = $obj,
		OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES => $categories['creatureBanksResources'] = $obj,
		OBJECTCATEGORIES::DWELLINGS => $categories['dwellings'] = $obj,
		OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS => $categories['garrisonsAndQuestGatesGuards'] = $obj,
		OBJECTCATEGORIES::HEROES_AND_INFO => $categories['heroes'] = $obj,
		OBJECTCATEGORIES::KEYMASTERS_TENTS => $categories['keymastersTents'] = $obj,
		OBJECTCATEGORIES::LUCK => $categories['luck'] = $obj,
		OBJECTCATEGORIES::MAGICAL_TERRAINS_BONUSES => $categories['magicalTerrainsBonuses'] = $obj,
		OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS => $categories['magicalTerrainsSpells'] = $obj,
		OBJECTCATEGORIES::MANA => $categories['mana'] = $obj,
		OBJECTCATEGORIES::MINES => $categories['mines'] = $obj,
		OBJECTCATEGORIES::MONSTERS => $categories['monsters'] = $obj,
		OBJECTCATEGORIES::MORALE => $categories['morale'] = $obj,
		OBJECTCATEGORIES::MOVEMENT => $categories['movement'] = $obj,
		OBJECTCATEGORIES::MULTI_BONUS => $categories['multiBonus'] = $obj,
		OBJECTCATEGORIES::ONE_WAY_MONOLITH_ENTRANCES => $categories['oneWayMonolithEntrances'] = $obj,
		OBJECTCATEGORIES::ONE_WAY_MONOLITH_EXITS => $categories['oneWayMonolithExits'] = $obj,
		OBJECTCATEGORIES::ONE_WAY_PORTAL_ENTRANCES => $categories['oneWayPortalEntrances'] = $obj,
		OBJECTCATEGORIES::ONE_WAY_PORTAL_EXITS => $categories['oneWayPortalExits'] = $obj,
		OBJECTCATEGORIES::OTHER_GATEWAYS => $categories['otherGateways'] = $obj,
		OBJECTCATEGORIES::PRIMARY_SKILLS_1 => $categories['primarySkills1'] = $obj,
		OBJECTCATEGORIES::PRIMARY_SKILLS_2 => $categories['primarySkills2'] = $obj,
		OBJECTCATEGORIES::RESOURCES_1 => $categories['resources1'] = $obj,
		OBJECTCATEGORIES::RESOURCES_2 => $categories['resources2'] = $obj,
		OBJECTCATEGORIES::RESOURCE_GENERATORS => $categories['resourceGenerators'] = $obj,
		OBJECTCATEGORIES::SCOUTING => $categories['scouting'] = $obj,
		OBJECTCATEGORIES::SECONDARY_SKILLS => $categories['secondarySkills'] = $obj,
		OBJECTCATEGORIES::SPECIAL => $categories['special'] = $obj,
		OBJECTCATEGORIES::SPELLS => $categories['spells'] = $obj,
		OBJECTCATEGORIES::TOWNS => $categories['towns'] = $obj,
		OBJECTCATEGORIES::TRADING => $categories['trading'] = $obj,
		OBJECTCATEGORIES::TREASURES => $categories['treasures'] = $obj,
		OBJECTCATEGORIES::TWO_WAY_MONOLITHS => $categories['twoWayMonoliths'] = $obj,
		OBJECTCATEGORIES::TWO_WAY_PORTALS => $categories['twoWayPortals'] = $obj,
		OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS => $categories['twoWaySeaPortals'] = $obj,
		OBJECTCATEGORIES::WAREHOUSES => $categories['warehouses'] = $obj,
		OBJECTCATEGORIES::WAR_MACHINES_AND_UPGRADES => $categories['warMachinesAndUpgrades'] = $obj,
		OBJECTCATEGORIES::XP => $categories['xp'] = $obj,
		default => [],
	};
}

/* START FLEX */
echo '<div class="flex-container">';

// Towns
$n = 0;
$customOrder = $this->OBJCCS->Towns;
uasort($categories['towns'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->HeroesAndInfo;
uasort($categories['heroes'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Monsters;
uasort($categories['monsters'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->KeymastersTents;
$tentKeys = array_keys($categories['keymastersTents']);
$bGateKeys = array_keys($categories['borderGates']);
$bGuardKeys = array_keys($categories['borderGuards']);
for($i = 0; $i < 8; $i++) {
	$id1 = $tentKeys[$i] ?? null;
	$id2 = $bGateKeys[$i] ?? null;
	$id3 = $bGuardKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2.COMBOID_SEPARATOR.$id3;
}
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->OneWayMonoliths;
$entranceKeys = array_keys($categories['oneWayMonolithEntrances']);
$exitKeys = array_keys($categories['oneWayMonolithExits']);
for($i = 0; $i < 8; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->OneWayPortals;
$entranceKeys = array_keys($categories['oneWayPortalEntrances']);
$exitKeys = array_keys($categories['oneWayPortalExits']);
for($i = 0; $i < 8; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->TwoWayMonoliths;
$keys = array_keys($categories['twoWayMonoliths']);
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->TwoWayPortals;
$keys = array_keys($categories['twoWayPortals']);
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$colors = $this->OBJCCS->TwoWaySeaPortals;
$keys = array_keys($categories['twoWaySeaPortals']);
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->OtherGateways;
uasort($categories['otherGateways'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->MinesAndWarehouses;
uasort($categories['mines'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
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
uasort($categories['warehouses'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
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
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Dwellings;
uasort($categories['dwellings'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->GarrisonsAndQuestGatesGuards;
uasort($categories['garrisonsAndQuestGatesGuards'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->WarMachinesAndUpgrades;
uasort($categories['warMachinesAndUpgrades'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Trading;
uasort($categories['trading'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->CreatureBanksElite;
uasort($categories['creatureBanksRelics'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->BoatsAndAirships;
uasort($categories['boatsAndAirships'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->PrimarySkills1;
uasort($categories['primarySkills1'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->PrimarySkills2;
uasort($categories['primarySkills2'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->SecondarySkills;
uasort($categories['secondarySkills'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->XP;
uasort($categories['xp'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Mana;
uasort($categories['mana'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->MultiBonus;
uasort($categories['multiBonus'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Movement;
uasort($categories['movement'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Morale;
uasort($categories['morale'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Luck;
uasort($categories['luck'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Special;
uasort($categories['special'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Spells;
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
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Artifacts;
uasort($categories['artifacts'], function($a, $b) use ($customOrder) {
    return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Treasures;
uasort($categories['treasures'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Resources1;
uasort($categories['resources1'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
$randomResourceComboId = '76-0';
$categories['resources1'][$randomResourceComboId]['name'] = 'Random';
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Resources2;
uasort($categories['resources2'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->ResourceGenerators;
uasort($categories['resourceGenerators'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->Scouting;
uasort($categories['scouting'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->MagicalTerrainsSpells;
uasort($categories['magicalTerrainsSpells'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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
$customOrder = $this->OBJCCS->MagicalTerrainsBonuses;
uasort($categories['magicalTerrainsBonuses'], function($a, $b) use ($customOrder) {
	return customSort($a, $b, $customOrder);
});
echo '<table class="'.OBJCOUNT_TABLECLASS.'">
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