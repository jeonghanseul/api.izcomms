<?
include('loginCheck.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="css/admin.css">
		<script src="../jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
// 		         $("#header").load("header.html")
		         $("#header").load("../admin/header.html #navbar");
		      });
		</script> 
	</head>
	<body>
    	<div class="adm_box">
            <div class="adm_tit">
                당신의 등급은 
                <?if("A"==$_SESSION['grade'])echo "관리자";?> 
                입니다.
            </div>
             <div id="header"></div>
         </div>
	</body>
</html>