<?php
if (ini_get('session.auto_start'));
else session_start();

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
		if (is_file('/themes/'.$_COOKIE['theme'].'.css')) {
			$theme = $_SESSION['theme'];
		}
	}
}

require_once("libs/sql.php");
$sqlr = new SQL;
$sqlr->connect($realmd_host,$realmd_user,$realmd_pass,$realmd_db);

function redirect($location) {
     header("Location: ".$location);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<style>
.surround {
	background-color: #F1F3F5;
	border: 1px solid #C0C0C0;
	padding: 10px;
}

.loginbox {
	background-color: #E6E6E6;
	border: 1px solid #CCCACA;
}

.login {
	padding: 5px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-weight: bold;
}

label.login {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-weight: bold;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
}
#error {
	color: #F00;
	font-weight: bold;
	font-size: 16px;
}
</style>
</head>

<body>



