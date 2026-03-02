<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->towns_list, function ($a, $b) {
    $cmp =
        $a["data"]["owner"] <=> $b["data"]["owner"] ?:
        $a["zone_owner"] <=> $b["zone_owner"] ?:
        $a["subid"] <=> $b["subid"] ?:
        $a["zone_type"] <=> $b["zone_type"] ?:
        $a["data"]["name"] <=> $b["data"]["name"];
    if ($cmp !== 0) {
        return $cmp;
    }
});

echo '<table class="table-small towns-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Town<br />Name</th>
				<th>Coords</th>
				<th>Zone</th>
				<th>Owner</th>
				<th>Faction</th>
				<th># of<br />Events</th>
				<th>Garrison</th>
				<th>Spell<br />Research</th>
				<th>Spells<br />Always</th>
				<th>Spells<br />Disabled</th>
				<th>Buildings<br />Built</th>
				<th>Buildings<br />Disabled</th>
			</tr>
		</thead>
    	<tbody>';

$n = 0;
foreach ($this->h3mapscan->towns_list as $towno) {
    $town = $towno["data"];
    vd($town["owner"]);

    if (!empty($town["stack"])) {
        $garrison = $this->h3mapscan->PrintStack($town["stack"]);
    } else {
        $garrison = EMPTY_DATA;
    }

    if (!empty($town["spellsA"])) {
        $spellsAlways = implode(
            ",<wbr /> ",
            array_map(function ($item) {
                return str_replace(" ", "&nbsp;", $item);
            }, $town["spellsA"]),
        );
    } else {
        $spellsAlways = EMPTY_DATA;
    }

    if (!empty($town["spellsD"])) {
        $spellsDisabled = implode(
            ",<wbr /> ",
            array_map(function ($item) {
                return str_replace(" ", "&nbsp;", $item);
            }, $town["spellsD"]),
        );
    } else {
        $spellsDisabled = EMPTY_DATA;
    }

    $buildingsBuilt = "";
    $buildingsDisabled = "";

    if ($town["hasCustomBuildings"]) {
        if (!empty($town["buildingsBuilt"])) {
            $buildingsBuilt = implode(
                ",<wbr /> ",
                array_map(function ($item) {
                    return str_replace(" ", "&nbsp;", $item);
                }, $town["buildingsBuilt"]),
            );
        } else {
            $buildingsBuilt = EMPTY_DATA;
        }

        if (!empty($town["buildingsDisabled"])) {
            $buildingsDisabled = implode(
                ",<wbr /> ",
                array_map(function ($item) {
                    return str_replace(" ", "&nbsp;", $item);
                }, $town["buildingsDisabled"]),
            );
        } else {
            $buildingsDisabled = EMPTY_DATA;
        }
    } elseif ($town["hasFort"]) {
        $buildingsBuilt = "Fort";
    } else {
        $buildingsBuilt = EMPTY_DATA;
    }

    echo '<tr>
			<td class="table__row-header--default nowrap" nowrap="nowrap">' .
        ++$n .
        '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
        $town["name"] .
        '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
        $towno["pos"]->GetCoords() .
        '</td>
            <td class="ac nowrap zone-type player-dark' .
        $towno["zone_owner"] .
        '" nowrap="nowrap">' .
        $towno["zone_type"] .
        '</td>
			<td class="nowrap" nowrap="nowrap">' .
        $town["player"] .
        '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
        $town["affiliation"] .
        '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
        $town["eventsnum"] .
        '</td>
			<td class="nowrap" nowrap="nowrap">' .
        $garrison .
        '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
        $town["spell_research"] .
        '</td>
			<td>' .
        $spellsAlways .
        '</td>
			<td>' .
        $spellsDisabled .
        '</td>
			<td>' .
        $buildingsBuilt .
        '</td>
			<td>' .
        $buildingsDisabled .
        '</td>
	</tr>';
}
echo "</tbody></table>";
