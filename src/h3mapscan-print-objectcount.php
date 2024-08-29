<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

/* DECLARATIONS */
$this->OBJCCS = new OC_Constants();
$categories = SortIntoCategories($this->h3mapscan->objects_all);

/* MAIN */

// Towns
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['towns'], OBJECTCATEGORIES::TOWNS, $this->OBJCCS->Towns, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountTable($table);

// Heroes & Info
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['heroesAndInfo'], OBJECTCATEGORIES::HEROES_AND_INFO, $this->OBJCCS->HeroesAndInfo, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Monsters
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['monsters'], OBJECTCATEGORIES::MONSTERS, $this->OBJCCS->Monsters, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Keymaster's Tents & Border Gates/Guards
$tentKeys = array_keys($categories['keymastersTents']);
$bGateKeys = array_keys($categories['borderGates']);
$bGuardKeys = array_keys($categories['borderGuards']);
$ids = [];
for ($i = 0; $i < 8; $i++) {
	$id1 = $tentKeys[$i] ?? null;
	$id2 = $bGateKeys[$i] ?? null;
	$id3 = $bGuardKeys[$i] ?? null;
	$ids[] = $id1 . COMBOID_SEPARATOR . $id2 . COMBOID_SEPARATOR . $id3;
}
$table = new OC_Table(OC_TABLETYPE::BORDER, null, OBJECTCATEGORIES::KEYMASTERS_TENTS_AND_BORDER_GATES_GUARDS, null, $this->OBJCCS->Border, 8, $ids, OC_FLEXTYPE::NONE, $categories['keymastersTents'], $tentKeys, $categories['borderGates'], $bGateKeys, $categories['borderGuards'], $bGuardKeys);
DisplayObjCountTable($table);

