<?php
include('simple_html_dom.php');
$dom = new DomDocument;
$dom->loadHtmlFile('nbs.html');
$xpath = new DomXPath($dom);

// collect header names
$headerNames = array();
foreach ($xpath->query('//table[@id="index:spisakDeviza"]//th') as $node) {
	$headerNames[] = $node->nodeValue;
}

// collect data
$data = array();
foreach ($xpath->query('//tbody[@id="index:spisakDeviz:tbody_element"]/tr') as $node) {
	$rowData = array();
	foreach ($xpath->query('td', $node) as $cell) {
		$rowData[] = $cell->nodeValue;
	}
	$data[] = array_combine($headerNames, $rowData);
}

if (is_array($data) || is_object($data)) {
	$result = array();
	foreach($data as $row) { 
		$arr = array("code"=>$row['OZNAKA VALUTE'], "name"=>$row['NAZIV ZEMLJE'], "rate"=>$row['PRODAJNI KURS']);
		array_push($result,$arr);
	}
	header('Content-Type: application/json');
	echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
