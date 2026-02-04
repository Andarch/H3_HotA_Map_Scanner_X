<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="table-split-header-container">
    <table class="table-split-header monsters-table">
        <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Coords</th>
                <th rowspan="2">Zone<br />Owner</th>
                <th rowspan="2">Zone<br />Type</th>
                <th rowspan="2">Count</th>
                <th rowspan="2">Value</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Doesn't<br />Grow</th>
                <th rowspan="2">Disposition</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Never<br />Flees</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Join Only<br />for Money</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Join<br />%</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Upg.<br />Stack</th>
                <th rowspan="2" class="ac nowrap" nowrap="nowrap">Stack<br />Count</th>
                <th colspan="7">Resources</th>
                <th rowspan="2">Artifact</th>
                <th rowspan="2">Message</th>
            </tr>
            <tr>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Wood</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Mercury</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Ore</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Sulfur</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Crystal</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Gems</th>
                <th class="tiny-header-text ac nowrap" nowrap="nowrap">Gold</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-split-body-container monsters-table-container">
    <table class="table-split-body monsters-table">
        <tbody>

            <?php
            usort($this->h3mapscan->monsters_list, function ($a, $b) {
                // First:
                // Compare by zone_type
                $order = ['P-1', 'P-2', 'P-3', 'P-4', 'L-1', 'W-1', 'L-2', 'W-2', 'L-3', 'W-3', 'L-4', 'W-4', 'R-1', 'R-2', 'R-3', 'R-4'];
                $posA = array_search($a["zone_type"], $order);
                $posB = array_search($b["zone_type"], $order);

                $posA = $posA === false ? PHP_INT_MAX : $posA;
                $posB = $posB === false ? PHP_INT_MAX : $posB;

                if ($posA !== $posB) {
                    return $posA <=> $posB;
                }

                // Second:
                // Compare by zone_owner
                $ownerOrder = ['Red', 'Blue', 'Tan', 'Green', 'Orange', 'Purple', 'Teal', 'Pink'];
                $ownerPosA = array_search($a["zone_owner"], $ownerOrder);
                $ownerPosB = array_search($b["zone_owner"], $ownerOrder);

                $ownerPosA = $ownerPosA === false ? PHP_INT_MAX : $ownerPosA;
                $ownerPosB = $ownerPosB === false ? PHP_INT_MAX : $ownerPosB;

                if ($ownerPosA !== $ownerPosB) {
                    return $ownerPosA <=> $ownerPosB;
                }

                // Third:
                // Compare by name (Random Monster comes after all other names)
                $nameA = $a["data"]["name"];
                $nameB = $b["data"]["name"];
                $isRandomA = str_starts_with($nameA, "Random Monster");
                $isRandomB = str_starts_with($nameB, "Random Monster");

                if ($isRandomA && !$isRandomB) {
                    return 1; // A comes after B
                } elseif (!$isRandomA && $isRandomB) {
                    return -1; // A comes before B
                } else {
                    $nameCmp = strcmp($nameA, $nameB);
                    if ($nameCmp !== 0) {
                        return $nameCmp;
                    }
                }

                // Fourth:
                // Compare by value
                $valueA = (isset($a["data"]["value"]) && is_numeric($a["data"]["value"]))
                    ? (float) $a["data"]["value"]
                    : -INF;
                $valueB = (isset($b["data"]["value"]) && is_numeric($b["data"]["value"]))
                    ? (float) $b["data"]["value"]
                    : -INF;

                return $valueA <=> $valueB;
            });

            $n = 0;
            $previousowner = '';
            $currentowner = '';
            foreach ($this->h3mapscan->monsters_list as $monster) {
                $currentowner = $monster["zone_owner"];
                if ($previousowner !== $currentowner) {
                    $n = 0;
                    $previousowner = $currentowner;
                }
                match ($monster["zone_owner"]) {
                    'Red' => $zone_owner = $this->h3mapscan->GetPlayerColorById(0),
                    'Blue' => $zone_owner = $this->h3mapscan->GetPlayerColorById(1),
                    'Tan' => $zone_owner = $this->h3mapscan->GetPlayerColorById(2),
                    'Green' => $zone_owner = $this->h3mapscan->GetPlayerColorById(3),
                    'Orange' => $zone_owner = $this->h3mapscan->GetPlayerColorById(4),
                    'Purple' => $zone_owner = $this->h3mapscan->GetPlayerColorById(5),
                    'Teal' => $zone_owner = $this->h3mapscan->GetPlayerColorById(6),
                    'Pink' => $zone_owner = $this->h3mapscan->GetPlayerColorById(7),
                    'Neutral' => $zone_owner = $this->h3mapscan->GetPlayerColorById(255),
                };

                if (!$monster["data"]["isValue"]) {
                    $count = $monster["data"]["count"] > 0 ? comma($monster["data"]["count"]) : "Random";
                    $value = EMPTY_DATA;
                } else {
                    $count = EMPTY_DATA;
                    $value = comma($monster["data"]["value"]);
                }
                $disposition =
                    $monster["data"]["disposition"] !== "Precise"
                    ? $monster["data"]["disposition"]
                    : "Precise (" . $monster["data"]["preciseDisposition"] . ")";
                $resources = [];
                foreach ($monster["data"]["resources"] as $rid => $amount) {
                    $sign = $amount > 0 ? "+" : "";
                    $resources[] = $sign . comma($amount);
                }

                $wood = $resources[0] ?? EMPTY_DATA;
                $mercury = $resources[1] ?? EMPTY_DATA;
                $ore = $resources[2] ?? EMPTY_DATA;
                $sulfur = $resources[3] ?? EMPTY_DATA;
                $crystal = $resources[4] ?? EMPTY_DATA;
                $gems = $resources[5] ?? EMPTY_DATA;
                $gold = $resources[6] ?? EMPTY_DATA;

                $artifact = $monster["data"]["artifact"] !== "" ? $monster["data"]["artifact"] : EMPTY_DATA;
                $message = $monster["data"]["message"] !== "" ? $monster["data"]["message"] : EMPTY_DATA;
                ?>
                <tr>
                    <td class="table__row-header--default"><?= ++$n ?></td>
                    <td class="nowrap" nowrap="nowrap"><?= $monster["data"]["name"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["pos"]->GetCoords() ?></td>
                    <td class="ac nowrap" nowrap="nowrap">
                        <?= $zone_owner ?>
                    </td>
                    <td class="ac nowrap zone-type" nowrap="nowrap"
                        data-zone="<?= htmlspecialchars($monster["zone_type"], ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($monster["zone_type"], ENT_QUOTES, "UTF-8") ?>
                    </td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $count ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $value ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["neverGrows"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $disposition ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["neverFlees"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["joinForMoney"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["joinPercent"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["upgraded"] ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $monster["data"]["stackCount"] ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $wood ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $mercury ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $ore ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $sulfur ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $crystal ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $gems ?></td>
                    <td class="ac tiny-text nowrap" nowrap="nowrap"><?= $gold ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $artifact ?></td>
                    <td>
                        <div class="ellipsis1" title="<?= htmlspecialchars($message, ENT_QUOTES) ?>"><?= $message ?></div>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>