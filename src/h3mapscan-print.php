<?php

class H3MAPSCAN_PRINT {

	public $h3mapscan;
    public function __construct($h3mapscan, $section) {
        $this->h3mapscan = $h3mapscan;
        $this->PrintMapInfo($section);
    }

	public $OBJCCS;

    private function PrintMapInfo($section) {
        $subrev = ($this->h3mapscan->version == $this->h3mapscan::HOTA) ? ' '.$this->h3mapscan->hota_subrev : '';
        $section = $_GET['section'] ?? 'general';

        switch ($section) {
            case 'General':
                include 'h3mapscan-print-general.php';
                break;
			case 'Terrain':
				include 'h3mapscan-print-terrain.php';
				break;
			case 'Disabled Heroes':
			case 'Template Heroes':
			case 'Map Heroes':
				include 'h3mapscan-print-heroes.php';
				break;
			case 'Global Events':
				include 'h3mapscan-print-globalevents.php';
				break;
			case 'Town Events':
				include 'h3mapscan-print-townevents.php';
				break;
			case 'Towns':
				include 'h3mapscan-print-towns.php';
				break;
			case 'Artifacts':
				include 'h3mapscan-print-artifactsoverview.php';
				break;
			case 'Spells':
				include 'h3mapscan-print-spellsoverview.php';
				break;
			case 'Seer\'s Huts':
				include 'h3mapscan-print-seers.php';
				break;
			case 'Quest Gates':
			case 'Quest Guards':
				include 'h3mapscan-print-questg.php';
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
			case 'Objects by Zone':
				include 'h3mapscan-print-objectsbyzone.php';
				break;
			case 'Minimap':
				include 'h3mapscan-print-minimap.php';
				break;
			case 'Unused Portraits':
				include 'h3mapscan-print-unusedportraits.php';
				break;
            default:
                include 'h3mapscan-print-general.php';
                break;
        }
    }
}
