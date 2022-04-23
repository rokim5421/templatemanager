<?php
function get_section($temp,$id)
{
	include '../config.php';
	$sql = "SELECT * FROM section where id_template='".$temp."' and id_section='".$id."';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $ids = $row["file_json"];
              $ids = explode("-", $ids);
              $hasil = "";
              $body = array();
              foreach ($ids as $a) {
              		array_push($body,getdatajson($temp,$a-1));
				}
			return $body;
          }
          } else {
            echo "0 results";
          }
}

function getdatajson($temp,$id)
{
	
	$json = file_get_contents("../Landingkit/landingkit-".$temp.".json");
	$json_data = json_decode($json);
	$a = $json_data->content[$id];
	return json_encode($a);
}


include '../config.php';

$nama = $_REQUEST['nama'];
$templates = $_REQUEST['template'];
$template = explode(",", $templates);
$hasil = array();
foreach ($template as $t) {
	$temp = explode("-", $t);
	$id_template = $temp[0];
	$id_section = $temp[1];
	//$hasil=$hasil.get_section($id_template,$id_section)[0];
	$total = count(get_section($id_template,$id_section));
	for($t = 0;$t<$total;$t++) {
		array_push($hasil,get_section($id_template,$id_section)[$t]);
	}
	//
}
//print_r($hasil);

$data_json = '{
    "version": "0.4",
    "title": "'.$nama.'",
    "type": "page",
    "content": ['.implode(",",$hasil).'],
    "page_settings": {
        "background_background": "classic",
        "background_color": "#ffffff",
        "template": "elementor_canvas"
    }
}';

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename='.$nama.'.json');
header('Expires: 0'); //No caching allowed
header('Cache-Control: must-revalidate');
header('Content-Length: ' . strlen($data_json));
file_put_contents('php://output', $data_json);


?>