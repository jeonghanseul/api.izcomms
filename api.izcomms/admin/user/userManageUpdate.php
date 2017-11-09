<?
	include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
	include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');
	
	$user_id = $_GET['userId'];
	$ses_sql=mysql_query("select * from userMember where user_id='".$user_id."'");
	
	$row=mysql_fetch_array($ses_sql);
	
	
	if(($_POST['user_id'] != '')||($_POST['user_pass'] != '')||($_POST['user_name'] != '')||($_POST['user_team'] != '')||($_POST['grade'] != '')){
		if(""!=$_POST['passCheck']){
			$sql = "UPDATE userMember SET user_name='".$_POST['user_name']."', user_team = '".$_POST['user_team']."', grade='".$_POST['grade']."' WHERE user_id='".$_POST['user_id']."'";
		}else{
			$sql = "UPDATE userMember SET user_pass='".$_POST['user_pass']."', user_name='".$_POST['user_name']."', user_team = '".$_POST['user_team']."', grade='".$_POST['grade']."' WHERE user_id='".$_POST['user_id']."'";
		}
		
		$result=mysql_query($sql);
		
		if($result){
			echo "<script>alert('정상변경 되었습니다.'); location.href='http://api.izcomms.co.kr/admin/user/userManage.php';</script>";
			
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
			      if(!$("input:checkbox[id='passCheck']").is(":checked")){
			    	  if(""==$("#user_pass").val()){
						     alert("비밀번호를 입력해 주세요.");
						     $("#user_pass").focus();
						     
						     return false;
					     }
			      }
			     if(""==$("#user_name").val()){
				     alert("이름을 입력해 주세요.");
				     $("#user_name").focus();
				     
				     return false;
			     }
			     if(""==$("#user_team").val()){
				     alert("팀을 선택해 주세요.");
				     $("#user_team").focus();
				     
				     return false;
			     }
			     if(""==$("#grade").val()){
				     alert("권한을 선택해 주세요.");
				     $("#grade").focus();
				     
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
						<td>아이디</td>
						<td><input type="text" readonly id="user_id" name="user_id" value="<? echo $row['user_id']; ?>"></td>
					</tr>
					<tr>
						<td>비밀번호</td>
						<td>
							<input type="password" id="user_pass" name="user_pass" >
							<input class="checkbox" type="checkbox" id="passCheck" name="passCheck" value="1">기존 비밀번호 사용
						</td>
					</tr>
					<tr>
						<td>이름</td>
						<td><input type="text" id="user_name" name="user_name" value="<? echo $row['user_name']; ?>"></td>
					</tr>
					<tr>
						<td>팀</td>
						<td>
							<select id="user_team" name="user_team">
								<option value="">선택해주세요.</option>
								<option value="AE1" <? if("AE1"==$row['user_team'])echo "selected='selected'"; ?>>AE1</option>
								<option value="AE2" <? if("AE2"==$row['user_team'])echo "selected='selected'"; ?>>AE2</option>
								<option value="AE3" <? if("AE3"==$row['user_team'])echo "selected='selected'"; ?>>AE3</option>
								<option value="MD" <? if("MD"==$row['user_team'])echo "selected='selected'"; ?>>MD</option>
								<option value="ETC" <? if("ETC"==$row['user_team'])echo "selected='selected'"; ?>>기타</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>권한</td>
						<td>
							<select id="grade" name="grade">
								<option value="">선택해주세요.</option>
								<option value="A" <? if("A"==$row['grade'])echo "selected='selected'"; ?>>관리자</option>
								<option value="T" <? if("T"==$row['grade'])echo "selected='selected'"; ?>>팀장</option>
								<option value="S" <? if("S"==$row['grade'])echo "selected='selected'"; ?>>사원</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="submit" type="submit" value="수정">
							<a class="list_btn" href="./userManage.php">목록</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
        </div>
	</body>
</html>