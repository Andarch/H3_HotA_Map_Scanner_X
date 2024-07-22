<?php
/** @var H3MAPSCAN_PRINT $this */

$artifacts = [];
$bonusmana = [];
$bonusmorale = [];
$bonusluck = [];
$bonusmovement = [];
$bonusmixed = [];
$bordergates = [];
$borderguards = [];
$creaturebanks = [];
$dwellings = [];
$garrisons = [];
$grail = [];
$heroes = [];
$heroupgrades = [];
$keymasterstents = [];
$magicalterrains = [];
$mines = [];
$monsters = [];
$monolithsportalsonewayentrances = [];
$monolithsportalsonewayexits = [];
$monolithsportalstwowaymonoliths = [];
$monolithsportalstwowayportals = [];
$quests = [];
$resources = [];
$resourcegenerators = [];
$scouting = [];
$spells = [];
$text = [];
$towns = [];
$trading = [];
$transportation = [];
$warmachines = [];
$other = [];

foreach($this->h3mapscan->objects_all as $objcategory => $objcomboid) {
	switch($objcategory) {
		case OBJECTCATEGORIES::ARTIFACTS:
			$artifacts = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUSMANA:
			$bonusmana = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUSMORALE:
			$bonusmorale = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUSLUCK:
			$bonusluck = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUSMOVEMENT:
			$bonusmovement = $objcomboid;
			break;

		case OBJECTCATEGORIES::BONUSMIXED:
			$bonusmixed = $objcomboid;
			break;

		case OBJECTCATEGORIES::BORDERGATES:
			$bordergates = $objcomboid;
			break;

		case OBJECTCATEGORIES::BORDERGUARDS:
			$borderguards = $objcomboid;
			break;

		case OBJECTCATEGORIES::CREATUREBANKS:
			$creaturebanks = $objcomboid;
			break;

		case OBJECTCATEGORIES::DWELLINGS:
			$dwellings = $objcomboid;
			break;

		case OBJECTCATEGORIES::GARRISONS:
			$garrisons = $objcomboid;
			break;

		case OBJECTCATEGORIES::GRAIL:
			$grail = $objcomboid;
			break;

		case OBJECTCATEGORIES::HEROES:
			$heroes = $objcomboid;
			break;

		case OBJECTCATEGORIES::HEROUPGRADES:
			$heroupgrades = $objcomboid;
			break;

		case OBJECTCATEGORIES::KEYMASTERSTENTS:
			$keymasterstents = $objcomboid;
			break;

		case OBJECTCATEGORIES::MAGICALTERRAINS:
			$magicalterrains = $objcomboid;
			break;

		case OBJECTCATEGORIES::MINES:
			$mines = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONSTERS:
			$monsters = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONOLITHSPORTALSONEWAYENTRANCES:
			$monolithsportalsonewayentrances = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONOLITHSPORTALSONEWAYEXITS:
			$monolithsportalsonewayexits = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONOLITHSPORTALSTWOWAYMONOLITHS:
			$monolithsportalstwowaymonoliths = $objcomboid;
			break;

		case OBJECTCATEGORIES::MONOLITHSPORTALSTWOWAYPORTALS:
			$monolithsportalstwowayportals = $objcomboid;
			break;

		case OBJECTCATEGORIES::QUESTS:
			$quests = $objcomboid;
			break;

		case OBJECTCATEGORIES::RESOURCES:
			$resources = $objcomboid;
			break;

		case OBJECTCATEGORIES::RESOURCEGENERATORS:
			$resourcegenerators = $objcomboid;
			break;

		case OBJECTCATEGORIES::SCOUTING:
			$scouting = $objcomboid;
			break;

		case OBJECTCATEGORIES::SPELLS:
			$spells = $objcomboid;
			break;

		case OBJECTCATEGORIES::TEXT:
			$text = $objcomboid;
			break;

		case OBJECTCATEGORIES::TOWNS:
			$towns = $objcomboid;
			break;

		case OBJECTCATEGORIES::TRADING:
			$trading = $objcomboid;
			break;

		case OBJECTCATEGORIES::TRANSPORTATION:
			$transportation = $objcomboid;
			break;

		case OBJECTCATEGORIES::WARMACHINES:
			$warmachines = $objcomboid;
			break;

		case OBJECTCATEGORIES::OTHER:
			$other = $objcomboid;
			break;
	}
}

