<?php

//#######################################################
//
// REQUIRED!
//
// Do not edit, move, or delete this file.
// doing so can break your TrinityManager installation
//
//
//#######################################################

// TrinityManager Configuration

//#####################################
//#
//# Possible $index_page options:
//# realmlist - Display the realmlist
//# user - Display the accounts page
//# irc - Display the IRC page
//# forum - Display the main forums
//# char - Display the characters 
//# index - Display a generic welcome page
//#####################################


$language           = "english"; // Default language
$disable_user_lang  = false; // If set to true, users cannot change the default language
$theme              = "trinitymanager"; // Default theme to use overwritten by user
$icon_dir 			= "images/icons"; // Icon location for item lookup
$download_icons     = false; // If icon doesn't exist, should the script download it? If no, it will display a generic icon
$disable_user_theme = false; // If set to true, users cannot change the default theme
$title              = "TrinityManager Account Management System"; // Title to use for your management system
$index_page         = "realmlist"; 

// MySQL Configuration options for TrinityManager database

$trin_host = "localhost"; // What is the address of the SQL server
$trin_user = "trinity"; // What is the username of the user with access to the TrinityManager database
$trin_pass = "trinity"; // What is the password of the user
$trin_db = "trinitymanager"; // What is the name of the TrinityManager database

// MySQL Configuration options for the Trinity Core World database - realm #1

$world_host['1'] = "localhost"; // What is the address of the SQL server
$world_user['1'] = "trinity"; // What is the username of the user with access to the characters database
$world_pass['1'] = "trinity"; // What is the password for the user
$world_db['1'] = "world"; // What is the name of the characters database

//MySQL Configuration options for the Trinity Core World database - world #2
/* Commented out; Remove this to enable world #2

$world_host['2'] = "localhost"; // What is the address of the SQL server
$world_user['2'] = "trinity"; // What is the username of the user with access to the characters database
$world_pass['2'] = "trinity"; // What is the password for the user
$world_db['2'] = "world2"; // What is the name of the characters database

//MySQL Configuration options for the Trinity Core World database - realm #3
/* Commented out; Remove this to enable world #3

$world_host['3'] = "localhost"; // What is the address of the SQL server
$world_user['3'] = "trinity"; // What is the username of the user with access to the characters database
$world_pass['3'] = "trinity"; // What is the password for the user
$world_db['3'] = "world3"; // What is the name of the characters database
Remove this entire line to enable world #3 */

//MySQL Configuration options for the Trinity Core World database - realm #4
/* Commented out; Remove this to enable world #4

$world_host['4'] = "localhost"; // What is the address of the SQL server
$world_user['4'] = "trinity"; // What is the username of the user with access to the characters database
$world_pass['4'] = "trinity"; // What is the password for the user
$world_db['4'] = "world4"; // What is the name of the characters database

Remove this entire line to enable world #4 */

// MySQL Configuration options for the Trinity Core Realm database

$realmd_host = "localhost";
$realmd_user = "trinity"; // What is the username of the user with access to the realm database
$realmd_pass = "trinity"; // What is the password for the user
$realmd_db = "auth"; // What is the name of the realm database

// MySQL Configuration options for the Trinity Core Characters database - realm #1

$characters_host['1'] = "localhost"; // What is the address of the SQL server
$characters_user['1'] = "trinity"; // What is the username of the user with access to the characters database
$characters_pass['1'] = "trinity"; // What is the password for the user
$characters_db['1'] = "characters"; // What is the name of the characters database

//MySQL Configuration options for the Trinity Core Characters database - realm #2
/* Commented out; Remove this to enable realm #2

$characters_host['2'] = "localhost"; // What is the address of the SQL server
$characters_user['2'] = "trinity"; // What is the username of the user with access to the characters database
$characters_pass['2'] = "trinity"; // What is the password for the user
$characters_db['2'] = "characters2"; // What is the name of the characters database

//MySQL Configuration options for the Trinity Core Characters database - realm #3
/* Commented out; Remove this to enable realm #3

$characters_host['3'] = "localhost"; // What is the address of the SQL server
$characters_user['3'] = "trinity"; // What is the username of the user with access to the characters database
$characters_pass['3'] = "trinity"; // What is the password for the user
$characters_db['3'] = "characters3"; // What is the name of the characters database

Remove this entire line to enable realm #3 */

//MySQL Configuration options for the Trinity Core Characters database - realm #4
/*Commented out; Remove this to enable realm #4

$characters_host['4'] = "localhost"; // What is the address of the SQL server
$characters_user['4'] = "trinity"; // What is the username of the user with access to the characters database
$characters_pass['4'] = "trinity"; // What is the password for the user
$characters_db['4'] = "characters4"; // What is the name of the characters database

Remove this entire line to enable realm #4 */

// Account creation options

$allow_creation  = true; // If set to true, users are able to create their own accounts
$allow_expansion = true; // If set to true, users can select what expansion pack they want to use in their account settings
$default_expansion = 0; // If $allow_expansion is set to false, use this expansion for all new registered accounts. (0 = Classic, 1 = TBC, 2 = WOTK)
$require_captcha = false; // If set to true, a captcha will appear on the registration page
$email_verify    = false; // If set to true, a verification email is sent and account is placed on hold until verified
$validate_email  = false; // Validate the email address when registering
$email_on_create = false; // If set to true, send a welcome email

// IRC Chat Applet and Forum options

$enable_irc_chat  = true;
$irc_server       = "set.this.before.use"; // Default IRC Server to use
$irc_port         = 6667; // Most IRC servers default on port 6667
$irc_channel      = "#Channel"; 
$irc_default_nick = "TrinUser"; // Nickname to use if account holders username is already in use on IRC.

?>