<?php

//global constants
const OWNERNONE = 0xfe;
const OWNNOONE = 0xff;
const OBJECT_INVALID = -1; //invalid object id
const COOR_INVALID = -1; //invalid coordinates
const HOTA_RANDOM = -1; //random chance in stuff

const PRIMARY_SKILLS = 4;
const SPELL_BYTE = 9;
const SECSKILL_BYTE = 4;
const RESOURCE_QUANTITY = 8;
const HEROES_PER_TYPE = 8; //amount of heroes of each type

const TILEBYTESIZE = 7;

const HEROES_QUANTITY = 156; //156 ? ROE,AB,SOD,WOG
const HEROES_QUANTITY_HOTA = 178; //HOTA
const SPELLS_QUANTITY = 70; //69 visible in editor
const MAX_TOWNS = 11; //original=9, HOTA=11

const PLAYERSNUM = 8;
const HNULL = 0;
const HNONE = 0xff; //general heroes NONE value
// const HNONE_TOWN = 0x1ff;
const HOTA_MONSTER_IDS = 151; //hota monster start index
const HOTA_ARTIFACTS_IDS = 141; //hota artifacts start index
const HNONE16 = 0xffff; //general heroes NONE value, 16 bit
const HNONE_UNKNOWN = 0x9d30302b;
const HNONE32 = 0xffffffff; //general heroes NONE value, 32 bit

const COMBOID_SEPARATOR = '<span style="color:grey;"> | </span>';
const ABANDONED_MINE_COMBOID = "53-7" . COMBOID_SEPARATOR . "220-X";
const CURSED_GROUND_COMBOID = "21-0" . COMBOID_SEPARATOR . "223-0";
const GARRISON_COMBOID = "33-0" . COMBOID_SEPARATOR . "219-0";
const AMGARRISON_COMBOID = "33-1" . COMBOID_SEPARATOR . "219-1";
const MAGIC_PLAINS_COMBOID = "46-0" . COMBOID_SEPARATOR . "230-0";
const TRADING_POST_COMBOID = "99-0" . COMBOID_SEPARATOR . "221-0";

const DEFAULT_DATA = '<span class="tiny-grey-italics">Default</span>';
const TEXT_COLUMN_WIDTH = "min-width: 300px;";

const EMPTY_DATA = '<span style="color: grey;">–</span>';

const START_FLEX = '<div class="flex-container">';
const END_FLEX = "</div>";

// if (!defined('EMPTY_DATA')) {
// 	require_once 'index.php';
// }

class OBJ_CATEGORY
{
    const ARTIFACTS = "Artifacts";
    const BOATS_AND_AIRSHIPS = "Boats & Airships";
    const BORDER_GATES = "Border Gates"; // Combined into KEYMASTERS_BORDER
    const BORDER_GUARDS = "Border Guards"; // Combined into KEYMASTERS_BORDER
    const CREATURE_BANKS_ARTIFACTS = "Creature Banks – Artifacts";
    const CREATURE_BANKS_CREATURES = "Creature Banks – Creatures";
    const CREATURE_BANKS_ELITE = "Creature Banks – Elite";
    const CREATURE_BANKS_RESOURCES = "Creature Banks – Resources";
    const DWELLINGS = "Dwellings";
    const FACTION_DWELLINGS_BY_LEVEL = "Faction Dwellings by Level";
    const GARRISONS_QUESTS = "Garrisons / Quests";
    const HEROES_AND_INFO = "Heroes & Info";
    const KEYMASTERS_BORDER = "Keymasters / Border";
    const KEYMASTERS_TENTS = 'Keymaster\'s Tents'; // Combined into KEYMASTERS_BORDER
    const LUCK = "Luck";
    const MAGICAL_TERRAINS_SPELLS = "Magical Terrains – Spells";
    const MAGICAL_TERRAINS_BONUSES = "Magical Terrains – Bonuses";
    const MANA = "Mana";
    const MINES = "Mines"; // Combined into MINES_AND_WAREHOUSES
    const MINES_AND_WAREHOUSES = "Mines & Warehouses";
    const MONSTERS = "Monsters";
    const MORALE = "Morale";
    const MOVEMENT = "Movement";
    const MULTI_BONUS = "Multi-Bonus";
    const NEUTRAL_DWELLINGS_1 = "Neutral Dwellings – Level 1-4";
    const NEUTRAL_DWELLINGS_2 = "Neutral Dwellings – Level 5-7";
    const ONE_WAY_MONOLITHS = "1-Way Monoliths";
    const ONE_WAY_MONOLITH_ENTRANCES = "1-Way Monolith Entrances"; // Combined into ONE_WAY_MONOLITHS
    const ONE_WAY_MONOLITH_EXITS = "1-Way Monolith Exits"; // Combined into ONE_WAY_MONOLITHS
    const ONE_WAY_PORTALS = "1-Way Portals";
    const ONE_WAY_PORTAL_ENTRANCES = "1-Way Portal Entrances"; // Combined into ONE_WAY_PORTALS
    const ONE_WAY_PORTAL_EXITS = "1-Way Portal Exits"; // Combined into ONE_WAY_PORTALS
    const OTHER_DWELLINGS = "Other Dwellings";
    const OTHER_GATEWAYS = "Other Gateways";
    const PRIMARY_SKILLS_1 = "Primary Skills 1";
    const PRIMARY_SKILLS_2 = "Primary Skills 2";
    const RESOURCES_1 = "Resources 1";
    const RESOURCES_2 = "Resources 2";
    const RESOURCE_GENERATORS = "Resource Generators";
    const SCOUTING = "Scouting";
    const SECONDARY_SKILLS = "Secondary Skills";
    const SPECIAL = "Special";
    const SPELLS = "Spells";
    const TOWNS = "Towns";
    const TRADING = "Trading";
    const TREASURES = "Treasures";
    const TWO_WAY_MONOLITHS = "2-Way Monoliths";
    const TWO_WAY_PORTALS = "2-Way Portals";
    const TWO_WAY_SEA_PORTALS = "2-Way Sea Portals";
    const WAREHOUSES = "Warehouses"; // Combined into MINES_AND_WAREHOUSES
    const WAR_MACHINES_AND_UPGRADES = "War Machines & Upgrades";
    const XP = "XP";
}

//constants classes
class MAPOBJECTS
{
    const NONE = 0;
    const HERO = 1;
    const TOWN = 2;
    const MONSTER = 3;
}

class MAPSPECIAL
{
    const NONE = 0;
    const MINE = 1;
    const ARTIFACT = 2;
    const MONSTER = 3;
    const ANY = 4;
}

class TILETYPE
{
    const FREE = 0;
    const POSSIBLE = 1;
    const BLOCKED = 2;
    const USED = 3;
    const ACCESSIBLE = 1;
}

class BLOCKMAPBITS
{
    const VISIBLE = 1; //free tile
    const VISITABLE = 2; //tile with object, that can be stepped on
    const BLOCKED = 4; //tile with inaccessible object
    const COMBINED = 6; //tile with any object, VISITABLE | BLOCKED
}

class TERRAIN
{
    //normal
    const DIRT = 0;
    const SAND = 1;
    const GRASS = 2;
    const SNOW = 3;
    const SWAMP = 4;
    const ROUGH = 5;
    const SUBTERAIN = 6;
    const LAVA = 7;
    const WATER = 8;
    const ROCK = 9;
    const HIGHLANDS = 10;
    const WASTELAND = 11;

    //blocked
    const BDIRT = 20;
    const BSAND = 21;
    const BGRASS = 22;
    const BSNOW = 23;
    const BSWAMP = 24;
    const BROUGH = 25;
    const BSUBTERAIN = 26;
    const BLAVA = 27;
    const BWATER = 28;
    const BROCK = 29;
    const BHIGHLANDS = 30;
    const BWASTELAND = 31;

    //players
    const RED = 40;
    const BLUE = 41;
    const TAN = 42;
    const GREEN = 43;
    const ORANGE = 44;
    const PURPLE = 45;
    const TEAL = 46;
    const PINK = 47;
    const NEUTRAL = 48;
    //special
    const NONE = 50;
    const MINE = 51;
    const ARTIFACT = 52;
    const MONSTER = 53;
    const ANY = 54;

    //offsets
    const OFFBLOCKED = 20;
    const OFFPLAYERS = 40;
    const OFFSPECIAL = 50;

    //count
    const TERRAINNUM = 12;
}

class IMAGETYPE
{
    const NORMAL = 1;
    const PASSABILITY = 2;
}

class VICTORY
{
    const ARTIFACT = 0;
    const ACCCREATURES = 1;
    const ACCRESOURCES = 2;
    const UPGRADETOWN = 3;
    const BUILDGRAIL = 4;
    const DEFEATHERO = 5;
    const CAPTURETOWN = 6;
    const KILLMONSTER = 7;
    const FLAGWELLINGS = 8;
    const FLAGMINES = 9;
    const TRANSPORTART = 10;
    const ELIMINATEMONSTERS = 11;
    const SURVIVETIME = 12;
    const NONE = 0xff;
}

class LOSS
{
    const TOWN = 0;
    const HERO = 1;
    const TIME = 2;
    const NONE = 0xff;
}

class OBJECTS
{
    const NO_OBJ = -1;
    const ALTAR_OF_SACRIFICE = 2;
    const ANCHOR_PO = 3;
    const ARENA = 4;
    const ARTIFACT = 5;
    const PANDORAS_BOX = 6;
    const BLACK_MARKET = 7;
    const TRANSPORTATION = 8;
    const BORDER_GUARD = 9;
    const KEYMASTER = 10;
    const BUOY = 11;
    const CAMPFIRE = 12;
    const CARTOGRAPHER = 13;
    const SWAN_POND = 14;
    const COVER_OF_DARKNESS = 15;
    const CREATURE_BANK = 16;
    const DWELLING_NORMAL = 17;
    const DWELLING_2 = 18;
    const DWELLING_3 = 19;
    const DWELLING_MULTI = 20;
    const CURSED_GROUND1 = 21;
    const CORPSE = 22;
    const MARLETTO_TOWER = 23;
    const DERELICT_SHIP = 24;
    const DRAGON_UTOPIA = 25;
    const EVENT = 26;
    const EYE_OF_MAGI = 27;
    const FAERIE_RING = 28;
    const FLOTSAM = 29;
    const FOUNTAIN_OF_FORTUNE = 30;
    const FOUNTAIN_OF_YOUTH = 31;
    const GARDEN_OF_REVELATION = 32;
    const GARRISON_HORIZONTAL = 33;
    const HERO = 34;
    const HILL_FORT = 35;
    const GRAIL = 36;
    const HUT_OF_MAGI = 37;
    const IDOL_OF_FORTUNE = 38;
    const LEAN_TO = 39;
    const LIBRARY_OF_ENLIGHTENMENT = 41;
    const LIGHTHOUSE = 42;
    const MONOLITH_PORTAL_ONE_WAY_ENTRANCE = 43;
    const MONOLITH_PORTAL_ONE_WAY_EXIT = 44;
    const MONOLITH_PORTAL_TWO_WAY = 45;
    const MAGIC_PLAINS1 = 46;
    const SCHOOL_OF_MAGIC = 47;
    const MAGIC_SPRING = 48;
    const MAGIC_WELL = 49;
    const MERCENARY_CAMP = 51;
    const MERMAID = 52;
    const MINE = 53;
    const MONSTER = 54;
    const MYSTICAL_GARDEN = 55;
    const OASIS = 56;
    const OBELISK = 57;
    const REDWOOD_OBSERVATORY = 58;
    const OCEAN_BOTTLE = 59;
    const PILLAR_OF_FIRE = 60;
    const STAR_AXIS = 61;
    const PRISON = 62;
    const PYRAMID = 63;
    const WOG_OBJECT = 63;
    const RALLY_FLAG = 64;
    const RANDOM_ART = 65;
    const RANDOM_TREASURE_ART = 66;
    const RANDOM_MINOR_ART = 67;
    const RANDOM_MAJOR_ART = 68;
    const RANDOM_RELIC_ART = 69;
    const RANDOM_HERO = 70;
    const RANDOM_MONSTER = 71;
    const RANDOM_MONSTER_L1 = 72;
    const RANDOM_MONSTER_L2 = 73;
    const RANDOM_MONSTER_L3 = 74;
    const RANDOM_MONSTER_L4 = 75;
    const RANDOM_RESOURCE = 76;
    const RANDOM_TOWN = 77;
    const REFUGEE_CAMP = 78;
    const RESOURCE = 79;
    const SANCTUARY = 80;
    const SCHOLAR = 81;
    const SEA_CHEST = 82;
    const SEER_HUT = 83;
    const CRYPT = 84;
    const SHIPWRECK = 85;
    const SHIPWRECK_SURVIVOR = 86;
    const SHIPYARD = 87;
    const SHRINE_OF_MAGIC_INCANTATION = 88;
    const SHRINE_OF_MAGIC_GESTURE = 89;
    const SHRINE_OF_MAGIC_THOUGHT = 90;
    const SIGN = 91;
    const SIRENS = 92;
    const SPELL_SCROLL = 93;
    const STABLES = 94;
    const TAVERN = 95;
    const TEMPLE = 96;
    const DEN_OF_THIEVES = 97;
    const TOWN = 98;
    const TRADING_POST = 99;
    const LEARNING_STONE = 100;
    const TREASURE_CHEST = 101;
    const TREE_OF_KNOWLEDGE = 102;
    const SUBTERRANEAN_GATE = 103;
    const UNIVERSITY = 104;
    const WAGON = 105;
    const WAR_MACHINE_FACTORY = 106;
    const SCHOOL_OF_WAR = 107;
    const WARRIORS_TOMB = 108;
    const WATER_WHEEL = 109;
    const WATERING_HOLE = 110;
    const WHIRLPOOL = 111;
    const WINDMILL = 112;
    const WITCH_HUT = 113;
    const HOLE = 124;
    const MISC_OBJECTS_1 = 144;
    const MISC_COLLECTIBLES = 145;
    const MISC_OBJECTS_2 = 146;
    const RANDOM_MONSTER_L5 = 162;
    const RANDOM_MONSTER_L6 = 163;
    const RANDOM_MONSTER_L7 = 164;
    const MISC_OBJECTS_3 = 212;
    const FREELANCERS_GUILD = 213;
    const HERO_PLACEHOLDER = 214;
    const QUEST_GUARD = 215;
    const RANDOM_DWELLING = 216;
    const RANDOM_DWELLING_LVL = 217;
    const RANDOM_DWELLING_FACTION = 218;
    const GARRISON_VERTICAL = 219;
    const ABANDONED_MINE_2 = 220;
    const TRADING_POST_SNOW = 221;
    const CLOVER_FIELD = 222;
    const CURSED_GROUND2 = 223;
    const EVIL_FOG = 224;
    const FAVORABLE_WINDS = 225;
    const FIERY_FIELDS = 226;
    const HOLY_GROUNDS = 227;
    const LUCID_POOLS = 228;
    const MAGIC_CLOUDS = 229;
    const MAGIC_PLAINS2 = 230;
    const ROCKLANDS = 231;
}

