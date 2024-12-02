<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

/* DECLARATIONS */
$obj_per_zone = $this->h3mapscan->objects_per_zone;
$sortOrder = new OC_Sort_Order();
$zoneColors = [
    'Blue' => [49, 82, 255],
    'Tan' => [156, 115, 82],
    'Green' => [66, 148, 41],
    'Orange' => [255, 132, 0],
    'Purple' => [140, 41, 165],
    'Teal' => [8, 156, 165],
    'Pink' => [198, 123, 140],
    'Red' => [255, 0, 0],
];

/* MAIN */

$baseFilename = pathinfo($this->h3mapscan->mapfile, PATHINFO_FILENAME);
$groundColors = loadImageColors(MAPDIR . $baseFilename . '_g.png');
$undergroundColors = loadImageColors(MAPDIR . $baseFilename . '_u.png');

// Towns
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::TOWNS], OBJ_CATEGORY::TOWNS, $sortOrder->Towns, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors);

/*
// Heroes & Info
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::HEROES_AND_INFO], OBJ_CATEGORY::HEROES_AND_INFO, $sortOrder->HeroesAndInfo, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Monsters
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MONSTERS], OBJ_CATEGORY::MONSTERS, $sortOrder->Monsters, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Keymasters / Border
$tentKeys = array_keys($obj_per_zone[OBJ_CATEGORY::KEYMASTERS_TENTS]);
$bGateKeys = array_keys($obj_per_zone[OBJ_CATEGORY::BORDER_GATES]);
$bGuardKeys = array_keys($obj_per_zone[OBJ_CATEGORY::BORDER_GUARDS]);
$ids = [];
for ($i = 0; $i < 8; $i++) {
	$id1 = $tentKeys[$i] ?? null;
	$id2 = $bGateKeys[$i] ?? null;
	$id3 = $bGuardKeys[$i] ?? null;
	$ids[] = $id1 . COMBOID_SEPARATOR . $id2 . COMBOID_SEPARATOR . $id3;
}
$table = new OC_Table(OC_TABLETYPE::BORDER, null, OBJ_CATEGORY::KEYMASTERS_BORDER, null, $sortOrder->KeymastersBorder, 8, $ids, OC_FLEXTYPE::NONE, $obj_per_zone[OBJ_CATEGORY::KEYMASTERS_TENTS], $tentKeys, $obj_per_zone[OBJ_CATEGORY::BORDER_GATES], $bGateKeys, $obj_per_zone[OBJ_CATEGORY::BORDER_GUARDS], $bGuardKeys);
DisplayObjCountZoneTable($table);

// 1-Way Monoliths
$entranceKeys = array_keys($obj_per_zone[OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES]);
$exitKeys = array_keys($obj_per_zone[OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS]);
$ids = [];
for($i = 0; $i < 8; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$table = new OC_Table(OC_TABLETYPE::ONE_WAY_MONOLITH_PORTAL, null, OBJ_CATEGORY::ONE_WAY_MONOLITHS, null, $sortOrder->OneWayMonoliths, 8, $ids, OC_FLEXTYPE::NONE, $obj_per_zone[OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES], $entranceKeys, $obj_per_zone[OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS], $exitKeys);
DisplayObjCountZoneTable($table);

// 1-Way Portals
$entranceKeys = array_keys($obj_per_zone[OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES]);
$exitKeys = array_keys($obj_per_zone[OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS]);
$ids = [];
for($i = 0; $i < 4; $i++) {
	$id1 = $entranceKeys[$i] ?? null;
	$id2 = $exitKeys[$i] ?? null;
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$table = new OC_Table(OC_TABLETYPE::ONE_WAY_MONOLITH_PORTAL, null, OBJ_CATEGORY::ONE_WAY_PORTALS, null, $sortOrder->OneWayPortals, 4, $ids, OC_FLEXTYPE::NONE, $obj_per_zone[OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES], $entranceKeys, $obj_per_zone[OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS], $exitKeys);
DisplayObjCountZoneTable($table);

// 2-Way Monoliths
$keys = array_keys($obj_per_zone[OBJ_CATEGORY::TWO_WAY_MONOLITHS]);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $obj_per_zone[OBJ_CATEGORY::TWO_WAY_MONOLITHS], OBJ_CATEGORY::TWO_WAY_MONOLITHS, null, $sortOrder->TwoWayMonoliths, 10, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountZoneTable($table);

// 2-Way Portals
$keys = array_keys($obj_per_zone[OBJ_CATEGORY::TWO_WAY_PORTALS]);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $obj_per_zone[OBJ_CATEGORY::TWO_WAY_PORTALS], OBJ_CATEGORY::TWO_WAY_PORTALS, null, $sortOrder->TwoWayPortals, 10, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountZoneTable($table);

// 2-Way Sea Portals
$keys = array_keys($obj_per_zone[OBJ_CATEGORY::TWO_WAY_SEA_PORTALS]);
$table = new OC_Table(OC_TABLETYPE::TWO_WAY_MONOLITH_PORTAL, $obj_per_zone[OBJ_CATEGORY::TWO_WAY_SEA_PORTALS], OBJ_CATEGORY::TWO_WAY_SEA_PORTALS, null, $sortOrder->TwoWaySeaPortals, 5, null, OC_FLEXTYPE::NONE, $keys);
DisplayObjCountZoneTable($table);

// Other Gateways
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::OTHER_GATEWAYS], OBJ_CATEGORY::OTHER_GATEWAYS, $sortOrder->OtherGateways, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountZoneTable($table);

// Mines & Warehouses
$mineKeys = array_keys($obj_per_zone[OBJ_CATEGORY::MINES]);
$warehouseKeys = array_keys($obj_per_zone[OBJ_CATEGORY::WAREHOUSES]);
$warehouseKeys[7] = '142-N/A';
$obj_per_zone[OBJ_CATEGORY::WAREHOUSES][$warehouseKeys[7]] = ['name' => '', 'count' => ''];
$ids = [];
for($i = 0; $i < 7; $i++) {
	$id1 = $mineKeys[$i];
	$id2 = $warehouseKeys[$i];
	$ids[] = $id1.COMBOID_SEPARATOR.$id2;
}
$ids[] = $mineKeys[7];
$table = new OC_Table(OC_TABLETYPE::MINE_WAREHOUSE, null, OBJ_CATEGORY::MINES_AND_WAREHOUSES, null, $sortOrder->ResourceTypes, 8, $ids, OC_FLEXTYPE::START, $sortOrder->Mines, $obj_per_zone[OBJ_CATEGORY::MINES], $mineKeys, $sortOrder->Warehouses, $obj_per_zone[OBJ_CATEGORY::WAREHOUSES], $warehouseKeys);
DisplayObjCountZoneTable($table);

// Dwellings
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::DWELLINGS], OBJ_CATEGORY::DWELLINGS, $sortOrder->Dwellings, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Garrisons / Quests
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::GARRISONS_QUESTS], OBJ_CATEGORY::GARRISONS_QUESTS, $sortOrder->GarrisonsQuests, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// War Machines & Upgrades
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES], OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES, $sortOrder->WarMachinesAndUpgrades, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Trading
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::TRADING], OBJ_CATEGORY::TRADING, $sortOrder->Trading, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Creature Banks – Elite
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_ELITE], OBJ_CATEGORY::CREATURE_BANKS_ELITE, $sortOrder->CreatureBanksElite, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Creature Banks – Artifacts
asort($obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS]);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS], OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS, null, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Creature Banks – Resources
asort($obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_RESOURCES]);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_RESOURCES], OBJ_CATEGORY::CREATURE_BANKS_RESOURCES, null, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Creature Banks – Creatures
asort($obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_CREATURES]);
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::CREATURE_BANKS_CREATURES], OBJ_CATEGORY::CREATURE_BANKS_CREATURES, null, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountZoneTable($table);

// Boats & Airships
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::BOATS_AND_AIRSHIPS], OBJ_CATEGORY::BOATS_AND_AIRSHIPS, $sortOrder->BoatsAndAirships, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountZoneTable($table);

// Primary Skills 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::PRIMARY_SKILLS_1], OBJ_CATEGORY::PRIMARY_SKILLS_1, $sortOrder->PrimarySkills1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Primary Skills 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::PRIMARY_SKILLS_2], OBJ_CATEGORY::PRIMARY_SKILLS_2, $sortOrder->PrimarySkills2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Secondary Skills
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::SECONDARY_SKILLS], OBJ_CATEGORY::SECONDARY_SKILLS, $sortOrder->SecondarySkills, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// XP
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::XP], OBJ_CATEGORY::XP, $sortOrder->XP, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Mana
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MANA], OBJ_CATEGORY::MANA, $sortOrder->Mana, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Multi-Bonus
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MULTI_BONUS], OBJ_CATEGORY::MULTI_BONUS, $sortOrder->MultiBonus, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Movement
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MOVEMENT], OBJ_CATEGORY::MOVEMENT, $sortOrder->Movement, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Morale
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MORALE], OBJ_CATEGORY::MORALE, $sortOrder->Morale, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Luck
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::LUCK], OBJ_CATEGORY::LUCK, $sortOrder->Luck, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountZoneTable($table);

// Special
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::SPECIAL], OBJ_CATEGORY::SPECIAL, $sortOrder->Special, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountZoneTable($table);

// Spells
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::SPELLS], OBJ_CATEGORY::SPELLS, $sortOrder->Spells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Artifacts
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::ARTIFACTS], OBJ_CATEGORY::ARTIFACTS, $sortOrder->Artifacts, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Treasures
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::TREASURES], OBJ_CATEGORY::TREASURES, $sortOrder->Treasures, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Resources 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::RESOURCES_1], OBJ_CATEGORY::RESOURCES_1, $sortOrder->Resources1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Resources 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::RESOURCES_2], OBJ_CATEGORY::RESOURCES_2, $sortOrder->Resources2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Resource Generators
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::RESOURCE_GENERATORS], OBJ_CATEGORY::RESOURCE_GENERATORS, $sortOrder->ResourceGenerators, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Scouting
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::SCOUTING], OBJ_CATEGORY::SCOUTING, $sortOrder->Scouting, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Magical Terrains – Spells
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS], OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS, $sortOrder->MagicalTerrainsSpells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table);

// Magical Terrains – Bonuses
$table = new OC_Table(OC_TABLETYPE::NORMAL, $obj_per_zone[OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES], OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES, $sortOrder->MagicalTerrainsBonuses, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountZoneTable($table);
*/

