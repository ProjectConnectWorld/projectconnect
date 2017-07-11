<?php
$arr= array();

$response = new stdClass;
$response->{'name'}= "California";
$response->{'lat'}= "36.7783";
$response->{'lng'}= "-119.4179";
$response->{'num'}= 10;

array_push($arr,$response);

$response = new stdClass;
$response->{'name'}= "Nevada";
$response->{'lat'}= "38.8026";
$response->{'lng'}= "-116.4194";
$response->{'num'}= 8;

array_push($arr,$response);

$response = new stdClass;
$response->{'name'}= "Mass";
$response->{'lat'}= "45.8026";
$response->{'lng'}= "-116.4194";
$response->{'num'}= 8;

array_push($arr,$response);


echo json_encode($arr);



 ?>
