<?
	include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
	include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');
	
	if(($_POST['user_id'] != '')||($_POST['user_pass'] != '')||($_POST['user_name'] != '')||($_POST['user_team'] != '')||($_POST['grade'] != '')){
		$sql = "INSERT INTO `userMember`(`user_id`, `user_pass`, `user_name`, `user_team`, `grade`) VALUES ('".$_POST['user_id']."', '".$_POST['user_pass']."', '".$_POST['user_name']."', '".$_POST['user_team']."', '".$_POST['grade']."')";
		
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
		    	  if(""==$("#user_id").val()){
					     alert("아이디를 입력해 주세요.");
					     $("#user_id").focus();
					     
					     return false;
			     }
			  	if("0"==$("#idCheck").val()){
				  	alert("아이디 중복을 확인해 주세요.");
				     $("#user_id").focus();
				     
				     return false;
				  }   
		    	  if(""==$("#user_pass").val()){
					     alert("비밀번호를 입력해 주세요.");
					     $("#user_pass").focus();
					     
					     return false;
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
		      function userIdDuple(obj){
			      var str = obj.value;
			      
			      $.ajax({ // ajax실행부분
		                type: "post",
		                url : "../user/checkId.php",
		                data : {
		                    id : str
		                },
		                success : function s(a){ $('#idch').html(a); },
		                error : function error(){ alert('시스템 문제발생');}
		            });
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
						<td>
							<input type="text" id="user_id" name="user_id" onKeyUp="userIdDuple(this);">
                            <div id="idch"> 
								아이디를 입력하세요.
								<input type="hidden" id="idCheck" name="idCheck" value="0">
							</div>
						</td>
						
					</tr>
					<tr>
						<td>비밀번호</td>
						<td>
							<input type="password" id="user_pass" name="user_pass">
						</td>
					</tr>
					<tr>
						<td>이름</td>
						<td><input type="text" id="user_name" name="user_name"></td>
					</tr>
					<tr>
						<td>팀</td>
						<td>
							<select id="user_team" name="user_team">
								<option value="">선택해주세요.</option>
								<option value="AE1">AE1</option>
								<option value="AE2">AE2</option>
								<option value="AE3">AE3</option>
								<option value="MD">MD</option>
								<option value="ETC">기타</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>권한</td>
						<td>
							<select id="grade" name="grade">
								<option value="">선택해주세요.</option>
								<option value="A">관리자</option>
								<option value="T">팀장</option>
								<option value="S" selected="selected">사원</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="submit" type="submit" value="등록">
							<a class="list_btn" href="./userManage.php">목록</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
        </div>
	</body>
</html>