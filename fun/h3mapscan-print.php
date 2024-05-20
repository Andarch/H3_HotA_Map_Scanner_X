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
			case 'Map':
				include 'h3mapscan-print-map.php';
				break;
			case 'Heroes':
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
			case 'Quest Gates/Guards':
				include 'h3mapscan-print-questgates.php';
				break;
			case 'Town Events':
				include 'h3mapscan-print-townevents.php';
				break;
			case 'Event Objects':
				include 'h3mapscan-print-eventobjects.php';
				break;
			case 'Pandora\'s Boxes':
				include 'h3mapscan-print-pandoras.php';
				break;
			case 'Global Events':
				include 'h3mapscan-print-globalevents.php';
				break;
			case 'Keymaster\'s Tents':
				include 'h3mapscan-print-keymasters.php';
				break;
			case 'Monoliths/Portals':
				include 'h3mapscan-print-portals.php';
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

        echo $print;
		
		if($this->h3mapscan->maphtmcache) {
			file_write(MAPDIRINFO.str_ireplace('.h3m', '.htm', $this->h3mapscan->mapfile).'.gz', gzencode($print));
		}
    }

    private function generateSidebar() {
		$mapid = $_GET['mapid'] ?? '';
		$mapidParam = $mapid ? "mapid=$mapid&" : '';
		$currentSection = $_GET['section'] ?? '';
		$sections = ['General', 'Map', 'Heroes', 'Town Details', 'Artifacts', 'Spells', 
					 'Seer\'s Huts', 'Quest Gates/Guards', 'Town Events', 'Event Objects', 'Pandora\'s Boxes', 
					 'Global Events', 'Keymaster\'s Tents', 'Monoliths/Portals', 'Object Count'];
	
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