<?php
/** @var H3MAPSCAN_PRINT $this */

$n = 0;
echo '<table class="table-large">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Position</th>
			<th>#</th>
			<th>Type</th>
			<th>Requirement</th>
			<th>Deadline</th>
			<th>Reward</th>
			<th>Text Give</th>
			<th>Text Repeat</th>
			<th>Text Finished</th>
		</tr>';

foreach($this->h3mapscan->seers_huts as $hut) {
    ksort($hut['quests']);
    $qcount = count($hut['quests']);

    echo '<tr>
            <td rowspan="'.$qcount.'" class="table__row-header--default">'.(++$n).'</td>
            <td rowspan="'.$qcount.'" class="ac nowrap" nowrap="nowrap">'.$hut['name'].'</td>
            <td rowspan="'.$qcount.'" class="ac nowrap" nowrap="nowrap">'.$hut['pos']->GetCoords().'</td>';

    foreach($hut['quests'] as $q => $quest) {
        $Qreqclass = '';
        if($quest['Qcategory'] === 'Specific Class') {
            $Qreqclass = '"';
        }
        else {
            $Qreqclass = ' nowrap" nowrap="nowrap"';
        }

        $additionalRow = false;
        $lastAdditionalRow = false;
        if($qcount > 1 && $q > 0) {
            echo '<tr>';
            if($q < $qcount - 1) {
                $additionalRow = true;
            } else {
                $lastAdditionalRow = true;
            }
        }
        $borderstyle = '';
        if($qcount > 1 && $q == 0) {
            $borderstyle = 'style="border-bottom: 1px dotted grey;"';
        } else if($additionalRow) {
            $borderstyle = 'style="border-top: 1px dotted grey; border-bottom: 1px dotted grey;"';
        } else if($lastAdditionalRow) {
            $borderstyle = 'style="border-top: 1px dotted grey;"';
        }

        echo '  <td class="ac table__nested-row-header" '.$borderstyle.'>'.($q + 1).'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" '.$borderstyle.'>'.$quest['Qcategory'].'</td>';
        echo '  <td class="'.$Qreqclass.' '.$borderstyle.'>'.$quest['Qrequirement'].'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" '.$borderstyle.'>'.$quest['Qdeadline'].'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" '.$borderstyle.'>'.$quest['questreward'].'</td>';
        echo '  <td class="small-text" '.$borderstyle.TEXT_COLUMN_WIDTH.'>'.nl2br($quest['textFirst']).'</td>';
        echo '  <td class="small-text" '.$borderstyle.TEXT_COLUMN_WIDTH.'>'.nl2br($quest['textRepeat']).'</td>';
        echo '  <td class="small-text" '.$borderstyle.TEXT_COLUMN_WIDTH.'>'.nl2br($quest['textDone']).'</td>';
        echo '</tr>';
    }
}
echo '</table>';
