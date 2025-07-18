<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

/* DECLARATIONS */
$h3mapscan =  $this->h3mapscan;
// $mapimage = $h3mapscan->mapimage;
$underground = $h3mapscan->underground;
$zonesImageBaseFilename = pathinfo($h3mapscan->mapfile, PATHINFO_FILENAME);
$objPerZone = $h3mapscan->objectCountPlayers;
$sortOrder = new OC_Sort_Order();
$zoneColors = [
    // 'Blue' => [49, 82, 255],
    // 'Tan' => [156, 115, 82],
    // 'Green' => [66, 148, 41],
    // 'Orange' => [255, 132, 0],
    // 'Purple' => [140, 41, 165],
    // 'Teal' => [8, 156, 165],
    // 'Pink' => [198, 123, 140],
    // 'Red' => [255, 0, 0],
    'Blue' => [89, 110, 184],
    'Tan' => [129, 108, 88],
    'Green' => [71, 109, 54],
    'Orange' => [179, 129, 76],
    'Purple' => [109, 59, 120],
    'Teal' => [50, 112, 116],
    'Pink' => [171, 129, 140],
    'Red' => [179, 76, 76],
    'Neutral' => [77, 77, 77],
    'Super' => [179, 170, 76],
    'Total' => 'Total',
];

/* MAIN */

echo '<div class="obz-container">';

// Images table
$timestamp = time();
$imgmapnameg = MAPDIR.$zonesImageBaseFilename.'_g.png';
$imgmapnameu = MAPDIR.$zonesImageBaseFilename.'_u.png';
$imgzonesg = MAPDIR.$zonesImageBaseFilename.'_g2.png';
$imgzonesu = MAPDIR.$zonesImageBaseFilename.'_u2.png';
$imgground = file_exists($imgmapnameg) ? '<img src="'.$imgmapnameg.'?t='.$timestamp.'" class="map-image-bg-old" />' : 'Map Ground';
$output = '<div class="obz-map-images-container"><table class="table-small"><th>Ground</th><th>Underground</th><tr><td class="map-image-container">'.$imgground.'</td>';
if($underground) {
	$imguground = file_exists($imgmapnameu) ? '<img src="'.$imgmapnameu.'?t='.$timestamp.'" class="map-image-bg-old" />' : 'Map Underground';
	$output .= '<td class="map-image-container">'.$imguground.'</td>';
}
$output .= '</tr></table></div>';
echo $output;

echo '<div class="obz-tables-container">';

// Create an array containing the coordinates of all towns (combo IDs = 77-0 and 98-0 thru 98-10)
$townCoords = [];
foreach ($objPerZone[OBJ_CATEGORY::TOWNS] as $comboid => $obj) {
	$townCoords[] = $obj['pos']->GetCoords();
}

// If a Hero object (comboid of 34-X) is at the same position as any coords in $townCoords, remove the Hero from $objPerZone
foreach ($objPerZone[OBJ_CATEGORY::HEROES_AND_INFO] as $comboid => $obj) {
	if (in_array($obj['pos']->GetCoords(), $townCoords)) {
		unset($objPerZone[OBJ_CATEGORY::HEROES_AND_INFO][$comboid]);
	}
}

// Scan zone overlays
$groundColors = loadImageColors($imgzonesg);
$undergroundColors = loadImageColors($imgzonesu);

// Towns
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::TOWNS], OBJ_CATEGORY::TOWNS, $sortOrder->Towns, null, null, null, OC_FLEXTYPE::NONE);
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

// Dwellings by Level
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL], OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL, $sortOrder->DwellingsByLevel, null, null, null, OC_FLEXTYPE::NONE);
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
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::SCOUTING], OBJ_CATEGORY::SCOUTING, $sortOrder->Scouting, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Magical Terrains – Spells
// $table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS], OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS, $sortOrder->MagicalTerrainsSpells, null, null, null, OC_FLEXTYPE::NONE);
// DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Magical Terrains – Bonuses
// $table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES], OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES, $sortOrder->MagicalTerrainsBonuses, null, null, null, OC_FLEXTYPE::NONE);
// DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

echo '</div></div>';

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
            $rgba = imagecolorat($image, $x, $y);
			$alpha = ($rgba & 0x7F000000) >> 24;
            $r = ($rgba >> 16) & 0xFF;
            $g = ($rgba >> 8) & 0xFF;
            $b = $rgba & 0xFF;

            // if ($alpha == 127) {
            //     $colors[$x][$y] = 'Neutral';
            // } else {
                $colors[$x][$y] = [$r, $g, $b];
            // }
        }
    }
    imagedestroy($image);
    return $colors;
}

