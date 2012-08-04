<?php
// http://wow.zamimg.com/images/wow/icons/large/inv_icon_name.jpg <-- Location to pull WoWhead icons 
function realmstatus($realm) {

	global $realm, $realmd_host, $realmd_user, $realmd_pass, $realmd_db, $theme;
	
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if (!socket_connect($socket,$realm['address'],$realm['port'])) {
		return '<img src="themes/'.$theme.'/images/offline.png">';
	}
	else {
		return '<img src="themes/'.$theme.'/images/online.png">';
	}
	
}

function realmlocation() {
	global $realm, $theme;
	
	if ($realm['timezone'] == 2) {
		return '<img src="themes/'.$theme.'/images/usflag.png" alt="North America">';
	}
	elseif ($realm['timezone'] == 3) {
		return '<img src="themes/'.$theme.'/images/britflag.png" alt="Oceanic">';
	}
	elseif ($realm['timezone'] == 4) {
		return '<img src="themes/'.$theme.'/images/latinflag.png" alt="Latin America">';
	}
	elseif ($realm['timezone'] == 6) {
		return '<img src="themes/'.$theme.'/images/koreaflag.png" alt="Korea">';
	}
	elseif ($realm['timezone'] == 14) {
		return '<img src="themes/'.$theme.'/images/taiflag.png" alt="Thailand">';
	}
	elseif ($realm['timezone'] == 16) {
		return '<img src="themes/'.$theme.'/images/chinaflag.png" alt="China">';
	}
	else {
		return '<img src="themes/'.$theme.'/images/globalflag.png" alt="Other">';
	}
}

function realmtype() {
	global $realm;
	
	if (($realm['icon'] == 0) || ($realm['icon'] == 4)) {
		return 'Normal';
	}
	elseif ($realm['icon'] == 1) {
		return 'PVP';
	}
	elseif ($realm['icon'] == 6) {
		return 'RP';
	}
	elseif ($realm['icon'] == 8) {
		return 'RP PVP';
	}
}

function useronline($username) {
	global $account, $theme;

	if ($account['online'] = 0) {
		return '<img src="themes/'.$theme.'/images/online.png">';
	}
	else {
		return '<img src="themes/'.$theme.'/images/offline.png">';
	}
	
}

function userlocation($username) {
	global $account, $theme;
	if ($account['locale'] == 2) {
		return '<img src="themes/'.$theme.'/images/usflag.png" alt="North America">';
	}
	elseif ($account['locale'] == 3) {
		return '<img src="themes/'.$theme.'/images/britflag.png" alt="Oceanic">';
	}
	elseif ($account['locale'] == 4) {
		return '<img src="themes/'.$theme.'/images/latinflag.png" alt="Latin America">';
	}
	elseif ($account['locale'] == 6) {
		return '<img src="themes/'.$theme.'/images/koreaflag.png" alt="Korea">';
	}
	elseif ($account['locale'] == 14) {
		return '<img src="themes/'.$theme.'/images/taiflag.png" alt="Thailand">';
	}
	elseif ($account['locale'] == 16) {
		return '<img src="themes/'.$theme.'/images/chinaflag.png" alt="China">';
	}
	else {
		return '<img src="themes/'.$theme.'/images/globalflag.png" alt="Other">';
	}
	
}
function uptime() {
	global $realm, $realmd_host, $realmd_user, $realmd_pass, $realmd_db;
	
	$id = $realm['id'];
	
	$sqlr = new SQL;
	$sqlr->connect($realmd_host,$realmd_user,$realmd_pass,$realmd_db);
	$query = $sqlr->query("SELECT uptime FROM uptime WHERE realmid='$id'");
	$result = mysql_fetch_assoc($query);
	
	$up = $result['uptime'];
	
	$secs = intval($up % 60);
	$mins = intval($up / 60 % 60);
	$hours = intval($up / 3600 % 24);
	$days = intval($up / 86400);
	return($days . " days " . $hours . " hours " . $mins . " minutes " . $secs . " seconds");

}

function charrace($charname) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT race FROM characters WHERE name='$charname'");
	$res = $sqlc->fetch_assoc($query);
	
	$race = $res['race'];
	
	$raceid = array(
	'1' => 'Human',
	'2' => 'Orc',
	'3' => 'Dwarf',
	'4' => 'Night Elf',
	'5' => 'Undead',
	'6' => 'Tauren',
	'7' => 'Gnome',
	'8' => 'Troll',
	'10' => 'Blood Elf',
	'11' => 'Draenei'
	);
	return $raceid[$race];
}

