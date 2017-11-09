<?
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="css/userManage.css">
		<script src="../../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
		         $("#header").load("../header.html #navbar")
		      });
		      
		      function userDeleteAction(str){
			      if(confirm("정말 삭제하시겠습니까?")==true){
				      location.href="./userManageDelete.php?userId="+str;
			      }else{
				      return;
			      }
			   }
		</script> 
	</head>
	<body>
    <div class="um_box">
		<div id="header"></div>
		<div class="registration"><a href="./userManageReg.php">회원등록</a></div>
		<div>
			<table width="100%" border="1" bordercolor="#666">
            <colgroup>
            	<col width="5%">
                <col width="20%">
                <col width="20%">
                <col width="15%">
                <col width="20%">
                <col width="10%">
                <col width="10%">
            </colgroup>
				<tr>
					<th>
						번호
					</th>
					<th>
						아이디
					</th>
					<th>
						이름
					</th>
					<th>
						팀
					</th>
					<th>
						권한
					</th>
					<th colspan="2"></th>
                    
				</tr>
					<?
                    $ses_sql=mysql_query("select * from userMember WHERE use_yn='Y' AND delete_date = '' ");
                    
                    $index=1;
                    while($row=mysql_fetch_array($ses_sql)){
                    ?>
                        <tr>
                            <td><? echo $index;?></td>
                            <td><a href="userManageView.php?userId=<?=$row['user_id'];?>"><? echo $row['user_id'];?></a></td>
                            <td><? echo $row['user_name'];?></td>
                            <td>
                                <?
                                    if("ETC"==$row['user_team']){
                                        echo "기타";
                                    }else{
                                        echo $row['user_team'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?
                                    if("A"==$row['grade']){
                                        echo "관리자";
                                    }else if("T"==$row['grade']){
                                        echo "팀장";
                                    }else{
                                        echo "사원";
                                    }
                                ?>
                            </td>
                            
                            <td><a class="revise" href="userManageUpdate.php?userId=<?=$row['user_id'];?>">수정</a></td>
                            
                            <td colspan="2"><input class="delete" type="button" onClick="userDeleteAction('<?echo $row['user_id'];?>');" value="삭제"></td>
                        </tr>
                    <?	
                        $index++;
                    }
                    ?>
			</table>
		</div>
        </div>
	</body>
</html>