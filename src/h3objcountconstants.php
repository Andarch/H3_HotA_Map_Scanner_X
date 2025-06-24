<?php

    const OBJCOUNT_TABLECLASS = 'table-small';
    const OBJCOUNT_COLSPAN = '100';

    class OC_TABLETYPE {
        const NORMAL = 1;
        const BORDER = 2;
        const ONE_WAY_MONOLITH_PORTAL = 3;
        const TWO_WAY_MONOLITH_PORTAL = 4;
        const MINE_WAREHOUSE = 5;
    }

    class OC_FLEXTYPE {
        const NONE = 0;
        const START = 1;
        const END = 2;
    }

    class OC_Table {
        public $tableType;
        public $objects;
        public $category;
        public $customOrder;
        public $types;
        public $ids;
        public $flexType;
        public $special1;
        public $special2;
        public $special3;
        public $special4;
        public $special5;
        public $special6;

        public function __construct(
            $tableType = null,
            $objects = null,
            $category = null,
            $customOrder = [],
            $types = [],
            $typeCount = null,
            $ids = [],
            $flexType = OC_FLEXTYPE::NONE,
            $special1 = null,
            $special2 = null,
            $special3 = null,
            $special4 = null,
            $special5 = null,
            $special6 = null
        ) {
            $this->tableType = $tableType;
            $this->objects = $objects;
            $this->category = $category;
            $this->customOrder = $customOrder;
            $this->types = $types;
            $this->typeCount = $typeCount;
            $this->ids = $ids;
            $this->flexType = $flexType;
            $this->special1 = $special1;
            $this->special2 = $special2;
            $this->special3 = $special3;
            $this->special4 = $special4;
            $this->special5 = $special5;
            $this->special6 = $special6;
        }
    }

    class OC_Sort_Order {

		public $Towns = [
            'Random Town',
            'Castle',
            'Rampart',
            'Tower',
            'Inferno',
            'Necropolis',
            'Dungeon',
            'Stronghold',
            'Fortress',
            'Conflux',
            'Cove',
            'Factory',
        ];

        public $HeroesAndInfo = [
            'Random Hero',
            'Hero',
            'Prison',
            'Hero Camp',
            'Tavern',
            'Den of Thieves',
            'Sign',
            'Ocean Bottle',
        ];

        public $Monsters = [
            'Random Monster L1',
            'Random Monster L2',
            'Random Monster L3',
            'Random Monster L4',
            'Random Monster L5',
            'Random Monster L6',
            'Random Monster L7',
            'Random Monster',
            'Monster',
        ];

        public $KeymastersBorder = [
            'Light Blue',
            'Green',
            'Red',
            'Dark Blue',
            'Brown',
            'Purple',
            'White',
            'Black'
        ];

        public $OneWayMonoliths = [
            'Blue',
            'Pink',
            'Orange',
            'Yellow',
            'Turquoise',
            'Violet',
            'Chartreuse',
            'White'
        ];

        public $OneWayPortals = [
            'Purple',
            'Orange',
            'Red',
            'Cyan'
        ];

        public $TwoWayMonoliths = [
            'Green',
            'Brown',
            'Violet',
            'Orange',
            'Pink',
            'Turquoise',
            'Yellow',
            'Black',
            'Blue',
            'Red'
        ];

        public $TwoWayPortals = [
            'Green',
            'Yellow',
            'Red',
            'Cyan',
            'Chartreuse',
            'Turquoise',
            'Violet',
            'Orange',
            'Pink',
            'Blue'
        ];

        public $TwoWaySeaPortals = [
            'White',
            'Red',
            'Blue',
            'Chartreuse',
            'Yellow'
        ];

        public $OtherGateways = [
            'Subterranean Gate',
            'Town Gate',
            'Whirlpool',
        ];

        public $Mines = [
            'Sawmill',
            'Ore Pit',
            'Alchemist\'s Lab',
            'Sulfur Dune',
            'Crystal Cavern',
            'Gem Pond',
            'Gold Mine',
            'Abandoned Mine',
        ];

        public $Warehouses = [
            'Warehouse of Wood',
            'Warehouse of Ore',
            'Warehouse of Mercury',
            'Warehouse of Sulfur',
            'Warehouse of Crystal',
            'Warehouse of Gem',
            'Warehouse of Gold',
        ];

        public $ResourceTypes = [
            'Wood',
            'Ore',
            'Mercury',
            'Sulfur',
            'Crystal',
            'Gems',
            'Gold',
            'Abandoned'
        ];

        public $Dwellings = [
            'Random Dwelling – Level',
            'Random Dwelling – Faction',
            'Random Dwelling – All',
            'Dwelling',
            'Golem Factory',
            'Elemental Conflux',
            'Refugee Camp',
            'Ancient Lamp',
        ];

        public $DwellingsByLevel = [
            'Level 1',
            'Level 2',
            'Level 3',
            'Level 4',
            'Level 5',
            'Level 6',
            'Level 7',
        ];

        public $NeutralDwellings1 = [
            'Hovel',
            'Boar Glen',
            'Rogue Cavern',
            'Alehouse',
            'Tomb of Curses',
            'Nomad Tent',
            'Treetop Tower',
            'Wineyard',
        ];

        public $NeutralDwellings2 = [
            'Troll Bridge',
            'Ziggurat',
            'Enchanter\'s Hollow',
            'Magic Forest',
            'Sulfurous Lair',
            'Crystal Cave',
            'Frozen Cliffs',
        ];

        public $OtherDwellings = [
            'Random Dwelling – Level',
            'Random Dwelling – Faction',
            'Random Dwelling – All',
            'Elemental Conflux',
            'Refugee Camp',
            'Ancient Lamp',
        ];

        public $GarrisonsQuests = [
            'Garrison',
            'Anti-magic Garrison',
            'Quest Gate',
            'Quest Guard',
        ];

        public $WarMachinesAndUpgrades = [
            'War Machine Factory',
            'Cannon Yard',
            'Hill Fort – Original',
            'Hill Fort – HotA',
            'Skeleton Transformer',
        ];

        public $Trading = [
            'Trading Post',
            'Warlock\'s Lab',
            'Black Market',
            'Junkman',
            'Freelancer\'s Guild',
        ];

        public $CreatureBanksElite = [
            'Dragon Utopia',
            'Temple of the Sea',
            'Ancient Altar',
        ];

        public $CreatureBanksArtifacts = [
            'Beholders\' Sanctuary',
            'Black Tower',
            'Churchyard',
            'Crypt',
            'Derelict Ship',
            'Mansion',
            'Shipwreck',
        ];

        public $CreatureBanksResources = [
            'Cyclops Stockpile',
            'Dwarven Treasury',
            'Imp Cache',
            'Medusa Stores',
            'Naga Bank',
            'Ruins',
            'Spit',
        ];

        public $CreatureBanksCreatures = [
            'Dragon Fly Hive',
            'Experimental Shop',
            'Griffin Conservatory',
            'Ivory Tower',
            'Pirate Cavern',
            'Red Tower',
            'Wolf Raider Picket',
        ];

        public $BoatsAndAirships = [
            'Shipyard',
            'Boat',
            'Airship Yard',
            'Airship',
        ];

        public $PrimarySkills1 = [
            'Mercenary Camp',
            'Marletto Tower',
            'Star Axis',
            'Garden of Revelation',
        ];

        public $PrimarySkills2 = [
            'School of War',
            'School of Magic',
            'Arena',
            'Colosseum of the Magi',
            'Library of Enlightenment',
        ];

        public $SecondarySkills = [
            'Witch Hut',
            'Hermit\'s Shack',
            'University',
            'Seafaring Academy',
        ];

        public $XP = [
            'Learning Stone',
            'Gazebo',
            'Tree of Knowledge',
            'Altar of Sacrifice',
            'Sirens',
        ];

        public $Mana = [
            'Magic Well',
            'Magic Spring',
            'Vial of Mana',
            'Altar of Mana',
        ];

        public $MultiBonus = [
            'Rally Flag',
            'Idol of Fortune',
            'Fountain of Youth',
            'Mineral Spring',
            'Oasis',
            'Watering Hole',
        ];

        public $Movement = [
            'Stables',
            'Trailblazer',
            'Watering Place',
            'Lighthouse',
        ];

        public $Morale = [
            'Temple',
            'Buoy',
            'Temple of Loyalty',
        ];

        public $Luck = [
            'Faerie Ring',
            'Fountain of Fortune',
            'Swan Pond',
            'Mermaid',
        ];

        public $Special = [
            'Grail',
            'Obelisk',
            'Sanctuary',
            'Seer\'s Hut',
            'Pandora\'s Box',
            'Event Object',
        ];

        public $Spells = [
            'Shrine of Magic Incantation',
            'Shrine of Magic Gesture',
            'Shrine of Magic Thought',
            'Shrine of Magic Mystery',
            'Pyramid',
            'Spell Scroll',
        ];

        public $Artifacts = [
            'Random Treasure Artifact',
            'Random Minor Artifact',
            'Random Major Artifact',
            'Random Relic',
            'Random Artifact',
            'Artifact',
        ];

        public $Treasures = [
            'Treasure Chest',
            'Scholar',
            'Sea Chest',
            'Shipwreck Survivor',
            'Warrior\'s Tomb',
            'Wagon',
            'Corpse',
            'Grave',
        ];

        public $Resources1 = [
            'Random Resource',
            'Wood',
            'Ore',
            'Mercury',
            'Sulfur',
            'Crystal',
            'Gems',
            'Gold',
        ];

        public $Resources2 = [
            'Campfire',
            'Flotsam',
            'Jetsam',
            'Sea Barrel',
            'Lean To',
        ];

        public $ResourceGenerators = [
            'Windmill',
            'Water Wheel',
            'Mystical Garden',
            'Derrick',
            'Prospector',
        ];

        public $Scouting = [
            'Redwood Observatory',
            'Pillar of Fire',
            'Observation Tower',
            'Observatory',
            'Hut of the Magi',
            'Eye of the Magi',
            'Cover of Darkness',
            'Land Cartographer',
            'Subterranean Cartographer',
            'Sea Cartographer',
        ];

        public $MagicalTerrainsSpells = [
            'Magic Plains',
            'Cursed Ground',
            'Rocklands',
            'Fiery Fields',
            'Lucid Pools',
            'Magic Clouds',
        ];

        public $MagicalTerrainsBonuses = [
            'Holy Ground',
            'Evil Fog',
            'Clover Field',
            'Cracked Ice',
            'Dunes',
            'Fields of Glory',
            'Favorable Winds',
        ];
    }

