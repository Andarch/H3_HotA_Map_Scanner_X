<?php
/** @var H3MAPSCAN_PRINT $this */

$textColumnWidth = 'min-width: 300px;';

$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th colspan="2">Quest</th>
			<th>Reward</th>
			<th class="thickvertical-left thinvertical-right">Text Give</th>
			<th class="thinvertical">Text Repeat</th>
			<th class="thinvertical-left thickvertical-right">Text Finished</th>
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
        echo '  <td class="smalltext1 ac thickvertical-left thinvertical-right nowrap" nowrap="nowrap" style="'.$borderstyle.'">'.$quest['Qcategory'].'</td>';
        echo '  <td class="smalltext1 thinvertical-left thickvertical-right'.$Qreqstyle.' style="'.$borderstyle.'">'.$quest['Qrequirement'].'</td>';
        echo '  <td class="smalltext1 ac nowrap" nowrap="nowrap" style="'.$borderstyle.'">'.$quest['questreward'].'</td>';
        echo '  <td class="smalltext1 thickvertical-left thinvertical-right" style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textFirst']).'</td>';
        echo '  <td class="smalltext1 thinvertical" style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textRepeat']).'</td>';
        echo '  <td class="smalltext1 thinvertical-left thickvertical-right" style="'.$borderstyle.$textColumnWidth.'">'.nl2br($quest['textDone']).'</td>';

        echo '</tr>';
    }
}

echo '</table>';
