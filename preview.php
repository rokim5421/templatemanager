<!DOCTYPE html>
<html>
<head>
	<title>Template Preview</title>
	<link rel="stylesheet" href="assets/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  
  <script>
$(document).ready(function() {
   $('#id_template').change(function() { // Jika Select Box id provinsi dipilih
     var id = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'tools/section.php', // File yang akan memproses data
         data: 'id=' + id, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#id_section').html(response); // Berikan hasil ke id kota
            }
       });
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'tools/screenshot-full.php', // File yang akan memproses data
         data: 'template=' + id, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#img-preview').html(response); // Berikan hasil ke id kota
            }
       });
    });

 });

$(document).ready(function() {
   $('#id_section').change(function() { // Jika Select Box id provinsi dipilih
      var id_template = $("#id_template").val();
     var id_section = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'get', // Metode pengiriman data menggunakan POST
          url: 'tools/screenshot.php', // File yang akan memproses data
         data: 'template=' + id_template +"&section="+id_section, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
              $('#img-preview').html(response); // Berikan hasil ke id kota
            }
       });
    });
 });
  </script>

</head>
<body>

<!-- Nav -->
<!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Fixed navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->


<!-- Content -->
<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron" style="margin-top:50px">
        <h1>Preview Template Elementor</h1>
        <p>
          Ini adalah tools yang digunakan untuk preview template elementor
        </p>
        <p>
        	<?php
        	 include 'config.php';

          $sql = "SELECT DISTINCT(id_template) FROM template";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            echo '<select class="form-control form-control-lg" id="id_template" style="display:inline;width:49%">';
            while($row = $result->fetch_assoc()) {
              echo "<option value=$row[id_template]>Template-" . $row["id_template"]. "</option>";
            }
            echo '</select>';
          } else {
            echo "0 results";
          }
          $conn->close();

        	?>
          <select class="form-control form-control-lg" id="id_section" style="display:inline;width:49%">
          <option>Pilih section</option>
          </select>
        </p>
      </div>
    </div>
    <div class="container">
       <div class="jumbotron" style="margin-top:10px" id="img-preview">   
        
       </div>
    </div>

</body>
</html>