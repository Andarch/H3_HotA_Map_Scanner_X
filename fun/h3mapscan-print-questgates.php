<?php
// Retrieve the $h3mapscan object from the session
//$this->h3mapscan = $_SESSION['h3mapscan'];

//seers huts and quest master
usort($this->h3mapscan->quest_list, 'ListSortByName');
$n = 0;
echo '<table class="smalltable">
		<tr>
			<th class="nowrap" nowrap="nowrap">Quest</th>
			<th class="nowrap" nowrap="nowrap">Giver</th>
			<th class="nowrap" nowrap="nowrap">Position</th>
			<th>Quest</th>
			<th colspan="3">Reward</th>
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
            <td class="ac">'.(++$n).'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->name.'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->mapcoor->GetCoords().'</td>
            <td class="nowrap" nowrap="nowrap">'.$questtext.'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->owner.'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->info.'</td>
            <td class="nowrap" nowrap="nowrap">'.$quest->count.'</td>
            <td>'.nl2br($quest->add2[0]).'</td>
            <td>'.nl2br($quest->add2[1]).'</td>
            <td>'.nl2br($quest->add2[2]).'</td>
        </tr>';
    }
}
echo '</table>';
