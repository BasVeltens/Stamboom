<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'stamboom';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql'); // This is an example opendb.php
mysql_select_db($dbname) or die('Cannot select database');
$path = '/oefeningen/stamboom';

class JConfig {
	var $log_path = 'C:/programs/wamp/www/oefeningen\oefen\log';
	var $tmp_path = 'C:/programs/wamp/www/oefeningen\oefen\tmp';
}

// $reset = mysql_query ('TRUNCATE TABLE `stamboom`');
?> 


