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
        return '<div class="sidebarMain">
					<a href="?'.$mapidParam.'section=general">General Info</a>
					<a href="?'.$mapidParam.'section=players">Players</a>
                    <a href="#mapimage">Map</a>
                    <a href="#terrain">Terrain</a>
                    <a href="#events">Events</a>
                    <a href="#heroescustom">Heroes custom</a>
                    <a href="#artdis">Disabled artifacts</a>
                    <a href="#spelldis">Disabled spells</a>
                    <a href="#skilldis">Disabled skills</a>
                    <a href="#towns">Towns</a>
                    <a href="#heroes">Heroes</a>
                    <a href="#artifacts">Artifacts</a>
                    <a href="#spells">Spells</a>
                    <a href="#mines">Mines</a>
                    <a href="#monsters">Monsters</a>
                    <a href="#quests">Quests</a>
                    <a href="#townevent">Town events</a>
                    <a href="#eventbox">Events and pandoras</a>
                    <a href="#signs">Signs and bottels</a>
                    <a href="#rumors">Rumors</a>
                    <a href="#keys">Keys and gates</a>
                    <a href="#monolith">Monoliths</a>
                    <a href="#objects">Objects</a>
                </div>
                <div class="content">';
    }
}
?>