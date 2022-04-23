<?php
$template = $_GET['template'];

function image($temp,$img)
{
	
	$url = "screenshot/".$temp."/".$img;
	$html ="<img src='./".$url."'/ class='img-fluid' >";
	return $html;
}
        include '../config.php';

          $sql = "SELECT * FROM section where id_template='".$template."'";
          $result = $conn->query($sql);
          $body = array();

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              array_push($body,"<label class='label-section'>Landingkit-".$row["id_template"]."-".$row["id_section"]."</label><br />".image($row["id_template"],$row["file_img"]));
            }
          } else {
            echo "0 results";
          }
          $conn->close();


echo implode("<br />",$body);


?>