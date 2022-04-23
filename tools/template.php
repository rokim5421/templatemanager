<?php
        	include '../config.php';

          $sql = "SELECT DISTINCT(id_template) FROM section ORDER by id_template";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $no = 0;
            while($row = $result->fetch_assoc()) {
              $no = $no+1;
              if ($no==1){
                echo "<option value=$row[id_template] selected>Template-" . $row["id_template"]. "</option>";
              } else {
              echo "<option value=$row[id_template]>Template-" . $row["id_template"]. "</option>";
              }
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        	?>