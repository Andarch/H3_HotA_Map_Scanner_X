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
                <th>Guards</th>
            </tr>
        </thead>
    </table>
</div>

<div class="table-split-body-container garrisons-table-container">
    <table class="table-split-body garrisons-table">
        <tbody>

            <?php
            $n = 0;
            foreach ($this->h3mapscan->garrisons_list as $garrison) {
                $owner = $this->h3mapscan->CS->PlayersColors[$garrison->owner];
                ?>
                <tr>
                    <td class="table__row-header--default"><?= ++$n ?></td>
                    <td class="nowrap" nowrap="nowrap"><?= $garrison->name ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->info ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->mapcoor->GetCoords() ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $owner ?></td>
                    <td class="ac nowrap" nowrap="nowrap"><?= $garrison->add1 ?></td>
                    <td class="nowrap" nowrap="nowrap"><?= $this->h3mapscan->PrintStack($garrison->add2) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>