<?php
if (ini_get('session.auto_start'));
else session_start();

ini_set('display_errors','Off');
if (file_exists('libs/config.php')) {
	require_once('libs/config.php');
}
else {
	exit('<center><b>Error:</b><code>/libs/config.php</code> Not found. Please replace it in your <code>/libs/</code> directory and reload page.</center>');
}


if (isset($_COOKIE['language'])) {
	if (file_exists('lang/'.$_COOKIE['language'].'.php')) {
		$lang = $_SESSION['language'];
	}
}
else $lang = $language;

require_once('lang/'. $lang.'.php');

if (isset($_COOKIE['theme'])) {
	if (is_dir('/themes/'.$_COOKIE['theme'])) {
		if (is_file('/themes/'.$_COOKIE['theme'].'/style.css')) {
			$theme = $_SESSION['theme'];
		}
	}
}

require_once("libs/sql.php");
require_once("libs/functions.php");
$sqlr = new SQL;
$sqlr->connect($realmd_host,$realmd_user,$realmd_pass,$realmd_db);

$sqlt = new SQL;
$sqlt->connect($trin_host,$trin_user,$trin_pass,$trin_db);

if (isset($_SESSION['uname'])) {
	$query = $sqlr->query("SELECT * FROM account WHERE username='".$_SESSION['uname']."'");
	$userdata = mysql_fetch_array($query);
}

if (!empty($_POST['changerealm'])) {
	$_SESSION['realm'] = $_POST['droprealm'];
	$query = $sqlr->query("SELECT id FROM realmlist WHERE name='".$_SESSION['realm']."'");
	$realmid = mysql_fetch_array($query);
	$realmid = $realmid['id'];
}

if (isset($_SESSION['realm'])) {
	$userdata['realm'] = $_SESSION['realm'];
	$query = $sqlr->query("SELECT id FROM realmlist WHERE name='".$_SESSION['realm']."'");
	$realmid = mysql_fetch_array($query);
	$realmid = $realmid['id'];
}

function redirect($location) {
     header("Location: ".$location);
}

function microtime_float ()
{
    list ($msec, $sec) = explode(' ', microtime());
    $microtime = (float)$msec + (float)$sec;
    return $microtime;
}

$start = microtime_float();
$output = '';

$output .= '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$title.'</title>

<link rel="stylesheet" type="text/css" href="themes/'.$theme.'/style.css" media="all" />
	<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>

</head>

<body>
	<div class="container">
		<div class="header">
		<div class="header_big">TrinityManager
		<div class="header_small">Account Management System</div></div>
		</div>
		<div class="main">
			<div class="leftmenu">';
				include("navigation.php");

			$output .= '</div>';
			
			//if (isset($userdata)) { require_once("motd.php"); }