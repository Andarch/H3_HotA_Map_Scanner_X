<?php

//class to print h3mapscan data to html presentation
class H3MAPSCAN_PRINT {
	private $h3mapscan;
    public function __construct($h3mapscan, $section) {
        $this->h3mapscan = $h3mapscan;
        $this->PrintMapInfo($section);
    }
    private function PrintMapInfo($section) {
        $subrev = ($this->h3mapscan->version == $this->h3mapscan::HOTA) ? ' '.$this->h3mapscan->hota_subrev : '';
        $print = $this->generateSidebar();
        $section = $_GET['section'] ?? 'general';

        ob_start(); // Start output buffering
        switch ($section) {
            case 'General':
                include 'h3mapscan-print-general.php';
                break;
			case 'Terrain':
				include 'h3mapscan-print-terrain.php';
				break;
			case 'Disabled Heroes':
			case 'Custom Heroes':
			case 'Map Heroes':
				include 'h3mapscan-print-heroes.php';
				break;
			case 'Town Details':
				include 'h3mapscan-print-towndetails.php';
				break;
			case 'Artifacts':
				include 'h3mapscan-print-artifacts.php';
				break;
			case 'Spells':
				include 'h3mapscan-print-spells.php';
				break;
			case 'Seer\'s Huts':
				include 'h3mapscan-print-seers.php';
				break;
			case 'Quest Gates':
			case 'Quest Guards':
				include 'h3mapscan-print-questg.php';
				break;
			case 'Global Events':
				include 'h3mapscan-print-globalevents.php';
				break;
			case 'Town Events':
				include 'h3mapscan-print-townevents.php';
				break;
			case 'Pandora\'s Boxes':
				include 'h3mapscan-print-pandoras.php';
				break;
			case 'Event Objects':
				include 'h3mapscan-print-eventobjects.php';
				break;
			case 'Object Count':
				include 'h3mapscan-print-objectcount.php';
				break;
            default:
                include 'h3mapscan-print-general.php';
                break;
        }
        $print .= ob_get_clean(); // End output buffering and append the output to $print
        $print .= '</div>';
        $print .= '</div>';

        echo $print;
    }

    private function generateSidebar() {
		$mapid = $_GET['mapid'] ?? '';
		$mapidParam = $mapid ? "mapid=$mapid&" : '';
		$currentSection = $_GET['section'] ?? '';
		$sections = ['General', 'Terrain', 'Disabled Heroes', 'Custom Heroes', 'Map Heroes', 'Town Details',
					 'Artifacts', 'Spells', 'Seer\'s Huts', 'Quest Gates', 'Quest Guards', 'Global Events',
					 'Town Events', 'Pandora\'s Boxes', 'Event Objects', 'Object Count'];
		$sectionsWithAnchors = [
			'Custom Heroes' => 'heroes-table-2',
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
			'Object Count',
		];
		$sectionsWithHr2Below = [
			'Disabled Heroes',
			'Custom Heroes',
			'Artifacts',
			'Seer\'s Huts',
			'Quest Gates',
			'Global Events',
			'Pandora\'s Boxes',
		];

		$sidebar = '<div class="sidebarMain">';
		foreach ($sections as $section) {
			if($section === 'General') {
				// $sidebar .= HRULE1;
			}
			$selectedClass = $section === $currentSection ? 'selected' : '';
			$anchor = isset($sectionsWithAnchors[$section]) ? '#' . $sectionsWithAnchors[$section] : '';
			$sidebar .= "<a href=\"?{$mapidParam}section={$section}{$anchor}\" class=\"{$selectedClass}\">".ucfirst($section)."</a>";
			if(in_array($section, $sectionsWithHr1Below)) {
				$sidebar .= HRULE1;
			} else if(in_array($section, $sectionsWithHr2Below)) {
				$sidebar .= HRULE2;
			}
		}
		$sidebar .= '</div>
					<div class="content-container">';

		return $sidebar;
	}
}
