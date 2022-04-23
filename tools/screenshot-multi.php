<?php
function get_section($temp,$id,$label="yes")
{
  include '../config.php';
  $sql = "SELECT * FROM section where id_template='".$temp."' and id_section='".$id."';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $img = image($row["id_template"],$row["id_section"],$row["file_img"],$label);
              return $img;
          }
          } else {
            echo "0 results";
          }
}

function image($temp,$id_section,$img,$label="yes")
{
	
	$url = "screenshot/".$temp."/".$img;
  if ($label == "yes") {
	$html = "<label class='label-section'>Landingkit-".$temp."-".$id_section."<br />";
} else {
  $html="";
}
	$html = $html."<img src='".$url."'/ class='img-fluid' >";
	return $html;
}

include '../config.php';

$templates = $_REQUEST['template'];
$label = $_REQUEST['label'];
$template = explode(",", $templates);
$hasil = array();
foreach ($template as $t) {
  $temp = explode("-", $t);
  $id_template = $temp[0];
  $id_section = $temp[1];
  array_push($hasil,get_section($id_template,$id_section,$label));
}
echo implode("<br />",$hasil);
?>