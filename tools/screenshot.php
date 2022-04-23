<?php
$template = $_REQUEST['template'];
$section = $_REQUEST['section'];
$s = str_replace(",","-",$section);

function image($temp,$id_section,$img)
{
	
	$url = "screenshot/".$temp."/".$img;
	$html = "<label class='label-section'>Landingkit-".$temp."-".$id_section."<br />";
	$html = $html."<img src='".$url."'/ class='img-fluid' >";
	return $html;
}

  include '../config.php';

$body = array();
$section = explode(",", $section);
foreach ($section as $a) {
	$sql = "SELECT * FROM section where id_template='".$template."' and id_section='".$a."'";
	//echo $sql;
          $result = $conn->query($sql);
          $body = array();

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              array_push($body,image($row["id_template"],$row["id_section"],$row["file_img"]));
            }
          }
}

echo implode("<br />",$body);


?>