class TRANSPORTATION
{
    const BOAT0 = 0;
    const BOAT1 = 1;
    const BOAT2 = 2;
    const BOAT3 = 3;
    const BOAT4 = 4;
    const BOAT5 = 5;
    const AIRSHIP = 100;
}

class MISC_COLLECTIBLES
{
    const ANCIENT_LAMP = 0;
    const SEA_BARREL = 1;
    const JETSAM = 2;
    const VIAL_OF_MANA = 3;
}

class MISC_OBJECTS_1
{
    const TEMPLE_OF_LOYALTY = 0;
    const SKELETON_TRANSFORMER = 1;
    const COLOSSEUM_OF_THE_MAGI = 2;
    const WATERING_PLACE = 3;
    const MINERAL_SPRING = 4;
    const HERMITS_SHACK = 5;
    const GAZEBO = 6;
    const JUNKMAN = 7;
    const DERRICK = 8;
    const WARLOCKS_LAB = 9;
    const PROSPECTOR = 10;
    const TRAILBLAZER = 11;
}

class MISC_OBJECTS_2
{
    const SEAFARING_ACADEMY = 0;
    const OBSERVATORY = 1;
    const ALTAR_OF_MANA = 2;
    const TOWN_GATE = 3;
    const ANCIENT_ALTAR = 4;
}

class MISC_OBJECTS_3
{
    const BORDER_GATE_LIGHTBLUE = 0;
    const BORDER_GATE_GREEN = 1;
    const BORDER_GATE_RED = 2;
    const BORDER_GATE_DARKBLUE = 3;
    const BORDER_GATE_BROWN = 4;
    const BORDER_GATE_PURPLE = 5;
    const BORDER_GATE_WHITE = 6;
    const BORDER_GATE_BLACK = 7;
    const QUEST_GATE = 1000;
    const GRAVE = 1001;
}

class MINES
{
    const SAWMILL = 0;
    const ALCHEMISTS_LAB = 1;
    const ORE_PIT = 2;
    const SULFUR_DUNE = 3;
    const CRYSTAL_CAVERN = 4;
    const GEM_POND = 5;
    const GOLD_MINE = 6;
    const ABANDONED_MINE_1 = 7;
}

//quests
class REWARDTYPE
{
    const NOTHING = 0;
    const EXPERIENCE = 1;
    const MANA_POINTS = 2;
    const MORALE_BONUS = 3;
    const LUCK_BONUS = 4;
    const RESOURCES = 5;
    const PRIMARY_SKILL = 6;
    const SECONDARY_SKILL = 7;
    const ARTIFACT = 8;
    const SPELL = 9;
    const CREATURE = 10;
}

class QUESTMISSION
{
    const NONE = 0;
    const LEVEL = 1;
    const PRIMARY_STAT = 2;
    const KILL_HERO = 3;
    const KILL_CREATURE = 4;
    const ART = 5;
    const ARMY = 6;
    const RESOURCES = 7;
    const HERO = 8;
    const PLAYER = 9;
    const KEYMASTER = 10;
    const HOTA_EXTRA = 10;
    const HOTA_CLASS = 0;
    const HOTA_NOTBEFORE = 1;
    const HOTA_DIFFICULTY = 2;
}

//constants class with items names
class HeroesConstants
{
    public $PlayersColors = [
        0 => "Red",
        1 => "Blue",
        2 => "Tan",
        3 => "Green",
        4 => "Orange",
        5 => "Purple",
        6 => "Teal",
        7 => "Pink",
        255 => "Neutral"
        // 999 => "Super",
    ];

    public $PrimarySkill = [
        0 => "Attack",
        1 => "Defense",
        2 => "Spell Power",
        3 => "Knowledge",
        4 => "Experience",
    ];

    public $SecondarySkill = [
        -1 => "Default",
        0 => "Pathfinding",
        1 => "Archery",
        2 => "Logistics",
        3 => "Scouting",
        4 => "Diplomacy",
        5 => "Navigation",
        6 => "Leadership",
        7 => "Wisdom",
        8 => "Mysticism",
        9 => "Luck",
        10 => "Ballistics",
        11 => "Eagle Eye",
        12 => "Necromancy",
        13 => "Estates",
        14 => "Fire Magic",
        15 => "Air Magic",
        16 => "Water Magic",
        17 => "Earth Magic",
        18 => "Scholar",
        19 => "Tactics",
        20 => "Artillery",
        21 => "Learning",
        22 => "Offense",
        23 => "Armorer",
        24 => "Intelligence",
        25 => "Sorcery",
        26 => "Resistance",
        27 => "First Aid",
        28 => "Interference", //hota
    ];

    public $Alignment = [
        0 => "GOOD",
        1 => "EVIL",
        2 => "NEUTRAL",
    ];

    public $TownType = [
        -1 => "Any",
        0 => "Castle",
        1 => "Rampart",
        2 => "Tower",
        3 => "Inferno",
        4 => "Necropolis",
        5 => "Dungeon",
        6 => "Stronghold",
        7 => "Fortress",
        8 => "Conflux",
        9 => "Cove",
        10 => "Factory",
    ];

    public $Affiliation = [
        0 => "Castle",
        1 => "Rampart",
        2 => "Tower",
        3 => "Inferno",
        4 => "Necropolis",
        5 => "Dungeon",
        6 => "Stronghold",
        7 => "Fortress",
        8 => "Conflux",
        9 => "Cove",
        10 => "Factory",
        255 => "Random",
    ];

    public $AiTactic = [
        -1 => "NONE",
        0 => "RANDOM",
        1 => "WARRIOR",
        2 => "BUILDER",
        3 => "EXPLORER",
    ];

    public $TileType = [
        TILETYPE::FREE => "Free",
        TILETYPE::POSSIBLE => "Possible",
        TILETYPE::BLOCKED => "Blocked",
        TILETYPE::USED => "Used",
    ];

    //unused, but maybe in future
    /*
        public $TeleportChannelType = [
            0 => 'IMPASSABLE',
            1 => 'BIDIRECTIONAL',
            2 => 'UNIDIRECTIONAL',
            3 => 'MIXED',
        ];

        public $RiverType = [
            0 => 'NO RIVER',
            1 => 'CLEAR RIVER',
            2 => 'ICY RIVER',
            3 => 'MUDDY RIVER',
            4 => 'LAVA RIVER',
        ];

        public $RoadType = [
            0 => 'NO ROAD',
            1 => 'DIRT ROAD',
            2 => 'GRAVEL ROAD',
            3 => 'COBBLESTONE ROAD',
        ];

        public $SpellSchool = [
            0 => 'AIR',
            1 => 'FIRE',
            2 => 'WATER',
            3 => 'EARTH'
        ];
        */

    public $SecSkillLevel = [
        0 => "None",
        1 => "Basic",
        2 => "Advanced",
        3 => "Expert",
    ];

    public $TerrainType = [
        0 => "Dirt",
        1 => "Sand",
        2 => "Grass",
        3 => "Snow",
        4 => "Swamp",
        5 => "Rough",
        6 => "Subterranean",
        7 => "Lava",
        8 => "Water",
        9 => "Rock",
        10 => "Highlands",
        11 => "Wasteland",
    ];

    public $ArtifactPosition = [
        -2 => "First available",
        -1 => "Pre first", //sometimes used as error, sometimes as first free in backpack
        0 => "Helmet",
        1 => "Cape",
        2 => "Necklace",
        3 => "Right Hand",
        4 => "Left Hand",
        5 => "Torso",
        6 => "Right Ring",
        7 => "Left Ring",
        8 => "Feet",
        9 => "Misc. 1",
        10 => "Misc. 2",
        11 => "Misc. 3",
        12 => "Misc. 4",
        13 => "War Machine",
        14 => "War Machine",
        15 => "War Machine",
        16 => "Catapult",
        17 => "Spell Book",
        18 => "Misc. 5",
        19 => "Backpack",
    ];

    public $SpellID = [
        -2 => "Preset",
        -1 => "None",
        0 => "Summon Boat",
        1 => "Scuttle Boat",
        2 => "Visions",
        3 => "View Earth",
        4 => "Disguise",
        5 => "View Air",
        6 => "Fly",
        7 => "Water Walk",
        8 => "Dimension Door",
        9 => "Town Portal",
        10 => "Quicksand",
        11 => "Land Mine",
        12 => "Force Field",
        13 => "Fire Wall",
        14 => "Earthquake",
        15 => "Magic Arrow",
        16 => "Ice Bolt",
        17 => "Lightning Bolt",
        18 => "Implosion",
        19 => "Chain Lightning",
        20 => "Frost Ring",
        21 => "Fireball",
        22 => "Inferno",
        23 => "Meteor Shower",
        24 => "Death Ripple",
        25 => "Destroy Undead",
        26 => "Armageddon",
        27 => "Shield",
        28 => "Air Shield",
        29 => "Fire Shield",
        30 => "Protection From Air",
        31 => "Protection From Fire",
        32 => "Protection From Water",
        33 => "Protection From Earth",
        34 => "Anti-Magic",
        35 => "Dispel",
        36 => "Magic Mirror",
        37 => "Cure",
        38 => "Resurrection",
        39 => "Animate Dead",
        40 => "Sacrifice",
        41 => "Bless",
        42 => "Curse",
        43 => "Bloodlust",
        44 => "Precision",
        45 => "Weakness",
        46 => "Stone Skin",
        47 => "Disrupting Ray",
        48 => "Prayer",
        49 => "Mirth",
        50 => "Sorrow",
        51 => "Fortune",
        52 => "Misfortune",
        53 => "Haste",
        54 => "Slow",
        55 => "Slayer",
        56 => "Frenzy",
        57 => "Titans Lightning Bolt",
        58 => "Counterstrike",
        59 => "Berserk",
        60 => "Hypnotize",
        61 => "Forgetfulness",
        62 => "Blind",
        63 => "Teleport",
        64 => "Remove Obstacle",
        65 => "Clone",
        66 => "Summon Fire Elemental",
        67 => "Summon Earth Elemental",
        68 => "Summon Water Elemental",
        69 => "Summon Air Elemental",
        70 => "First Non Spell",
        71 => "Poison",
        72 => "Bind",
        73 => "Disease",
        74 => "Paralyze",
        75 => "Age",
        76 => "Death Cloud",
        77 => "Thunderbolt",
        78 => "Dispel Helpful Spells",
        79 => "Death Stare",
        80 => "Acid Breath Defense",
        81 => "Acid Breath Damage",
        82 => "After Last",
        255 => "Random - 1 Byte",
        4294967295 => "Random - 4 Bytes",
    ];

