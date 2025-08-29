<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="table-split-header-container">
    <table class="table-split-header monsters-table">
        <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Position</th>
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

<div class="table-split-body-container">
    <table class="table-split-body monsters-table">
        <tbody>

            <?php
            $n = 0;
            foreach ($this->h3mapscan->monsters_list as $monster) {

                if (!$monster["isValue"]) {
                    $count = $monster["count"] > 0 ? comma($monster["count"]) : "Random";
                    $value = EMPTY_DATA;
                } else {
                    $count = EMPTY_DATA;
                    $value = comma($monster["value"]);
                }
                $disposition =
                    $monster["disposition"] !== "Precise"
                        ? $monster["disposition"]
                        : "Precise (" . $monster["preciseDisposition"] . ")";
                $resources = [];
                foreach ($monster["resources"] as $rid => $amount) {
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

                $artifact = $monster["artifact"] !== "" ? $monster["artifact"] : EMPTY_DATA;
                $message = $monster["message"] !== "" ? $monster["message"] : EMPTY_DATA;
                ?>
            <tr>
                <td class="table__row-header--default"><?= ++$n ?></td>
                <td class="nowrap" nowrap="nowrap"><?= $monster["name"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["pos"]->GetCoords() ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $count ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $value ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["neverGrows"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $disposition ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["neverFlees"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["joinForMoney"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["joinPercent"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["upgraded"] ?></td>
                <td class="ac nowrap" nowrap="nowrap"><?= $monster["stackCount"] ?></td>
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