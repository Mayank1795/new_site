<?php
extract ($_POST);
$district = $state = "";
$s=$_POST['s'];  //get value from ajax
$filename='zip.csv'; //zipcode csv file(must reside in same folder)
$f = fopen($filename, 'r');
while ($row = fgetcsv($f))
{
if ($row[0] == $s) //1 mean number of column of zipcode
 {
  $district=$row[2];  //3- Number of city column
  $state=$row[5]; //4-Number of state column
  break;
 }
}
fclose($f);
echo json_encode(
 array('dist' => $district,
 'state' => $state,
 'zip' => $s)
);  //Pass those details by json
?>