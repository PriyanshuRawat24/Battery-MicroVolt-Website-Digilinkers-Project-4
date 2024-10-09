<?php  

ob_start();

session_start();

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('TEMPLATE_FRONT') ? null : define('TEMPLATE_FRONT', __DIR__ . DS . 'templates/front');

defined('TEMPLATE_BACK') ? null : define('TEMPLATE_BACK', __DIR__ . DS . 'templates/back');


// Universal variables
$company = "MICROVOLT";


// Server settings
// $path = '/';

// defined('DB_HOST') ? null : define('DB_HOST', 'localhost');

// defined('DB_USER') ? null : define('DB_USER', 'root');

// defined('DB_PASS') ? null : define('DB_PASS', '');

// defined('DB_NAME') ? null : define('DB_NAME', '');


// Localhost settings
$path = '/projects/MICROVOLT/public/';

defined('DB_HOST') ? null : define('DB_HOST', 'localhost');

defined('DB_USER') ? null : define('DB_USER', 'root');

defined('DB_PASS') ? null : define('DB_PASS', '');

defined('DB_NAME') ? null : define('DB_NAME', 'MICROVOLT');


// Database connections
$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check connection
if ($link -> connect_errno) {
	echo 'Failed to connect to Database because: ' . $link->connect_errno;
	exit();
}


// include functions file
require_once('functions.php');

?>