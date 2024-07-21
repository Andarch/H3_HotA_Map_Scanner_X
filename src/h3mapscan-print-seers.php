<?php
/** @var H3MAPSCAN_PRINT $this */

$textColumnWidth = 'min-width: 300px;';

$n = 0;
echo '<table class="smalltable">
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
            <td rowspan="'.$qcount.'" class="rowheader">'.(++$n).'</td>
            <td rowspan="'.$qcount.'" class="mls ac nowrap" nowrap="nowrap">'.$hut['name'].'</td>
            <td rowspan="'.$qcount.'" class="mls ac nowrap" nowrap="nowrap">'.$hut['pos']->GetCoords().'</td>';

    foreach($hut['quests'] as $q => $quest) {
        $additionalrow = false;
        if($q > 0) {
            echo '<tr>';
            $additionalrow = true;
        }

        $borderstyle = '';
        if($additionalrow) {
            $borderstyle = 'border-top:1px dotted grey;border-bottom:1px dotted grey;';
        } else {
            $borderstyle = 'border-bottom:1px dotted grey;';
        }

        $Qreqstyle = '';
        if($quest['Qcategory'] === 'Specific Class') {
            $Qreqstyle = '"';
        }
        else {
            $Qreqstyle = ' nowrap" nowrap="nowrap"';
        }

        echo '  <td class="ac specialcell1" style="'.$borderstyle.'">'.($q + 1).'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" style="'.$borderstyle.'">'.$quest['Qcategory'].'</td>';
        echo '  <td class="'.$Qreqstyle.' style="'.$borderstyle.'">'.$quest['Qrequirement'].'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" style="'.$borderstyle.'">'.$quest['Qdeadline'].'</td>';
        echo '  <td class="ac nowrap" nowrap="nowrap" style="'.$borderstyle.'">'.$quest['questreward'].'</td>';
        echo '  <td style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textFirst']).'</td>';
        echo '  <td style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textRepeat']).'</td>';
        echo '  <td style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textDone']).'</td>';

        echo '</tr>';
    }
}

echo '</table>';
