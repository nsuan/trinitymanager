<?php
if (isset($_GET['id'])) {
	$charid = $sqlr->smartquote($_GET['id']);
}
else {
	redirect("characters.php");
}

$query = $sqlr->query("SELECT id FROM realmlist WHERE name='".$userdata['realm']."'");
$res = $sqlr->fetch_assoc($query);
$realmid = $res['id'];

$sqlc = new SQL;
$sqlc->connect($characters_host[$realmid], $characters_user[$realmid], $characters_pass[$realmid], $characters_db[$realmid]);

$query = $sqlc->query("SELECT name FROM characters WHERE guid='$charid'");
$character = $sqlc->fetch_assoc($query);

$query = $sqlc->query("SELECT * FROM character_skills WHERE guid='$charid'");

function getskillname($skillid) {
	global $sqlt;

	$query = $sqlt->query("SELECT name FROM dbc_skillline WHERE id='$skillid'");
	$res = $sqlt->fetch_assoc($query);
	
	return $res['name'];
}

$output .= '<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Character Info: '. $character['name'].'</div>
					<div class="contentbox_body">
						<ul id="tabnav">
							<li><a href="characters.php?action=view&id='.$charid.'">Character</a></li>
							<li><a href="characters.php?action=reputation&id='.$charid.'">Reputation</a></li>
							<li><a href="#" id="tabnav-current">Skills</a></li>
							<li><a href="characters.php?action=talents&id='.$charid.'">Talents</a></li>
						</ul>
						<div id="tabcontent">
						<table class="stats_table">';

while ($skills = $sqlc->fetch_array($query)) {
	$output .= '<tr><td>'.getskillname($skills['skill']).'</td><td class="stats_outerbar"> <div class="bar_skill stats_bar" style="width:'.(100 * $skills['value']/$skills['max']).'%"></div><div class="bar_text">'.$skills['value'].'/'.$skills['max'].'<div></td></tr>';
}
$output .= '</div>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div id="clear">
		</div>';
require_once("footer.php");

echo $output;
?>