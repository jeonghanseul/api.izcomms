<?
header("Content-Type: text/html; charset=UTF-8");

	$apiArr = array(
			   "http://www.localdata.kr/platform/rest/23_07_01_P/openApi?authKey=t3FXnzs=i/pJvqMOl//ZXe7fMSj6XZ5mNazYFMvVV4k=&resultType=json",
			   "http://www.localdata.kr/platform/rest/16_07_01_P/openApi?authKey=XcfMOgM4KSTNdhlJ8F2cNX3l/B0Y6MfiWCMAo9iq65s=&resultType=json",
			   "http://www.localdata.kr/platform/rest/23_08_01_P/openApi?authKey=iiycXYenUhxj4j3skMJjLkcAa7=GNBYPFYvF/c9iSBw=&resultType=json",
			   "http://www.localdata.kr/platform/rest/16_03_01_P/openApi?authKey=IGg9YfQEAy9i1JZdSb0FECs2JQuFR9m7/cJFacYQT8c=&resultType=json",
			   "http://www.localdata.kr/platform/rest/16_19_01_P/openApi?authKey=rj10y4=dxsOTkXKupCDiNvSRVaqrV5Qrs=Prv9sWaxQ=&resultType=json",
			   "http://www.localdata.kr/platform/rest/14_04_01_P/openApi?authKey=PfFDaUIOdIaZvz0rWuZaqkAyFGxRN0CqvxoqPMatNEM=&resultType=json",
			   "http://www.localdata.kr/platform/rest/13_11_01_P/openApi?authKey=dS=5AHxKK7DQN4vMAJqEx5/uXEQYQtvywc3UZTgoHLI=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_43_01_P/openApi?authKey=Dtm0KCJ2HXRYmb3ZTPzShS6vetywZ/je2v1y2sf2lQs=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_16_01_P/openApi?authKey=f01GtILcS=ZhpuJOKR5Hf6IBgiIzmOVtU913VD2v6A0=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_13_01_P/openApi?authKey=z07nD9AQy1/Ti=MJ17zMaf2TNYqPt98rMFFl/cq=1Sw=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_68_01_P/openApi?authKey=njN1ef392HdCFw3gRihc9=xVRyAGg2aLB5mfeO0Digk=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_03_01_P/openApi?authKey=vg0MPEgk58SydYsVJ4KiWFRL0hdCL1z=dzv1sAtwjLQ=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_20_01_P/openApi?authKey=bj9uhP3PKlaAJLThdAo8EnJbh4p9eqgofRURCXD6Vds=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_70_01_P/openApi?authKey=J2ldUdp=cV5W1yg8aVYXWLEm45/i4QmoZnWCK0AiEss=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_14_01_P/openApi?authKey=I6NufleahH9KrL33a1T0VwiYW0dGwyraNs6NoZ07f6w=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_18_01_P/openApi?authKey=TTzetc6w2XRys18BiD4BLerndzcMmRshLUIZIdVlxv4=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_77_01_P/openApi?authKey=cDr8TKeAY6q9BOoKIr6=QHXMeaVINTkjh=7EmJlxB2U=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_04_01_P/openApi?authKey=Rs1zhajLP38FfUBuNSeM7XSH75n4zh4qsjrLT2/4IHA=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_07_01_P/openApi?authKey=em9uA8WGbmxJ2EXdHwUt/ibHmjmn2aDEtUz4R3SqNcs=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_02_01_P/openApi?authKey=uvJpzGV3U=Srcr/NS4Lsqpl/EfjeQCLHGaPVw3Fctnk=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_79_01_P/openApi?authKey=jtVDOff8NN5C6Xo4Rvwg69q5ZVfYQHviPgzdu81X95c=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_81_01_P/openApi?authKey=w=KpQn8BL4c21SZH2itW5xBXt8HPrZNSVi7cLv102lc=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_01_01_P/openApi?authKey=HntJ5TXEOiwirrdxdhln4XbDOmBIuShOzJPq9Gnwy7s=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_12_01_P/openApi?authKey=Rekt=tf=dBQl8Gd0p4zaoJXTJTOqfm5G6R7T1DfHZqI=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_84_01_P/openApi?authKey=3POM=1zr7dtB9/=KoY3HYKrxhtOw3PgXVJOTswhXtT8=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_45_01_P/openApi?authKey=wi1j9P3qlKXtDzhtjG3If3yPYtG8QBCnPeeejGkNPnc=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_86_01_P/openApi?authKey=vYHRskk7Mp90j2cxtkk1wa1=rtaLNUs=nsIkOilIoD4=&resultType=json",
			   "http://www.localdata.kr/platform/rest/24_16_01_P/openApi?authKey=bc9CbjIDXszDQgaqSumSeZkIMHn6Sqla6bGxueeG5oY=&resultType=json",
			   "http://www.localdata.kr/platform/rest/45_02_01_P/openApi?authKey=tDIbL3Ugxt0REDfGbc8myk0Mk1LtLWb44OZeuydq2Zs=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_06_P/openApi?authKey=5h/37VZcELkvPDKXCrvVFUKi/cSA=W2kR7ED/64wJcY=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_09_P/openApi?authKey=K6i4XEWHQB=eXWQbHCedZ=afMReb8UBBIxdF6zfNyQo=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_03_P/openApi?authKey=S=HeLH/9UKW8jdfzuSUoxNspPLdMnyfzQWJX7k/Pb9Y=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_13_P/openApi?authKey=t=LB3dK1P0BTfLjgoE2rL2cvzgJbfBdYMWmpmdLFz6U=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_08_P/openApi?authKey=o2W3KCWy8k/vFbIhVsll40jFTodIPcgzDdbNh/yGwAU=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_14_P/openApi?authKey=GR1SgTZth35kStPKuEw5ZbWax5/GLqRxFjWOeGuj8qs=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_07_P/openApi?authKey=IUQ6/erEtKXwp/EzhAlAa/KloTgi8s9GXV48eOOwYG0=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_11_P/openApi?authKey=Q2WH3GTSwtclM9ag5s4kOPgKOZ3vqEneuzKtHHEKlq0=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_02_P/openApi?authKey=KLSoGCmfwiORQ3B6PmXeLl37KBZErZBC3kf/5ykWj=Y=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_08_05_P/openApi?authKey=K2xWo4NTUqwix/vq3MayK7k=Y7dIrwndjhmuyTYbmWM=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_02_P/openApi?authKey=k5/K0o=VWLISZBxXwjwIaOifSkqo6m3dJAeFv87gq1Q=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_03_P/openApi?authKey=OJrbCIAyo54ESE09gxbOKk2EeKd56SuYuMCct5O1TSs=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_01_P/openApi?authKey=giH35zU3v=PuHQVfj=g9cIh6cLdrHLeprmu1ow8gEyA=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_04_P/openApi?authKey=6CCQvqQdHyZINQG=ZP6DqDGcv5q8nZKfIDGC8rjrNcI=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_05_P/openApi?authKey=VGoxp677LbcBoQ7txwfsKT4=uDmqbM7cdoBbhZ2cWKg=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_06_P/openApi?authKey=9=By2xRS6Ou/Nq9IyWJfa3GLLcbzXLdv70OfvGdffEM=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_40_09_P/openApi?authKey=g5YIXNQFeceiYIXFtyc6hqtk6mOtu84mREclYXk1wa0=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_42_01_P/openApi?authKey=bLR89VHWGMX243i4e0TuF4w4PbqYatUfOzdBsARUa6w=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_01_P/openApi?authKey=pwIORlmJOYZZE8EPm9Nm1Alr3HpIfoneVANQ70t0GTU=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_02_P/openApi?authKey=d7vrZxGJBjxKpdI6YRSYbymt4HuRUuvOpT58An08eqg=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_03_P/openApi?authKey=l5hqe0wDIWRAvbyj93n2yS6PFbtvtQpr7JbHKa8Xups=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_03_P/openApi?authKey=l5hqe0wDIWRAvbyj93n2yS6PFbtvtQpr7JbHKa8Xups=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_04_P/openApi?authKey=l59gd9dv0BeUg3ZtBbVNF0Slzh4QoBo9jTclaMrj==E=&resultType=json",
			   "http://www.localdata.kr/platform/rest/41_41_05_P/openApi?authKey=R/v4c8qxfw2cz46b7dXyK44KDl55XTNXKkgfZY/vCI4=&resultType=json",
				);
	$apiNameArr = array(
			   "골프연습장업",
			   "자동차야영장업",
			   "체력단련장업",
			   "관광숙박업",
			   "관광펜션업",
			   "낚시어선업",
			   "동물병원",
			   "숙박업",
			   "숙박업(일반-여관업)",
			   "숙박업(일반-여인숙업)",
			   "숙박업(일반-일반호텔)",
			   "일반음식점(감성주점)",
			   "일반음식점(경양식)",
			   "일반음식점(기타)",
			   "일반음식점(냉면집)",
			   "일반음식점(복어취급)",
			   "일반음식점(식육(숯불구이))",
			   "일반음식점(외국음식전문점(인도,태국등))",
			   "일반음식점(일식)",
			   "일반음식점(정종/대포집/소주방)",
			   "일반음식점(중국식)",
			   "일반음식점(키즈카페)",
			   "일반음식점(패밀리레스토랑)",
			   "일반음식점(한식)",
			   "일반음식점(호프/통닭)",
			   "휴게음식점(떡카페)",
			   "휴게음식점(전통찻집)",
			   "휴게음식점(키즈카페)",
			   "일반음식점(횟집)",
			   "자동차대여업",
			   "통신판매업(가구,수납용품)",
			   "통신판매업(건강,식품)",
			   "통신판매업(교육,도서,완구,오락)",
			   "통신판매업(기타)",
			   "통신판매업(레저,여행,공연)",
			   "통신판매업(복합)",
			   "통신판매업(의류,패션,잡화,뷰티)",
			   "통신판매업(자동차,자동차용품)",
			   "통신판매업(종합몰)",
			   "통신판매업(컴퓨터,사무용품)",
			   "미용업(손톱ㆍ발톱)",
			   "미용업(손톱ㆍ발톱/화장ㆍ분장)",
			   "미용업(일반)",
			   "미용업(일반/손톱ㆍ발톱)",
			   "미용업(일반/손톱ㆍ발톱/화장ㆍ분장)",
			   "미용업(일반/피부)",
			   "미용업(일반/화장ㆍ분장)",
			   "미용업(종합)",
			   "미용업(피부)",
			   "미용업(피부/손톱ㆍ발톱)",
			   "미용업(피부/손톱ㆍ발톱/화장ㆍ분장)",
			   "미용업(피부/화장ㆍ분장)",
			   "미용업(화장ㆍ분장)"
				);
	
	
