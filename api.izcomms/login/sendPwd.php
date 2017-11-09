<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
header("Content-Type: text/html; charset=UTF-8");

if(($_POST['user_id'] != '')&&($_POST['user_email'] != '')){
	
	$user_id= $_POST['user_id'];
	$user_email= $_POST['user_email'];
	
	$sql = "SELECT * FROM userMember WHERE user_id='".$user_id."' AND use_yn='Y' and delete_date=''";
	$result=mysql_query($sql);
	
	$count=mysql_num_rows($result);
	
	$row=mysql_fetch_array($result);
	
	if(0!=$count){
		$user_pass= " 찾으신 비밀 번호는 ".$row['user_pass']." 입니다.";
	}else{
		$user_pass = $user_id." 해당 아이디의 비밀번호가 없습니다.";
	}
}

echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
/* 다중 수신자 */
// $to  = 'aidan@example.com' . ', ' ; // 콤마인 것에 주의.
$to = $user_email;

// 제목
$subject = '비밀번호 찾기 위한 안내메일입니다.';
//제목 한글 깨짐 처리
$subject = "=?EUC-KR?B?".base64_encode(iconv("UTF-8","EUC-KR",$subject))."?=\r\n"; 

// 메세지
$message = '
<html>
<head>
  <title>비밀번호 찾기</title>
</head>
<body>
  <table>
    <tr>
      <td>'.$user_pass.'</td>
    </tr>
  </table>
</body>
</html>
';

// HTML 메일을 보내려면, Content-type 헤더를 설정해야 합니다.
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf=8' . "\r\n";

// 추가 헤더
// $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Find Password <'.$user_email.'>'. "\r\n";
// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// 메일 보내기
$result = mail($to, $subject, $message, $headers);

if(1==$result){
	echo "<script>alert('정상 발송 되었습니다.'); location.href='../login.php';</script>";
}else{
	echo "<script>alert('메일 전송 실패 하였습니다.'); location.href='../login.php';</script>";
}
?>