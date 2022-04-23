<?php
$template = $_REQUEST['template'];
$section = $_REQUEST['section'];
$s = str_replace(",","-",$section);

function getdatajson($temp,$id)
{
	
	$json = file_get_contents("Landingkit/landingkit-".$temp.".json");
	$json_data = json_decode($json);
	$a = $json_data->content[$id];
	return json_encode($a);
}

function getjudul($temp)
{
	
	$json = file_get_contents("Landingkit/landingkit-".$temp.".json");
	$json_data = json_decode($json);
	$a = $json_data->title;
	return $a;
}

//echo getdatajson($template,1);
//echo $section;

$body = array();

$section = explode(",", $section);
foreach ($section as $a) {
	array_push($body,getdatajson($template,$a-1));
}



$data_json = '{
    "version": "0.4",
    "title": "'.getjudul($template).'__'.$s.'",
    "type": "page",
    "content": ['.implode(",",$body).'],
    "page_settings": {
        "background_background": "classic",
        "background_color": "#ffffff",
        "template": "elementor_canvas"
    }
}';

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename=Landingkit_'.$template.'__'.$s.'.json');
header('Expires: 0'); //No caching allowed
header('Cache-Control: must-revalidate');
header('Content-Length: ' . strlen($data_json));
file_put_contents('php://output', $data_json);


?>