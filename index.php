<!-- <script type="text/javascript">
	window.location.href = "multi-preview.php";
</script> -->

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
      </div>
    </div>
    <div class="container">
       <div class="jumbotron" style="margin-top:10px">
       <a href="template-preview.php" class="btn btn-primary btn-lg btn-block" style="width:99%">Preview Per Template</a>
       <a href="kategori-preview.php" class="btn btn-success btn-lg btn-block" style="width:99%">Preview Per Kategori</a>
       <a href="multi-preview.php" class="btn btn-warning btn-lg btn-block" style="width:99%">Template Downloader</a>  
        
       </div>
    </div>

</body>
</html>