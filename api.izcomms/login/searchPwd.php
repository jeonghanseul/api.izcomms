<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			function frmSubmit(){
				if(""==$("#user_id").val()){
					alert("아이디를 입력해 주세요.");
					 $("#user_id").focus();
					     
					 return false;
				}
				if(""==$("#user_email").val()){
					alert("이메일을 입력해 주세요.");
					 $("#user_email").focus();
					     
					 return false;
				}else{
					var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
					  
					if(regex.test($("#user_email").val()) === false) {  
					    alert("잘못된 이메일 형식입니다.");  
					    $("#user_email").focus();
					    return false;  
					}
				}
				return true;
			}
		</script>
	</head>
	<body>
		<div>
			<form action="./sendPwd.php" method="post" onsubmit="return frmSubmit();">
				<table>
					<tr>
						<td>
							아이디
						</td>
						<td>
							<input type="text" id="user_id" name="user_id">
						</td>
					</tr>
					<tr>
						<td>
							메일주소
						</td>
						<td>
							<input type="text" id="user_email" name="user_email">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="메일보내기">
						</td>
						<td>
							<a href="../login.php">취소</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>