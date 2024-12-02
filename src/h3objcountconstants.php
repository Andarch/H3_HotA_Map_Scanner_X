<?php

    const OBJCOUNT_TABLECLASS = 'table-small';
    const START_FLEX = '<div class="flex-container">';
    const END_FLEX = '</div>';
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
            'Random Dwelling',
            'Dwelling',
            'Golem Factory',
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
