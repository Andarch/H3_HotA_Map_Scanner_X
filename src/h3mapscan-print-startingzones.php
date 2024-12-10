<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

/* DECLARATIONS */
$h3mapscan =  $this->h3mapscan;
$mapimage = $h3mapscan->mapimage;
$underground = $h3mapscan->underground;
$zonesImageBaseFilename = pathinfo($h3mapscan->mapfile, PATHINFO_FILENAME);
$objPerZone = $h3mapscan->objectsPerZone;
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

// Debug start
// $objAll = $h3mapscan->objects_all;
// $realsubid = $h3mapscan->realsubid;
// foreach($objAll as $objects) {
// 	foreach($objects as $comboid => $obj) {
// 		$ids = explode('-', $comboid);
// 		$id = $ids[0];
// 		$newcomboid = $id.'-'.$realsubid;
// 		if($obj['count'] != EMPTY_DATA) {
// 			echo $obj['name'].' '.$newcomboid.'</br>';
// 		}
// 	}
// }
// echo '</br>';
// Debug end

// Images table
$timestamp = time();
$imgmapnameg = MAPDIRIMG.$mapimage.'_g.png';
$imgmapnameu = MAPDIRIMG.$mapimage.'_u.png';
$imgzonesg = MAPDIR.$zonesImageBaseFilename.'_g.png';
$imgzonesu = MAPDIR.$zonesImageBaseFilename.'_u.png';
$imgground = file_exists($imgmapnameg) ? '<img src="'.$imgmapnameg.'?t='.$timestamp.'" class="map-image-bg" /><img src="'.$imgzonesg.'?t='.$timestamp.'" class="map-image-overlay" />' : 'Map Ground';
$output = '<table class="table-small"><th>Ground</th><th>Underground</th><tr><td class="map-image-container">'.$imgground.'</td>';
if($underground) {
	$imguground = file_exists($imgmapnameu) ? '<img src="'.$imgmapnameu.'?t='.$timestamp.'" class="map-image-bg" /><img src="'.$imgzonesu.'?t='.$timestamp.'" class="map-image-overlay" />' : 'Map Underground';
	$output .= '<td class="map-image-container">'.$imguground.'</td>';
}
$output .= '</tr></table>';
echo $output;

// Scan zone overlays
$groundColors = loadImageColors(MAPDIR.$zonesImageBaseFilename.'_g.png');
$undergroundColors = loadImageColors(MAPDIR.$zonesImageBaseFilename.'_u.png');

// Towns
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TOWNS], OBJ_CATEGORY::TOWNS, $sortOrder->Towns, null, null, null, OC_FLEXTYPE::START);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Heroes & Info
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::HEROES_AND_INFO], OBJ_CATEGORY::HEROES_AND_INFO, $sortOrder->HeroesAndInfo, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Monsters
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MONSTERS], OBJ_CATEGORY::MONSTERS, $sortOrder->Monsters, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Keymaster Tents
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::KEYMASTERS_TENTS], OBJ_CATEGORY::KEYMASTERS_TENTS, $sortOrder->KeymastersBorder, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Border Gates
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::BORDER_GATES], OBJ_CATEGORY::BORDER_GATES, $sortOrder->KeymastersBorder, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Border Guards
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::BORDER_GUARDS], OBJ_CATEGORY::BORDER_GUARDS, $sortOrder->KeymastersBorder, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 1-Way Monolith Entrances
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES], OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES, $sortOrder->OneWayMonoliths, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 1-Way Monolith Exits
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS], OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS, $sortOrder->OneWayMonoliths, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 1-Way Portal Entrances
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES], OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES, $sortOrder->OneWayPortals, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 1-Way Portal Exits
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS], OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS, $sortOrder->OneWayPortals, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 2-Way Monoliths
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TWO_WAY_MONOLITHS], OBJ_CATEGORY::TWO_WAY_MONOLITHS, $sortOrder->TwoWayMonoliths, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 2-Way Portals
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TWO_WAY_PORTALS], OBJ_CATEGORY::TWO_WAY_PORTALS, $sortOrder->TwoWayPortals, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// 2-Way Sea Portals
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TWO_WAY_SEA_PORTALS], OBJ_CATEGORY::TWO_WAY_SEA_PORTALS, $sortOrder->TwoWaySeaPortals, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Other Gateways
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::OTHER_GATEWAYS], OBJ_CATEGORY::OTHER_GATEWAYS, $sortOrder->OtherGateways, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Mines
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MINES], OBJ_CATEGORY::MINES, $sortOrder->Mines, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Warehouses
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::WAREHOUSES], OBJ_CATEGORY::WAREHOUSES, $sortOrder->Warehouses, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Dwellings
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::DWELLINGS], OBJ_CATEGORY::DWELLINGS, $sortOrder->Dwellings, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Dwellings by Level
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::DWELLINGS_BY_LEVEL], OBJ_CATEGORY::DWELLINGS_BY_LEVEL, $sortOrder->DwellingsByLevel, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Neutral Dwellings 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::NEUTRAL_DWELLINGS_1], OBJ_CATEGORY::NEUTRAL_DWELLINGS_1, $sortOrder->NeutralDwellings1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Neutral Dwellings 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::NEUTRAL_DWELLINGS_2], OBJ_CATEGORY::NEUTRAL_DWELLINGS_2, $sortOrder->NeutralDwellings2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Other Dwellings
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::OTHER_DWELLINGS], OBJ_CATEGORY::OTHER_DWELLINGS, $sortOrder->OtherDwellings, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Garrisons / Quests
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::GARRISONS_QUESTS], OBJ_CATEGORY::GARRISONS_QUESTS, $sortOrder->GarrisonsQuests, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// War Machines & Upgrades
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES], OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES, $sortOrder->WarMachinesAndUpgrades, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Trading
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TRADING], OBJ_CATEGORY::TRADING, $sortOrder->Trading, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Creature Banks – Elite
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::CREATURE_BANKS_ELITE], OBJ_CATEGORY::CREATURE_BANKS_ELITE, $sortOrder->CreatureBanksElite, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Creature Banks – Artifacts
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS], OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS, $sortOrder->CreatureBanksArtifacts, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Creature Banks – Resources
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::CREATURE_BANKS_RESOURCES], OBJ_CATEGORY::CREATURE_BANKS_RESOURCES, $sortOrder->CreatureBanksResources, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Creature Banks – Creatures
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::CREATURE_BANKS_CREATURES], OBJ_CATEGORY::CREATURE_BANKS_CREATURES, $sortOrder->CreatureBanksCreatures, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Boats & Airships
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::BOATS_AND_AIRSHIPS], OBJ_CATEGORY::BOATS_AND_AIRSHIPS, $sortOrder->BoatsAndAirships, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Primary Skills 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::PRIMARY_SKILLS_1], OBJ_CATEGORY::PRIMARY_SKILLS_1, $sortOrder->PrimarySkills1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Primary Skills 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::PRIMARY_SKILLS_2], OBJ_CATEGORY::PRIMARY_SKILLS_2, $sortOrder->PrimarySkills2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Secondary Skills
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::SECONDARY_SKILLS], OBJ_CATEGORY::SECONDARY_SKILLS, $sortOrder->SecondarySkills, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// XP
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::XP], OBJ_CATEGORY::XP, $sortOrder->XP, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Mana
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MANA], OBJ_CATEGORY::MANA, $sortOrder->Mana, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Multi-Bonus
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MULTI_BONUS], OBJ_CATEGORY::MULTI_BONUS, $sortOrder->MultiBonus, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Movement
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MOVEMENT], OBJ_CATEGORY::MOVEMENT, $sortOrder->Movement, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Morale
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MORALE], OBJ_CATEGORY::MORALE, $sortOrder->Morale, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Luck
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::LUCK], OBJ_CATEGORY::LUCK, $sortOrder->Luck, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Special
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::SPECIAL], OBJ_CATEGORY::SPECIAL, $sortOrder->Special, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Spells
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::SPELLS], OBJ_CATEGORY::SPELLS, $sortOrder->Spells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Artifacts
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::ARTIFACTS], OBJ_CATEGORY::ARTIFACTS, $sortOrder->Artifacts, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Treasures
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TREASURES], OBJ_CATEGORY::TREASURES, $sortOrder->Treasures, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Resources 1
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::RESOURCES_1], OBJ_CATEGORY::RESOURCES_1, $sortOrder->Resources1, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Resources 2
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::RESOURCES_2], OBJ_CATEGORY::RESOURCES_2, $sortOrder->Resources2, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Resource Generators
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::RESOURCE_GENERATORS], OBJ_CATEGORY::RESOURCE_GENERATORS, $sortOrder->ResourceGenerators, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Scouting
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::SCOUTING], OBJ_CATEGORY::SCOUTING, $sortOrder->Scouting, null, null, null, OC_FLEXTYPE::END);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

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

function DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan) {

	// Flex start if applicable
	if ($table->flexType === OC_FLEXTYPE::START) {
		echo START_FLEX;
	}

	// Print table category title
	echo '<table class="'.OBJCOUNT_TABLECLASS.'">
			<thead>
				<tr>
					<th colspan="'.OBJCOUNT_COLSPAN.'" class="table__title-bar--small2">'.$table->category.'</td>
				</tr>';

	// Print rest of table based on table type
	switch ($table->tableType) {

		case OC_TABLETYPE::NORMAL:
			echo '<tr>
					<th>ID</th>
					<th>Type</th>';
			for ($n=0; $n < 7; $n++) {
				echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById($n+1).'</th>';
			}
			echo '<th class="th-divider"></th>';
			echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById(0).'</th>';
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
				switch ($table->category) {
					case OBJ_CATEGORY::KEYMASTERS_TENTS:
						$prefix = "Keymaster's Tent – ";
						$name = str_replace($prefix, '', $details['name']);
						break;
					case OBJ_CATEGORY::BORDER_GATES:
						$prefix = "Border Gate – ";
						$name = str_replace($prefix, '', $details['name']);
						break;
					case OBJ_CATEGORY::BORDER_GUARDS:
						$prefix = "Border Guard – ";
						$name = str_replace($prefix, '', $details['name']);
						break;
					case OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES:
						$prefix = "Monolith – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " One-Way Entrance";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS:
						$prefix = "Monolith – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " One-Way Exit";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES:
						$prefix = "Portal – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " One-Way Entrance";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS:
						$prefix = "Portal – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " One-Way Exit";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::TWO_WAY_MONOLITHS:
						$prefix = "Monolith – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " Two-Way";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::TWO_WAY_PORTALS:
						$prefix = "Portal – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " Two-Way";
						$name = str_replace($suffix, '', $name);
						break;
					case OBJ_CATEGORY::TWO_WAY_SEA_PORTALS:
						$prefix = "Sea Portal – ";
						$name = str_replace($prefix, '', $details['name']);
						$suffix = " Two-Way";
						$name = str_replace($suffix, '', $name);
						break;
					default:
						$name = $details['name'];
						break;
				}
				if (in_array($name, $table->customOrder)) {
					$flatObjectCounts[$comboid] = [
						'name' => $name,
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
				uasort($flatObjectCounts, function ($a, $b) use ($table, $order) {
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
							echo '<td class="cell-greyed-out"></td>';
						} else {
							echo '<td class="cell-greyed-out-last"></td>';
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