    //full defines of obj, monsters, heroes
    public $Monster = [
        0 => "Pikeman",
        1 => "Halberdier",
        2 => "Archer",
        3 => "Marksman",
        4 => "Griffin",
        5 => "Royal Griffin",
        6 => "Swordsman",
        7 => "Crusader",
        8 => "Monk",
        9 => "Zealot",
        10 => "Cavalier",
        11 => "Champion",
        12 => "Angel",
        13 => "Archangel",
        14 => "Centaur",
        15 => "Centaur Captain",
        16 => "Dwarf",
        17 => "Battle Dwarf",
        18 => "Wood Elf",
        19 => "Grand Elf",
        20 => "Pegasus",
        21 => "Silver Pegasus",
        22 => "Dendroid Guard",
        23 => "Dendroid Soldier",
        24 => "Unicorn",
        25 => "War Unicorn",
        26 => "Green Dragon",
        27 => "Gold Dragon",
        28 => "Gremlin",
        29 => "Master Gremlin",
        30 => "Stone Gargoyle",
        31 => "Obsidian Gargoyle",
        32 => "Stone Golem",
        33 => "Iron Golem",
        34 => "Mage",
        35 => "Arch Mage",
        36 => "Genie",
        37 => "Master Genie",
        38 => "Naga",
        39 => "Naga Queen",
        40 => "Giant",
        41 => "Titan",
        42 => "Imp",
        43 => "Familiar",
        44 => "Gog",
        45 => "Magog",
        46 => "Hell Hound",
        47 => "Cerberus",
        48 => "Demon",
        49 => "Horned Demon",
        50 => "Pit Fiend",
        51 => "Pit Lord",
        52 => "Efreeti",
        53 => "Efreet Sultan",
        54 => "Devil",
        55 => "Arch Devil",
        56 => "Skeleton",
        57 => "Skeleton Warrior",
        58 => "Walking Dead",
        59 => "Zombie",
        60 => "Wight",
        61 => "Wraith",
        62 => "Vampire",
        63 => "Vampire Lord",
        64 => "Lich",
        65 => "Power Lich",
        66 => "Black Knight",
        67 => "Dread Knight",
        68 => "Bone Dragon",
        69 => "Ghost Dragon",
        70 => "Troglodyte",
        71 => "Infernal Troglodyte",
        72 => "Harpy",
        73 => "Harpy Hag",
        74 => "Beholder",
        75 => "Evil Eye",
        76 => "Medusa",
        77 => "Medusa Queen",
        78 => "Minotaur",
        79 => "Minotaur King",
        80 => "Manticore",
        81 => "Scorpicore",
        82 => "Red Dragon",
        83 => "Black Dragon",
        84 => "Goblin",
        85 => "Hobgoblin",
        86 => "Wolf Rider",
        87 => "Wolf Raider",
        88 => "Orc",
        89 => "Orc Chieftain",
        90 => "Ogre",
        91 => "Ogre Mage",
        92 => "Roc",
        93 => "Thunderbird",
        94 => "Cyclops",
        95 => "Cyclops King",
        96 => "Behemoth",
        97 => "Ancient Behemoth",
        98 => "Gnoll",
        99 => "Gnoll Marauder",
        100 => "Lizardman",
        101 => "Lizard Warrior",
        102 => "Gorgon",
        103 => "Mighty Gorgon",
        104 => "Serpent Fly",
        105 => "Dragon Fly",
        106 => "Basilisk",
        107 => "Greater Basilisk",
        108 => "Wyvern",
        109 => "Wyvern Monarch",
        110 => "Hydra",
        111 => "Chaos Hydra",
        112 => "Air Elemental",
        113 => "Earth Elemental",
        114 => "Fire Elemental",
        115 => "Water Elemental",
        116 => "Gold Golem",
        117 => "Diamond Golem",
        118 => "Pixie",
        119 => "Sprite",
        120 => "Psychic Elemental",
        121 => "Magic Elemental",
        122 => "NOT USED (attacker)",
        123 => "Ice Elemental",
        124 => "NOT USED (defender)",
        125 => "Magma Elemental",
        126 => "NOT USED (3)",
        127 => "Storm Elemental",
        128 => "NOT USED (4)",
        129 => "Energy Elemental",
        130 => "Firebird",
        131 => "Phoenix",
        132 => "Azure Dragon",
        133 => "Crystal Dragon",
        134 => "Faerie Dragon",
        135 => "Rust Dragon",
        136 => "Enchanter",
        137 => "Sharpshooter",
        138 => "Halfling",
        139 => "Peasant",
        140 => "Boar",
        141 => "Mummy",
        142 => "Nomad",
        143 => "Rogue",
        144 => "Troll",
        145 => "Catapult",
        146 => "Ballista",
        147 => "First Aid Tent",
        148 => "Ammo Cart",
        149 => "Arrow Towers",
        //WOG
        //  150 => 'Supreme Archangel',
        //  151 => 'Diamond Dragon',
        //  152 => 'Lord of Thunder',
        //  153 => 'Antichrist',
        //  154 => 'Blood Dragon',
        //  155 => 'Darkness Dragon',
        //  156 => 'Ghost Behemoth',
        //  157 => 'Hell Hydra',
        //  158 => 'Sacred Phoenix',
        //  159 => 'Ghost',
        //  160 => 'Emissary of War',
        //  161 => 'Emissary of Peace',
        //  162 => 'Emissary of Mana',
        //  163 => 'Emissary of Lore',
        //  164 => 'Fire Messenger',
        //  165 => 'Earth Messenger',
        //  166 => 'Air Messenger',
        //  167 => 'Water Messenger',
        //  168 => 'Gorynych',
        //  169 => 'War zealot',
        //  170 => 'Arctic Sharpshooter',
        //  171 => 'Lava Sharpshooter',
        //  172 => 'Nightmare',
        //  173 => 'Santa Gremlin',
        //  174 => 'Paladin (attacker)',
        //  175 => 'Hierophant (attacker)',
        //  176 => 'Temple Guardian (attacker)',
        //  177 => 'Succubus (attacker)',
        //  178 => 'Soul Eater (attacker)',
        //  179 => 'Brute (attacker)',
        //  180 => 'Ogre Leader (attacker)',
        //  181 => 'Shaman (attacker)',
        //  182 => 'Astral Spirit (attacker)',
        //  183 => 'Paladin (defender)',
        //  184 => 'Hierophant (defender)',
        //  185 => 'Temple Guardian (defender)',
        //  186 => 'Succubus (defender)',
        //  187 => 'Soul Eater (defender)',
        //  188 => 'Brute (defender)',
        //  189 => 'Ogre Leader (defender)',
        //  190 => 'Shaman (defender)',
        //  191 => 'Astral Spirit (defender)',
        //  192 => 'Sylvan Centaur',
        //  193 => 'Sorceress',
        //  194 => 'Werewolf',
        //  195 => 'Hell Steed',
        //  196 => 'Dracolich',
        1000 => "Random lvl 1",
        1001 => "Random lvl 1 Upg",
        1002 => "Random lvl 2",
        1003 => "Random lvl 2 Upg",
        1004 => "Random lvl 3",
        1005 => "Random lvl 3 Upg",
        1006 => "Random lvl 4",
        1007 => "Random lvl 4 Upg",
        1008 => "Random lvl 5",
        1009 => "Random lvl 5 Upg",
        1010 => "Random lvl 6",
        1011 => "Random lvl 6 Upg",
        1012 => "Random lvl 7",
        1013 => "Random lvl 7 Upg",
    ];

    //HOTA
    public $MonsterHota = [
        151 => "Sea Dog",
        153 => "Nymph",
        154 => "Oceanid",
        155 => "Crew Mate",
        156 => "Seaman",
        157 => "Pirate",
        158 => "Corsair",
        159 => "Stormbird",
        160 => "Ayssid",
        161 => "Sea Witch",
        162 => "Sorceress",
        163 => "Nix",
        164 => "Nix Warrior",
        165 => "Sea Serpent",
        166 => "Haspid",
        167 => "Satyr",
        168 => "Fangarm",
        169 => "Leprechaun",
        170 => "Steel Golem",
        //138 => 'Halfling',
        171 => "Halfling Grenadier",
        172 => "Mechanic",
        173 => "Engineer",
        174 => "Armadillo",
        175 => "Bellwether Armadillo",
        176 => "Automaton",
        177 => "Sentinel Automaton",
        178 => "Sandworm",
        179 => "Olgoi-Khorkhoi",
        180 => "Gunslinger",
        181 => "Bounty Hunter",
        182 => "Couatl",
        183 => "Crimson Couatl",
        184 => "Dreadnought",
        185 => "Juggernaut",
        255 => "Random",
    ];

    //array with monster indexes for town events
    public $TownUnits = [
        [0, 2, 4, 6, 8, 10, 12], //castle
        [14, 16, 18, 20, 22, 24, 26], //rampart
        [28, 30, 32, 34, 36, 38, 40], //tower
        [42, 44, 46, 48, 50, 52, 54], //inferno
        [56, 58, 60, 62, 64, 66, 68], //necropolis
        [70, 72, 74, 76, 78, 80, 82], //dungeon
        [84, 86, 88, 90, 92, 94, 96], //stronghold
        [98, 100, 102, 104, 106, 108, 110], //fortress
        [118, 112, 115, 114, 113, 120, 130], //conflux
        [153, 155, 157, 159, 161, 163, 165], //cove
        [171, 173, 175, 177, 179, 181, 183, 185], //factory, 8 unit types
    ];

    public $monchar = [
        0 => "Compliant",
        1 => "Friendly",
        2 => "Aggressive",
        3 => "Hostile",
        4 => "Savage",
        5 => "Precise",
    ];

