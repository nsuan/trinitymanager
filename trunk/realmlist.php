<?php
require_once("header.php");
require_once("libs/functions.php");

// If not logged in, redirect to login page for logging in!
if (empty($userdata)) {
	redirect("login.php");
}

//Display the realm list, status of each realm, and the population and locale.
$output .= '<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Realm status </div>
					<div class="contentbox_body">
					<center>Current Realm: '.$userdata['realm'].' Status: '.realmstatus($userdata['realm']).' Uptime: '.uptime($userdata['realm']).'</center><br /><br />
					<table class="tabular" width="100%">
					<tr><th>Realm name</th><th>Status</th><th>Location</th><th>Players</th><th>Uptime</th><th>Type</th></tr>';
					$query = $sqlr->query("SELECT * FROM realmlist ORDER BY id ASC");
while ($realm = mysql_fetch_array($query)) {
	if ($realm['name'] == $userdata['realm']) {
		$output .= '<tr class="tabular_odd"><td>'.$realm['name'].'</td><td>'.realmstatus($realm['name']).'</td><td>'.realmlocation($realm['name']).'</td><td>'.$realm['population'].'</td><td>'.uptime($realm['name']).'</td><td>'.realmtype($realm['name']).'</td></tr>';
	}
	else {
		$output .= '<tr class="tabular_even"><td>'.$realm['name'].'</td><td>'.realmstatus($realm['name']).'</td><td>'.realmlocation($realm['name']).'</td><td>'.$realm['population'].'</td><td>'.uptime($realm['name']).'</td><td>'.realmtype($realm['name']).'</td></tr>';
		}
	}
$output .= '	
					</table>
					</div>
				</div>
			</div>
			<div id="clear">
			</div>
		</div>';
		
		
require_once("footer.php");	
echo $output;
?>