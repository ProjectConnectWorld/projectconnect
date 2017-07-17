<?php
require "getcountries.php";
$arr=array();

echo "works";
$region =$_POST['region'];

if($region=="Africa"){
  $ccode="AF";

}
elseif($region=="Asia"){
  $ccode="AS";

}
elseif($region=="Europe"){
  $ccode="EU";

}
elseif($region=="North America"){
  $ccode="NA";

}
elseif($region=="Oceania"){
  $ccode="OC";

}
elseif($region=="South America"){
  $ccode="SA";

}

$counDB= getAllCountries();
$str = file_get_contents('../data/continent.json');
$json_a=json_decode($str,true);

$str = file_get_contents('../data/names.json');
$json_b=json_decode($str,true);


foreach($counDB as $value){
  if($ccode==$json_a[$value]){
    $response = new stdClass;
    $response->{'countrycode'}=$value;
    $response->{'countryname'}=$json_b[$value];
    array_push($arr,$response);
  }
}
echo(json_encode($arr));



 ?>
