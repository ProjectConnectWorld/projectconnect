<?php
require "../../../db.php";
$str = file_get_contents('../data/names.json');

$arr= array();
$country =$_POST['country'];
$countryc=explode('-',$country)[0];


$query = "SELECT * FROM schools WHERE country_code= '$countryc'";
$result = pg_query($dbconn,$query) or die('Query failed: ' . pg_last_error());
while ($line = pg_fetch_object($result)) {
  $response = new stdClass;
  if(isset($line->name) && isset($line->lat)  && isset($line->lon)  && isset($line->num_students) ){
    //if lat lng is zero
    if($line->lat != '0' && $line->lon != '0' ){
      $response->{'name'}= $line->name;
      $response->{'lat'}= $line->lat;
      $response->{'lng'}= $line->lon;
      $response->{'num'}= $line->num_students;
      array_push($arr,$response);
    }
  }

  else if (isset($line->name) && isset($line->lat)  && isset($line->lon)){
    if($line->lat != '0' && $line->lon != '0'){
      $response->{'name'}= $line->name;
      $response->{'lat'}= $line->lat;
      $response->{'lng'}= $line->lon;
      $response->{'num'}= 0;
      array_push($arr,$response);
    }
  }
  // array_push($arr,$line);
}
pg_close($dbconn);
echo json_encode($arr);









 ?>
