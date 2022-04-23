<?php
// if ($_REQUEST['id']) {
	
		  include '../config.php';

          $sql = "SELECT * FROM section where id_kategori = '".$_REQUEST['id']."'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            $data = array();
            while($row = $result->fetch_assoc()) {
              // $data[] = $row;
            	echo "<option value=$row[id_template]>Template $row[id_template]</option>";
            }
            // echo json_encode($data);
           
          } else {
            echo "0 results";
          }
          $conn->close();

// } else {
// 	echo "kosong";
// }
?>