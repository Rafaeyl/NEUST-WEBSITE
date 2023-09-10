<?php 

defined('ROOTPATH') OR exit('Access Denied!');

define('DBTYPE','mysql');
define('DBNAME','neust');
define('DBUSER','root');
define('DBPASS','');
define('DBHOST','localhost');

/*protocal type http or https*/
define('PROTOCAL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));
define('APP_NAME', "NEUST PAPAYA");
define('APP_DESC', "University website of NEUST PAPAYA(GENERAL TINIO)");

/** true means show errors **/
define('DEBUG', true);
