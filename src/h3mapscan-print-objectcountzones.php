<?php
/** @var H3MAPSCAN_PRINT $this */

require_once 'src/h3objcountconstants.php';

$zoneColors = [
    'Red' => [255, 0, 0],
    'Blue' => [49, 82, 255],
    'Tan' => [156, 115, 82],
    'Green' => [66, 148, 41],
    'Orange' => [255, 132, 0],
    'Purple' => [140, 41, 165],
    'Teal' => [8, 156, 165],
    'Pink' => [198, 123, 140]
];

function loadImageColors($filename) {
    if (!file_exists($filename)) {
        return null;
    }
    $image = imagecreatefrompng($filename);
    $width = imagesx($image);
    $height = imagesy($image);
    $colors = [];

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $rgb = imagecolorat($image, $x, $y);
            $colors[$x][$y] = [
                ($rgb >> 16) & 0xFF, // Red
                ($rgb >> 8) & 0xFF,  // Green
                $rgb & 0xFF          // Blue
            ];
        }
    }
    imagedestroy($image);
    return $colors;
}

function getZoneByColor($color, $zoneColors) {
    foreach ($zoneColors as $zone => $zoneColor) {
        if ($color === $zoneColor) {
            return $zone;
        }
    }
    return null;
}

$baseFilename = pathinfo($this->h3mapscan->mapfile, PATHINFO_FILENAME);

$groundColors = loadImageColors(MAPDIR . $baseFilename . '_g.png');
$undergroundColors = loadImageColors(MAPDIR . $baseFilename . '_u.png');

$objectCounts = [];

foreach ($this->h3mapscan->objects_zones as $obj) {
    $x = $obj['pos']->x;
    $y = $obj['pos']->y;
    $z = $obj['pos']->z;
    $color = null;

    if ($z == 0 && $groundColors) {
        $color = $groundColors[$x][$y];
    } elseif ($z == 1 && $undergroundColors) {
        $color = $undergroundColors[$x][$y];
    }

    if ($color) {
        $zone = getZoneByColor($color, $zoneColors);
        if ($zone) {
            $comboid = $obj['comboid'];
            $name = $obj['name'];
            if (!isset($objectCounts[$comboid])) {
                $objectCounts[$comboid] = [
                    'name' => $name,
                    'zones' => array_fill_keys(array_keys($zoneColors), 0)
                ];
            }
            $objectCounts[$comboid]['zones'][$zone] += 1;
        }
    }
}

// Flatten the objectCounts array into a single list of objects
$flatObjectCounts = [];
foreach ($objectCounts as $comboid => $data) {
    $flatObjectCounts[] = [
        'comboid' => $comboid,
        'name' => $data['name'],
        'zones' => $data['zones']
    ];
}

// Sort the flat list by object name
usort($flatObjectCounts, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

echo '<table class="'.OBJCOUNT_TABLECLASS.'">';
echo '<tr>
        <th class="table__title-bar--small">ID</th>
        <th class="table__title-bar--small">Type</th>';
foreach (array_keys($zoneColors) as $zone) {
    echo '<th class="table__title-bar--small" style="width:50.29px;">'.$zone.'</th>';
}
echo '</tr>';

// Generate the table rows from the sorted flat list
foreach ($flatObjectCounts as $data) {
    echo '<tr>';
    echo '<td class="ac nowrap">'.$data['comboid'].'</td>';
    echo '<td class="nowrap">'.$data['name'].'</td>';
    foreach (array_keys($zoneColors) as $zoneHeader) {
        $count = $data['zones'][$zoneHeader] == 0 ? EMPTY_DATA : $data['zones'][$zoneHeader];
        echo '<td class="ac nowrap">'.$count.'</td>';
    }
    echo '</tr>';
}

echo '</table>';
