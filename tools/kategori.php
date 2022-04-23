<?php
        	include '../config.php';

          $sql = "SELECT DISTINCT(id_kategori),nama FROM kategori ORDER by id_kategori";
          $result = $conn->query($sql);
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
          } else {
            $id = "C01";
          }

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if ($id==$row['id_kategori']){
                echo "<option value=$row[id_kategori] selected>" . $row["nama"]. "</option>";
              } else {
              echo "<option value=$row[id_kategori]>" . $row["nama"]. "</option>";
              }
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        	?>