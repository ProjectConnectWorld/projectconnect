<?php

$file = fopen("../data/mauritania.csv","r");
$arr= array();
while(! feof($file)){
  $school=fgetcsv($file);
  $response = new stdClass;
  $response->{'name'}= $school[7];
  $response->{'lat'}= $school[4];
  $response->{'lng'}= $school[3];
  $response->{'num'}= $school[11];
  $response->{'tlat'}= $school[20];
  $response->{'tlng'}= $school[21];
  $response->{'dist'}= $school[16];

  array_push($arr,$response);
  }
fclose($file);
array_shift($arr);
array_pop($arr);
echo json_encode($arr);

 ?>
