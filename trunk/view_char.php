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

$sqlw = new SQL;
$sqlw->connect($world_host[$realmid], $world_user[$realmid], $world_pass[$realmid], $world_db[$realmid]);

$query = $sqlc->query("SELECT data FROM characters WHERE guid='$charid'");
$res = $sqlc->fetch_array($query);
$chardata = $res['data'];

$query = $sqlc->query("SELECT guid, name, online, level FROM characters WHERE guid='$charid'");

if ($sqlc->num_rows($query) < 1) {
	redirect("characters.php?e=1");
}

$character = $sqlc->fetch_array($query);

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
									<span id="char_guild">'.getguild($chardata[151]).'</span></h3>
									<span id="char_level">Level '.$character['level'].'</span>
									<span id="char_race">'.charrace($character['name']).'</span>
									<span id="char_class">'.charclass($character['name']).'</span><br />
									<span id="char_location">Location</span> <br />
									<div id="char_health">Health: '.charhealth($character['name']).'</div>
									<div id="char_mana">Mana: '.charmana($character['name']).'</div>
								</div>
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
									<div id="model_scene" align="center">
										<object id="wowhead" type="application/x-shockwave-flash" data="http://static.wowhead.com/modelviewer/ModelView.swf" height="400" width="300">
										<param name="quality" value="high" />
										<param name="allowscriptaccess" value="always" />
										<param name="menu" value="false" />
										<param value="transparent" name="wmode" />
										<!-- item parameters -->
										<param name="flashvars" value="model='.strtolower(str_replace(' ','',charrace($character['name'])).chargender($character['name'])).'&amp;&amp;modelType=16&amp;ha=0&amp;hc=0&amp;fa=0&amp;sk=0&amp;fh=0&amp;fc=0&amp;contentPath=http://static.wowhead.com/modelviewer/&amp;blur=1&amp;equipList=1,'.itemdid(charequip($character['guid'],0)).',3,'.itemdid(charequip($character['guid'],2)).',16,'.itemdid(charequip($character['guid'],14)).',5,'.itemdid(charequip($character['guid'],4)).',4,'.itemdid(charequip($character['guid'],3)).',19,'.itemdid(charequip($character['guid'],18)).',9,'.itemdid(charequip($character['guid'],8)).',10,'.itemdid(charequip($character['guid'],9)).',6,'.itemdid(charequip($character['guid'],5)).',7,'.itemdid(charequip($character['guid'],6)).',8,'.itemdid(charequip($character['guid'],7)).',14,'.itemdid(charequip($character['guid'],16)).',21,'.itemdid(charequip($character['guid'],15)).',22,'.itemdid(charequip($character['guid'],16)).'">
										<param name="movie" value="http://static.wowhead.com/modelviewer/ModelView.swf" />
										</object>
									</div>
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
								$output .= getequiplower($character['guid'],15). "\n";
								$output .= getequiplower($character['guid'],16). "\n";
								$output .= getequiplower($character['guid'],17). "\n";						
$output .= '</div>
							</div>
							<div id="char_stats">
							
								<table>
									<tr><td class="tabular_odd">Holy Resistance</td><td class="tabular_even">15</td></tr>
									<tr><td class="tabular_odd">Arcane Resistance</td><td class="tabular_even">100</td></tr>
									<tr><td class="tabular_odd">Fire Resistance</td><td class="tabular_even">0</td></tr>
									<tr><td class="tabular_odd">Nature Resistance</td><td class="tabular_even">0</td></tr>
									<tr><td class="tabular_odd">Frost Resistance</td><td class="tabular_even">0</td></tr>
									<tr><td class="tabular_odd">Shadow Resistance</td><td class="tabular_even">60</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Strength</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Agility</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Stamina</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Intellect</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Spirit</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Armor</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Melee Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Attack Power</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Expertise</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Spell Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Heal</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Haste Rating</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Ranged Damage</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Ranged Power</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Hit Rating</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Crit</td><td class="tabular_even">23000</td></tr>
								</table>
								<table>
									<tr><td class="tabular_odd">Dodge</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Parry</td><td class="tabular_even">23000</td></tr>
									<tr><td class="tabular_odd">Block</td><td class="tabular_even">23000</td></tr>
								</table>
							</div>
							<div style="clear:both"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="clear">
		</div>';
		
require_once("footer.php");
echo $output;

?>