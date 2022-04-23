<?php
$template = $_REQUEST['template'];
$section = $_REQUEST['section'];
$s = str_replace(",","-",$section);

function image($temp,$id)
{
	
	$url = "screenshot/".$temp."/".$temp."-".$id.".png";
	$html ="<img src='".$url."'/>";
	return $html;
}

//echo image($template,$section);

$body = array();

$section = explode(",", $section);
foreach ($section as $a) {
	array_push($body,image($template,$a));
}

echo implode("<br />",$body);


?>