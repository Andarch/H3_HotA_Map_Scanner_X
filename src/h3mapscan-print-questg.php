<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<div class="flex-container">';

// Quest Gates
$n = 0;
echo '<table class="smalltable">
		<tr>
            <td class="tableheader1" colspan="9">Quest Gates</td>
        </tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Position</th>
			<th>Type</th>
			<th>Requirement</th>
			<th>Deadline</th>
			<th>Text Give</th>
			<th>Text Repeat</th>
			<th>Text Finished</th>
		</tr>';
foreach($this->h3mapscan->quest_gates as $qgate) {
    $qgateReqClass = '';
    if($qgate['Qcategory'] === 'Specific Class') {
        $qgateReqClass = '"';
    }
    else {
        $qgateReqClass = ' nowrap" nowrap="nowrap"';
    }
    echo '<tr>';
    echo '  <td class="rowheader">'.(++$n).'</td>';
    echo '  <td class="normaltext ac nowrap" nowrap="nowrap">'.$qgate['name'].'</td>';
    echo '  <td class="normaltext ac nowrap" nowrap="nowrap">'.$qgate['pos']->GetCoords().'</td>';
    echo '  <td class="ac nowrap" nowrap="nowrap">'.$qgate['Qcategory'].'</td>';
    echo '  <td class="'.$qgateReqClass.'>'.$qgate['Qrequirement'].'</td>';
    echo '  <td class="ac nowrap" nowrap="nowrap">'.$qgate['Qdeadline'].'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qgate['textFirst']).'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qgate['textRepeat']).'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qgate['textDone']).'</td>';
    echo '</tr>';
}
echo '</table>';

// Quest Guards
$n = 0;
echo '<table id="quest-guards-table" class="smalltable">
		<tr>
            <td class="tableheader1" colspan="9">Quest Guards</td>
        </tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Position</th>
			<th>Type</th>
			<th>Requirement</th>
			<th>Deadline</th>
			<th>Text Give</th>
			<th>Text Repeat</th>
			<th>Text Finished</th>
		</tr>';
foreach($this->h3mapscan->quest_guards as $qguard) {
    $qguardReqClass = '';
    if($qguard['Qcategory'] === 'Specific Class') {
        $qguardReqClass = '"';
    }
    else {
        $qguardReqClass = ' nowrap" nowrap="nowrap"';
    }
    echo '<tr>';
    echo '  <td class="rowheader">'.(++$n).'</td>';
    echo '  <td class="normaltext ac nowrap" nowrap="nowrap">'.$qguard['name'].'</td>';
    echo '  <td class="normaltext ac nowrap" nowrap="nowrap">'.$qguard['pos']->GetCoords().'</td>';
    echo '  <td class="ac nowrap" nowrap="nowrap">'.$qguard['Qcategory'].'</td>';
    echo '  <td class="'.$qguardReqClass.'>'.$qguard['Qrequirement'].'</td>';
    echo '  <td class="ac nowrap" nowrap="nowrap">'.$qguard['Qdeadline'].'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qguard['textFirst']).'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qguard['textRepeat']).'</td>';
    echo '  <td style="'.TEXT_COLUMN_WIDTH.'">'.nl2br($qguard['textDone']).'</td>';
    echo '</tr>';
}
echo '</table>';

echo '</div>';
