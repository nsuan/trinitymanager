<?php
function realmstatus($realm) {

	global $realm, $realmd_host, $realmd_user, $realmd_pass, $realmd_db, $theme;
	
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if (!socket_connect($socket,$realm['address'],$realm['port'])) {
		return '<img src="/themes/'.$theme.'/images/offline.png">';
	}
	else {
		return '<img src="/themes/'.$theme.'/images/online.png">';
	}
	
}

function realmlocation() {
	global $realm, $theme;
	
	if ($realm['timezone'] == 2) {
		return '<img src="/themes/'.$theme.'/images/usflag.png" alt="North America">';
	}
	elseif ($realm['timezone'] == 3) {
		return '<img src="/themes/'.$theme.'/images/britflag.png" alt="Oceanic">';
	}
	elseif ($realm['timezone'] == 4) {
		return '<img src="/themes/'.$theme.'/images/latinflag.png" alt="Latin America">';
	}
	elseif ($realm['timezone'] == 6) {
		return '<img src="/themes/'.$theme.'/images/koreaflag.png" alt="Korea">';
	}
	elseif ($realm['timezone'] == 14) {
		return '<img src="/themes/'.$theme.'/images/taiflag.png" alt="Thailand">';
	}
	elseif ($realm['timezone'] == 16) {
		return '<img src="/themes/'.$theme.'/images/chinaflag.png" alt="China">';
	}
	else {
		return '<img src="/themes/'.$theme.'/images/globalflag.png" alt="Other">';
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

?>