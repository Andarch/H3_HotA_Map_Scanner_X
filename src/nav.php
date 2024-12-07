<?php

const HRULE1 = '<hr class="hrule1">';
const HRULE2 = '<hr class="hrule2">';

function generateNav() {
    ?>

    <div class="nav">

    <?php

    generateNavTop();
    generateNavMain();

    ?>

    </div>

    <?php
}

function generateNavTop() {
    ?>

        <div class="nav-top">
            <hr class="hrule1a">
            <table>
                <tr>
                    <td>
                        <a href="index.php?scan=1">Scan</a>
                    </td>
                    <td>
                        <a href="maplist.php">Map List</a>
                    </td>
                </tr>
            </table>
            <hr class="hrule1a">
        </div>

    <?php
}

function generateNavMain() {
    $mapID = $_GET['mapID'] ?? '';
    $mapQueryString = $mapID ? "mapID=$mapID&" : '';
    $currentSection = $_GET['section'] ?? '';
    $sections = [
        'General',
        'Terrain',
        'Disabled Heroes',
        'Template Heroes',
        'Map Heroes',
        'Town Details',
        'Artifacts',
        'Spells',
        'Seer\'s Huts',
        'Quest Gates',
        'Quest Guards',
        'Global Events',
        'Town Events',
        'Pandora\'s Boxes',
        'Event Objects',
        'Object Count',
        'Starting Zones'
    ];
    $sectionsWithAnchors = [
        'Template Heroes' => 'heroes-table-2',
        'Map Heroes' => 'heroes-table-3',
        'Quest Guards' => 'quest-guards-table',
    ];
    $sectionsWithHr1Below = [
        'General',
        'Terrain',
        'Map Heroes',
        'Town Details',
        'Spells',
        'Quest Guards',
        'Town Events',
        'Event Objects',
        'Starting Zones',
    ];
    $sectionsWithHr2Below = [
        'Disabled Heroes',
        'Template Heroes',
        'Artifacts',
        'Seer\'s Huts',
        'Quest Gates',
        'Global Events',
        'Pandora\'s Boxes',
        'Object Count',
    ];

    $navMain = '<div class="nav-main">';
    foreach ($sections as $section) {
        if($section === 'General') {
            // $navMain .= HRULE1;
        }
        $selectedClass = $section === $currentSection ? 'selected' : '';
        $anchor = isset($sectionsWithAnchors[$section]) ? '#' . $sectionsWithAnchors[$section] : '';
        $navMain .= "<a href=\"?{$mapQueryString}section={$section}{$anchor}\" class=\"{$selectedClass}\">".ucfirst($section)."</a>";
        if(in_array($section, $sectionsWithHr1Below)) {
            $navMain .= HRULE1;
        } else if(in_array($section, $sectionsWithHr2Below)) {
            $navMain .= HRULE2;
        }
    }
    $navMain .= '</div>';

    echo $navMain;
}