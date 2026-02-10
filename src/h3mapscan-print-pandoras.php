<?php
/** @var H3MAPSCAN_PRINT $this */

usort($this->h3mapscan->events_list, function ($a, $b) {
    $cmp = $a["zone_type"] <=> $b["zone_type"] ?: $a["zone_owner"] <=> $b["zone_owner"];
    if ($cmp !== 0) {
        return $cmp;
    }
});

echo '<div class="flex-container">';

$n = 0;
echo '<table class="table-large">
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">Object</th>
			<th class="nowrap" nowrap="nowrap">Coords</th>
			<th class="nowrap" nowrap="nowrap">Zone<br />Type</th>
			<th class="nowrap" nowrap="nowrap">Difficulty</th>
			<th class="nowrap" nowrap="nowrap">Guardians</th>
			<th class="nowrap" nowrap="nowrap" colspan="6">Rewards</th>
			<th class="nowrap" nowrap="nowrap">Text</th>
		</tr>';
foreach ($this->h3mapscan->events_list as $evento) {
    if ($evento["objname"] == 'Pandora\'s Box') {
        $event = $evento["data"];

        $guards = "";
        $msg = "";
        if (!empty($event["MessageStack"])) {
            $msg = nl2br($event["MessageStack"]["message"]);
            if ($event["MessageStack"]["guards"] != EMPTY_DATA) {
                $guards = $this->h3mapscan->PrintStack($event["MessageStack"]["guards"]);
            }
        }

        $content = [];
        $content = $this->h3mapscan->CreateRewardContents($event);

        echo '<tr>
			<td class="table__row-header--default nowrap" nowrap="nowrap">' .
            ++$n .
            '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
            $evento["objname"] .
            '</td>
			<td class="ac nowrap" nowrap="nowrap">' .
            $evento["pos"]->GetCoords() .
            '</td>
			<td class="ac nowrap zone-type player-dark' .
            $evento["zone_owner"] .
            '" nowrap="nowrap">' .
            $evento["zone_type"] .
            '</td>
			<td class="ac" style="width:120px;">' .
            implode(", ", $event["difficulty"]) .
            '</td>
			<td class="small-text nowrap" nowrap="nowrap">' .
            $guards .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[1]) .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[2]) .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[3]) .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[4]) .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[5]) .
            '</td>
			<td class="small-text thin-vertical-border nowrap" nowrap="nowrap">' .
            implode("<br />", $content[6]) .
            '</td>
			<td class="small-text">' .
            $msg .
            '</td>
		</tr>';
    }
}
echo "</table>";

echo "</div>";
