<?php
require_once("header.php");

if (!isset($userdata)) {
	redirect("login.php");
}

if (isset($_GET['action'])) {
	$page = $_GET['action'];
	

	if ($page == "view") {
		require_once("view_char.php");
	}
	elseif ($page == "skills") {
		require_once("skills.php");
	}
}

else {
	require_once("char_main.php");
}
?>