function getZoneByColor($objcomboid, $objtruecomboid, $x, $y, $z, $tileColors, $zoneColors) {
	$color = $tileColors[$x][$y];

	$moreXMinus1ObjIds = [
		'17-X', '17-100', '17-102', '20-0', '85-0'
	];

	$horizontalGarrisonObjIds = [
		'33-0', '33-1'
	];

	$verticalGarrisonObjIds = [
		'219-0', '219-1'
	];

	if($color == [255, 255, 255]) {
		if(in_array($objcomboid, $moreXMinus1ObjIds)) {
			$color = $tileColors[$x - 1][$y];
		} else if(in_array($objtruecomboid, $horizontalGarrisonObjIds)) {
			$color = $tileColors[$x - 1][$y];
		} else if(in_array($objtruecomboid, $verticalGarrisonObjIds)) {
			$color = $tileColors[$x][$y - 1];
		} else if ($objcomboid == '212-1000') {
			$color = $tileColors[$x - 1][$y];
			if($color == [255, 255, 255]) {
				$color = $tileColors[$x][$y - 1];
			}
		} else if ($objcomboid == '31-0') {
			$color = $tileColors[$x - 1][$y - 1];
		}
	}

    foreach ($zoneColors as $zone => $zoneColor) {
        if ($color === $zoneColor) {
            return $zone;
        }
    }

	echo 'TEST</br>';
    return null;
}

function ProcessObject($category, $name, $comboid) {
	$isFactionDwelling = false;
	$objn = '';
	switch ($category) {
		case OBJ_CATEGORY::KEYMASTERS_TENTS:
			$prefix = 'Keymaster\'s Tent – ';
			$objn = str_replace($prefix, '', $name);
			break;
		case OBJ_CATEGORY::BORDER_GATES:
			$prefix = 'Border Gate – ';
			$objn = str_replace($prefix, '', $name);
			break;
		case OBJ_CATEGORY::BORDER_GUARDS:
			$prefix = 'Border Guard – ';
			$objn = str_replace($prefix, '', $name);
			break;
		case OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES:
			$prefix = 'Monolith – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' One-Way Entrance';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS:
			$prefix = 'Monolith – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' One-Way Exit';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES:
			$prefix = 'Portal – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' One-Way Entrance';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS:
			$prefix = 'Portal – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' One-Way Exit';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::TWO_WAY_MONOLITHS:
			$prefix = 'Monolith – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' Two-Way';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::TWO_WAY_PORTALS:
			$prefix = 'Portal – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' Two-Way';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::TWO_WAY_SEA_PORTALS:
			$prefix = 'Sea Portal – ';
			$objn = str_replace($prefix, '', $name);
			$suffix = ' Two-Way';
			$objn = str_replace($suffix, '', $objn);
			break;
		case OBJ_CATEGORY::DWELLINGS:
			$isFactionDwelling = $comboid == '17-X' ? true : false;
			$objn = $isFactionDwelling ? null : $name;
			break;
		default:
			$objn = $name;
			break;
	}
	return [$objn, $isFactionDwelling];
}

function DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan) {
	$objCountPlayers = [];
	$objProcessResult = [];

	// Set arrays for certain categories
	$specialCategories = [
		OBJ_CATEGORY::KEYMASTERS_TENTS,
		OBJ_CATEGORY::BORDER_GATES,
		OBJ_CATEGORY::BORDER_GUARDS,
		OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
		OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS,
		OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES,
		OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS,
		OBJ_CATEGORY::TWO_WAY_MONOLITHS,
		OBJ_CATEGORY::TWO_WAY_PORTALS,
		OBJ_CATEGORY::TWO_WAY_SEA_PORTALS
	];
	$neutralDwellingCategories = [
		OBJ_CATEGORY::NEUTRAL_DWELLINGS_1,
		OBJ_CATEGORY::NEUTRAL_DWELLINGS_2
	];

	$xMinus1ObjIds = [
		'4-0', '15-0',
		'16-0', '16-1', '16-4', '16-5', '16-6', '16-21', '16-23', '16-24', '16-25', '16-27', '16-29', '16-31', '16-32',
		'24-0', '25-0', '28-0', '34-X', '41-0',
		'43-4', '43-5', '43-6', '43-7', '44-4', '44-5', '44-6', '44-7',
		'45-4', '45-5', '45-6', '45-7', '45-8', '45-13', '45-14', '45-15', '45-16', '45-19', '45-20', '45-21', '45-22', '45-23', '45-24',
		'51-0', '52-0',
		'53-0', '53-1', '53-2', '53-3', '53-4', '53-5', '53-6', ABANDONED_MINE_COMBOID,
		'54-X', '55-0', '62-0', '62-1', '71-0', '72-0', '73-0', '74-0', '75-0', '83-X', '84-0', '87-0', '92-0', '95-0', '96-0',
		'102-0', '103-0', '104-0', '106-0', '107-0', '112-0', '113-0',
		'144-2', '144-5', '144-6', '144-9', '144-10', '145-0', '146-1', '146-3', '146-4',
		'162-0', '163-0', '164-0', '212-0', '212-1', '212-2', '212-3', '212-4', '212-5', '212-6', '212-7', '213-0'
	];

	$xMinus2ObjIds = [
		'16-22', '16-26', '77-0', '98-0', '98-1', '98-2', '98-3', '98-4', '98-5', '98-6', '98-7', '98-8', '98-9', '98-10'
	];

	// Sort objects into appropriate player zone/color based on coordinates
	foreach ($table->objects as $obj) {
		$objcomboid = in_array($table->category, $neutralDwellingCategories) ? $obj['truecomboid'] : $obj['comboid'];
		$objtruecomboid = $obj['truecomboid'];
		$objname = $obj['name'];
		$x = $obj['pos']->x;
		$y = $obj['pos']->y;
		$z = $obj['pos']->z;

		if (in_array($objcomboid, $xMinus1ObjIds)) {
			$x = $x - 1;
		} else if (in_array($objcomboid, $xMinus2ObjIds)) {
			$x = $x - 2;
		}

		// Adjust position of objects that are out of bounds
		$mapsizeArray = explode('x', $h3mapscan->map_size);
		$mapsizeInt = $mapsizeArray[0];
		$diffX = ($x >= $mapsizeInt) ? ($x - $mapsizeInt + 1) : 0;
		$diffY = ($y >= $mapsizeInt) ? ($y - $mapsizeInt + 1) : 0;
		if($diffX > 0) {
			$x = $x - $diffX;
		}
		if($diffY > 0) {
			$y = $y - $diffY;
		}

		if ($z == 0) {
			$zone = getZoneByColor($objcomboid, $objtruecomboid, $x, $y, $z, $groundColors, $zoneColors);
		} elseif ($z == 1) {
			$zone = getZoneByColor($objcomboid, $objtruecomboid, $x, $y, $z, $undergroundColors, $zoneColors);
		}

		// Debug
		// if($objcomboid == '17-X') {
		// 	echo $objname.' '.$objcomboid.' ['.$x.', '.$y.', '.$z.'] Zone='.$zone.'<br>';
		// }

		// Get player zone and add object to array
		if ($zone) {
			if ($table->category == OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL) {
				if (!isset($objCountPlayers[$objname])) {
					$objCountPlayers[$objname] = [
						'comboid' => $objcomboid,
						'zones' => array_fill_keys(array_keys($zoneColors), 0)
					];
				}
				$objCountPlayers[$objname]['zones'][$zone]++;
			} else {
				if (!isset($objCountPlayers[$objcomboid])) {
					$objProcessResult = ProcessObject($table->category, $objname, $objcomboid);
					$processedName = $objProcessResult[0];
					$objCountPlayers[$objcomboid] = [
						'name' => $processedName,
						'zones' => array_fill_keys(array_keys($zoneColors), 0)
					];
				}
				$objCountPlayers[$objcomboid]['zones'][$zone]++;
				$objCountPlayers[$objcomboid]['zones']['Total']++;
			}
		} else {
			echo 'Error: Zone color not found for '.$objcomboid.' '.$objname.' at ['.$x.', '.$y.', '.$z.']<br>';
		}
	}

	$heroesCS = new HeroesConstants();
	$flatObjCountPlayers = [];
	foreach ($heroesCS->ObjectEx as $comboid => $details) {
		$objProcessResult = ProcessObject($table->category, $details['name'], $comboid);
		$objn = $objProcessResult[0];
		$isFactionDwelling = $objProcessResult[1];

		if ($isFactionDwelling) {
			continue;
		}

		// Initialize the flat list with most custom-order objects
		if (in_array($objn, $table->customOrder)) {
			$flatObjCountPlayers[$comboid] = [
				'name' => $objn,
				'zones' => array_fill_keys(array_keys($zoneColors), 0)
			];
		}
	}

    // Initialize the flat list with dwelling objects
    if (in_array($table->category, [
        OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL,
        OBJ_CATEGORY::NEUTRAL_DWELLINGS_1,
        OBJ_CATEGORY::NEUTRAL_DWELLINGS_2,
        OBJ_CATEGORY::OTHER_DWELLINGS
    ])) {
        $ocDwellings = new OC_Dwellings();
		switch ($table->category) {
			case OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL:
				foreach ($ocDwellings->FactionFlat as $name => $details) {
					if (in_array($name, $table->customOrder)) {
						if (!isset($flatObjCountPlayers[$name])) {
							$flatObjCountPlayers[$name] = [
								'comboid' => $details['comboid'],
								'zones' => array_fill_keys(array_keys($zoneColors), 0)
							];
						}
					}
				}
				break;
			case OBJ_CATEGORY::NEUTRAL_DWELLINGS_1:
			case OBJ_CATEGORY::NEUTRAL_DWELLINGS_2:
				foreach ($ocDwellings->Neutral as $comboid => $details) {
					if (in_array($details['name'], $table->customOrder)) {
						if (!isset($flatObjCountPlayers[$comboid])) {
							$flatObjCountPlayers[$comboid] = [
								'name' => $details['name'],
								'zones' => array_fill_keys(array_keys($zoneColors), 0)
							];
						}
					}
				}
				break;
		}
    }

    // Add objects to the flat list
    foreach ($objCountPlayers as $key => $obj) {
        if ($table->category == OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL) {
            $flatObjCountPlayers[$key] = [
                'comboid' => $obj['comboid'],
                'zones' => $obj['zones']
            ];
        } else {
            $flatObjCountPlayers[$key] = [
                'name' => $obj['name'],
                'zones' => $obj['zones']
            ];
        }
    }

	// Sort the flat list by object name
	if (!empty($table->customOrder)) {
		$order = $table->customOrder;
		uasort($flatObjCountPlayers, function ($a, $b) use ($order) {
			if (array_key_exists('name', $a) && array_key_exists('name', $b)) {
				return customSort($a['name'], $b['name'], $order);
			} else if (array_key_exists('comboid', $a) && array_key_exists('comboid', $b)) {
				return customSort($a, $b, $order);
			}
		});
	}

	// Flex start if applicable
	// if ($table->flexType === OC_FLEXTYPE::START) {
	// 	echo START_FLEX;
	// }

	// Print table category title
	echo '<table class="'.OBJCOUNT_TABLECLASS.'">
			<thead>
				<tr>
					<th colspan="'.OBJCOUNT_COLSPAN.'" class="table__title-bar--small2">'.$table->category.'</td>
				</tr>';

	// Print table header
	echo '<tr>
			<th>ID</th>
			<th>Type</th>';
	for ($n=0; $n < 7; $n++) {
		echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById($n+1).'</th>';
	}
	echo '<th class="table-small__divider"></th>';
	echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById(0).'</th>';
	echo '<th class="table-small__divider"></th>';
	echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById(255).'</th>';
	echo '<th class="table-small__divider"></th>';
	echo '<th class="th-player-color">'.$h3mapscan->GetPlayerColorById(999).'</th>';
	echo '<th class="table-small__divider"></th>';
	echo '<th class="table-small__column-header--total">Total</th>';
	echo '</tr>';

	// Generate the table rows from the sorted flat list
	$totalObjCount = count($flatObjCountPlayers);
	$currentObjCount = 0;
	foreach ($flatObjCountPlayers as $k => $obj) {
		$currentObjCount++;
		$isBottomRow = ($currentObjCount == $totalObjCount);

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

		if(array_key_exists('name', $obj)) {
			$v = $obj['name'];
		} else {
			$v = $k;
			$k = $obj['comboid'];
		}

		echo '<tr>';
		echo '<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$k.'</td>';
		echo '<td class="nowrap'.$classSuffix.'" nowrap="nowrap">'.$v.'</td>';

		$n=0;
		$totalZoneCount = count(array_keys($zoneColors));
		$currentZoneCount = 0;
		$isBottomRow = ($currentObjCount == $totalObjCount);
		foreach (array_keys($zoneColors) as $zone) {
			$currentZoneCount++;
			$isTotal = ($currentZoneCount == $totalZoneCount);
			if ($zone == 'Red' || $zone == 'Neutral' || $zone == 'Super' ||  $zone == 'Total') {
				if (!$isBottomRow) {
					echo '<td class="cell-greyed-out"></td>';
				} else {
					echo '<td class="cell-greyed-out-last"></td>';
				}
			}
			$count = $obj['zones'][$zone] == 0 ? EMPTY_DATA : $obj['zones'][$zone];
			if($isTotal) {
				if($rowTotal == 0) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-total';
				}
			} else {
				if($rowTotal == 0) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' player-dark'.($n+1);
				}
			}
			echo '<td class="ac nowrap'.$classSuffix.'" nowrap="nowrap">'.$count.'</td>';
			$n++;
		}
		echo '</tr>';
	}

    // End table
	echo '</tbody></table>';

	// Flex end if applicable
	// if ($table->flexType === OC_FLEXTYPE::END) {
	// 	echo END_FLEX;
	// }
}
