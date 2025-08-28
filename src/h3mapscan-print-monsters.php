<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="stationary-header-container">
    <table class="monsters-table stationary-header">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Position</th>
                <th>Count</th>
                <th>Value</th>
                <th class="ac nowrap" nowrap="nowrap">Doesn't<br />Grow</th>
                <th>Disposition</th>
                <th class="ac nowrap" nowrap="nowrap">Never<br />Flees</th>
                <th class="ac nowrap" nowrap="nowrap">Join Only<br />for Money</th>
                <th class="ac nowrap" nowrap="nowrap">Join<br />%</th>
                <th class="ac nowrap" nowrap="nowrap">Upg.<br />Stack</th>
                <th class="ac nowrap" nowrap="nowrap">Stack<br />Count</th>
                <th>Resources</th>
                <th>Artifact</th>
                <th>Message</th>
            </tr>
        </thead>
    </table>
</div>

<div class="monsters-table-container">
    <table class="monsters-table table-bottom">
        <tbody>

            <?php
            $n = 0;
            foreach ($this->h3mapscan->monsters_list as $monster) {

                $count = !$monster["isValue"] ? comma($monster["count"]) : EMPTY_DATA;
                $value = $monster["isValue"] ? comma($monster["value"]) : EMPTY_DATA;
                if (!$monster["isValue"]) {
                    $count = $monster["count"] > 0 ? comma($monster["count"]) : EMPTY_DATA;
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
                    $resources[] = $sign . comma($amount) . " " . $this->h3mapscan->GetResourceById($rid);
                }
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
                <td class="tiny-text nowrap" nowrap="nowrap"><?= implode("<br />", $resources) ?></td>
                <td class="ac"><?= $monster["artifact"] ?></td>
                <td><?= $monster["message"] ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
            }

