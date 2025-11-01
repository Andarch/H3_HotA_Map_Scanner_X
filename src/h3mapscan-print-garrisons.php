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
                <th>Owner</th>
                <th class="nowrap" nowrap="nowrap">Troops are<br />Removable</th>
                <th colspan="7">Guards</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-split-body-container garrisons-table-container">
    <table class="table-split-body garrisons-table">
        <tbody>

            <?php
            // Sort $this->h3mapscan->garrisons_list by owner
            usort($this->h3mapscan->garrisons_list, function ($a, $b) {
                return $a->owner <=> $b->owner;
            });

            $n = 0;
            foreach ($this->h3mapscan->garrisons_list as $garrison) {
                $owner = $this->h3mapscan->GetPlayerColorById($garrison->owner);
                ?>
                <tr>
                    <td class="table__row-header--default"><?= ++$n ?></td>
                    <td class="nowrap" nowrap="nowrap"><?= $garrison->name ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->info ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->mapcoor->GetCoords() ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $owner ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->add1 ?></td>
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                        ?>
                        <td class="nowrap" nowrap="nowrap">
                            <?= isset($garrison->add2[$i]) ? $this->h3mapscan->GetCreatureById($garrison->add2[$i]["id"]) . ": " . comma($garrison->add2[$i]["count"]) : "" ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>