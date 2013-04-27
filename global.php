<?php

/* ##### Change Parameters Here ##### */

define('SITE_URL', 'http://survey.sitex.imzcy.com');
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'survey');
define('MYSQL_PASS', 'survey');
define('MYSQL_DBNAME', 'survey');


/* ^^^^^ End Of Change Parameter Here ^^^^^ */

/* ##### Don't Change Here If Not Have To ##### */

// Define Constants
$include_path = array();
define('SITE_ROOT', rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR);
define('LIBRARY_ROOT', SITE_ROOT . 'library' . DIRECTORY_SEPARATOR);

define('SIGNIN_URL', SITE_URL . '/signin/');

define('UUID_LENGTH', 128);

date_default_timezone_set('Asia/Singapore');

// Load Loader Modules
require_once(LIBRARY_ROOT . 'Loader.php');

// Load Modules
LoadModule('core.LDefaultErrorHandler');

/* ^^^^^ End Of Don't Change Here If Not Have To ^^^^^ */
?>