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
//# char - Display the characters page
//#####################################


$language           = "english"; // Default language
$disable_user_lang  = false; // If set to true, users cannot change the default language
$theme              = "trinitymanager"; // Default theme to use overwritten by user
$disable_user_theme = false; // If set to true, users cannot change the default theme
$title              = "TrinityManager Account Management System"; // Title to use for your management system
$index_page         = "realmlist"; 

// MySQL Configuration options for TrinityManager database

$trin_host = "localhost"; // What is the address of the SQL server
$trin_user = "trinity"; // What is the username of the user with access to the TrinityManager database
$trin_pass = "trinity"; // What is the password of the user
$trin_db = "trinitymanager"; // What is the name of the TrinityManager database

// MySQL Configuration options for the Trinity Core world database

$world_host = "localhost"; // What is the address of the SQL server
$world_user = "trinity"; // What is the username of the user with access to the world database
$world_pass = "trinity"; // What is the password for the user
$world_db = "world"; // What is the name of the world database

// MySQL Configuration options for the Trinity Core Realm database

$realmd_host = "localhost";
$realmd_user = "trinity"; // What is the username of the user with access to the realm database
$realmd_pass = "trinity"; // What is the password for the user
$realmd_db = "realmd"; // What is the name of the realm database

// MySQL Configuration options for the Trinity Core Characters database

$characters_host = "localhost"; // What is the address of the SQL server
$characters_user = "trinity"; // What is the username of the user with access to the characters database
$characters_pass = "trinity"; // What is the password for the user
$characters_db = "characters"; // What is the name of the characters database

// Account creation options

$allow_creation  = true; // If set to true, users are able to create their own accounts
$allow_expansion = true; // If set to true, users can select what expansion pack they want to use in their account settings
$require_captcha = false; // If set to true, a captcha will appear on the registration page
$email_verify    = false; // If set to true, a verification email is sent and account is placed on hold til verified
$validate_email  = false; // Validate the email address when registering
$email_on_create = false; // If set to true, send a welcome email

// IRC Chat Applet and Forum options

$enable_irc_chat  = true;
$irc_server       = "set.this.before.use"; // Default IRC Server to use
$irc_port         = 6667; // Most IRC servers default on port 6667
$irc_channel      = "#Channel"; 
$irc_default_nick = "TrinUser"; // Nickname to use if account holders username is already in use on IRC.

?>