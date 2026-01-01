<?php
/** @var H3MAPSCAN_PRINT $this */

echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">HotA Hero Events</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
		</tr>';

foreach ($this->h3mapscan->hotaEvents['hero_events'] as $k => $event) {
	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . $event['id'] . '</td>
		<td class="nowrap" nowrap="nowrap">' . $event['name'] . '</td>
	</tr>';
}
echo '</table>';

echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">HotA Player Events</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
		</tr>';

foreach ($this->h3mapscan->hotaEvents['player_events'] as $k => $event) {
	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . $event['id'] . '</td>
		<td class="nowrap" nowrap="nowrap">' . $event['name'] . '</td>
	</tr>';
}
echo '</table>';

echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">HotA Town Events</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
		</tr>';

foreach ($this->h3mapscan->hotaEvents['town_events'] as $k => $event) {
	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . $event['id'] . '</td>
		<td class="nowrap" nowrap="nowrap">' . $event['name'] . '</td>
	</tr>';
}
echo '</table>';

echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">HotA Quest Events</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
		</tr>';

foreach ($this->h3mapscan->hotaEvents['quest_events'] as $k => $event) {
	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . $event['id'] . '</td>
		<td class="nowrap" nowrap="nowrap">' . $event['name'] . '</td>
	</tr>';
}
echo '</table>';

echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">HotA Variables</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Save in</br>Campaign</th>
			<th class="nowrap" nowrap="nowrap">Value Mode</th>
			<th class="nowrap" nowrap="nowrap">Value</th>
		</tr>';

foreach ($this->h3mapscan->hotaEvents['variables'] as $k => $var) {
	echo '<tr>
		<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . $var['id'] . '</td>
		<td class="nowrap" nowrap="nowrap">' . $var['name'] . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . ($var['save_in_campaign'] ? 'Yes' : 'No') . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . ($var['value_mode'] ? 'Initial' : 'Import') . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . ($var['value'] ?? EMPTY_DATA) . '</td>
	</tr>';
}
echo '</table>';
