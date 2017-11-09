<?php
include('./config/config.php');

$sql = " SELECT * FROM  siteStoreInfo order by api_date desc LIMIT 0 , 30 ";
$result = mysql_query($sql);
$cnt = @mysql_num_rows($result);
if (!$cnt) {
	alert("출력할 내역이 없습니다.");
}

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
->setCellValue("F1", "우편번호")
->setCellValue("G1", "전화번호");

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
	->setCellValue("F$i", "$row[site_post_no]")
	->setCellValue("F$i", "$row[telNo]");
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
?>