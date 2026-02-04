<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

$objects = $this->h3mapscan->objectCountPlayers;
$sortOrder = new OC_Sort_Order();
$tables = [
	// [OBJ_CATEGORY::TOWNS, $sortOrder->Towns],
	// [OBJ_CATEGORY::HEROES_AND_INFO, $sortOrder->HeroesAndInfo],
	[OBJ_CATEGORY::MONSTERS, $sortOrder->Monsters],
	[OBJ_CATEGORY::KEYMASTERS_TENTS, $sortOrder->KeymastersBorder],
	[OBJ_CATEGORY::BORDER_GATES, $sortOrder->KeymastersBorder],
	[OBJ_CATEGORY::BORDER_GUARDS, $sortOrder->KeymastersBorder],
	[OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES, $sortOrder->OneWayMonoliths],
	[OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS, $sortOrder->OneWayMonoliths],
	[OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES, $sortOrder->OneWayPortals],
	[OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS, $sortOrder->OneWayPortals],
	[OBJ_CATEGORY::TWO_WAY_MONOLITHS, $sortOrder->TwoWayMonoliths],
	[OBJ_CATEGORY::TWO_WAY_PORTALS, $sortOrder->TwoWayPortals],
	[OBJ_CATEGORY::TWO_WAY_SEA_PORTALS, $sortOrder->TwoWaySeaPortals],
	[OBJ_CATEGORY::OTHER_GATEWAYS, $sortOrder->OtherGateways],
	[OBJ_CATEGORY::MINES, $sortOrder->Mines],
	[OBJ_CATEGORY::WAREHOUSES, $sortOrder->Warehouses],
	[OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL, $sortOrder->DwellingsByLevel],
	[OBJ_CATEGORY::NEUTRAL_DWELLINGS_1, $sortOrder->NeutralDwellings1],
	[OBJ_CATEGORY::NEUTRAL_DWELLINGS_2, $sortOrder->NeutralDwellings2],
	[OBJ_CATEGORY::OTHER_DWELLINGS, $sortOrder->OtherDwellings],
	[OBJ_CATEGORY::GARRISONS_QUESTS, $sortOrder->GarrisonsQuests],
	[OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES, $sortOrder->WarMachinesAndUpgrades],
	[OBJ_CATEGORY::TRADING, $sortOrder->Trading],
	[OBJ_CATEGORY::CREATURE_BANKS_ELITE, $sortOrder->CreatureBanksElite],
	[OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS, $sortOrder->CreatureBanksArtifacts],
	[OBJ_CATEGORY::CREATURE_BANKS_RESOURCES, $sortOrder->CreatureBanksResources],
	[OBJ_CATEGORY::CREATURE_BANKS_CREATURES, $sortOrder->CreatureBanksCreatures],
	[OBJ_CATEGORY::BOATS_AND_AIRSHIPS, $sortOrder->BoatsAndAirships],
	[OBJ_CATEGORY::PRIMARY_SKILLS_1, $sortOrder->PrimarySkills1],
	[OBJ_CATEGORY::PRIMARY_SKILLS_2, $sortOrder->PrimarySkills2],
	[OBJ_CATEGORY::SECONDARY_SKILLS, $sortOrder->SecondarySkills],
	[OBJ_CATEGORY::XP, $sortOrder->XP],
	[OBJ_CATEGORY::MANA, $sortOrder->Mana],
	[OBJ_CATEGORY::MULTI_BONUS, $sortOrder->MultiBonus],
	[OBJ_CATEGORY::MOVEMENT, $sortOrder->Movement],
	[OBJ_CATEGORY::MORALE, $sortOrder->Morale],
	[OBJ_CATEGORY::LUCK, $sortOrder->Luck],
	[OBJ_CATEGORY::SPECIAL, $sortOrder->Special],
	[OBJ_CATEGORY::SPELLS, $sortOrder->Spells],
	[OBJ_CATEGORY::ARTIFACTS, $sortOrder->Artifacts],
	[OBJ_CATEGORY::TREASURES, $sortOrder->Treasures],
	[OBJ_CATEGORY::RESOURCES_1, $sortOrder->Resources1],
	[OBJ_CATEGORY::RESOURCES_2, $sortOrder->Resources2],
	[OBJ_CATEGORY::RESOURCE_GENERATORS, $sortOrder->ResourceGenerators],
	[OBJ_CATEGORY::SCOUTING, $sortOrder->Scouting],
];

echo '<div class="obz-container" style="column-gap: 3em !important;">';

foreach ($tables as [$category, $order]) {
	$table = new OC_Table(OC_TABLETYPE::NORMAL, $objects[$category], $category, $order, null, null, null, OC_FLEXTYPE::NONE);
	DisplayObjCountZoneTable($table);
}

echo '</div>';