function customSort($a, $b, $customOrder) {
    $posA = array_search($a['name'], $customOrder);
    $posB = array_search($b['name'], $customOrder);

    // If both elements are found in the custom order array
    if ($posA !== false && $posB !== false) {
        return $posA - $posB;
    }

    // If only one element is found, it should come first
    if ($posA !== false) {
        return -1;
    }
    if ($posB !== false) {
        return 1;
    }

    // If neither element is found, keep their original order
    return 0;
}

/* START FLEX */
echo '<div class="flex-container" style="display: flex; flex-wrap: wrap; row-gap: 1em;">';

/* KEYMASTER'S TENTS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::KEYMASTERSTENTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($keymasterstents as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BORDER GATES */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BORDERGATES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($bordergates as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BORDER GUARDS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BORDERGUARDS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Color</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($borderguards as $objcomboid => $obj) {
	$nameParts = explode(' – ', $obj['name']);
	$color = isset($nameParts[1]) ? $nameParts[1] : $obj['name'];
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$color.'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* GARRISONS */
$n = 0;
$customOrderGarrisons = [
	'Garrison',
	'Anti-magic Garrison',
];
uasort($garrisons, function($a, $b) use ($customOrderGarrisons) {
	return customSort($a, $b, $customOrderGarrisons);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::GARRISONS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($garrisons as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* QUESTS */
$n = 0;
$customOrderQuests = [
	'Quest Gate',
	'Quest Guard',
	'Seer\s Hut',
];
uasort($quests, function($a, $b) use ($customOrderQuests) {
	return customSort($a, $b, $customOrderQuests);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::QUESTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($quests as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRANSPORTATION */
$n = 0;
$customOrderTransportation = [
	'Subterranean Gate',
	'Town Gate',
	'Shipyard',
	'Boat',
	'Airship Yard',
	'Airship',
];
uasort($transportation, function($a, $b) use ($customOrderTransportation) {
	return customSort($a, $b, $customOrderTransportation);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TRANSPORTATION.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($transportation as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';
echo '<div class="forcebreak"></div>';

/* ONE-WAY MONOLITHS/PORTALS – ENTRANCES */
$n = 0;
$customOrderMonolithsPortalsOneWayEntrances = [
	'Monolith – Blue One-Way Entrance',
	'Monolith – Pink One-Way Entrance',
	'Monolith – Orange One-Way Entrance',
	'Monolith – Yellow One-Way Entrance',
	'Monolith – Turquoise One-Way Entrance',
	'Monolith – Violet One-Way Entrance',
	'Monolith – Chartreuse One-Way Entrance',
	'Monolith – White One-Way Entrance',
	'Portal – Purple One-Way Entrance',
	'Portal – Orange One-Way Entrance',
	'Portal – Red One-Way Entrance',
	'Portal – Cyan One-Way Entrance',
];
uasort($monolithsportalsonewayentrances, function($a, $b) use ($customOrderMonolithsPortalsOneWayEntrances) {
	return customSort($a, $b, $customOrderMonolithsPortalsOneWayEntrances);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONOLITHSPORTALSONEWAYENTRANCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($monolithsportalsonewayentrances as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* ONE-WAY MONOLITHS/PORTALS – EXITS */
$n = 0;
$customOrderMonolithsPortalsOneWayExits = [
	'Monolith – Blue One-Way Exit',
	'Monolith – Pink One-Way Exit',
	'Monolith – Orange One-Way Exit',
	'Monolith – Yellow One-Way Exit',
	'Monolith – Turquoise One-Way Exit',
	'Monolith – Violet One-Way Exit',
	'Monolith – Chartreuse One-Way Exit',
	'Monolith – White One-Way Exit',
	'Portal – Purple One-Way Exit',
	'Portal – Orange One-Way Exit',
	'Portal – Red One-Way Exit',
	'Portal – Cyan One-Way Exit',
];
uasort($monolithsportalsonewayexits, function($a, $b) use ($customOrderMonolithsPortalsOneWayExits) {
	return customSort($a, $b, $customOrderMonolithsPortalsOneWayExits);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONOLITHSPORTALSONEWAYEXITS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($monolithsportalsonewayexits as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY MONOLITHS */
$n = 0;
$customOrderMonolithsTwoWay = [
	'Monolith – Green Two-Way',
	'Monolith – Brown Two-Way',
	'Monolith – Violet Two-Way',
	'Monolith – Orange Two-Way',
	'Monolith – Pink Two-Way',
	'Monolith – Turquoise Two-Way',
	'Monolith – Yellow Two-Way',
	'Monolith – Black Two-Way',
	'Monolith – Blue Two-Way',
	'Monolith – Red Two-Way',
];
uasort($monolithsportalstwowaymonoliths, function($a, $b) use ($customOrderMonolithsTwoWay) {
	return customSort($a, $b, $customOrderMonolithsTwoWay);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONOLITHSPORTALSTWOWAYMONOLITHS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($monolithsportalstwowaymonoliths as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TWO-WAY PORTALS */
$n = 0;
$customOrderPortalsTwoWay = [
	'Portal – Green Two-Way',
	'Portal – Yellow Two-Way',
	'Portal – Red Two-Way',
	'Portal – Cyan Two-Way',
	'Portal – Chartreuse Two-Way',
	'Portal – Turquoise Two-Way',
	'Portal – Violet Two-Way',
	'Portal – Orange Two-Way',
	'Portal – Pink Two-Way',
	'Portal – Blue Two-Way',
	'Water Portal – White Two-Way',
	'Water Portal – Red Two-Way',
	'Water Portal – Blue Two-Way',
	'Water Portal – Chartreuse Two-Way',
	'Water Portal – Yellow Two-Way',
	'Whirlpool',
];
uasort($monolithsportalstwowayportals, function($a, $b) use ($customOrderPortalsTwoWay) {
	return customSort($a, $b, $customOrderPortalsTwoWay);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONOLITHSPORTALSTWOWAYPORTALS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($monolithsportalstwowayportals as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';
echo '<div class="forcebreak"></div>';

/* GRAIL */
$n = 0;
$customOrderGrail = [
    'Grail',
    'Obelisk',
];
uasort($grail, function($a, $b) use ($customOrderGrail) {
    return customSort($a, $b, $customOrderGrail);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::GRAIL.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($grail as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* ARTIFACTS */
$n = 0;
$customOrderArtifacts = [
    'Artifact',
    'Random Artifact',
    'Random Treasure Artifact',
    'Random Minor Artifact',
    'Random Major Artifact',
    'Random Relic',
    'Black Market',
    'Shipwreck Survivor',
    'Warrior\'s Tomb',
    'Pandora\'s Box',
];
uasort($artifacts, function($a, $b) use ($customOrderArtifacts) {
    return customSort($a, $b, $customOrderArtifacts);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::ARTIFACTS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($artifacts as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MANA */
$n = 0;
$customOrderBonusMana = [
	'Magic Well',
	'Magic Spring',
	'Vial of Mana',
	'Altar of Mana',
];
uasort($bonusmana, function($a, $b) use ($customOrderBonusMana) {
	return customSort($a, $b, $customOrderBonusMana);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUSMANA.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($bonusmana as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MORALE */
$n = 0;
$customOrderBonusMorale = [
	'Temple',
	'Temple of Loyalty',
	'Buoy',
];
uasort($bonusmorale, function($a, $b) use ($customOrderBonusMorale) {
	return customSort($a, $b, $customOrderBonusMorale);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUSMORALE.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($bonusmorale as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – LUCK */
$n = 0;
$customOrderBonusLuck = [
	'Faerie Ring',
	'Fountain of Fortune',
	'Swan Pond',
	'Mermaid',
];
uasort($bonusluck, function($a, $b) use ($customOrderBonusLuck) {
	return customSort($a, $b, $customOrderBonusLuck);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUSLUCK.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($bonusluck as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* BONUS – MOVEMENT */
$n = 0;
$customOrderBonusMovement = [
	'Stables',
	'Trailblazer',
	'Watering Place',
	'Lighthouse',
];
uasort($bonusmovement, function($a, $b) use ($customOrderBonusMovement) {
	return customSort($a, $b, $customOrderBonusMovement);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::BONUSMOVEMENT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($bonusmovement as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';
echo '<div class="forcebreak"></div>';

/* HEROES */
$n = 0;
$customOrderHeroes = [
	'Hero',
	'Random Hero',
	'Prison',
	'Hero Camp',
	'Tavern',
];
uasort($heroes, function($a, $b) use ($customOrderHeroes) {
	return customSort($a, $b, $customOrderHeroes);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::HEROES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($heroes as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TOWNS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TOWNS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($towns as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* DWELLINGS */
$n = 0;
$customOrderDwellings = [
	'Dwelling',
	'Golem Factory',
	'Elemental Conflux',
	'Random Dwelling',
	'Random Dwelling – Level',
	'Random Dwelling – Faction',
	'Dwellings 2',
	'Dwellings 3',
];
uasort($dwellings, function($a, $b) use ($customOrderDwellings) {
	return customSort($a, $b, $customOrderDwellings);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::DWELLINGS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($dwellings as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MONSTERS */
$n = 0;
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MONSTERS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($monsters as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* WAR MACHINES */
$n = 0;
$customOrderWarMachines = [
	'War Machine Factory',
	'Cannon Yard',
];
uasort($warmachines, function($a, $b) use ($customOrderWarMachines) {
	return customSort($a, $b, $customOrderWarMachines);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::WARMACHINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($warmachines as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TRADING */
$n = 0;
$customOrderTrading = [
	'Trading Post',
	'Warlock\'s Lab',
	'Junkman',
	'Freelancer\'s Guild',
];
uasort($trading, function($a, $b) use ($customOrderTrading) {
	return customSort($a, $b, $customOrderTrading);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TRADING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($trading as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';
echo '<div class="forcebreak"></div>';

/* HERO UPGRADES */
$n = 0;
$customOrderHeroUpgrades = [
	'Mercenary Camp',
	'Marletto Tower',
	'Star Axis',
	'Garden of Revelation',
	'School of War',
	'School of Magic',
	'Arena',
	'Colosseum of the Magi',
	'Library of Enlightenment',
	'Learning Stone',
	'Gazebo',
	'Tree of Knowledge',
	'Scholar',
	'Witch Hut',
	'Hermit\'s Shack',
	'University',
	'Seafaring Academy',
	'Sirens',
];
uasort($heroupgrades, function($a, $b) use ($customOrderHeroUpgrades) {
	return customSort($a, $b, $customOrderHeroUpgrades);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::HEROUPGRADES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($heroupgrades as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SPELLS */
$n = 0;
$customOrderSpells = [
	'Shrine of Magic Incantation',
	'Shrine of Magic Gesture',
	'Shrine of Magic Thought',
	'Shrine of Magic Mystery',
	'Pyramid',
	'Spell Scroll',
];
uasort($spells, function($a, $b) use ($customOrderSpells) {
	return customSort($a, $b, $customOrderSpells);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::SPELLS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($spells as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCES */
$n = 0;
$customOrderResources = [
	'Treasure Chest',
	'Campfire',
	'Random Resource',
	'Wood',
	'Ore',
	'Mercury',
	'Sulfur',
	'Crystal',
	'Gems',
	'Gold',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Sea Chest',
	'Corpse',
	'Grave',
];
uasort($resources, function($a, $b) use ($customOrderResources) {
	return customSort($a, $b, $customOrderResources);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::RESOURCES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($resources as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MINES */
$n = 0;
$customOrderMines = [
	'Treasure Chest',
	'Campfire',
	'Random Resource',
	'Wood',
	'Ore',
	'Mercury',
	'Sulfur',
	'Crystal',
	'Gems',
	'Gold',
	'Flotsam',
	'Jetsam',
	'Sea Barrel',
	'Sea Chest',
];
uasort($mines, function($a, $b) use ($customOrderMines) {
	return customSort($a, $b, $customOrderMines);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MINES.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($mines as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* RESOURCE GENERATORS */
$n = 0;
$customOrderResourceGenerators = [
	'Windmill',
	'Water Wheel',
	'Mystical Garden',
	'Derrick',
	'Prospector',
	'Lean To',
	'Wagon',
	'Warehouse of Wood',
	'Warehouse of Ore',
	'Warehouse of Mercury',
	'Warehouse of Sulfur',
	'Warehouse of Crystal',
	'Warehouse of Gem',
	'Warehouse of Gold',
];
uasort($resourcegenerators, function($a, $b) use ($customOrderResourceGenerators) {
	return customSort($a, $b, $customOrderResourceGenerators);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::RESOURCEGENERATORS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($resourcegenerators as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* FLEX BREAK */
echo '<div class="forcebreak"></div>';
echo '<div class="forcebreak"></div>';

/* CREATURE BANKS */
$n = 0;
asort($creaturebanks);
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::CREATUREBANKS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($creaturebanks as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* SCOUTING */
$n = 0;
$customOrderScouting = [
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
uasort($scouting, function($a, $b) use ($customOrderScouting) {
	return customSort($a, $b, $customOrderScouting);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::SCOUTING.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($scouting as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* MAGICAL TERRAINS */
$n = 0;
$customOrderMagicalTerrains = [
	'Magic Plains',
	'Cursed Ground',
	'Rockland',
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
uasort($magicalterrains, function($a, $b) use ($customOrderMagicalTerrains) {
	return customSort($a, $b, $customOrderMagicalTerrains);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::MAGICALTERRAINS.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($magicalterrains as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* TEXT */
$n = 0;
$customOrderText = [
	'Sign',
	'Ocean Bottle',
];
uasort($text, function($a, $b) use ($customOrderText) {
	return customSort($a, $b, $customOrderText);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::TEXT.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($text as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* OTHER */
$n = 0;
$customOrderOther = [
	'Event Object',
	'Hill Fort – Original',
	'Hill Fort – HotA',
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
uasort($other, function($a, $b) use ($customOrderOther) {
	return customSort($a, $b, $customOrderOther);
});
echo '<table class="smalltable">
		<thead>
			<tr>
				<td colspan="3" class="tableheader2">'.OBJECTCATEGORIES::OTHER.'</td>
			</tr>
			<tr>
				<th class="ac nowrap" nowrap="nowrap">ID-SubID</th>
				<th class="ac nowrap" nowrap="nowrap">Type</th>
				<th class="ac nowrap" nowrap="nowrap">Count</th>
			</tr>
		</thead>
		<tbody>';
foreach($other as $objcomboid => $obj) {
	echo '<tr>
			<td class="ac nowrap" nowrap="nowrap">'.$objcomboid.'</td>
			<td class="nowrap" nowrap="nowrap">'.$obj['name'].'</td>
			<td class="ar nowrap" nowrap="nowrap">'.$obj['count'].'</td>
		</tr>';
}
echo '	</tbody>
	</table>';

/* END FLEX */
echo '</div>';
