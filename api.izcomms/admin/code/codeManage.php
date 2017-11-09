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
		      
		      function codeDeleteAction(str){
			      if(confirm("정말 삭제하시겠습니까?")==true){
				      location.href="./codeManageDelete.php?code="+str;
			      }else{
				      return;
			      }
			   }
		</script> 
	</head>
	<body>
		<div class="um_box">
			<div id="header"></div>
			<div class="registration">
				<a href="./codeManageReg.php">회원등록</a>
			</div>
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
							코드
						</th>
						<th>
							코드명
						</th>
						<th colspan="2"></th>
					</tr>
						<?
	                    $ses_sql=mysql_query("select * from codeManager WHERE use_yn='Y'");
	                    
	                    $index=1;
	                    while($row=mysql_fetch_array($ses_sql)){
	                    ?>
	                        <tr>
	                            <td><? echo $index;?></td>
	                            <td>
	                            	<a href="codeManageView.php?userId=<?=$row['no'];?>">
	                            		<? echo $row['code'];?>
	                            	</a>
	                           </td>
	                            <td><? echo $row['codeName'];?></td>
	                            <td><a class="revise" href="codeManageUpdate.php?userId=<?=$row['no'];?>">수정</a></td>
	                            
	                            <td colspan="2"><input class="delete" type="button" onClick="codeDeleteAction('<?echo $row['no'];?>');" value="삭제"></td>
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