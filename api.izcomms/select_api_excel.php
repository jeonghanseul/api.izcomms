<?php
include('./config/config.php');

$check = $_GET['check'];
$startDate= $_GET['startDate'];
$endDate= $_GET['endDate'];
$store_name= $_GET['store_name'];
$addr= $_GET['addr'];


if(($check!='')||($startDate!='')||($endDate!='')||($store_name!='')||($addr!='')){
	
	
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
}

$result = mysql_query($sql);
$cnt = @mysql_num_rows($result);
if (!$cnt) {
	echo "<script>alert('There is no output to print.'); history.back();</script>";
}else{
	
	/** PHPExcel */
	require_once("./Classes/PHPExcel.php");
	/* PHPExcel.php 파일의 경로를 정확하게 지정해준다. */
	
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	
	// Set properties
	// Excel 문서 속성을 지정해주는 부분이다. 적당히 수정하면 된다.
	
	$objPHPExcel->getProperties()->setCreator("reviewplace")
	->setLastModifiedBy("reviewplace")
	->setTitle("shopList")
	->setSubject("shopList")
	->setDescription("shopList")
	->setKeywords("shopList")
	->setCategory("License");
	
	// Add some data
	// Excel 파일의 각 셀의 타이틀을 정해준다.
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("A1", "NO")
	->setCellValue("B1", "인허가일자")
	->setCellValue("C1", "업종")
	->setCellValue("D1", "업체명")
	->setCellValue("E1", "주소")
	->setCellValue("F1", "도로명주소")
	->setCellValue("G1", "우편번호")
	->setCellValue("H1", "전화번호");
	
	
	//글꼴 설정
	$objPHPExcel->getDefaultStyle()->getFont()->setName('맑은 고딕');
	
	//셀 width 지정
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(90);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	
	
	//전체 테두리
	$styleArray = array(
			'borders' => array(
					'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
					)
			)
	);
	
	$height = $cnt+1;
	$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$height)->applyFromArray($styleArray);
	unset($styleArray);
	
	// for 문을 이용해 DB에서 가져온 데이터를 순차적으로 입력한다.
	// 변수 i의 값은 2부터 시작하도록 해야한다.
	for ($i=2; $row=mysql_fetch_array($result); $i++)
	{
		$index = $i-1;
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A$i", "$index")
		->setCellValue("B$i", "$row[api_date]")
		->setCellValue("C$i", "$row[subject]")
		->setCellValue("D$i", "$row[store_name]")
		->setCellValue("E$i", "$row[address]")
		->setCellValue("F$i", "$row[roadAddr]")
		->setCellValue("G$i", "$row[site_post_no]")
		->setCellValue("H$i", "$row[telNo]");
	}
	
	// Rename sheet
	$objPHPExcel->getActiveSheet()->setTitle("상점리스트");
	
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	// 파일의 저장형식이 utf-8일 경우 한글파일 이름은 깨지므로 euc-kr로 변환해준다.
	$filename = iconv("UTF-8", "EUC-KR", "상점리스트");
	
	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
	header('Cache-Control: max-age=0');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}
?>