// One-Way Monoliths
$entranceKeys = array_keys($categories['oneWayMonolithEntrances']);
$exitKeys = array_keys($categories['oneWayMonolithExits']);
$ids = [];
for($i = 0; $i < 8; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$table = new OC_Table(OC_TABLETYPE::ONE_WAY_MONOLITH_PORTAL, null, OBJECTCATEGORIES::ONE_WAY_MONOLITHS, null, $this->OBJCCS->OneWayMonoliths, 8, $ids, OC_FLEXTYPE::NONE, $categories['oneWayMonolithEntrances'], $entranceKeys, $categories['oneWayMonolithExits'], $exitKeys);
DisplayObjCountTable($table);

// One-Way Portals
$entranceKeys = array_keys($categories['oneWayPortalEntrances']);
$exitKeys = array_keys($categories['oneWayPortalExits']);
$ids = [];
for($i = 0; $i < 4; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$table = new OC_Table(OC_TABLETYPE::ONE_WAY_MONOLITH_PORTAL, null, OBJECTCATEGORIES::ONE_WAY_PORTALS, null, $this->OBJCCS->OneWayPortals, 4, $ids, OC_FLEXTYPE::NONE, $categories['oneWayPortalEntrances'], $entranceKeys, $categories['oneWayPortalExits'], $exitKeys);
DisplayObjCountTable($table);

// Two-Way Monoliths
$keys = array_keys($categories['twoWayMonoliths']);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $categories['twoWayMonoliths'], OBJECTCATEGORIES::TWO_WAY_MONOLITHS, null, $this->OBJCCS->TwoWayMonoliths, 10, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountTable($table);

// Two-Way Portals
$keys = array_keys($categories['twoWayPortals']);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $categories['twoWayPortals'], OBJECTCATEGORIES::TWO_WAY_PORTALS, null, $this->OBJCCS->TwoWayPortals, 10, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountTable($table);

// Two-Way Sea Portals
$keys = array_keys($categories['twoWaySeaPortals']);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $categories['twoWaySeaPortals'], OBJECTCATEGORIES::TWO_WAY_SEA_PORTALS, null, $this->OBJCCS->TwoWaySeaPortals, 5, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountTable($table);

// Other Gateways
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['otherGateways'], OBJECTCATEGORIES::OTHER_GATEWAYS, $this->OBJCCS->OtherGateways, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountTable($table);

// Mines & Warehouses
$mineKeys = array_keys($categories['mines']);
$warehouseKeys = array_keys($categories['warehouses']);
$warehouseKeys[7] = '142-N/A';
$categories['warehouses'][$warehouseKeys[7]] = ['name' => '', 'count' => ''];
$ids = [];
for($i = 0; $i < 7; $i++) {
	$id1 = $mineKeys[$i];
	$id2 = $warehouseKeys[$i];
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$ids[] = $mineKeys[7];
$table = new OC_Table(OC_TABLETYPE::MINE_WAREHOUSE, null, OBJECTCATEGORIES::MINES_AND_WAREHOUSES, null, $this->OBJCCS->ResourceTypes, 8, $ids, OC_FLEXTYPE::START, $this->OBJCCS->Mines, $categories['mines'], $mineKeys, $this->OBJCCS->Warehouses, $categories['warehouses'], $warehouseKeys);
DisplayObjCountTable($table);

// Dwellings
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['dwellings'], OBJECTCATEGORIES::DWELLINGS, $this->OBJCCS->Dwellings, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Garrisons & Quest Gates/Guards
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['garrisonsAndQuestGatesGuards'], OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS, $this->OBJCCS->GarrisonsAndQuestGatesGuards, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// War Machines & Upgrades
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['warMachinesAndUpgrades'], OBJECTCATEGORIES::WAR_MACHINES_AND_UPGRADES, $this->OBJCCS->WarMachinesAndUpgrades, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Trading
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['trading'], OBJECTCATEGORIES::TRADING, $this->OBJCCS->Trading, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Creature Banks – Elite
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['creatureBanksElite'], OBJECTCATEGORIES::CREATURE_BANKS_ELITE, $this->OBJCCS->CreatureBanksElite, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Creature Banks – Artifacts
asort($categories['creatureBanksArtifacts']);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['creatureBanksArtifacts'], OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS, null, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Creature Banks – Resources
asort($categories['creatureBanksResources']);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['creatureBanksResources'], OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES, null, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Creature Banks – Creatures
asort($categories['creatureBanksCreatures']);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['creatureBanksCreatures'], OBJECTCATEGORIES::CREATURE_BANKS_CREATURES, null, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountTable($table);

// Boats & Airships
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['boatsAndAirships'], OBJECTCATEGORIES::BOATS_AND_AIRSHIPS, $this->OBJCCS->BoatsAndAirships, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountTable($table);

// Primary Skills 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['primarySkills1'], OBJECTCATEGORIES::PRIMARY_SKILLS_1, $this->OBJCCS->PrimarySkills1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Primary Skills 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['primarySkills2'], OBJECTCATEGORIES::PRIMARY_SKILLS_2, $this->OBJCCS->PrimarySkills2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Secondary Skills
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['secondarySkills'], OBJECTCATEGORIES::SECONDARY_SKILLS, $this->OBJCCS->SecondarySkills, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// XP
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['xp'], OBJECTCATEGORIES::XP, $this->OBJCCS->XP, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Mana
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['mana'], OBJECTCATEGORIES::MANA, $this->OBJCCS->Mana, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Multi-Bonus
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['multiBonus'], OBJECTCATEGORIES::MULTI_BONUS, $this->OBJCCS->MultiBonus, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Movement
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['movement'], OBJECTCATEGORIES::MOVEMENT, $this->OBJCCS->Movement, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Morale
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['morale'], OBJECTCATEGORIES::MORALE, $this->OBJCCS->Morale, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Luck
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['luck'], OBJECTCATEGORIES::LUCK, $this->OBJCCS->Luck, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountTable($table);

// Special
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['special'], OBJECTCATEGORIES::SPECIAL, $this->OBJCCS->Special, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountTable($table);

// Spells
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['spells'], OBJECTCATEGORIES::SPELLS, $this->OBJCCS->Spells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Artifacts
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['artifacts'], OBJECTCATEGORIES::ARTIFACTS, $this->OBJCCS->Artifacts, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Treasures
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['treasures'], OBJECTCATEGORIES::TREASURES, $this->OBJCCS->Treasures, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Resources 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['resources1'], OBJECTCATEGORIES::RESOURCES_1, $this->OBJCCS->Resources1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Resources 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['resources2'], OBJECTCATEGORIES::RESOURCES_2, $this->OBJCCS->Resources2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Resource Generators
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['resourceGenerators'], OBJECTCATEGORIES::RESOURCE_GENERATORS, $this->OBJCCS->ResourceGenerators, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Scouting
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['scouting'], OBJECTCATEGORIES::SCOUTING, $this->OBJCCS->Scouting, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Magical Terrains – Spells
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['magicalTerrainsSpells'], OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS, $this->OBJCCS->MagicalTerrainsSpells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountTable($table);

// Magical Terrains – Bonuses
$table = new OC_Table(OC_TABLETYPE::NORMAL, $categories['magicalTerrainsBonuses'], OBJECTCATEGORIES::MAGICAL_TERRAINS_BONUSES, $this->OBJCCS->MagicalTerrainsBonuses, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountTable($table);

/* FUNCTIONS */

function SortIntoCategories($objectsall)
{
	foreach ($objectsall as $objcategory => $obj) {
		match ($objcategory) {
			OBJECTCATEGORIES::ARTIFACTS => $categories['artifacts'] = $obj,
			OBJECTCATEGORIES::BOATS_AND_AIRSHIPS => $categories['boatsAndAirships'] = $obj,
			OBJECTCATEGORIES::BORDER_GATES => $categories['borderGates'] = $obj,
			OBJECTCATEGORIES::BORDER_GUARDS => $categories['borderGuards'] = $obj,
			OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS => $categories['creatureBanksArtifacts'] = $obj,
			OBJECTCATEGORIES::CREATURE_BANKS_CREATURES => $categories['creatureBanksCreatures'] = $obj,
			OBJECTCATEGORIES::CREATURE_BANKS_ELITE => $categories['creatureBanksElite'] = $obj,
			OBJECTCATEGORIES::CREATURE_BANKS_RESOURCES => $categories['creatureBanksResources'] = $obj,
			OBJECTCATEGORIES::DWELLINGS => $categories['dwellings'] = $obj,
			OBJECTCATEGORIES::GARRISONS_AND_QUEST_GATES_GUARDS => $categories['garrisonsAndQuestGatesGuards'] = $obj,
			OBJECTCATEGORIES::HEROES_AND_INFO => $categories['heroesAndInfo'] = $obj,
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
	return $categories;
}

function DisplayObjCountTable($table) {

	// Flex start if applicable
	if ($table->flexType === OC_FLEXTYPE::START) {
		echo START_FLEX;
	}

	// Custom sort if applicable
	if (!empty($table->customOrder)) {
		$customOrder = $table->customOrder;
		uasort($table->category, function ($a, $b) use ($customOrder) {
			return customSort($a, $b, $customOrder);
		});
	}

	// Print table category title
	echo '<table class="'.OBJCOUNT_TABLECLASS.'">
			<thead>
				<tr>
					<td colspan="'.OBJCOUNT_COLSPAN.'" class="table__title-bar--small">'.$table->categoryConstant.'</td>
				</tr>';

	// Print rest of table based on table type
	switch ($table->tableType) {

		case OC_TABLETYPE::NORMAL:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Type</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
				</tr></thead><tbody>';
			foreach ($table->category as $objcomboid => $obj) {
				echo '<tr>
						<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
						<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$obj['count'].'</td>
					</tr>';
			}
			break;

		case OC_TABLETYPE::BORDER:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Color</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Tent</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Gate</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Grd</th>
				</tr></thead><tbody>';
			for($i = 0; $i < $table->typeCount; $i++) {
				echo '<tr>
						<td class="ac nowrap" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special1[$table->special2[$i]]['count'].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special3[$table->special4[$i]]['count'].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special5[$table->special6[$i]]['count'].'</td>
					</tr>';
			}
			break;

		case OC_TABLETYPE::ONE_WAY_MONOLITH_PORTAL:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Color</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Entr</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Exit</th>
				</tr></thead><tbody>';
			for($i = 0; $i < $table->typeCount; $i++) {
				echo '<tr>
						<td class="ac nowrap" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special1[$table->special2[$i]]['count'].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special3[$table->special4[$i]]['count'].'</td>
					</tr>';
			}
			break;

		case OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Color</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">#</th>
				</tr></thead><tbody>';
			for($i = 0; $i < $table->typeCount; $i++) {
				echo '<tr>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special1[$i].'</td>
						<td class="nowrap" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->category[$table->special1[$i]]['count'].'</td>
					</tr>';
			}
			break;

		case OC_TABLETYPE::MINE_WAREHOUSE:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Type</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Mine</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">WH</th>
				</tr></thead><tbody>';
			for($i = 0; $i < $table->typeCount; $i++) {
				if($i < $table->typeCount - 1) {
					$whCellClass = 'ac nowrap';
				} else {
					$whCellClass = 'cell-greyed-out ac nowrap';
				}
				echo '<tr>
						<td class="ac nowrap" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap" nowrap="nowrap">'.$table->special2[$table->special3[$i]]['count'].'</td>
						<td class="'.$whCellClass.'" nowrap="nowrap">'.$table->special5[$table->special6[$i]]['count'].'</td>
					</tr>';
			}
			break;
	}
	echo '</tbody></table>';

	// Flex end if applicable
	if ($table->flexType === OC_FLEXTYPE::END) {
		echo END_FLEX;
	}
}
