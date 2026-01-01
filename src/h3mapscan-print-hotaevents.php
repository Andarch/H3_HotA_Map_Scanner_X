<?php
/** @var H3MAPSCAN_PRINT $this */

$eventTables = [
	['key' => 'hero_events', 'title' => 'HotA Hero Events'],
	['key' => 'player_events', 'title' => 'HotA Player Events'],
	['key' => 'town_events', 'title' => 'HotA Town Events'],
	['key' => 'quest_events', 'title' => 'HotA Quest Events'],
];

foreach ($eventTables as $table) {
	echo '<table class="table-large">
		<tr>
			<th class="table__title-bar--large" colspan="11">' . $table['title'] . '</td>
		</tr>
		<tr>
			<th class="nowrap" nowrap="nowrap">#</th>
			<th class="nowrap" nowrap="nowrap">ID</th>
			<th class="nowrap" nowrap="nowrap">Name</th>
			<th class="nowrap" nowrap="nowrap">Bytes</th>
			<th class="nowrap" nowrap="nowrap">Actions</th>
		</tr>';

	foreach ($this->h3mapscan->hotaEvents[$table['key']] as $k => $event) {
		$actions = implode('<br>', array_filter(array_map(function ($action) {
			return $action['desc'] ?? '';
		}, $event['actions'] ?? [])));
		echo '<tr>
			<td class="table__row-header--default nowrap" nowrap="nowrap">' . ($k + 1) . '</td>
			<td class="ac nowrap" nowrap="nowrap">' . $event['id'] . '</td>
			<td class="nowrap" nowrap="nowrap">' . $event['name'] . '</td>
			<td class="nowrap" nowrap="nowrap">' . $event['bytes'] . '</td>
			<td class="nowrap" nowrap="nowrap">' . $actions . '</td>
		</tr>';
	}
	echo '</table>';
}

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
		<td class="ac nowrap" nowrap="nowrap">' . ($var['value_mode'] ? 'Initial' : 'Import from Campaign') . '</td>
		<td class="ac nowrap" nowrap="nowrap">' . ($var['value'] ?? EMPTY_DATA) . '</td>
	</tr>';
}
echo '</table>';
