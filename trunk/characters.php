<?php
require_once("header.php");

if (empty($userdata)) {
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
	elseif ($page == "talents") {
		require_once("char_talents.php");
	}
	elseif ($page == "reputation") {
		require_once("char_reputation.php");
	}
}

else {
	require_once("char_main.php");
}
?>