class OC_Dwellings {
    public $Faction = [
        '17-56'  => ['level' => 1, 'name' => 'Guardhouse'],
        '17-57'  => ['level' => 2, 'name' => 'Archers\' Tower'],
        '17-25'  => ['level' => 3, 'name' => 'Griffin Tower'],
        '17-58'  => ['level' => 4, 'name' => 'Barracks'],
        '17-35'  => ['level' => 5, 'name' => 'Monastery'],
        '17-5'   => ['level' => 6, 'name' => 'Training Grounds'],
        '17-8'   => ['level' => 7, 'name' => 'Portal of Glory'],
        '17-6'   => ['level' => 1, 'name' => 'Centaur Stables'],
        '17-12'  => ['level' => 2, 'name' => 'Dwarf Cottage'],
        '17-15'  => ['level' => 3, 'name' => 'Homestead'],
        '17-50'  => ['level' => 4, 'name' => 'Enchanted Spring'],
        '17-45'  => ['level' => 5, 'name' => 'Dendroid Arches'],
        '17-51'  => ['level' => 6, 'name' => 'Unicorn Glade'],
        '17-68'  => ['level' => 6, 'name' => 'Unicorn Glade'],
        '17-24'  => ['level' => 7, 'name' => 'Dragon Cliffs'],
        '17-43'  => ['level' => 1, 'name' => 'Gremlin Workshop'],
        '17-17'  => ['level' => 2, 'name' => 'Parapet'],
        '20-1'   => ['level' => 3, 'name' => 'Golem Factory'],
        '17-31'  => ['level' => 4, 'name' => 'Mage Tower'],
        '17-18'  => ['level' => 5, 'name' => 'Altar of Wishes'],
        '17-36'  => ['level' => 6, 'name' => 'Golden Pavilion'],
        '17-44'  => ['level' => 7, 'name' => 'Cloud Temple'],
        '17-29'  => ['level' => 1, 'name' => 'Imp Crucible'],
        '17-22'  => ['level' => 2, 'name' => 'Hall of Sins'],
        '17-27'  => ['level' => 3, 'name' => 'Kennels'],
        '17-37'  => ['level' => 4, 'name' => 'Demon Gate'],
        '17-40'  => ['level' => 5, 'name' => 'Hell Hole'],
        '17-14'  => ['level' => 6, 'name' => 'Fire Lake'],
        '17-10'  => ['level' => 7, 'name' => 'Forsaken Palace'],
        '17-54'  => ['level' => 1, 'name' => 'Cursed Temple'],
        '17-55'  => ['level' => 2, 'name' => 'Graveyard'],
        '17-48'  => ['level' => 3, 'name' => 'Tomb of Souls'],
        '17-53'  => ['level' => 4, 'name' => 'Estate'],
        '17-52'  => ['level' => 5, 'name' => 'Mausoleum'],
        '17-3'   => ['level' => 6, 'name' => 'Hall of Darkness'],
        '17-4'   => ['level' => 7, 'name' => 'Dragon Vault'],
        '17-46'  => ['level' => 1, 'name' => 'Warren'],
        '17-26'  => ['level' => 2, 'name' => 'Harpy Loft'],
        '17-2'   => ['level' => 3, 'name' => 'Pillar of Eyes'],
        '17-33'  => ['level' => 4, 'name' => 'Chapel of Stilled Voices'],
        '17-34'  => ['level' => 5, 'name' => 'Labyrinth'],
        '17-32'  => ['level' => 6, 'name' => 'Manticore Lair'],
        '17-41'  => ['level' => 7, 'name' => 'Dragon Cave'],
        '17-21'  => ['level' => 1, 'name' => 'Goblin Barracks'],
        '17-19'  => ['level' => 2, 'name' => 'Wolf Pen'],
        '17-39'  => ['level' => 3, 'name' => 'Orc Tower'],
        '17-38'  => ['level' => 4, 'name' => 'Ogre Fort'],
        '17-42'  => ['level' => 5, 'name' => 'Cliff Nest'],
        '17-9'   => ['level' => 6, 'name' => 'Cyclops Cave'],
        '17-1'   => ['level' => 7, 'name' => 'Behemoth Lair'],
        '17-20'  => ['level' => 1, 'name' => 'Gnoll Hut'],
        '17-30'  => ['level' => 2, 'name' => 'Lizard Den'],
        '17-11'  => ['level' => 3, 'name' => 'Serpent Fly Hive'],
        '17-0'   => ['level' => 4, 'name' => 'Basilisk Pit'],
        '17-23'  => ['level' => 5, 'name' => 'Gorgon Lair'],
        '17-49'  => ['level' => 6, 'name' => 'Wyvern Nest'],
        '17-28'  => ['level' => 7, 'name' => 'Hydra Pond'],
        '17-59'  => ['level' => 1, 'name' => 'Magic Lantern'],
        '17-7'   => ['level' => 2, 'name' => 'Altar of Air'],
        '17-69'  => ['level' => 2, 'name' => 'Altar of Air'],
        '17-47'  => ['level' => 3, 'name' => 'Altar of Water'],
        '17-72'  => ['level' => 3, 'name' => 'Altar of Water'],
        '17-16'  => ['level' => 4, 'name' => 'Altar of Fire'],
        '17-71'  => ['level' => 4, 'name' => 'Altar of Fire'],
        '17-13'  => ['level' => 5, 'name' => 'Altar of Earth'],
        '17-70'  => ['level' => 5, 'name' => 'Altar of Earth'],
        '17-60'  => ['level' => 6, 'name' => 'Altar of Thought'],
        '17-61'  => ['level' => 7, 'name' => 'Pyre'],
        '17-92'  => ['level' => 1, 'name' => 'Nymph Waterfall'],
        '17-93'  => ['level' => 2, 'name' => 'Shack'],
        '17-94'  => ['level' => 3, 'name' => 'Frigate'],
        '17-95'  => ['level' => 4, 'name' => 'Nest'],
        '17-96'  => ['level' => 5, 'name' => 'Tower of the Seas'],
        '17-97'  => ['level' => 6, 'name' => 'Nix Fort'],
        '17-99'  => ['level' => 6, 'name' => 'Nix Fort'],
        '17-91'  => ['level' => 7, 'name' => 'Maelstrom'],
        '17-98'  => ['level' => 7, 'name' => 'Maelstrom'],
        '17-73'  => ['level' => 1, 'name' => 'Halfling Hut'],
        '17-103' => ['level' => 1, 'name' => 'Halfling Adobe'],
        '17-104' => ['level' => 2, 'name' => 'Foundry'],
        '17-105' => ['level' => 3, 'name' => 'Ranch'],
        '17-106' => ['level' => 4, 'name' => 'Manufactory'],
        '17-107' => ['level' => 5, 'name' => 'Catacombs'],
        '17-108' => ['level' => 6, 'name' => 'Watchtower'],
        '17-109' => ['level' => 7, 'name' => 'Serpentarium'],
        '17-110' => ['level' => 7, 'name' => 'Gantry'],
    ];

