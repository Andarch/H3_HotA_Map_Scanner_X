<?php
/** @var H3MAPSCAN_PRINT $this */
?>

<div class="table-split-header-container garrisons-table-container">
    <table class="table-split-header garrisons-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Direction</th>
                <th>Position</th>
                <th class="nowrap" nowrap="nowrap">Zone<br />Type</th>
                <th>Owner</th>
                <th class="nowrap" nowrap="nowrap">Troops are<br />Removable</th>
                <th>Guards</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-split-body-container garrisons-table-container">
    <table class="table-split-body garrisons-table">
        <tbody>

            <?php
            usort($this->h3mapscan->garrisons_list, function ($a, $b) {
                $order = ['P1', 'P2', 'P3', 'P4', 'L1', 'W1', 'L2', 'W2', 'L3', 'W3', 'L4', 'W4', 'R1', 'R2', 'R3', 'R4'];
                $posA = array_search($a->zonetype, $order);
                $posB = array_search($b->zonetype, $order);

                // First compare by zone type
                if ($posA !== $posB) {
                    return $posA <=> $posB;
                }

                // If zone types are equal, compare by owner
                return $a->owner <=> $b->owner;
            });

            $n = 0;
            foreach ($this->h3mapscan->garrisons_list as $garrison) {
                $owner = $this->h3mapscan->GetPlayerColorById($garrison->owner);
                ?>
                <tr>
                    <td class="table__row-header--default"><?= ++$n ?></td>
                    <td class="nowrap" nowrap="nowrap" style="font-size: 12px !important;"><?= $garrison->name ?></td>
                    <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;"><?= $garrison->info ?></td>
                    <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;">
                        <?= $garrison->mapcoor->GetCoords() ?>
                    </td>
                    <td class="ac nowrap zone-type" nowrap="nowrap"
                        data-zone="<?= htmlspecialchars($garrison->zonetype, ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($garrison->zonetype, ENT_QUOTES, "UTF-8") ?>
                    </td>
                    <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;"><?= $owner ?></td>
                    <td class="ac nowrap" nowrap="nowrap" style="font-size: 12px !important;"><?= $garrison->add1 ?></td>
                    <td class="nowrap" nowrap="nowrap"><?= $this->h3mapscan->PrintStack($garrison->add2) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>