<?
include("./config/config.php");  //DB연결을 위한 config.php를 로드
session_start();   //세션 시작

	if($_POST['user_id'] != ''){
		$userId = $_POST['user_id'];
		$userPass = $_POST['user_pass'];
		
		$sql = "SELECT * FROM userMember WHERE user_id = '".$userId."' AND user_pass='".$userPass."' AND use_yn='Y' AND delete_date =''";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		
		if(1==$count){
			while($row=mysql_fetch_array($result)){
				$grade = $row['grade'];
				$userId= $row['user_id'];
				$user_name= $row['user_name'];
				
				session_register("grade");
				$_SESSION['grade']=$grade;
				
				session_register("user_id");
				$_SESSION['user_id']=$userId;
				
				session_register("user_name");
				$_SESSION['user_name']=$user_name;
				
				if("A"==$grade){
					header("location: ./select_api.php");
				}else{
					header("location: ./user/select_api.php");
				}
			}
		}else{
			echo "로그인 실패 입니다.";
		}
	}
?>
<html>
	<head>
    	<link rel="stylesheet" href="css/login.css">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	</head>
	<body>
		<div class="login_box">
        	<div class="tit_txt">
             	API
            </div>
			<form action="./login.php" name="memberForm" method="post">
            	<div class="lg_ip_box">
                    <span class="login_txt">아이디 : </span><input type="text" id="user_id" name="user_id" value="<?if(""!=$_GET['user_id'])echo $_GET['user_id'];?>"> <br />
                    <span>비밀번호 : </span><input type="password" id="user_pass" name="user_pass">
                </div>
				<input class="login_btn" type="submit" value="LOGIN">
			</form>
		</div>
<!-- 		<div> -->
<!-- 			<a href="../login/searchId.php">아이디찾기</a> -->
<!-- 			<a href="./login/searchPwd.php">비밀번호찾기</a> -->
<!-- 		</div> -->
	</body>
</html>