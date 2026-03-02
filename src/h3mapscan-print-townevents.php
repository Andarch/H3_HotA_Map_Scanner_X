<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<div class="flex-container">';

$n = 0;
echo '<table class="table-small town-events-table">
		<tr>
			<th>#</th>
			<th>Town Name</th>
			<th>Coords</th>
			<th>Owner</th>
			<th>Type</th>
			<th>#</th>
			<th>Name</th>
			<th>Players</th>
			<th class="nowrap" nowrap="nowrap">Human / AI</th>
			<th>Neutral</th>
			<th>First</th>
			<th>Period</th>
			<th>Resources</th>
			<th>Creatures</th>
			<th>Buildings</th>
			<th>Text</th>
		</tr>';
foreach ($this->h3mapscan->towns_list as $towno) {
    $town = $towno["data"];

    if ($town["eventsnum"] == 0) {
        continue;
    }

    // $monlvlprint = false;
    // if($towno['id'] == OBJECTS::RANDOM_TOWN) {
    // 	$monlvlprint = true;
    // }
    $monlvlprint = true;

    $ecount = $town["eventsnum"];

    echo '<tr>
		<td rowspan="' .
        $ecount .
        '" class="table__row-header--default" >' .
        ++$n .
        '</td>
		<td rowspan="' .
        $ecount .
        '" class="ac">' .
        $town["name"] .
        '</td>
		<td rowspan="' .
        $ecount .
        '" class="ac">' .
        $towno["pos"]->GetCoords() .
        '</td>
		<td rowspan="' .
        $ecount .
        ">" .
        $town["player"] .
        '</td>
		<td rowspan="' .
        $ecount .
        '" class="ac">' .
        $town["affiliation"] .
        "</td>";

    usort($town["events"], "SortTownEventsByDate");
    foreach ($town["events"] as $e => $event) {
        $additionalRow = false;
        $lastAdditionalRow = false;
        if ($ecount > 1 && $e > 0) {
            echo "<tr>";
            if ($e < $ecount - 1) {
                $additionalRow = true;
            } else {
                $lastAdditionalRow = true;
            }
        }

        $first = "Day " . $event["firstOccurence"];
        $period = "";
        switch ($event["nextOccurence"]) {
            case 0:
                $period = EMPTY_DATA;
                break;
            case 1:
                $period = "Every day";
                break;
            default:
                $period = "Every " . $event["nextOccurence"] . " days";
                break;
        }

        $eres = [];
        if (!empty($event["res"])) {
            foreach ($event["res"] as $r => $res) {
                if ($res != 0) {
                    $sign = $res > 0 ? "+" : "";
                    $eres[] = $sign . comma($res) . " " . $this->h3mapscan->GetResourceById($r);
                }
            }
        }
        if (empty($eres)) {
            $eres[] = EMPTY_DATA;
        }

        $monsters = [];
        foreach ($event["monsters"] as $lvl => $amount) {
            if ($lvl + 1 == 7 && array_key_exists("hotaLevel7b", $event) && $event["hotaLevel7b"] > 0) {
                $monsters[] = "Level 7a: +" . $amount;
                break;
            }
            if ($amount > 0) {
                $monsters[] = "Level " . ($lvl + 1) . ": +" . $amount;
            }
        }
        if (array_key_exists("hotaLevel7b", $event) && $event["hotaLevel7b"] > 0) {
            $monsters[] = "Level 7b: +" . $event["hotaLevel7b"];
        }
        if (empty($monsters)) {
            $monsters[] = EMPTY_DATA;
        }

        $buildings = [];
        foreach ($event["buildings"] as $k => $bbyte) {
            for ($i = 0; $i < 8; $i++) {
                if (($bbyte >> $i) & 0x01) {
                    $bid = $k * 8 + $i;
                    $buildings[] = $this->h3mapscan->GetBuildingById($bid);
                }
            }
        }
        // if ($event['hotaSpecial'][0] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial1 as $bit => $name) {
        // 		if ($event['hotaSpecial'][0] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        // if ($event['hotaSpecial'][1] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial2 as $bit => $name) {
        // 		if ($event['hotaSpecial'][1] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        // if ($event['hotaSpecial'][2] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial3 as $bit => $name) {
        // 		if ($event['hotaSpecial'][2] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        // if ($event['hotaSpecial'][3] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial4 as $bit => $name) {
        // 		if ($event['hotaSpecial'][3] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        // if ($event['hotaSpecial'][4] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial5 as $bit => $name) {
        // 		if ($event['hotaSpecial'][4] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        // if ($event['hotaSpecial'][5] > 0) {
        // 	$selectedSpecials = [];
        // 	foreach ($this->h3mapscan->CS->TownEventHotaSpecial6 as $bit => $name) {
        // 		if ($event['hotaSpecial'][5] & $bit) {
        // 			$buildings[] = $name;
        // 		}
        // 	}
        // }
        if (empty($buildings)) {
            $buildings[] = EMPTY_DATA;
        }

        $borderstyle = "";
        if ($ecount > 1 && $e == 0) {
            $borderstyle = ' style="border-bottom: 1px dotted grey;"';
        } elseif ($additionalRow) {
            $borderstyle = ' style="border-top: 1px dotted grey; border-bottom: 1px dotted grey;"';
        } elseif ($lastAdditionalRow) {
            $borderstyle = ' style="border-top: 1px dotted grey;"';
        }

        echo '
				<td class="ac table__nested-row-header"' .
            $borderstyle .
            ">" .
            ($e + 1) .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $event["name"] .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $this->h3mapscan->PlayerColors($event["players"]) .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $event["humanOrAi"] .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $event["allowNeutralTowns"] .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $first .
            '</td>
				<td class="ac"' .
            $borderstyle .
            ">" .
            $period .
            '</td>
				<td' .
            $borderstyle .
            ">" .
            implode("<br />", $eres) .
            '</td>
				<td' .
            $borderstyle .
            ">" .
            implode("<br />", $monsters) .
            '</td>
				<td' .
            $borderstyle .
            ">" .
            implode(
                ",<wbr /> ",
                array_map(function ($item) {
                    return str_replace(" ", "&nbsp;", $item);
                }, $buildings),
            ) .
            '</td>
				<td' .
            $borderstyle .
            ">" .
            nl2br($event["message"]) .
            "</td>";
        echo "</tr>";
    }
}
echo "</table>";

echo "</div>";
