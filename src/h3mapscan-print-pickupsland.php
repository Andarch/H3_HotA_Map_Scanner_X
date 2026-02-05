<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="flex-container">

    <!-- *************** -->
    <!-- Treasure Chests -->
    <!-- *************** -->

    <div class="treasurechests-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header treasurechests-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Treasure Chests</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Contents</th>
                        <th>Artifact</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="treasurechests-table-button" class="table-button"></button>
        <div id="treasurechests-table" class="table-split-body-container treasurechests-table-body-container">
            <table class="table-split-body treasurechests-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->treasurechests_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->treasurechests_list as $treasurechest) {
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $treasurechest["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $treasurechest["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $treasurechest["zone_owner"] ?>" nowrap="nowrap">
                                <?= $treasurechest['zone_type'] ?>
                            </td>
                            <td class="small-text ac nowrap" nowrap="nowrap">
                                <?= $treasurechest["contents"] ?>
                            </td>
                            <td class="small-text nowrap" nowrap="nowrap">
                                <?= $treasurechest["artifact"] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ********* -->
    <!-- Resources -->
    <!-- ********* -->

    <div class="resources-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header resources-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="7">Resources</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th>Amount</th>
                        <th>Guards</th>
                        <th>Message</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="resources-table-button" class="table-button"></button>
        <div id="resources-table" class="table-split-body-container resources-table-body-container">
            <table class="table-split-body resources-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->resources_list, function ($a, $b) {
                        // Zone type and owner
                        $cmp = $a["zone_type"] <=> $b["zone_type"]
                            ?: $a["zone_owner"] <=> $b["zone_owner"];
                        if ($cmp !== 0)
                            return $cmp;

                        // Amount
                        $amountA = (isset($a["amount"]) && is_numeric($a["amount"]))
                            ? (float) $a["amount"]
                            : -INF;
                        $amountB = (isset($b["amount"]) && is_numeric($b["amount"]))
                            ? (float) $b["amount"]
                            : -INF;

                        return $amountA <=> $amountB;
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->resources_list as $resource) {
                        $guards = is_array($resource["common"]["guards"]) ? $this->h3mapscan->PrintStack($resource["common"]["guards"]) : EMPTY_DATA;
                        $amount = $resource["amount"] != 0 ? comma($resource["amount"]) : DEFAULT_DATA;
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $resource["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $resource["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $resource["zone_owner"] ?>" nowrap="nowrap">
                                <?= $resource['zone_type'] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $amount ?>
                            </td>
                            <td class="nowrap" nowrap="nowrap">
                                <?= $guards ?>
                            </td>
                            <td>
                                <div class="ellipsis1"
                                    title="<?= htmlspecialchars($resource["common"]["message"], ENT_QUOTES) ?>">
                                    <?= $resource["common"]["message"] ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ********* -->
    <!-- Campfires -->
    <!-- ********* -->

    <div class="campfires-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header campfires-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Campfires</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Mode</th>
                        <th>Resources</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="campfires-table-button" class="table-button"></button>
        <div id="campfires-table" class="table-split-body-container campfires-table-body-container">
            <table class="table-split-body campfires-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->campfires_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->campfires_list as $campfire) {
                        match ($campfire['mode']) {
                            DEFAULT_DATA => $resources = EMPTY_DATA,
                            'Custom' => $resources = implode('<br>', array_map(function ($k, $v) {
                                    return $k . ': ' . $v;
                                }, array_keys($campfire["resources"]), $campfire["resources"])),
                            'Nothing' => $resources = EMPTY_DATA,
                        };
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $campfire["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $campfire["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $campfire["zone_owner"] ?>" nowrap="nowrap">
                                <?= $campfire['zone_type'] ?>
                            </td>
                            <td class="small-text ac nowrap" nowrap="nowrap">
                                <?= $campfire["mode"] ?>
                            </td>
                            <td class="small-text nowrap" nowrap="nowrap">
                                <?= $resources ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ************* -->
    <!-- Ancient Lamps -->
    <!-- ************* -->

    <div class="ancientlamps-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header ancientlamps-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Ancient Lamps</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Contents</th>
                        <th>Amount</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="ancientlamps-table-button" class="table-button"></button>
        <div id="ancientlamps-table" class="table-split-body-container ancientlamps-table-body-container">
            <table class="table-split-body ancientlamps-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->ancientlamps_list, function ($a, $b) {
                        // Zone type and owner
                        $cmp = $a["zone_type"] <=> $b["zone_type"]
                            ?: $a["zone_owner"] <=> $b["zone_owner"];
                        if ($cmp !== 0)
                            return $cmp;

                        // Amount
                        $amountA = (isset($a["amount"]) && is_numeric($a["amount"]))
                            ? (float) $a["amount"]
                            : -INF;
                        $amountB = (isset($b["amount"]) && is_numeric($b["amount"]))
                            ? (float) $b["amount"]
                            : -INF;

                        return $amountA <=> $amountB;
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->ancientlamps_list as $ancientlamp) {
                        $ancientlamp['amount'] = $ancientlamp["contents"] != DEFAULT_DATA ? comma($ancientlamp["amount"]) : EMPTY_DATA;
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $ancientlamp["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $ancientlamp["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $ancientlamp["zone_owner"] ?>" nowrap="nowrap">
                                <?= $ancientlamp['zone_type'] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $ancientlamp["contents"] ?>
                            </td>
                            <td class="nowrap" nowrap="nowrap">
                                <?= $ancientlamp["amount"] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>