<?php

const ARTIFACT_INFO = [
	7 => ['name' => 'Centaur Axe', 'category' => 'Treasure'],
	8 => ['name' => 'Blackshard of the Dead Knight', 'category' => 'Minor'],
	9 => ['name' => 'Greater Gnoll\'s Flail', 'category' => 'Minor'],
	10 => ['name' => 'Ogre\'s Club of Havoc', 'category' => 'Major'],
	11 => ['name' => 'Sword of Hellfire', 'category' => 'Major'],
	12 => ['name' => 'Titan\'s Gladius', 'category' => 'Relic'],
	13 => ['name' => 'Shield of the Dwarven Lords', 'category' => 'Treasure'],
	14 => ['name' => 'Shield of the Yawning Dead', 'category' => 'Minor'],
	15 => ['name' => 'Buckler of the Gnoll King', 'category' => 'Minor'],
	16 => ['name' => 'Targ of the Rampaging Ogre', 'category' => 'Major'],
	17 => ['name' => 'Shield of the Damned', 'category' => 'Major'],
	18 => ['name' => 'Sentinel\'s Shield', 'category' => 'Relic'],
	19 => ['name' => 'Helm of the Alabaster Unicorn', 'category' => 'Treasure'],
	20 => ['name' => 'Skull Helmet', 'category' => 'Treasure'],
	21 => ['name' => 'Helm of Chaos', 'category' => 'Minor'],
	22 => ['name' => 'Crown of the Supreme Magi', 'category' => 'Minor'],
	23 => ['name' => 'Hellstorm Helmet', 'category' => 'Major'],
	24 => ['name' => 'Thunder Helmet', 'category' => 'Relic'],
	25 => ['name' => 'Breastplate of Petrified Wood', 'category' => 'Treasure'],
	26 => ['name' => 'Rib Cage', 'category' => 'Minor'],
	27 => ['name' => 'Scales of the Greater Basilisk', 'category' => 'Minor'],
	28 => ['name' => 'Tunic of the Cyclops King', 'category' => 'Major'],
	29 => ['name' => 'Breastplate of Brimstone', 'category' => 'Major'],
	30 => ['name' => 'Titan\'s Cuirass', 'category' => 'Relic'],
	31 => ['name' => 'Armor of Wonder', 'category' => 'Minor'],
	32 => ['name' => 'Sandals of the Saint', 'category' => 'Relic'],
	33 => ['name' => 'Celestial Necklace of Bliss', 'category' => 'Relic'],
	34 => ['name' => 'Lion\'s Shield of Courage', 'category' => 'Relic'],
	35 => ['name' => 'Sword of Judgement', 'category' => 'Relic'],
	36 => ['name' => 'Helm of Heavenly Enlightenment', 'category' => 'Relic'],
	37 => ['name' => 'Quiet Eye of the Dragon', 'category' => 'Treasure'],
	38 => ['name' => 'Red Dragon Flame Tongue', 'category' => 'Minor'],
	39 => ['name' => 'Dragon Scale Shield', 'category' => 'Major'],
	40 => ['name' => 'Dragon Scale Armor', 'category' => 'Relic'],
	41 => ['name' => 'Dragonbone Greaves', 'category' => 'Treasure'],
	42 => ['name' => 'Dragon Wing Tabard', 'category' => 'Minor'],
	43 => ['name' => 'Necklace of Dragonteeth', 'category' => 'Major'],
	44 => ['name' => 'Crown of Dragontooth', 'category' => 'Relic'],
	45 => ['name' => 'Still Eye of the Dragon', 'category' => 'Treasure'],
	46 => ['name' => 'Clover of Fortune', 'category' => 'Treasure'],
	47 => ['name' => 'Cards of Prophecy', 'category' => 'Treasure'],
	48 => ['name' => 'Ladybird of Luck', 'category' => 'Treasure'],
	49 => ['name' => 'Badge of Courage', 'category' => 'Treasure'],
	50 => ['name' => 'Crest of Valor', 'category' => 'Treasure'],
	51 => ['name' => 'Glyph of Gallantry', 'category' => 'Treasure'],
	52 => ['name' => 'Speculum', 'category' => 'Treasure'],
	53 => ['name' => 'Spyglass', 'category' => 'Treasure'],
	54 => ['name' => 'Amulet of the Undertaker', 'category' => 'Treasure'],
	55 => ['name' => 'Vampire\'s Cowl', 'category' => 'Minor'],
	56 => ['name' => 'Dead Man\'s Boots', 'category' => 'Major'],
	57 => ['name' => 'Garniture of Interference', 'category' => 'Major'],
	58 => ['name' => 'Surcoat of Counterpoise', 'category' => 'Major'],
	59 => ['name' => 'Boots of Polarity', 'category' => 'Relic'],
	60 => ['name' => 'Bow of Elven Cherrywood', 'category' => 'Treasure'],
	61 => ['name' => 'Bowstring of the Unicorn\'s Mane', 'category' => 'Minor'],
	62 => ['name' => 'Angel Feather Arrows', 'category' => 'Major'],
	63 => ['name' => 'Bird of Perception', 'category' => 'Treasure'],
	64 => ['name' => 'Stoic Watchman', 'category' => 'Treasure'],
	65 => ['name' => 'Emblem of Cognizance', 'category' => 'Minor'],
	66 => ['name' => 'Statesman\'s Medal', 'category' => 'Major'],
	67 => ['name' => 'Diplomat\'s Ring', 'category' => 'Major'],
	68 => ['name' => 'Ambassador\'s Sash', 'category' => 'Major'],
	69 => ['name' => 'Ring of the Wayfarer', 'category' => 'Major'],
	70 => ['name' => 'Equestrian\'s Gloves', 'category' => 'Minor'],
	71 => ['name' => 'Necklace of Ocean Guidance', 'category' => 'Major'],
	72 => ['name' => 'Angel Wings', 'category' => 'Relic'],
	73 => ['name' => 'Charm of Mana', 'category' => 'Treasure'],
	74 => ['name' => 'Talisman of Mana', 'category' => 'Treasure'],
	75 => ['name' => 'Mystic Orb of Mana', 'category' => 'Treasure'],
	76 => ['name' => 'Collar of Conjuring', 'category' => 'Treasure'],
	77 => ['name' => 'Ring of Conjuring', 'category' => 'Treasure'],
	78 => ['name' => 'Cape of Conjuring', 'category' => 'Treasure'],
	79 => ['name' => 'Orb of the Firmament', 'category' => 'Major'],
	80 => ['name' => 'Orb of Silt', 'category' => 'Major'],
	81 => ['name' => 'Orb of Tempestuous Fire', 'category' => 'Major'],
	82 => ['name' => 'Orb of Driving Rain', 'category' => 'Major'],
	83 => ['name' => 'Recanter\'s Cloak', 'category' => 'Major'],
	84 => ['name' => 'Spirit of Oppression', 'category' => 'Treasure'],
	85 => ['name' => 'Hourglass of the Evil Hour', 'category' => 'Treasure'],
	86 => ['name' => 'Tome of Fire Magic', 'category' => 'Relic'],
	87 => ['name' => 'Tome of Air Magic', 'category' => 'Relic'],
	88 => ['name' => 'Tome of Water Magic', 'category' => 'Relic'],
	89 => ['name' => 'Tome of Earth Magic', 'category' => 'Relic'],
	90 => ['name' => 'Boots of Levitation', 'category' => 'Relic'],
	91 => ['name' => 'Golden Bow', 'category' => 'Major'],
	92 => ['name' => 'Sphere of Permanence', 'category' => 'Major'],
	93 => ['name' => 'Orb of Vulnerability', 'category' => 'Relic'],
	94 => ['name' => 'Ring of Vitality', 'category' => 'Treasure'],
	95 => ['name' => 'Ring of Life', 'category' => 'Minor'],
	96 => ['name' => 'Vial of Lifeblood', 'category' => 'Major'],
	97 => ['name' => 'Necklace of Swiftness', 'category' => 'Treasure'],
	98 => ['name' => 'Boots of Speed', 'category' => 'Minor'],
	99 => ['name' => 'Cape of Velocity', 'category' => 'Major'],
	100 => ['name' => 'Pendant of Dispassion', 'category' => 'Treasure'],
	101 => ['name' => 'Pendant of Second Sight', 'category' => 'Major'],
	102 => ['name' => 'Pendant of Holiness', 'category' => 'Treasure'],
	103 => ['name' => 'Pendant of Life', 'category' => 'Treasure'],
	104 => ['name' => 'Pendant of Death', 'category' => 'Treasure'],
	105 => ['name' => 'Pendant of Free Will', 'category' => 'Treasure'],
	106 => ['name' => 'Pendant of Negativity', 'category' => 'Major'],
	107 => ['name' => 'Pendant of Total Recall', 'category' => 'Treasure'],
	108 => ['name' => 'Pendant of Courage', 'category' => 'Major'],
	109 => ['name' => 'Everflowing Crystal Cloak', 'category' => 'Major'],
	110 => ['name' => 'Ring of Infinite Gems', 'category' => 'Major'],
	111 => ['name' => 'Everpouring Vial of Mercury', 'category' => 'Major'],
	112 => ['name' => 'Inexhaustible Cart of Ore', 'category' => 'Minor'],
	113 => ['name' => 'Eversmoking Ring of Sulfur', 'category' => 'Major'],
	114 => ['name' => 'Inexhaustible Cart of Lumber', 'category' => 'Minor'],
	115 => ['name' => 'Endless Sack of Gold', 'category' => 'Relic'],
	116 => ['name' => 'Endless Bag of Gold', 'category' => 'Major'],
	117 => ['name' => 'Endless Purse of Gold', 'category' => 'Major'],
	118 => ['name' => 'Legs of Legion', 'category' => 'Treasure'],
	119 => ['name' => 'Loins of Legion', 'category' => 'Minor'],
	120 => ['name' => 'Torso of Legion', 'category' => 'Minor'],
	121 => ['name' => 'Arms of Legion', 'category' => 'Major'],
	122 => ['name' => 'Head of Legion', 'category' => 'Major'],
	123 => ['name' => 'Sea Captain\'s Hat', 'category' => 'Relic'],
	124 => ['name' => 'Spellbinder\'s Hat', 'category' => 'Relic'],
	125 => ['name' => 'Shackles of War', 'category' => 'Major'],
	126 => ['name' => 'Orb of Inhibition', 'category' => 'Relic'],
	127 => ['name' => 'Vial of Dragon Blood', 'category' => 'Relic'],
	128 => ['name' => 'Armageddon\'s Blade', 'category' => 'Relic'],
	129 => ['name' => 'Angelic Alliance', 'category' => 'Relic'],
	130 => ['name' => 'Cloak of the Undead King', 'category' => 'Relic'],
	131 => ['name' => 'Elixir of Life', 'category' => 'Relic'],
	132 => ['name' => 'Armor of the Damned', 'category' => 'Relic'],
	133 => ['name' => 'Statue of Legion', 'category' => 'Relic'],
	134 => ['name' => 'Power of the Dragon Father', 'category' => 'Relic'],
	135 => ['name' => 'Titan\'s Thunder', 'category' => 'Relic'],
	136 => ['name' => 'Admiral\'s Hat', 'category' => 'Relic'],
	137 => ['name' => 'Bow of the Sharpshooter', 'category' => 'Relic'],
	138 => ['name' => 'Wizard\'s Well', 'category' => 'Relic'],
	139 => ['name' => 'Ring of the Magi', 'category' => 'Relic'],
	140 => ['name' => 'Cornucopia', 'category' => 'Relic'],
	141 => ['name' => 'Diplomat\'s Cloak', 'category' => 'Relic'],
	142 => ['name' => 'Pendant of Reflection', 'category' => 'Relic'],
	143 => ['name' => 'Ironfist of the Ogre', 'category' => 'Relic'],
	146 => ['name' => 'Cannon', 'category' => 'Minor'],
	147 => ['name' => 'Trident of Dominion', 'category' => 'Major'],
	148 => ['name' => 'Shield of Naval Glory', 'category' => 'Major'],
	149 => ['name' => 'Royal Armor of Nix', 'category' => 'Major'],
	150 => ['name' => 'Crown of the Five Seas', 'category' => 'Major'],
	151 => ['name' => 'Wayfarer\'s Boots', 'category' => 'Major'],
	152 => ['name' => 'Runes of Imminency', 'category' => 'Treasure'],
	153 => ['name' => 'Demon\'s Horseshoe', 'category' => 'Treasure'],
	154 => ['name' => 'Shaman\'s Puppet', 'category' => 'Minor'],
	155 => ['name' => 'Hideous Mask', 'category' => 'Minor'],
	156 => ['name' => 'Ring of Suppression', 'category' => 'Treasure'],
	157 => ['name' => 'Pendant of Downfall', 'category' => 'Major'],
	158 => ['name' => 'Ring of Oblivion', 'category' => 'Major'],
	159 => ['name' => 'Cape of Silence', 'category' => 'Major'],
	160 => ['name' => 'Golden Goose', 'category' => 'Relic'],
	161 => ['name' => 'Horn of the Abyss', 'category' => 'Relic'],
	162 => ['name' => 'Charm of Eclipse', 'category' => 'Minor'],
	163 => ['name' => 'Seal of Sunset', 'category' => 'Minor'],
	164 => ['name' => 'Plate of Dying Light', 'category' => 'Relic'],
	165 => ['name' => 'Sleepkeeper', 'category' => 'Relic'],
];
