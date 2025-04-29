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
    'Blue' => [49, 82, 255],
    'Tan' => [156, 115, 82],
    'Green' => [66, 148, 41],
    'Orange' => [255, 132, 0],
    'Purple' => [140, 41, 165],
    'Teal' => [8, 156, 165],
    'Pink' => [198, 123, 140],
    'Red' => [255, 0, 0],
    'Neutral' => 'Neutral',
    'Total' => 'Total',
];

/* MAIN */

// Images table
$timestamp = time();
$imgmapnameg = MAPDIR.$zonesImageBaseFilename.'_g.png';
$imgmapnameu = MAPDIR.$zonesImageBaseFilename.'_u.png';
$imgzonesg = MAPDIR.$zonesImageBaseFilename.'_g2.png';
$imgzonesu = MAPDIR.$zonesImageBaseFilename.'_u2.png';
$imgground = file_exists($imgmapnameg) ? '<img src="'.$imgmapnameg.'?t='.$timestamp.'" class="map-image-bg-old" />' : 'Map Ground';
$output = '<table class="table-small"><th>Ground</th><th>Underground</th><tr><td class="map-image-container">'.$imgground.'</td>';
if($underground) {
	$imguground = file_exists($imgmapnameu) ? '<img src="'.$imgmapnameu.'?t='.$timestamp.'" class="map-image-bg-old" />' : 'Map Underground';
	$output .= '<td class="map-image-container">'.$imguground.'</td>';
}
$output .= '</tr></table>';
echo $output;

// Scan zone overlays
$groundColors = loadImageColors($imgzonesg);
$undergroundColors = loadImageColors($imgzonesu);

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
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS], OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS, $sortOrder->MagicalTerrainsSpells, null, null, null, OC_FLEXTYPE::NONE);
DisplayObjCountZoneTable($table, $groundColors, $undergroundColors, $zoneColors, $h3mapscan);

// Magical Terrains – Bonuses
$table = new OC_Table(OC_TABLETYPE::NORMAL, $objPerZone[OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES], OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES, $sortOrder->MagicalTerrainsBonuses, null, null, null, OC_FLEXTYPE::END);
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
            $rgba = imagecolorat($image, $x, $y);
			$alpha = ($rgba & 0x7F000000) >> 24;
            $r = ($rgba >> 16) & 0xFF;
            $g = ($rgba >> 8) & 0xFF;
            $b = $rgba & 0xFF;

            if ($alpha == 127) {
                $colors[$x][$y] = 'Neutral';
            } else {
                $colors[$x][$y] = [$r, $g, $b];
            }
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

	// Sort objects into appropriate player zone/color based on coordinates
	foreach ($table->objects as $obj) {
		$objcomboid = in_array($table->category, $neutralDwellingCategories) ? $obj['truecomboid'] : $obj['comboid'];
		$objname = $obj['name'];
		$x = $obj['pos']->x;
		$y = $obj['pos']->y;
		$z = $obj['pos']->z;
		$color = null;

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

		// Check if object is in a player zone
		if ($z == 0 && $groundColors) {
			$color = $groundColors[$x][$y];
		} elseif ($z == 1 && $undergroundColors) {
			$color = $undergroundColors[$x][$y];
		}

        // Handle neutral zone
        if ($color == 'Neutral') {
            $zone = 'Neutral';
        } else {
            $zone = getZoneByColor($color, $zoneColors);
        }

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
	if ($table->flexType === OC_FLEXTYPE::START) {
		echo START_FLEX;
	}

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
			if ($zone == 'Red' || $zone == 'Neutral' || $zone == 'Total') {
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
	if ($table->flexType === OC_FLEXTYPE::END) {
		echo END_FLEX;
	}
}
