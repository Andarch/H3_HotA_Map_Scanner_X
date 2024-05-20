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
            case 'general':
                include 'h3mapscan-print-general.php';
                break;
            case 'players':
                include 'h3mapscan-print-players.php';
                break;
			case 'map':
				include 'h3mapscan-print-map.php';
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
		$sections = ['general', 'players', 'map']; // add all your sections here
	
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