function charclass($charname) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT class FROM characters WHERE name='$charname'");
	$res = $sqlc->fetch_array($query);
	
	$class = $res['class'];
	
	$classid = array(
	'1' => 'Warrior',
	'2' => 'Paladin',
	'3' => 'Hunter',
	'4' => 'Rogue',
	'5' => 'Priest',
	'6' => 'Death Knight',
	'7' => 'Shaman',
	'8' => 'Mage',
	'9' => 'Warlock',
	'11' => 'Druid'
	);
	
	return $classid[$class];
}

function charhealth($charname) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT health FROM characters WHERE name='$charname'");
	$res = $sqlc->fetch_assoc($query);
		
	return $res['health'];
}

function charmana($charname) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT power1 FROM characters WHERE name='$charname'");
	$res = $sqlc->fetch_assoc($query);
	
	return $res['power1'];
}

function charstat($charid,$stat) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT `$stat` FROM character_stats WHERE guid='$charid'");
	$res = $sqlc->fetch_assoc($query);
	
	if ($res == null) {
		return 0;
	}
	
	else{
		return $res[$stat];
	}
}

function getequip($charid,$slotid) {
	global $sqlc, $sqlt, $sqlw, $icon_dir, $theme, $download_icons, $realmid;

		switch ($slotid) {
	
			case 15:
				$slot = "item_mainhand";
				break;
			case 16:
				$slot = "item_offhand";
				break;
			case 17:
				$slot = "item_ranged";
				break;
			default:
				$slot = "item";
				break;
		}
		
		$query = $sqlc->query("SELECT * FROM character_inventory WHERE guid=$charid AND slot=$slotid");
		$result = $sqlc->fetch_array($query);
		$item = $result['item'];

		$query = $sqlc->query("SELECT itemEntry FROM item_instance WHERE guid=$item");
		$result = $sqlc->fetch_array($query);
		$itemid = $result['itemEntry'];

		$queryw = $sqlw->query("SELECT displayid FROM item_template WHERE entry=$itemid");
		$result = $sqlw->fetch_array($queryw);
		$displayid = $result['displayid'];

		$queryt = $sqlt->query("SELECT icon FROM dbc_itemdisplayinfo WHERE entry=$displayid");
		$result = $sqlt->fetch_array($queryt);
		$iicon = strtolower($result['icon']);
		$icon = strtolower($result['icon'].".png");

		if ($itemid == null) {
			return '<div class="itembox" id="'.$slot.'"><ins style="background-image: url(themes/'.$theme.'/'.$icon_dir.'/medium/inv_generic.png);"></ins><del></del></div>';
		}
		else {
			if (file_exists("./themes/trinitymanager/images/icons/medium/".$icon)) {
				return '<div class="itembox" id="'.$slot.'"><a href="http://w/?item='.$itemid.'"><ins style="background-image: url(themes/'.$theme.'/'.$icon_dir.'/medium/'.$icon.');"></ins><del></del></a></div>';
			}

			else {
				if ($download_icons) {
					//download_icon($icon);
					echo "";
				}
				else {
					return '<div class="itembox" id="'.$slot.'"><a href="http://www.wowhead.com/?item='.$itemid.'"><ins style="background-image: url(localhost/~trinitymanager/themes/trinitymanager/images/icons/medium/'.$iicon.'.png);"></ins><del></del></a></div>';
				}
			}
		}
}

function charequip($charid,$slotid) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT item_template FROM character_inventory WHERE guid='$charid' AND slot='$slotid'");
	$res = $sqlc->fetch_assoc($query);
		return $res['item_template'];
}

function chargender($charname) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT gender FROM characters WHERE name='$charname'");
	$res = $sqlc->fetch_assoc($query);
	
	$gender = $res['gender'];
	
	$genderid = array(
	'0' => "Male",
	'1' => "Male",
	'2' => "Female"
	);
	
	return $genderid[$gender];
}

function itemicon($itemid) {
	global $sqlt, $theme, $icon_dir, $get_web_icons, $displayid;
	
	$query = $sqlt->query("SELECT name FROM dbc_itemdisplayinfo WHERE id='$displayid'");
	$res = $sqlt->fetch_assoc($query);
	
	$icon = $res['name'];
	
	if ($get_web_icons) {
		if (!file_exists('themes/'.$theme.'/'.$icon_dir.'/'.$icon.'.jpg')) {
			download_icon($icon);
		}
	}
	else {
		if (file_exists('themes/'.$theme.'/'.$icon_dir.'/'.$icon.'.jpg')) {
			return 'themes/'.$theme.'/'.$icon_dir.'/'.strtolower($icon).'.jpg';
		}
		else {
			return 'http://static.wowhead.com/images/icons/medium/'.strtolower($icon).'.jpg';
		}
	}
}

