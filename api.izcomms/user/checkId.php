<?
	include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
	
	$idch = $_POST['id'];
	
	$sql = "select * from userMember where user_id='".$idch."'";
	$result = mysql_query($sql);
	$count=mysql_num_rows($result);
	
	if("" == $idch){
?>
	<div>아이디를 입력하세요.</div>
<?		
	}else{
		if(0 == $count){
?>
	<div style="color: green">
		사용가능한 아이디입니다.
		<input type="hidden" id="idCheck" name="idCheck" value="1"/>
	</div>

<?			
		}else{
?>
	<div style="color: red">
		아이디가 존재합니다.
		<input type="hidden" id="idCheck" name="idCheck" value="0"/>
	</div>
<?
		}
	}
?>