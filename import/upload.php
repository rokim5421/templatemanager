<?php

// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}

echo "<br><br><a href='https://saungternak.id/generator/import/'><button>Kembali</button></a>";

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
          
 
$file = "import.csv";
$handle = fopen($file,"r");
 
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $sql ="INSERT INTO section (id_template, id_section, id_kategori, file_img, file_json, keterangan) VALUES 
               ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."')
    ";
$conn->query($sql);
    echo "<br><br>" ;
    print_r ($sql);
}
if ($conn->query($sql) === TRUE) {
  echo "<br> <br> New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




$row = 1;
if (($handle = fopen("import.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

$conn->close();



//$sql = "INSERT INTO tamplate (id, template, section, code)
//VALUES ('00121', 'Doe', 'Doe', 'john@example.com')";


?>