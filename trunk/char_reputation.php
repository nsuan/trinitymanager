<?php
require_once("header.php");

$sqlc = new SQL;
$sqlc->connect($characters_host[$realmid],$characters_user[$realmid],$characters_pass[$realmid],$characters_db[$realmid]);
$charid = $sqlc->smartquote($_GET['id']);

$sqlw = new SQL;
$sqlw->connect($world_host[$realmid], $world_user[$realmid], $world_pass[$realmid], $world_db[$realmid]);

$query = $sqlc->query("SELECT * FROM character_reputation WHERE guid='$charid' AND (flags & 1=1)");

$output .= '<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Character Info</div>
					<div class="contentbox_body">
						<ul id="tabnav">
							<li><a href="characters.php?action=viewchar&id='.$charid.'">Character</a></li>
							<li><a href="characters.php?action=reputation&id='.$charid.'" id="tabnav-current">Reputation</a></li>
							<li><a href="characters.php?action=skills&id='.$charid.'">Skills</a></li>
							<li><a href="characters.php?action=talents&id='.$charid.'">Talents</a></li>
						</ul>
						<div id="tabcontent">
						<table class="stats_table">';
						
while ($reputation = $sqlc->fetch_array($query)) {
	if (($reputation['standing'] <= 3000) && ($reputation['standing'] >= -3000)) {
		$output .= '<tr><td>'.getfactionname($reputation['faction']).'</td><td class="stats_outerbar"> <div class="bar_neutral stats_bar" style="width:'.(100 * $reputation['standing']/3000).'%"></div><div class="bar_text">Neutral: '.$reputation['standing'].'/3000<div></td></tr>';
	}
	elseif (($reputation['standing'] <= 5999) && ($reputation['standing'] >= 3001)) {
		$output .= '<tr><td>'.getfactionname($reputation['faction']).'</td><td class="stats_outerbar"> <div class="bar_good stats_bar" style="width:'.(100 * $reputation['standing']/6000).'%"></div><div class="bar_text">Friendly: '.$reputation['standing'].'/6000<div></td></tr>';
	}
	elseif (($reputation['standing'] <= 11999) && ($reputation['standing'] >= 6000)) {
		$output .= '<tr><td>'.getfactionname($reputation['faction']).'</td><td class="stats_outerbar"> <div class="bar_good stats_bar" style="width:'.(100 * $reputation['standing']/12000).'%"></div><div class="bar_text">Honored: '.$reputation['standing'].'/12000<div></td></tr>';
	}
	elseif (($reputation['standing'] <= 20999) && ($reputation['standing'] >= 12000)) {
		$output .= '<tr><td>'.getfactionname($reputation['faction']).'</td><td class="stats_outerbar"> <div class="bar_good stats_bar" style="width:'.(100 * $reputation['standing']/21000).'%"></div><div class="bar_text">Revered: '.$reputation['standing'].'/21000<div></td></tr>';
	}
	elseif (($reputation['standing'] <= 22000) && ($reputation['standing'] >= 21000)) {
		$output .= '<tr><td>'.getfactionname($reputation['faction']).'</td><td class="stats_outerbar"> <div class="bar_good stats_bar" style="width:'.(100 * $reputation['standing']/22000).'%"></div><div class="bar_text">Exalted: '.$reputation['standing'].'/22000<div></td></tr>';
	}
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