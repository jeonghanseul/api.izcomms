<?
header("Content-Type: text/html; charset=UTF-8");
include($_SERVER['DOCUMENT_ROOT'].'/login/loginCheck.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 		<link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="css/user_select_api.css">
  		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		 <script>
		  $( function() {
		    $( "#datepicker" ).datepicker({
		      changeMonth: true,
		      dateFormat: "yymmdd",
		      changeYear: true,
		      maxDate : -60,
		      onSelect: function(selected) {
		    	  $("#datepickerTo").datepicker("option","minDate", selected)
	    	  }
		    });
		  } );
		  $( function() {
		    $( "#datepickerTo" ).datepicker({
		      changeMonth: true,
		      dateFormat: "yymmdd",
		      changeYear: true,
		      maxDate : -60,
		      onSelect: function(selected) {
		    	  $("#datepicker").datepicker("option","maxDate", selected)
	    	  }
		    });
		  } );
		  </script>
		  <script type="text/javascript">
			function searchAction(){
				var check = function_click();
				var startDate = $("#datepicker").val();
				var endDate = $("#datepickerTo").val();
				var store_name = $("#store_name").val();
				var addr = function_addrChck_click();

				if((""==startDate)||(""==endDate)){
					alert("기간 설정이 안되어 있습니다.");
				}else{
					location.href="./select_api.php?check="+check+"&startDate="+startDate+"&endDate="+endDate+"&store_name="+store_name+"&addr="+addr;
				}

			}

			function function_click() {  
			    var str = "";  
			    $("#search1 input:checkbox:checked").each(function (index) {  
				    if($(this).val()!=""){
				        str += ","+$(this).val();  
				    }
			    });  
			    if(str!="")str = str.substring(1);
			    return str;  
			}  
			
			function function_addrChck_click() {  
			    var str = "";  
			    $("#addrChck input:checkbox:checked").each(function (index) {  
				    if($(this).val()!=""){
				        str += ","+$(this).val();  
				    }
			    });  
			    if(str!="")str = str.substring(1);
			    return str;  
			}  
			function checkAll(){
				if($("#allChk").prop("checked")) { 
					//해당화면에 전체 checkbox들을 체크해준다 
					$("#search1 input:checkbox").prop("checked",true); 
					// 전체선택 체크박스가 해제된 경우 
				} else { 
					//해당화면에 모든 checkbox들의 체크를해제시킨다. 
					$("#search1 input:checkbox").prop("checked",false); 
				} 

			}

			function excelDown(){

				var url = $(location).attr('href');

				var result = url.replace('select_api', 'select_api_excel');

				location.href=result;
			}

			//div id 내에 있는 check box 체크 및 해제
			function checkPart(id, divid){
				if ($("#"+id).prop("checked")) {
					$("#"+divid + " input:checkbox").prop("checked",true); 
				}else{
					$("#"+divid + " input:checkbox").prop("checked",false); 
				}
			}
			
			//페이지 바로이동
			function pageChange(str){
				var url = $(location).attr('href');
				if(url.indexOf("&page")!= -1){
					url = url.split("&page");
					url = url[0]+"&page="+str;
				}else{
					url = url+"&page="+str;
				}
				location.href=url;
			}

			var tid;
			var cnt = parseInt(300);

			function counter_init(){
				tid = setInterval("counter_run()", 1000);
			}
			
			function counter_run(){
				document.all.counter.innerText = time_format(cnt);
				cnt--;
				if(cnt < 0){
					clearInterval(tid);
					self.location ="../login/logOut.php";
				}
			}

			function time_format(s){
				var nHour =0;
				var nMin =0;
				var nSec =0;

				if(s>0){
					nMin = parseInt(s/60);
					nSec = s%60;

					if(nMin > 60){
						nHour = parseInt(nMin/60);
						nMin= nMin%60;
					}
				}
				if(nSec<10) nSec = "0"+nSec;
				if(nMin<10) nMin = "0"+nMin;

				return ""+nHour+":"+nMin+":"+nSec;
			}

			$(document).ready(function(){
				counter_init();
		      });
		  </script>
		
		
	</head>
	<body>
		<div>
        
        <div class="admin_line">
        	<div class="admin_box">	
			<div class="user">
				현재 <?echo $_SESSION['user_name'];?>
				<?
					if("S"==$_SESSION['grade']){
						echo "사원";
					}else{
						echo "팀장";
					}
				?>
				 님 께서 로그인 중이십니다.
			</div>
            
				<div class="admin_box2">
                    <div id="counter"> </div>후 자동로그아웃
                    
                    <div class="login"><a href="../login/logOut.php"><span><img src="img/login.png" width="20px" height="20px">
                    </span>로그아웃</a></div>
                    <!-- 
                    <div class="mi"><a href="./userManageUpdate.php?userId=<?echo $_SESSION['user_id'];?>"><span><img src="img/mi.png" width="20px" height="20px">
                    </span>회원정보 수정</a></div>
                     -->
                 </div>
			</div>
            </div>
		</div>   
            <div id="check_box">
			<div class="all">
				<input type="checkbox" id="allChk" class="styled-checkbox" value="" onClick="checkAll();">
                <label for="allChk">전체 선택</label>
			</div>
			<table width="100%" id="search1" border="0">
				<tr class="th_tr">
					<th  class="th1">
						업종
					</th>
					<th  class="th2" colspan="3">
						세부업종
					</th>
				</tr>
				<tr id="part1">
					<td>
						<input type="checkbox" id="subChck1" class="styled-checkbox" onClick="checkPart('subChck1','part1');" value=""/><label for="subChck1">문화체육</label>
					</td>
					<td>
						<input type="checkbox" id="subjectCheckbox1" class="styled-checkbox" value="subject_01"<?if(strpos($_GET['check'], "subject_01")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox1">골프연습장업</label>
					</td>
					<td>
						<input type="checkbox" id="subjectCheckbox2" class="styled-checkbox" value="subject_02"<?if(strpos($_GET['check'], "subject_02")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox2">자동차야영장업</label>
					</td>
					<td>
						<input type="checkbox" id="subjectCheckbox3" class="styled-checkbox" value="subject_03"<?if(strpos($_GET['check'], "subject_03")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox3">체력단련장업</label>
					</td>
				</tr>
				<tr id="part2">
					<td>
						<input type="checkbox" id="subChck2" class="styled-checkbox" onClick="checkPart('subChck2','part2');" value=""/><label for="subChck2">관광</label>
					</td>
					<td colspan="3">
						<table border="0" class="table-in-table" style="border:0">
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox4" class="styled-checkbox" value="subject_04"<?if(strpos($_GET['check'], "subject_04")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox4">관광숙박업</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox5" class="styled-checkbox" value="subject_05"<?if(strpos($_GET['check'], "subject_05")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox5">관광펜션업</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox6" class="styled-checkbox" value="subject_06"<?if(strpos($_GET['check'], "subject_06")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox6">숙박업</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox7" class="styled-checkbox" value="subject_07"<?if(strpos($_GET['check'], "subject_07")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox7">숙박업(일반-여관업)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox8" class="styled-checkbox" value="subject_08"<?if(strpos($_GET['check'], "subject_08")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox8">숙박업(일반-여인숙업)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox9" class="styled-checkbox" value="subject_09"<?if(strpos($_GET['check'], "subject_09")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox9">숙박업(일반-일반호텔)</label>
								</td>
							</tr>
						</table>
					</td>
				<tr id="part3">
					<td>
						<input type="checkbox" id="subChck3" class="styled-checkbox" onClick="checkPart('subChck3','part3');" value=""/><label for="subChck3">교통물류</label>
					</td>
					<td colspan="3">
						<input type="checkbox" id="subjectCheckbox10" class="styled-checkbox" value="subject_10"<?if(strpos($_GET['check'], "subject_10")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox10">자동차대여업</label>
					</td>
				</tr>
				<tr id="part4">
					<td>
						<input type="checkbox" id="subChck4" class="styled-checkbox" onClick="checkPart('subChck4','part4');" value="" /><label for="subChck4"> 농축수산</label>
					</td>
					<td>
						<input type="checkbox" id="subjectCheckbox11" class="styled-checkbox" value="subject_11"<?if(strpos($_GET['check'], "subject_11")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox11">낚시어선업</label>
					</td>
					<td colspan="2">
						<input type="checkbox" id="subjectCheckbox12" class="styled-checkbox" value="subject_12"<?if(strpos($_GET['check'], "subject_12")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox12">동물병원</label>
					</td>
				</tr>
				<tr id="part5">
					<td>
						<input type="checkbox" id="subChck5" class="styled-checkbox" onClick="checkPart('subChck5','part5');" value=""/><label for="subChck5">소상공인</label>
					</td>
					<td colspan="3">
						<table border="0" class="table-in-table" style="border:0">
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox13" class="styled-checkbox" value="subject_13"<?if(strpos($_GET['check'], "subject_13")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox13">통신판매업(가구,수납용품)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox14" class="styled-checkbox" value="subject_14"<?if(strpos($_GET['check'], "subject_14")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox14">통신판매업(건강,식품)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox15" class="styled-checkbox" value="subject_15"<?if(strpos($_GET['check'], "subject_15")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox15">통신판매업(교육,도서,완구,오락)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox16" class="styled-checkbox" value="subject_16"<?if(strpos($_GET['check'], "subject_16")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox16">통신판매업(기타)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox17" class="styled-checkbox" value="subject_17"<?if(strpos($_GET['check'], "subject_17")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox17">통신판매업(레저,여행,공연)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox18" class="styled-checkbox" value="subject_18"<?if(strpos($_GET['check'], "subject_18")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox18">통신판매업(복합)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox19" class="styled-checkbox" value="subject_19"<?if(strpos($_GET['check'], "subject_19")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox19">통신판매업(의류,패션,잡화,뷰티)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox20" class="styled-checkbox" value="subject_20"<?if(strpos($_GET['check'], "subject_20")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox20">통신판매업(자동차,자동차용품)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox21" class="styled-checkbox" value="subject_21"<?if(strpos($_GET['check'], "subject_21")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox21">통신판매업(종합몰)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox22" class="styled-checkbox" value="subject_22"<?if(strpos($_GET['check'], "subject_22")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox22">통신판매업(컴퓨터,사무용품)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox23" class="styled-checkbox" value="subject_23"<?if(strpos($_GET['check'], "subject_23")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox23">미용업(손톱ㆍ발톱)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox24" class="styled-checkbox" value="subject_24"<?if(strpos($_GET['check'], "subject_24")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox24">미용업(손톱ㆍ발톱/화장ㆍ분장)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox25" class="styled-checkbox" value="subject_25"<?if(strpos($_GET['check'], "subject_25")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox25">미용업(일반)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox26" class="styled-checkbox" value="subject_26"<?if(strpos($_GET['check'], "subject_26")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox26">미용업(일반/손톱ㆍ발톱)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox27" class="styled-checkbox" value="subject_27"<?if(strpos($_GET['check'], "subject_27")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox27">미용업(일반/손톱ㆍ발톱/화장ㆍ분장)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox28" class="styled-checkbox" value="subject_28"<?if(strpos($_GET['check'], "subject_28")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox28">미용업(일반/피부)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox29" class="styled-checkbox" value="subject_29"<?if(strpos($_GET['check'], "subject_29")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox29">미용업(일반/화장ㆍ분장)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox30" class="styled-checkbox" value="subject_30"<?if(strpos($_GET['check'], "subject_30")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox30">미용업(종합)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox31" class="styled-checkbox" value="subject_31"<?if(strpos($_GET['check'], "subject_31")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox31">미용업(피부)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox32" class="styled-checkbox" value="subject_32"<?if(strpos($_GET['check'], "subject_32")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox32">미용업(피부/손톱ㆍ발톱)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox33" class="styled-checkbox" value="subject_33"<?if(strpos($_GET['check'], "subject_33")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox33">미용업(피부/손톱ㆍ발톱/화장ㆍ분장)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox34" class="styled-checkbox" value="subject_34"<?if(strpos($_GET['check'], "subject_34")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox34">미용업(피부/화장ㆍ분장)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox35" class="styled-checkbox" value="subject_35"<?if(strpos($_GET['check'], "subject_35")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox35">미용업(화장ㆍ분장)</label>
								</td>
								<td>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr id="part6">
					<td>
						<input type="checkbox" id="subChck6" class="styled-checkbox" onClick="checkPart('subChck6','part6');" value=""/><label for="subChck6">식품</label>
					</td>
					<td colspan="3">
						<table border="0" class="table-in-table" style="border:0">
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox36" class="styled-checkbox" value="subject_36"<?if(strpos($_GET['check'], "subject_36")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox36">일반음식점(감성주점)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox37" class="styled-checkbox" value="subject_37"<?if(strpos($_GET['check'], "subject_37")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox37">일반음식점(경양식)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox38" class="styled-checkbox" value="subject_38"<?if(strpos($_GET['check'], "subject_38")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox38">일반음식점(기타)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox39" class="styled-checkbox" value="subject_39"<?if(strpos($_GET['check'], "subject_39")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox39">일반음식점(냉면집)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox40" class="styled-checkbox" value="subject_40"<?if(strpos($_GET['check'], "subject_40")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox40">일반음식점(복어취급)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox41" class="styled-checkbox" value="subject_41"<?if(strpos($_GET['check'], "subject_41")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox41">일반음식점(식육(숯불구이))</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox42" class="styled-checkbox" value="subject_42"<?if(strpos($_GET['check'], "subject_42")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox42">일반음식점(외국음식전문점(인도,태국등))</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox43" class="styled-checkbox" value="subject_43"<?if(strpos($_GET['check'], "subject_43")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox43">일반음식점(일식)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox44" class="styled-checkbox" value="subject_44"<?if(strpos($_GET['check'], "subject_44")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox44">일반음식점(정종/대포집/소주방)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox45" class="styled-checkbox" value="subject_45"<?if(strpos($_GET['check'], "subject_45")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox45">일반음식점(중국식)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox46" class="styled-checkbox" value="subject_46"<?if(strpos($_GET['check'], "subject_46")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox46">일반음식점(키즈카페)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox47" class="styled-checkbox" value="subject_47"<?if(strpos($_GET['check'], "subject_47")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox47">일반음식점(패밀리레스토랑)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox48" class="styled-checkbox" value="subject_48"<?if(strpos($_GET['check'], "subject_48")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox48">일반음식점(한식)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox49" class="styled-checkbox" value="subject_49"<?if(strpos($_GET['check'], "subject_49")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox49">일반음식점(호프/통닭)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox50" class="styled-checkbox" value="subject_50"<?if(strpos($_GET['check'], "subject_50")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox50">휴게음식점(떡카페)</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" id="subjectCheckbox51" class="styled-checkbox" value="subject_51"<?if(strpos($_GET['check'], "subject_51")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox51">휴게음식점(전통찻집)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox52" class="styled-checkbox" value="subject_52"<?if(strpos($_GET['check'], "subject_52")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox52">휴게음식점(키즈카페)</label>
								</td>
								<td>
									<input type="checkbox" id="subjectCheckbox53" class="styled-checkbox" value="subject_53"<?if(strpos($_GET['check'], "subject_53")!== false){echo "checked='checked'";}?>><label for="subjectCheckbox53">일반음식점(횟집)</label>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
           
			<br/>
			<table id="addrChck" width="100%">
				<tr>
					<td>
						<input type="checkbox" id="addr1" class="styled-checkbox" value="서울특별시"<?if(strpos($_GET['addr'], "서울특별시")!== false){echo "checked='checked'";}?>><label for="addr1">서울특별시</label>
						<input type="checkbox" id="addr2" class="styled-checkbox" value="부산광역시"<?if(strpos($_GET['addr'], "부산광역시")!== false){echo "checked='checked'";}?>><label for="addr2">부산광역시</label>
						<input type="checkbox" id="addr3" class="styled-checkbox" value="대구광역시"<?if(strpos($_GET['addr'], "대구광역시")!== false){echo "checked='checked'";}?>><label for="addr3">대구광역시</label>
						<input type="checkbox" id="addr4" class="styled-checkbox" value="인천광역시"<?if(strpos($_GET['addr'], "인천광역시")!== false){echo "checked='checked'";}?>><label for="addr4">인천광역시</label>
						<input type="checkbox" id="addr5" class="styled-checkbox" value="광주광역시"<?if(strpos($_GET['addr'], "광주광역시")!== false){echo "checked='checked'";}?>><label for="addr5">광주광역시</label>
						<input type="checkbox" id="addr6" class="styled-checkbox" value="대전광역시"<?if(strpos($_GET['addr'], "대전광역시")!== false){echo "checked='checked'";}?>><label for="addr6">대전광역시</label>
						<input type="checkbox" id="addr7" class="styled-checkbox" value="울산광역시"<?if(strpos($_GET['addr'], "울산광역시")!== false){echo "checked='checked'";}?>><label for="addr7">울산광역시</label>
						<input type="checkbox" id="addr8" class="styled-checkbox" value="세종특별자치시"<?if(strpos($_GET['addr'], "세종특별자치시")!== false){echo "checked='checked'";}?>><label for="addr8">세종특별자치시 </label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" id="addr9" class="styled-checkbox" value="경기도"<?if(strpos($_GET['addr'], "경기도")!== false){echo "checked='checked'";}?>><label for="addr9">경기도</label>
						<input type="checkbox" id="addr10" class="styled-checkbox" value="강원도"<?if(strpos($_GET['addr'], "강원도")!== false){echo "checked='checked'";}?>><label for="addr10">강원도</label>
						<input type="checkbox" id="addr11" class="styled-checkbox" value="충청북도"<?if(strpos($_GET['addr'], "충청북도")!== false){echo "checked='checked'";}?>><label for="addr11">충청북도</label>
						<input type="checkbox" id="addr12" class="styled-checkbox" value="충청남도"<?if(strpos($_GET['addr'], "충청남도")!== false){echo "checked='checked'";}?>><label for="addr12">충청남도</label>
						<input type="checkbox" id="addr13" class="styled-checkbox" value="전라북도"<?if(strpos($_GET['addr'], "전라북도")!== false){echo "checked='checked'";}?>><label for="addr13">전라북도</label>
						<input type="checkbox" id="addr14" class="styled-checkbox" value="전라남도"<?if(strpos($_GET['addr'], "전라남도")!== false){echo "checked='checked'";}?>><label for="addr14">전라남도</label>
						<input type="checkbox" id="addr15" class="styled-checkbox" value="경상북도"<?if(strpos($_GET['addr'], "경상북도")!== false){echo "checked='checked'";}?>><label for="addr15">경상북도</label>
						<input type="checkbox" id="addr16" class="styled-checkbox" value="경상남도"<?if(strpos($_GET['addr'], "경상남도")!== false){echo "checked='checked'";}?>><label for="addr16">경상남도</label>
						<input type="checkbox" id="addr17" class="styled-checkbox" value="제주특별자치도"<?if(strpos($_GET['addr'], "제주특별자치도")!== false){echo "checked='checked'";}?>><label for="addr17">제주특별자치도</label>
					</td>
				</tr>
			</table>
			<br/>
			<label for="datepicker">From</label>
			<input type="text" id="datepicker" name="datepicker" value="<?echo $_GET['startDate'] ?>" readonly>
			<label for="datepickerTo">to</label>
			<input type="text" id="datepickerTo" name="datepickerTo" value="<?echo $_GET['endDate'] ?>" readonly>
			<label for="store_name">상점명 검색</label>
			<input type="text" id="store_name" value="<?echo $_GET['store_name'] ?>">
			<button class="search" onClick="searchAction();">검색.!!</button>
			<button class="excelDown" onClick="excelDown();">Excel 다운로드</button>
		</div>
		<br/>
		<div class="date_box">
			* 2만건 이상의 데이터는 용량의 문제로 엑셀파일로 다운로드가 되지 않을 수 있습니다.
		</div>
		<br/>
		<div class="date_table">
			<table width="100%">
            <colgroup>
            	<col width="3%"><!--NO  -->
                <col width="8%"><!-- 인허가일자 -->
                <col width="9%"><!-- 업종 -->
                <col width="12%"><!-- 업체명 -->
                <col width="26%"><!-- 주소 -->
                <col width="26%"><!-- 도로명주소 -->
                <col width="6%"><!-- 우편번호 -->
                <col width="10%"><!-- 전화번호 -->
            </colgroup>
					<tr>
						<th>
							NO
						</th>
						<th>
							인허가일자
						</th>
						<th>
							업종
						</th>
						<th>
							업체명
						</th>
						<th>
							주소
						</th>
                        <th>
							도로명주소
						</th>
						<th>
							우편번호
						</th>
						<th>
							전화번호
						</th>
					</tr>
				
			<?
			
				$hostname=$_SERVER["HTTP_HOST"];
				$uri= $_SERVER['REQUEST_URI'];
				
				if(strpos($uri,"&page=")!==false){
					$uri = split("&page",$uri);
					$uri = $uri[0];
				}
				
				$check = $_GET['check'];
				$startDate= $_GET['startDate'];
				$endDate= $_GET['endDate'];
				$store_name= $_GET['store_name'];
				$addr= $_GET['addr'];

				if(($check!='')||($startDate!='')||($endDate!='')||($store_name!='')||($addr!='')){
					
					$mysql_hostname = 'localhost';
					$mysql_username = 'root';
					$mysql_password = 'dkdlwm1@#';
					$mysql_database = 'api';
					$mysql_port = '3306';
					$mysql_charset = 'utf8';
					
					//1. DB 연결
					$db= @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password);
					
					if(!$db){
						die('MySQL 서버에 연결할 수 없습니다.');
					}
					
					//2. DB 선택
					@mysql_select_db($mysql_database, $db) or die('DB 선택 실패');
					mysql_query(' SET NAMES '.$mysql_charset);
					
					//체크박스 정의
					$subject = array(
							"subject_01"=>"골프연습장업",
							"subject_02"=>"자동차야영장업",
							"subject_03"=>"체력단련장업",
							"subject_04"=>"관광숙박업",
							"subject_05"=>"관광펜션업",
							"subject_06"=>"숙박업",
							"subject_07"=>"숙박업(일반-여관업)",
							"subject_08"=>"숙박업(일반-여인숙업)",
							"subject_09"=>"숙박업(일반-일반호텔)",
							"subject_10"=>"자동차대여업",
							"subject_11"=>"낚시어선업",
							"subject_12"=>"동물병원",
							"subject_13"=>"통신판매업(가구,수납용품)",
							"subject_14"=>"통신판매업(건강,식품)",
							"subject_15"=>"통신판매업(교육,도서,완구,오락)",
							"subject_16"=>"통신판매업(기타)",
							"subject_17"=>"통신판매업(레저,여행,공연)",
							"subject_18"=>"통신판매업(복합)",
							"subject_19"=>"통신판매업(의류,패션,잡화,뷰티)",
							"subject_20"=>"통신판매업(자동차,자동차용품)",
							"subject_21"=>"통신판매업(종합몰)",
							"subject_22"=>"통신판매업(컴퓨터,사무용품)",
							"subject_23"=>"미용업(손톱ㆍ발톱)",
							"subject_24"=>"미용업(손톱ㆍ발톱/화장ㆍ분장)",
							"subject_25"=>"미용업(일반)",
							"subject_26"=>"미용업(일반/손톱ㆍ발톱)",
							"subject_27"=>"미용업(일반/손톱ㆍ발톱/화장ㆍ분장)",
							"subject_28"=>"미용업(일반/피부)",
							"subject_29"=>"미용업(일반/화장ㆍ분장)",
							"subject_30"=>"미용업(종합)",
							"subject_31"=>"미용업(피부)",
							"subject_32"=>"미용업(피부/손톱ㆍ발톱)",
							"subject_33"=>"미용업(피부/손톱ㆍ발톱/화장ㆍ분장)",
							"subject_34"=>"미용업(피부/화장ㆍ분장)",
							"subject_35"=>"미용업(화장ㆍ분장)",
							"subject_36"=>"일반음식점(감성주점)",
							"subject_37"=>"일반음식점(경양식)",
							"subject_38"=>"일반음식점(기타)",
							"subject_39"=>"일반음식점(냉면집)",
							"subject_40"=>"일반음식점(복어취급)",
							"subject_41"=>"일반음식점(식육(숯불구이))",
							"subject_42"=>"일반음식점(외국음식전문점(인도,태국등))",
							"subject_43"=>"일반음식점(일식)",
							"subject_44"=>"일반음식점(정종/대포집/소주방)",
							"subject_45"=>"일반음식점(중국식)",
							"subject_46"=>"일반음식점(키즈카페)",
							"subject_47"=>"일반음식점(패밀리레스토랑)",
							"subject_48"=>"일반음식점(한식)",
							"subject_49"=>"일반음식점(호프/통닭)",
							"subject_50"=>"휴게음식점(떡카페)",
							"subject_51"=>"휴게음식점(전통찻집)",
							"subject_52"=>"휴게음식점(키즈카페)",
							"subject_53"=>"일반음식점(횟집)"
						);
					
					
					if(($startDate!='')||($endDate!='')){
							$dateParams = " AND api_date >= '".$startDate."' AND api_date <= '".$endDate."'";
					}
					
					
					if($check!=''){
						$checkVal = explode(",", $check);
						
						for($i=0; $i<count($checkVal);$i++){
							
							foreach ($subject as $key => $val){
								
								if($checkVal[$i] == $key){
									$subjectArr = $subjectArr." OR subject='".$subject[$key]."'";
								}
							}
						}
					}
					if($subjectArr!=""){
						
						$subjectArr= substr($subjectArr,3);
						$params = $params." AND ".$subjectArr;
					}
					
					if($store_name!=''){
						$storParam = " AND store_name LIKE '%".$store_name."%'";
					}
					
					$sql = 'SELECT * FROM siteStoreInfo WHERE 1=1 ';
					$order = ' ORDER BY api_date DESC';
					
					if($addr!=''){
						$addr = str_replace(",", "|", $addr);
						$addrParm = " address REGEXP '".$addr."'";
						
						if($storParam!=''){
							$sql="SELECT A.* FROM (".$sql.$params.")A WHERE ".$addrParm.$storParam.$dateParams.$order;
						}else{
							$sql="SELECT A.* FROM (".$sql.$params.")A WHERE ".$addrParm.$dateParams.$order;
						}
						
					}else{
						if($storParam!=''){
							$storParam= substr($storParam,4);
							
							$sql="SELECT A.* FROM (".$sql.$params.")A WHERE ".$storParam.$dateParams.$order;
							
						}else if(($startDate!='')||($endDate!='')){

							$dateParams= substr($dateParams,4);
							
							//서브 쿼리로 날리니 tmp 용량 과부하로 쿼리 수정.
							if(""==$params){
								$sql="SELECT * FROM siteStoreInfo WHERE ".$dateParams.$order;
							}else{
								$sql="SELECT A.* FROM (".$sql.$params.")A WHERE ".$dateParams.$order;
							}
							
						}else{
							$sql = $sql.$params.$order;
						}
					}
					
// 					echo " ".$sql;

					
					$countResult=@mysql_query($sql, $db);
					$rowCount = @mysql_num_rows($countResult);
					
					
					//한페이지에 출력될 row 수
					$pageSize = 100;
					// 파라메터로 받는 페이지
					$page = ($_GET['page'])?$_GET['page']:1;
					
					// 쿼리 페이징 설정.
					$limit = " LIMIT ".($page-1)."00, ".$pageSize;
					
// 					echo " ".$sql.$limit;

					//총 페이지
					$pageNum = ceil($rowCount/$pageSize);
					
					//list 출력용 result
					$result=@mysql_query($sql.$limit, $db);
					
					
					echo " 총 건수 : ".$rowCount." 건 ( ";
// 					echo " " .$page." / ".$pageNum;

					//페이징바로 가는 select box
					$startSelectTag = "<select id='selectPage' onchange='pageChange(this.value);'>";
					$endSelectTag = "</select>";
					
					echo $startSelectTag;
					if(0==$pageNum){
						echo "<option value='".$pageNum."'".$option.">".$pageNum."</option>";
					}else{
						for($k=1; $k<=$pageNum; $k++){
							if($k==$page){
								$option = "selected='selected'";
							}else{
								$option = "";
							}
							
							echo "<option value='".$k."'".$option.">".$k."</option>";
						}
					}
					
					echo $endSelectTag;
					
					echo " / ".$pageNum." 페이지 )";
					
					//block수 한페이지에 페이번호 보여줄 갯수.
					$block = 5;
					
					// 총 블록
					$blockNum = ceil($pageNum/$block); 
					$nowBlock = ceil($page/$block);
					
					// 다음/이전 블록시 시작 페이지
					$s_page = ($nowBlock * $block) - ($block - 1);
					
					if ($s_page <= 1) {
						$s_page = 1;
					}
					
					// 끝페이지
					$e_page = $nowBlock*$block;
					if ($pageNum <= $e_page) {
						$e_page = $pageNum;
					}
					

					$index=1;
					while($row=@mysql_fetch_array($result)){
					?>
						<tr>
							<td>
								<?
								if(1!=$page){
									$sum= ($page-1)."00";
								}else{
									$sum= 0;
								}
									echo $sum+$index; 
								?>
							</td>
							<td>
								<?echo $row['api_date']; ?>
							</td>
							<td>
								<?echo $row['subject']; ?>
							</td>
							<td>
								<?echo $row['store_name']; ?>
							</td>
							<td>
								<?echo $row['address']; ?>
							</td>
                            <td>
								<?echo $row['roadAddr']; ?>
							</td>
							<td>
								<?echo $row['site_post_no']; ?>
							</td>
							<td width="4%">
								<?echo $row['telNo']; ?>
							</td>
						</tr>
					<?
						$index++;
					}
			?>
			</table>
			<div class="list_number">
				<ul>
				<? if($block <= $page){
					
				?>
 					<li class="first"><a href="<?=$uri?>"><span>[맨처음]</span></a></li>
 					<li class="arrow"><a href="<?=$uri?>&page=<?=$s_page-1?>"><span>&lt;</span></a></li>
				<?
					}
					for ($p=$s_page; $p<=$e_page; $p++) {
			    ?>
					<li class="number"><a href="<?=$uri?>&page=<?=$p?>"<?if($p==$page)echo "style='font-size: 15px;color:#fff;background:#093367'";?>><?=$p?></a></li>			
			    <?
					}
					if($pageNum!=$e_page){
			    ?>
					<li class="arrow"><a href="<?=$uri?>&page=<?=$e_page+1?>"><span>&gt;</span></a></li>
					<li class="last"><a href="<?=$uri?>&page=<?=$pageNum?>"><span>[맨끝]</span></a></li>
				<?
					}
				?>
				</ul>
			</div>
			<?
				}
			?>
		</div>
	</body>
</html>