function display_model() {
	global $character, $sqlc;
	
	$query = $sqlc->query("SELECT data FROM characters WHERE guid='".$character['guid']."'");
	$res = $sqlc->fetch_array($query);
	
	$data = explode(' ',$res['data']);
	
	$item_head = $data[260];
	$item_neck = $data[278];
	$item_shoulder = $data[296];
	$item_shirt = $data[314];
	$item_chest = $data[332];
	$item_belt = $data[350];
	$item_legs = $data[268];
	$item_feet = $data[386];
	$item_wrist = $data[404];
	$item_gloves = $data[422];
	$item_finger1 = $data[440];
	$item_finger2 = $data[458];
	$item_trinket1 = $data[476];
	$item_trinket2 = $data[494];
	$item_back = $data[512];
	$item_main_hand = $data[530];
	$item_off_hand = $data[548];
	$item_ranged = $data[566];
	
}

function itemdid($entry) {
	global $sqlw;
	
	$query = $sqlw->query("SELECT displayid FROM item_template WHERE entry='$entry'");
	$res = $sqlw->fetch_array($query);
	
	$displayid = $res['displayid'];
	
	if ($displayid == 0) {
		return "0";
	}
	else {
		return $displayid;
	}
}

function getguild($guildid) {
		global $sqlc;
		
		$query = $sqlc->query("SELECT name FROM guild WHERE guildid='$guildid'");
		$res = $sqlc->fetch_assoc($query);
		
		if ($res['name'] == 0) {
			return 'No Guild';
		}
		else {
			return $res['name'];
		}
}

function getguildbychar($charid) {
	global $sqlc;
	
	$query = $sqlc->query("SELECT guildid FROM guild_member WHERE guid='$charid'");
	$res = $sqlc->fetch_assoc($query);
	
	if ($res['guildid'] == 0) {
		return '';
	}
	else {
		return $res['guildid'];
	}
}

function getcharlocation($charid) {
	global $sqlc, $sqlt;
	
	$query = $sqlc->query("SELECT map FROM characters WHERE guid='$charid'");
	$res = $sqlc->fetch_assoc($query);
	
	if ($res['map'] == 0) {
		return '';
	}
	else {
		$query = $sqlt->query("SELECT name FROM dbc_maps WHERE id='".$res['map']."'");
		$res = $sqlt->fetch_assoc($query);
		if ($res['name'] == null) {
			return '';
		}
		else {
			return $res['name'];
		}
	} 
}

function getfactionname($factionid) {
		global $sqlt;
		
		$query = $sqlt->query("SELECT field_23 FROM dbc_faction WHERE id='$factionid'");
		$res = $sqlt->fetch_assoc($query);
			return $res['field_23'];
}

function charbar($charname) {
	global $sqlc;
	
	if (charclass($charname) == "Warrior") {
		$query = $sqlc->query("SELECT power2 FROM characters WHERE name='$charname'");
		$res = $sqlc->fetch_assoc($query);
		
		if ($res['power2'] == null) {
			$level = 0;
		}
		else {
			$level = $res['power2'];
		}
		return '<div id="char_rage">Rage: '.$level.'</div>';
	}
	elseif (charclass($charname) == "Hunter") {
		$query = $sqlc->query("SELECT power3 FROM characters WHERE name='$charname'");
		$res = $sqlc->fetch_assoc($query);
		
		if ($res['power3'] == null) {
			$level = 0;
		}
		else {
			$level = $res['power3'];
		}
		return '<div id="char_focus">Focus: '.$level.'</div>';
	}
	elseif (charclass($charname) == "Death Knight") {
		$query = $sqlc->query("SELECT power7 FROM characters WHERE name='$charname'");
		$res = $sqlc->fetch_assoc($query);
		
		if ($res['power7'] == null) {
			$level = 0;
		}
		else {
			$level = $res['power7'];
		}
		return '<div id="char_rune">Runic Power: '.$level.'</div>';
	}
	else {
		$query = $sqlc->query("SELECT power1 FROM characters WHERE name='$charname'");
		$res = $sqlc->fetch_assoc($query);
		
		if ($res['power1'] == null) {
			$level = 0;
		}
		else {
			$level = $res['power1'];
		}
		return '<div id="char_mana">Mana: '.$level.'</div>';
	}
}


?>