    public $Objects = [
        0 => null,
        1 => null,
        2 => "Altar of Sacrifice",
        3 => "OMITTED",
        4 => "Arena",
        5 => "Artifact",
        6 => 'Pandora\'s Box',
        7 => "Black Market",
        8 => [
            -1 => "Transportation",
            0 => "Boat",
            1 => "Boat",
            2 => "Boat",
            3 => "Boat",
            4 => "Boat",
            5 => "Boat",
            100 => "Airship",
        ],
        9 => [
            -1 => "Border Guards",
            0 => "Border Guard – Light Blue",
            1 => "Border Guard – Green",
            2 => "Border Guard – Red",
            3 => "Border Guard – Dark Blue",
            4 => "Border Guard – Brown",
            5 => "Border Guard – Purple",
            6 => "Border Guard – White",
            7 => "Border Guard – Black",
        ],
        10 => [
            -1 => 'Keymaster\'s Tents',
            0 => 'Keymaster\'s Tent – Light Blue',
            1 => 'Keymaster\'s Tent – Green',
            2 => 'Keymaster\'s Tent – Red',
            3 => 'Keymaster\'s Tent – Dark Blue',
            4 => 'Keymaster\'s Tent – Brown',
            5 => 'Keymaster\'s Tent – Purple',
            6 => 'Keymaster\'s Tent – White',
            7 => 'Keymaster\'s Tent – Black',
        ],
        11 => "Buoy",
        12 => "Campfire",
        13 => [
            -1 => "Shroud",
            0 => "Cartographer – Water",
            1 => "Cartographer – Land",
            2 => "Cartographer – Subterranean",
        ],
        14 => "Swan Pond",
        15 => "Cover of Darkness",
        16 => [
            -1 => "Creature Banks",
            0 => "Cyclops Stockpile",
            1 => "Dwarven Treasury",
            2 => "Griffin Conservatory",
            3 => "Imp Cache",
            4 => "Medusa Stores",
            5 => "Naga Bank",
            6 => "Dragon Fly Hive",
            7 => "Shipwreck",
            8 => "Derelict Ship",
            9 => "Crypt",
            10 => "Dragon Utopia",
            21 => 'Beholders\' Sanctuary',
            22 => "Temple of the Sea",
            23 => "Pirate Cavern",
            24 => "Mansion",
            25 => "Spit",
            26 => "Red Tower",
            27 => "Black Tower",
            28 => "Ivory Tower",
            29 => "Churchyard",
            30 => "Experimental Shop",
            31 => "Wolf Raider Picket",
            32 => "Ruins",
        ],
        17 => "Dwellings", // Normal
        18 => "Dwellings 2",
        19 => "Dwellings 3",
        20 => [
            -1 => "Dwellings", // Multi
            0 => "Dwelling – Elemental Conflux",
            1 => "Dwelling – Golem Factory",
        ],
        21 => "Cursed Ground",
        22 => "Corpse",
        23 => "Marletto Tower",
        24 => "Derelict Ship",
        25 => "Dragon Utopia",
        26 => "Event Object",
        27 => "Eye of the Magi",
        28 => "Faerie Ring",
        29 => "Flotsam",
        30 => "Fountain of Fortune",
        31 => "Fountain of Youth",
        32 => "Garden of Revelation",
        33 => [
            -1 => "Garrisons", // Horizontal
            0 => "Garrison – Normal",
            1 => "Garrison – Anti-magic",
        ],
        34 => "Hero",
        35 => [
            -1 => "Other",
            0 => "Hill Fort – Original",
            1 => "Hill Fort – HotA",
        ],
        36 => "Grail",
        37 => "Hut of the Magi",
        38 => "Idol of Fortune",
        39 => "Lean To",
        40 => null,
        41 => "Library of Enlightenment",
        42 => "Lighthouse",
        43 => [
            -1 => "Monoliths/Portals – One-Way", // Entrances
            0 => "Monolith – Blue One-Way Entrance",
            1 => "Monolith – Pink One-Way Entrance",
            2 => "Monolith – Orange One-Way Entrance",
            3 => "Monolith – Yellow One-Way Entrance",
            4 => "Portal – Purple One-Way Entrance",
            5 => "Portal – Orange One-Way Entrance",
            6 => "Portal – Red One-Way Entrance",
            7 => "Portal – Cyan One-Way Entrance",
            8 => "Monolith – Turquoise One-Way Entrance",
            9 => "Monolith – Violet One-Way Entrance",
            10 => "Monolith – Chartreuse One-Way Entrance",
            11 => "Monolith – White One-Way Entrance",
        ],
        44 => [
            -1 => "Monoliths/Portals – One-Way", // Exits
            0 => "Monolith – Blue One-Way Exit",
            1 => "Monolith – Pink One-Way Exit",
            2 => "Monolith – Orange One-Way Exit",
            3 => "Monolith – Yellow One-Way Exit",
            4 => "Portal – Purple One-Way Exit",
            5 => "Portal – Orange One-Way Exit",
            6 => "Portal – Red One-Way Exit",
            7 => "Portal – Cyan One-Way Exit",
            8 => "Monolith – Turquoise One-Way Exit",
            9 => "Monolith – Violet One-Way Exit",
            10 => "Monolith – Chartreuse One-Way Exit",
            11 => "Monolith – White One-Way Exit",
        ],
        45 => [
            -1 => "Monoliths/Portals – Two-Way",
            0 => "Monolith – Green Two-Way",
            1 => "Monolith – Brown Two-Way",
            2 => "Monolith – Violet Two-Way",
            3 => "Monolith – Orange Two-Way",
            4 => "Portal – Green Two-Way",
            5 => "Portal – Yellow Two-Way",
            6 => "Portal – Red Two-Way",
            7 => "Portal – Cyan Two-Way",
            8 => "Water Portal – White Two-Way",
            9 => "Monolith – Pink Two-Way",
            10 => "Monolith – Turquoise Two-Way",
            11 => "Monolith – Yellow Two-Way",
            12 => "Monolith – Black Two-Way",
            13 => "Portal – Chartreuse Two-Way",
            14 => "Portal – Turquoise Two-Way",
            15 => "Portal – Violet Two-Way",
            16 => "Portal – Orange Two-Way",
            17 => "Monolith – Blue Two-Way",
            18 => "Monolith – Red Two-Way",
            19 => "Portal – Pink Two-Way",
            20 => "Portal – Blue Two-Way",
            21 => "Water Portal – Red Two-Way",
            22 => "Water Portal – Blue Two-Way",
            23 => "Water Portal – Chartreuse Two-Way",
            24 => "Water Portal – Yellow Two-Way",
        ],
        46 => "Magic Plains",
        47 => "School of Magic",
        48 => "Magic Spring",
        49 => "Magic Well",
        50 => null,
        51 => "Mercenary Camp",
        52 => "Mermaid",
        53 => [
            -1 => "Mines",
            0 => "Sawmill",
            1 => 'Alchemist\'s Lab',
            2 => "Ore Pit",
            3 => "Sulfur Dune",
            4 => "Crystal Cavern",
            5 => "Gem Pond",
            6 => "Gold Mine",
            7 => "Abandoned Mine",
        ],
        54 => "Monster",
        55 => "Mystical Garden",
        56 => "Oasis",
        57 => "Obelisk",
        58 => [
            -1 => "Shroud",
            0 => "Redwood Observatory",
            1 => "Observation Tower",
        ],
        59 => "Ocean Bottle",
        60 => "Pillar of Fire",
        61 => "Star Axis",
        62 => [
            -1 => "Prisons",
            0 => "Prison",
            1 => "Hero Camp",
        ],
        63 => "Pyramid",
        64 => "Rally Flag",
        65 => "Random Artifact",
        66 => "Random Treasure Artifact",
        67 => "Random Minor Artifact",
        68 => "Random Major Artifact",
        69 => "Random Relic",
        70 => "Random Hero",
        71 => "Random Monster",
        72 => "Random Monster 1",
        73 => "Random Monster 2",
        74 => "Random Monster 3",
        75 => "Random Monster 4",
        76 => "Random Resource",
        77 => "Towns", // Random Town
        78 => "Refugee Camp",
        79 => [
            -1 => "Resources",
            0 => "Wood",
            1 => "Mercury",
            2 => "Ore",
            3 => "Sulfur",
            4 => "Crystal",
            5 => "Gems",
            6 => "Gold",
        ],
        80 => "Sanctuary",
        81 => "Scholar",
        82 => "Sea Chest",
        83 => 'Seer\'s Hut',
        84 => "Crypt",
        85 => "Shipwreck",
        86 => "Shipwreck Survivor",
        87 => [
            -1 => "Transportation",
            0 => "Shipyard",
            1 => "Airship Yard",
        ],
        88 => "Shrine of Magic Incantation",
        89 => "Shrine of Magic Gesture",
        90 => "Shrine of Magic Thought",
        91 => "Sign",
        92 => "Sirens",
        93 => "Spell Scroll",
        94 => "Stables",
        95 => "Tavern",
        96 => "Temple",
        97 => "Den of Thieves",
        98 => [
            -1 => "Towns",
            0 => "Castle",
            1 => "Rampart",
            2 => "Tower",
            3 => "Inferno",
            4 => "Necropolis",
            5 => "Dungeon",
            6 => "Stronghold",
            7 => "Fortress",
            8 => "Conflux",
            9 => "Cove",
            10 => "Factory",
        ],
        99 => "Trading Post",
        100 => "Learning Stone",
        101 => "Treasure Chest",
        102 => "Tree of Knowledge",
        103 => "Subterranean Gate",
        104 => "University",
        105 => "Wagon",
        106 => [
            -1 => "War Machines",
            0 => "War Machine Factory",
            1 => "Cannon Yard",
        ],
        107 => "School of War",
        108 => 'Warrior\'s Tomb',
        109 => "Water Wheel",
        110 => "Watering Hole",
        111 => "Whirlpool",
        112 => "Windmill",
        113 => "Witch Hut",
        114 => "OMITTED",
        115 => "OMITTED",
        116 => "OMITTED",
        117 => "OMITTED",
        118 => "OMITTED",
        119 => "OMITTED",
        120 => "OMITTED",
        121 => "OMITTED",
        122 => "OMITTED",
        123 => "OMITTED",
        124 => "OMITTED",
        125 => "OMITTED",
        126 => "OMITTED",
        127 => "OMITTED",
        128 => "OMITTED",
        129 => "OMITTED",
        130 => "OMITTED",
        131 => "OMITTED",
        132 => "OMITTED",
        133 => "OMITTED",
        134 => "OMITTED",
        135 => "OMITTED",
        136 => "OMITTED",
        137 => "OMITTED",
        138 => "OMITTED",
        139 => "OMITTED",
        140 => "OMITTED",
        141 => [
            -1 => "Magical Terrains",
            0 => "Cracked Ice",
            1 => "Dunes",
            2 => "Fields of Glory",
        ],
        142 => "Warehouses",
        143 => "OMITTED",
        144 => [
            -1 => "Misc. Objects 1",
            0 => "Temple of Loyalty",
            1 => "Skeleton Transformer",
            2 => "Colosseum of the Magi",
            3 => "Watering Place",
            4 => "Mineral Spring",
            5 => 'Hermit\'s Shack',
            6 => "Gazebo",
            7 => "Junkman",
            8 => "Derrick",
            9 => 'Warlock\'s Lab',
            10 => "Prospector",
            11 => "Trailblazer",
        ],
        145 => [
            -1 => "Misc. Collectibles",
            0 => "Ancient Lamp",
            1 => "Sea Barrel",
            2 => "Jetsam",
            3 => "Vial of Mana",
        ],
        146 => [
            -1 => "Misc. Objects 2",
            0 => "Seafaring Academy",
            1 => "Observatory",
            2 => "Altar of Mana",
            3 => "Town Gate",
            4 => "Ancient Altar",
        ],
        147 => "OMITTED",
        148 => "OMITTED",
        149 => "OMITTED",
        150 => "OMITTED",
        151 => "OMITTED",
        152 => "OMITTED",
        153 => "OMITTED",
        154 => "OMITTED",
        155 => "OMITTED",
        156 => "OMITTED",
        157 => "OMITTED",
        158 => "OMITTED",
        159 => "OMITTED",
        160 => "OMITTED",
        161 => "OMITTED",
        162 => "Random Monster 5",
        163 => "Random Monster 6",
        164 => "Random Monster 7",
        165 => "OMITTED",
        166 => "OMITTED",
        167 => "OMITTED",
        168 => "OMITTED",
        169 => "OMITTED",
        170 => "OMITTED",
        171 => "OMITTED",
        172 => "OMITTED",
        173 => "OMITTED",
        174 => "OMITTED",
        175 => "OMITTED",
        176 => "OMITTED",
        177 => "OMITTED",
        178 => "OMITTED",
        179 => "OMITTED",
        180 => "OMITTED",
        181 => "OMITTED",
        182 => "OMITTED",
        183 => "OMITTED",
        184 => "OMITTED",
        185 => "OMITTED",
        186 => "OMITTED",
        187 => "OMITTED",
        188 => "OMITTED",
        189 => "OMITTED",
        190 => "OMITTED",
        191 => "OMITTED",
        192 => "OMITTED",
        193 => "OMITTED",
        194 => "OMITTED",
        195 => "OMITTED",
        196 => "OMITTED",
        197 => "OMITTED",
        198 => "OMITTED",
        199 => "OMITTED",
        200 => "OMITTED",
        201 => "OMITTED",
        202 => "OMITTED",
        203 => "OMITTED",
        204 => "OMITTED",
        205 => "OMITTED",
        206 => "OMITTED",
        207 => "OMITTED",
        208 => "OMITTED",
        209 => "OMITTED",
        210 => "OMITTED",
        211 => "OMITTED",
        212 => [
            -1 => "Misc. Objects 3",
            0 => "Border Gate – Light Blue",
            1 => "Border Gate – Green",
            2 => "Border Gate – Red",
            3 => "Border Gate – Dark Blue",
            4 => "Border Gate – Brown",
            5 => "Border Gate – Purple",
            6 => "Border Gate – White",
            7 => "Border Gate – Black",
            1000 => "Quest Gate",
            1001 => "Grave",
        ],
        213 => 'Freelancer\'s Guild',
        214 => "OMITTED",
        215 => "Quest Guard",
        216 => "Random Dwelling",
        217 => "Random dwelling with no home castle type",
        218 => "Random dwelling with home castle type",
        219 => [
            -1 => "Garrisons", // Vertical
            0 => "Garrison – Normal",
            1 => "Garrison – Anti-magic",
        ],
        220 => "Abandoned Mine",
        221 => "Trading Post",
        222 => "Clover Field",
        223 => "Cursed Ground",
        224 => "Evil Fog",
        225 => "Favourable Winds",
        226 => "Fiery Fields",
        227 => "Holy Ground",
        228 => "Lucid Pools",
        229 => "Magic Clouds",
        230 => "Magic Plains",
        231 => "Rocklands",
    ];

