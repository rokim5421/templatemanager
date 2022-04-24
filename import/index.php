<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title> 
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Pilih file: <input type="file" name="berkas" />
        <input type="submit" name="upload" value="upload" />
    </form>
<p>
    Import file dengan nama "import.csv"
</p>
<br />
<p>
<b>Contoh format CSV yang benar :</b><br /><br />
121,1,C01,"121-1,2.png",1-2<br />
121,3,C03,121-3.png,3<br />
121,6,C05,121-6.png,6<br />
122,1,C01,"122-1,2.png",1-2<br />
122,3,C05,122-3.png,3<br />
122,4,C11,"122-4,5.png",4-5
</p>
</body> 
</html>