<?php
$servername = "localhost:3306";
          $username = "u5326075_wp596";
          $password = "talijiwo123";
          $dbname = "u5326075_elementor";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

?>