// 	echo " aaaa : ".count($apiArr);
// 	echo " bbbb : ".count($apiNameArr);
	
	
	$date = date('Y-m-d H:i:s');
	$myfile = fopen("/home/izcomms/skin/api/log/log_".$date.".txt", "w") or die("Unable to open file!");
	
	ob_start();

	echo " The program saves several APIs (currently 2) for 30 seconds and stores the information in the database after invocation. \n";
	echo "<br>";
	echo str_pad('', 4096);
	
	ob_flush();
	flush();
	
	for($i=0; $i<count($apiArr); $i++){
		
		
		$date = date('Y-m-d H:i:s');
		
// 		ob_start();
		$txt = "====================== start!!!! ==================================\n";
		fwrite($myfile, $txt);
		
		echo "\n====================== start!!!! ==================================\n";
		echo "<br>";
		echo str_pad('', 4096);
		
		ob_flush();
		flush();
		
		$txt = "\n i : ".$i."\n";
		fwrite($myfile, $txt);
		
		
		$txt = "\n date : ".$date."\n";
		fwrite($myfile, $txt);
		
		$ch = curl_init();
		$pageSize = 15;
		
		$bgnYmd= date('Ymd',strtotime($endYmd."-2day"));
		$endYmd= date('Ymd');
// 		$bgnYmd= "20170927";

		$queryParams = '&localCode='.$localCode;
		$queryParams .= '&pageSize='.$pageSize;
		$queryParams .= '&bgnYmd='.$bgnYmd;
		$queryParams .= '&endYmd='.$bgnYmd;
		$queryParams .= '&state=01';
		
		$url = $apiArr[$i];
		$apiName = $apiNameArr[$i];
		
		$txt = "\n apiName : ".$apiName."\n";
		fwrite($myfile, $txt);
		
		// 	$url ="http://www.localdata.kr/platform/rest/24_64_01_P/openApi?authKey=u9GZaV9ePymlqD1KlgMxb718UD1DDcTnO9=r9g/ruDI=&resultType=json";
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
		
		$data_array = json_decode($response, true);
		
		$totalCount = $data_array['result']['header']['paging']['totalCount'];
		$pageSize= $data_array['result']['header']['paging']['pageSize'];
		
		$txt = "\n url : ".$url . $queryParams."\n";
		fwrite($myfile, $txt);
		
		$txt = "\n totalCount : ".$totalCount."\n";
		fwrite($myfile, $txt);
		
		
		if($totalCount != 0){
			$items = $data_array['result']['body']['rows'][0]['row'];
			
			
			
			$mysql_hostname = 'localhost';
			$mysql_username = 'root';
			$mysql_password = 'dkdlwm1@#';
			$mysql_database = 'api';
			$mysql_port = '3306';
			$mysql_charset = 'utf8';
			
			//1. DB 연결
			$db= @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password);
			
			
			$txt = " \n MYSQL TRY CONNECT........ \n ";
			FWRITE($myfile, $txt);
			
			if(!$db){
				die('MySQL 서버에 연결할 수 없습니다.');
				$txt = " \n MySQL don't connect!!!! \n ";
				fwrite($myfile, $txt);
			}
			
			//2. DB 선택
			@mysql_select_db($mysql_database, $db) or die('DB 선택 실패');
			mysql_query(' SET NAMES '.$mysql_charset);
			
			
			$index = 0;
			foreach($items as $item) {
				
				$bplcNm= $items[$index]['bplcNm'];//사업장명
				$siteWhlAddr= $items[$index]['siteWhlAddr'];// 소재지전체주소
				$rdnWhlAddr= $items[$index]['rdnWhlAddr'];//도로명전체주소
				$apvPermYmd= $items[$index]['apvPermYmd'];//인허가일자
				$siteTel= $items[$index]['siteTel'];//전화번호
				$sitePostNo= $items[$index]['sitePostNo'];//우편번호
				
				$index++;
				
				$sql = 'insert into siteStoreInfo(api_date, subject, store_name, address, roadAddr, site_post_no, telNo, call_date)value("' .$apvPermYmd. '","' .$apiName. '","' .addslashes($bplcNm).'","' .$siteWhlAddr.'","' .$rdnWhlAddr.'","' .$sitePostNo. '","' .$siteTel. '","' .$date. '")';
		
				@mysql_query($sql, $db);
		
				$txt = "\n sql : ".$sql."\n";
				fwrite($myfile, $txt);
		
			}
			
			//6. 연결 종료
			mysql_close($db);
			
			$txt = "\n====================== end!!!! ==================================\n";
			fwrite($myfile, $txt);
			
			echo "====================== end!!!! ===========================\n";
			echo "<br>";
			echo str_pad('', 4096);
			ob_end_flush();
		}
		
		if($i != count($apiArr)-1){
			echo "===================== It will continue after 30 seconds. ==========================\n";
			echo "<br>";
			echo str_pad('', 4096);
			
			ob_flush();
			flush();
			
			//XX초 만큼 중지.
			sleep(300);
		}
	}
	
	fclose($myfile);
?>
