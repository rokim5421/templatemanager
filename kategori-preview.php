<!DOCTYPE html>
<html>
   <head>
      <title>Elementor Template Preview</title>
      <link rel="stylesheet" href="assets/bootstrap.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
      <script>
         //fungsi untuk ambil list template dari database
         function ambil_template() { 
              $.ajax({
                   type: 'POST', 
                   url: 'tools/kategori.php?id=<?php  if (isset($_GET['id'])) {
            echo $_GET['id'];
            } else {
            echo "C01";
            }?>', 
                  success: function(response) {  
                       $('#id_kategori').html(response); 
                     }
                });
             }
         
         //ambil template untuk pilihan pertama
         $(document).ready(function() {
           ambil_template();
         });
         
         function ambil_ss() {
              var id_kategori = $("#id_kategori").val();
              window.location.href= "kategori-preview.php?id="+id_kategori;
             }
           
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
            <h1>Elementor Template Preview</h1>
            <p>
               Ini adalah tools yang digunakan untuk preview template elementor
            </p>
            <p>
            <div id="pilihan">
               <div id="pilihan_1">
                  <select class="form-control form-control-lg id_kategori" id="id_kategori" style="display:inline;width:99%" onchange="ambil_ss()">Pilih Template</select>
               </div>
            </div>
            </p>
         </div>
      </div>
      <div class="container">
         <div class="jumbotron" style="margin-top:10px" id="img-preview">  
            <?php
               function image($temp,$img)
               {
                 
                 $url = "screenshot/".$temp."/".$img;
                 $html ="<img src='./".$url."'/ class='img-fluid' >";
                 return $html;
               }
                       include 'config.php';
               
                       if (isset($_GET['id'])){
                         $template = $_GET['id'];
               
                         $sql = "SELECT * FROM section where id_kategori='".$template."' order by id";
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
               }
               ?>
         </div>
      </div>
   </body>
</html>