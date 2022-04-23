<?php
$id = $_REQUEST['id'];
$content = file_get_contents("Landingkit/landingkit-".$id.".json");

$pattern = "/url.*.landingkit.*./";
preg_match_all($pattern, $content, $matches);

$hasil = array();

foreach ($matches[0] as $a) {
	$url = str_replace('url": "', "", $a);
	$url = str_replace(',', "", $url);
	$url = str_replace('"', "", $url);
	$url = $url.";";
	array_push($hasil,$url);
}

$url = implode("<br />", $hasil);
echo $url;
?>