<?php
$arr= array();

$response = new stdClass;
$response->{'name'}= "California";
$response->{'lat'}= "36.7783";
$response->{'long'}= "-119.4179";
$response->{'speed'}= 10;

array_push($arr,$response);

$response = new stdClass;
$response->{'name'}= "Nevada";
$response->{'lat'}= "38.8026";
$response->{'long'}= "-116.4194";
$response->{'speed'}= 8;

array_push($arr,$response);


echo json_encode($arr);



 ?>
