<?
$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = 'dkdlwm1@#';
$mysql_database = 'api';
$mysql_port = '3306';
$mysql_charset = 'utf8';

//1. DB 연결
$db= @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password);

//2. DB 선택
@mysql_select_db($mysql_database, $db) or die('DB 선택 실패');
mysql_query(' SET NAMES '.$mysql_charset);

?>