    public $ObjectEx = [
        "2-0" => ["name" => "Altar of Sacrifice", "category" => OBJ_CATEGORY::XP],
        "4-0" => ["name" => "Arena", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_2],
        "5-X" => ["name" => "Artifact", "category" => OBJ_CATEGORY::ARTIFACTS],
        "6-0" => ["name" => 'Pandora\'s Box', "category" => OBJ_CATEGORY::SPECIAL],
        "7-0" => ["name" => "Black Market", "category" => OBJ_CATEGORY::TRADING],
        "8-X" => ["name" => "Boat", "category" => OBJ_CATEGORY::BOATS_AND_AIRSHIPS],
        "8-100" => ["name" => "Airship", "category" => OBJ_CATEGORY::BOATS_AND_AIRSHIPS],
        "9-0" => ["name" => "Border Guard – Light Blue", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-1" => ["name" => "Border Guard – Green", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-2" => ["name" => "Border Guard – Red", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-3" => ["name" => "Border Guard – Dark Blue", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-4" => ["name" => "Border Guard – Brown", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-5" => ["name" => "Border Guard – Purple", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-6" => ["name" => "Border Guard – White", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "9-7" => ["name" => "Border Guard – Black", "category" => OBJ_CATEGORY::BORDER_GUARDS],
        "10-0" => ["name" => 'Keymaster\'s Tent – Light Blue', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-1" => ["name" => 'Keymaster\'s Tent – Green', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-2" => ["name" => 'Keymaster\'s Tent – Red', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-3" => ["name" => 'Keymaster\'s Tent – Dark Blue', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-4" => ["name" => 'Keymaster\'s Tent – Brown', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-5" => ["name" => 'Keymaster\'s Tent – Purple', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-6" => ["name" => 'Keymaster\'s Tent – White', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "10-7" => ["name" => 'Keymaster\'s Tent – Black', "category" => OBJ_CATEGORY::KEYMASTERS_TENTS],
        "11-0" => ["name" => "Buoy", "category" => OBJ_CATEGORY::MORALE],
        "12-0" => ["name" => "Campfire", "category" => OBJ_CATEGORY::RESOURCES_2],
        "13-0" => ["name" => "Sea Cartographer", "category" => OBJ_CATEGORY::SCOUTING],
        "13-1" => ["name" => "Land Cartographer", "category" => OBJ_CATEGORY::SCOUTING],
        "13-2" => ["name" => "Subterranean Cartographer", "category" => OBJ_CATEGORY::SCOUTING],
        "14-0" => ["name" => "Swan Pond", "category" => OBJ_CATEGORY::LUCK],
        "15-0" => ["name" => "Cover of Darkness", "category" => OBJ_CATEGORY::SCOUTING],
        "16-0" => ["name" => "Cyclops Stockpile", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-1" => ["name" => "Dwarven Treasury", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-2" => ["name" => "Griffin Conservatory", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-3" => ["name" => "Imp Cache", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-4" => ["name" => "Medusa Stores", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-5" => ["name" => "Naga Bank", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-6" => ["name" => "Dragon Fly Hive", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        // '16-7' => ['name' => 'Shipwreck', 'category' => OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS],
        // '16-8' => ['name' => 'Derelict Ship', 'category' => OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS],
        // '16-9' => ['name' => 'Crypt', 'category' => OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS],
        // '16-10' => ['name' => 'Dragon Utopia', 'category' => OBJECTCATEGORIES::CREATURE_BANKS_ARTIFACTS],
        "16-21" => ["name" => 'Beholders\' Sanctuary', "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "16-22" => ["name" => "Temple of the Sea", "category" => OBJ_CATEGORY::CREATURE_BANKS_ELITE],
        "16-23" => ["name" => "Pirate Cavern", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-24" => ["name" => "Mansion", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "16-25" => ["name" => "Spit", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "16-26" => ["name" => "Red Tower", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-27" => ["name" => "Black Tower", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "16-28" => ["name" => "Ivory Tower", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-29" => ["name" => "Churchyard", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "16-30" => ["name" => "Experimental Shop", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-31" => ["name" => "Wolf Raider Picket", "category" => OBJ_CATEGORY::CREATURE_BANKS_CREATURES],
        "16-32" => ["name" => "Ruins", "category" => OBJ_CATEGORY::CREATURE_BANKS_RESOURCES],
        "17-X" => ["name" => "Dwelling", "category" => OBJ_CATEGORY::DWELLINGS],
        // '18-0' => ['name' => 'Dwellings 2', 'category' => OBJECTCATEGORIES::DWELLINGS],
        // '19-0' => ['name' => 'Dwellings 3', 'category' => OBJECTCATEGORIES::DWELLINGS],
        "20-0" => ["name" => "Elemental Conflux", "category" => OBJ_CATEGORY::DWELLINGS],
        "20-1" => ["name" => "Golem Factory", "category" => OBJ_CATEGORY::DWELLINGS],
        CURSED_GROUND_COMBOID => ["name" => "Cursed Ground", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
        "22-0" => ["name" => "Corpse", "category" => OBJ_CATEGORY::TREASURES],
        "23-0" => ["name" => "Marletto Tower", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_1],
        "24-0" => ["name" => "Derelict Ship", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "25-0" => ["name" => "Dragon Utopia", "category" => OBJ_CATEGORY::CREATURE_BANKS_ELITE],
        "26-0" => ["name" => "Event Object", "category" => OBJ_CATEGORY::SPECIAL],
        "27-0" => ["name" => "Eye of the Magi", "category" => OBJ_CATEGORY::SCOUTING],
        "28-0" => ["name" => "Faerie Ring", "category" => OBJ_CATEGORY::LUCK],
        "29-0" => ["name" => "Flotsam", "category" => OBJ_CATEGORY::RESOURCES_2],
        "30-0" => ["name" => "Fountain of Fortune", "category" => OBJ_CATEGORY::LUCK],
        "31-0" => ["name" => "Fountain of Youth", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "32-0" => ["name" => "Garden of Revelation", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_1],
        GARRISON_COMBOID => ["name" => "Garrison", "category" => OBJ_CATEGORY::GARRISONS_QUESTS],
        AMGARRISON_COMBOID => ["name" => "Anti-magic Garrison", "category" => OBJ_CATEGORY::GARRISONS_QUESTS],
        "34-X" => ["name" => "Hero", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "35-0" => ["name" => "Hill Fort – Original", "category" => OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES],
        "35-1" => ["name" => "Hill Fort – HotA", "category" => OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES],
        "36-0" => ["name" => "Grail", "category" => OBJ_CATEGORY::SPECIAL],
        "37-0" => ["name" => "Hut of the Magi", "category" => OBJ_CATEGORY::SCOUTING],
        "38-0" => ["name" => "Idol of Fortune", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "39-0" => ["name" => "Lean To", "category" => OBJ_CATEGORY::RESOURCES_2],
        "41-0" => ["name" => "Library of Enlightenment", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_2],
        "42-0" => ["name" => "Lighthouse", "category" => OBJ_CATEGORY::MOVEMENT],
        "43-0" => [
            "name" => "Monolith – Blue One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-1" => [
            "name" => "Monolith – Pink One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-2" => [
            "name" => "Monolith – Orange One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-3" => [
            "name" => "Monolith – Yellow One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-4" => ["name" => "Portal – Purple One-Way Entrance", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES],
        "43-5" => ["name" => "Portal – Orange One-Way Entrance", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES],
        "43-6" => ["name" => "Portal – Red One-Way Entrance", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES],
        "43-7" => ["name" => "Portal – Cyan One-Way Entrance", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_ENTRANCES],
        "43-8" => [
            "name" => "Monolith – Turquoise One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-9" => [
            "name" => "Monolith – Violet One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-10" => [
            "name" => "Monolith – Chartreuse One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "43-11" => [
            "name" => "Monolith – White One-Way Entrance",
            "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_ENTRANCES,
        ],
        "44-0" => ["name" => "Monolith – Blue One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-1" => ["name" => "Monolith – Pink One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-2" => ["name" => "Monolith – Orange One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-3" => ["name" => "Monolith – Yellow One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-4" => ["name" => "Portal – Purple One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS],
        "44-5" => ["name" => "Portal – Orange One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS],
        "44-6" => ["name" => "Portal – Red One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS],
        "44-7" => ["name" => "Portal – Cyan One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_PORTAL_EXITS],
        "44-8" => ["name" => "Monolith – Turquoise One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-9" => ["name" => "Monolith – Violet One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-10" => ["name" => "Monolith – Chartreuse One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "44-11" => ["name" => "Monolith – White One-Way Exit", "category" => OBJ_CATEGORY::ONE_WAY_MONOLITH_EXITS],
        "45-0" => ["name" => "Monolith – Green Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-1" => ["name" => "Monolith – Brown Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-2" => ["name" => "Monolith – Violet Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-3" => ["name" => "Monolith – Orange Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-4" => ["name" => "Portal – Green Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-5" => ["name" => "Portal – Yellow Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-6" => ["name" => "Portal – Red Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-7" => ["name" => "Portal – Cyan Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-8" => ["name" => "Sea Portal – White Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_SEA_PORTALS],
        "45-9" => ["name" => "Monolith – Pink Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-10" => ["name" => "Monolith – Turquoise Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-11" => ["name" => "Monolith – Yellow Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-12" => ["name" => "Monolith – Black Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-13" => ["name" => "Portal – Chartreuse Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-14" => ["name" => "Portal – Turquoise Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-15" => ["name" => "Portal – Violet Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-16" => ["name" => "Portal – Orange Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-17" => ["name" => "Monolith – Blue Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-18" => ["name" => "Monolith – Red Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_MONOLITHS],
        "45-19" => ["name" => "Portal – Pink Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-20" => ["name" => "Portal – Blue Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_PORTALS],
        "45-21" => ["name" => "Sea Portal – Red Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_SEA_PORTALS],
        "45-22" => ["name" => "Sea Portal – Blue Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_SEA_PORTALS],
        "45-23" => ["name" => "Sea Portal – Chartreuse Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_SEA_PORTALS],
        "45-24" => ["name" => "Sea Portal – Yellow Two-Way", "category" => OBJ_CATEGORY::TWO_WAY_SEA_PORTALS],
        MAGIC_PLAINS_COMBOID => ["name" => "Magic Plains", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
        "47-X" => ["name" => "School of Magic", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_2],
        "48-0" => ["name" => "Magic Spring", "category" => OBJ_CATEGORY::MANA],
        "49-0" => ["name" => "Magic Well", "category" => OBJ_CATEGORY::MANA],
        "51-0" => ["name" => "Mercenary Camp", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_1],
        "52-0" => ["name" => "Mermaid", "category" => OBJ_CATEGORY::LUCK],
        "53-0" => ["name" => "Sawmill", "category" => OBJ_CATEGORY::MINES],
        "53-1" => ["name" => 'Alchemist\'s Lab', "category" => OBJ_CATEGORY::MINES],
        "53-2" => ["name" => "Ore Pit", "category" => OBJ_CATEGORY::MINES],
        "53-3" => ["name" => "Sulfur Dune", "category" => OBJ_CATEGORY::MINES],
        "53-4" => ["name" => "Crystal Cavern", "category" => OBJ_CATEGORY::MINES],
        "53-5" => ["name" => "Gem Pond", "category" => OBJ_CATEGORY::MINES],
        "53-6" => ["name" => "Gold Mine", "category" => OBJ_CATEGORY::MINES],
        ABANDONED_MINE_COMBOID => ["name" => "Abandoned Mine", "category" => OBJ_CATEGORY::MINES],
        "54-X" => ["name" => "Monster", "category" => OBJ_CATEGORY::MONSTERS],
        "55-0" => ["name" => "Mystical Garden", "category" => OBJ_CATEGORY::RESOURCE_GENERATORS],
        "56-0" => ["name" => "Oasis", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "57-0" => ["name" => "Obelisk", "category" => OBJ_CATEGORY::SPECIAL],
        "58-0" => ["name" => "Redwood Observatory", "category" => OBJ_CATEGORY::SCOUTING],
        "58-1" => ["name" => "Observation Tower", "category" => OBJ_CATEGORY::SCOUTING],
        "59-0" => ["name" => "Ocean Bottle", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "60-0" => ["name" => "Pillar of Fire", "category" => OBJ_CATEGORY::SCOUTING],
        "61-0" => ["name" => "Star Axis", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_1],
        "62-0" => ["name" => "Prison", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "62-1" => ["name" => "Hero Camp", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "63-0" => ["name" => "Pyramid", "category" => OBJ_CATEGORY::SPELLS],
        "63-51" => ["name" => "Pyramid", "category" => null], // Aeten Nomere
        "64-0" => ["name" => "Rally Flag", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "65-0" => ["name" => "Random Artifact", "category" => OBJ_CATEGORY::ARTIFACTS],
        "66-0" => ["name" => "Random Treasure Artifact", "category" => OBJ_CATEGORY::ARTIFACTS],
        "67-0" => ["name" => "Random Minor Artifact", "category" => OBJ_CATEGORY::ARTIFACTS],
        "68-0" => ["name" => "Random Major Artifact", "category" => OBJ_CATEGORY::ARTIFACTS],
        "69-0" => ["name" => "Random Relic", "category" => OBJ_CATEGORY::ARTIFACTS],
        "70-0" => ["name" => "Random Hero", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "71-0" => ["name" => "Random Monster", "category" => OBJ_CATEGORY::MONSTERS],
        "72-0" => ["name" => "Random Monster 1", "category" => OBJ_CATEGORY::MONSTERS],
        "73-0" => ["name" => "Random Monster 2", "category" => OBJ_CATEGORY::MONSTERS],
        "74-0" => ["name" => "Random Monster 3", "category" => OBJ_CATEGORY::MONSTERS],
        "75-0" => ["name" => "Random Monster 4", "category" => OBJ_CATEGORY::MONSTERS],
        "76-0" => ["name" => "Random Resource", "category" => OBJ_CATEGORY::RESOURCES_1],
        "77-0" => ["name" => "Random Town", "category" => OBJ_CATEGORY::TOWNS],
        "78-0" => ["name" => "Refugee Camp", "category" => OBJ_CATEGORY::DWELLINGS],
        "79-0" => ["name" => "Wood", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-1" => ["name" => "Mercury", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-2" => ["name" => "Ore", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-3" => ["name" => "Sulfur", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-4" => ["name" => "Crystal", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-5" => ["name" => "Gems", "category" => OBJ_CATEGORY::RESOURCES_1],
        "79-6" => ["name" => "Gold", "category" => OBJ_CATEGORY::RESOURCES_1],
        "80-0" => ["name" => "Sanctuary", "category" => OBJ_CATEGORY::SPECIAL],
        "81-0" => ["name" => "Scholar", "category" => OBJ_CATEGORY::TREASURES],
        "82-0" => ["name" => "Sea Chest", "category" => OBJ_CATEGORY::TREASURES],
        "83-X" => ["name" => 'Seer\'s Hut', "category" => OBJ_CATEGORY::SPECIAL],
        "84-0" => ["name" => "Crypt", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "85-0" => ["name" => "Shipwreck", "category" => OBJ_CATEGORY::CREATURE_BANKS_ARTIFACTS],
        "86-0" => ["name" => "Shipwreck Survivor", "category" => OBJ_CATEGORY::TREASURES],
        "87-0" => ["name" => "Shipyard", "category" => OBJ_CATEGORY::BOATS_AND_AIRSHIPS],
        "87-1" => ["name" => "Airship Yard", "category" => OBJ_CATEGORY::BOATS_AND_AIRSHIPS],
        "88-0" => ["name" => "Shrine of Magic Incantation", "category" => OBJ_CATEGORY::SPELLS],
        "88-3" => ["name" => "Shrine of Magic Mystery", "category" => OBJ_CATEGORY::SPELLS],
        "89-0" => ["name" => "Shrine of Magic Gesture", "category" => OBJ_CATEGORY::SPELLS],
        "90-0" => ["name" => "Shrine of Magic Thought", "category" => OBJ_CATEGORY::SPELLS],
        "91-0" => ["name" => "Sign", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "92-0" => ["name" => "Sirens", "category" => OBJ_CATEGORY::XP],
        "93-0" => ["name" => "Spell Scroll", "category" => OBJ_CATEGORY::SPELLS],
        "94-0" => ["name" => "Stables", "category" => OBJ_CATEGORY::MOVEMENT],
        "95-0" => ["name" => "Tavern", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "96-0" => ["name" => "Temple", "category" => OBJ_CATEGORY::MORALE],
        "97-0" => ["name" => "Den of Thieves", "category" => OBJ_CATEGORY::HEROES_AND_INFO],
        "98-0" => ["name" => "Castle", "category" => OBJ_CATEGORY::TOWNS],
        "98-1" => ["name" => "Rampart", "category" => OBJ_CATEGORY::TOWNS],
        "98-2" => ["name" => "Tower", "category" => OBJ_CATEGORY::TOWNS],
        "98-3" => ["name" => "Inferno", "category" => OBJ_CATEGORY::TOWNS],
        "98-4" => ["name" => "Necropolis", "category" => OBJ_CATEGORY::TOWNS],
        "98-5" => ["name" => "Dungeon", "category" => OBJ_CATEGORY::TOWNS],
        "98-6" => ["name" => "Stronghold", "category" => OBJ_CATEGORY::TOWNS],
        "98-7" => ["name" => "Fortress", "category" => OBJ_CATEGORY::TOWNS],
        "98-8" => ["name" => "Conflux", "category" => OBJ_CATEGORY::TOWNS],
        "98-9" => ["name" => "Cove", "category" => OBJ_CATEGORY::TOWNS],
        "98-10" => ["name" => "Factory", "category" => OBJ_CATEGORY::TOWNS],
        TRADING_POST_COMBOID => ["name" => "Trading Post", "category" => OBJ_CATEGORY::TRADING],
        "100-0" => ["name" => "Learning Stone", "category" => OBJ_CATEGORY::XP],
        "101-0" => ["name" => "Treasure Chest", "category" => OBJ_CATEGORY::TREASURES],
        "102-0" => ["name" => "Tree of Knowledge", "category" => OBJ_CATEGORY::XP],
        "103-0" => ["name" => "Subterranean Gate", "category" => OBJ_CATEGORY::OTHER_GATEWAYS],
        "104-0" => ["name" => "University", "category" => OBJ_CATEGORY::SECONDARY_SKILLS],
        "105-0" => ["name" => "Wagon", "category" => OBJ_CATEGORY::TREASURES],
        "106-0" => ["name" => "War Machine Factory", "category" => OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES],
        "106-1" => ["name" => "Cannon Yard", "category" => OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES],
        "107-0" => ["name" => "School of War", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_2],
        "108-0" => ["name" => 'Warrior\'s Tomb', "category" => OBJ_CATEGORY::TREASURES],
        "109-0" => ["name" => "Water Wheel", "category" => OBJ_CATEGORY::RESOURCE_GENERATORS],
        "110-0" => ["name" => "Watering Hole", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "111-0" => ["name" => "Whirlpool", "category" => OBJ_CATEGORY::OTHER_GATEWAYS],
        "112-0" => ["name" => "Windmill", "category" => OBJ_CATEGORY::RESOURCE_GENERATORS],
        "113-0" => ["name" => "Witch Hut", "category" => OBJ_CATEGORY::SECONDARY_SKILLS],
        "141-0" => ["name" => "Cracked Ice", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "141-1" => ["name" => "Dunes", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "141-2" => ["name" => "Fields of Glory", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "142-0" => ["name" => "Warehouse of Wood", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-1" => ["name" => "Warehouse of Mercury", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-2" => ["name" => "Warehouse of Ore", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-3" => ["name" => "Warehouse of Sulfur", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-4" => ["name" => "Warehouse of Crystal", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-5" => ["name" => "Warehouse of Gem", "category" => OBJ_CATEGORY::WAREHOUSES],
        "142-6" => ["name" => "Warehouse of Gold", "category" => OBJ_CATEGORY::WAREHOUSES],
        "144-0" => ["name" => "Temple of Loyalty", "category" => OBJ_CATEGORY::MORALE],
        "144-1" => ["name" => "Skeleton Transformer", "category" => OBJ_CATEGORY::WAR_MACHINES_AND_UPGRADES],
        "144-2" => ["name" => "Colosseum of the Magi", "category" => OBJ_CATEGORY::PRIMARY_SKILLS_2],
        "144-3" => ["name" => "Watering Place", "category" => OBJ_CATEGORY::MOVEMENT],
        "144-4" => ["name" => "Mineral Spring", "category" => OBJ_CATEGORY::MULTI_BONUS],
        "144-5" => ["name" => 'Hermit\'s Shack', "category" => OBJ_CATEGORY::SECONDARY_SKILLS],
        "144-6" => ["name" => "Gazebo", "category" => OBJ_CATEGORY::XP],
        "144-7" => ["name" => "Junkman", "category" => OBJ_CATEGORY::TRADING],
        "144-8" => ["name" => "Derrick", "category" => OBJ_CATEGORY::RESOURCE_GENERATORS],
        "144-9" => ["name" => 'Warlock\'s Lab', "category" => OBJ_CATEGORY::TRADING],
        "144-10" => ["name" => "Prospector", "category" => OBJ_CATEGORY::RESOURCE_GENERATORS],
        "144-11" => ["name" => "Trailblazer", "category" => OBJ_CATEGORY::MOVEMENT],
        "145-0" => ["name" => "Ancient Lamp", "category" => OBJ_CATEGORY::DWELLINGS],
        "145-1" => ["name" => "Sea Barrel", "category" => OBJ_CATEGORY::RESOURCES_2],
        "145-2" => ["name" => "Jetsam", "category" => OBJ_CATEGORY::RESOURCES_2],
        "145-3" => ["name" => "Vial of Mana", "category" => OBJ_CATEGORY::MANA],
        "146-0" => ["name" => "Seafaring Academy", "category" => OBJ_CATEGORY::SECONDARY_SKILLS],
        "146-1" => ["name" => "Observatory", "category" => OBJ_CATEGORY::SCOUTING],
        "146-2" => ["name" => "Altar of Mana", "category" => OBJ_CATEGORY::MANA],
        "146-3" => ["name" => "Town Gate", "category" => OBJ_CATEGORY::OTHER_GATEWAYS],
        "146-4" => ["name" => "Ancient Altar", "category" => OBJ_CATEGORY::CREATURE_BANKS_ELITE],
        "162-0" => ["name" => "Random Monster 5", "category" => OBJ_CATEGORY::MONSTERS],
        "163-0" => ["name" => "Random Monster 6", "category" => OBJ_CATEGORY::MONSTERS],
        "164-0" => ["name" => "Random Monster 7", "category" => OBJ_CATEGORY::MONSTERS],
        "212-0" => ["name" => "Border Gate – Light Blue", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-1" => ["name" => "Border Gate – Green", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-2" => ["name" => "Border Gate – Red", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-3" => ["name" => "Border Gate – Dark Blue", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-4" => ["name" => "Border Gate – Brown", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-5" => ["name" => "Border Gate – Purple", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-6" => ["name" => "Border Gate – White", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-7" => ["name" => "Border Gate – Black", "category" => OBJ_CATEGORY::BORDER_GATES],
        "212-1000" => ["name" => "Quest Gate", "category" => OBJ_CATEGORY::GARRISONS_QUESTS],
        "212-1001" => ["name" => "Grave", "category" => OBJ_CATEGORY::TREASURES],
        "213-0" => ["name" => 'Freelancer\'s Guild', "category" => OBJ_CATEGORY::TRADING],
        "215-0" => ["name" => "Quest Guard", "category" => OBJ_CATEGORY::GARRISONS_QUESTS],
        "216-0" => ["name" => "Random Dwelling – All", "category" => OBJ_CATEGORY::DWELLINGS],
        "217-X" => ["name" => "Random Dwelling – Level", "category" => OBJ_CATEGORY::DWELLINGS],
        "218-X" => ["name" => "Random Dwelling – Faction", "category" => OBJ_CATEGORY::DWELLINGS],
        // '219-0' => ['name' => 'Garrison – Normal', 'category' => OBJECTCATEGORIES::GARRISONS_QUESTS],
        // '219-1' => ['name' => 'Garrison – Anti-magic', 'category' => OBJECTCATEGORIES::GARRISONS_QUESTS],
        // '220-X' => ['name' => 'Abandoned Mine', 'category' => OBJECTCATEGORIES::MINES],
        // '220-7' => ['name' => 'Abandoned Mine', 'category' => OBJECTCATEGORIES::MINES],
        // '221-0' => ['name' => 'Trading Post', 'category' => OBJECTCATEGORIES::TRADING],
        "222-0" => ["name" => "Clover Field", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        // '223-0' => ['name' => 'Cursed Ground', 'category' => OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS],
        "224-0" => ["name" => "Evil Fog", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "225-0" => ["name" => "Favourable Winds", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "226-0" => ["name" => "Fiery Fields", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
        "227-0" => ["name" => "Holy Ground", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_BONUSES],
        "228-0" => ["name" => "Lucid Pools", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
        "229-0" => ["name" => "Magic Clouds", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
        // '230-0' => ['name' => 'Magic Plains', 'category' => OBJECTCATEGORIES::MAGICAL_TERRAINS_SPELLS],
        "231-0" => ["name" => "Rocklands", "category" => OBJ_CATEGORY::MAGICAL_TERRAINS_SPELLS],
    ];

    public $OmittedObjectsAll = [
        3 => "Anchor Point",
        114 => "Brush",
        115 => "Bush",
        116 => "Cactus",
        117 => "Canyon",
        118 => "Crater",
        119 => "Dead Vegetation",
        120 => "Flowers",
        121 => "Frozen Lake",
        122 => "Hedge",
        123 => "Hill",
        124 => "Hole",
        125 => "Kelp",
        126 => "Lake",
        127 => "Lava Flow",
        128 => "Lava Lake",
        129 => "Mushrooms",
        130 => "Log",
        131 => "Mandrake",
        132 => "Moss",
        133 => "Mound",
        134 => "Mountain",
        135 => "Oak Trees",
        136 => "Outcropping",
        137 => "Pine Trees",
        138 => "Plant",
        139 => "HotA Decoration 1",
        140 => "HotA Decoration 2",
        143 => "River Delta",
        147 => "Rock",
        148 => "Sand Dune",
        149 => "Sand Pit",
        150 => "Shrub",
        151 => "Skull",
        152 => "Stalagmite",
        153 => "Stump",
        154 => "Tar Pit",
        155 => "Trees",
        156 => "Vine",
        157 => "Volcanic Vent",
        158 => "Volcano",
        159 => "Willow Trees",
        160 => "Yucca Trees",
        161 => "Reef",
        165 => "Brush",
        166 => "Bush",
        167 => "Cactus",
        168 => "Canyon",
        169 => "Crater",
        170 => "Dead Vegetation",
        171 => "Flowers",
        172 => "Frozen Lake",
        173 => "Hedge",
        174 => "Hill",
        175 => "Hole",
        176 => "Kelp",
        177 => "Lake",
        178 => "Lava Flow",
        179 => "Lava Lake",
        180 => "Mushrooms",
        181 => "Log",
        182 => "Mandrake",
        183 => "Moss",
        184 => "Mound",
        185 => "Mountain",
        186 => "Oak Trees",
        187 => "Outcropping",
        188 => "Pine Trees",
        189 => "Plant",
        190 => "River Delta",
        191 => "Rock",
        192 => "Sand Dune",
        193 => "Sand Pit",
        194 => "Shrub",
        195 => "Skull",
        196 => "Stalagmite",
        197 => "Stump",
        198 => "Tar Pit",
        199 => "Trees",
        200 => "Vine",
        201 => "Volcanic Vent",
        202 => "Volcano",
        203 => "Willow Trees",
        204 => "Yucca Trees",
        205 => "Reef",
        206 => "Desert Hills",
        207 => "Dirt Hills",
        208 => "Grass Hills",
        209 => "Rough Hills",
        210 => "Subterranean Rocks",
        211 => "Swamp Foliage",
        214 => "Hero Placeholder",
    ];

    public $OmittedObjectsPlayers = [
        8 => "Boat",
        21 => "Cursed Ground",
        46 => "Magic Plains",
        141 => "HotA Ground",
        222 => "Clover Field",
        223 => "Cursed Ground",
        224 => "Evil Fog",
        225 => "Favourable Winds",
        226 => "Fiery Fields",
        227 => "Holy Ground",
        228 => "Lucid Pools",
        229 => "Magic Clouds",
        230 => "Magic Plains",
        231 => "Rocklands",
    ];

    public $Mines = [
        0 => "Sawmill",
        1 => 'Alchemist\'s Lab',
        2 => "Ore Pit",
        3 => "Sulfur Dune",
        4 => "Crystal Cavern",
        5 => "Gem Pond",
        6 => "Gold Mine",
        7 => "Abandoned Mine",
    ];

    public $Resources = [
        0 => "Wood",
        1 => "Mercury",
        2 => "Ore",
        3 => "Sulfur",
        4 => "Crystal",
        5 => "Gems",
        6 => "Gold",
        253 => "Wood and Ore",
        254 => "Mercury, Sulfur, Crystal and Gems",
    ];

    public $Artifacts = [
        0 => "Spell Book",
        1 => "Spell Scroll",
        2 => "Grail",
        3 => "Catapult",
        4 => "Ballista",
        5 => "Ammo Cart",
        6 => "First Aid Tent",
        7 => "Centaur Axe",
        8 => "Blackshard of the Dead Knight",
        9 => 'Greater Gnoll\'s Flail',
        10 => 'Ogre\'s Club of Havoc',
        11 => "Sword of Hellfire",
        12 => 'Titan\'s Gladius',
        13 => "Shield of the Dwarven Lords",
        14 => "Shield of the Yawning Dead",
        15 => "Buckler of the Gnoll King",
        16 => "Targ of the Rampaging Ogre",
        17 => "Shield of the Damned",
        18 => 'Sentinel\'s Shield',
        19 => "Helm of the Alabaster Unicorn",
        20 => "Skull Helmet",
        21 => "Helm of Chaos",
        22 => "Crown of the Supreme Magi",
        23 => "Hellstorm Helmet",
        24 => "Thunder Helmet",
        25 => "Breastplate of Petrified Wood",
        26 => "Rib Cage",
        27 => "Scales of the Greater Basilisk",
        28 => "Tunic of the Cyclops King",
        29 => "Breastplate of Brimstone",
        30 => 'Titan\'s Cuirass',
        31 => "Armor of Wonder",
        32 => "Sandals of the Saint",
        33 => "Celestial Necklace of Bliss",
        34 => 'Lion\'s Shield of Courage',
        35 => "Sword of Judgement",
        36 => "Helm of Heavenly Enlightenment",
        37 => "Quiet Eye of the Dragon",
        38 => "Red Dragon Flame Tongue",
        39 => "Dragon Scale Shield",
        40 => "Dragon Scale Armor",
        41 => "Dragonbone Greaves",
        42 => "Dragon Wing Tabard",
        43 => "Necklace of Dragonteeth",
        44 => "Crown of Dragontooth",
        45 => "Still Eye of the Dragon",
        46 => "Clover of Fortune",
        47 => "Cards of Prophecy",
        48 => "Ladybird of Luck",
        49 => "Badge of Courage",
        50 => "Crest of Valor",
        51 => "Glyph of Gallantry",
        52 => "Speculum",
        53 => "Spyglass",
        54 => "Amulet of the Undertaker",
        55 => 'Vampire\'s Cowl',
        56 => 'Dead Man\'s Boots',
        57 => "Garniture of Interference",
        58 => "Surcoat of Counterpoise",
        59 => "Boots of Polarity",
        60 => "Bow of Elven Cherrywood",
        61 => 'Bowstring of the Unicorn\'s Mane',
        62 => "Angel Feather Arrows",
        63 => "Bird of Perception",
        64 => "Stoic Watchman",
        65 => "Emblem of Cognizance",
        66 => 'Statesman\'s Medal',
        67 => 'Diplomat\'s Ring',
        68 => 'Ambassador\'s Sash',
        69 => "Ring of the Wayfarer",
        70 => 'Equestrian\'s Gloves',
        71 => "Necklace of Ocean Guidance",
        72 => "Angel Wings",
        73 => "Charm of Mana",
        74 => "Talisman of Mana",
        75 => "Mystic Orb of Mana",
        76 => "Collar of Conjuring",
        77 => "Ring of Conjuring",
        78 => "Cape of Conjuring",
        79 => "Orb of the Firmament",
        80 => "Orb of Silt",
        81 => "Orb of Tempestuous Fire",
        82 => "Orb of Driving Rain",
        83 => 'Recanter\'s Cloak',
        84 => "Spirit of Oppression",
        85 => "Hourglass of the Evil Hour",
        86 => "Tome of Fire Magic",
        87 => "Tome of Air Magic",
        88 => "Tome of Water Magic",
        89 => "Tome of Earth Magic",
        90 => "Boots of Levitation",
        91 => "Golden Bow",
        92 => "Sphere of Permanence",
        93 => "Orb of Vulnerability",
        94 => "Ring of Vitality",
        95 => "Ring of Life",
        96 => "Vial of Lifeblood",
        97 => "Necklace of Swiftness",
        98 => "Boots of Speed",
        99 => "Cape of Velocity",
        100 => "Pendant of Dispassion",
        101 => "Pendant of Second Sight",
        102 => "Pendant of Holiness",
        103 => "Pendant of Life",
        104 => "Pendant of Death",
        105 => "Pendant of Free Will",
        106 => "Pendant of Negativity",
        107 => "Pendant of Total Recall",
        108 => "Pendant of Courage",
        109 => "Everflowing Crystal Cloak",
        110 => "Ring of Infinite Gems",
        111 => "Everpouring Vial of Mercury",
        112 => "Inexhaustible Cart of Ore",
        113 => "Eversmoking Ring of Sulfur",
        114 => "Inexhaustible Cart of Lumber",
        115 => "Endless Sack of Gold",
        116 => "Endless Bag of Gold",
        117 => "Endless Purse of Gold",
        118 => "Legs of Legion",
        119 => "Loins of Legion",
        120 => "Torso of Legion",
        121 => "Arms of Legion",
        122 => "Head of Legion",
        123 => 'Sea Captain\'s Hat',
        124 => 'Spellbinder\'s Hat',
        125 => "Shackles of War",
        126 => "Orb of Inhibition",
        127 => "Vial of Dragon Blood",
        128 => 'Armageddon\'s Blade',
        129 => "Angelic Alliance",
        130 => "Cloak of the Undead King",
        131 => "Elixir of Life",
        132 => "Armor of the Damned",
        133 => "Statue of Legion",
        134 => "Power of the Dragon Father",
        135 => 'Titan\'s Thunder',
        136 => 'Admiral\'s Hat',
        137 => "Bow of the Sharpshooter",
        138 => 'Wizard\'s Well',
        139 => "Ring of the Magi",
        140 => "Cornucopia",

        //WOG
        141 => "Magic Wand",
        142 => "Gold Tower Arrow",
        143 => 'Monster\'s Power',
        144 => "Highlighted Slot",
        145 => "Artifact Lock",
        146 => "Axe of Smashing",
        147 => "Mithril Mail",
        148 => "Sword of Sharpness",
        149 => "Helm of Immortality",
        150 => "Pendant of Sorcery",
        151 => "Boots of Haste",
        152 => "Bow of Seeking",
        153 => "Dragon Eye Ring",
        154 => "Hardened Shield",
        155 => 'Slava\'s Ring of Power',
        156 => 'Warlord\'s banner',
        157 => "Crimson Shield of Retribution",
        158 => 'Barbarian Lord\'s Axe of Ferocity',
        159 => "Dragonheart",
        160 => "Gate Key",
        161 => "Blank Helmet",
        162 => "Blank Sword",
        163 => "Blank Shield",
        164 => "Blank Horned Ring",
        165 => "Blank Gemmed Ring",
        166 => "Blank Neck Broach",
        167 => "Blank Armor",
        168 => "Blank Surcoat",
        169 => "Blank Boots",
        170 => "Blank Horn",
    ];

    //HOTA
    public $ArtifactsHota = [
        141 => 'Diplomat\'s Cloak',
        142 => "Pendant of Reflection",
        143 => "Ironfist of the Ogre",
        146 => "Cannon",
        147 => "Trident of Dominion",
        148 => "Shield of Naval Glory",
        149 => "Royal Armor of Nix",
        150 => "Crown of the Five Seas",
        151 => 'Wayfarer\'s Boots',
        152 => "Runes of Imminency",
        153 => 'Demon\'s Horseshoe',
        154 => 'Shaman\'s Puppet',
        155 => "Hideous Mask",
        156 => "Ring of Suppression",
        157 => "Pendant of Downfall",
        158 => "Ring of Oblivion",
        159 => "Cape of Silence",
        160 => "Golden Goose",
        161 => "Horn of the Abyss",
        162 => "Charm of Eclipse",
        163 => "Seal of Sunset",
        164 => "Plate of Dying Light",
        165 => "Sleepkeeper",
        255 => "Empty - 1 Byte",
        65535 => "Empty - 2 Bytes",
        2637180971 => "Empty - Unknown",
        4294967295 => "Empty - 4 Bytes",
    ];
    public $ArtifactsCombo = [
        0 => "Angelic Alliance",
        1 => "Cloak of the Undead King",
        2 => "Elixir of Life",
        3 => "Armor of the Damned",
        4 => "Statue of Legion",
        5 => "Power of the Dragon Father",
        6 => 'Titan\'s Thunder',
        7 => 'Admiral\'s Hat',
        8 => "Bow of the Sharpshooter",
        9 => 'Wizard\'s Well',
        10 => "Ring of the Magi",
        11 => "Cornucopia",
        12 => 'Diplomat\'s Cloak',
        13 => "Pendant of Reflection",
        14 => "Golden Goose",
        15 => "Ironfist of the Ogre",
    ];

    public $HeroClass = [
        0 => "Knight",
        1 => "Cleric",
        2 => "Ranger",
        3 => "Druid",
        4 => "Alchemist",
        5 => "Wizard",
        6 => "Demoniac",
        7 => "Heretic",
        8 => "Death Knight",
        9 => "Necromancer",
        10 => "Overlord",
        11 => "Warlock",
        12 => "Barbarian",
        13 => "Battle Mage",
        14 => "Beastmaster",
        15 => "Witch",
        16 => "Planeswalker",
        17 => "Elementalist",
        18 => "Captain",
        19 => "Navigator",
        20 => "Mercenary",
        21 => "Artificer",
        255 => "Random",
    ];

    public $Heroes = [
        //Knights
        0 => "Orrin",
        1 => "Valeska",
        2 => "Edric",
        3 => "Sylvia",
        4 => "Lord Haart",
        5 => "Sorsha",
        6 => "Christian",
        7 => "Tyris",
        //Clerics
        8 => "Rion",
        9 => "Adela",
        10 => "Cuthbert",
        11 => "Adelaide",
        12 => "Ingham",
        13 => "Sanya",
        14 => "Loynis",
        15 => "Caitlin",
        //Rangers
        16 => "Mephala",
        17 => "Ufretin",
        18 => "Jenova",
        19 => "Ryland",
        20 => "Thorgrim",
        21 => "Ivor",
        22 => "Clancy",
        23 => "Kyrre",
        //Druids
        24 => "Coronius",
        25 => "Uland",
        26 => "Elleshar",
        27 => "Gem",
        28 => "Malcom",
        29 => "Melodia",
        30 => "Alagar",
        31 => "Aeris",
        //Alchemists
        32 => "Piquedram",
        33 => "Thane",
        34 => "Josephine",
        35 => "Neela",
        36 => "Torosar",
        37 => "Fafner",
        38 => "Rissa",
        39 => "Iona",
        //Wizards
        40 => "Astral",
        41 => "Halon",
        42 => "Serena",
        43 => "Daremyth",
        44 => "Theodorus",
        45 => "Solmyr",
        46 => "Cyra",
        47 => "Aine",
        //Demoniacs
        48 => "Fiona",
        49 => "Rashka",
        50 => "Marius",
        51 => "Ignatius",
        52 => "Octavia",
        53 => "Calh",
        54 => "Pyre",
        55 => "Nymus",
        //Heretics
        56 => "Ayden",
        57 => "Xyron",
        58 => "Axsis",
        59 => "Olema",
        60 => "Calid",
        61 => "Ash",
        62 => "Zydar",
        63 => "Xarfax",
        //Death Knights
        64 => "Straker",
        65 => "Vokial",
        66 => "Moandor",
        67 => "Charna",
        68 => "Tamika",
        69 => "Isra",
        70 => "Clavius",
        71 => "Galthran",
        //Necromancers
        72 => "Septienna",
        73 => "Aislinn",
        74 => "Sandro",
        75 => "Nimbus",
        76 => "Thant",
        77 => "Xsi",
        78 => "Vidomina",
        79 => "Nagash",
        //Overlords
        80 => "Lorelei",
        81 => "Arlach",
        82 => "Dace",
        83 => "Ajit",
        84 => "Damacon",
        85 => "Gunnar",
        86 => "Synca",
        87 => "Shakti",
        //Warlocks
        88 => "Alamar",
        89 => "Jaegar",
        90 => "Malekith",
        91 => "Jeddite",
        92 => "Geon",
        93 => "Deemer",
        94 => "Sephinroth",
        95 => "Darkstorn",
        //Barbarians
        96 => "Yog",
        97 => "Gurnisson",
        98 => "Jabarkas",
        99 => "Shiva",
        100 => "Gretchin",
        101 => "Krellion",
        102 => "Crag Hack",
        103 => "Tyraxor",
        //Battle Mages
        104 => "Gird",
        105 => "Vey",
        106 => "Dessa",
        107 => "Terek",
        108 => "Zubin",
        109 => "Gundula",
        110 => "Oris",
        111 => "Saurug",
        //Beastmasters
        112 => "Bron",
        113 => "Drakon",
        114 => "Wystan",
        115 => "Tazar",
        116 => "Alkin",
        117 => "Korbac",
        118 => "Gerwulf",
        119 => "Broghild",
        //Witches
        120 => "Mirlanda",
        121 => "Rosic",
        122 => "Voy",
        123 => "Verdish",
        124 => "Merist",
        125 => "Styg",
        126 => "Andra",
        127 => "Tiva",
        //Planeswalkers
        128 => "Pasis",
        129 => "Thunar",
        130 => "Ignissa",
        131 => "Lacus",
        132 => "Monere",
        133 => "Erdamon",
        134 => "Fiur",
        135 => "Kalt",
        //Elementalists
        136 => "Luna",
        137 => "Brissa",
        138 => "Ciele",
        139 => "Labetha",
        140 => "Inteus",
        141 => "Aenain",
        142 => "Gelare",
        143 => "Grindan",
        //Extension Heroes
        144 => "Sir Mullich", //knight
        145 => "Adrienne", //witch
        146 => "Catherine", //knight
        147 => "Dracon", //wizard
        148 => "Gelu", //ranger
        149 => "Kilgor", //barbarian
        150 => "Lord Haart", //death knight
        151 => "Mutare", //overlord
        152 => "Roland", //knight
        153 => "Mutare Drake", //overlord
        154 => "Boragus", //barbarian
        155 => "Xeron", //demoniac

        //HOTA
        //Captain
        156 => "Corkes",
        157 => "Jeremy",
        158 => "Illor",
        159 => "Derek",
        160 => "Leena",
        161 => "Anabel",
        162 => "Cassiopeia",
        163 => "Miriam",
        //Navigator
        164 => "Casmetra",
        165 => "Eovacius",
        166 => "Spint",
        167 => "Andal",
        168 => "Manfred",
        169 => "Zilare",
        170 => "Astra",
        //extra
        171 => "Dargem", //navigator
        172 => "Bidley", //captain
        173 => "Tark", //captain
        174 => "Elmore", //captain
        175 => "Beatrice", //knight
        176 => "Kinkeria", //witch
        177 => "Ranloo", //death knight
        178 => "Giselle", //ranger
        //Mercenary
        179 => "Henrietta",
        180 => "Sam",
        181 => "Tancred",
        182 => "Melchior",
        183 => "Floribert",
        184 => "Wynona",
        185 => "Dury",
        186 => "Morton",
        //Artificer
        187 => "Celestine",
        188 => "Todd",
        189 => "Agar",
        190 => "Bertram",
        191 => "Wrathmont",
        192 => "Ziph",
        193 => "Victoria",
        194 => "Eanswythe",
        //factory campaign heroes
        195 => "Frederick", //*
        196 => "Tavin", //*
        197 => "Murdoch", //*

        255 => "Random",
        65533 => "Most Powerful Hero",
    ];

    //heroes class: heroid => classid
    public $HeroesClass = [
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0, //Knights  0-7
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        1, //Clerics  8-15
        2,
        2,
        2,
        2,
        2,
        2,
        2,
        2, //Rangers 16-23
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3, //Druids 24-31
        4,
        4,
        4,
        4,
        4,
        4,
        4,
        4, //Alchemists 32-39
        5,
        5,
        5,
        5,
        5,
        5,
        5,
        5, //Wizards 40-47
        6,
        6,
        6,
        6,
        6,
        6,
        6,
        6, //Demoniacs 48-55
        7,
        7,
        7,
        7,
        7,
        7,
        7,
        7, //Heretics 56-63
        8,
        8,
        8,
        8,
        8,
        8,
        8,
        8, //Death Knights 64-71
        9,
        9,
        9,
        9,
        9,
        9,
        9,
        9, //Necromancers 72-79
        10,
        10,
        10,
        10,
        10,
        10,
        10,
        10, //Overlords 80-87
        11,
        11,
        11,
        11,
        11,
        11,
        11,
        11, //Warlocks 88-95
        12,
        12,
        12,
        12,
        12,
        12,
        12,
        12, //Barbarians 96-103
        13,
        13,
        13,
        13,
        13,
        13,
        13,
        13, //Battle Mages 104-111
        14,
        14,
        14,
        14,
        14,
        14,
        14,
        14, //Beastmasters 112-119
        15,
        15,
        15,
        15,
        15,
        15,
        15,
        15, //Witches 120-127
        16,
        16,
        16,
        16,
        16,
        16,
        16,
        16, //Planeswalkers 128-135
        17,
        17,
        17,
        17,
        17,
        17,
        17,
        17, //Elementalists 136-143
        0,
        15,
        0,
        5,
        2,
        12,
        8,
        10,
        0,
        10,
        12,
        6, //SOD extra heroes 144-155

        //HOTA
        18,
        18,
        18,
        18,
        18,
        18,
        18,
        18, //Captain 156-163
        19,
        19,
        19,
        19,
        19,
        19,
        19,
        19, //Navigator 164-171
        18,
        18,
        18,
        0,
        15,
        8, //HOTA extra heroes 172-177
        2, //178 ranger
        20,
        20,
        20,
        20,
        20,
        20,
        20,
        20, //Mercenary 179-186
        21,
        21,
        21,
        21,
        21,
        21,
        21,
        21, //Artificer 187-194
        21,
        20,
        20, //factory campaign 195-197
    ];

    public $Buildings = [
        //byte 0
        0 => "Town Hall",
        1 => "City Hall",
        2 => "Capitol",
        3 => "Fort",
        4 => "Citadel",
        5 => "Castle",
        6 => "Tavern",
        7 => "Blacksmith",
        //byte 1
        8 => "Marketplace",
        9 => "Resource Silo",
        10 => "Artifact Merchants",
        11 => "Mage Guild Level 1",
        12 => "Mage Guild Level 2",
        13 => "Mage Guild Level 3",
        14 => "Mage Guild Level 4",
        15 => "Mage Guild Level 5",
        //byte 2
        16 => "Shipyard",
        17 => "Grail",
        18 => "Special 1",
        19 => "Special 2",
        20 => "Special 3",
        21 => "Special 4",
        22 => "Dwelling Level 1",
        23 => "Dwelling Level 1 Upgrade",
        //byte 3
        24 => "Horde Level 1",
        25 => "Dwelling Level 2",
        26 => "Dwelling Level 2 Upgrade",
        27 => "Horde Level 2",
        28 => "Dwelling Level 3",
        29 => "Dwelling Level 3 Upgrade",
        30 => "Horde Level 3",
        31 => "Dwelling Level 4",
        //byte 4
        32 => "Dwelling Level 4 Upgrade",
        33 => "Horde Level 4",
        34 => "Dwelling Level 5",
        35 => "Dwelling Level 5 Upgrade",
        36 => "Horde Level 5",
        37 => "Dwelling Level 6",
        38 => "Dwelling Level 6 Upgrade",
        39 => "Dwelling Level 7",
        //byte 5
        40 => "Dwelling Level 7 Upgrade",
        41 => "41",
        42 => "42",
        43 => "43",
        44 => "44",
        45 => "45",
        46 => "46",
        47 => "47",
    ];

    public $TownEventHotaSpecial1 = [
        1 => "Lighthouse (Castle)",
        2 => "Brotherhood of the Sword (Castle)",
        4 => "Stables (Castle)",
        16 => "Mystic Pond (Rampart)",
        32 => "Fountain of Fortune (Rampart)",
        64 => "Treasury (Rampart)",
    ];

    public $TownEventHotaSpecial2 = [
        1 => "Library (Tower)",
        2 => "Wall of Knowledge (Tower)",
        4 => "Lookout Tower (Tower)",
        16 => "Brimstone Stormclouds (Inferno)",
        32 => "Castle Gate (Inferno)",
        64 => "Order of Fire (Inferno)",
    ];

    public $TownEventHotaSpecial3 = [
        1 => "Cover of Darkness (Necropolis)",
        2 => "Necromancy Amplifier (Necropolis)",
        4 => "Skeleton Transformer (Necropolis)",
        16 => "Mana Vortex (Dungeon)",
        32 => "Portal of Summoning (Dungeon)",
        64 => "Battle Scholar Academy (Dungeon)",
    ];

    public $TownEventHotaSpecial4 = [
        1 => "Escape Tunnel (Stronghold)",
        2 => 'Freelancer\'s Guild (Stronghold)',
        4 => "Ballista Yard (Stronghold)",
        8 => "Hall of Valhalla (Stronghold)",
        16 => "Cage of Warlords (Fortress)",
        32 => "Glyphs of Fear (Fortress)",
        64 => "Blood Obelisk (Fortress)",
    ];

    public $TownEventHotaSpecial5 = [
        1 => "Magic University (Conflux)",
        2 => "Horde Level 7",
        16 => 'Thieves\' Guild (Cove)',
        32 => "Grotto (Cove)",
        64 => "Gunpowder Warehouse (Cove)",
    ];

    public $TownEventHotaSpecial6 = [
        1 => "Bank (Factory)",
        2 => "Dwelling Level 7b",
        4 => "Dwelling Level 7b Upgrade",
        8 => "Mana Generator (Factory)",
    ];

    public $MonolithsOne = [
        0 => "Blue One-Way Monolith",
        1 => "Pink One-Way Monolith",
        2 => "Orange One-Way Monolith",
        3 => "Yellow One-Way Monolith",
        4 => "Purple One-Way Portal",
        5 => "Orange One-Way Portal",
        6 => "Red One-Way Portal",
        7 => "Cyan One-Way Portal",
        8 => "Turquoise One-Way Monolith",
        9 => "Violet One-Way Monolith",
        10 => "Chartreuse One-Way Monolith",
        11 => "White One-Way Monolith",
    ];

    public $MonolithsTwo = [
        0 => "Green Two-Way Monolith",
        1 => "Brown Two-Way Monolith",
        2 => "Violet Two-Way Monolith",
        3 => "Orange Two-Way Monolith",
        4 => "Green Two-Way Portal",
        5 => "Yellow Two-Way Portal",
        6 => "Red Two-Way Portal",
        7 => "Cyan Two-Way Portal",
        8 => "White Two-Way Sea Portal",
        9 => "Pink Two-Way Monolith",
        10 => "Turquoise Two-Way Monolith",
        11 => "Yellow Two-Way Monolith",
        12 => "Black Two-Way Monolith",
        13 => "Chartreuse Two-Way Portal",
        14 => "Turquoise Two-Way Portal",
        15 => "Violet Two-Way Portal",
        16 => "Orange Two-Way Portal",
        17 => "Blue Two-Way Monolith",
        18 => "Red Two-Way Monolith",
        19 => "Pink Two-Way Portal",
        20 => "Blue Two-Way Portal",
        21 => "Red Two-Way Sea Portal",
        22 => "Blue Two-Way Sea Portal",
        23 => "Green Two-Way Sea Portal",
        24 => "Yellow Two-Way Sea Portal",
    ];

    public $Experience = [
        1 => 0,
        2 => 1000,
        3 => 2000,
        4 => 3200,
        5 => 4600,
        6 => 6200,
        7 => 8000,
        8 => 10000,
        9 => 12200,
        10 => 14700,
        11 => 17500,
        12 => 20600,
        13 => 24320,
        14 => 28784,
        15 => 34140,
        16 => 40567,
        17 => 48279,
        18 => 57533,
        19 => 68637,
        20 => 81961,
        21 => 97949,
        22 => 117134,
        23 => 140156,
        24 => 167782,
        25 => 200933,
        26 => 240714,
        27 => 288451,
        28 => 345735,
        29 => 414475,
        30 => 496963,
        31 => 595948,
        32 => 714730,
        33 => 857268,
        34 => 1028313,
        35 => 1233567,
        36 => 1479871,
        37 => 1775435,
        38 => 2130111,
        39 => 2555722,
        40 => 3066455,
        41 => 3679334,
        42 => 4414788,
        43 => 5297332,
        44 => 6356384,
        45 => 7627246,
        46 => 9152280,
        47 => 10982320,
        48 => 13178368,
        49 => 15813625,
        50 => 18975933,
        51 => 22770702,
        52 => 27324424,
        53 => 32788890,
        54 => 39346249,
        55 => 47215079,
        56 => 56657675,
        57 => 67988790,
        58 => 81586128,
        59 => 97902933,
        60 => 117483099,
        61 => 140979298,
        62 => 169174736,
        63 => 203009261,
        64 => 243610691,
        65 => 292332407,
        66 => 350798466,
        67 => 420957736,
        68 => 505148860,
        69 => 606178208,
        70 => 727413425,
        71 => 872895685,
        72 => 1047474397,
        73 => 1256968851,
        74 => 1508362195,
        75 => 1810034207,
        //76 => -2122926675,
        76 => 0x100000000,
    ];

    public $ObjectColors = [
        0 => "Light Blue",
        1 => "Green",
        2 => "Red",
        3 => "Dark Blue",
        4 => "Brown",
        5 => "Purple",
        6 => "White",
        7 => "Black",
    ];

    public $BlockMapBits = [
        BLOCKMAPBITS::VISIBLE => "Visible", //1
        BLOCKMAPBITS::VISITABLE => "Visitable", //2
        BLOCKMAPBITS::BLOCKED => "Blocked", //4
        BLOCKMAPBITS::COMBINED => "Combined", //6
    ];

    public $RewardType = [
        REWARDTYPE::NOTHING => EMPTY_DATA,
        REWARDTYPE::EXPERIENCE => "Experience",
        REWARDTYPE::MANA_POINTS => "Mana points",
        REWARDTYPE::MORALE_BONUS => "Morale bonus",
        REWARDTYPE::LUCK_BONUS => "Luck bonus",
        REWARDTYPE::RESOURCES => "Resources",
        REWARDTYPE::PRIMARY_SKILL => "Primary Skill",
        REWARDTYPE::SECONDARY_SKILL => "Secondary skill",
        REWARDTYPE::ARTIFACT => "Artifact",
        REWARDTYPE::SPELL => "Spell",
        REWARDTYPE::CREATURE => "Creature",
    ];

    public $QuestMission = [
        QUESTMISSION::NONE => "None",
        QUESTMISSION::LEVEL => "Level",
        QUESTMISSION::PRIMARY_STAT => "Primary stat",
        QUESTMISSION::KILL_HERO => "Kill hero",
        QUESTMISSION::KILL_CREATURE => "Kill creature",
        QUESTMISSION::ART => "Artifact",
        QUESTMISSION::ARMY => "Army",
        QUESTMISSION::RESOURCES => "Resources",
        QUESTMISSION::HERO => "Hero",
        QUESTMISSION::PLAYER => "Player",
        QUESTMISSION::KEYMASTER => "Keymaster",
    ];

    public $Victory = [
        VICTORY::NONE => "Standard",
        VICTORY::ARTIFACT => "Acquire a specific artifact",
        VICTORY::ACCCREATURES => "Accumulate creatures",
        VICTORY::ACCRESOURCES => "Accumulate resources",
        VICTORY::UPGRADETOWN => "Upgrade a specific town",
        VICTORY::BUILDGRAIL => "Build the grail structure",
        VICTORY::DEFEATHERO => "Defeat a specific Hero",
        VICTORY::CAPTURETOWN => "Capture a specific town",
        VICTORY::KILLMONSTER => "Defeat a specific monster",
        VICTORY::FLAGWELLINGS => "Flag all creature dwelling",
        VICTORY::FLAGMINES => "Flag all mines",
        VICTORY::TRANSPORTART => "Transport a specific artifact",
        VICTORY::ELIMINATEMONSTERS => "Eliminate all monsters",
        VICTORY::SURVIVETIME => "Survive for certain time",
    ];

    public $Loss = [
        LOSS::NONE => "None",
        LOSS::TOWN => "Lose a specific town",
        LOSS::HERO => "Lose a specific hero",
        LOSS::TIME => "time",
    ];
}