function DisplayObjCountZoneTable($table)
{
	$objectCounts = [];
	$objProcessResult = [];
	$obzKeys = [
		'Blue',
		'Tan',
		'Green',
		'Orange',
		'Purple',
		'Teal',
		'Pink',
		'Red',
		'Neutral',
		'Total'
	];

	// DEBUG
	$table->objects = array_filter($table->objects, function ($obj) {
		return $obj["zone_type"] === "P4";
	});

	// Sort objects into appropriate player zone/color based on coordinates
	foreach ($table->objects as $obj) {
		$objcomboid = in_array($table->category, [OBJ_CATEGORY::NEUTRAL_DWELLINGS_1, OBJ_CATEGORY::NEUTRAL_DWELLINGS_2]) ? $obj['truecomboid'] : $obj['comboid'];
		$objname = $obj['name'];
		$x = $obj['pos']->x;
		$y = $obj['pos']->y;
		$z = $obj['pos']->z;

		$zone = $obj['zone_owner'];

		if (str_starts_with($zone, 'Neutral')) {
			$zone = 'Neutral';
		}

		// Get player zone and add object to array
		if ($zone) {
			if ($table->category == OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL) {
				if (!isset($objectCounts[$objname])) {
					$objectCounts[$objname] = [
						'comboid' => $objcomboid,
						'zones' => array_fill_keys($obzKeys, 0)
					];
				}
				$objectCounts[$objname]['zones'][$zone]++;
			} else {
				if (!isset($objectCounts[$objcomboid])) {
					$objProcessResult = ProcessObject($table->category, $objname, $objcomboid);
					$processedName = $objProcessResult[0];
					$objectCounts[$objcomboid] = [
						'name' => $processedName,
						'zones' => array_fill_keys($obzKeys, 0)
					];
				}
				if ($zone == 'Void') {
					vd($obj);
				}
				$objectCounts[$objcomboid]['zones'][$zone]++;
				$objectCounts[$objcomboid]['zones']['Total']++;
			}
		} else {
			echo 'Error: Zone color not found for ' . $objcomboid . ' ' . $objname . ' at [' . $x . ', ' . $y . ', ' . $z . ']<br>';
			vd($obj);
			break;
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
				'zones' => array_fill_keys($obzKeys, 0)
			];
		}
	}

	// Initialize the flat list with dwelling objects
	if (
		in_array($table->category, [
			OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL,
			OBJ_CATEGORY::NEUTRAL_DWELLINGS_1,
			OBJ_CATEGORY::NEUTRAL_DWELLINGS_2,
			OBJ_CATEGORY::OTHER_DWELLINGS
		])
	) {
		$ocDwellings = new OC_Dwellings();
		switch ($table->category) {
			case OBJ_CATEGORY::FACTION_DWELLINGS_BY_LEVEL:
				foreach ($ocDwellings->FactionFlat as $name => $details) {
					if (in_array($name, $table->customOrder)) {
						if (!isset($flatObjCountPlayers[$name])) {
							$flatObjCountPlayers[$name] = [
								'comboid' => $details['comboid'],
								'zones' => array_fill_keys($obzKeys, 0)
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
								'zones' => array_fill_keys($obzKeys, 0)
							];
						}
					}
				}
				break;
		}
	}

	// Add objects to the flat list
	foreach ($objectCounts as $key => $obj) {
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

	// Print table category title
	echo '<table class="table-large" style="margin-bottom: 3em !important;">
			<thead>
				<tr>
					<th colspan="100" class="ac table__title-bar--medium">' . $table->category . '</th>
				</tr>';

	// Print table header
	echo '<tr>
			<th>ID</th>
			<th>Type</th>';
	for ($n = 0; $n < 7; $n++) {
		echo '<th class="th-player-color"><span class="no-color-text color' . ($n + 2) . '">&nbsp;</span>&nbsp;</th>';
	}
	echo '<th class="table-small__divider"></th>';
	echo '<th class="th-player-color"><span class="no-color-text color' . (1) . '">&nbsp;</span>&nbsp;</th>';
	echo '<th class="table-small__divider"></th>';
	echo '<th class="th-player-color"><span class="no-color-text color' . (256) . '">&nbsp;</span>&nbsp;</th>';
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
		foreach ($obzKeys as $zone) {
			$count = $obj['zones'][$zone];
			$rowTotal += $count;
		}

		if ($rowTotal == 0) {
			$classSuffix = ' obj-count-inactive';
		} else {
			$classSuffix = ' obj-count-active';
		}

		if (array_key_exists('name', $obj)) {
			$v = $obj['name'];
		} else {
			$v = $k;
			$k = $obj['comboid'];
		}

		$styleSuffix1 = '';
		$styleSuffix2 = '';
		// $styleSuffix1 = ' style="width: 56px;"';
		// $styleSuffix2 = ' style="width: 144px;"';

		echo '<tr>';
		echo '<td class="ac nowrap' . $classSuffix . '" nowrap="nowrap"' . $styleSuffix1 . '>' . $k . '</td>';
		echo '<td class="nowrap' . $classSuffix . '" nowrap="nowrap"' . $styleSuffix2 . '>' . $v . '</td>';
		$n = 0;
		$totalZoneCount = count($obzKeys);
		$currentZoneCount = 0;
		$isBottomRow = ($currentObjCount == $totalObjCount);
		foreach ($obzKeys as $zone) {
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
			if ($isTotal) {
				if ($rowTotal == 0) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' obj-count-total';
				}
			} else {
				if ($rowTotal == 0) {
					$classSuffix = ' obj-count-inactive';
				} else {
					$classSuffix = ' player-dark' . ($n + 1);
				}
			}
			echo '<td class="ac nowrap' . $classSuffix . '" nowrap="nowrap">' . $count . '</td>';
			$n++;
		}
		echo '</tr>';
	}

	// End table
	echo '</tbody></table>';
}

function ProcessObject($category, $name, $comboid)
{
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
