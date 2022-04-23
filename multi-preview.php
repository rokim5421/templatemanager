<!DOCTYPE html>
<html>
<head>
	<title>Multi Template Preview</title>
	<link rel="stylesheet" href="assets/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  
  <script>

//fungsi untuk ambil list template dari database
function ambil_template(nomor) { 
  var n = nomor.toString();
     $.ajax({
          type: 'POST', 
          url: 'tools/template.php', 
         success: function(response) {  
              $('#id_template_'+n).html(response); 
            }
       });
    }

//ambil template untuk pilihan pertama
$(document).ready(function() {
  ambil_template(1);
  ambil_section(1);
});

//tambah pilihan section
 var no = 1;
$(document).ready(function() {
   $('#btn-tambah').click(function() { 
  no = no+1;
  var html = '<div id="pilihan_'+no+'"><select class="form-control form-control-lg id_template_'+no+'" id="id_template_'+no+'" style="display:inline;width:49%" onchange="ambil_section('+no+')">Pilih Template</select><select class="form-control form-control-lg id_section_'+no+'" id="id_section_'+no+'" style="display:inline;width:49%"><option>Pilih section</option></select></div>';
  $('#pilihan').append(html);
  ambil_template(no);
  ambil_section(no);
});
});

//ambil section - baru
function ambil_section(nomor) { 
  var n = nomor.toString();
  var ids = $("#id_template_"+n).val();
     $.ajax({
          type: 'POST', 
          url: 'tools/section.php', 
         data: 'id=' + ids,

         success: function(response) {  
              $('#id_section_'+n).html(response); 
            }
       });
    }

//proses ambil ss - baru
$(document).ready(function() {
   $('#btn-proses').click(function() {
    var jml = $("#pilihan")[0].children.length;
    var body = "";
    for (var x=1;x<jml+1;x++){

     var id_template = $("#id_template_"+x).val();
     var id_section = $("#id_section_"+x).val();
     body = body+","+id_template+"-"+id_section;
     }
     body = body.replace(/^,|,$/g,'')
     console.log(body);
     $.ajax({
            type: 'get', 
          url: 'tools/screenshot-multi.php',
         data: 'template='+body, 
         success: function(response) { 
              $('#img-preview').html(response);
              $('#download-json').show();
            }
       });
    });
 });

//button download
$(document).ready(function() {
   $('#btn-download').click(function() {
    var nama_template=$('#nama-template').val();
    if (nama_template != ""){
    var jml = $("#pilihan")[0].children.length;
    var body = "";
    for (var x=1;x<jml+1;x++){
     var id_template = $("#id_template_"+x).val();
     var id_section = $("#id_section_"+x).val();
     body = body+","+id_template+"-"+id_section;
     }
     body = body.replace(/^,|,$/g,'');
     var url = 'tools/json.php?&template='+body+'&nama='+nama_template; 
     window.location = url;
     //console.log(url);
   } else {
    alert("Masukan nama templatenya");
   }
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
        <h1>Multi Preview Template Elementor</h1>
        <p>
          Ini adalah tools yang digunakan untuk preview template elementor
        </p>

        <p>
        <div id="pilihan">
          <div id="pilihan_1">
          <select class="form-control form-control-lg id_template_1" id="id_template_1" style="display:inline;width:49%" onchange="ambil_section(1)">Pilih Template</select>
          <select class="form-control form-control-lg id_template_1" id="id_section_1" style="display:inline;width:49%">
          <option>Pilih section</option>
          </select>
        </div>
      </div>
    </p>
      

      <p>
          <button id="btn-proses" type="button" class="btn btn-primary btn-lg btn-inline" style="width: 49%">Preview Template</button>
          <button id="btn-tambah" type="button" class="btn btn-success btn-lg btn-inline" style="width: 49%">Tambah Section</button>
        </p>
      </div>
    </div>
    <div class="container">
       <div class="jumbotron" style="margin-top:10px" id="img-preview">   
       </div>
       <div class="jumbotron" style="margin-top:10px;display: none" id="download-json">
      <p>
      <input type="text" class="form-control" id="nama-template" style="width: 99%" />
    </p>
       <button id="btn-download" class="btn btn-primary btn-lg btn-inline" style="width: 99%" >Download json</button>   
       </div>
    </div>

</body>
</html>