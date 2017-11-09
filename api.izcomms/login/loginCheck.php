<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

session_start();

$user_check=$_SESSION['user_id'];

$ses_sql=mysql_query("select * from userMember where user_id='".$user_check."'");

$row=mysql_fetch_array($ses_sql);
$login_session=$row['user_id'];

if(!isset($login_session)){
	
	header("Location: http://api.izcomms.co.kr/login.php");
	
}

?>