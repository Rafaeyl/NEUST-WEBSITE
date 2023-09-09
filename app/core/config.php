<?php 

defined('ROOTPATH') OR exit('Access Denied!');

if((empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli') || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** database config **/
	define('DBNAME', 'neust');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/NEUST-PAPAYA/public/');

}else
{
	/** database config **/
	define('DBNAME', 'neust');	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/NEUST-PAPAYA/public/');

}

define('APP_NAME', "NEUST PAPAYA");
define('APP_DESC', "University website of NEUST PAPAYA(GENERAL TINIO)");

/** true means show errors **/
define('DEBUG', true);
