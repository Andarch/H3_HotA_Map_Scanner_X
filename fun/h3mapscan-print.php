<?php
//class to print h3mapscan data to html presentation
class H3MAPSCAN_PRINT {
    private $h3mapscan;
    public function __construct($h3mapscan, $section) {
        // Removed session_start() from here
        // Store the $h3mapscan object in the session
        $_SESSION['h3mapscan'] = $h3mapscan;
        $this->h3mapscan = $h3mapscan;
        $this->PrintMapInfo($section);
    }
    private function PrintMapInfo($section) {
        // Retrieve the $h3mapscan object from the session
        $this->h3mapscan = $_SESSION['h3mapscan'];
        $subrev = ($this->h3mapscan->version == $this->h3mapscan::HOTA) ? ' '.$this->h3mapscan->hota_subrev : '';
        $print = $this->generateSidebar();
        $section = $_GET['section'] ?? 'general';
        
        ob_start(); // Start output buffering
        switch ($section) {
            case 'General':
                include 'h3mapscan-print-general.php';
                break;
            case 'Players':
                include 'h3mapscan-print-players.php';
                break;
			case 'Map':
				include 'h3mapscan-print-map.php';
				break;
			case 'Heroes':
				include 'h3mapscan-print-heroes.php';
				break;
			case 'Disabled':
				include 'h3mapscan-print-disabled.php';
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
			case 'Quest Gates/Guards':
				include 'h3mapscan-print-questgates.php';
				break;
			case 'Town Events':
				include 'h3mapscan-print-townevents.php';
				break;
            default:
                include 'h3mapscan-print-general.php';
                break;
        }
        $print .= ob_get_clean(); // End output buffering and append the output to $print
        $print .= '</div>';
        echo $print;
    }

    private function generateSidebar() {
		$mapid = $_GET['mapid'] ?? '';
		$mapidParam = $mapid ? "mapid=$mapid&" : '';
		$currentSection = $_GET['section'] ?? '';
		$sections = ['General', 'Players', 'Map', 'Heroes', 'Disabled', 'Town Details', 'Artifacts', 'Spells', 'Seer\'s Huts', 'Quest Gates/Guards', 'Town Events']; // add all your sections here
	
		$sidebar = '<div class="sidebarMain">';
		foreach ($sections as $section) {
			$selectedClass = $section === $currentSection ? 'selected' : '';
			$sidebar .= "<a href=\"?{$mapidParam}section={$section}\" class=\"{$selectedClass}\">" . ucfirst($section) . "</a>";
		}
		$sidebar .= '</div><div class="content">';
	
		return $sidebar;
	}
}
?>