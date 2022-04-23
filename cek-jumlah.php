<?php
$template = $_REQUEST['template'];

function jumlah($temp="001")
{
	
	$json = file_get_contents("Landingkit/landingkit-".$temp.".json");
	$json_data = json_decode($json);
	$judul = $json_data->title;
	$a = $json_data->content;
	return $judul.";".count($a);
}

echo jumlah($template);

?>