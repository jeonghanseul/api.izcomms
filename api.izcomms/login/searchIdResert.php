<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if(($_POST['user_name'] != '')&&($_POST['user_team'] != '')){
	
	$user_name = $_POST['user_name'];
	$user_team= $_POST['user_team'];
	
	$sql = "SELECT * FROM userMember WHERE user_name='".$user_name."' AND user_team='".$user_team."' AND use_yn='Y' and delete_date=''";
	$result=mysql_query($sql);
	
	$count=mysql_num_rows($result);
}

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<script src="../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			function goToLogin(){
				if($('input:radio[name=user_id]').is(':checked')){
					var st = $(":input:radio[name=user_id]:checked").val();
	
					location.href="../login.php?user_id="+st;
				}else{
					location.href="../login.php";
				}
			}
		</script>
	</head>
	<body>
		<div>
			아이디 찾기 결과
			<table>
<?
	if(0==$count){
?>
	<tr>
		<td>
			아이디가 없습니다.
		</td>
	</tr>
<?
	}else{
		while($row=mysql_fetch_array($result)){
?>
		<tr>
			<td>
				<input type="radio" name="user_id" value="<? echo $row['user_id']; ?>"> <? echo $row['user_id']; ?>
			</td>
		</tr>
<?
		}
	}

?>		
			</table>
		</div>
		<div>
			<button onclick="goToLogin();">로그인</button>
		</div>
	</body>
</html>