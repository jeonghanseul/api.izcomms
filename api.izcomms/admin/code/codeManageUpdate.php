<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');

$code= $_GET['code'];
$ses_sql=mysql_query("select * from codeManager where no='".$code."'");

$row=mysql_fetch_array($ses_sql);


if(($_POST['code'] != '')||($_POST['codeName'] != '')){
	$sql = "UPDATE codeManager SET code='".$_POST['code']."', codeName='".$_POST['codeName']."' WHERE no='".$_POST['no']."'";
	
	$result=mysql_query($sql);
	
	if($result){
		echo "<script>alert('정상변경 되었습니다.'); location.href='http://api.izcomms.co.kr/admin/code/codeManage.php';</script>";
		
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
				     alert("코드명을 선택해 주세요.");
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
							<td><input type="text" id="code" name="code" value="<? echo $row['code'];?>"></td>
						</tr>
						<tr>
							<td>코드이름</td>
							<td>
								<input type="text" id="codeName" name="codeName" value="<? echo $row['codeName']; ?>">
								<input type="hidden" id="no" name="no" >
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input class="submit" type="submit" value="수정">
								<a class="list_btn" href="./codeManage.php">목록</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
        </div>
	</body>
</html>