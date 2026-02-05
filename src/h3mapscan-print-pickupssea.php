<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="flex-container">

    <!-- ************** -->
    <!-- Flotsam/Jetsam -->
    <!-- ************** -->

    <div class="flotsamjetsam-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header flotsamjetsam-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Flotsam/Jetsam</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Contents</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="flotsamjetsam-table-button" class="table-button"></button>
        <div id="flotsamjetsam-table" class="table-split-body-container flotsamjetsam-table-body-container">
            <table class="table-split-body flotsamjetsam-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->flotsamjetsam_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->flotsamjetsam_list as $flotsamjetsam) {
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $flotsamjetsam["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $flotsamjetsam["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $flotsamjetsam["zone_owner"] ?>" nowrap="nowrap">
                                <?= $flotsamjetsam['zone_type'] ?>
                            </td>
                            <td class="small-text nowrap" nowrap="nowrap">
                                <?= $flotsamjetsam["contents"] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- *********** -->
    <!-- Sea Barrels -->
    <!-- *********** -->

    <div class="seabarrels-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header seabarrels-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Sea Barrels</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Contents</th>
                        <th>Resources</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="seabarrels-table-button" class="table-button"></button>
        <div id="seabarrels-table" class="table-split-body-container seabarrels-table-body-container">
            <table class="table-split-body seabarrels-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->seabarrels_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->seabarrels_list as $seabarrel) {
                        match ($seabarrel['contents']) {
                            DEFAULT_DATA => $resources = EMPTY_DATA,
                            'Custom' => $resources = $seabarrel["resource"] . ': ' . $seabarrel["amount"],
                            'Nothing' => $resources = EMPTY_DATA,
                        };
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $seabarrel["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $seabarrel["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $seabarrel["zone_owner"] ?>" nowrap="nowrap">
                                <?= $seabarrel['zone_type'] ?>
                            </td>
                            <td class="small-text ac nowrap" nowrap="nowrap">
                                <?= $seabarrel["contents"] ?>
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

    <!-- ********** -->
    <!-- Sea Chests -->
    <!-- ********** -->

    <div class="seachests-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header seachests-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Sea Chests</th>
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
        <button id="seachests-table-button" class="table-button"></button>
        <div id="seachests-table" class="table-split-body-container seachests-table-body-container">
            <table class="table-split-body seachests-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->seachests_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->seachests_list as $seachest) {
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $seachest["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $seachest["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $seachest["zone_owner"] ?>" nowrap="nowrap">
                                <?= $seachest['zone_type'] ?>
                            </td>
                            <td class="small-text ac nowrap" nowrap="nowrap">
                                <?= $seachest["contents"] ?>
                            </td>
                            <td class="small-text nowrap" nowrap="nowrap">
                                <?= $seachest["artifact"] ?>
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
    <!-- Vials of Mana -->
    <!-- ************* -->

    <div class="vialsofmana-table-container">
        <div class="table-split-header-container">
            <table class="table-split-header vialsofmana-table">
                <thead>
                    <tr>
                        <th class="ac table__title-bar--large" colspan="6">Vials of Mana</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Coords</th>
                        <th class="nowrap" nowrap="nowrap">Zone</th>
                        <th class="nowrap" nowrap="nowrap">Contents</th>
                    </tr>
                </thead>
            </table>
        </div>
        <button id="vialsofmana-table-button" class="table-button"></button>
        <div id="vialsofmana-table" class="table-split-body-container vialsofmana-table-body-container">
            <table class="table-split-body vialsofmana-table">
                <tbody>

                    <?php
                    usort($this->h3mapscan->vialsofmana_list, function ($a, $b) {
                        return $a['zone_type'] <=> $b['zone_type'] ?: $a['zone_owner'] <=> $b['zone_owner'];
                    });

                    $n = 0;
                    foreach ($this->h3mapscan->vialsofmana_list as $vialofmana) {
                        ?>
                        <tr>
                            <td class="table__row-header--default"><?= ++$n ?></td>
                            <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $vialofmana["objname"] ?>
                            </td>
                            <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                                <?= $vialofmana["pos"]->GetCoords() ?>
                            </td>
                            <td class="ac nowrap zone-type player-dark<?= $vialofmana["zone_owner"] ?>" nowrap="nowrap">
                                <?= $vialofmana['zone_type'] ?>
                            </td>
                            <td class="small-text nowrap" nowrap="nowrap">
                                <?= $vialofmana["contents"] ?>
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