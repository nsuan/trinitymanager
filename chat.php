<?php
require_once("header.php");

// All this info below must stay in tact. Do NOT edit or IRC Chat will be unfunctional!

// Check if IRC Chat is enabled. If not, do not display the applet.

if (!$enable_irc_chat) {
	redirect("index.php");
}
$output .= '<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Realm status </div>
					<div class="contentbox_body">
<applet code="IRCApplet.class" archive="/libs/irc/irc.jar, /libs/irc/pixx.jar" width=590 height=400>
<param name="CABINETS" value="libs/irc/irc.cab,/libs/irc/pixx.cab,/libs/irc/securedirc.cab">

<param name="nick" value="'.$userdata['username'].'">
<param name="alternatenick" value="'.$irc_default_nick.'???">
<param name="name" value="Java User">
<param name="host" value="'.$irc_server.'">
<param name="port" value="'.$irc_port.'">
<param name="gui" value="pixx">
<param name="quitmessage" value="PJIRC forever!">
<param name="command1" value="/join '.$irc_channel.'">
<param name="language"      value="/libs/irc/lang/english" />
<param name="pixx:language" value="/libs/irc/lang/pixx-english" />

<param name="style:bitmapsmileys" value="true">
<param name="style:smiley1" value=":) /libs/irc/images/sourire.gif">
<param name="style:smiley2" value=":-) /libs/irc/images/sourire.gif">
<param name="style:smiley3" value=":-D /libs/irc/images/content.gif">
<param name="style:smiley4" value=":d /libs/irc/images/content.gif">
<param name="style:smiley5" value=":-O /libs/irc/images/OH-2.gif">
<param name="style:smiley6" value=":o /libs/irc/images/OH-1.gif">
<param name="style:smiley7" value=":-P /libs/irc/images/langue.gif">
<param name="style:smiley8" value=":p /libs/irc/images/langue.gif">
<param name="style:smiley9" value=";-) /libs/irc/images/clin-oeuil.gif">
<param name="style:smiley10" value=";) /libs/irc/images/clin-oeuil.gif">
<param name="style:smiley11" value=":-( /libs/irc/images/triste.gif">
<param name="style:smiley12" value=":( /libs/irc/images/triste.gif">
<param name="style:smiley13" value=":-| /libs/irc/images/OH-3.gif">
<param name="style:smiley14" value=":| /libs/irc/images/OH-3.gif">
<param name="style:smiley15" value=":\'( /libs/irc/images/pleure.gif">
<param name="style:smiley16" value=":$ /libs/irc/images/rouge.gif">
<param name="style:smiley17" value=":-$ /libs/irc/images/rouge.gif">
<param name="style:smiley18" value="(H) /libs/irc/images/cool.gif">
<param name="style:smiley19" value="(h) /libs/irc/images/cool.gif">
<param name="style:smiley20" value=":-@ /libs/irc/images/enerve1.gif">
<param name="style:smiley21" value=":@ /libs/irc/images/enerve2.gif">
<param name="style:smiley22" value=":-S /libs/irc/images/roll-eyes.gif">
<param name="style:smiley23" value=":s /libs/irc/images/roll-eyes.gif">
<param name="style:floatingasl" value="true">

<param name="pixx:highlight" value="true">
<param name="pixx:highlightnick" value="true">

</applet></div>
				</div>
			</div>
			<div id="clear">
			</div>
		</div>';

require_once("footer.php");
echo $output;
?>