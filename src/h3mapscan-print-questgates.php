<?php
/** @var H3MAPSCAN_PRINT $this */

//seers huts and quest master
usort($this->h3mapscan->quest_list, 'ListSortByName');
$n = 0;
echo '<table class="bigtable">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Coordinates</th>
			<th>Quest</th>
			<th class="colw300">Text Give</th>
			<th class="colw300">Text Repeat</th>
			<th class="colw300">Text Finished</th>
		</tr>';

foreach($this->h3mapscan->quest_list as $quest) {
    if($quest->name == 'Quest Guard' || $quest->name == 'Quest Gate')
    {
        $questtext = $quest->parent;
        if($quest->add1 > 0) {
            $questtext .= $this->h3mapscan->GetMapObjectByUID(MAPOBJECTS::NONE, $quest->add1);
        }

        echo '<tr>
            <td class="rowheader">'.(++$n).'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->name.'</td>
            <td class="ac nowrap" nowrap="nowrap">'.$quest->mapcoor->GetCoords().'</td>
            <td class="smalltext1 nowrap" nowrap="nowrap">'.$questtext.'</td>
            <td class="smalltext1">'.nl2br($quest->add2[0]).'</td>
            <td class="smalltext1">'.nl2br($quest->add2[1]).'</td>
            <td class="smalltext1">'.nl2br($quest->add2[2]).'</td>
        </tr>';
    }
}
echo '</table>';