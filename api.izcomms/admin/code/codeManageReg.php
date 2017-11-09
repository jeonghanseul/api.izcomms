<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');

if(($_POST['code'] != '')||($_POST['codeName'] != '')){
	$sql = "INSERT INTO `codeManager`(`code`, `codeName`) VALUES ('".$_POST['code']."', '".$_POST['codeName']."')";
	
	$result=mysql_query($sql);
	
	if($result){
		echo "<script>alert('정상 등록 되었습니다.'); location.href='http://api.izcomms.co.kr/admin/user/userManage.php';</script>";
		
	}else{
		$error = mysql_error($db);
		echo "오류 입니다. <br /> 해당 내용을 복사해서 보내주시기 바랍니다.";
		echo $error." <br /> ".$sql;
	}
}

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="css/userManageUpdate.css">
		<script src="../../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
		         $("#header").load("../header.html #navbar")
		      });

			function frmSubmit(){
		    	  if(""==$("#code").val()){
					     alert("코드를 입력해 주세요.");
					     $("#code").focus();
					     
					     return false;
			     }
			     if(""==$("#codeName").val()){
				     alert("코드명을 입력해 주세요.");
				     $("#codeName").focus();
				     
				     return false;
			     }
			     return true;
		      }
		</script> 
	</head>
	<body>
    	<div class="um_box">
		<div id="header"></div>
			<div>
				<form action="" method="post" onSubmit="return frmSubmit();">
					<table width="100%" border="1">
						<tr>
							<td>코드</td>
							<td>
								<input type="text" name="code" id="code" value="">
							</td>
						</tr>
						<tr>
							<td>코드명</td>
							<td>
								<input type="text" name="codeName" id="codeName" value="">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input class="submit" type="submit" value="등록">
								<a class="list_btn" href="./codeManage.php">목록</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
        </div>
	</body>
</html>