<?php
$file = file_get_contents("jumlah.txt");
$splitline = explode("\n", $file);

$hasil = array();
foreach ($splitline as $a) {
	$data = explode(",", $a);
	for ($x=1;$x<$data[2]+1;$x++){
		array_push($hasil,$data[0].",".$x);
	}
}

echo implode("<br/>", $hasil);

?>