<?php
require_once("header.php");

ini_set("display_errors","On");

if (isset($_GET['id'])) {
	$sqlt = new SQL;
	$charid = addslashes($_GET['id']);

	if ($_GET['id'] == null) {
		$charid = -1;
	}
}

else {
	$charid = -1;
	$charname = "Invalid ID!";
	#redirect("characters.php");
}

$sqlt = new SQL;
$sqlt->connect($trin_host, $trin_user, $trin_pass, $trin_db);

$sqlc = new SQL;
$sqlc->connect($characters_host[$realmid], $characters_user[$realmid], $characters_pass[$realmid], $characters_db[$realmid]);

$sqlw = new SQL;
$sqlw->connect($world_host[$realmid], $world_user[$realmid], $world_pass[$realmid], $world_db[$realmid]);

$query = $sqlc->query("SELECT guid, name, online, level FROM characters WHERE guid=$charid");
$character = $sqlc->fetch_array($query);

if ($sqlc->num_rows($query) < 1) {
	$charname = "Invalid ID!";
	$output .= '
		<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">'.$charname.'</div>
					<div class="contentbox_body">';
}
else {
getguildbychar($charid); //Added to accomodate for the removal of the 'data' blob in the database

$output .= '			<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Character Info: '.$character['name'].'</div>
					<div class="contentbox_body">
						<ul id="tabnav">
							<li><a href="#" id="tabnav-current">Character</a></li>
							<li><a href="characters.php?action=reputation&id='.$character['guid'].'">Reputation</a></li>
							<li><a href="characters.php?action=skills&id='.$character['guid'].'">Skills</a></li>
							<li><a href="characters.php?action=talents&id='.$character['guid'].'">Talents</a></li>
						</ul>
						<div id="tabcontent">
							<div id="char_panel">
								<div id="char_maininfo">
									<h3><span id="char_name">'.$character['name'].'</span> <br />
									<span id="char_guild">'.getguildbychar($character['name']).'</span></h3>
									<span id="char_level">Level '.$character['level'].'</span>
									<span id="char_race">'.charrace($character['name']).'</span>
									<span id="char_class">'.charclass($character['name']).'</span><br />
									<span id="char_location">'.getcharlocation($character['guid']).'</span> <br />
									<div id="char_health">Health: '.charhealth($character['name']).'</div>';
									$output .= charbar($character['name']);
								$output .='</div>
								<div style="float:left">
									<!-- generate icon urls inside of ins style attribute-->'. "\n";
									
								$output .= getequip($character['guid'],0). "\n";
								$output .= getequip($character['guid'],1). "\n";
								$output .= getequip($character['guid'],2). "\n";
								$output .= getequip($character['guid'],14). "\n";
								$output .= getequip($character['guid'],4). "\n";
								$output .= getequip($character['guid'],3). "\n";
								$output .= getequip($character['guid'],18). "\n";
								$output .= getequip($character['guid'],8). "\n"; 
$output .= '</div>
								<div id="char_preview">
									<div id="model_scene" align="center">';/* Coming soon!'; Removed until confirmed working again
										<object id="wowhead" type="application/x-shockwave-flash" data="http://static.wowhead.com/modelviewer/ModelView.swf" height="400" width="300">
										<param name="quality" value="high" />
										<param name="allowscriptaccess" value="always" />
										<param name="menu" value="false" />
										<param value="transparent" name="wmode" />
										<!-- item parameters -->
										<param name="flashvars" value="model='.strtolower(str_replace(' ','',charrace($character['name'])).chargender($character['name'])).'&amp;&amp;modelType=16&amp;ha=0&amp;hc=0&amp;fa=0&amp;sk=0&amp;fh=0&amp;fc=0&amp;contentPath=http://static.wowhead.com/modelviewer/&amp;blur=1&amp;equipList=1,'.itemdid(charequip($character['guid'],0)).',3,'.itemdid(charequip($character['guid'],2)).',16,'.itemdid(charequip($character['guid'],14)).',5,'.itemdid(charequip($character['guid'],4)).',4,'.itemdid(charequip($character['guid'],3)).',19,'.itemdid(charequip($character['guid'],18)).',9,'.itemdid(charequip($character['guid'],8)).',10,'.itemdid(charequip($character['guid'],9)).',6,'.itemdid(charequip($character['guid'],5)).',7,'.itemdid(charequip($character['guid'],6)).',8,'.itemdid(charequip($character['guid'],7)).',14,'.itemdid(charequip($character['guid'],16)).',21,'.itemdid(charequip($character['guid'],15)).',22,'.itemdid(charequip($character['guid'],16)).'">
										<param name="movie" value="http://static.wowhead.com/modelviewer/ModelView.swf" />
										</object> */
								$output .=' </div>
								</div><div style="float:left">'; 
								$output .= getequip($character['guid'],9). "\n";
								$output .= getequip($character['guid'],5). "\n";
								$output .= getequip($character['guid'],6). "\n";
								$output .= getequip($character['guid'],7). "\n";
								$output .= getequip($character['guid'],10). "\n";
								$output .= getequip($character['guid'],11). "\n";
								$output .= getequip($character['guid'],12). "\n";
								$output .= getequip($character['guid'],13). "\n"; 
$output .= '</div>
								<div style="clear:left">'. "\n";
								$output .= getequip($character['guid'],15). "\n";
								$output .= getequip($character['guid'],16). "\n";
								$output .= getequip($character['guid'],17). "\n";				
$output .= '</div>
							</div>
							<div id="char_stats">
							
								<table>
									<tr><td class="tabular_odd">Holy Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resHoly").'</td></tr>
									<tr><td class="tabular_odd">Arcane Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resArcane").'</td></tr>
									<tr><td class="tabular_odd">Fire Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resFire").'</td></tr>
									<tr><td class="tabular_odd">Nature Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resNature").'</td></tr>
									<tr><td class="tabular_odd">Frost Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resFrost").'</td></tr>
									<tr><td class="tabular_odd">Shadow Resistance</td><td class="tabular_even">'.charstat($character['guid'],"resShadow").'</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Strength</td><td class="tabular_even">'.charstat($character['guid'],"strength").'</td></tr>
									<tr><td class="tabular_odd">Agility</td><td class="tabular_even">'.charstat($character['guid'],"agility").'</td></tr>
									<tr><td class="tabular_odd">Stamina</td><td class="tabular_even">'.charstat($character['guid'],"stamina").'</td></tr>
									<tr><td class="tabular_odd">Intellect</td><td class="tabular_even">'.charstat($character['guid'],"intellect").'</td></tr>
									<tr><td class="tabular_odd">Spirit</td><td class="tabular_even">'.charstat($character['guid'],"spirit").'</td></tr>
									<tr><td class="tabular_odd">Armor</td><td class="tabular_even">'.charstat($character['guid'],"armor").'</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Melee Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Attack Power</td><td class="tabular_even">'.charstat($character['guid'],"attackPower").'</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">'.charstat($character['guid'],"critPct").'</td></tr>
									<tr><td class="tabular_odd">Expertise</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Spell Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Heal</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">'.charstat($character['guid'],"spellCritPct").'</td></tr>
									<tr><td class="tabular_odd">Haste Rating</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Ranged Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Ranged Power</td><td class="tabular_even">'.charstat($character['guid'],"rangedAttackPower").'</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">'.charstat($character['guid'],"rangedCritPct").'</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Dodge</td><td class="tabular_even">'.charstat($character['guid'],"dodgePct").'</td></tr>
									<tr><td class="tabular_odd">Parry</td><td class="tabular_even">'.charstat($character['guid'],"parryPct").'</td></tr>
									<tr><td class="tabular_odd">Block</td><td class="tabular_even">'.charstat($character['guid'],"blockPct").'</td></tr>
								</table>
							</div>
							<div style="clear:both"></div>
						</div>
					</div>';
}
$output .= '
</div>
			</div>
		</div>
		<div id="clear">
		</div>';
		
require_once("footer.php");
echo $output;

?>