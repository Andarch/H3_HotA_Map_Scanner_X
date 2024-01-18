<?php
/*
	$_BuildingID = [
		-50 => 'DEFAULT',
		-1 => 'NONE',
		0 => 'MAGES_GUILD_1',
		 => 'MAGES_GUILD_2,',
		 => 'MAGES_GUILD_3,',
		 => 'MAGES_GUILD_4,',
		 => 'MAGES_GUILD_5,',
		 => 'TAVERN,',
		 => 'SHIPYARD,',
		 => 'FORT,',
		 => 'CITADEL,',
		 => 'CASTLE,',
		 => 'VILLAGE_HALL,',
		 => 'TOWN_HALL,',
		 => 'CITY_HALL,',
		 => 'CAPITOL,',
		 => 'MARKETPLACE,',
		 => 'RESOURCE_SILO,',
		 => 'BLACKSMITH,',
		 => 'SPECIAL_1,',
		 => 'HORDE_1,',
		 => 'HORDE_1_UPGR,',
		 => 'SHIP,',
		 => 'SPECIAL_2,',
		 => 'SPECIAL_3,',
		 => 'SPECIAL_4,',
		 => 'HORDE_2,',
		 => 'HORDE_2_UPGR,',
		 => 'GRAIL,',
		 => 'EXTRA_TOWN_HALL,',
		 => 'EXTRA_CITY_HALL,',
		 => 'EXTRA_CAPITOL,',
		 => 'DWELL_FIRST',
		 => 'DWELL_LVL_2,',
		 => 'DWELL_LVL_3,',
		 => 'DWELL_LVL_4,',
		 => 'DWELL_LVL_5,',
		 => 'DWELL_LVL_6,',
		 => 'DWELL_LAST',
		 => 'DWELL_UP_FIRST',
		 => 'DWELL_LVL_2_UP,',
		 => 'DWELL_LVL_3_UP,',
		 => 'DWELL_LVL_4_UP,',
		 => 'DWELL_LVL_5_UP,',
		 => 'DWELL_LVL_6_UP,',
		 => 'DWELL_UP_LAST',

		DWELL_LVL_1 = DWELL_FIRST,
		DWELL_LVL_7 = DWELL_LAST,
		DWELL_LVL_1_UP = DWELL_UP_FIRST,
		DWELL_LVL_7_UP = DWELL_UP_LAST,

		//Special buildings for towns.
		LIGHTHOUSE  = SPECIAL_1,
		STABLES     = SPECIAL_2, //Castle
		BROTHERHOOD = SPECIAL_3,

		MYSTIC_POND         = SPECIAL_1,
		FOUNTAIN_OF_FORTUNE = SPECIAL_2, //Rampart
		TREASURY            = SPECIAL_3,

		ARTIFACT_MERCHANT = SPECIAL_1,
		LOOKOUT_TOWER     = SPECIAL_2, //Tower
		LIBRARY           = SPECIAL_3,
		WALL_OF_KNOWLEDGE = SPECIAL_4,

		STORMCLOUDS   = SPECIAL_2,
		CASTLE_GATE   = SPECIAL_3, //Inferno
		ORDER_OF_FIRE = SPECIAL_4,

		COVER_OF_DARKNESS    = SPECIAL_1,
		NECROMANCY_AMPLIFIER = SPECIAL_2, //Necropolis
		SKELETON_TRANSFORMER = SPECIAL_3,

		//ARTIFACT_MERCHANT - same ID as in tower
		MANA_VORTEX      = SPECIAL_2,
		PORTAL_OF_SUMMON = SPECIAL_3, //Dungeon
		BATTLE_ACADEMY   = SPECIAL_4,

		ESCAPE_TUNNEL     = SPECIAL_1,
		FREELANCERS_GUILD = SPECIAL_2, //Stronghold
		BALLISTA_YARD     = SPECIAL_3,
		HALL_OF_VALHALLA  = SPECIAL_4,

		CAGE_OF_WARLORDS = SPECIAL_1,
		GLYPHS_OF_FEAR   = SPECIAL_2, // Fortress
		BLOOD_OBELISK    = SPECIAL_3,

		//ARTIFACT_MERCHANT - same ID as in tower
		MAGIC_UNIVERSITY = SPECIAL_2, // Conflux
	];

*/

	/*$_BlockMapBits = [
		VISIBLE = 1,
		VISITABLE = 2,
		BLOCKED = 4
	];*/


	/*class OBJECTS {
		const NO_OBJ = -1;
		const ALTAR_OF_SACRIFICE = 2;
		const ANCHOR_PO = 3;
		const ARENA = 4;
		const ARTIFACT = 5;
		const PANDORAS_BOX = 6;
		const BLACK_MARKET = 7;
		const BOAT = 8;
		const BORDERGUARD = 9;
		const KEYMASTER = 10;
		const BUOY = 11;
		const CAMPFIRE = 12;
		const CARTOGRAPHER = 13;
		const SWAN_POND = 14;
		const COVER_OF_DARKNESS = 15;
		const CREATURE_BANK = 16;
		const CREATURE_GENERATOR1 = 17;
		const CREATURE_GENERATOR2 = 18;
		const CREATURE_GENERATOR3 = 19;
		const CREATURE_GENERATOR4 = 20;
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
		const GARRISON = 33;
		const HERO = 34;
		const HILL_FORT = 35;
		const GRAIL = 36;
		const HUT_OF_MAGI = 37;
		const IDOL_OF_FORTUNE = 38;
		const LEAN_TO = 39;
		const LIBRARY_OF_ENLIGHTENMENT = 41;
		const LIGHTHOUSE = 42;
		const MONOLITH_ONE_WAY_ENTRANCE = 43;
		const MONOLITH_ONE_WAY_EXIT = 44;
		const MONOLITH_TWO_WAY = 45;
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
		const RANDOM_MONSTER_L5 = 162;
		const RANDOM_MONSTER_L6 = 163;
		const RANDOM_MONSTER_L7 = 164;
		const BORDER_GATE = 212;
		const FREELANCERS_GUILD = 213;
		const HERO_PLACEHOLDER = 214;
		const QUEST_GUARD = 215;
		const RANDOM_DWELLING = 216;
		const RANDOM_DWELLING_LVL = 217;
		const RANDOM_DWELLING_FACTION = 218;
		const GARRISON2 = 219;
		const ABANDONED_MINE = 220;
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

	$_Obj = [
		OBJECTS::NO_OBJ => 'NO_OBJ',
		OBJECTS::ALTAR_OF_SACRIFICE => 'ALTAR_OF_SACRIFICE',
		OBJECTS::ANCHOR_PO => 'ANCHOR_PO',
		OBJECTS::ARENA => 'ARENA',
		OBJECTS::ARTIFACT => 'ARTIFACT',
		OBJECTS::PANDORAS_BOX => 'PANDORAS_BOX',
		OBJECTS::BLACK_MARKET => 'BLACK_MARKET',
		OBJECTS::BOAT => 'BOAT',
		OBJECTS::BORDERGUARD => 'BORDERGUARD',
		OBJECTS::KEYMASTER => 'KEYMASTER',
		OBJECTS::BUOY => 'BUOY',
		OBJECTS::CAMPFIRE => 'CAMPFIRE',
		OBJECTS::CARTOGRAPHER => 'CARTOGRAPHER',
		OBJECTS::SWAN_POND => 'SWAN_POND',
		OBJECTS::COVER_OF_DARKNESS => 'COVER_OF_DARKNESS',
		OBJECTS::CREATURE_BANK => 'CREATURE_BANK',
		OBJECTS::CREATURE_GENERATOR1 => 'CREATURE_GENERATOR1',
		OBJECTS::CREATURE_GENERATOR2 => 'CREATURE_GENERATOR2',
		OBJECTS::CREATURE_GENERATOR3 => 'CREATURE_GENERATOR3',
		OBJECTS::CREATURE_GENERATOR4 => 'CREATURE_GENERATOR4',
		OBJECTS::CURSED_GROUND1 => 'CURSED_GROUND1',
		OBJECTS::CORPSE => 'CORPSE',
		OBJECTS::MARLETTO_TOWER => 'MARLETTO_TOWER',
		OBJECTS::DERELICT_SHIP => 'DERELICT_SHIP',
		OBJECTS::DRAGON_UTOPIA => 'DRAGON_UTOPIA',
		OBJECTS::EVENT => 'EVENT',
		OBJECTS::EYE_OF_MAGI => 'EYE_OF_MAGI',
		OBJECTS::FAERIE_RING => 'FAERIE_RING',
		OBJECTS::FLOTSAM => 'FLOTSAM',
		OBJECTS::FOUNTAIN_OF_FORTUNE => 'FOUNTAIN_OF_FORTUNE',
		OBJECTS::FOUNTAIN_OF_YOUTH => 'FOUNTAIN_OF_YOUTH',
		OBJECTS::GARDEN_OF_REVELATION => 'GARDEN_OF_REVELATION',
		OBJECTS::GARRISON => 'GARRISON',
		OBJECTS::HERO => 'HERO',
		OBJECTS::HILL_FORT => 'HILL_FORT',
		OBJECTS::GRAIL => 'GRAIL',
		OBJECTS::HUT_OF_MAGI => 'HUT_OF_MAGI',
		OBJECTS::IDOL_OF_FORTUNE => 'IDOL_OF_FORTUNE',
		OBJECTS::LEAN_TO => 'LEAN_TO',
		OBJECTS::LIBRARY_OF_ENLIGHTENMENT => 'LIBRARY_OF_ENLIGHTENMENT',
		OBJECTS::LIGHTHOUSE => 'LIGHTHOUSE',
		OBJECTS::MONOLITH_ONE_WAY_ENTRANCE => 'MONOLITH_ONE_WAY_ENTRANCE',
		OBJECTS::MONOLITH_ONE_WAY_EXIT => 'MONOLITH_ONE_WAY_EXIT',
		OBJECTS::MONOLITH_TWO_WAY => 'MONOLITH_TWO_WAY',
		OBJECTS::MAGIC_PLAINS1 => 'MAGIC_PLAINS1',
		OBJECTS::SCHOOL_OF_MAGIC => 'SCHOOL_OF_MAGIC',
		OBJECTS::MAGIC_SPRING => 'MAGIC_SPRING',
		OBJECTS::MAGIC_WELL => 'MAGIC_WELL',
		OBJECTS::MERCENARY_CAMP => 'MERCENARY_CAMP',
		OBJECTS::MERMAID => 'MERMAID',
		OBJECTS::MINE => 'MINE',
		OBJECTS::MONSTER => 'MONSTER',
		OBJECTS::MYSTICAL_GARDEN => 'MYSTICAL_GARDEN',
		OBJECTS::OASIS => 'OASIS',
		OBJECTS::OBELISK => 'OBELISK',
		OBJECTS::REDWOOD_OBSERVATORY => 'REDWOOD_OBSERVATORY',
		OBJECTS::OCEAN_BOTTLE => 'OCEAN_BOTTLE',
		OBJECTS::PILLAR_OF_FIRE => 'PILLAR_OF_FIRE',
		OBJECTS::STAR_AXIS => 'STAR_AXIS',
		OBJECTS::PRISON => 'PRISON',
		OBJECTS::PYRAMID => 'PYRAMID',
		OBJECTS::WOG_OBJECT => 'WOG_OBJECT',
		OBJECTS::RALLY_FLAG => 'RALLY_FLAG',
		OBJECTS::RANDOM_ART => 'RANDOM_ART',
		OBJECTS::RANDOM_TREASURE_ART => 'RANDOM_TREASURE_ART',
		OBJECTS::RANDOM_MINOR_ART => 'RANDOM_MINOR_ART',
		OBJECTS::RANDOM_MAJOR_ART => 'RANDOM_MAJOR_ART',
		OBJECTS::RANDOM_RELIC_ART => 'RANDOM_RELIC_ART',
		OBJECTS::RANDOM_HERO => 'RANDOM_HERO',
		OBJECTS::RANDOM_MONSTER => 'RANDOM_MONSTER',
		OBJECTS::RANDOM_MONSTER_L1 => 'RANDOM_MONSTER_L1',
		OBJECTS::RANDOM_MONSTER_L2 => 'RANDOM_MONSTER_L2',
		OBJECTS::RANDOM_MONSTER_L3 => 'RANDOM_MONSTER_L3',
		OBJECTS::RANDOM_MONSTER_L4 => 'RANDOM_MONSTER_L4',
		OBJECTS::RANDOM_RESOURCE => 'RANDOM_RESOURCE',
		OBJECTS::RANDOM_TOWN => 'RANDOM_TOWN',
		OBJECTS::REFUGEE_CAMP => 'REFUGEE_CAMP',
		OBJECTS::RESOURCE => 'RESOURCE',
		OBJECTS::SANCTUARY => 'SANCTUARY',
		OBJECTS::SCHOLAR => 'SCHOLAR',
		OBJECTS::SEA_CHEST => 'SEA_CHEST',
		OBJECTS::SEER_HUT => 'SEER_HUT',
		OBJECTS::CRYPT => 'CRYPT',
		OBJECTS::SHIPWRECK => 'SHIPWRECK',
		OBJECTS::SHIPWRECK_SURVIVOR => 'SHIPWRECK_SURVIVOR',
		OBJECTS::SHIPYARD => 'SHIPYARD',
		OBJECTS::SHRINE_OF_MAGIC_INCANTATION => 'SHRINE_OF_MAGIC_INCANTATION',
		OBJECTS::SHRINE_OF_MAGIC_GESTURE => 'SHRINE_OF_MAGIC_GESTURE',
		OBJECTS::SHRINE_OF_MAGIC_THOUGHT => 'SHRINE_OF_MAGIC_THOUGHT',
		OBJECTS::SIGN => 'SIGN',
		OBJECTS::SIRENS => 'SIRENS',
		OBJECTS::SPELL_SCROLL => 'SPELL_SCROLL',
		OBJECTS::STABLES => 'STABLES',
		OBJECTS::TAVERN => 'TAVERN',
		OBJECTS::TEMPLE => 'TEMPLE',
		OBJECTS::DEN_OF_THIEVES => 'DEN_OF_THIEVES',
		OBJECTS::TOWN => 'TOWN',
		OBJECTS::TRADING_POST => 'TRADING_POST',
		OBJECTS::LEARNING_STONE => 'LEARNING_STONE',
		OBJECTS::TREASURE_CHEST => 'TREASURE_CHEST',
		OBJECTS::TREE_OF_KNOWLEDGE => 'TREE_OF_KNOWLEDGE',
		OBJECTS::SUBTERRANEAN_GATE => 'SUBTERRANEAN_GATE',
		OBJECTS::UNIVERSITY => 'UNIVERSITY',
		OBJECTS::WAGON => 'WAGON',
		OBJECTS::WAR_MACHINE_FACTORY => 'WAR_MACHINE_FACTORY',
		OBJECTS::SCHOOL_OF_WAR => 'SCHOOL_OF_WAR',
		OBJECTS::WARRIORS_TOMB => 'WARRIORS_TOMB',
		OBJECTS::WATER_WHEEL => 'WATER_WHEEL',
		OBJECTS::WATERING_HOLE => 'WATERING_HOLE',
		OBJECTS::WHIRLPOOL => 'WHIRLPOOL',
		OBJECTS::WINDMILL => 'WINDMILL',
		OBJECTS::WITCH_HUT => 'WITCH_HUT',
		OBJECTS::HOLE => 'HOLE',
		OBJECTS::RANDOM_MONSTER_L5 => 'RANDOM_MONSTER_L5',
		OBJECTS::RANDOM_MONSTER_L6 => 'RANDOM_MONSTER_L6',
		OBJECTS::RANDOM_MONSTER_L7 => 'RANDOM_MONSTER_L7',
		OBJECTS::BORDER_GATE => 'BORDER_GATE',
		OBJECTS::FREELANCERS_GUILD => 'FREELANCERS_GUILD',
		OBJECTS::HERO_PLACEHOLDER => 'HERO_PLACEHOLDER',
		OBJECTS::QUEST_GUARD => 'QUEST_GUARD',
		OBJECTS::RANDOM_DWELLING => 'RANDOM_DWELLING',
		OBJECTS::RANDOM_DWELLING_LVL => 'RANDOM_DWELLING_LVL',
		OBJECTS::RANDOM_DWELLING_FACTION => 'RANDOM_DWELLING_FACTION',
		OBJECTS::GARRISON2 => 'GARRISON2',
		OBJECTS::ABANDONED_MINE => 'ABANDONED_MINE',
		OBJECTS::TRADING_POST_SNOW => 'TRADING_POST_SNOW',
		OBJECTS::CLOVER_FIELD => 'CLOVER_FIELD',
		OBJECTS::CURSED_GROUND2 => 'CURSED_GROUND2',
		OBJECTS::EVIL_FOG => 'EVIL_FOG',
		OBJECTS::FAVORABLE_WINDS => 'FAVORABLE_WINDS',
		OBJECTS::FIERY_FIELDS => 'FIERY_FIELDS',
		OBJECTS::HOLY_GROUNDS => 'HOLY_GROUNDS',
		OBJECTS::LUCID_POOLS => 'LUCID_POOLS',
		OBJECTS::MAGIC_CLOUDS => 'MAGIC_CLOUDS',
		OBJECTS::MAGIC_PLAINS2 => 'MAGIC_PLAINS2',
		OBJECTS::ROCKLANDS => 'ROCKLANDS',
	];*/


	/*$_BattlefieldBI = [
		-1 => 'NONE',
		0 => 'COASTAL,',
		1 => 'CURSED_GROUND,',
		2 => 'MAGIC_PLAINS,',
		3 => 'HOLY_GROUND,',
		4 => 'EVIL_FOG,',
		5 => 'CLOVER_FIELD,',
		6 => 'LUCID_POOLS,',
		7 => 'FIERY_FIELDS,',
		8 => 'ROCKLANDS,',
		9 => 'MAGIC_CLOUDS',
	];*/


	/*$_ArtifactID = [
		-1 => 'NONE',
		0 => 'SPELLBOOK',
		1 => 'SPELL_SCROLL',
		2 => 'GRAIL',
		3 => 'CATAPULT',
		4 => 'BALLISTA',
		5 => 'AMMO_CART',
		6 => 'FIRST_AID_TENT',
		7 => 'CENTAUR_AXE',
		//BLACKSHARD_OF_THE_DEAD_KNIGHT = 8,
		128 => 'ARMAGEDDONS_BLADE',
		135 => 'TITANS_THUNDER',
		//CORNUCOPIA = 140,
		//FIXME: the following is only true if WoG is enabled. Otherwise other mod artifacts will take these slots.
		144 => 'ART_SELECTION',
		145 => 'ART_LOCK', // FIXME: We must get rid of this one since it's conflict with artifact from mods. See issue 2455
		146 => 'AXE_OF_SMASHING',
		147 => 'MITHRIL_MAIL',
		148 => 'SWORD_OF_SHARPNESS',
		149 => 'HELM_OF_IMMORTALITY',
		150 => 'PENDANT_OF_SORCERY',
		151 => 'BOOTS_OF_HASTE',
		152 => 'BOW_OF_SEEKING',
		153 => 'DRAGON_EYE_RING',
		154 => '//HARDENED_SHIELD',
		//SLAVAS_RING_OF_POWER = 155
	];*/

	/*$_CreatureID = [
		-1 => 'NONE',
		10 => 'CAVALIER',
		11 => 'CHAMPION',
		32 => 'STONE_GOLEM',
		33 => 'IRON_GOLEM',
		42 => 'IMP',
		56 => 'SKELETON',
		58 => 'WALKING_DEAD',
		60 => 'WIGHTS',
		64 => 'LICHES',
		68 => 'BONE_DRAGON',
		70 => 'TROGLODYTES',
		110 => 'HYDRA',
		111 => 'CHAOS_HYDRA',
		112 => 'AIR_ELEMENTAL',
		113 => 'EARTH_ELEMENTAL',
		114 => 'FIRE_ELEMENTAL',
		115 => 'WATER_ELEMENTAL',
		116 => 'GOLD_GOLEM',
		117 => 'DIAMOND_GOLEM',
		120 => 'PSYCHIC_ELEMENTAL',
		145 => 'CATAPULT',
		146 => 'BALLISTA',
		147 => 'FIRST_AID_TENT',
		148 => 'AMMO_CART',
		149 => 'ARROW_TOWERS',
	];*/



?>