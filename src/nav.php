<?php

const HRULE1 = '<hr class="hr-thick">';
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
            <hr class="hr-thick">
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
            <hr class="hr-thick">
        </div>

    <?php
}

function generateNavMain() {
    $mapid = $_GET['mapid'] ?? '';
    $mapQueryString = $mapid ? "mapid=$mapid&" : '';
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
        'Objects by Zone',
        'Unused Portraits',
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
        'Objects by Zone',
        'Unused Portraits',
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