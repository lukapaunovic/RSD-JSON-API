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
	    $sell_rate = $row['PRODAJNI KURS'];
	    $buy_rate = $row['KUPOVNI KURS'];
	    if(isset($_GET['to_original'])) {
	        $sell_rate = 1/$row['PRODAJNI KURS'];
	        $buy_rate = 1/$row['KUPOVNI KURS'];
	    }
		$arr = array("currency_code"=>$row['ŠIFRA VALUTE'], "country_name"=>$row['NAZIV ZEMLJE'], "currency_name"=>$row['OZNAKA VALUTE'], "sell_rate"=>$sell_rate, "buy_rate"=>$buy_rate);
		array_push($result,$arr);
	}
	header('Content-Type: application/json');
	echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