    public $FactionFlat = [
        'Level 1' => ['level' => 1, 'comboid' => '17-X'],
        'Level 2' => ['level' => 2, 'comboid' => '17-X'],
        'Level 3' => ['level' => 3, 'comboid' => '17-X'],
        'Level 4' => ['level' => 4, 'comboid' => '17-X'],
        'Level 5' => ['level' => 5, 'comboid' => '17-X'],
        'Level 6' => ['level' => 6, 'comboid' => '17-X'],
        'Level 7' => ['level' => 7, 'comboid' => '17-X'],
    ];

    public $Neutral = [
        '17-74'  => ['level' => 1, 'name' => 'Hovel'],
        '17-75'  => ['level' => 2, 'name' => 'Boar Glen'],
        '17-78'  => ['level' => 2, 'name' => 'Rogue Cavern'],
        '17-102' => ['level' => 2, 'name' => 'Alehouse'],
        '17-76'  => ['level' => 3, 'name' => 'Tomb of Curses'],
        '17-77'  => ['level' => 3, 'name' => 'Nomad Tent'],
        '17-67'  => ['level' => 4, 'name' => 'Treetop Tower'],
        '17-100' => ['level' => 4, 'name' => 'Wineyard'],
        '17-79'  => ['level' => 5, 'name' => 'Troll Bridge'],
        '17-101' => ['level' => 5, 'name' => 'Ziggurat'],
        '17-66'  => ['level' => 6, 'name' => 'Enchanter\'s Hollow'],
        '17-62'  => ['level' => 7, 'name' => 'Frozen Cliffs'],
        '17-63'  => ['level' => 7, 'name' => 'Crystal Cave'],
        '17-64'  => ['level' => 7, 'name' => 'Magic Forest'],
        '17-65'  => ['level' => 7, 'name' => 'Sulfurous Lair'],
    ];
}