/* END MAIN */

function loadImageColors($filename) {
    if (!file_exists($filename)) {
        return null;
    }
    $image = imagecreatefrompng($filename);
    $width = imagesx($image);
    $height = imagesy($image);
    $colors = [];

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $rgb = imagecolorat($image, $x, $y);
            $colors[$x][$y] = [
                ($rgb >> 16) & 0xFF, // Red
                ($rgb >> 8) & 0xFF,  // Green
                $rgb & 0xFF          // Blue
            ];
        }
    }
    imagedestroy($image);
    return $colors;
}

function getZoneByColor($color, $zoneColors) {
    foreach ($zoneColors as $zone => $zoneColor) {
        if ($color === $zoneColor) {
            return $zone;
        }
    }
    return null;
}

function DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors) {

	// Flex start if applicable
	if ($table->flexType === OC_FLEXTYPE::START) {
		echo START_FLEX;
	}

	// Print table category title
	echo '<table class="'.OBJCOUNT_TABLECLASS.'">
			<thead>
				<tr>
					<th colspan="'.OBJCOUNT_COLSPAN.'" class="table__title-bar--small">'.$table->category.'</td>
				</tr>';

	// Print rest of table based on table type
	switch ($table->tableType) {

		case OC_TABLETYPE::NORMAL:
			echo '<tr>
					<th class="table__title-bar--small2">ID</th>
					<th class="table__title-bar--small2">Type</th>';
			for ($n=0; $n < 7; $n++) {
				echo '<th class="table__title-bar--small2b player'.($n+1).'"></th>';
			}
			echo '<th class="table__title-bar--small2c"></th>';
			echo '<th class="table__title-bar--small2b player8"></th>';
			echo '</tr>';

			//echo '<pre>';
			//print_r($table->objects);
			//echo '</pre>';

			$objectCounts = [];

			foreach ($table->objects as $obj) {
				$objcomboid = $obj['comboid'];
				$x = $obj['pos']->x;
				$y = $obj['pos']->y;
				$z = $obj['pos']->z;
				$color = null;

				if ($z == 0 && $groundColors) {
					$color = $groundColors[$x][$y];
				} elseif ($z == 1 && $undergroundColors) {
					$color = $undergroundColors[$x][$y];
				}

				if ($color) {
					$zone = getZoneByColor($color, $zoneColors);
					if ($zone) {
						if (!isset($objectCounts[$objcomboid])) {
							$objectCounts[$objcomboid] = [
								'name' =>  $obj['name'],
								'zones' => array_fill_keys(array_keys($zoneColors), 0)
							];
						}
						$objectCounts[$objcomboid]['zones'][$zone] += 1;
					}
				}
			}

			$flatObjectCounts = [];
			$heroesCS = new HeroesConstants();

			// Initialize the flat list with custom order objects
			foreach ($heroesCS->ObjectEx as $comboid => $details) {
				if (in_array($details['name'], $table->customOrder)) {
					$flatObjectCounts[$comboid] = [
						'name' => $details['name'],
						'zones' => array_fill_keys(array_keys($zoneColors), 0)
					];
				}
			}

			foreach ($objectCounts as $comboid => $obj) {
				$flatObjectCounts[$comboid]['zones'] = $obj['zones'];
			}

			// Sort the flat list by object name
			if (!empty($table->customOrder)) {
				$order = $table->customOrder;
				uasort($flatObjectCounts, function ($a, $b) use ($order) {
					return customSort($a['name'], $b['name'], $order);
				});
			}

			// Count the total number of elements in the array
			$totalCount = count($flatObjectCounts);
			$currentCount = 0;

			// Generate the table rows from the sorted flat list
			foreach ($flatObjectCounts as $comboid => $obj) {
				$currentCount++;
				$isLastIteration = ($currentCount === $totalCount);

				$rowTotal = 0;
				foreach (array_keys($zoneColors) as $zone) {
					$count = $obj['zones'][$zone];
					$rowTotal += $count;
				}

				if($rowTotal == 0) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-active';
				}

				echo '<tr>';
				echo '<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$comboid.'</td>';
				echo '<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$obj['name'].'</td>';

				$n=0;
				foreach (array_keys($zoneColors) as $zone) {
					if ($zone == 'Red') {
						if (!$isLastIteration) {
							echo '<td class="cell-blacked-out"></td>';
						} else {
							echo '<td class="cell-blacked-out-last"></td>';
						}
					}
					$count = $obj['zones'][$zone] == 0 ? EMPTY_DATA : $obj['zones'][$zone];
					if($count == EMPTY_DATA) {
						if($rowTotal == 0) {
							$classSuffix = ' obj-count-inactive';
						} else {
							$classSuffix = ' obj-count-active';
						}
					} else {
						$classSuffix = ' player-dark'.($n+1);
					}
					$classSuffix = ' player-dark'.($n+1);
					echo '<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$count.'</td>';
					$n++;
				}
				echo '</tr>';
			}

		/*
		case OC_TABLETYPE::BORDER:
			echo '<tr>
					<th class="ac nowrap" nowrap="nowrap">ID</th>
					<th class="ac nowrap" nowrap="nowrap">Color</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Tent</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Gate</th>
					<th class="table-small__count-column-header ac nowrap" nowrap="nowrap">Grd</th>
				</tr></thead><tbody>';
			for($i = 0; $i < $table->typeCount; $i++) {
				$tentCount = $table->special1[$table->special2[$i]]['count'];
				$borderGateCount = $table->special3[$table->special4[$i]]['count'];
				$borderGuardCount = $table->special5[$table->special6[$i]]['count'];
				if($tentCount === EMPTY_DATA && $borderGateCount === EMPTY_DATA && $borderGuardCount === EMPTY_DATA) {
					$classSuffix = ' obj-count-inactive';
					$classSuffixTents = ' obj-count-inactive';
					$classSuffixBorderGates = ' obj-count-inactive';
					$classSuffixBorderGuards = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-active';
					if($tentCount === EMPTY_DATA) {
						$classSuffixTents = ' obj-count-inactive';
					} else {
						$classSuffixTents = ' obj-count-active';
					}
					if($borderGateCount === EMPTY_DATA) {
						$classSuffixBorderGates = ' obj-count-inactive';
					} else {
						$classSuffixBorderGates = ' obj-count-active';
					}
					if($borderGuardCount === EMPTY_DATA) {
						$classSuffixBorderGuards = ' obj-count-inactive';
					} else {
						$classSuffixBorderGuards = ' obj-count-active';
					}
				}
				echo '<tr>
						<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap'.$classSuffixTents.'" nowrap="nowrap">'.$tentCount.'</td>
						<td class="ac nowrap'.$classSuffixBorderGates.'" nowrap="nowrap">'.$borderGateCount.'</td>
						<td class="ac nowrap'.$classSuffixBorderGuards.'" nowrap="nowrap">'.$borderGuardCount.'</td>
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
				$entranceCount = $table->special1[$table->special2[$i]]['count'];
				$exitCount = $table->special3[$table->special4[$i]]['count'];
				if($entranceCount === EMPTY_DATA && $exitCount === EMPTY_DATA) {
					$classSuffix = ' obj-count-inactive';
					$classSuffixEntrances = ' obj-count-inactive';
					$classSuffixExits = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-active';
					if($entranceCount === EMPTY_DATA) {
						$classSuffixEntrances = ' obj-count-inactive';
					} else {
						$classSuffixEntrances = ' obj-count-active';
					}
					if($exitCount === EMPTY_DATA) {
						$classSuffixExits = ' obj-count-inactive';
					} else {
						$classSuffixExits = ' obj-count-active';
					}
				}
				echo '<tr>
						<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap'.$classSuffixEntrances.'" nowrap="nowrap">'.$entranceCount.'</td>
						<td class="ac nowrap'.$classSuffixExits.'" nowrap="nowrap">'.$exitCount.'</td>
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
				$count = $table->objects[$table->special1[$i]]['count'];
				if($count === EMPTY_DATA) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-active';
				}
				echo '<tr>
						<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->special1[$i].'</td>
						<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$count.'</td>
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
				$mineCount = $table->special2[$table->special3[$i]]['count'];
				$warehouseCount = $table->special5[$table->special6[$i]]['count'];
				if($mineCount === EMPTY_DATA && ($warehouseCount === EMPTY_DATA || $warehouseCount === '')) {
					$classSuffix = ' obj-count-inactive';
					$classSuffixMines = ' obj-count-inactive';
					$classSuffixWarehouses = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-active';
					if($mineCount === EMPTY_DATA) {
						$classSuffixMines = ' obj-count-inactive';
					} else {
						$classSuffixMines = ' obj-count-active';
					}
					if($warehouseCount === EMPTY_DATA) {
						$classSuffixWarehouses = ' obj-count-inactive';
					} else {
						$classSuffixWarehouses = ' obj-count-active';
					}
				}
				if($i < $table->typeCount - 1) {
					$whCellClass = 'ac nowrap';
				} else {
					$whCellClass = 'cell-hidden ac nowrap';
				}
				echo '<tr>
						<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->ids[$i].'</td>
						<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$table->types[$i].'</td>
						<td class="ac nowrap'.$classSuffixMines.'" nowrap="nowrap">'.$mineCount.'</td>
						<td class="'.$whCellClass.$classSuffixWarehouses.'" nowrap="nowrap">'.$warehouseCount.'</td>
					</tr>';
			}
			break;
		*/
	}
	echo '</tbody></table>';

	// Flex end if applicable
	if ($table->flexType === OC_FLEXTYPE::END) {
		echo END_FLEX;
	}
}
