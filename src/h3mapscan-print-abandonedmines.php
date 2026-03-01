<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="table-split-header-container abandonedmines-table-container">
    <table class="table-split-header abandonedmines-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Coords</th>
                <th>Zone</th>
                <th>Resources</th>
                <th>Guards</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-split-body-container abandonedmines-table-container">
    <table class="table-split-body abandonedmines-table">
        <tbody>

            <?php
            usort($this->h3mapscan->mines_list, function ($a, $b) {
                return $a["zone_type"] <=> $b["zone_type"] ?: $a["zone_owner"] <=> $b["zone_owner"];
            });

            $n = 0;
            foreach ($this->h3mapscan->mines_list as $mine) {
                if ($mine["id"] == OBJECTS::MINE && $mine["subid"] != 7) {
                    continue;
                } ?>
            <tr>
                <td class="table__row-header--default"><?= ++$n ?></td>
                <td class="nowrap" nowrap="nowrap">Abandoned Mine</td>
                <td class="ac nowrap" nowrap="nowrap"><?= $mine["pos"]->GetCoords() ?></td>
                <td class="ac zone-type player-dark<?= $mine["zone_owner"] ?>"><?= $mine["zone_type"] ?></td>
                <td class="nowrap" nowrap="nowrap"><?= $mine["data"]["resources"] ?></td>
                <td class="nowrap" nowrap="nowrap"><?= $mine["data"]["guards"] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>