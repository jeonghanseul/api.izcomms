<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			function frmSubmit(){
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

				return true;
			}
		</script>
	</head>
	<body>
		<div>
			<form action="./searchIdResert.php" method="post" onsubmit="return frmSubmit();">
				<table>
					<tr>
						<td>
							이름
						</td>
						<td>
							<input type="text" id="user_name" name="user_name">
						</td>
					</tr>
					<tr>
						<td>
							팀
						</td>
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
						<td>
							<input type="submit" value="찾기">
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