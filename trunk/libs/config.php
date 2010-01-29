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

$language = "english"; // Default language
$disable_user_lang = false; // If set to true, users cannot change the default language
$theme = "trinitymanager"; // Default theme to use overwritten by user
$disable_user_theme = false; // If set to true, users cannot change the default theme
$title = "TrinityManager Account Management System"; // Title to use for your management system

// MySQL Configuration options for TrinityManager database

$trin_host = "localhost"; // What is the address of the SQL server
$trin_port = 3306; // Default listen port for mysql is 3306
$trin_user = "trinity"; // What is the username of the user with access to the TrinityManager database
$trin_pass = "trinity"; // What is the password of the user
$trin_db = "trinitymanager"; // What is the name of the TrinityManager database

// MySQL Configuration options for the Trinity Core world database

$world_host = "localhost"; // What is the address of the SQL server
$world_port = 3306; // Default listen port for mysql is 3306
$world_user = "trinity"; // What is the username of the user with access to the world database
$world_pass = "trinity"; // What is the password for the user
$world_db = "world"; // What is the name of the world database

// MySQL Configuration options for the Trinity Core Realm database

$realmd_host = "localhost";
$realmd_port = 3306; // Default listen port for mysql is 3306
$realmd_user = "trinity"; // What is the username of the user with access to the realm database
$realmd_pass = "trinity"; // What is the password for the user
$realmd_db = "realmd"; // What is the name of the realm database

// MySQL Configuration options for the Trinity Core Characters database

$characters_host = "localhost"; // What is the address of the SQL server
$characters_port = 3306; // Default listen port for mysql is 3306
$characters_user = "trinity"; // What is the username of the user with access to the characters database
$characters_pass = "trinity"; // What is the password for the user
$characters_db = "characters"; // What is the name of the characters database

// Account creation options

$require_captcha = "true"; // If set to true, a captcha will appear on the registration page
$email_verify    = "true"; // If set to true, a verification email is sent
$validate_email  = "false"; // Validate the email address when registering
$email_on_create = "false"; // If set to true, send a welcome email

?>