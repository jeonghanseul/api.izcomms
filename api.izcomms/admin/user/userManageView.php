<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');

$user_id = $_GET['userId'];
$ses_sql=mysql_query("select * from userMember where user_id='".$user_id."'");

$row=mysql_fetch_array($ses_sql);


// echo $row['user_id'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="../../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
		         $("#header").load("../header.html #navbar")
		      });
		</script> 
	</head>
	<body>
		<div id="header"></div>
		<div>
			<table>
				<tr>
					<td>아이디</td>
					<td><? echo $row['user_id'];?></td>
				</tr>
				<tr>
					<td>이름</td>
					<td><? echo $row['user_name'];?></td>
				</tr>
				<tr>
					<td>팀</td>
					<td><? echo $row['user_team'];?></td>
				</tr>
				<tr>
					<td>권한</td>
					<td><? echo $row['grade'];?></td>
				</tr>
			</table>
		</div>
		<div>
			<ul>
				<li>
					<a href="userManageUpdate.php?userId=<?=$user_id;?>">수정</a>
					<a href="./userManage.php">목록</a>
				</li>
			</ul>
		</div>
	</body>
</html>