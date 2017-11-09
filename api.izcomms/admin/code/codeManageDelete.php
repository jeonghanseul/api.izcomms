<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');
header("Content-Type: text/html; charset=UTF-8");

if(""!=$_GET['code']){
	$date = date("Y-m-d H:i:s");
	$sql = "UPDATE codeManager SET use_yn='N' WHERE no='".$_GET['code']."'";
	$result=mysql_query($sql);
	
	if($result){
		echo "<script>alert('정상 삭제 되었습니다.'); location.href='http://api.izcomms.co.kr/admin/code/codeManage.php';</script>";
		
	}else{
		$error = mysql_error($db);
		echo "오류 입니다. <br /> 해당 내용을 복사해서 보내주시기 바랍니다.";
		echo $error." <br /> ".$sql;
	}
}
?>